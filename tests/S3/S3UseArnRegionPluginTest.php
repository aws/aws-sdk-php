<?php

declare(strict_types=1);

namespace Aws\Tests\S3;

use Aws\Core\S3\S3UseArnRegionPlugin;
use Aws\Tests\S3\Utils\S3TestClient;
use Aws\Tests\Utils\TemporaryAwsEnvironment;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Endpoint\EndpointResolverInterface;

final class S3UseArnRegionPluginTest extends TestCase
{
    public function testEnvironmentValueReachesTheEndpointParameters(): void
    {
        $parameters = $this->configure(
            new S3UseArnRegionPlugin(),
            ['AWS_S3_USE_ARN_REGION' => 'true']
        );

        self::assertTrue($parameters['UseArnRegion']);
    }

    public function testProfileValueReachesTheEndpointParameters(): void
    {
        $parameters = $this->configure(
            new S3UseArnRegionPlugin(),
            [],
            "[default]\ns3_use_arn_region = false\n"
        );

        self::assertFalse($parameters['UseArnRegion']);
    }

    public function testExplicitClientValueKeepsTheEnvironmentOut(): void
    {
        $parameters = $this->configure(
            new S3UseArnRegionPlugin(false),
            ['AWS_S3_USE_ARN_REGION' => 'true']
        );

        self::assertArrayNotHasKey('UseArnRegion', $parameters);
    }

    public function testConfiguredEndpointParameterKeepsTheEnvironmentOut(): void
    {
        $parameters = $this->configure(
            new S3UseArnRegionPlugin(),
            ['AWS_S3_USE_ARN_REGION' => 'true'],
            '',
            ['UseArnRegion' => false]
        );

        self::assertFalse($parameters['UseArnRegion']);
    }

    public function testNoSettingLeavesTheConfigUnchanged(): void
    {
        $parameters = $this->configure(new S3UseArnRegionPlugin());

        self::assertArrayNotHasKey('UseArnRegion', $parameters);
    }

    public function testInvalidEnvironmentValueFailsAtConfiguration(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('AWS_S3_USE_ARN_REGION');

        $this->configure(
            new S3UseArnRegionPlugin(),
            ['AWS_S3_USE_ARN_REGION' => 'sometimes']
        );
    }

    /**
     * @param array<string, string> $env
     * @param array<string, mixed> $endpointParameters
     *
     * @return array<string, mixed>
     */
    private function configure(
        S3UseArnRegionPlugin $plugin,
        array $env = [],
        string $config = '',
        array $endpointParameters = []
    ): array
    {
        return TemporaryAwsEnvironment::run(
            static function () use ($plugin, $endpointParameters): array {
                $configured = $plugin->configure(S3TestClient::forModel(
                    context: $endpointParameters === [] ? [] : [
                        EndpointResolverInterface::CONTEXT_PARAMETERS
                            => $endpointParameters
                    ]
                )->getConfig());

                return $configured->context[
                    EndpointResolverInterface::CONTEXT_PARAMETERS
                ] ?? [];
            },
            $env,
            $config
        );
    }
}
