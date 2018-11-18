<?php
namespace Aws\Test\S3\Crypto;

use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\Crypto\InstructionFileMetadataStrategy
 */
class InstructionFileMetadataStrategyTest extends TestCase
{
    use UsesMetadataEnvelopeTrait, UsesServiceTrait;

    /**
     * @dataProvider getMetadataFields
     */
    public function testSave($fields)
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $args = [
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Metadata' => []
        ];
        $this->addMockResults($client, [
            new Result(['ObjectURL' => 'file_url'])
        ]);

        $updatedArgs = $strategy->save(
            $this->getMetadataEnvelope($fields),
            $args
        );
        $this->assertNotEmpty($updatedArgs);
        $this->assertCount(0, $updatedArgs['Metadata']);
    }

    /**
     * @dataProvider getMetadataResult
     */
    public function testLoad($args, $metadata)
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $this->addMockResults($client, [
            new Result(['Body' => json_encode($metadata)])
        ]);
        $envelope = $strategy->load($args);

        foreach ($envelope as $field => $value) {
            $this->assertEquals($value, $metadata[$field]);
        }
    }
}
