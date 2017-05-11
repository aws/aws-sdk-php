<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use Aws\Exception\CouldNotCreateChecksumException;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * Signature Version 2
 * @link http://docs.aws.amazon.com/general/latest/gr/signature-version-2.html
 */
class SignatureV2 implements SignatureInterface
{
    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $params = Psr7\parse_query($request->getBody());
        $params['Timestamp'] = gmdate('c');
        $params['SignatureVersion'] = '2';
        $params['SignatureMethod'] = 'HmacSHA256';
        $params['AWSAccessKeyId'] = $credentials->getAccessKeyId();

        // build string to sign
        $sign = $request->getMethod() . "\n"
            . $request->getHeaderLine('Host') . "\n"
            . '/' . "\n"
            . $this->getCanonicalizedParameterString($params);

        $params['Signature'] = base64_encode(
            hash_hmac(
                'sha256',
                $sign,
                $credentials->getSecretKey(),
                true
            )
        );

        return $request->withBody(Psr7\stream_for(http_build_query($params)));
    }

     /**
     * Always add a x-amz-content-sha-1 for data integrity.
     */
    public function presign(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        $parsed = $this->createPresignedRequest($request, $credentials);
        $params = Psr7\parse_query($request->getBody());

        $parsed['query']['AWSAccessKeyId'] = $credentials->getAccessKeyId();
        $parsed['query']['SignatureMethod'] = 'HmacSHA256';
        $parsed['query']['SignatureVersion'] = '2';
        $parsed['query']['Timestamp'] = gmdate('c');
        $parsed['query']['Expires'] = $this->convertExpires($expires) + time();

        // build string to sign
        $sign = $request->getMethod() . "\n"
            . $request->getHeaderLine('Host') . "\n"
            . '/' . "\n"
            . $this->getCanonicalizedParameterString($params);

        $parsed['query']['Signature'] = base64_encode(
            hash_hmac(
                'sha256',
                $sign,
                $credentials->getSecretKey(),
                true
            )
        );

        return $this->buildRequest($parsed);
    }

    public function getCanonicalizedParameterString(array $params)
    {
        unset($params['Signature']);
        uksort($params, 'strcmp');

        $str = '';
        foreach ($params as $key => $val) {
            $str .= rawurlencode($key) . '=' . rawurlencode($val) . '&';
        }

        return substr($str, 0, -1);
    }

    public function createPresignedRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $parsedRequest = $this->parseRequest($request);

        // Make sure to handle temporary credentials
        if ($token = $credentials->getSecurityToken()) {
            $parsedRequest['headers']['SecurityToken'] = [$token];
        }

        return $this->moveHeadersToQuery($parsedRequest);
    }

    public function moveHeadersToQuery(array $parsedRequest)
    {
        foreach ($parsedRequest['headers'] as $name => $header) {
            $lname = strtolower($name);
            if (substr($lname, 0, 5) == 'x-amz') {
                $parsedRequest['query'][$name] = $header;
            }
            if ($lname !== 'host') {
                unset($parsedRequest['headers'][$name]);
            }
        }

        return $parsedRequest;
    }

    public function parseRequest(RequestInterface $request)
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

    public function convertExpires($expires)
    {
        if ($expires instanceof \DateTime) {
            $expires = $expires->getTimestamp();
        } elseif (!is_numeric($expires)) {
            $expires = strtotime($expires);
        }

        return $expires;
    }

    public function buildRequest(array $req)
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
