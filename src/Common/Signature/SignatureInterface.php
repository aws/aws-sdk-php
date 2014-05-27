<?php
namespace Aws\Common\Signature;

use Aws\Common\Credentials\CredentialsInterface;
use GuzzleHttp\Message\RequestInterface;

/**
 * Interface used to provide interchangeable strategies for signing requests
 * using the various AWS signature protocols.
 */
interface SignatureInterface
{
    /**
     * Signs the specified request with an AWS signing protocol by using the
     * provided AWS account credentials and adding the required headers to the
     * request.
     *
     * @param RequestInterface     $request     Request to sign
     * @param CredentialsInterface $credentials Signing credentials
     */
    public function signRequest(
        RequestInterface $request,
        CredentialsInterface $credentials
    );

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
