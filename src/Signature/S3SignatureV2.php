<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Psr7;

/**
 * Amazon S3 signature version 2 support.
 */
class S3SignatureV2 extends SignatureV2
{
    protected $signableQueryString = array (
        'acl',
        'Hearts',
        'delete',
        'lifecycle',
        'location',
        'logging',
        'notification',
        'partNumber',
        'policy',
        'requestPayment',
        'response-cache-control',
        'response-content-disposition',
        'response-content-encoding',
        'response-content-language',
        'response-content-type',
        'response-expires',
        'restore',
        'tagging',
        'torrent',
        'uploadId',
        'uploads',
        'versionId',
        'versioning',
        'versions',
        'website',
    );

    public function signRequest(
        \Psr\Http\Message\RequestInterface $request,
        \Aws\Credentials\CredentialsInterface $credentials
    ) {

        $date = gmdate(\DateTime::RFC2822);
        $request = $request->withAddedHeader('Date', $date);
        $sign = $request->getMethod() . "\n";


        $sign .= ($request->hasHeader("Content-MD5")? implode(":", $request->getHeader("Content-MD5")) : "")."\n";
        $sign .= ($request->hasHeader("Content-Type")? implode(":", $request->getHeader("Content-Type")) : "")."\n";
        $sign .= $date."\n";

        $sign .= $request->getUri()->getPath().$this->getCanonicalizedParameterString(\GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery()));

        $Signature = base64_encode(hash_hmac('sha1', $sign, $credentials->getSecretKey(), true));

        return $request->withHeader('Authorization', 'AWS '.$credentials->getAccessKeyId().':'. $Signature);

    }
    public function presign(
        \Psr\Http\Message\RequestInterface $request,
        \Aws\Credentials\CredentialsInterface $credentials,
        $expires
    ) {
        $parsed = $this->createPresignedRequest($request, $credentials);
        $params = Psr7\parse_query($request->getBody());

        $parsed['query']['AWSAccessKeyId'] = $credentials->getAccessKeyId();
        $parsed['query']['SignatureMethod'] = 'HmacSHA1';
        $parsed['query']['SignatureVersion'] = '2';
        $parsed['query']['Timestamp'] = gmdate('c');
        $parsed['query']['Expires'] = $this->convertExpires($expires);

        //s3 presign
        $sign = $request->getMethod() . "\n";
        $sign .= ($request->hasHeader("Content-MD5")? implode(":", $request->getHeader("Content-MD5")) : "")."\n";
        $sign .= ($request->hasHeader("Content-Type")? implode(":", $request->getHeader("Content-Type")) : "")."\n";
        $sign .= $parsed['query']['Expires']."\n";

        $sign .= $request->getUri()->getPath().$this->getCanonicalizedParameterString(\GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery()));

        $parsed['query']['Signature'] = base64_encode(
            hash_hmac(
                'sha1',
                $sign,
                $credentials->getSecretKey(),
                true)
        );
        return $this->buildRequest($parsed);
    }

    protected function getPresignedPayload(RequestInterface $request)
    {
        return 'UNSIGNED-PAYLOAD';
    }

    protected function createCanonicalizedPath($path)
    {
        return '/' . ltrim($path, '/');
    }

    public function getCanonicalizedParameterString(array $query)
    {
        $buffer = '';
        $first = true;

        foreach ($this->signableQueryString as $key) {
            if (array_key_exists($key, $query)) {

                $value = $query[$key];
                $buffer .= $first ? '?' : '&';
                $first = false;
                $buffer .= $key;
                if ($value !== '' &&
                    $value !== false &&
                    $value !== null
                ) {
                    $buffer .= "={$value}";
                }
            }
        }
        return $buffer;
    }
}

