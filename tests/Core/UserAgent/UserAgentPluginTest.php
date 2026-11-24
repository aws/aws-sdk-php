<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\UserAgent;

use Aws\Core\Checksum\{RequestChecksumCalculation, ResponseChecksumValidation};
use Aws\Core\UserAgent\{UserAgentInterceptor, UserAgentPlugin};
use Aws\Tests\Core\UserAgent\Utils\UserAgentTestClient;
use Aws\Tests\Utils\Http\MockHttpClient;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Dynamic\DynamicClient;
use Smithy\Client\Endpoint\EndpointResolverInterface;
use Smithy\Client\Plugin\{PluginCollection, PluginPhase};
use Smithy\Client\Retry\StandardRetryStrategy;
use Smithy\Protocol\Aws\RestJsonProtocol;

final class UserAgentPluginTest extends TestCase
{
    private const VARS = [
        'AWS_EXECUTION_ENV',
        'AWS_SDK_UA_APP_ID',
        'AWS_RETRY_MODE',
        'AWS_REQUEST_CHECKSUM_CALCULATION',
        'AWS_RESPONSE_CHECKSUM_VALIDATION',
        'AWS_ACCESS_KEY_ID',
        'AWS_SECRET_ACCESS_KEY',
        'AWS_SESSION_TOKEN',
        'AWS_PROFILE',
        'AWS_CONFIG_FILE',
        'AWS_SHARED_CREDENTIALS_FILE',
        'AWS_EC2_METADATA_DISABLED',
        'AWS_CONTAINER_CREDENTIALS_RELATIVE_URI',
        'AWS_CONTAINER_CREDENTIALS_FULL_URI',
    ];

    /** @var array<string, string|false> */
    private array $saved = [];

    /** @var array<string, mixed> */
    private array $savedEnvSuperglobal = [];

    private string $dir;

    protected function setUp(): void
    {
        $this->savedEnvSuperglobal = $_ENV;
        foreach (self::VARS as $name) {
            unset($_ENV[$name]);
            $this->saved[$name] = \getenv($name);
            \putenv($name);
        }
        $this->dir = \sys_get_temp_dir() . '/ua-test-'
            . \bin2hex(\random_bytes(4));
        \mkdir($this->dir);
        \putenv('AWS_CONFIG_FILE=' . $this->dir . '/config');
        \putenv('AWS_SHARED_CREDENTIALS_FILE=' . $this->dir . '/credentials');
        \putenv('AWS_EC2_METADATA_DISABLED=true');
    }

    protected function tearDown(): void
    {
        $_ENV = $this->savedEnvSuperglobal;
        foreach ($this->saved as $name => $value) {
            $value === false ? \putenv($name) : \putenv("{$name}={$value}");
        }
        foreach (\glob($this->dir . '/*') ?: [] as $file) {
            \unlink($file);
        }
        \rmdir($this->dir);
    }

    public function testHeaderListsSdkApiOsLanguageAndMetrics(): void
    {
        $header = $this->callWith();

        $this->assertMatchesRegularExpression(
            '~^aws-sdk-php/\S+ ua/2\.1 api/user_agent#2026-11-22'
                . ' os/(linux|macos|windows|other)#\S+ lang/php#'
                . \preg_quote(\PHP_VERSION, '~')
                . ' m/E,e$~',
            $header
        );
    }

    public function testExecEnvFollowsLanguageAndAppIdFollowsMetrics(): void
    {
        \putenv('AWS_EXECUTION_ENV=AWS_Lambda_php8.3');
        \putenv('AWS_SDK_UA_APP_ID=my-app');

        $this->assertMatchesRegularExpression(
            '~ lang/php#\S+ exec-env/AWS_Lambda_php8\.3 m/\S+ app/my-app$~',
            $this->callWith()
        );
    }

    public function testAppIdPrecedenceIsClientThenEnvThenConfigFile(): void
    {
        \file_put_contents(
            $this->dir . '/config',
            "[default]\nsdk_ua_app_id = from-file\n"
        );
        $this->assertStringEndsWith(' app/from-file', $this->callWith());

        \putenv('AWS_SDK_UA_APP_ID=from-env');
        $this->assertStringEndsWith(' app/from-env', $this->callWith());

        $this->assertStringEndsWith(
            ' app/from-client',
            $this->callWith(['userAgentAppId' => 'from-client'])
        );
    }

    public function testAppIdIllegalCharactersBecomeHyphens(): void
    {
        \putenv('AWS_SDK_UA_APP_ID=1234(');

        $this->assertStringEndsWith(' app/1234-', $this->callWith());
    }

