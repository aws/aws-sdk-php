<?php

namespace Aws\WorkSpaces;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon WorkSpaces
 *
 * @method Model createWorkspaces(array $args = array()) {@command WorkSpaces CreateWorkspaces}
 * @method Model describeWorkspaceBundles(array $args = array()) {@command WorkSpaces DescribeWorkspaceBundles}
 * @method Model describeWorkspaceDirectories(array $args = array()) {@command WorkSpaces DescribeWorkspaceDirectories}
 * @method Model describeWorkspaces(array $args = array()) {@command WorkSpaces DescribeWorkspaces}
 * @method Model rebootWorkspaces(array $args = array()) {@command WorkSpaces RebootWorkspaces}
 * @method Model rebuildWorkspaces(array $args = array()) {@command WorkSpaces RebuildWorkspaces}
 * @method Model terminateWorkspaces(array $args = array()) {@command WorkSpaces TerminateWorkspaces}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-workspaces.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.WorkSpaces.WorkSpacesClient.html API docs
 */
class WorkSpacesClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-04-08';

    /**
     * Factory method to create a new Amazon WorkSpaces client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/workspaces-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
