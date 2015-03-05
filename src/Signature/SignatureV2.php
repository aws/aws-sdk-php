<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\RequestInterface;

/**
 * Implementation of Signature Version 2
 * @link http://aws.amazon.com/articles/1928
 */
class SignatureV2 extends AbstractSignature
{
    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        parse_str($request->getBody(), $params);
        $params['Timestamp'] = gmdate('c');
        $params['SignatureVersion'] = '2';
        $params['SignatureMethod'] = 'HmacSHA256';
        $params['AWSAccessKeyId'] = $credentials->getAccessKeyId();

        if ($token = $credentials->getSecurityToken()) {
            $params['SecurityToken'] = $token;
        }

        // build string to sign
        $sign = $request->getMethod() . "\n"
            . $request->getHeader('Host') . "\n"
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

        return $request->withBody(Stream::factory(http_build_query($params)));
    }

    private function getCanonicalizedParameterString(array $params)
    {
        unset($params['Signature']);
        uksort($params, 'strcmp');

        $str = '';
        foreach ($params as $key => $val) {
            $str .= rawurlencode($key) . '=' . rawurlencode($val) . '&';
        }

        return substr($str, 0, -1);
    }
}
