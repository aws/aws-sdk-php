<?php
namespace Aws\DeviceFarm;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DeviceFarm** service.
 *
 * @method \Aws\Result createDevicePool(array $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @method \Aws\Result createUpload(array $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @method \Aws\Result getDevice(array $args = [])
 * @method \Aws\Result getDevicePool(array $args = [])
 * @method \Aws\Result getDevicePoolCompatibility(array $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @method \Aws\Result getProject(array $args = [])
 * @method \Aws\Result getRun(array $args = [])
 * @method \Aws\Result getSuite(array $args = [])
 * @method \Aws\Result getTest(array $args = [])
 * @method \Aws\Result getUpload(array $args = [])
 * @method \Aws\Result listArtifacts(array $args = [])
 * @method \Aws\Result listDevicePools(array $args = [])
 * @method \Aws\Result listDevices(array $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @method \Aws\Result listRuns(array $args = [])
 * @method \Aws\Result listSamples(array $args = [])
 * @method \Aws\Result listSuites(array $args = [])
 * @method \Aws\Result listTests(array $args = [])
 * @method \Aws\Result listUniqueProblems(array $args = [])
 * @method \Aws\Result listUploads(array $args = [])
 * @method \Aws\Result scheduleRun(array $args = [])
 */
class DeviceFarmClient extends AwsClient {}