<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;

/**
 * Implementation of Signature Version 3 HTTPS
 */
class SignatureV3Https extends AbstractSignature
{
    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    ) {
        $request->removeHeader('x-amz-date');
        $request->setHeader('Date', gmdate('D, d M Y H:i:s \G\M\T'));

        if ($credentials->getSecurityToken()) {
            $request->setHeader(
                'x-amz-security-token',
                $credentials->getSecurityToken()
            );
        }

        // Calculate the signature
        $signature = base64_encode(hash_hmac(
            'sha256',
            $request->getHeader('Date'),
            $credentials->getSecretKey(),
            true
        ));

        $headerFormat = 'AWS3-HTTPS AWSAccessKeyId=%s,Algorithm=HmacSHA256,Signature=%s';
        $request->setHeader(
            'X-Amzn-Authorization',
            sprintf($headerFormat, $credentials->getAccessKeyId(), $signature)
        );
    }
}
