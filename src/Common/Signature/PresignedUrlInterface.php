<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;

/**
 * Interface that allows pre-signed URLs
 */
interface PresignedUrlInterface extends SignatureInterface
{
    /**
     * Create a pre-signed URL
     *
     * @param RequestInterface     $request Request to sign
     * @param CredentialsInterface $credentials Credentials used to sign
     * @param int|string|\DateTime $expires The time at which the URL should
     *     expire. This can be a Unix timestamp, a PHP DateTime object, or a
     *     string that can be evaluated by strtotime.
     *
     * @return string
     */
    public function createPresignedUrl(
        RequestInterface $request,
        CredentialsInterface $credentials,
        $expires
    );
}
