<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use AWS\CRT\Auth\Signable;
use AWS\CRT\Auth\SignatureType;
use AWS\CRT\Auth\Signing;
use AWS\CRT\Auth\SigningAlgorithm;
use AWS\CRT\Auth\SigningConfigAWS;
use AWS\CRT\Auth\StaticCredentialsProvider;
use AWS\CRT\HTTP\Request;
use Aws\Exception\CommonRuntimeException;
use Psr\Http\Message\RequestInterface;

/**
 * Provides signature calculation for SignatureV4.
 */
trait SignatureTrait
{
    /** @var array Cache of previously signed values */
    private $cache = [];

    /** @var int Size of the hash cache */
    private $cacheSize = 0;

    private function createScope($shortDate, $region, $service)
    {
        return "$shortDate/$region/$service/aws4_request";
    }

    private function getSigningKey($shortDate, $region, $service, $secretKey)
    {
        $k = $shortDate . '_' . $region . '_' . $service . '_' . $secretKey;

        if (!isset($this->cache[$k])) {
            // Clear the cache when it reaches 50 entries
            if (++$this->cacheSize > 50) {
                $this->cache = [];
                $this->cacheSize = 0;
            }

            $dateKey = hash_hmac(
                'sha256',
                $shortDate,
                "AWS4{$secretKey}",
                true
            );
            $regionKey = hash_hmac('sha256', $region, $dateKey, true);
            $serviceKey = hash_hmac('sha256', $service, $regionKey, true);
            $this->cache[$k] = hash_hmac(
                'sha256',
                'aws4_request',
                $serviceKey,
                true
            );
        }

        return $this->cache[$k];
    }

    //TODO move this to a different signer trait
    /**
     * @param CredentialsInterface $credentials
     * @param RequestInterface $request
     * @param $signingService
     * @return RequestInterface
     */
    private function signWithV4a(CredentialsInterface $credentials, RequestInterface $request, $signingService)
    {
        if (!extension_loaded('awscrt')) {
            throw new CommonRuntimeException(
                "AWS Common Runtime for PHP is required to use Signature V4A"
                . ".  Please install it using the instructions found at"
                . " https://github.com/aws/aws-sdk-php/blob/master/CRT_INSTRUCTIONS.md"
            );
        }
        $credentials_provider = new StaticCredentialsProvider([
            'access_key_id' => $credentials->getAccessKeyId(),
            'secret_access_key' => $credentials->getSecretKey(),
            'session_token' => $credentials->getSecurityToken(),
        ]);
        $sha = $this->getPayload($request);
        $signingConfig = new SigningConfigAWS([
            'algorithm' => SigningAlgorithm::SIGv4_ASYMMETRIC,
            'signature_type' => SignatureType::HTTP_REQUEST_HEADERS,
            'credentials_provider' => $credentials_provider,
            'signed_body_value' => $sha,
            'region' => "*",
            'service' => $signingService,
            'date' => time(),
        ]);
        $sha = $this->getPayload($request);
        $invocationId = $request->getHeader("aws-sdk-invocation-id");
        $retry = $request->getHeader("aws-sdk-retry");
        $request = $request->withoutHeader("aws-sdk-invocation-id");
        $request = $request->withoutHeader("aws-sdk-retry");
        $http_request = new Request(
            $request->getMethod(),
            (string) $request->getUri(),
            [],
            array_map(function ($header) {
                return $header[0];
            }, $request->getHeaders())
        );

        Signing::signRequestAws(
            Signable::fromHttpRequest($http_request),
            $signingConfig, function ($signing_result, $error_code) use (&$http_request) {
            $signing_result->applyToHttpRequest($http_request);
        });
        $sigV4AHeaders = $http_request->headers();
        foreach ($sigV4AHeaders->toArray() as $h => $v) {
            $request = $request->withHeader($h, $v);
        }
        $request = $request->withHeader("aws-sdk-invocation-id", $invocationId);
        $request = $request->withHeader("x-amz-content-sha256", $sha);
        $request = $request->withHeader("aws-sdk-retry", $retry);
        $request = $request->withHeader("x-amz-region-set", "*");

        return $request;
    }
}
