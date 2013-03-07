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

namespace Aws\Tests\Route53\Integration;

use Aws\Route53\Enum\HealthCheckType;
use Aws\Route53\Enum\Status;
use Aws\Route53\Route53Client;

/**
 * @group integration
 */
class BasicOperationsTest extends \Aws\Tests\IntegrationTestCase
{
    /**
     * @var Route53Client
     */
    protected $route53;

    public function setUp()
    {
        $this->route53 = $this->getServiceBuilder()->get('route53');
    }

    public function testHostedZoneOperations()
    {
        self::log('Create a hosted zone.');
        $result = $this->route53->getCommand('CreateHostedZone', array(
            'Name' => 'integroute53' . self::getResourcePrefix() . '.com',
            'CallerReference' => uniqid('aws-sdk-php-hz-'),
        ))->getResult();
        $zoneId = $result->getPath('HostedZone/Id');
        $this->assertStringStartsWith('/hostedzone/', $zoneId);

        self::log('List the hosted zones and verify the one we created is there.');
        $zoneIds = array();
        foreach ($this->route53->getIterator('ListHostedZones') as $zone) {
            $zoneIds[] = $zone['Id'];
        }
        $this->assertContains($zoneId, $zoneIds);

        self::log('Get the hosted zone we created by its ID.');
        $result = $this->route53->getCommand('GetHostedZone', array(
            'Id' => $zoneId,
        ))->getResult();
        $this->assertEquals($zoneId, $result->getPath('HostedZone/Id'));
        $nameServers = $result->getPath('DelegationSet/NameServers');
        $this->assertInternalType('array', $nameServers);
        $this->assertSame($nameServers, array_values($nameServers));

        self::log('Creating an S3 static website bucket');
        $s3 = $this->getServiceBuilder()->get('s3');
        $bucketName = 'integroute53' . self::getResourcePrefix();
        if (!$s3->doesBucketExist($bucketName)) {
            $s3->createBucket(array('Bucket' => $bucketName));
            $s3->waitUntil('BucketExists', array('Bucket' => $bucketName));
        }

        self::log('Setting website config on bucket');
        $s3->putBucketWebsite(array(
            'Bucket' => $bucketName,
            'IndexDocument' => array('Suffix' => 'index.html')
        ));

        self::log('Create a resource record set for the zone');
        $this->route53->changeResourceRecordSets(array(
            'HostedZoneId' => $zoneId,
            'ChangeBatch' => array(
                'Changes' => array(
                    array(
                        'Action' => 'CREATE',
                        'ResourceRecordSet' => array(
                            'Name' => 'foo.' . $bucketName . '.com',
                            'Type' => 'CNAME',
                            'TTL' => 300,
                            'ResourceRecords' => array(
                                array('Value' => '192.0.2.3')
                            )
                        )
                    )
                )
            )
        ));

        self::log('Get the resource record set');
        $set = $this->route53->listResourceRecordSets(array(
            'HostedZoneId' => $zoneId
        ));

        $record = null;
        foreach ($set['ResourceRecordSets'] as $resource) {
            if ($resource['Type'] == 'CNAME') {
                $record = $resource;
                break;
            }
        }

        if (!$record) {
            $this->fail('Did not find the created CNAME record');
        }

        self::log('Update the resource record set');
        $originalRecord = $record;
        $record['ResourceRecords'][0]['Value'] = '192.0.2.4';

        $this->route53->changeResourceRecordSets(array(
            'HostedZoneId' => $zoneId,
            'ChangeBatch' => array(
                'Changes' => array(
                    array(
                        'Action' => 'DELETE',
                        'ResourceRecordSet' => $originalRecord
                    ),
                    array(
                        'Action' => 'CREATE',
                        'ResourceRecordSet' => $record
                    )
                )
            )
        ));

        self::log('Ensuring that the record was updated');
        $set = $this->route53->listResourceRecordSets(array(
            'HostedZoneId' => $zoneId
        ));
        foreach ($set['ResourceRecordSets'] as $resource) {
            if ($resource['Type'] == 'CNAME') {
                if ($resource['ResourceRecords'][0]['Value'] != '192.0.2.4') {
                    $this->fail('Did not update record');
                }
                break;
            }
        }

        self::log('Delete the resource record set');
        $this->route53->changeResourceRecordSets(array(
            'HostedZoneId' => $zoneId,
            'ChangeBatch' => array(
                'Changes' => array(
                    array(
                        'Action' => 'DELETE',
                        'ResourceRecordSet' => array(
                            'Name' => 'foo.' . $bucketName . '.com',
                            'Type' => 'CNAME',
                            'TTL' => 300,
                            'ResourceRecords' => array(
                                array('Value' => '192.0.2.4')
                            )
                        )
                    )
                )
            )
        ));

        self::log('Delete the bucket');
        $s3->deleteBucket(array('Bucket' => $bucketName));

        self::log('Delete the hosted zone created.');
        $result = $this->route53->getCommand('DeleteHostedZone', array(
            'Id' => $zoneId,
        ))->getResult();
        $changeId = $result->getPath('ChangeInfo/Id');
        $this->assertStringStartsWith('/change/', $changeId);
        $this->assertEquals(Status::PENDING, $result->getPath('ChangeInfo/Status'));

        self::log('Get the change record and verify that it is being deleted.');
        $result = $this->route53->getCommand('GetChange', array(
            'Id' => $changeId,
        ))->getResult();
        $this->assertEquals(Status::PENDING, $result->getPath('ChangeInfo/Status'));
    }

    public function testHealthCheckOperations()
    {
        self::log('Create a health check.');
        $result = $this->route53->getCommand('CreateHealthCheck', array(
            'CallerReference' => uniqid('aws-sdk-php-hc-'),
            'HealthCheckConfig' => array(
                'IPAddress' => gethostbyname('aws.amazon.com'),
                'Port' => '80',
                'Type' => HealthCheckType::TCP,
            ),
        ))->getResult();
        $healthCheckId = $result->getPath('HealthCheck/Id');

        self::log('List the health checks.');
        $result = $this->route53->getCommand('ListHealthChecks')->getResult();
        $this->assertCount(1, $result->get('HealthChecks'));
        $this->assertContains($healthCheckId, $result->getPath('HealthChecks/*/Id'));

        self::log('Delete the health checks.');
        foreach ($this->route53->getIterator('ListHealthChecks') as $healthCheck) {
            $this->route53->getCommand('DeleteHealthCheck', array(
                'HealthCheckId' => $healthCheck['Id'],
            ))->execute();
        }
        $result = $this->route53->getCommand('ListHealthChecks')->getResult();
        $this->assertCount(0, $result->get('HealthChecks'));
    }
}
