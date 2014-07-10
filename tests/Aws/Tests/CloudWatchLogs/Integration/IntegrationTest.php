<?php

namespace Aws\Tests\CloudWatchLogs\Integration;

use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\Common\Exception\ServiceResponseException;

/**
 * @group integration
 * @group example
 */
class IntegrationTest extends \Aws\Tests\IntegrationTestCase
{
    /** @var CloudWatchLogsClient */
    protected $logs;

    public function setUp()
    {
        $this->logs = $this->getServiceBuilder()->get('cloudwatchlogs');
    }

    public function testCanCreateAndDeleteLogGroup()
    {
        $this->logs->createLogGroup(array(
            'logGroupName' => 'foo',
        ));

        $logGroups = $this->logs->getIterator('DescribeLogGroups');
        $logGroups = iterator_to_array($logGroups);
        $this->assertCount(1, $logGroups);

        $this->logs->deleteLogGroup(array(
            'logGroupName' => 'foo',
        ));

        $logGroups = $this->logs->getIterator('DescribeLogGroups');
        $logGroups = iterator_to_array($logGroups);
        $this->assertCount(0, $logGroups);
    }

    public function testErrorsAreParsedCorrectly()
    {
        try {
            $this->logs->deleteLogGroup(array(
                'logGroupName' => 'foo',
            ));
            $this->fail('An exception should have been thrown.');
        } catch (ServiceResponseException $e) {
            $this->assertEquals('ResourceNotFoundException', $e->getExceptionCode(),
                'Caught a ' . $e->getExceptionCode() . ' exception instead.');
        }
    }
}
