<?php
namespace Aws\Test\Api\Serializer;

use Aws\Api\Serializer\RestXmlSerializer;
use Aws\Api\Service;
use Aws\Command;
use Aws\Endpoint\PartitionEndpointProvider;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Middleware;
use Aws\Result;
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
        $endpoint = new RulesetEndpoint('https://foo.com');
        $request = $serializer($cmd, $endpoint);
        $this->assertSame('http://foo.com/', (string) $request->getUri());
    }

    /**
     * @dataProvider s3EndpointResolutionProvider
     */
    public function testS3EndpointResolution(
        string $endpoint,
        string $bucket,
        string $key,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getS3TestService();
        $command = new Command('GetObject', ['Bucket' => $bucket, 'Key' => $key]);

        $serializer = new RestXmlSerializer($service, $endpoint);
        $request = $serializer($command);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "S3 Endpoint Resolution - {$description}"
        );
    }

    /**
     * @dataProvider s3EndpointResolutionProvider
     */
    public function testS3EndpointV2Resolution(
        string $endpoint,
        string $bucket,
        string $key,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getS3TestService();
        $command = new Command('GetObject', ['Bucket' => $bucket, 'Key' => $key]);

        $serializer = new RestXmlSerializer($service, $endpoint);
        $endpointV2 = new RulesetEndpoint($endpoint);
        $request = $serializer($command, $endpointV2);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "S3 Endpoint V2 Resolution - {$description}"
        );
    }

    /**
     * @dataProvider s3DotSegmentProvider
     */
    public function testS3DotSegmentPreservation(
        string $endpoint,
        string $bucket,
        string $key,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getS3TestService();
        $command = new Command('GetObject', ['Bucket' => $bucket, 'Key' => $key]);

        $serializer = new RestXmlSerializer($service, $endpoint);
        $request = $serializer($command);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "S3 Dot Segments - {$description}"
        );
    }

    /**
     * @dataProvider s3DotSegmentProvider
     */
    public function testS3DotSegmentV2Preservation(
        string $endpoint,
        string $bucket,
        string $key,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getS3TestService();
        $command = new Command('GetObject', ['Bucket' => $bucket, 'Key' => $key]);

        $serializer = new RestXmlSerializer($service, $endpoint);
        $endpointV2 = new RulesetEndpoint($endpoint);
        $request = $serializer($command, $endpointV2);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "S3 V2 Dot Segments - {$description}"
        );
    }

    /**
     * @dataProvider restXmlEndpointResolutionProvider
     */
    public function testRestXmlEndpointResolution(
        string $endpoint,
        string $requestUri,
        array $pathParams,
        array $queryParams,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getRestXmlTestService($requestUri);
        $command = new Command('testOperation', array_merge($pathParams, ['query' => $queryParams]));

        $serializer = new RestXmlSerializer($service, $endpoint);
        $request = $serializer($command);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "REST XML Endpoint Resolution - {$description}"
        );
    }

    /**
     * @dataProvider restXmlEndpointResolutionProvider
     */
    public function testRestXmlEndpointV2Resolution(
        string $endpoint,
        string $requestUri,
        array $pathParams,
        array $queryParams,
        string $expected,
        string $description
    ): void
    {
        $service = $this->getRestXmlTestService($requestUri);
        $command = new Command('testOperation', array_merge($pathParams, ['query' => $queryParams]));

        $serializer = new RestXmlSerializer($service, $endpoint);
        $endpointV2 = new RulesetEndpoint($endpoint);
        $request = $serializer($command, $endpointV2);

        $this->assertEquals(
            $expected,
            (string) $request->getUri(),
            "REST XML V2 Endpoint Resolution - {$description}"
        );
    }

    public function s3EndpointResolutionProvider(): \Generator
    {
        // Virtual-hosted-style (default)
        yield 's3_virtual_hosted_standard' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/file.txt',
            'description' => 'Standard S3 virtual-hosted-style'
        ];

        yield 's3_virtual_hosted_nested_key' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'folder/subfolder/file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/folder/subfolder/file.txt',
            'description' => 'Virtual-hosted with nested key path'
        ];

        yield 's3_virtual_hosted_with_region' => [
            'endpoint' => 'https://test-bucket.s3.us-west-2.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/file.txt',
            'description' => 'Virtual-hosted with specific region'
        ];

        // Path-style (legacy or forced)
        yield 's3_path_style' => [
            'endpoint' => 'https://s3.amazonaws.com/test-bucket',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'expected' => 'https://s3.amazonaws.com/test-bucket/file.txt',
            'description' => 'Path-style S3 (legacy)'
        ];

        yield 's3_path_style_nested' => [
            'endpoint' => 'https://s3.amazonaws.com/test-bucket',
            'bucket' => 'test-bucket',
            'key' => 'folder/subfolder/file.txt',
            'expected' => 'https://s3.amazonaws.com/test-bucket/folder/subfolder/file.txt',
            'description' => 'Path-style with nested key'
        ];

        // Keys with special handling
        yield 's3_key_with_spaces' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'my file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/my%20file.txt',
            'description' => 'Key with spaces (URL encoded)'
        ];

        yield 's3_leading_slash_key' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => '/file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com//file.txt',
            'description' => 'Key with leading slash'
        ];

        yield 's3_double_slash_key' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => '//file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com///file.txt',
            'description' => 'Key with double slash (preserved)'
        ];

        // S3-compatible services
        yield 's3_compatible_minio' => [
            'endpoint' => 'https://minio.example.com:9000/test-bucket',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'expected' => 'https://minio.example.com:9000/test-bucket/file.txt',
            'description' => 'S3-compatible service (MinIO) - typically path-style'
        ];

        yield 's3_compatible_with_path' => [
            'endpoint' => 'https://storage.example.com/v1/s3/test-bucket',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'expected' => 'https://storage.example.com/v1/s3/test-bucket/file.txt',
            'description' => 'S3-compatible service with base path'
        ];

        yield 's3_compatible_with_trailing_slash' => [
            'endpoint' => 'https://storage.example.com/v1/s3/test-bucket',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'expected' => 'https://storage.example.com/v1/s3/test-bucket/file.txt',
            'description' => 'S3-compatible service with trailing slash'
        ];

        // Special characters in keys
        yield 's3_special_chars_key' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'file@name#test.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/file%40name%23test.txt',
            'description' => 'Key with special characters'
        ];

        yield 's3_unicode_key' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'файл.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/%D1%84%D0%B0%D0%B9%D0%BB.txt',
            'description' => 'Key with unicode characters'
        ];
    }

    public function s3DotSegmentProvider(): \Generator
    {
        // Virtual-hosted-style (default)
        yield 's3_virtual_dot_segment_start' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => '../file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/../file.txt',
            'description' => 'Virtual-hosted: Dot segments at start (preserved)'
        ];

        yield 's3_virtual_dot_segment_middle' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'folder/../file.txt',
            'expected' => 'https://test-bucket.s3.amazonaws.com/folder/../file.txt',
            'description' => 'Virtual-hosted: Dot segments in middle (preserved)'
        ];

        yield 's3_virtual_dot_segment_end' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => 'folder/..',
            'expected' => 'https://test-bucket.s3.amazonaws.com/folder/..',
            'description' => 'Virtual-hosted: Dot segments at end (preserved)'
        ];

        // Path-style for comparison
        yield 's3_path_dot_segment_start' => [
            'endpoint' => 'https://s3.amazonaws.com/test-bucket',
            'bucket' => 'test-bucket',
            'key' => '../file.txt',
            'expected' => 'https://s3.amazonaws.com/test-bucket/../file.txt',
            'description' => 'Path-style: Dot segments at start (preserved)'
        ];

        yield 's3_path_single_dot' => [
            'endpoint' => 'https://s3.amazonaws.com/test-bucket',
            'bucket' => 'test-bucket',
            'key' => './file.txt',
            'expected' => 'https://s3.amazonaws.com/test-bucket/./file.txt',
            'description' => 'Path-style: Single dot segment (preserved)'
        ];

        yield 's3_path_multiple_dots' => [
            'endpoint' => 'https://s3.amazonaws.com/test-bucket',
            'bucket' => 'test-bucket',
            'key' => 'a/../b/../c/./file.txt',
            'expected' => 'https://s3.amazonaws.com/test-bucket/a/../b/../c/./file.txt',
            'description' => 'Path-style: Multiple dot segments (preserved)'
        ];

        yield 's3_virtual_just_dots' => [
            'endpoint' => 'https://test-bucket.s3.amazonaws.com',
            'bucket' => 'test-bucket',
            'key' => '..',
            'expected' => 'https://test-bucket.s3.amazonaws.com/..',
            'description' => 'Virtual-hosted: Key is just dots (preserved)'
        ];
    }

    public function restXmlEndpointResolutionProvider(): \Generator
    {
        // Basic REST XML service endpoints
        yield 'restxml_no_path' => [
            'endpoint' => 'https://service.amazonaws.com',
            'requestUri' => '/resource',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'https://service.amazonaws.com/resource',
            'description' => 'Basic REST XML endpoint'
        ];

        yield 'restxml_with_path' => [
            'endpoint' => 'https://service.amazonaws.com/v1',
            'requestUri' => '/resource',
            'pathParams' => [],
            'queryParams' => [],
            'expected' => 'https://service.amazonaws.com/v1/resource',
            'description' => 'REST XML with base path'
        ];

        yield 'restxml_path_params' => [
            'endpoint' => 'https://service.amazonaws.com',
            'requestUri' => '/resource/{id}',
            'pathParams' => ['id' => '12345'],
            'queryParams' => [],
            'expected' => 'https://service.amazonaws.com/resource/12345',
            'description' => 'REST XML with path parameters'
        ];

        yield 'restxml_query_params' => [
            'endpoint' => 'https://service.amazonaws.com',
            'requestUri' => '/resource',
            'pathParams' => [],
            'queryParams' => ['filter' => 'active', 'limit' => '10'],
            'expected' => 'https://service.amazonaws.com/resource?filter=active&limit=10',
            'description' => 'REST XML with query parameters'
        ];

        yield 'restxml_complex_path' => [
            'endpoint' => 'https://service.amazonaws.com/api/v2',
            'requestUri' => '/resource/{type}/{id}',
            'pathParams' => ['type' => 'users', 'id' => 'abc-123'],
            'queryParams' => ['fields' => 'name,email'],
            'expected' => 'https://service.amazonaws.com/api/v2/resource/users/abc-123?fields=name%2Cemail',
            'description' => 'REST XML with complex path and query'
        ];
    }

    /**
     * @dataProvider s3E2EProvider
     */
    public function testS3EndpointResolutionE2E(
        string $region,
        string $bucket,
        string $key,
        array $config,
        string $expected,
        string $description
    ): void
    {
        // EndpointV2 provider - default
        $client = $this->getTestClient('s3', array_merge([
            'region' => $region,
            'credentials' => [
                'key' =>'foo',
                'secret' => 'bar']
            ], $config)
        );

        $this->addMockResults($client, [new Result([])]);

        $client->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) use ($expected, $description) {
                $this->assertEquals(
                    $expected,
                    (string) $req->getUri(),
                    "E2E S3 - {$description}"
                );
            })
        );

        $client->getObject(['Bucket' => $bucket, 'Key' => $key]);
    }

    /**
     * @dataProvider s3E2EProvider
     */
    public function testS3EndpointResolutionE2ELegacyProvider(
        string $region,
        string $bucket,
        string $key,
        array $config,
        string $expected,
        string $description
    ): void
    {
        // Create S3 client with legacy provider
        $client = $this->getTestClient('s3', array_merge([
            'region' => $region,
            'endpoint_provider' => PartitionEndpointProvider::defaultProvider(),
            'credentials' => [
                'key' => 'foo',
                'secret' => 'bar'
            ]
        ], $config));

        $this->addMockResults($client, [new Result([])]);

        $client->getHandlerList()->appendSign(
            Middleware::tap(function ($cmd, $req) use ($expected, $description) {
                $this->assertEquals(
                    $expected,
                    (string) $req->getUri(),
                    "E2E S3 Legacy - {$description}"
                );
            })
        );

        $client->getObject(['Bucket' => $bucket, 'Key' => $key]);
    }

    public function s3E2EProvider(): \Generator
    {
        // Virtual-hosted style (default)
        yield 's3_virtual_simple' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/file.txt',
            'description' => 'Virtual-hosted standard'
        ];

        yield 's3_virtual_nested_key' => [
            'region' => 'us-west-2',
            'bucket' => 'my-bucket',
            'key' => 'folder/subfolder/file.txt',
            'config' => [],
            'expected' => 'https://my-bucket.s3.us-west-2.amazonaws.com/folder/subfolder/file.txt',
            'description' => 'Virtual-hosted with nested key'
        ];

        // Path-style (forced)
        yield 's3_path_style' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'config' => ['use_path_style_endpoint' => true],
            'expected' => 'https://s3.us-west-2.amazonaws.com/test-bucket/file.txt',
            'description' => 'Path-style forced'
        ];

        // Dot segments preservation
        yield 's3_dot_segments_start' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => '../file.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/../file.txt',
            'description' => 'Dot segments at start preserved'
        ];

        yield 's3_dot_segments_middle' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'folder/../file.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/folder/../file.txt',
            'description' => 'Dot segments in middle preserved'
        ];

        yield 's3_dot_segments_end' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'folder/..',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/folder/..',
            'description' => 'Dot segments at end preserved'
        ];

        // Leading slash preservation
        yield 's3_leading_slash' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => '/file.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com//file.txt',
            'description' => 'Leading slash preserved'
        ];

        yield 's3_double_slash' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => '//file.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com///file.txt',
            'description' => 'Double slash preserved'
        ];

        // Special characters
        yield 's3_spaces_in_key' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'my file.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/my%20file.txt',
            'description' => 'Spaces encoded properly'
        ];

        yield 's3_special_chars' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'file@test#name.txt',
            'config' => [],
            'expected' => 'https://test-bucket.s3.us-west-2.amazonaws.com/file%40test%23name.txt',
            'description' => 'Special characters encoded'
        ];

        // S3-compatible with custom endpoint
        yield 's3_compatible_service' => [
            'region' => 'us-west-2',
            'bucket' => 'my-bucket',
            'key' => 'file.txt',
            'config' => [
                'endpoint' => 'https://storage.example.com/v1/s3',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://storage.example.com/v1/s3/my-bucket/file.txt',
            'description' => 'S3-compatible service with custom endpoint'
        ];

        yield 's3_compatible_trailing_slash' => [
            'region' => 'us-west-2',
            'bucket' => 'my-bucket',
            'key' => 'file.txt',
            'config' => [
                'endpoint' => 'https://storage.example.com/v1/s3/',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://storage.example.com/v1/s3/my-bucket/file.txt',
            'description' => 'S3-compatible with trailing slash'
        ];

        yield 's3_compatible_minio' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'config' => [
                'endpoint' => 'https://minio.example.com:9000',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://minio.example.com:9000/test-bucket/file.txt',
            'description' => 'MinIO S3-compatible service'
        ];

        yield 's3_compatible_nested_path' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'folder/file.txt',
            'config' => [
                'endpoint' => 'https://cdn.company.com/api/v2/s3',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://cdn.company.com/api/v2/s3/test-bucket/folder/file.txt',
            'description' => 'S3-compatible with nested endpoint path'
        ];

        yield 's3_compatible_dot_segments' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => '../file.txt',
            'config' => [
                'endpoint' => 'https://storage.example.com/v1/s3',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://storage.example.com/v1/s3/test-bucket/../file.txt',
            'description' => 'S3-compatible with dot segments preserved'
        ];

        yield 's3_compatible_leading_slash_key' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => '/file.txt',
            'config' => [
                'endpoint' => 'https://storage.example.com/v1/s3',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://storage.example.com/v1/s3/test-bucket//file.txt',
            'description' => 'S3-compatible with leading slash in key'
        ];

        yield 's3_compatible_special_chars' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'file@test#name.txt',
            'config' => [
                'endpoint' => 'https://storage.example.com/v1/s3/',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://storage.example.com/v1/s3/test-bucket/file%40test%23name.txt',
            'description' => 'S3-compatible with special characters'
        ];

        yield 's3_compatible_supabase' => [
            'region' => 'us-west-2',
            'bucket' => 'test-bucket',
            'key' => 'file.txt',
            'config' => [
                'endpoint' => 'https://xxxxx.supabase.co/storage/v1/s3',
                'use_path_style_endpoint' => true
            ],
            'expected' => 'https://xxxxx.supabase.co/storage/v1/s3/test-bucket/file.txt',
            'description' => 'Supabase S3-compatible storage'
        ];
    }

    public function testPayloadMemberRootElement()
    {
        $client = $this->getTestClient('s3', ['region' => 'us-east-1']);
        $command = $client->getCommand('PutBucketLifecycleConfiguration', [
            'Bucket' => 'test-bucket',
            'LifecycleConfiguration' => [
                'Rules' => [
                    [
                        'ID' => 'rule1',
                        'Status' => 'Enabled',
                        'Prefix' => 'documents/',
                        'Transitions' => [
                            [
                                'Days' => 30,
                                'StorageClass' => 'STANDARD_IA'
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        $serializer = new RestXmlSerializer($client->getApi(), $client->getEndpoint());
        $request = $serializer($command);

        $body = (string) $request->getBody();

        $this->assertStringContainsString(
            '<LifecycleConfiguration xmlns="http://s3.amazonaws.com/doc/2006-03-01/">',
            $body
        );
        $this->assertStringNotContainsString('<BucketLifecycleConfiguration', $body);
        $this->assertStringContainsString('<Rule>', $body);
        $this->assertStringContainsString('<ID>rule1</ID>', $body);
    }

    private function getS3TestService(): Service
    {
        return new Service(
            [
                'metadata' => [
                    'protocol' => 'rest-xml',
                    'serviceIdentifier' => 's3'
                ],
                'operations' => [
                    'GetObject' => [
                        'http' => [
                            'method' => 'GET',
                            'requestUri' => '/{Key+}'
                        ],
                        'input' => ['shape' => 'GetObjectInput']
                    ]
                ],
                'shapes' => [
                    'GetObjectInput' => [
                        'type' => 'structure',
                        'members' => [
                            'Bucket' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'Bucket'
                            ],
                            'Key' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'Key'
                            ]
                        ]
                    ],
                    'String' => ['type' => 'string']
                ]
            ],
            function () {}
        );
    }

    private function getRestXmlTestService(string $requestUri): Service
    {
        return new Service(
            [
                'metadata' => [
                    'protocol' => 'rest-xml',
                    'serviceIdentifier' => 'test-xml-service'
                ],
                'operations' => [
                    'testOperation' => [
                        'http' => [
                            'method' => 'GET',
                            'requestUri' => $requestUri
                        ],
                        'input' => ['shape' => 'TestInput']
                    ]
                ],
                'shapes' => [
                    'TestInput' => [
                        'type' => 'structure',
                        'members' => [
                            'id' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'id'
                            ],
                            'type' => [
                                'shape' => 'String',
                                'location' => 'uri',
                                'locationName' => 'type'
                            ],
                            'query' => [
                                'shape' => 'QueryMap',
                                'location' => 'querystring'
                            ]
                        ]
                    ],
                    'String' => ['type' => 'string'],
                    'QueryMap' => [
                        'type' => 'map',
                        'key' => ['shape' => 'String'],
                        'value' => ['shape' => 'String']
                    ]
                ]
            ],
            function () {}
        );
    }
}