    public function testAppIdOverFiftyCharactersWarnsOnceAndIsSent(): void
    {
        $appId = \str_repeat('a', UserAgentPlugin::MAX_APP_ID_LENGTH + 1);
        $warnings = [];
        \set_error_handler(
            static function (int $no, string $message) use (&$warnings): bool {
                $warnings[] = $message;

                return true;
            },
            \E_USER_WARNING
        );
        try {
            $http = $this->httpClient();
            $client = UserAgentTestClient::forModel(
                $http,
                ['userAgentAppId' => $appId]
            );
            $client->call('Ping');
            $client->call('Ping');
        } finally {
            \restore_error_handler();
        }

        $this->assertCount(1, $warnings);
        $this->assertStringEndsWith(
            ' app/' . $appId,
            $http->getLastRequest()?->getHeaderLine('User-Agent') ?? ''
        );
    }

    public function testStandardRetryIdLeadsMetrics(): void
    {
        $this->assertStringContainsString(' m/E,', $this->callWith());
        $this->assertStringContainsString(
            ' m/E,',
            $this->callWith(['retryMode' => 'standard'])
        );
    }

    public function testChecksumModeMetricIdsForChecksumServices(): void
    {
        $this->assertStringContainsString(
            ' m/E,Z,b,e',
            $this->callWith(['supportsFlexibleChecksums' => true])
        );
        $this->assertStringContainsString(
            ' m/E,a,c,e',
            $this->callWith([
                'supportsFlexibleChecksums' => true,
                'requestChecksumCalculation' =>
                    RequestChecksumCalculation::WHEN_REQUIRED,
                'responseChecksumValidation' =>
                    ResponseChecksumValidation::WHEN_REQUIRED
            ])
        );
    }

    public function testServicesWithoutChecksumsOmitChecksumModeIds(): void
    {
        $this->assertStringContainsString(
            ' m/E,e',
            $this->callWith([
                'requestChecksumCalculation' =>
                    RequestChecksumCalculation::WHEN_REQUIRED
            ])
        );
    }

    public function testEndpointOverrideMetricId(): void
    {
        $header = $this->callWith(context: [
            EndpointResolverInterface::CONTEXT_PARAMETERS => [
                'Endpoint' => 'https://override.example.test'
            ]
        ]);

        $this->assertStringContainsString(' m/E,N,e', $header);
    }

    public function testEnvironmentCredentialsEmitProviderId(): void
    {
        \putenv('AWS_ACCESS_KEY_ID=AKID');
        \putenv('AWS_SECRET_ACCESS_KEY=SECRET');

        $this->assertMatchesRegularExpression(
            '# m/E,g$#',
            $this->callWith(['credentials' => null])
        );
    }

    public function testStaticProfileCredentialsEmitProfileId(): void
    {
        \file_put_contents(
            $this->dir . '/credentials',
            "[default]\naws_access_key_id = AKID\n"
                . "aws_secret_access_key = SECRET\n"
        );

        $this->assertMatchesRegularExpression(
            '# m/E,n$#',
            $this->callWith(['credentials' => null])
        );
    }

    public function testCredentialProcessProfileEmitsProcessId(): void
    {
        $script = $this->dir . '/process.php';
        \file_put_contents(
            $script,
            '<?php echo json_encode(["Version" => 1, '
                . '"AccessKeyId" => "A", "SecretAccessKey" => "S"]);'
        );
        \file_put_contents(
            $this->dir . '/credentials',
            "[default]\ncredential_process = "
                . \escapeshellarg(\PHP_BINARY) . ' '
                . \escapeshellarg($script) . "\n"
        );

        $this->assertMatchesRegularExpression(
            '# m/E,v$#',
            $this->callWith(['credentials' => null])
        );
    }

    public function testCredentialProcessWinsOverStaticKeys(): void
    {
        $script = $this->dir . '/process.php';
        \file_put_contents(
            $script,
            '<?php echo json_encode(["Version" => 1, '
                . '"AccessKeyId" => "A", "SecretAccessKey" => "S"]);'
        );
        \file_put_contents(
            $this->dir . '/credentials',
            "[default]\naws_access_key_id = AKID\n"
                . "aws_secret_access_key = SECRET\n"
                . "credential_process = "
                . \escapeshellarg(\PHP_BINARY) . ' '
                . \escapeshellarg($script) . "\n"
        );

        $this->assertMatchesRegularExpression(
            '# m/E,v$#',
            $this->callWith(['credentials' => null])
        );
    }

    public function testSigningDoesNotCoverUserAgent(): void
    {
        $http = $this->httpClient();
        UserAgentTestClient::forModel($http)->call('Ping');

        $request = $http->getLastRequest();
        $this->assertNotNull($request);
        $this->assertStringStartsWith(
            'aws-sdk-php/',
            $request->getHeaderLine('User-Agent')
        );
        $this->assertStringContainsString(
            'SignedHeaders=',
            $request->getHeaderLine('Authorization')
        );
        $this->assertStringNotContainsString(
            'user-agent',
            $request->getHeaderLine('Authorization')
        );
    }

