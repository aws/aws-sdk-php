<?php
namespace Aws\Test\Ec2;

use Aws\Ec2\CopySnapshotSubscriber;
use Aws\Ec2\Ec2Client;

class Ec2FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testAddsSubscribers()
    {
        $ec2 = Ec2Client::factory([
            'region'  => 'us-east-1',
            'version' => 'latest'
        ]);

        $this->assertNotEmpty(
            array_filter($ec2->getEmitter()->listeners('init'), function ($e) {
                return is_array($e) && $e[0] instanceof CopySnapshotSubscriber;
            })
        );
    }
}
