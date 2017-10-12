<?php

namespace Aws\Test\Crypto;

use Aws\Crypto\MetadataEnvelope;

/**
 * @covers Aws\Crypto\MetadataEnvelope
 */
class MetadataEnvelopeTest extends \PHPUnit_Framework_TestCase
{
    use UsesMetadataEnvelopeTrait;

    /**
     * @dataProvider getIndividualMetadataFields
     */
    public function testSetsValidFields($field, $value)
    {
        $envelope = new MetadataEnvelope();
        $envelope[$field] = $value;

        $this->assertEquals($value, $envelope[$field]);
    }

    /**
     * @dataProvider getMetadataFields
     */
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
     * @dataProvider getIndividualInvalidMetadataFields
     *
     * @expectedException \InvalidArgumentException
     */
    public function testThrowsOnInvalidMetadataField($field, $value)
    {
        $envelope = new MetadataEnvelope();
        $envelope[$field] = $value;
    }
}
