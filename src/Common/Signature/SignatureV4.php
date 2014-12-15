<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\Common\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Post\PostBodyInterface;
use GuzzleHttp\Stream\Utils;

/**
 * Signature Version 4
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 extends AbstractSignature
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

        $cs = $this->createScope($sdt, $this->region, $this->service);
        $payload = $this->getPayload($request);
        $context = $this->createContext($request, $payload);
        $context['string_to_sign'] = $this->createStringToSign($ldt, $cs, $context['creq']);
        $signingKey = $this->getSigningKey(
            $sdt,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );

        $signature = hash_hmac('sha256', $context['string_to_sign'], $signingKey);
        $request->setHeader('Authorization', "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$cs}, "
            . "SignedHeaders={$context['headers']}, Signature={$signature}");
        $request->getConfig()['aws.signature'] = $context;
    }

    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        $request = $this->createPresignedRequest($request, $credentials);
        $query = $request->getQuery();
        $httpDate = gmdate(self::ISO8601_BASIC, time());
        $shortDate = substr($httpDate, 0, 8);
        $scope = $this->createScope($shortDate, $this->region, $this->service);
        $this->addQueryValues($scope, $request, $credentials, $expires);
        $payload = $this->getPresignedPayload($request);
        $context = $this->createContext($request, $payload);
        $stringToSign = $this->createStringToSign($httpDate, $scope, $context['creq']);
        $key = $this->getSigningKey(
            $shortDate,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );
        $query['X-Amz-Signature'] = hash_hmac('sha256', $stringToSign, $key);

        return $request->getUrl();
    }

    /**
     * Converts a POST request to a GET request by moving POST fields into the
     * query string.
     *
     * Useful for pre-signing query protocol requests.
     *
     * @param RequestInterface $request Request to clone
     *
     * @return RequestInterface
     * @throws \InvalidArgumentException if the method is not POST
     */
    public static function convertPostToGet(RequestInterface $request)
    {
        if ($request->getMethod() !== 'POST') {
            throw new \InvalidArgumentException('Expected a POST request but '
                . 'received a ' . $request->getMethod() . ' request.');
        }

        $sr = clone $request;
        $sr->setMethod('GET');
        $sr->setBody(null);

        // Move POST fields to the query if they are present
        if ($request->getBody() instanceof PostBodyInterface) {
            foreach ($request->getBody()->getFields() as $name => $value) {
                $sr->getQuery()->set($name, $value);
            }
        }

        return $sr;
    }

    protected function getPayload(RequestInterface $request)
    {
        // Calculate the request signature payload
        if ($request->hasHeader('x-amz-content-sha256')) {
            // Handle streaming operations (e.g. Glacier.UploadArchive)
            return (string) $request->getHeader('x-amz-content-sha256');
        }

        if ($body = $request->getBody()) {
            if (!$body->isSeekable()) {
                throw new CouldNotCreateChecksumException('sha256');
            }
            return Utils::hash($body, 'sha256');
        }

        return self::EMPTY_PAYLOAD;
    }

    protected function getPresignedPayload(RequestInterface $request)
    {
        return $this->getPayload($request);
    }

    private function createStringToSign($longDate, $credentialScope, $creq)
    {
        return "AWS4-HMAC-SHA256\n{$longDate}\n{$credentialScope}\n"
            . hash('sha256', $creq);
    }

    private function createPresignedRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $sr = clone $request;

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $sr->setHeader('X-Amz-Security-Token', $token);
            $sr->getQuery()->set('X-Amz-Security-Token', $token);
        }

        $this->moveHeadersToQuery($sr);

        return $sr;
    }

    /**
     * @internal Create the canonical representation of a request
     * @param RequestInterface $request Request to canonicalize
     * @param string           $payload Hash of the request payload
     * @return array Returns an array of context information
     */
    private function createContext(RequestInterface $request, $payload)
    {
        static $signable = [
            'host'        => true,
            'date'        => true,
            'content-md5' => true
        ];

        // Normalize the path as required by SigV4 and ensure it's absolute
        $canon = $request->getMethod() . "\n"
            . '/' . ltrim($request->getPath(), '/') . "\n"
            . $this->getCanonicalizedQuery($request) . "\n";

        $canonHeaders = [];

        // Always include the "host", "date", and "x-amz-" headers.
        foreach ($request->getHeaders() as $key => $values) {
            $key = strtolower($key);
            if (isset($signable[$key]) || substr($key, 0, 6) === 'x-amz-') {
                if (count($values) == 1) {
                    $values = $values[0];
                } else {
                    sort($values);
                    $values = implode(',', $values);
                }
                $canonHeaders[$key] = $key . ':' . preg_replace('/\s+/', ' ', $values);
            }
        }

        ksort($canonHeaders);
        $signedHeadersString = implode(';', array_keys($canonHeaders));
        $canon .= implode("\n", $canonHeaders) . "\n\n"
            . $signedHeadersString . "\n"
            . $payload;

        return ['creq' => $canon, 'headers' => $signedHeadersString];
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

    private function convertExpires($expires)
    {
        if ($expires instanceof \DateTime) {
            $expires = $expires->getTimestamp();
        } elseif (!is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        $duration = $expires - time();

        // Ensure that the duration of the signature is not longer than a week
        if ($duration > 604800) {
            throw new \InvalidArgumentException('The expiration date of a '
                . 'signature version 4 presigned URL must be less than one '
                . 'week');
        }

        return $duration;
    }

    private function createScope($shortDate, $region, $service)
    {
        return $shortDate
            . '/' . $region
            . '/' . $service
            . '/aws4_request';
    }

    private function addQueryValues(
        $scope,
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        $credential = $credentials->getAccessKeyId() . '/' . $scope;

        // Set query params required for pre-signed URLs
        $query = $request->getQuery();
        $query['X-Amz-Algorithm'] = 'AWS4-HMAC-SHA256';
        $query['X-Amz-Credential'] = $credential;
        $query['X-Amz-Date'] = gmdate('Ymd\THis\Z', time());
        $query['X-Amz-SignedHeaders']= 'Host';
        $query['X-Amz-Expires'] = $this->convertExpires($expires);
    }

    private function moveHeadersToQuery(RequestInterface $request)
    {
        $query = $request->getQuery();

        foreach ($request->getHeaders() as $name => $header) {
            $name = strtolower($name);
            if (substr($name, 0, 5) == 'x-amz') {
                $query[$name] = $header;
            }
            if ($name !== 'host') {
                $request->removeHeader($name);
            }
        }
    }
}
