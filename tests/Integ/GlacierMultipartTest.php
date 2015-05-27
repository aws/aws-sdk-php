<?php
namespace Aws\Test\Integ;

use Aws\Exception\MultipartUploadException;
use Aws\Glacier\MultipartUploader;
use Aws\Test\Integ\IntegUtils;
use GuzzleHttp\Psr7\NoSeekStream;
use GuzzleHttp\Psr7;

class GlacierMultipart extends \PHPUnit_Framework_TestCase
{
    use IntegUtils;

    const MB = 1048576;
    const VAULT = 'php-integ-glacier-multipart';

    public static function setUpBeforeClass()
    {
        $client = self::getSdk()->createGlacier();
        $client->createVault(['vaultName' => self::VAULT]);
        $client->waitUntil('VaultExists', ['vaultName' => self::VAULT]);
    }

    public function useCasesProvider()
    {
        return [
            ['SeekableSerialUpload', true, 1],
            ['NonSeekableSerialUpload', false, 3],
            ['SeekableConcurrentUpload', true, 1],
            ['NonSeekableConcurrentUpload', false, 3],
        ];
    }

    /**
     * @param string $description
     * @param bool   $seekable
     * @param int    $concurrency
     * @dataProvider useCasesProvider
     */
    public function testMultipartUpload($description, $seekable, $concurrency)
    {
        $client = self::getSdk()->createGlacier();
        $tmpFile = sys_get_temp_dir() . '/aws-php-sdk-integ-glacier-mup';
        file_put_contents($tmpFile, str_repeat('x', 2 * self::MB + 1024));

        $stream = Psr7\stream_for(fopen($tmpFile, 'r'));
        if (!$seekable) {
            $stream = new NoSeekStream($stream);
        }

        $uploader = (new MultipartUploader($client, $stream, [
            'vault_name'          => self::VAULT,
            'archive_description' => $description,
            'concurrency'         => $concurrency,
        ]));

        try {
            $result = $uploader->upload($concurrency);
            $this->assertArrayHasKey('location', $result);
        } catch (MultipartUploadException $e) {
            $client->abortMultipartUpload($e->getState()->getId());
            $message = "=====\n";
            while ($e) {
                $message .= $e->getMessage() . "\n";
                $e = $e->getPrevious();
            }
            $message .= "=====\n";
            $this->fail($message);
        }

        @unlink($tmpFile);
    }
}
