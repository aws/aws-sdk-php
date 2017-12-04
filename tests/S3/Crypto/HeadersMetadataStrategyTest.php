<?php
namespace Aws\Test\S3\Crypto;

use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\S3\Crypto\HeadersMetadataStrategy
 */
class HeadersMetadataStrategyTest extends TestCase
{
    use UsesMetadataEnvelopeTrait;

    /**
     * @dataProvider getMetadataFields
     */
    public function testSave($fields)
    {
        $strategy = new HeadersMetadataStrategy();
        $args = ['Metadata' => []];

        $updatedArgs = $strategy->save(
            $this->getMetadataEnvelope($fields),
            $args
        );
        foreach ($fields as $field => $value) {
            $this->assertEquals($value, $updatedArgs['Metadata'][$field]);
        }
    }

    /**
     * @dataProvider getMetadataResult
     */
    public function testLoad($args, $metadata)
    {
        $strategy = new HeadersMetadataStrategy();
        $envelope = $strategy->load($args);

        foreach ($envelope as $field => $value) {
            $this->assertEquals($value, $metadata[$field]);
        }
    }
}
