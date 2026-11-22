<?php

declare(strict_types=1);

namespace Aws\Tests\Core\UserAgent;

use Aws\Core\UserAgent\UserAgentStatics;
use PHPUnit\Framework\TestCase;

final class UserAgentStaticsTest extends TestCase
{
    public function testSdkTokenNamesSdkVersionAndUserAgentVersion(): void
    {
        $token = UserAgentStatics::sdkToken();

        $this->assertMatchesRegularExpression(
            '~^aws-sdk-php/[!#$%&\'*+\-.^_`|\~0-9A-Za-z/]+ ua/2\.1$~',
            $token
        );
        $this->assertSame($token, UserAgentStatics::sdkToken());
    }

    public function testOsAndLanguageNamesFamilyAndPhpVersion(): void
    {
        $this->assertMatchesRegularExpression(
            '~^os/(linux|macos|windows|other)#\S+ lang/php#'
                . \preg_quote(\PHP_VERSION, '~') . '$~',
            UserAgentStatics::osAndLanguage()
        );
    }

    public function testPackageVersionReadsInstalledPackages(): void
    {
        $this->assertIsString(
            UserAgentStatics::packageVersion('phpunit/phpunit')
        );
        $this->assertNull(
            UserAgentStatics::packageVersion('aws/aws-sdk-php-not-installed')
        );
    }

    public function testSanitizeReplacesIllegalCharactersWithHyphens(): void
    {
        $this->assertSame(
            'Java_HotSpot_-TM-_64-Bit',
            UserAgentStatics::sanitize('Java_HotSpot_(TM)_64-Bit')
        );
        $this->assertSame('1.0#a/b', UserAgentStatics::sanitize('1.0#a/b'));
    }

    public function testServiceTokenLowercasesAndJoinsWords(): void
    {
        $this->assertSame(
            'sso_oidc',
            UserAgentStatics::serviceToken('SSO OIDC')
        );
        $this->assertSame(
            'api_gateway',
            UserAgentStatics::serviceToken('API Gateway')
        );
    }
}
