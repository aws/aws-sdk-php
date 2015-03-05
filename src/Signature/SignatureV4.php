<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use Aws\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7\Utils;

/**
 * Signature Version 4
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 extends AbstractSignature
{
    const ISO8601_BASIC = 'Ymd\THis\Z';

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

        $parsed = $this->parseRequest($request);
        unset($parsed['headers']['Authorization']);
        $parsed['headers']['Date'] = $ldt;

        if ($token = $credentials->getSecurityToken()) {
            $parsed['headers']['x-amz-security-token'] = $token;
        }

        $cs = $this->createScope($sdt, $this->region, $this->service);
        $payload = $this->getPayload($request);
        $context = $this->createContext($parsed, $payload);
        $context['string_to_sign'] = $this->createStringToSign($ldt, $cs, $context['creq']);
        $signingKey = $this->getSigningKey(
            $sdt,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );
        $signature = hash_hmac('sha256', $context['string_to_sign'], $signingKey);
        $parsed['headers']['Authorization'] = "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$cs}, "
            . "SignedHeaders={$context['headers']}, Signature={$signature}";

        return $this->buildRequest($parsed);
    }

    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        $parsed = $this->createPresignedRequest($request, $credentials);
        $payload = $this->getPresignedPayload($request);
        $httpDate = gmdate(self::ISO8601_BASIC, time());
        $shortDate = substr($httpDate, 0, 8);
        $scope = $this->createScope($shortDate, $this->region, $this->service);
        $credential = $credentials->getAccessKeyId() . '/' . $scope;
        $parsed['query']['X-Amz-Algorithm'] = 'AWS4-HMAC-SHA256';
        $parsed['query']['X-Amz-Credential'] = $credential;
        $parsed['query']['X-Amz-Date'] = gmdate('Ymd\THis\Z', time());
        $parsed['query']['X-Amz-SignedHeaders'] = 'Host';
        $parsed['query']['X-Amz-Expires'] = $this->convertExpires($expires);
        $context = $this->createContext($parsed, $payload);
        $stringToSign = $this->createStringToSign($httpDate, $scope, $context['creq']);
        $key = $this->getSigningKey(
            $shortDate,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );
        $parsed['query']['X-Amz-Signature'] = hash_hmac('sha256', $stringToSign, $key);

        return (string) $this->buildRequest($parsed)->getUri();
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

        $sr = $request->withMethod('GET')
            ->withBody('')
            ->withoutHeader('Content-Type')
            ->withoutHeader('Content-Length');

        // Move POST fields to the query if they are present
        if ($request->getHeader('Content-Type') === 'application/x-www-form-urlencoded') {
            // @TODO
        }

        return $sr;
    }

    protected function getPayload(RequestInterface $request)
    {
        // Calculate the request signature payload
        if ($request->hasHeader('X-Amz-Content-Sha256')) {
            // Handle streaming operations (e.g. Glacier.UploadArchive)
            return $request->getHeader('X-Amz-Content-Sha256');
        }

        if (!$request->getBody()->isSeekable()) {
            throw new CouldNotCreateChecksumException('sha256');
        }

        return Utils::hash($request->getBody(), 'sha256');
    }

    protected function getPresignedPayload(RequestInterface $request)
    {
        return $this->getPayload($request);
    }

    private function createStringToSign($longDate, $credentialScope, $creq)
    {
        $hash = hash('sha256', $creq);

        return "AWS4-HMAC-SHA256\n{$longDate}\n{$credentialScope}\n{$hash}";
    }

    private function createPresignedRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $parsedRequest = $this->parseRequest($request);

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $parsedRequest['headers']['X-Amz-Security-Token'] = $token;
        }

        return $this->moveHeadersToQuery($parsedRequest);
    }

    /**
     * @param array  $parsedRequest
     * @param string $payload Hash of the request payload
     * @return array Returns an array of context information
     */
    private function createContext(array $parsedRequest, $payload)
    {
        static $signable = [
            'host'        => true,
            'date'        => true,
            'content-md5' => true
        ];

        // Normalize the path as required by SigV4
        $canon = $parsedRequest['method'] . "\n"
            . $parsedRequest['path'] . "\n"
            . $this->getCanonicalizedQuery($parsedRequest['query']) . "\n";

        $canonHeaders = [];

        // Always include the "host", "date", and "x-amz-" headers.
        foreach ($parsedRequest['headers'] as $key => $values) {
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

    private function getCanonicalizedQuery(array $query)
    {
        unset($query['X-Amz-Signature']);

        if (!$query) {
            return '';
        }

        $qs = '';
        ksort($query);
        foreach ($query as $k => $v) {
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
        return "$shortDate/$region/$service/aws4_request";
    }

    private function moveHeadersToQuery(array $parsedRequest)
    {
        foreach ($parsedRequest['headers'] as $name => $header) {
            $name = strtolower($name);
            if (substr($name, 0, 5) == 'x-amz') {
                $parsedRequest['query'][$name] = $header;
            }
            if ($name !== 'host') {
                unset($parsedRequest['headers'][$name]);
            }
        }

        return $parsedRequest;
    }

    private function parseRequest(RequestInterface $request)
    {
        $uri = $request->getUri();

        return [
            'method'  => $request->getMethod(),
            'path'    => $uri->getPath(),
            'query'   => Utils::parseQuery($uri->getQuery()),
            'uri'     => $uri,
            'headers' => $request->getHeaders(),
            'body'    => $request->getBody(),
            'version' => $request->getProtocolVersion()
        ];
    }

    private function buildRequest(array $req)
    {
        return new Request(
            $req['method'],
            $req['uri']->withQuery(Utils::buildQuery($req['query'])),
            $req['headers'],
            $req['body'],
            $req['version']
        );
    }
}
