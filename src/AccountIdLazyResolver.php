<?php

namespace Aws;

use Aws\Exception\AccountIdNotFoundException;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\Promise;

/**
 * @inheritDoc
 */
class AccountIdLazyResolver implements LazyResolver
{
    const ACCOUNT_ID_ENDPOINT_MODE_DISABLED = 'disabled';
    const ACCOUNT_ID_ENDPOINT_MODE_REQUIRED = 'required';
    const ACCOUNT_ID_ENDPOINT_MODE_PREFERRED = 'preferred';

    /**
     * @var LazyResolver $credentialsProvider
     */
    private $credentialsProvider;
    /**
     * @var string $accountIdEndpointMode
     */
    private $accountIdEndpointMode;

    public function __construct(LazyResolver $credentialsProvider, $accountIdEndpointMode)
    {
        $this->credentialsProvider = $credentialsProvider;
        $this->accountIdEndpointMode = $accountIdEndpointMode;
    }

    /**
     * @inheritDoc
     */
    public function resolve(bool $force = false): mixed
    {
        $identity = $this->credentialsProvider->resolve();
        $accountId = $identity->getAccountId();
        if (empty($accountId)) {
            $message = function ($mode) {
                return "It is ${mode} to resolve an account id based on the 'account_id_endpoint_mode' configuration. \n- If you are using credentials from a shared ini file, please make sure you have configured the property aws_account_id. \n- If you are using credentials defined in environment variables please make sure you have set AWS_ACCOUNT_ID. \n- Otherwise, if you are supplying credentials as part of client constructor parameters, please make sure you have set the property account_id.\n If you prefer to not use account id endpoint resolution then, please make account_id_endpoint_mode to be disabled by either providing it explicitly in the client, defining a config property in your shared config file account_id_endpoint_mode, or by setting an environment variable called AWS_ACCOUNT_ID_ENDPOINT_MODE, and the value for any of those source should be 'disabled' if the desire is to disable this behavior.";
            };

            switch ($this->accountIdEndpointMode) {
                case self::ACCOUNT_ID_ENDPOINT_MODE_REQUIRED:
                    throw new AccountIdNotFoundException($message('required'));
                case self::ACCOUNT_ID_ENDPOINT_MODE_PREFERRED:
                    trigger_error($message('preferred'), E_USER_WARNING);
                    return null;
                case self::ACCOUNT_ID_ENDPOINT_MODE_DISABLED:
                    return null;
                default:
                    throw new \RuntimeException("Unrecognized account_id_endpoint_mode value " . $this->accountIdEndpointMode."\n Valid Values are: [" . implode(', ', [self::ACCOUNT_ID_ENDPOINT_MODE_DISABLED, self::ACCOUNT_ID_ENDPOINT_MODE_PREFERRED, self::ACCOUNT_ID_ENDPOINT_MODE_REQUIRED]) . "]");
            }
        }

        return $accountId;
    }

    /**
     * @inheritDoc
     */
    public function isResolved(): bool
    {
        return true;
    }
}
