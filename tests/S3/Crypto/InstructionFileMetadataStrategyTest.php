<?php
namespace Aws\Test\S3\Crypto;

use Aws\S3\Crypto\InstructionFileMetadataStrategy;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\Crypto\MetadataEnvelope;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(InstructionFileMetadataStrategy::class)]
class InstructionFileMetadataStrategyTest extends TestCase
{
    use UsesMetadataEnvelopeTrait, UsesServiceTrait;

    /**

 */
    #[DataProvider('getMetadataFields')]
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
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#instruction-file
        //= type=test
        //# The S3EC MUST support writing some or all (depending on format) content metadata to an Instruction File.
        $updatedArgs = $strategy->save(
            $this->getMetadataEnvelope($fields),
            $args
        );
        $this->assertNotEmpty($updatedArgs);
        $this->assertCount(0, $updatedArgs['Metadata']);
    }

    /**
     * Tests that only required data gets saved to the instruction file
     * and other data is left to the object metadata headers

 */
    #[DataProvider('getV3MetadataFields')]
    public function testSaveV3MetadataEnvelope($fields): void
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $metadata = $this->getV3InstructionFileFields($fields);
        $args = [
            'Bucket' => 'foo',
            'Key' => 'bar',
            'Metadata' => []
        ];
        $this->addMockResults($client, [
            new Result(['Body' => json_encode($metadata)])
        ]);
        $envelope = $this->getMetadataEnvelope($fields);

        $updatedArgs = $strategy->save(
            $envelope,
            $args
        );
        $this->assertNotEmpty($updatedArgs["Metadata"]);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST store the mapkey "x-amz-c" and its value in the Object Metadata when writing with an Instruction File.
        $this->assertArrayHasKey(MetadataEnvelope::CONTENT_CIPHER_V3, $updatedArgs['Metadata']);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST NOT store the mapkey "x-amz-c" and its value in the Instruction File.
        $this->assertArrayNotHasKey(MetadataEnvelope::CONTENT_CIPHER_V3, $envelope);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST store the mapkey "x-amz-d" and its value in the Object Metadata when writing with an Instruction File.
        $this->assertArrayHasKey(MetadataEnvelope::KEY_COMMITMENT_V3, $updatedArgs['Metadata']);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST NOT store the mapkey "x-amz-d" and its value in the Instruction File.
        $this->assertArrayNotHasKey(MetadataEnvelope::KEY_COMMITMENT_V3, $envelope);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST store the mapkey "x-amz-i" and its value in the Object Metadata when writing with an Instruction File.
        $this->assertArrayHasKey(MetadataEnvelope::MESSAGE_ID_V3, $updatedArgs['Metadata']);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST NOT store the mapkey "x-amz-i" and its value in the Instruction File.
        $this->assertArrayNotHasKey(MetadataEnvelope::MESSAGE_ID_V3, $envelope);

        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST store the mapkey "x-amz-3" and its value in the Instruction File.
        $this->assertArrayHasKey(MetadataEnvelope::ENCRYPTED_DATA_KEY_V3, $envelope);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST store the mapkey "x-amz-w" and its value in the Instruction File.
        $this->assertArrayHasKey(MetadataEnvelope::ENCRYPTED_DATA_KEY_ALGORITHM_V3, $envelope);
        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v3-instruction-files
        //= type=test
        //# - The V3 message format MUST store the mapkey "x-amz-t" and its value (when present in the content metadata) in the Instruction File.
        $this->assertArrayHasKey(MetadataEnvelope::ENCRYPTION_CONTEXT_V3, $envelope);

    }

    /**

 */
    #[DataProvider('getMetadataResult')]
    public function testLoad($args, $metadata)
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $this->addMockResults($client, [
            //= ../specification/s3-encryption/data-format/metadata-strategy.md#instruction-file
            //= type=test
            //# The serialized JSON string MUST be the only contents of the Instruction File.
            new Result(['Body' => json_encode($metadata)])
        ]);
        $envelope = $strategy->load($args);

        //= ../specification/s3-encryption/data-format/metadata-strategy.md#v1-v2-instruction-files
        //= type=test
        //# In the V1/V2 message format, all of the content metadata MUST be stored in the Instruction File.
        $this->assertTrue(MetadataEnvelope::isV2Envelope($envelope));

        foreach ($envelope as $field => $value) {
            $this->assertEquals($value, $metadata[$field]);
        }
    }

    /**

 */
    #[DataProvider('getV3FieldsForInstructionFile')]
    public function testLoadV3FromInstructionFileAndMetadata($args, $instructionFile): void
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $this->addMockResults($client, [
            //= ../specification/s3-encryption/data-format/metadata-strategy.md#instruction-file
            //= type=test
            //# The serialized JSON string MUST be the only contents of the Instruction File.
            new Result(['Body' => json_encode($instructionFile)])
        ]);
        $envelope = $strategy->load($args);

        $this->assertTrue(MetadataEnvelope::isV3Envelope($envelope));

        foreach ($envelope as $field => $value) {
            // to assert we have loaded it properly and assert, some fields are present in metadata
            // and the others are in the args/
            if (!empty($instructionFile[$field])) {
                $this->assertEquals($value, $instructionFile[$field]);
            } else {
                // if it is not in the instruction file it was stored in the metadata
                $this->assertEquals($value, $args['Metadata'][$field]);
            }
        }
    }

    /**

 */
    #[DataProvider('getV3MetadataResult')]
    public function testLoadV3FromInstructionFileAndMetadataCorruptInstructionFile($args, $instructionFile)
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $this->addMockResults($client, [
            new Result(['Body' => json_encode($instructionFile)])
        ]);
        // We expect to fail because all keys were found in the instruction file when only a subset
        // are allowed to be stored in the instruction file.
        $this->expectException(\Aws\Exception\CryptoException::class);
        $this->expectExceptionMessage("One or more reserved keys found in Instruction file when they should not be present.");
        $envelope = $strategy->load($args);
    }
    
    /**

 */
    #[DataProvider('getMetadataResult')]
    public function testLoadV2FromInstructionFileAndMetadataCorruptInstructionFile($args, $instructionFile)
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        unset($instructionFile[MetadataEnvelope::CONTENT_KEY_V2_HEADER]);
        $instructionFile['some_key'] = 'some_value';
        $this->addMockResults($client, [
            new Result(['Body' => json_encode($instructionFile)])
        ]);
        // We expect to fail because all keys were found in the instruction file when only a subset
        // are allowed to be stored in the instruction file.
        $this->expectException(\Aws\Exception\CryptoException::class);
        $this->expectExceptionMessage("Malformed metadata envelope.");
        $envelope = $strategy->load($args);
    }
    
    /**

 */
    #[DataProvider('getMetadataResult')]
    public function testLoadV2FromInstructionFileAndMetadataInvalidJson($args, $instructionFile)
    {
        /** @var S3Client $client */
        $client = $this->getTestClient('S3', []);
        $strategy = new InstructionFileMetadataStrategy($client);
        $instructionFile = ["invalid" => "json"];
        $this->addMockResults($client, [
            new Result(['Body' => json_encode($instructionFile)])
        ]);
        // We expect to fail because all keys were found in the instruction file when only a subset
        // are allowed to be stored in the instruction file.
        $this->expectException(\Aws\Exception\CryptoException::class);
        $this->expectExceptionMessage("Malformed metadata envelope.");
        $envelope = $strategy->load($args);
    }
}
