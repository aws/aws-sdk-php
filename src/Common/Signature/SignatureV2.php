<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;
use GuzzleHttp\Post\PostBodyInterface;

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
        /** @var PostBodyInterface $body */
        $body = $request->getBody();
        $body->setField('Timestamp', gmdate('c'));
        $body->setField('SignatureVersion', '2');
        $body->setField('SignatureMethod', 'HmacSHA256');
        $body->setField('AWSAccessKeyId', $credentials->getAccessKeyId());

        if ($token = $credentials->getSecurityToken()) {
            $body->setField('SecurityToken', $token);
        }

        // build string to sign
        $sign = $request->getMethod() . "\n"
            . $request->getHost() . "\n"
            . '/' . "\n"
            . $this->getCanonicalizedParameterString($body);

        $request->getConfig()->set('aws.signature', $sign);

        $body->setField('Signature', base64_encode(
            hash_hmac(
                'sha256',
                $sign,
                $credentials->getSecretKey(),
                true
            )
        ));
    }

    private function getCanonicalizedParameterString(PostBodyInterface $body)
    {
        $params = $body->getFields();
        unset($params['Signature']);
        uksort($params, 'strcmp');

        $str = '';
        foreach ($params as $key => $val) {
            $str .= rawurlencode($key) . '=' . rawurlencode($val) . '&';
        }

        return substr($str, 0, -1);
    }
}
