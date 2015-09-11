<?php
namespace Aws\ElasticBeanstalk;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elastic Beanstalk** service.
 *
 * @method \Aws\Result abortEnvironmentUpdate(array $args = [])
 * @method \Aws\Result checkDNSAvailability(array $args = [])
 * @method \Aws\Result createApplication(array $args = [])
 * @method \Aws\Result createApplicationVersion(array $args = [])
 * @method \Aws\Result createConfigurationTemplate(array $args = [])
 * @method \Aws\Result createEnvironment(array $args = [])
 * @method \Aws\Result createStorageLocation(array $args = [])
 * @method \Aws\Result deleteApplication(array $args = [])
 * @method \Aws\Result deleteApplicationVersion(array $args = [])
 * @method \Aws\Result deleteConfigurationTemplate(array $args = [])
 * @method \Aws\Result deleteEnvironmentConfiguration(array $args = [])
 * @method \Aws\Result describeApplicationVersions(array $args = [])
 * @method \Aws\Result describeApplications(array $args = [])
 * @method \Aws\Result describeConfigurationOptions(array $args = [])
 * @method \Aws\Result describeConfigurationSettings(array $args = [])
 * @method \Aws\Result describeEnvironmentHealth(array $args = [])
 * @method \Aws\Result describeEnvironmentResources(array $args = [])
 * @method \Aws\Result describeEnvironments(array $args = [])
 * @method \Aws\Result describeEvents(array $args = [])
 * @method \Aws\Result describeInstancesHealth(array $args = [])
 * @method \Aws\Result listAvailableSolutionStacks(array $args = [])
 * @method \Aws\Result rebuildEnvironment(array $args = [])
 * @method \Aws\Result requestEnvironmentInfo(array $args = [])
 * @method \Aws\Result restartAppServer(array $args = [])
 * @method \Aws\Result retrieveEnvironmentInfo(array $args = [])
 * @method \Aws\Result swapEnvironmentCNAMEs(array $args = [])
 * @method \Aws\Result terminateEnvironment(array $args = [])
 * @method \Aws\Result updateApplication(array $args = [])
 * @method \Aws\Result updateApplicationVersion(array $args = [])
 * @method \Aws\Result updateConfigurationTemplate(array $args = [])
 * @method \Aws\Result updateEnvironment(array $args = [])
 * @method \Aws\Result validateConfigurationSettings(array $args = [])
 */
class ElasticBeanstalkClient extends AwsClient {}
