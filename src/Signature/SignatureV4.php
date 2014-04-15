<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Stream;

/**
 * Signature Version 4
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 implements SignatureInterface
{
    const ISO8601_BASIC = 'Ymd\THis\Z';
    const EMPTY_PAYLOAD = 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855';

    /** @var string */
    private $service;

    /** @var string */
    private $region;

    /** @var array Cache of previously signed values */
    private $cache = [];

    /** @var int Size of the hash cache */
    private $cacheSize = 0;

    /**
     * @param string $service Service name to use when signing
     * @param string $region  Region name to use when signing
     */
    public function __construct($service, $region)
    {
        $this->service = $service;
        $this->region = $region;
    }

    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $ldt = gmdate(self::ISO8601_BASIC);
        $sdt = substr($ldt, 0, 8);

        $request->removeHeader('Authorization');
        $request->removeHeader('x-amz-date');
        $request->setHeader('Date', $ldt);

        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('x-amz-security-token', $token);
        }

        $payload = $request->getHeader('x-amz-content-sha256');
        if (!$payload) {
            $payload = $this->getPayloadHash($request);
        }

        $scope = "{$sdt}/{$this->region}/{$this->service}/aws4_request";
        $c = $this->createContext($request, $payload);
        $c['string_to_sign'] = "AWS4-HMAC-SHA256\n{$ldt}\n{$scope}\n"
            . hash('sha256', $c['creq']);

        $request->setHeader('Authorization', "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$scope}, "
            . "SignedHeaders={$c['headers']}, "
            . "Signature=" . hash_hmac(
                'sha256',
                $c['string_to_sign'],
                $this->getSigningKey(
                    $sdt,
                    $this->region,
                    $this->service,
                    $credentials->getSecretKey()
                )
            )
        );

        $request->getConfig()['aws.signature'] = $c;
    }

    /**
     * Get the region name the service is configured for.
     *
     * @return string
     */
    public function getRegionName()
    {
        return $this->region;
    }

    /**
     * Get the service name the service is configured for.
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->service;
    }

    protected function getPayloadHash(RequestInterface $request)
    {
        return $request->getBody()
            ? Stream\hash($request->getBody(), 'sha256')
            : self::EMPTY_PAYLOAD;
    }

    /**
     * @internal Create the canonical representation of a request
     * @param RequestInterface $request Request to canonicalize
     * @param string           $payload Hash of the request payload
     * @return array Returns an array of context information
     */
    protected function createContext(RequestInterface $request, $payload)
    {
        // Normalize the path as required by SigV4 and ensure it's absolute
        $canon = $request->getMethod() . "\n"
            . $request->getPath() . "\n"
            . $this->getCanonicalizedQuery($request) . "\n";

        // Create the canonical headers
        $headers = array_change_key_case($request->getHeaders());
        unset($headers['user-agent']);
        ksort($headers);

        foreach ($headers as $key => $values) {
            // Combine multi-value headers into a comma separated list
            if (count($values) == 1) {
                $values = $values[0];
            } else {
                sort($values);
                $values = implode(',', $values);
            }
            $canon .= $key . ':' . preg_replace('/\s+/', ' ', $values) . "\n";
        }

        // Create the signed headers
        $signedHeaders = implode(';', array_keys($headers));
        $canon .= "\n{$signedHeaders}\n{$payload}";

        return ['creq' => $canon, 'headers' => $signedHeaders];
    }

    protected function getSigningKey($shortDate, $region, $service, $secretKey)
    {
        $k = $shortDate . '_' . $region . '_' . $service . '_' . $secretKey;

        if (!isset($this->cache[$k])) {
            // Clear the cache when it reaches 50 entries
            if (++$this->cacheSize > 50) {
                $this->cache = [];
                $this->cacheSize = 0;
            }
            $dateKey = hash_hmac('sha256', $shortDate, "AWS4{$secretKey}", true);
            $regionKey = hash_hmac('sha256', $region, $dateKey, true);
            $serviceKey = hash_hmac('sha256', $service, $regionKey, true);
            $this->cache[$k] = hash_hmac('sha256', 'aws4_request', $serviceKey, true);
        }

        return $this->cache[$k];
    }

    private function getCanonicalizedQuery(RequestInterface $request)
    {
        $queryParams = $request->getQuery()->toArray();
        unset($queryParams['X-Amz-Signature']);

        if (!$queryParams) {
            return '';
        }

        $qs = '';
        ksort($queryParams);
        foreach ($queryParams as $k => $v) {
            if (!is_array($v)) {
                $qs .= rawurlencode($k) . '=' . rawurlencode($v) . '&';
            } else {
                sort($v);
                foreach ($v as $value) {
                    $qs .= rawurlencode($k) . '=' . rawurlencode($value) . '&';
                }
            }
        }

        return substr($qs, 0, -1);
    }
}
