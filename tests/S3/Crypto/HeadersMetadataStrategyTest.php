<?php
namespace Aws\Test\S3\Crypto;

use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\Test\Crypto\UsesMetadataEnvelopeTrait;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

/**

 */
#[CoversClass(HeadersMetadataStrategy::class)]
class HeadersMetadataStrategyTest extends TestCase
{
    use UsesMetadataEnvelopeTrait;

    /**

 */
    #[DataProvider('getMetadataFields')]
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

 */
    #[DataProvider('getMetadataResult')]
    public function testLoad($args, $metadata)
    {
        $strategy = new HeadersMetadataStrategy();
        $envelope = $strategy->load($args);

        foreach ($envelope as $field => $value) {
            $this->assertEquals($value, $metadata[$field]);
        }
    }
}
