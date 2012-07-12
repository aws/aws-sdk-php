<?php

namespace Aws\Tests\S3\Command;

/**
 * @covers Aws\S3\Command\AbstractRequiresKey
 */
class AbstractRequiresKeyTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testHasGettersAndSetters()
    {
        $command = $this->getMockForAbstractClass('Aws\S3\Command\AbstractRequiresKey');
        $this->assertSame($command, $command->setBucket('foo'));
        $this->assertSame($command, $command->setKey('bar'));
        $this->assertEquals('foo', $command->getBucket());
        $this->assertEquals('bar', $command->getKey());
    }
}
