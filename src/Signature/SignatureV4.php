<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use Aws\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * Signature Version 4
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html
 */
class SignatureV4 implements SignatureInterface
{
    use SignatureTrait;
    const ISO8601_BASIC = 'Ymd\THis\Z';
    const UNSIGNED_PAYLOAD = 'UNSIGNED-PAYLOAD';
    const AMZ_CONTENT_SHA256_HEADER = 'X-Amz-Content-Sha256';

    /** @var string */
    private $service;

    /** @var string */
    private $region;

    /** @var bool */
    private $unsigned;

    /**
     * The following headers are not signed because signing these headers
     * would potentially cause a signature mismatch when sending a request
     * through a proxy or if modified at the HTTP client level.
     *
     * @return array
     */
    private function getHeaderBlacklist()
    {
        return [
            'cache-control'         => true,
            'content-type'          => true,
            'content-length'        => true,
            'expect'                => true,
            'max-forwards'          => true,
            'pragma'                => true,
            'range'                 => true,
            'te'                    => true,
            'if-match'              => true,
            'if-none-match'         => true,
            'if-modified-since'     => true,
            'if-unmodified-since'   => true,
            'if-range'              => true,
            'accept'                => true,
            'authorization'         => true,
            'proxy-authorization'   => true,
            'from'                  => true,
            'referer'               => true,
            'user-agent'            => true,
            'x-amzn-trace-id'       => true,
            'aws-sdk-invocation-id' => true,
            'aws-sdk-retry'         => true,
        ];
    }

    /**
     * @param string $service Service name to use when signing
     * @param string $region  Region name to use when signing
     * @param array $options Array of configuration options used when signing
     *      - unsigned-body: Flag to make request have unsigned payload.
     *        Unsigned body is used primarily for streaming requests.
     */
    public function __construct($service, $region, array $options = [])
    {
        $this->service = $service;
        $this->region = $region;
        $this->unsigned = isset($options['unsigned-body']) ? $options['unsigned-body'] : false;
    }

    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $ldt = gmdate(self::ISO8601_BASIC);
        $sdt = substr($ldt, 0, 8);
        $parsed = $this->parseRequest($request);
        $parsed['headers']['X-Amz-Date'] = [$ldt];

        if ($token = $credentials->getSecurityToken()) {
            $parsed['headers']['X-Amz-Security-Token'] = [$token];
        }
        $cs = $this->createScope($sdt, $this->region, $this->service);
        $payload = $this->getPayload($request);

        if ($payload == self::UNSIGNED_PAYLOAD) {
            $parsed['headers'][self::AMZ_CONTENT_SHA256_HEADER] = [$payload];
        }

        $context = $this->createContext($parsed, $payload);
        $toSign = $this->createStringToSign($ldt, $cs, $context['creq']);
        $signingKey = $this->getSigningKey(
            $sdt,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );
        $signature = hash_hmac('sha256', $toSign, $signingKey);
        $parsed['headers']['Authorization'] = [
            "AWS4-HMAC-SHA256 "
            . "Credential={$credentials->getAccessKeyId()}/{$cs}, "
            . "SignedHeaders={$context['headers']}, Signature={$signature}"
        ];

