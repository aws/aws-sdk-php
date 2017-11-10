<?php
namespace Aws\Test\Ses;

use Aws\Credentials\Credentials;
use Aws\Ses\SesClient;
use PHPUnit\Framework\TestCase;

class SesClientTest extends TestCase
{
    public function testCanGenerateSmtpPasswordFromCredentials()
    {
        $testCreds = new Credentials(
            'AKIAIOSFODNN7EXAMPLE',
            'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY'
        );
        // Created using sample code on: http://docs.aws.amazon.com/ses/latest/DeveloperGuide/smtp-credentials.html#smtp-credentials-convert
        $expectedPassword = 'An60U4ZD3sd4fg+FvXUjayOipTt8LO4rUUmhpdX6ctDy';

        $this->assertSame(
            $expectedPassword,
            SesClient::generateSmtpPassword($testCreds)
        );
    }
}
