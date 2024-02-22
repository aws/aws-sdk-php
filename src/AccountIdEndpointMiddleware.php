<?php
namespace Aws;

use Aws\Exception\CredentialsException;

/**
 * This middleware class resolves the identity from a credentials provider callable function
 * and determine whether an account should have been resolved. When this middleware resolves
 * identity then, the identity is included in the $command context bag property "$command['@context]"
 * as resolved_identity. Example $command['@context]['resolved_identity'] = $resolvedIdentity, and
 * when this property is set then, the signer middleware gives preference to use that resolved identity
 * instead of resolving the provided credentials provider by the client. This is done to avoid having to
 * resolve credentials more than once per request.
 */
class AccountIdEndpointMiddleware
{
    /**
     * @var callable $nextHandler
     */
    private $nextHandler;
    /**
     * @var string $accountIdEndpointMode
     */
    private $accountIdEndpointMode;
    /**
     * @var callable $credentialsProvider
     */
    private $credentialsProvider;

    /**
     * @param callable $nextHandler
     * @param string $accountIdEndpointMode
     * @param callable $credentialsProvider
     */
    public function __construct($nextHandler, $accountIdEndpointMode, $credentialsProvider)
    {
        $this->nextHandler = $nextHandler;
        $this->accountIdEndpointMode = $accountIdEndpointMode;
        $this->credentialsProvider = $credentialsProvider;
    }

    /**
     * This method wraps a new instance of the AccountIdEndpointMiddleware.
     *
     * @param string $accountIddEndpointMode
     * @param callable $credentialsProvider
     * @return callable
     */
    public static function wrap($accountIddEndpointMode, $credentialsProvider): callable
    {
        return function (callable $handler) use ($accountIddEndpointMode, $credentialsProvider) {
            return new self($handler, $accountIddEndpointMode, $credentialsProvider);
        };
    }

    public function __invoke($command)
    {
        $nextHandler = $this->nextHandler;
        $fnCredentialsProvider = $this->credentialsProvider;
        $resolvedIdentity = $fnCredentialsProvider()->wait();
        if (empty($resolvedIdentity->getAccountId())) {
            $message = function ($mode) {
                return "It is ${mode} to resolve an account id based on the 'account_id_endpoint_mode' configuration. \n- If you are using credentials from a shared ini file, please make sure you have configured the property aws_account_id. \n- If you are using credentials defined in environment variables please make sure you have set AWS_ACCOUNT_ID. \n- Otherwise, if you are supplying credentials as part of client constructor parameters, please make sure you have set the property account_id.\n If you prefer to not use account id endpoint resolution then, please make account_id_endpoint_mode to be disabled by either providing it explicitly in the client, defining a config property in your shared config file account_id_endpoint_mode, or by setting an environment variable called AWS_ACCOUNT_ID_ENDPOINT_MODE, and the value for any of those source should be 'disabled' if the desire is to disable this behavior.";
            };
            switch ($this->accountIdEndpointMode) {
                case 'required':
                    throw new CredentialsException($message('required'));
                case 'preferred':
                    error_log('Warning: ' . $message('preferred'), E_WARNING|E_NOTICE);
                    break;
            }
        }

        $command['@context']['resolved_identity'] = $resolvedIdentity;

        return $nextHandler($command);
    }

}
