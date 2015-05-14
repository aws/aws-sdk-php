<?php

namespace Aws\DirectoryService;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS Directory Service
 *
 * @method Model connectDirectory(array $args = array()) {@command DirectoryService ConnectDirectory}
 * @method Model createAlias(array $args = array()) {@command DirectoryService CreateAlias}
 * @method Model createComputer(array $args = array()) {@command DirectoryService CreateComputer}
 * @method Model createDirectory(array $args = array()) {@command DirectoryService CreateDirectory}
 * @method Model createSnapshot(array $args = array()) {@command DirectoryService CreateSnapshot}
 * @method Model deleteDirectory(array $args = array()) {@command DirectoryService DeleteDirectory}
 * @method Model deleteSnapshot(array $args = array()) {@command DirectoryService DeleteSnapshot}
 * @method Model describeDirectories(array $args = array()) {@command DirectoryService DescribeDirectories}
 * @method Model describeSnapshots(array $args = array()) {@command DirectoryService DescribeSnapshots}
 * @method Model disableRadius(array $args = array()) {@command DirectoryService DisableRadius}
 * @method Model disableSso(array $args = array()) {@command DirectoryService DisableSso}
 * @method Model enableRadius(array $args = array()) {@command DirectoryService EnableRadius}
 * @method Model enableSso(array $args = array()) {@command DirectoryService EnableSso}
 * @method Model getDirectoryLimits(array $args = array()) {@command DirectoryService GetDirectoryLimits}
 * @method Model getSnapshotLimits(array $args = array()) {@command DirectoryService GetSnapshotLimits}
 * @method Model restoreFromSnapshot(array $args = array()) {@command DirectoryService RestoreFromSnapshot}
 * @method Model updateRadius(array $args = array()) {@command DirectoryService UpdateRadius}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-directoryservice.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.DirectoryService.DirectoryServiceClient.html API docs
 */
class DirectoryServiceClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-04-16';

    /**
     * Factory method to create a new AWS Directory Service client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/directoryservice-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
