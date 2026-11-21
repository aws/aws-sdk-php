<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Credentials;

use Aws\Core\Credentials\AwsProfileFile;
use PHPUnit\Framework\TestCase;

final class AwsProfileFileTest extends TestCase
{
    public function testMergesConfigAndCredentialsFilesByProfile(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        $config = $dir . '/config';

        file_put_contents($credentials, "[testing]\naws_access_key_id = AKID\naws_secret_access_key = SECRET\n");
        file_put_contents($config, "[profile testing]\nregion = us-west-2\ncredential_process = demo\n");

        $profiles = AwsProfileFile::fromFiles($credentials, $config);
        $profile = $profiles->getProfile('testing');

        $this->assertNotNull($profile);
        $this->assertSame('AKID', $profile->get('aws_access_key_id'));
        $this->assertSame('SECRET', $profile->get('aws_secret_access_key'));
        $this->assertSame('us-west-2', $profile->get('region'));
        $this->assertSame('demo', $profile->get('credential_process'));
    }

    public function testCredentialsFileOverridesConflictingConfigKeys(): void
    {
        $dir = $this->makeTempDir();
        $credentials = $dir . '/credentials';
        $config = $dir . '/config';

        file_put_contents($credentials, "[default]\naws_access_key_id = AKID\n");
        file_put_contents($config, "[default]\naws_access_key_id = OTHER\n");

        $profiles = AwsProfileFile::fromFiles($credentials, $config);

        $this->assertSame('AKID', $profiles->getProfile('default')?->get('aws_access_key_id'));
    }

    public function testMissingFilesYieldEmptyProfileFile(): void
    {
        $profiles = AwsProfileFile::fromFiles('/no/such/credentials', '/no/such/config');

        $this->assertSame([], $profiles->profiles());
    }

    public function testParsesSsoSessionSectionsSeparatelyFromProfiles(): void
    {
        $dir = $this->makeTempDir();
        $config = $dir . '/config';

        file_put_contents($config, <<<CFG
[profile default]
sso_session = dev

[sso-session dev]
sso_region = us-east-1
sso_start_url = https://example.awsapps.com/start
CFG);

        $profiles = AwsProfileFile::fromFiles($dir . '/credentials', $config);

        $this->assertNotNull($profiles->getProfile('default'));
        $this->assertFalse($profiles->hasProfile('sso-session dev'));
        $this->assertSame([
            'sso_region' => 'us-east-1',
            'sso_start_url' => 'https://example.awsapps.com/start',
        ], $profiles->getSsoSession('dev'));
    }

    private function makeTempDir(): string
    {
        $dir = sys_get_temp_dir() . '/aws-profile-test-' . bin2hex(random_bytes(6));
        mkdir($dir, 0777, true);
        return $dir;
    }
}
