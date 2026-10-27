<?php
namespace Aws\Identity\S3;

use Aws\Credentials\CredentialsInterface;
use Aws\LruArrayCache;
use Aws\S3\S3Client;
use GuzzleHttp\Promise;

class S3ExpressIdentityProvider
{
    private $cache;
    private $region;
    private $config;
    private $s3Client;

    /**
     * @param string $clientRegion Region used for CreateSession calls.
     * @param array  $config       Optional settings:
     *   - client: an S3Client used for every CreateSession call. Sessions
     *     are then created with that client's own identity, though they are
     *     still cached per requesting identity.
     */
    public function __construct($clientRegion, array $config = [])
    {
        $this->cache = new LruArrayCache(100);
        $this->region = $clientRegion;
        $this->config = $config;
    }

    /**
     * Returns a promise for an S3 Express session for the command's bucket.
     *
     * When $credentials is given, the session is created with those
     * credentials, and it is cached per bucket and per identity.
     *
     * @param mixed                     $command
     * @param CredentialsInterface|null $credentials Credentials of the
     *                                               requesting client.
     */
    public function __invoke(
        $command,
        ?CredentialsInterface $credentials = null
    ) {
        if (isset($this->config['client'])) {
            $s3Client = $this->config['client'];
        } elseif ($credentials !== null) {
            $s3Client = null;
        } else {
            $s3Client = $this->getDefaultClient();
        }
        if ($credentials === null) {
            $credentials = $s3Client->getCredentials()->wait();
        }

        $bucket = $command['Bucket'];
        $key = $this->getCacheKey($bucket, $credentials);
        if ($identity = $this->cache->get($key)) {
            if (!$identity->isExpired()) {
                return Promise\Create::promiseFor($identity);
            }
        }
        if ($s3Client === null) {
            $s3Client = $this->createSessionClient($credentials);
        }
        $response = $s3Client->createSession(['Bucket' => $bucket]);
        $identity = new S3ExpressIdentity(
            $response['Credentials']['AccessKeyId'],
            $response['Credentials']['SecretAccessKey'],
            $response['Credentials']['SessionToken'],
            $response['Credentials']['Expiration']->getTimestamp()
        );
        $this->cache->set($key, $identity);
        return Promise\Create::promiseFor($identity);
    }

    /**
     * Creates the client that calls CreateSession with the given
     * credentials.
     *
     * @param CredentialsInterface $credentials
     *
     * @return S3Client
     */
    protected function createSessionClient(
        CredentialsInterface $credentials
    ): S3Client
    {
        return new S3Client([
            'region' => $this->region,
            'credentials' => $credentials,
            'disable_express_session_auth' => true
        ]);
    }

    private function getCacheKey(
        string $bucket,
        CredentialsInterface $credentials
    ): string
    {
        $parts = [
            $bucket,
            (string) $credentials->getAccessKeyId(),
            (string) $credentials->getSecretKey(),
            (string) $credentials->getSecurityToken(),
        ];
        $encoded = '';
        foreach ($parts as $part) {
            $encoded .= strlen($part) . ':' . $part;
        }

        return hash('sha256', $encoded);
    }

    private function getDefaultClient(): S3Client
    {
        if (is_null($this->s3Client)) {
            $this->s3Client = new S3Client([
                'region' => $this->region,
                'disable_express_session_auth' => true
            ]);
        }
        return $this->s3Client;
    }
}
