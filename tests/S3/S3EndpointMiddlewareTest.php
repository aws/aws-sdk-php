<?php
namespace Aws\Test\S3;

use Aws\Command;
use Aws\CommandInterface;
use Aws\Result;
use Aws\S3\S3Client;
use Aws\S3\S3EndpointMiddleware;
use Aws\Test\UsesServiceTrait;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use PHPUnit\Framework\TestCase;

class S3EndpointMiddlewareTest extends TestCase
{
    use UsesServiceTrait;

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesAccelerateDualStackEndpointToCommand(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->acceleratePatternAssertingHandler($command, 's3-accelerate.dualstack'),
            'us-west-2',
            [
                'dual_stack' => true,
                'accelerate' => true,
            ]
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider excludedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesDualStackToCommandForInvalidOperationsWhenEnableBoth(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            'us-west-2',
            [
                'dual_stack' => true,
                'accelerate' => true,
            ]
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider excludedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesDualStackWithPathStyleToCommandForInvalidOperationsWhenEnableBoth(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->dualStackWithPathStyleAssertingHandler($command),
            'us-west-2',
            [
                'dual_stack' => true,
                'accelerate' => true,
                'path_style' => true,
            ]
        );

        $middleware($command, $this->getPathStyleRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testDoesNothingWithoutOptIn(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->noAcceleratePatternAssertingHandler($command, 's3-accelerate.dualstack'),
            'us-west-2',
            []
        );

        $middleware($command, $this->getRequest($command));

        $middleware = new S3EndpointMiddleware(
            $this->noDualStackAssertingHandler($command),
            'us-west-2',
            []
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesAccelerateDualStackEndpointWithOperationalLevelOptIn(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->acceleratePatternAssertingHandler($command, 's3-accelerate.dualstack'),
            'us-west-2',
            [
                'dual_stack' => false,
                'accelerate' => false,
            ]
        );

        $command['@use_accelerate_endpoint'] = true;
        $command['@use_dual_stack_endpoint'] = true;
        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider excludedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesDualStackForInvalidOperationsWhenEnableBothAtOperationalLevel(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            'us-west-2',
            []
        );

        $command['@use_accelerate_endpoint'] = true;
        $command['@use_dual_stack_endpoint'] = true;
        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider excludedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesDualStackForInvalidOperationsWhenEnableBothWithPathStyleAtOperationalLevel(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->dualStackWithPathStyleAssertingHandler($command),
            'us-west-2',
            []
        );

        $command['@use_accelerate_endpoint'] = true;
        $command['@use_dual_stack_endpoint'] = true;
        $command['@use_path_style_endpoint'] = true;
        $middleware($command, $this->getPathStyleRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testDoesNothingWhenDisabledBothOnOperationLevel(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->noAcceleratePatternAssertingHandler($command, 's3-accelerate.dualstack'),
            'us-west-2',
            [
                'dual_stack' => true,
                'accelerate' => true,
            ]
        );
        $command['@use_accelerate_endpoint'] = false;
        $command['@use_dual_stack_endpoint'] = false;
        $middleware($command, $this->getRequest($command));

        $middleware = new S3EndpointMiddleware(
            $this->noDualStackAssertingHandler($command),
            'us-west-2',
            [
                'dual_stack' => true,
                'accelerate' => true,
            ]
        );
        $command['@use_accelerate_endpoint'] = false;
        $command['@use_dual_stack_endpoint'] = false;
        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider excludedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testIgnoresExcludedCommands(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->noAcceleratePatternAssertingHandler($command, 's3-accelerate'),
            'us-west-2',
            ['accelerate' => true,]
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testAppliesAccelerateEndpointToCommands(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->acceleratePatternAssertingHandler($command, 's3-accelerate'),
            'us-west-2',
            ['accelerate' => true,]
        );

        $middleware($command, $this->getRequest($command));
    }

    /**
     * @dataProvider includedCommandProvider
     *
     * @param CommandInterface $command
     */
    public function testDoesNothingWhenAccelerationDisabledOnOperationLevel(CommandInterface $command)
    {
        $middleware = new S3EndpointMiddleware(
            $this->noAcceleratePatternAssertingHandler($command, 's3-accelerate'),
            'us-west-2',
            ['accelerate' => true,]
        );

        $command['@use_accelerate_endpoint'] = false;
        $middleware($command, $this->getRequest($command));
    }

    public function testAppliesDualStackEndpointToCommand()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new S3EndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            'us-west-2',
            ['dual_stack' => true,]
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testAppliesDualStackWithPathStyleEndpointToCommand()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new S3EndpointMiddleware(
            $this->dualStackWithPathStyleAssertingHandler($command),
            'us-west-2',
            [
                'dual_stack' => true,
                'path_style' => true
            ]
        );
        $middleware($command, $this->getPathStyleRequest($command));
    }

    public function testAppliesDualStackWithOperationLevelOptIn()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new S3EndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            'us-west-2',
            ['dual_stack' => false,]
        );

        $command['@use_dual_stack_endpoint'] = true;
        $middleware($command, $this->getRequest($command));
    }

    public function testAppliesDualStackWithPathStyleWithOperationLevelOptIn()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new S3EndpointMiddleware(
            $this->dualStackAssertingHandler($command),
            'us-west-2',
            ['dual_stack' => false,]
        );

        $command['@use_dual_stack_endpoint'] = true;
        $command['@use_path_style_endpoing'] = true;
        $middleware($command, $this->getPathStyleRequest($command));
    }

    public function testDoesNothingForDualStackWithoutOptIn()
    {
        $command = new Command('DeleteBucket', ['Bucket' => 'bucket']);
        $middleware = new S3EndpointMiddleware(
            $this->noDualStackAssertingHandler($command),
            'us-west-2',
            []
        );
        $middleware($command, $this->getRequest($command));
    }

    public function testDoesNothingWhenDualStackDisabledOnOperationLevel()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'bucket']);
        $middleware = new S3EndpointMiddleware(
            $this->noDualStackAssertingHandler($command),
            'us-west-2',
            ['dual_stack' => true,]
        );

        $command['@use_dual_stack_endpoint'] = false;
        $middleware($command, $this->getRequest($command));
    }

    public function testIncompatibleHostStyleBucketNameFallback()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'a.']);
        $middleware = new S3EndpointMiddleware(
            $this->dualStackPathStyleFallbackAssertingHandler($command),
            'us-west-2',
            ['dual_stack' => true,]
        );
        $middleware($command, $this->getPathStyleRequest($command));
    }

    public function testIncompatibleHostStyleIpAddressFallback()
    {
        $command = new Command('CreateBucket', ['Bucket' => 'abc']);
        $middleware = new S3EndpointMiddleware(
            $this->ipAddressPathStyleFallbackAssertingHandler($command),
            'us-west-2',
            []
        );
        $middleware($command, $this->getIpAddressPathStyleRequest($command));
    }

    public function testApplyingEndpointWhenEndpointOptionAndPathStyleAreSet()
    {
        $nextHandler = function ($command, Request $request) {
            $uri = $request->getUri();
            $this->assertEquals($expectedHost = 'my-endpoint', $uri->getHost());
            $this->assertEquals($expectedScheme = 'http', $uri->getScheme());
        };
        $command = new Command('CreateBucket', ['Bucket' => 'abc']);
        $middleware = new S3EndpointMiddleware($nextHandler, 'us-west-2', [
            'endpoint'   => 'http://my-endpoint:123',
            'path_style' => true
        ]);
        $requestUri = new Uri('http://my-endpoint:123/some/path');
        $request = new Request('GET', $requestUri);
        $middleware($command, $request);
    }

    public function excludedCommandProvider()
    {
        return array_map(function ($commandName) {
            return [new Command($commandName, ['Bucket' => 'bucket'])];
        }, ['ListBuckets', 'CreateBucket', 'DeleteBucket']);
    }

    public function includedCommandProvider()
    {
        $excludedOperations = array_map(function (array $args) {
            return $args[0]->getName();
        }, $this->excludedCommandProvider());
        $s3Operations = $this->getTestClient('s3')->getApi()->getOperations();
        foreach ($excludedOperations as $excludedOperation) {
            unset($s3Operations[$excludedOperation]);
        }

        return array_map(function ($commandName) {
            return [new Command($commandName, ['Bucket' => 'bucket'])];
        }, array_keys($s3Operations));
    }

    private function getRequest(CommandInterface $command)
    {
        return new Request('GET', "https://{$command['Bucket']}.s3.amazonaws.com/?key=query");
    }

    private function getPathStyleRequest(CommandInterface $command)
    {
        return new Request('GET', "https://s3.amazonaws.com/{$command['Bucket']}?key=query");
    }

    private function getIpAddressPathStyleRequest(CommandInterface $command)
    {
        return new Request('GET', "https://127.250.250.250/{$command['Bucket']}?key=query");
    }

    private function noAcceleratePatternAssertingHandler(CommandInterface $command, $pattern)
    {
        return function (
            CommandInterface $toHandle,
            RequestInterface $req
        ) use ($command, $pattern) {
            $this->assertNotContains($pattern, (string)$req->getUri());
            $this->assertContains($command['Bucket'], $req->getUri()->getHost());
        };
    }

    private function acceleratePatternAssertingHandler(CommandInterface $command, $pattern)
    {
        return function (
            CommandInterface $toHandle,
            RequestInterface $req
        ) use ($command, $pattern) {
            $this->assertSame(
                "{$command['Bucket']}.{$pattern}.amazonaws.com",
                $req->getUri()->getHost()
            );
            $this->assertNotContains($command['Bucket'], $req->getUri()->getPath());
        };
    }

    private function dualStackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertSame(
                "bucket.s3.dualstack.us-west-2.amazonaws.com",
                $req->getUri()->getHost()
            );
            $this->assertNotContains($command['Bucket'], $req->getUri()->getPath());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }

    private function dualStackPathStyleFallbackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertSame(
                "s3.dualstack.us-west-2.amazonaws.com",
                $req->getUri()->getHost()
            );
            $this->assertContains($command['Bucket'], $req->getUri()->getPath());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }

    private function dualStackWithPathStyleAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertSame(
                "s3.dualstack.us-west-2.amazonaws.com",
                $req->getUri()->getHost()
            );
            $this->assertContains($command['Bucket'], $req->getUri()->getPath());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }

    private function noDualStackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertNotContains('s3.dualstack', (string)$req->getUri());
            $this->assertContains($command['Bucket'], $req->getUri()->getHost());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }

    private function ipAddressPathStyleFallbackAssertingHandler(CommandInterface $command)
    {
        return function (
            CommandInterface $cmd,
            RequestInterface $req
        ) use ($command) {
            $this->assertSame(
                "127.250.250.250",
                $req->getUri()->getHost()
            );
            $this->assertContains($command['Bucket'], $req->getUri()->getPath());
            $this->assertContains('key=query', $req->getUri()->getQuery());
        };
    }

    public function jsonCaseProvider()
    {
        return json_decode(
            file_get_contents(__DIR__ . '/test_cases/uri_addressing.json'),
            true
        );
    }

    /**
     * @dataProvider jsonCaseProvider
     *
     * @param array $testCase
     */
    public function testPassesCompliance(
        $bucket,
        $configuredAddressingStyle,
        $expectedUri,
        $region,
        $useDualstack,
        $useS3Accelerate
    ) {
        $key = 'key';
        $client = new S3Client([
            'region' => $region,
            'version' => 'latest',
            'validate' => false,
            'use_dual_stack_endpoint' => $useDualstack,
            'use_accelerate_endpoint' => $useS3Accelerate,
            'use_path_style_endpoint' => $configuredAddressingStyle === 'path',
            'handler' => function (
                CommandInterface $cmd,
                RequestInterface $req
            ) use ($key, $expectedUri) {
                $this->assertEquals($expectedUri . '/' . $key, trim($req->getUri(), '/'));
                return Promise\promise_for(new Result());
            },
        ]);

        $client->getObject([
            'Bucket' => $bucket,
            'Key' => $key,
        ]);
    }

    /**
     * @dataProvider objectLambdasSuccessProvider
     *
     * @param $bucketFieldInput
     * @param $clientRegion
     * @param $additionalFlags
     * @param $useArnRegion
     * @param $endpointUrl
     * @param $expectedEndpoint
     */
    public function testObjectLambdaArnSuccess(
        $bucketFieldInput,
        $clientRegion,
        $additionalFlags,
        $useArnRegion,
        $endpointUrl,
        $expectedEndpoint)
    {
        $isMvpRegion = getenv('AIRGAPPED_REGION') == 'LCK';
        if ($isMvpRegion) {
            $this->markTestSkipped();
        }
        //additional flags is not used yet, will be in the future if dualstack support is added
        $clientConfig = [
            'region' => $clientRegion,
            'use_arn_region' => $useArnRegion,
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $req)
            use ($expectedEndpoint) {
                $this->assertSame(
                    $expectedEndpoint,
                    $req->getUri()->getHost()
                );
                $this->assertSame(
                    '/Bar/Baz',
                    $req->getUri()->getPath()
                );
                return new Result([]);
            },
        ];
        if (!empty($endpointUrl)) {
            $clientConfig['endpoint'] = $endpointUrl;
        }
        $client = new S3Client($clientConfig);
        $command = $client->getCommand(
            'GetObject',
            [
                'Bucket' => $bucketFieldInput,
                'Key' => 'Bar/Baz',
            ]
        );
        $client->execute($command);
    }

    public function objectLambdasSuccessProvider()
    {
        return [
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "us-east-1", "none", false, null, "mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com"],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner", "us-west-2", "none", false, null, "mybanner-123456789012.s3-object-lambda.us-west-2.amazonaws.com"],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:mybanner", "us-west-2", "none", false, null, "mybanner-123456789012.s3-object-lambda.us-west-2.amazonaws.com"],
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "us-west-2", "none", true, null, "mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com"],
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "s3-external-1", "none", true, null, "mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com"],
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "aws-global", "none", true, null, "mybanner-123456789012.s3-object-lambda.us-east-1.amazonaws.com"],
            ["arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner", "cn-north-1", "none", true, null, "mybanner-123456789012.s3-object-lambda.cn-north-1.amazonaws.com.cn"],
            ["arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner", "cn-north-1", "none", false, null, "mybanner-123456789012.s3-object-lambda.cn-north-1.amazonaws.com.cn"],
            ["arn:aws-cn:s3-object-lambda:cn-northwest-1:123456789012:accesspoint/mybanner", "cn-north-1", "none", true, null, "mybanner-123456789012.s3-object-lambda.cn-northwest-1.amazonaws.com.cn"],
            ["arn:aws-us-gov:s3-object-lambda:us-gov-east-1:123456789012:accesspoint/mybanner", "us-gov-east-1", "none", true, null, "mybanner-123456789012.s3-object-lambda.us-gov-east-1.amazonaws.com"],
            ["arn:aws-us-gov:s3-object-lambda:us-gov-east-1:123456789012:accesspoint/mybanner", "fips-us-gov-east-1", "none", true, null, "mybanner-123456789012.s3-object-lambda-fips.us-gov-east-1.amazonaws.com"],
            ["arn:aws-us-gov:s3-object-lambda:us-gov-east-1:123456789012:accesspoint/mybanner", "fips-us-gov-east-1", "none", false, null, "mybanner-123456789012.s3-object-lambda-fips.us-gov-east-1.amazonaws.com"],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner", "us-west-2", "none", false, "my-endpoint.com", "mybanner-123456789012.my-endpoint.com"],
        ];
    }

    /**
     * @dataProvider objectLambdasFailureProvider
     *
     * @param $bucketFieldInput
     * @param $clientRegion
     * @param $additionalFlags
     * @param $useArnRegion
     * @param $endpointUrl
     * @param $expectedException
     */
    public function testObjectLambdaArnFailures(
        $bucketFieldInput,
        $clientRegion,
        $additionalFlags,
        $useArnRegion,
        $endpointUrl,
        $expectedException)
    {
        $clientConfig = [
            'region' => $clientRegion,
            'use_arn_region' => $useArnRegion,
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $req)
            use ($expectedException) {
                $this->assertSame(
                    $expectedException,
                    $req->getUri()->getHost()
                );
                $this->assertSame(
                    '/Bar/Baz',
                    $req->getUri()->getPath()
                );
                return new Result([]);
            },
        ];
        if (!empty($additionalFlags) && $additionalFlags == 'dualstack') {
            $clientConfig['use_dual_stack_endpoint'] = true;
        }
        if (!empty($additionalFlags) && $additionalFlags == 'accelerate') {
            $clientConfig['use_accelerate_endpoint'] = true;
        }
        $client = new S3Client($clientConfig);

        $command = $client->getCommand(
            'GetObject',
            [
                'Bucket' => $bucketFieldInput,
                'Key' => 'Bar/Baz',
            ]
        );
        try {
            $client->execute($command);
            $this->fail("did not catch exception: " . $expectedException);
        } catch (\Exception $e) {
            $this->assertContains($expectedException, $e->getMessage());
        }
    }

    public function objectLambdasFailureProvider()
    {
        return [
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "us-west-2", "none", false, null, "The region specified in the ARN (us-east-1) does not match the client region (us-west-2)."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner", "us-west-2", "dualstack", true, null, "Dualstack is currently not supported with Object Lambda access points. Please disable dualstack or do not supply an access point ARN."],
            ["arn:aws-cn:s3-object-lambda:cn-north-1:123456789012:accesspoint/mybanner", "us-west-2", "none", true, null, "The supplied ARN partition does not match the client's partition."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint/mybanner", "us-west-2", "accelerate", null, null, "Accelerate is currently not supported with access points. Please disable accelerate or do not supply an access point ARN."],
            ["arn:aws:sqs:us-west-2:123456789012:someresource", "us-west-2", "n/a", null, null, "Provided ARN was not a valid S3 access point ARN or S3 Outposts access point ARN."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:bucket_name:mybucket", "us-west-2", "n/a", null, null, "The 6th component of an access point ARN represents the resource type and must be 'accesspoint'."],
            ["arn:aws:s3-object-lambda::123456789012:accesspoint/mybanner", "us-west-2", "none", null, null, "The 4th component of a access point ARN represents the region and must not be empty."],
            ["arn:aws:s3-object-lambda:us-west-2::accesspoint/mybanner", "us-west-2", "none", null, null, "The 5th component of a access point ARN is required, represents the account ID, and must be a valid host label."],
            ["arn:aws:s3-object-lambda:us-west-2:123.45678.9012:accesspoint:mybucket", "us-west-2", "n/a", null, null, "The 5th component of a access point ARN is required, represents the account ID, and must be a valid host label."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint", "us-west-2", "n/a", null, null, "The 7th component of an access point ARN represents the resource ID and must not be empty."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:*", "us-west-2", "n/a", null, null, "The resource ID in an access point ARN must be a valid host label value."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:my.bucket", "us-west-2", "n/a", null, null, "The resource ID in an access point ARN must be a valid host label value."],
            ["arn:aws:s3-object-lambda:us-west-2:123456789012:accesspoint:mybucket:object:foo", "us-west-2", "n/a", null, null, "The resource ID component of an access point ARN must not contain additional components (delimited by ':')"],
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "s3-external-1", "none", false, null, "Global endpoints do not support cross region requests. Please enable use_arn_region or do not supply a global region with a different region in the ARN."],
            ["arn:aws:s3-object-lambda:us-east-1:123456789012:accesspoint/mybanner", "aws-global", "none", false, null, "Global endpoints do not support cross region requests. Please enable use_arn_region or do not supply a global region with a different region in the ARN."],
            ["arn:aws-us-gov:s3-object-lambda:us-gov-west-1:123456789012:accesspoint/mybanner", "fips-us-gov-east-1", "none", true, null, "Fips is currently not supported with cross region requests. Please provide a non-fips region or supply a matching access point ARN region and client region"],
            ["arn:aws-us-gov:s3-object-lambda:us-gov-west-1:123456789012:accesspoint/mybanner", "fips-us-gov-east-1", "none", false, null, "The region specified in the ARN (us-gov-west-1) does not match the client region (fips-us-gov-east-1)."],
        ];
    }


    /**
     * @dataProvider writeGetObjectResponseProvider
     *
     * @param $clientRegion
     * @param $route
     * @param $endpointUrl
     * @param $expectedEndpoint
     */
    public function testWriteGetObjectResponse(
        $clientRegion,
        $route,
        $endpointUrl,
        $expectedEndpoint
    )
    {
        //additional flags is not used yet, will be in the future if dualstack support is added
        $clientConfig = [
            'region' => $clientRegion,
            'version' => 'latest',
            'handler' => function (CommandInterface $cmd, RequestInterface $req)
            use ($expectedEndpoint) {
                $this->assertSame(
                    $expectedEndpoint,
                    $req->getUri()->getHost()
                );
                return new Result([]);
            },
        ];
        if (!empty($endpointUrl)) {
            $clientConfig['endpoint'] = $endpointUrl;
        }
        $client = new S3Client($clientConfig);
        $command = $client->getCommand(
            'WriteGetObjectResponse',
            [
                'RequestRoute' => $route,
                'RequestToken' => 'def'
            ]
        );
        $client->execute($command);
    }

    public function writeGetObjectResponseProvider()
    {

        return [
            ["us-west-2", "route", null, 'route.s3-object-lambda.us-west-2.amazonaws.com'],
            ["us-east-1", "route", null, 'route.s3-object-lambda.us-east-1.amazonaws.com'],
        ];
    }
}
