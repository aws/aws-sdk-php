<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\MetadataEnvelope;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(MetadataEnvelope::class)]
class MetadataEnvelopeTest extends TestCase
{
    use UsesMetadataEnvelopeTrait;

    /**

 */
    #[DataProvider('getIndividualMetadataFields')]
    public function testSetsValidFields($field, $value)
    {
        $envelope = new MetadataEnvelope();
        $envelope[$field] = $value;

        $this->assertEquals($value, $envelope[$field]);
    }

    /**

 */
    #[DataProvider('getMetadataFields')]
    public function testSetsAllFields($allValidFields)
    {
        $envelope = new MetadataEnvelope();
        foreach ($allValidFields as $field => $value) {
            $envelope[$field] = $value;
        }

        $this->assertEquals(
            json_encode($allValidFields),
            json_encode($envelope)
        );
    }

    /**

 */
    #[DataProvider('getIndividualInvalidMetadataFields')]
    public function testThrowsOnInvalidMetadataField($field, $value)
    {
        //= ../specification/s3-encryption/data-format/content-metadata.md#determining-s3ec-object-status
        //= type=test
        //# In general, if there is any deviation from the above format, with the exception of additional unrelated mapkeys, then the S3EC SHOULD throw an exception.
        $this->expectException(\InvalidArgumentException::class);
        $envelope = new MetadataEnvelope();
        $envelope[$field] = $value;
    }

    /**
     * Tests that none of the metadata mapkeys are prefixed with
     * `x-amz-meta-`
     */
    public function testNoReservedPrefixInEnvelope(): void
    {
        $envelope = new MetadataEnvelope();
        $envelopeKeys = $envelope::getConstantValues();
        foreach ($envelopeKeys as $envelopeKey) {
            //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
            //= type=test
            //# The "x-amz-meta-" prefix is automatically added by the S3 server and MUST NOT be included in implementation code.
            $this->assertStringStartsNotWith('x-amz-meta', $envelopeKey);
        }
    }
    
    /**
     * Tests that all the metadata mapkeys are prefixed with
     * `x-amz-`
     */
    public function testReservedPrefixInEnvelope(): void
    {
        $envelope = new MetadataEnvelope();
        $envelopeKeys = $envelope::getConstantValues();
        foreach ($envelopeKeys as $envelopeKey) {
            //= ../specification/s3-encryption/data-format/content-metadata.md#content-metadata-mapkeys
            //= type=test
            //# The "x-amz-" prefix denotes that the metadata is owned by an Amazon product
            //# and MUST be prepended to all S3EC metadata mapkeys.
            $this->assertStringStartsWith('x-amz-', $envelopeKey);
        }
    }

}
