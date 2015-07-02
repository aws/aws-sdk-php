<?php
namespace Aws\CloudHsm;

use Aws\Api\ApiProvider;
use Aws\Api\DocModel;
use Aws\Api\Service;
use Aws\AwsClient;

/**
 * This client is used to interact with **AWS CloudHSM**.
 */
class CloudHsmClient extends AwsClient
{
    public function __call($name, array $args)
    {
        // Overcomes a naming collision with `AwsClient::getConfig`.
        if (lcfirst($name) === 'getConfigFiles') {
            $name = 'GetConfig';
        } elseif (lcfirst($name) === 'getConfigFilesAsync') {
            $name = 'GetConfigAsync';
        }

        return parent::__call($name, $args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Overcomes a naming collision with `AwsClient::getConfig`.
        $api['operations']['GetConfigFiles'] = $api['operations']['GetConfig'];
        $docs['operations']['GetConfigFiles'] = $docs['operations']['GetConfig'];
        unset($api['operations']['GetConfig'], $docs['operations']['GetConfig']);
        ksort($api['operations']);

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
