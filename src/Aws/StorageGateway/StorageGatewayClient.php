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

namespace Aws\StorageGateway;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;
use Guzzle\Service\Resource\ResourceIteratorInterface;

/**
 * Client to interact with AWS Storage Gateway
 *
 * @method Model activateGateway(array $args = array()) {@command StorageGateway ActivateGateway}
 * @method Model addCache(array $args = array()) {@command StorageGateway AddCache}
 * @method Model addUploadBuffer(array $args = array()) {@command StorageGateway AddUploadBuffer}
 * @method Model addWorkingStorage(array $args = array()) {@command StorageGateway AddWorkingStorage}
 * @method Model createCachediSCSIVolume(array $args = array()) {@command StorageGateway CreateCachediSCSIVolume}
 * @method Model createSnapshot(array $args = array()) {@command StorageGateway CreateSnapshot}
 * @method Model createSnapshotFromVolumeRecoveryPoint(array $args = array()) {@command StorageGateway CreateSnapshotFromVolumeRecoveryPoint}
 * @method Model createStorediSCSIVolume(array $args = array()) {@command StorageGateway CreateStorediSCSIVolume}
 * @method Model deleteBandwidthRateLimit(array $args = array()) {@command StorageGateway DeleteBandwidthRateLimit}
 * @method Model deleteChapCredentials(array $args = array()) {@command StorageGateway DeleteChapCredentials}
 * @method Model deleteGateway(array $args = array()) {@command StorageGateway DeleteGateway}
 * @method Model deleteSnapshotSchedule(array $args = array()) {@command StorageGateway DeleteSnapshotSchedule}
 * @method Model deleteVolume(array $args = array()) {@command StorageGateway DeleteVolume}
 * @method Model describeBandwidthRateLimit(array $args = array()) {@command StorageGateway DescribeBandwidthRateLimit}
 * @method Model describeCache(array $args = array()) {@command StorageGateway DescribeCache}
 * @method Model describeCachediSCSIVolumes(array $args = array()) {@command StorageGateway DescribeCachediSCSIVolumes}
 * @method Model describeChapCredentials(array $args = array()) {@command StorageGateway DescribeChapCredentials}
 * @method Model describeGatewayInformation(array $args = array()) {@command StorageGateway DescribeGatewayInformation}
 * @method Model describeMaintenanceStartTime(array $args = array()) {@command StorageGateway DescribeMaintenanceStartTime}
 * @method Model describeSnapshotSchedule(array $args = array()) {@command StorageGateway DescribeSnapshotSchedule}
 * @method Model describeStorediSCSIVolumes(array $args = array()) {@command StorageGateway DescribeStorediSCSIVolumes}
 * @method Model describeUploadBuffer(array $args = array()) {@command StorageGateway DescribeUploadBuffer}
 * @method Model describeWorkingStorage(array $args = array()) {@command StorageGateway DescribeWorkingStorage}
 * @method Model listGateways(array $args = array()) {@command StorageGateway ListGateways}
 * @method Model listLocalDisks(array $args = array()) {@command StorageGateway ListLocalDisks}
 * @method Model listVolumeRecoveryPoints(array $args = array()) {@command StorageGateway ListVolumeRecoveryPoints}
 * @method Model listVolumes(array $args = array()) {@command StorageGateway ListVolumes}
 * @method Model shutdownGateway(array $args = array()) {@command StorageGateway ShutdownGateway}
 * @method Model startGateway(array $args = array()) {@command StorageGateway StartGateway}
 * @method Model updateBandwidthRateLimit(array $args = array()) {@command StorageGateway UpdateBandwidthRateLimit}
 * @method Model updateChapCredentials(array $args = array()) {@command StorageGateway UpdateChapCredentials}
 * @method Model updateGatewayInformation(array $args = array()) {@command StorageGateway UpdateGatewayInformation}
 * @method Model updateGatewaySoftwareNow(array $args = array()) {@command StorageGateway UpdateGatewaySoftwareNow}
 * @method Model updateMaintenanceStartTime(array $args = array()) {@command StorageGateway UpdateMaintenanceStartTime}
 * @method Model updateSnapshotSchedule(array $args = array()) {@command StorageGateway UpdateSnapshotSchedule}
 * @method ResourceIteratorInterface getDescribeCachediSCSIVolumesIterator(array $args = array()) The input array uses the parameters of the DescribeCachediSCSIVolumes operation
 * @method ResourceIteratorInterface getDescribeStorediSCSIVolumesIterator(array $args = array()) The input array uses the parameters of the DescribeStorediSCSIVolumes operation
 * @method ResourceIteratorInterface getListGatewaysIterator(array $args = array()) The input array uses the parameters of the ListGateways operation
 * @method ResourceIteratorInterface getListLocalDisksIterator(array $args = array()) The input array uses the parameters of the ListLocalDisks operation
 * @method ResourceIteratorInterface getListVolumeRecoveryPointsIterator(array $args = array()) The input array uses the parameters of the ListVolumeRecoveryPoints operation
 * @method ResourceIteratorInterface getListVolumesIterator(array $args = array()) The input array uses the parameters of the ListVolumes operation
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/guide/latest/service-storagegateway.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php-2/latest/class-Aws.StorageGateway.StorageGatewayClient.html API docs
 */
class StorageGatewayClient extends AbstractClient
{
    const LATEST_API_VERSION = '2012-06-30';

    /**
     * Factory method to create a new AWS Storage Gateway client using an array of configuration options.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @see \Aws\Common\Client\DefaultClient for a list of available configuration options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/storagegateway-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
