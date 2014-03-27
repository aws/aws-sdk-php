<?php

namespace Aws;

use Aws\Credentials\Credentials;
use Aws\Credentials\CredentialsInterface;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method AwsClientInterface getAutoScaling(array $args)
 * @method AwsClientInterface getCloudFormation(array $args)
 * @method AwsClientInterface getCloudFront(array $args)
 * @method AwsClientInterface getCloudSearch(array $args)
 * @method AwsClientInterface getCloudTrail(array $args)
 * @method AwsClientInterface getCloudWatch(array $args)
 * @method AwsClientInterface getDataPipeline(array $args)
 * @method AwsClientInterface getDirectConnect(array $args)
 * @method AwsClientInterface getDynamoDb(array $args)
 * @method AwsClientInterface getEc2(array $args)
 * @method AwsClientInterface getElastiCache(array $args)
 * @method AwsClientInterface getElasticBeanstalk(array $args)
 * @method AwsClientInterface getElasticLoadBalancing(array $args)
 * @method AwsClientInterface getElasticTranscoder(array $args)
 * @method AwsClientInterface getEmr(array $args)
 * @method AwsClientInterface getGlacier(array $args)
 * @method AwsClientInterface getIam(array $args)
 * @method AwsClientInterface getImportExport(array $args)
 * @method AwsClientInterface getKinesis(array $args)
 * @method AwsClientInterface getOpsWorks(array $args)
 * @method AwsClientInterface getRds(array $args)
 * @method AwsClientInterface getRedshift(array $args)
 * @method AwsClientInterface getRoute53(array $args)
 * @method AwsClientInterface getS3(array $args)
 * @method AwsClientInterface getSes(array $args)
 * @method AwsClientInterface getSimpleDb(array $args)
 * @method AwsClientInterface getSns(array $args)
 * @method AwsClientInterface getSqs(array $args)
 * @method AwsClientInterface getStorageGateway(array $args)
 * @method AwsClientInterface getSts(array $args)
 * @method AwsClientInterface getSupport(array $args)
 * @method AwsClientInterface getSwf(array $args)
 */
class Builder
{
    /** @var array */
    private $args;

    /** @var AwsClientInterface[] */
    private $clients = [];

    /** @var array Map of client names to client factory class */
    private static $clientMap = [
        ''
    ];

    /**
     * Constructs a new builder object with an associative array of default
     * client settings:
     *
     * - region: The default region name to use when creating clients
     * - signature: A custom signature implementation to use with all clients
     * - credentials: An {@see Aws\Credentials\CredentialsInterface} object to
     *   use with each client OR an associative array of 'key', 'secret', and
     *  'token' key value pairs.
     * - description_provider: Optional service description provider
     * - client_defaults: Optional default client options to use with each client.
     *
     * @param array $args
     * @throws \InvalidArgumentException
     */
    public function __construct(array $args = [])
    {
        static $methods;
        if (!$methods) {
            $methods = array_fill_keys(get_class_methods(__CLASS__), true);
        }

        foreach ($args as $key => $value) {
            $method = 'handle_' . $key;
            if (!isset($methods[$method])) {
                throw new \InvalidArgumentException('Unknown argument ' . $key);
            }
            $this->{$method}($key, $value, $args);
        }
    }

    public function __call($name, array $rags)
    {

    }

    public function getClient($name, array $args = [])
    {

    }

    private function handle_region($value, array &$args)
    {
        $this->args['region'] = $value;
    }

    private function handle_signature($value, array &$args)
    {
        $this->args['signature'] = $value;
    }

    private function handle_credentials($value, array &$args)
    {
        if ($value instanceof CredentialsInterface) {
            $this->args['credentials'] = $value;
            unset($args['key'], $args['secret'], $args['token']);
        } elseif (is_array($value) && isset($value['key']) &&
            isset($value['secret'])
        ) {
            $this->args['credentials'] = Credentials::factory($value);
        } else {
            throw new \InvalidArgumentException('credentials must be an '
                . 'instance of Aws\Credentials\CredentialsInterface or an '
                . 'associative array that contains "key", "secret", and '
                . 'an optional "token" key value pairs.');
        }
    }

    private function handle_client_defaults($value, array &$args)
    {
        if (!is_array($value)) {
            throw new \InvalidArgumentException('The "client_defaults" option'
                . ' must be an array');
        }

        $this->args['client_defaults'] = $value;
    }

    private function handle_description_provider($value, array &$args)
    {
        $this->args['description_provider'] = $value;
    }
}
