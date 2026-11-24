<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Client;

use Aws\Core\Client\AbstractAwsClientConfig;
use Aws\Tests\Core\Client\Utils\TestAbstractAwsClientConfigForClient;
use Aws\Tests\Core\Integ\Retry\Utils\{
    TestInput,
    TestOperation
};
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Smithy\Auth\AnonymousIdentityResolver;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Endpoint\StaticEndpointResolver;
use Smithy\Core\Endpoint\Endpoint;

#[CoversClass(AbstractAwsClientConfig::class)]
final class AbstractAwsClientConfigTest extends TestCase
{
    public function testEndpointBecomesEndpointRuleInput(): void
    {
        $config = $this->createConfig('https://endpoint.test');

        $this->assertSame(
            'https://endpoint.test',
            $config->context[
                EndpointResolverInterface::CONTEXT_PARAMETERS
            ]['Endpoint']
        );
        $this->assertSame(
            'https://a.test',
            $config->endpointResolver->resolveEndpoint(
                TestOperation::instance(),
                TestInput::create(),
                $config
            )->url
        );
    }

    public function testCopyKeepsEndpointRuleInput(): void
    {
        $copy = $this->createConfig('https://endpoint.test')
            ->withRegion('eu-west-1');

        $this->assertEquals(
            [
                'Endpoint' => 'https://endpoint.test',
                'Region' => 'eu-west-1',
                'UseFIPS' => false,
                'UseDualStack' => false,
            ],
            $copy->context[EndpointResolverInterface::CONTEXT_PARAMETERS]
        );
    }

    public function testEmptyEndpointAddsNoRuleInput(): void
    {
        $config = $this->createConfig('');

        $this->assertArrayNotHasKey(
            'Endpoint',
            $config->context[EndpointResolverInterface::CONTEXT_PARAMETERS]
        );
    }

    public function testWithEndpointResolverReplacesBuiltInResolver(): void
    {
        $custom = new StaticEndpointResolver(new Endpoint('https://custom.test'));

        $config = $this->createConfig('')->withEndpointResolver($custom);

        $this->assertSame($custom, $config->endpointResolver);
    }

    public function testConstructorEndpointResolverReplacesBuiltInResolver(): void
    {
        $custom = new StaticEndpointResolver(new Endpoint('https://custom.test'));

        $config = new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            endpointResolver: $custom
        );

        $this->assertSame($custom, $config->endpointResolver);
    }

    public function testCustomEndpointResolverSurvivesLaterCopies(): void
    {
        $custom = new StaticEndpointResolver(new Endpoint('https://custom.test'));

        $copy = $this->createConfig('')
            ->withEndpointResolver($custom)
            ->withRegion('eu-west-1');

        $this->assertSame($custom, $copy->endpointResolver);
    }

    public function testCopyWithoutCustomResolverRebuildsBuiltInResolver(): void
    {
        $config = $this->createConfig('');

        $copy = $config->withRegion('eu-west-1');

        $this->assertNotSame($config->endpointResolver, $copy->endpointResolver);
        $this->assertSame(
            'https://a.test',
            $copy->endpointResolver->resolveEndpoint(
                TestOperation::instance(),
                TestInput::create(),
                $copy
            )->url
        );
    }

    private function createConfig(
        string $endpoint
    ): TestAbstractAwsClientConfigForClient
    {
        return new TestAbstractAwsClientConfigForClient(
            region: 'us-east-1',
            credentials: AnonymousIdentityResolver::instance(),
            endpoint: $endpoint
        );
    }
}
