<?php
namespace Aws\CognitoSync;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonRestExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Cognito Sync
 *
 * @method Model bulkPublish(array $args = array()) {@command CognitoSync BulkPublish}
 * @method Model deleteDataset(array $args = array()) {@command CognitoSync DeleteDataset}
 * @method Model describeDataset(array $args = array()) {@command CognitoSync DescribeDataset}
 * @method Model describeIdentityPoolUsage(array $args = array()) {@command CognitoSync DescribeIdentityPoolUsage}
 * @method Model describeIdentityUsage(array $args = array()) {@command CognitoSync DescribeIdentityUsage}
 * @method Model getBulkPublishDetails(array $args = array()) {@command CognitoSync GetBulkPublishDetails}
 * @method Model getCognitoEvents(array $args = array()) {@command CognitoSync GetCognitoEvents}
 * @method Model getIdentityPoolConfiguration(array $args = array()) {@command CognitoSync GetIdentityPoolConfiguration}
 * @method Model listDatasets(array $args = array()) {@command CognitoSync ListDatasets}
 * @method Model listIdentityPoolUsage(array $args = array()) {@command CognitoSync ListIdentityPoolUsage}
 * @method Model listRecords(array $args = array()) {@command CognitoSync ListRecords}
 * @method Model registerDevice(array $args = array()) {@command CognitoSync RegisterDevice}
 * @method Model setCognitoEvents(array $args = array()) {@command CognitoSync SetCognitoEvents}
 * @method Model setIdentityPoolConfiguration(array $args = array()) {@command CognitoSync SetIdentityPoolConfiguration}
 * @method Model subscribeToDataset(array $args = array()) {@command CognitoSync SubscribeToDataset}
 * @method Model unsubscribeFromDataset(array $args = array()) {@command CognitoSync UnsubscribeFromDataset}
 * @method Model updateRecords(array $args = array()) {@command CognitoSync UpdateRecords}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-cognitosync.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.CognitoSync.CognitoSyncClient.html API docs
 */
class CognitoSyncClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-06-30';

    /**
     * Factory method to create a new Amazon Cognito Sync client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/cognitosync-%s.php',
            ))
            ->setExceptionParser(new JsonRestExceptionParser)
            ->build();
    }
}
