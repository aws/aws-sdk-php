<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Service;
use Aws\Command;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\EndpointProviderV2;
use Aws\Test\UsesServiceTrait;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

/**
 * @covers Aws\Api\Serializer\RestXmlSerializer
 */
class RestXmlSerializerTest extends TestCase
{
    use UsesServiceTrait;

    private function getRequest($commandName, $input)
    {
        $client = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $command = $client->getCommand($commandName, $input);
        $xml = new RestXmlSerializer($client->getApi(), $client->getEndpoint());
        return $xml($command);
    }

    public function testPreparesRequestsWithContentType()
    {
        $request = $this->getRequest('PutObject', [
            'Bucket'      => 'foo',
            'Key'         => 'bar',
            'Body'        => 'baz',
            'ContentType' => 'abc'
        ]);
        $this->assertSame('abc', $request->getHeaderLine('Content-Type'));
    }

    public function testEscapesAllXMLCharacters()
    {
        $request = $this->getRequest('DeleteObjects', [
            'Bucket' => 'foo',
            'Delete' => ['Objects' =>
                [
                    ['Key' => '/@/#/=/;/:/ /,/?/\'/"/</>/&/\r/\n/']
                ]
            ],
        ]);
        $contents = $request->getBody()->getContents();
        $this->assertStringContainsString(
            "<Key>/@/#/=/;/:/ /,/?/&apos;/&quot;/&lt;/&gt;/&amp;/&#13;/&#10;/",
            $contents
        );
    }

    public function testPreparesRequestsWithNoContentType()
    {
        $request = $this->getRequest('PutObject', [
            'Bucket'      => 'foo',
            'Key'         => 'bar',
            'Body'        => 'baz'
        ]);
        $this->assertSame('', $request->getHeaderLine('Content-Type'));
    }

    public function testPreparesRequestsWithStructurePayloadXmlContentType()
    {
        $request = $this->getRequest('CompleteMultipartUpload', [
            'Bucket'      => 'foo',
            'Key'         => 'bar',
            'UploadId'    => '123',
            'MultipartUpload' => [
                'parts' => [
                    ['ETag' => 'a', 'PartNumber' => '123']
                ]
            ]
        ]);
        $this->assertSame(
            'application/xml',
            $request->getHeaderLine('Content-Type')
        );
    }

    /**
     * @dataProvider boolProvider
     * @param bool $arg
     * @param string $expected
     */
    public function testSerializesHeaderValueToBoolString($arg, $expected)
    {
        $request = $this->getRequest('PutObject', [
            'Bucket'      => 'foo',
            'Key'         => 'bar',
            'Body'        => 'baz',
            'BucketKeyEnabled' => $arg,
        ]);
        $this->assertSame(
            $expected,
            $request->getHeaderLine('x-amz-server-side-encryption-bucket-key-enabled')
        );
    }

    public function boolProvider() {
        return [
            [true, 'true'],
            [false, 'false']
        ];
    }

    public function testDoesNotOverrideScheme()
    {
        $client = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $serializer = new RestXmlSerializer($client->getApi(), 'http://test.com');
        $cmd = new Command('HeadObject', ['baz' => []]);
        $endpointProvider = new EndpointProviderV2(
            json_decode(
                file_get_contents(__DIR__ . '/../../EndpointV2/valid-rules/aws-region.json'),
                true
            ),
            EndpointDefinitionProvider::getPartitions()
        );
        $request = $serializer($cmd, $endpointProvider, ['Region' => 'us-east-1']);
        $this->assertSame('http://us-east-1.amazonaws.com/', (string) $request->getUri());
    }
}
