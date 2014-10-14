<?php
namespace Aws\Test\Integ;

use GuzzleHttp\Client;
use GuzzleHttp\Ring\Client\StreamHandler;

class UseStreamTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function testCanUseStreamForGet()
    {
        $client = new Client(['adapter' => new StreamHandler()]);
        $s3 = $this->getSdk()->getS3(['client' => $client]);
        $result = $s3->listBuckets();
        $this->assertNotEmpty($result->search('Owner.ID'));
    }

    public function testCanUseStreamForPut()
    {
        $client = new Client(['adapter' => new StreamHandler()]);
        $ddb = $this->getSdk()->getDynamoDb(['client' => $client]);
        $result = $ddb->listTables();
        $this->assertArrayHasKey('TableNames', $result);
    }
}
