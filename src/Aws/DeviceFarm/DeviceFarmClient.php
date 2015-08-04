<?php

namespace Aws\DeviceFarm;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Device Farm
 *
 * @method Model createDevicePool(array $args = array()) {@command DeviceFarm CreateDevicePool}
 * @method Model createProject(array $args = array()) {@command DeviceFarm CreateProject}
 * @method Model createUpload(array $args = array()) {@command DeviceFarm CreateUpload}
 * @method Model getAccountSettings(array $args = array()) {@command DeviceFarm GetAccountSettings}
 * @method Model getDevice(array $args = array()) {@command DeviceFarm GetDevice}
 * @method Model getDevicePool(array $args = array()) {@command DeviceFarm GetDevicePool}
 * @method Model getDevicePoolCompatibility(array $args = array()) {@command DeviceFarm GetDevicePoolCompatibility}
 * @method Model getJob(array $args = array()) {@command DeviceFarm GetJob}
 * @method Model getProject(array $args = array()) {@command DeviceFarm GetProject}
 * @method Model getRun(array $args = array()) {@command DeviceFarm GetRun}
 * @method Model getSuite(array $args = array()) {@command DeviceFarm GetSuite}
 * @method Model getTest(array $args = array()) {@command DeviceFarm GetTest}
 * @method Model getUpload(array $args = array()) {@command DeviceFarm GetUpload}
 * @method Model listArtifacts(array $args = array()) {@command DeviceFarm ListArtifacts}
 * @method Model listDevicePools(array $args = array()) {@command DeviceFarm ListDevicePools}
 * @method Model listDevices(array $args = array()) {@command DeviceFarm ListDevices}
 * @method Model listJobs(array $args = array()) {@command DeviceFarm ListJobs}
 * @method Model listProjects(array $args = array()) {@command DeviceFarm ListProjects}
 * @method Model listRuns(array $args = array()) {@command DeviceFarm ListRuns}
 * @method Model listSamples(array $args = array()) {@command DeviceFarm ListSamples}
 * @method Model listSuites(array $args = array()) {@command DeviceFarm ListSuites}
 * @method Model listTests(array $args = array()) {@command DeviceFarm ListTests}
 * @method Model listUniqueProblems(array $args = array()) {@command DeviceFarm ListUniqueProblems}
 * @method Model listUploads(array $args = array()) {@command DeviceFarm ListUploads}
 * @method Model scheduleRun(array $args = array()) {@command DeviceFarm ScheduleRun}
 * @method ResourceIteratorInterface getListArtifactsIterator(array $args = array()) The input array uses the parameters of the ListArtifacts operation
 * @method ResourceIteratorInterface getListDevicePoolsIterator(array $args = array()) The input array uses the parameters of the ListDevicePools operation
 * @method ResourceIteratorInterface getListDevicesIterator(array $args = array()) The input array uses the parameters of the ListDevices operation
 * @method ResourceIteratorInterface getListJobsIterator(array $args = array()) The input array uses the parameters of the ListJobs operation
 * @method ResourceIteratorInterface getListProjectsIterator(array $args = array()) The input array uses the parameters of the ListProjects operation
 * @method ResourceIteratorInterface getListRunsIterator(array $args = array()) The input array uses the parameters of the ListRuns operation
 * @method ResourceIteratorInterface getListSamplesIterator(array $args = array()) The input array uses the parameters of the ListSamples operation
 * @method ResourceIteratorInterface getListSuitesIterator(array $args = array()) The input array uses the parameters of the ListSuites operation
 * @method ResourceIteratorInterface getListTestsIterator(array $args = array()) The input array uses the parameters of the ListTests operation
 * @method ResourceIteratorInterface getListUniqueProblemsIterator(array $args = array()) The input array uses the parameters of the ListUniqueProblems operation
 * @method ResourceIteratorInterface getListUploadsIterator(array $args = array()) The input array uses the parameters of the ListUploads operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-devicefarm.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.DeviceFarm.DeviceFarmClient.html API docs
 */
class DeviceFarmClient extends AbstractClient
{
    const LATEST_API_VERSION = '2015-06-23';

    /**
     * Factory method to create a new AWS Device Farm client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/devicefarm-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
