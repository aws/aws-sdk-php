<?php
namespace Aws\Token;

use Psr\Http\Message\RequestInterface;

/**
 * Interface used to provide interchangeable strategies for adding authorization
 * to requests using the various AWS signature protocols.
 */
class BearerTokenAuthorization implements TokenAuthorization
{
    /**
     * Adds the specified token to a request by adding the required headers.
     *
     * @param RequestInterface     $request     Request to sign
     * @param TokenInterface       $token       Token
     *
     * @return RequestInterface Returns the modified request.
     */
    public function authorizeRequest(
        RequestInterface $request,
        TokenInterface $token
    ) {
        $accessToken = $token->getToken();
        return $request->withHeader('Authorization', "Bearer {$accessToken}");
    }

}
