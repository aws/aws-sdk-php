<?php
namespace Aws\Signature;

use Aws\Credentials\CredentialsInterface;
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
}
