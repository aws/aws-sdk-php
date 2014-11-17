<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use Aws\S3\S3UriParser;
use Aws\S3\S3Client;
use GuzzleHttp\Message\RequestInterface;

/**
 * Default Amazon S3 signature implementation
 * @link http://docs.aws.amazon.com/AmazonS3/latest/dev/RESTAuthentication.html
 */
class S3Signature extends AbstractSignature
{
    /** @var array Query string values that must be signed */
    private $signableQueryString = [
        'acl', 'cors', 'delete', 'lifecycle', 'location', 'logging',
        'notification', 'partNumber', 'policy', 'requestPayment',
        'response-cache-control', 'response-content-disposition',
        'response-content-encoding', 'response-content-language',
        'response-content-type', 'response-expires', 'restore', 'tagging',
        'torrent', 'uploadId', 'uploads', 'versionId', 'versioning',
        'versions', 'website'
    ];

    /** @var array Sorted headers that must be signed */
    private $signableHeaders = ['Content-MD5', 'Content-Type'];

    /** @var \Aws\S3\S3UriParser S3 URI parser */
    private $parser;

    public function __construct()
    {
        $this->parser = new S3UriParser();
    }

    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        // Ensure that the signable query string parameters are sorted
        sort($this->signableQueryString);

        // Add the security token header if one is being used by the credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('X-Amz-Security-Token', $token);
        }

        // Add a date header if one is not set
        $request->removeHeader('X-Amz-Date');
        $request->setHeader('Date', gmdate(\DateTime::RFC2822));
        $stringToSign = $this->createCanonicalizedString($request);
        $request->getConfig()['aws.signature'] = $stringToSign;

        $request->setHeader(
            'Authorization',
            'AWS ' . $credentials->getAccessKeyId() . ':'
                . $this->signString($stringToSign, $credentials)
        );
    }

    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        // Operate on a clone of the request, so the original is not altered.
        $request = clone $request;

        // URL encoding already occurs in the URI template expansion. Undo that
        // and encode using the same encoding as GET object, PUT object, etc.
        $path = S3Client::encodeKey(rawurldecode($request->getPath()));
        $request->setPath($path);

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $request->setHeader('X-Amz-Security-Token', $token);
            $request->getQuery()->set('X-Amz-Security-Token', $token);
        }

        if ($expires instanceof \DateTime) {
            $expires = $expires->getTimestamp();
        } elseif (!is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        // Set query params required for pre-signed URLs
        $query = $request->getQuery();
        $query['AWSAccessKeyId'] = $credentials->getAccessKeyId();
        $query['Expires'] = $expires;
        $query['Signature'] = $this->signString(
            $this->createCanonicalizedString($request, $expires),
            $credentials
        );

        // Move X-Amz-* headers to the query string
        foreach ($request->getHeaders() as $name => $header) {
            $name = strtolower($name);
            if (strpos($name, 'x-amz-') === 0) {
                $request->getQuery()->set($name, implode(',', $header));
                $request->removeHeader($name);
            }
        }

        return $request->getUrl();
    }

    private function signString($string, CredentialsInterface $credentials)
    {
        return base64_encode(
            hash_hmac('sha1', $string, $credentials->getSecretKey(), true)
        );
    }

    private function createCanonicalizedString(
        RequestInterface $request,
        $expires = null
    ) {
        $buffer = $request->getMethod() . "\n";

        // Add the interesting headers
        foreach ($this->signableHeaders as $header) {
            $buffer .= $request->getHeader($header) . "\n";
        }

        $date = $expires ?: $request->getHeader('date');
        $buffer .= "{$date}\n"
            . $this->createCanonicalizedAmzHeaders($request)
            . $this->createCanonicalizedResource($request);

        return $buffer;
    }

    private function createCanonicalizedAmzHeaders(RequestInterface $request)
    {
        $headers = [];
        foreach ($request->getHeaders() as $name => $header) {
            $name = strtolower($name);
            if (strpos($name, 'x-amz-') === 0) {
                $value = implode(',', $header);
                if (strlen($value) > 0) {
                    $headers[$name] = $name . ':' . $value;
                }
            }
        }

        if (!$headers) {
            return '';
        }

        ksort($headers);

        return implode("\n", $headers) . "\n";
    }

    private function createCanonicalizedResource(RequestInterface $request)
    {
        $data = $this->parser->parse($request->getUrl());
        $buffer = '/';

        if ($data['bucket']) {
            $buffer .= $data['bucket'];
            if (!empty($data['key']) || !$data['path_style']) {
                $buffer .= '/' . $data['key'];
            }
        }

        // Add sub resource parameters
        $query = $request->getQuery();
        $first = true;
        foreach ($this->signableQueryString as $key) {
            if ($query->hasKey($key)) {
                $value = $query[$key];
                $buffer .= $first ? '?' : '&';
                $first = false;
                $buffer .= $key;
                // Don't add values for empty sub-resources
                if (strlen($value)) {
                    $buffer .= "={$value}";
                }
            }
        }

        return $buffer;
    }
}
