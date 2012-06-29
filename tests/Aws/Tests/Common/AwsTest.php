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
        $this->assertTrue($builder->offsetExists('dynamo_db'));
        $this->assertTrue($builder->offsetExists('sts'));
    }

    public function testTreatsArrayInFirstArgAsGlobalParametersUsingDefaultConfigFile()
    {
        $builder = Aws::factory(array(
            'access_key_id'     => 'foo',
            'secret_access_key' => 'bar'
        ));

        $this->assertEquals('foo', $builder->get('dynamo_db')->getConfig('access_key_id'));
        $this->assertEquals('bar', $builder->get('dynamo_db')->getConfig('secret_access_key'));
    }

    public function testReturnsDefaultConfigPath()
    {
        $this->assertContains('aws-config.json', Aws::getDefaultServiceDefinition());
    }
}
