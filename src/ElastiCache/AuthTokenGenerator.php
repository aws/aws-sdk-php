<?php

namespace Aws\ElastiCache;

use Aws;
use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/**
 * Generates auth tokens for use with IAM authentication.
 */
class AuthTokenGenerator
{
    private $credentialProvider;

    /**
     * The constructor takes an instance of Credentials or a CredentialProvider.
     *
     * @param callable|Credentials $creds
     */
    public function __construct($creds)
    {
        if ($creds instanceof CredentialsInterface) {
            $promise = new Promise\FulfilledPromise($creds);
            $this->credentialProvider = Aws\constantly($promise);
        } else {
            $this->credentialProvider = $creds;
        }
    }

    /**
     * Create the token for ElastiCache login.
     *
     * @param string $replication_group_id The replication group id
     * @param string $region The region where the ElastiCache cluster is located
     * @param string $username The username to login as
     * @param int $lifetime The lifetime of the token in minutes
     *
     * @return string Token generated
     */
    public function createToken($replication_group_id, $region, $username, $lifetime = 15)
    {
        if (! is_numeric($lifetime) || $lifetime > 15 || $lifetime <= 0) {
            throw new \InvalidArgumentException(
                "Lifetime must be a positive number less than or equal to 15, was {$lifetime}",
                null
            );
        }

        $uri = new Uri();
        $uri = $uri->withHost($replication_group_id);
        $uri = $uri->withPath('/');
        $uri = $uri->withQuery('Action=connect&User='.$username);

        $request = new Request('GET', $uri);
        $signer = new SignatureV4('elasticache', $region);
        $provider = $this->credentialProvider;

        $url = (string) $signer->presign(
            $request,
            $provider()->wait(),
            '+'.$lifetime.' minutes'
        )->getUri();

        // Remove 2 extra slash from the presigned url result
        return substr($url, 2);
    }
}
