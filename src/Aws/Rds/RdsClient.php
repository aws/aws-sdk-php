<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Rds;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with Amazon Relational Database Service
 *
 * @method Model addSourceIdentifierToSubscription(array $args = array()) {@command Rds AddSourceIdentifierToSubscription}
 * @method Model addTagsToResource(array $args = array()) {@command Rds AddTagsToResource}
 * @method Model applyPendingMaintenanceAction(array $args = array()) {@command Rds ApplyPendingMaintenanceAction}
 * @method Model authorizeDBSecurityGroupIngress(array $args = array()) {@command Rds AuthorizeDBSecurityGroupIngress}
 * @method Model copyDBClusterSnapshot(array $args = array()) {@command Rds CopyDBClusterSnapshot}
 * @method Model copyDBParameterGroup(array $args = array()) {@command Rds CopyDBParameterGroup}
 * @method Model copyDBSnapshot(array $args = array()) {@command Rds CopyDBSnapshot}
 * @method Model copyOptionGroup(array $args = array()) {@command Rds CopyOptionGroup}
 * @method Model createDBCluster(array $args = array()) {@command Rds CreateDBCluster}
 * @method Model createDBClusterParameterGroup(array $args = array()) {@command Rds CreateDBClusterParameterGroup}
 * @method Model createDBClusterSnapshot(array $args = array()) {@command Rds CreateDBClusterSnapshot}
 * @method Model createDBInstance(array $args = array()) {@command Rds CreateDBInstance}
 * @method Model createDBInstanceReadReplica(array $args = array()) {@command Rds CreateDBInstanceReadReplica}
 * @method Model createDBParameterGroup(array $args = array()) {@command Rds CreateDBParameterGroup}
 * @method Model createDBSecurityGroup(array $args = array()) {@command Rds CreateDBSecurityGroup}
 * @method Model createDBSnapshot(array $args = array()) {@command Rds CreateDBSnapshot}
 * @method Model createDBSubnetGroup(array $args = array()) {@command Rds CreateDBSubnetGroup}
 * @method Model createEventSubscription(array $args = array()) {@command Rds CreateEventSubscription}
 * @method Model createOptionGroup(array $args = array()) {@command Rds CreateOptionGroup}
 * @method Model deleteDBCluster(array $args = array()) {@command Rds DeleteDBCluster}
 * @method Model deleteDBClusterParameterGroup(array $args = array()) {@command Rds DeleteDBClusterParameterGroup}
 * @method Model deleteDBClusterSnapshot(array $args = array()) {@command Rds DeleteDBClusterSnapshot}
 * @method Model deleteDBInstance(array $args = array()) {@command Rds DeleteDBInstance}
 * @method Model deleteDBParameterGroup(array $args = array()) {@command Rds DeleteDBParameterGroup}
 * @method Model deleteDBSecurityGroup(array $args = array()) {@command Rds DeleteDBSecurityGroup}
 * @method Model deleteDBSnapshot(array $args = array()) {@command Rds DeleteDBSnapshot}
 * @method Model deleteDBSubnetGroup(array $args = array()) {@command Rds DeleteDBSubnetGroup}
 * @method Model deleteEventSubscription(array $args = array()) {@command Rds DeleteEventSubscription}
 * @method Model deleteOptionGroup(array $args = array()) {@command Rds DeleteOptionGroup}
 * @method Model describeAccountAttributes(array $args = array()) {@command Rds DescribeAccountAttributes}
 * @method Model describeCertificates(array $args = array()) {@command Rds DescribeCertificates}
 * @method Model describeDBClusterParameterGroups(array $args = array()) {@command Rds DescribeDBClusterParameterGroups}
 * @method Model describeDBClusterParameters(array $args = array()) {@command Rds DescribeDBClusterParameters}
 * @method Model describeDBClusterSnapshots(array $args = array()) {@command Rds DescribeDBClusterSnapshots}
 * @method Model describeDBClusters(array $args = array()) {@command Rds DescribeDBClusters}
 * @method Model describeDBEngineVersions(array $args = array()) {@command Rds DescribeDBEngineVersions}
 * @method Model describeDBInstances(array $args = array()) {@command Rds DescribeDBInstances}
 * @method Model describeDBLogFiles(array $args = array()) {@command Rds DescribeDBLogFiles}
 * @method Model describeDBParameterGroups(array $args = array()) {@command Rds DescribeDBParameterGroups}
 * @method Model describeDBParameters(array $args = array()) {@command Rds DescribeDBParameters}
 * @method Model describeDBSecurityGroups(array $args = array()) {@command Rds DescribeDBSecurityGroups}
 * @method Model describeDBSnapshots(array $args = array()) {@command Rds DescribeDBSnapshots}
 * @method Model describeDBSubnetGroups(array $args = array()) {@command Rds DescribeDBSubnetGroups}
 * @method Model describeEngineDefaultClusterParameters(array $args = array()) {@command Rds DescribeEngineDefaultClusterParameters}
 * @method Model describeEngineDefaultParameters(array $args = array()) {@command Rds DescribeEngineDefaultParameters}
 * @method Model describeEventCategories(array $args = array()) {@command Rds DescribeEventCategories}
 * @method Model describeEventSubscriptions(array $args = array()) {@command Rds DescribeEventSubscriptions}
 * @method Model describeEvents(array $args = array()) {@command Rds DescribeEvents}
 * @method Model describeOptionGroupOptions(array $args = array()) {@command Rds DescribeOptionGroupOptions}
 * @method Model describeOptionGroups(array $args = array()) {@command Rds DescribeOptionGroups}
 * @method Model describeOrderableDBInstanceOptions(array $args = array()) {@command Rds DescribeOrderableDBInstanceOptions}
 * @method Model describePendingMaintenanceActions(array $args = array()) {@command Rds DescribePendingMaintenanceActions}
 * @method Model describeReservedDBInstances(array $args = array()) {@command Rds DescribeReservedDBInstances}
 * @method Model describeReservedDBInstancesOfferings(array $args = array()) {@command Rds DescribeReservedDBInstancesOfferings}
 * @method Model downloadDBLogFilePortion(array $args = array()) {@command Rds DownloadDBLogFilePortion}
 * @method Model failoverDBCluster(array $args = array()) {@command Rds FailoverDBCluster}
 * @method Model listTagsForResource(array $args = array()) {@command Rds ListTagsForResource}
 * @method Model modifyDBCluster(array $args = array()) {@command Rds ModifyDBCluster}
 * @method Model modifyDBClusterParameterGroup(array $args = array()) {@command Rds ModifyDBClusterParameterGroup}
 * @method Model modifyDBInstance(array $args = array()) {@command Rds ModifyDBInstance}
 * @method Model modifyDBParameterGroup(array $args = array()) {@command Rds ModifyDBParameterGroup}
 * @method Model modifyDBSubnetGroup(array $args = array()) {@command Rds ModifyDBSubnetGroup}
 * @method Model modifyEventSubscription(array $args = array()) {@command Rds ModifyEventSubscription}
 * @method Model modifyOptionGroup(array $args = array()) {@command Rds ModifyOptionGroup}
 * @method Model promoteReadReplica(array $args = array()) {@command Rds PromoteReadReplica}
 * @method Model purchaseReservedDBInstancesOffering(array $args = array()) {@command Rds PurchaseReservedDBInstancesOffering}
 * @method Model rebootDBInstance(array $args = array()) {@command Rds RebootDBInstance}
 * @method Model removeSourceIdentifierFromSubscription(array $args = array()) {@command Rds RemoveSourceIdentifierFromSubscription}
 * @method Model removeTagsFromResource(array $args = array()) {@command Rds RemoveTagsFromResource}
 * @method Model resetDBClusterParameterGroup(array $args = array()) {@command Rds ResetDBClusterParameterGroup}
 * @method Model resetDBParameterGroup(array $args = array()) {@command Rds ResetDBParameterGroup}
 * @method Model restoreDBClusterFromSnapshot(array $args = array()) {@command Rds RestoreDBClusterFromSnapshot}
 * @method Model restoreDBClusterToPointInTime(array $args = array()) {@command Rds RestoreDBClusterToPointInTime}
 * @method Model restoreDBInstanceFromDBSnapshot(array $args = array()) {@command Rds RestoreDBInstanceFromDBSnapshot}
 * @method Model restoreDBInstanceToPointInTime(array $args = array()) {@command Rds RestoreDBInstanceToPointInTime}
 * @method Model revokeDBSecurityGroupIngress(array $args = array()) {@command Rds RevokeDBSecurityGroupIngress}
 * @method waitUntilDBInstanceAvailable(array $input) The input array uses the parameters of the DescribeDBInstances operation and waiter specific settings
 * @method waitUntilDBInstanceDeleted(array $input) The input array uses the parameters of the DescribeDBInstances operation and waiter specific settings
 * @method ResourceIteratorInterface getDescribeEngineDefaultParametersIterator(array $args = array()) The input array uses the parameters of the DescribeEngineDefaultParameters operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-rds.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Rds.RdsClient.html API docs
 */
class RdsClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-10-31';

    /**
     * Factory method to create a new Amazon Relational Database Service client using an array of configuration options.
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
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/rds-%s.php'
            ))
            ->build();
    }
}
