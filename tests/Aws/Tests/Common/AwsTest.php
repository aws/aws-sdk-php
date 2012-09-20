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
        $this->assertContains('aws-config.json', Aws::getDefaultServiceDefinition());
    }

    public function testOnlyCreatesOneServiceBuilderFactory()
    {
        $class = new \ReflectionClass('Aws\Common\Aws');
        $defaultFactory = $class->getProperty('defaultFactory');
        $defaultFactory->setAccessible(true);
        $defaultFactory->setValue(null, null);

        $builder1 = Aws::factory();
        $factory1 = $this->readAttribute('Aws\Common\Aws', 'defaultFactory');

        $builder2 = Aws::factory();
        $factory2 = $this->readAttribute('Aws\Common\Aws', 'defaultFactory');

        $this->assertNotSame($builder1, $builder2);
        $this->assertSame($factory1, $factory2);
    }
}
