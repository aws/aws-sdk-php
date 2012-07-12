<?php

namespace Aws\Tests\S3\Command;

use Aws\S3\Exception\DeleteMultipleObjectsException;

/**
 * @covers Aws\S3\Exception\DeleteMultipleObjectsException
 */
class DeleteMultipleObjectsExceptionTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testStoresErrors()
    {
        $e = new DeleteMultipleObjectsException(array(
            array('Key' => 'abc')
        ));

        $this->assertEquals(array(
            array('Key' => 'abc')
        ), $e->getErrors());
    }
}
