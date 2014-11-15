<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;

/**
 * Amazon S3 signature version 4 support.
 */
class S3SignatureV4 extends SignatureV4
{
    /**
     * Always add a x-amz-content-sha-256 for data integrity.
     */
    public function signRequest(RequestInterface $request, CredentialsInterface $credentials)
    {
        if (!$request->hasHeader('x-amz-content-sha256')) {
            $request->setHeader(
                'X-Amz-Content-Sha256',
                $this->getPayload($request)
            );
        }

        parent::signRequest($request, $credentials);
    }

    /**
     * Override used to allow pre-signed URLs to be created for an
     * in-determinate request payload.
     */
    protected function getPresignedPayload(RequestInterface $request)
    {
        return 'UNSIGNED-PAYLOAD';
    }
}