    public function testEveryAttemptSendsOneIdenticalHeader(): void
    {
        $http = (new MockHttpClient())
            ->queueResponse('{}', 500)
            ->queueResponse('{}', 500)
            ->queueResponse('{}', 200);
        UserAgentTestClient::forModel(
            $http,
            retryStrategy: new StandardRetryStrategy(
                baseDelay: 0.0,
                throttlingBaseDelay: 0.0
            )
        )->call('Ping');

        $headers = \array_map(
            static fn($request): array => $request->getHeader('User-Agent'),
            $http->getSentRequests()
        );
        $this->assertCount(3, $headers);
        foreach ($headers as $values) {
            $this->assertCount(1, $values);
            $this->assertSame($headers[0], $values);
        }
    }

    public function testInstallsOneInterceptor(): void
    {
        $config = UserAgentTestClient::forModel()->getConfig();

        $this->assertSame(
            $config,
            UserAgentPlugin::instance()->configure($config)
        );
        $this->assertTrue(
            $config->interceptorChain->contains(UserAgentInterceptor::class)
        );
    }

    public function testLeavesNonAwsConfigUnchanged(): void
    {
        $config = DynamicClient::create(
            model: UserAgentTestClient::MODEL,
            protocol: new RestJsonProtocol(),
            httpClient: new MockHttpClient(),
            endpoint: 'https://example.test'
        )->getConfig();

        $this->assertSame(
            $config,
            UserAgentPlugin::instance()->configure($config)
        );
    }

    public function testRunsInLastPhase(): void
    {
        $this->assertSame(
            PluginPhase::Last,
            UserAgentPlugin::instance()->getPluginPhase()
        );
        $this->assertSame(
            UserAgentPlugin::instance(),
            UserAgentPlugin::instance()
        );
    }

    public function testSdkTokenUsesTokenCharactersAndStaysStable(): void
    {
        $pattern = '~^aws-sdk-php/[!#$%&\'*+\-.^_`|\~0-9A-Za-z/]+ ua/2\.1 ~';
        $first = $this->callWith();

        $this->assertMatchesRegularExpression($pattern, $first);
        $this->assertSame(
            \strtok($first, ' '),
            \strtok($this->callWith(), ' ')
        );
    }

    public function testExecEnvIllegalCharactersBecomeHyphens(): void
    {
        \putenv('AWS_EXECUTION_ENV=Java_HotSpot_(TM)_64-Bit');

        $this->assertStringContainsString(
            ' exec-env/Java_HotSpot_-TM-_64-Bit ',
            $this->callWith()
        );
    }

    public function testAppIdTokenCharactersAreKept(): void
    {
        $this->assertStringEndsWith(
            ' app/1.0#a/b',
            $this->callWith(['userAgentAppId' => '1.0#a/b'])
        );
    }

    public function testPackageVersionReadsInstalledPackages(): void
    {
        $method = new \ReflectionMethod(
            UserAgentPlugin::class,
            'packageVersion'
        );

        $this->assertIsString($method->invoke(null, 'phpunit/phpunit'));
        $this->assertNull(
            $method->invoke(null, 'aws/aws-sdk-php-not-installed')
        );
    }

    public function testServiceTokenLowercasesAndJoinsWords(): void
    {
        $method = new \ReflectionMethod(
            UserAgentPlugin::class,
            'serviceToken'
        );

        $this->assertSame('sso_oidc', $method->invoke(null, 'SSO OIDC'));
        $this->assertSame(
            'api_gateway',
            $method->invoke(null, 'API Gateway')
        );
    }

    public function testClientWithoutPluginSendsNoSdkHeader(): void
    {
        $http = $this->httpClient();
        UserAgentTestClient::forModel(
            $http,
            plugins: new PluginCollection()
        )->call('Ping');

        $this->assertStringNotContainsString(
            'aws-sdk-php/',
            $http->getLastRequest()?->getHeaderLine('User-Agent') ?? ''
        );
    }

    /**
     * Send one request and return its User-Agent header.
     *
     * @param array<string, mixed> $settings Named AwsDynamicClientConfig
     *        arguments.
     * @param array<string, mixed> $context
     */
    private function callWith(
        array $settings = [],
        array $context = []
    ): string
    {
        $http = $this->httpClient();
        UserAgentTestClient::forModel(
            $http,
            $settings,
            context: $context
        )->call('Ping');
        $request = $http->getLastRequest();
        $this->assertNotNull($request);

        return $request->getHeaderLine('User-Agent');
    }

    private function httpClient(): MockHttpClient
    {
        return (new MockHttpClient())->fallbackResponse('{}', 200);
    }
}
