<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\Parser\DecodingEventStreamIterator;
use Aws\Api\Parser\Exception\ParserException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Api\Parser\DecodingEventStreamIterator
 */
class DecodingEventStreamIteratorTest extends TestCase
{
    public function complianceTests()
    {
        $cases = [];

        $dataFilesIterator = \Aws\recursive_dir_iterator(
            realpath(__DIR__ . '/../test_cases/eventstream/encoded/')
        );
        foreach ($dataFilesIterator as $file) {
            if (is_dir($file)) {
                continue;
            }

            $case = [
                Psr7\stream_for(
                    file_get_contents($file)
                ),
                Psr7\stream_for(
                    file_get_contents(
                        str_replace('encoded', 'decoded', $file)
                    )
                ),
                stripos($file, 'negative') !== false
            ];

            $cases []= $case;
        }

        return $cases;
    }

    /**
     * @dataProvider complianceTests
     */
    public function testPassesComplianceTest(
        Stream $encodedData,
        Stream $decodedData,
        $isNegative
    ) {
        try {
            $events = new DecodingEventStreamIterator($encodedData);
            $firstEvent = null;
            foreach ($events as $key => $event) {
                if (!$firstEvent) {
                    $firstEvent = $event;
                }
            }

            if ($isNegative) {
                $this->fail('Successfully parsed event from corrupt source.');
            }

            $events->rewind();
            $this->assertTrue($events->valid());
            $this->assertEquals(0, $events->key());

            $firstEvent['payload'] =
                (string) $firstEvent['payload'];
            $current = $events->current();
            $current['payload'] =
                (string) $current['payload'];
            $this->assertEquals($firstEvent, $current);

            $decodedEvent = json_decode((string) $decodedData, true);
            $this->assertEquals(
                base64_decode(
                    $decodedEvent['payload']
                ),
                $firstEvent['payload']
            );

            $headerCount = count(
                $firstEvent['headers']
            );
            foreach ($decodedEvent['headers'] as $header) {
                $this->assertArrayHasKey(
                    $header['name'],
                    $firstEvent['headers']
                );

                switch ($header['type']) {
                    case 6:
                    case 7:
                        $this->assertSame(
                            base64_decode($header['value']),
                            $firstEvent['headers'][$header['name']]
                        );
                        break;
                    case 8:
                        $s = $firstEvent['headers'][$header['name']]->format('U');
                        $ms = $firstEvent['headers'][$header['name']]->format('u') / 1000;
                        $this->assertSame(
                            $header['value'],
                            ($s * 1000) + $ms
                        );
                        break;
                    case 9:
                        $value = str_replace('-', '', $firstEvent['headers'][$header['name']]);
                        $this->assertSame(
                            base64_decode($header['value']),
                            pack('H*', $value)
                        );
                        break;
                    default:
                        $this->assertSame(
                            $header['value'],
                            $firstEvent['headers'][$header['name']]
                        );
                }

                $headerCount--;
            }
            $this->assertEquals(0, $headerCount);
        } catch (ParserException $e) {
            if (!$isNegative) {
                $this->fail('Unsuccessful parse of event from valid source.');
            }

            $this->assertContains(
                (string) $decodedData,
                $e->getMessage(),
                '',
                true
            );
        }
    }
}
