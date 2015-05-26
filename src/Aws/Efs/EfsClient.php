<?php
namespace Aws\Efs;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Elastic File System
 *
 * @method Model createFileSystem(array $args = array()) {@command Efs CreateFileSystem}
 * @method Model createMountTarget(array $args = array()) {@command Efs CreateMountTarget}
 * @method Model createTags(array $args = array()) {@command Efs CreateTags}
 * @method Model deleteFileSystem(array $args = array()) {@command Efs DeleteFileSystem}
 * @method Model deleteMountTarget(array $args = array()) {@command Efs DeleteMountTarget}
 * @method Model deleteTags(array $args = array()) {@command Efs DeleteTags}
 * @method Model describeFileSystems(array $args = array()) {@command Efs DescribeFileSystems}
 * @method Model describeMountTargetSecurityGroups(array $args = array()) {@command Efs DescribeMountTargetSecurityGroups}
 * @method Model describeMountTargets(array $args = array()) {@command Efs DescribeMountTargets}
 * @method Model describeTags(array $args = array()) {@command Efs DescribeTags}
 * @method Model modifyMountTargetSecurityGroups(array $args = array()) {@command Efs ModifyMountTargetSecurityGroups}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-Efs.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Efs.EfsClient.html API docs
 */
class EfsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-02-01';

    /**
     * Factory method to create a new Amazon Elastic File System client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/elasticfilesystem-%s.php'
            ))
            ->build();
    }
}
