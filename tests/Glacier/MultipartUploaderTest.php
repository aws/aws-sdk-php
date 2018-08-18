<?php
namespace Aws\Test\Glacier;

use Aws\Glacier\MultipartUploader;
use Aws\Result;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Psr7;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers Aws\Glacier\MultipartUploader
 */
class MultipartUploaderTest extends TestCase
{
    use UsesServiceTrait;

    const MB = 1048576;
    const FILENAME = '_aws-sdk-php-glacier-mup-test-dots.txt';

    public static function tearDownAfterClass()
    {
        @unlink(sys_get_temp_dir() . '/' . self::FILENAME);
    }

    /**
     * @dataProvider getTestCases
     */
    public function testGlacierMultipartUploadWorkflow(
        array $uploadOptions = [],
        StreamInterface $source,
        $error = false
    ) {
        $client = $this->getTestClient('glacier');
        $this->addMockResults($client, [
            new Result(['uploadId' => 'baz']),
            new Result(),
            new Result(),
            new Result(),
            new Result(['fizz' => 'buzz'])
        ]);

        if ($error) {
            if (method_exists($this, 'expectException')) {
                $this->expectException($error);
            } else {
                $this->setExpectedException($error);
            }
        }

        $uploader = new MultipartUploader($client, $source, $uploadOptions);
        $result = $uploader->upload();

        $this->assertTrue($uploader->getState()->isCompleted());
        $this->assertEquals('buzz', $result['fizz']);
    }

    public function getTestCases()
    {
        $defaults = [
            'account_id'          => 'foo',
            'vault_name'          => 'bar',
            'archive_description' => 'MUP Test Archive',
        ];

        $data = str_repeat('.', (int) (2.2 * self::MB));
        $filename = sys_get_temp_dir() . '/' . self::FILENAME;
        file_put_contents($filename, $data);

        return [
            [ // Seekable stream
                $defaults,
                Psr7\stream_for(fopen($filename, 'r'))
            ],
            [ // Non-seekable stream
                $defaults,
                Psr7\stream_for($data)
            ],
            [ // Error: bad part_size
                ['part_size' => 1] + $defaults,
                Psr7\FnStream::decorate(
                    Psr7\stream_for($data), [
                        'getSize' => function () {return null;}
                    ]
                ),
                'InvalidArgumentException'
            ],
        ];
    }

    public function testCanLoadStateFromService()
    {
        $client = $this->getTestClient('glacier');
        $hashA = hash('sha256', 'A');
        $hashB = hash('sha256', 'B');
        $this->addMockResults($client, [
            new Result([
                'PartSizeInBytes' => 1048576,
                'Parts' => [
                    [
                        'RangeInBytes' => '0-1048575',
                        'SHA256TreeHash' => $hashA
                    ],
                    [
                        'RangeInBytes' => '1048576-2097151',
                        'SHA256TreeHash' => $hashB
                    ],
                ]
            ]),
            new Result(),
            new Result(['fizz' => 'buzz'])
        ]);

        $state = MultipartUploader::getStateFromService($client, 'foo', 'bar', 'baz');
        $source = Psr7\stream_for(str_repeat('.', (int) (2.2 * self::MB)));
        $uploader = new MultipartUploader($client, $source, ['state' => $state]);

        $parts = $state->getUploadedParts();
        $this->assertEquals(1048576, $parts[2]['size']);
        $this->assertEquals($hashA, $parts[1]['checksum']);
        $this->assertEquals($hashB, $parts[2]['checksum']);

        $result = $uploader->upload();
        $this->assertTrue($state->isCompleted());
        $this->assertEquals('buzz', $result['fizz']);
    }
}
