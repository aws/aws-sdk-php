<?php
namespace Aws\Test\Common\Subscriber;

use Aws\Common\Api\Validator;
use Aws\Common\Subscriber\Validation;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\InitEvent;

/**
 * @covers Aws\Common\Subscriber\Validation
 */
class ValidationTest extends \PHPUnit_Framework_TestCase
{
    use UsesServiceTrait;

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Found 2 errors while validating the input provided for the GetObject operation:
     */
    public function testValdiatesBeforeSerialization()
    {
        $s3 = $this->getTestClient('s3');
        $api = $s3->getApi();
        $command = $s3->getCommand('GetObject');
        $trans = new CommandTransaction($s3, $command);
        $event = new InitEvent($trans);
        $validator = new Validator();
        $validation = new Validation($api, $validator);
        $this->assertNotEmpty($validation->getEvents());
        $validation->onInit($event);
    }
}