        return $this->buildRequest($parsed);
    }

    /**
     * Get the headers that were used to pre-sign the request.
     * Used for the X-Amz-SignedHeaders header.
     *
     * @param array $headers
     * @return array
     */
    private function getPresignHeaders(array $headers)
    {
        $presignHeaders = [];
        $blacklist = $this->getHeaderBlacklist();
        foreach ($headers as $name => $value) {
            $lName = strtolower($name);
            if (!isset($blacklist[$lName])
                && $name !== self::AMZ_CONTENT_SHA256_HEADER
            ) {
                $presignHeaders[] = $lName;
            }
        }
        return $presignHeaders;
    }

    public function presign(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires,
        array $options = []
    ) {

        $startTimestamp = isset($options['start_time'])
                            ? $this->convertToTimestamp($options['start_time'], null)
                            : time();

        $expiresTimestamp = $this->convertToTimestamp($expires, $startTimestamp);

        $parsed = $this->createPresignedRequest($request, $credentials);
        $payload = $this->getPresignedPayload($request);
        $httpDate = gmdate(self::ISO8601_BASIC, $startTimestamp);
        $shortDate = substr($httpDate, 0, 8);
        $scope = $this->createScope($shortDate, $this->region, $this->service);
        $credential = $credentials->getAccessKeyId() . '/' . $scope;
        if ($credentials->getSecurityToken()) {
            unset($parsed['headers']['X-Amz-Security-Token']);
        }
        $parsed['query']['X-Amz-Algorithm'] = 'AWS4-HMAC-SHA256';
        $parsed['query']['X-Amz-Credential'] = $credential;
        $parsed['query']['X-Amz-Date'] = gmdate('Ymd\THis\Z', $startTimestamp);
        $parsed['query']['X-Amz-SignedHeaders'] = implode(';', $this->getPresignHeaders($parsed['headers']));
        $parsed['query']['X-Amz-Expires'] = $this->convertExpires($expiresTimestamp, $startTimestamp);
        $context = $this->createContext($parsed, $payload);
        $stringToSign = $this->createStringToSign($httpDate, $scope, $context['creq']);
        $key = $this->getSigningKey(
            $shortDate,
            $this->region,
            $this->service,
            $credentials->getSecretKey()
        );
        $parsed['query']['X-Amz-Signature'] = hash_hmac('sha256', $stringToSign, $key);

        return $this->buildRequest($parsed);
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
            ->withBody(Psr7\stream_for(''))
            ->withoutHeader('Content-Type')
            ->withoutHeader('Content-Length');

        // Move POST fields to the query if they are present
        if ($request->getHeaderLine('Content-Type') === 'application/x-www-form-urlencoded') {
            $body = (string) $request->getBody();
            $sr = $sr->withUri($sr->getUri()->withQuery($body));
        }

        return $sr;
    }

    protected function getPayload(RequestInterface $request)
    {
        if ($this->unsigned && $request->getUri()->getScheme() == 'https') {
            return self::UNSIGNED_PAYLOAD;
        }
        // Calculate the request signature payload
        if ($request->hasHeader(self::AMZ_CONTENT_SHA256_HEADER)) {
            // Handle streaming operations (e.g. Glacier.UploadArchive)
            return $request->getHeaderLine(self::AMZ_CONTENT_SHA256_HEADER);
        }

        if (!$request->getBody()->isSeekable()) {
            throw new CouldNotCreateChecksumException('sha256');
        }

        try {
            return Psr7\hash($request->getBody(), 'sha256');
        } catch (\Exception $e) {
            throw new CouldNotCreateChecksumException('sha256', $e);
        }
    }

    protected function getPresignedPayload(RequestInterface $request)
    {
        return $this->getPayload($request);
    }

    protected function createCanonicalizedPath($path)
    {
        $doubleEncoded = rawurlencode(ltrim($path, '/'));

        return '/' . str_replace('%2F', '/', $doubleEncoded);
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
            $parsedRequest['headers']['X-Amz-Security-Token'] = [$token];
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
        $blacklist = $this->getHeaderBlacklist();

        // Normalize the path as required by SigV4
        $canon = $parsedRequest['method'] . "\n"
            . $this->createCanonicalizedPath($parsedRequest['path']) . "\n"
            . $this->getCanonicalizedQuery($parsedRequest['query']) . "\n";

        // Case-insensitively aggregate all of the headers.
        $aggregate = [];
        foreach ($parsedRequest['headers'] as $key => $values) {
            $key = strtolower($key);
            if (!isset($blacklist[$key])) {
                foreach ($values as $v) {
                    $aggregate[$key][] = $v;
                }
            }
        }

        ksort($aggregate);
        $canonHeaders = [];
        foreach ($aggregate as $k => $v) {
            if (count($v) > 0) {
                sort($v);
            }
            $canonHeaders[] = $k . ':' . preg_replace('/\s+/', ' ', implode(',', $v));
        }

        $signedHeadersString = implode(';', array_keys($aggregate));
        $canon .= implode("\n", $canonHeaders) . "\n\n"
            . $signedHeadersString . "\n"
            . $payload;

        return ['creq' => $canon, 'headers' => $signedHeadersString];
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

    private function convertToTimestamp($dateValue, $relativeTimeBase = null)
    {
        if ($dateValue instanceof \DateTimeInterface) {
            $timestamp = $dateValue->getTimestamp();
        } elseif (!is_numeric($dateValue)) {
            $timestamp = strtotime($dateValue,
                                   $relativeTimeBase === null ? time() : $relativeTimeBase
            );
        } else {
            $timestamp = $dateValue;
        }

        return $timestamp;
    }

    private function convertExpires($expiresTimestamp, $startTimestamp)
    {
        $duration = $expiresTimestamp - $startTimestamp;

        // Ensure that the duration of the signature is not longer than a week
        if ($duration > 604800) {
            throw new \InvalidArgumentException('The expiration date of a '
                . 'signature version 4 presigned URL must be less than one '
                . 'week');
        }

        return $duration;
    }

    private function moveHeadersToQuery(array $parsedRequest)
    {
        foreach ($parsedRequest['headers'] as $name => $header) {
            $lname = strtolower($name);
            if (substr($lname, 0, 5) == 'x-amz') {
                $parsedRequest['query'][$name] = $header;
            }
            $blacklist = $this->getHeaderBlacklist();
            if (isset($blacklist[$lname])
                || $lname === strtolower(self::AMZ_CONTENT_SHA256_HEADER)
            ) {
                unset($parsedRequest['headers'][$name]);
            }
        }

        return $parsedRequest;
    }

    private function parseRequest(RequestInterface $request)
    {
        // Clean up any previously set headers.
        /** @var RequestInterface $request */
        $request = $request
            ->withoutHeader('X-Amz-Date')
            ->withoutHeader('Date')
            ->withoutHeader('Authorization');
        $uri = $request->getUri();

        return [
            'method'  => $request->getMethod(),
            'path'    => $uri->getPath(),
            'query'   => Psr7\parse_query($uri->getQuery()),
            'uri'     => $uri,
            'headers' => $request->getHeaders(),
            'body'    => $request->getBody(),
            'version' => $request->getProtocolVersion()
        ];
    }

    private function buildRequest(array $req)
    {
        if ($req['query']) {
            $req['uri'] = $req['uri']->withQuery(Psr7\build_query($req['query']));
        }

        return new Psr7\Request(
            $req['method'],
            $req['uri'],
            $req['headers'],
            $req['body'],
            $req['version']
        );
    }
}
