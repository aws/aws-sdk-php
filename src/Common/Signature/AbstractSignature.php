<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;

abstract class AbstractSignature implements SignatureInterface
{
    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    ) {
        throw new \BadMethodCallException(__METHOD__ . ' not implemented');
    }
}
