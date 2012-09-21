<?php

namespace Aws\Tests\Common;

use Aws\Common\Aws;

/**
 * @covers Aws\Common\Aws
 */
class AwsTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testFactoryInstantiatesAwsObjectUsingDefaultConfig()
    {
        $builder = Aws::factory();
        $this->assertTrue($builder->offsetExists('dynamodb'));
        $this->assertTrue($builder->offsetExists('sts'));
    }

    public function testTreatsArrayInFirstArgAsGlobalParametersUsingDefaultConfigFile()
    {
        $builder = Aws::factory(array(
            'key'    => 'foo',
            'secret' => 'bar',
            'region' => 'us-east-1'
        ));

        $this->assertEquals('foo', $builder->get('dynamodb')->getConfig('key'));
        $this->assertEquals('bar', $builder->get('dynamodb')->getConfig('secret'));
    }

    public function testReturnsDefaultConfigPath()
    {
        $this->assertContains('aws-config.php', Aws::getDefaultServiceDefinition());
    }
}
