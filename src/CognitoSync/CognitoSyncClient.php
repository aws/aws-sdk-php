<?php
namespace Aws\CognitoSync;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Sync** service.
 *
 * @method \Aws\Result bulkPublish(array $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @method \Aws\Result describeIdentityPoolUsage(array $args = [])
 * @method \Aws\Result describeIdentityUsage(array $args = [])
 * @method \Aws\Result getBulkPublishDetails(array $args = [])
 * @method \Aws\Result getCognitoEvents(array $args = [])
 * @method \Aws\Result getIdentityPoolConfiguration(array $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @method \Aws\Result listIdentityPoolUsage(array $args = [])
 * @method \Aws\Result listRecords(array $args = [])
 * @method \Aws\Result registerDevice(array $args = [])
 * @method \Aws\Result setCognitoEvents(array $args = [])
 * @method \Aws\Result setIdentityPoolConfiguration(array $args = [])
 * @method \Aws\Result subscribeToDataset(array $args = [])
 * @method \Aws\Result unsubscribeFromDataset(array $args = [])
 * @method \Aws\Result updateRecords(array $args = [])
 */
class CognitoSyncClient extends AwsClient {}
