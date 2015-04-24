<?php
namespace Aws\Test\Integ;

use Aws\CommandInterface;
use Aws\Exception\AwsException;
use Aws\S3\S3Client;

class S3SignatureTest extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    public function signProvider()
    {
        return [
            [['Bucket' => uniqid('notthere'), 'PathStyle' => true]],
            [['Version' => 'foo', 'Bucket' => uniqid('notthere'), 'PathStyle' => true]],
            [['Bucket' => uniqid('notthere'), 'Key' => 'foo', 'PathStyle' => true]],
            [['Bucket' => uniqid('notthere')]],
            [['Version' => 'foo', 'Bucket' => uniqid('notthere')]],
            [['Bucket' => uniqid('notthere'), 'Key' => 'foo', 'PathStyle' => true]],
        ];
    }

    /**
     * @dataProvider signProvider
     */
    public function testSignsS3Requests($args)
    {
        $s3 = $this->getSdk()->createClient('s3', ['region' => 'us-east-1']);
        $command = $s3->getCommand('HeadBucket', $args);
        $this->ensureNot403($command, $s3);
    }

    private function ensureNot403(CommandInterface $command, S3Client $client)
    {
        try {
            $client->execute($command);
        } catch (AwsException $e) {
            $this->assertNotEquals(403, $e->getResponse()->getStatusCode());
        }
    }
}
