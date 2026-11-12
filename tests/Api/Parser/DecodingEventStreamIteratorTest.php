<?php

namespace Aws\Test\Api\Parser;

use Aws\Api\DateTimeResult;
use Aws\Api\Parser\DecodingEventStreamIterator;
use Aws\Api\Parser\Exception\ParserException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Stream;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DecodingEventStreamIterator::class)]
class DecodingEventStreamIteratorTest extends TestCase
{
    use EventStreamMessageTrait;

    public static function complianceTests(): \Generator
    {
        $dataFilesIterator = \Aws\recursive_dir_iterator(
            realpath(__DIR__ . '/../test_cases/eventstream/encoded/')
        );
        foreach ($dataFilesIterator as $file) {
            if (is_dir($file)) {
                continue;
            }

            yield [
                Psr7\Utils::streamFor(
                    file_get_contents($file)
                ),
                Psr7\Utils::streamFor(
                    file_get_contents(
                        str_replace('encoded', 'decoded', $file)
                    )
                ),
                stripos($file, 'negative') !== false
            ];
        }
    }

    #[DataProvider('complianceTests')]
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
            $this->assertSame(0, $events->key());

            $firstEvent['payload'] =
                (string) $firstEvent['payload'];
            $current = $events->current();
            $current['payload'] =
                (string) $current['payload'];
            $this->assertEquals($firstEvent, $current);

            $decodedEvent = json_decode((string) $decodedData, true);
            $this->assertSame(
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
            $this->assertSame(0, $headerCount);
        } catch (ParserException $e) {
            if (!$isNegative) {
                $this->fail('Unsuccessful parse of event from valid source.');
            }

            $this->assertStringContainsStringIgnoringCase(
                (string) $decodedData,
                $e->getMessage(),
                ''
            );
        }
    }

    #[DataProvider('timestampHeaderProvider')]
    public function testDecodesWholeSecondTimestampHeader(
        int $milliseconds,
        string $expected
    ): void {
        $events = new DecodingEventStreamIterator(Psr7\Utils::streamFor(
            self::eventStreamMessage(self::eventStreamHeader('time', 8, pack('J', $milliseconds)))
        ));
        $value = $events->current()['headers']['time'];

        $this->assertInstanceOf(DateTimeResult::class, $value);
        $this->assertSame($expected, $value->format('Y-m-d\TH:i:s.uP'));
        $this->assertSame('+00:00', $value->getTimezone()->getName());
    }

    public static function timestampHeaderProvider(): array
    {
        return [
            'whole second' => [1609502096000, '2021-01-01T11:54:56.000000+00:00'],
            'fraction of a second' => [1609502096500, '2021-01-01T11:54:56.500000+00:00'],
        ];
    }

    public function testDecodesSignedHeaderMinimums(): void
    {
        $events = new DecodingEventStreamIterator(Psr7\Utils::streamFor(self::eventStreamMessage(
            self::eventStreamHeader('byte', 2, "\x80")
            . self::eventStreamHeader('short', 3, "\x80\x00")
            . self::eventStreamHeader('integer', 4, "\x80\x00\x00\x00")
            . self::eventStreamHeader('long', 5, pack('J', PHP_INT_MAX))
            . self::eventStreamHeader('byteMax', 2, "\x7f")
            . self::eventStreamHeader('shortMax', 3, "\x7f\xff")
            . self::eventStreamHeader('integerMax', 4, "\x7f\xff\xff\xff")
        )));
        $headers = $events->current()['headers'];

        $this->assertSame(-128, $headers['byte']);
        $this->assertSame(-32768, $headers['short']);
        $this->assertSame(-2147483648, $headers['integer']);
        $this->assertSame(PHP_INT_MAX, $headers['long']);
        $this->assertSame(127, $headers['byteMax']);
        $this->assertSame(32767, $headers['shortMax']);
        $this->assertSame(2147483647, $headers['integerMax']);
    }
}
