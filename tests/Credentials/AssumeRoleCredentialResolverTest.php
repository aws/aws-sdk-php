<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\AssumeRoleCredentialResolver;
use Aws\Credentials\Credentials;
use Aws\Exception\CredentialsException;
use Aws\Credentials\CredentialTrait;
use GuzzleHttp\Promise;
/**
 * @covers \Aws\Credentials\AssumeRoleCredentialResolver
 */
class AssumeRoleCredentialResolverTest extends \PHPUnit_Framework_TestCase
{
    private $home;

    use CredentialTrait;

    public function testResolveAssumeRoleCredential()
    {
        $differFromAssumeRole = <<<EOT
[default]
aws_access_key_id=foo
aws_secret_access_key=bar
aws_session_token=baz
region=us-east-1

[assumes_role]
role_arn=arn:aws:iam::123456789:role/foo
role_session_name=test
source_profile=default
EOT;
        $path = $this->createProfile($differFromAssumeRole, '/credentials');
        $params = [
            'region' => 'us-east-1',
            'credentials' => new Credentials('foo', 'bar', 'baz'),
            'assume_role_params' => [
                'roleArn' => 'arn:aws:iam::123456789:role/foo',
                'roleSessionName' => 'test',
            ]
        ];

        $resolver = new AssumeRoleCredentialResolver([
            'assume_role_profile' => 'assumes_role',
            'file_name' => $path,
            'provider_param' => true,
        ]);
        $args = $resolver();
        $found = $args['credentials']()->wait();

        $creds = $params['credentials'];
        $this->assertEquals($args['region'], $params['region']);
        $this->assertEquals($creds->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertEquals($creds->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($creds->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($creds->getExpiration(), $found->getExpiration());
        unlink($path);
    }

    /**
     * @dataProvider insufficientParamsProvider
     * 
     * @expectedException \Aws\Exception\CredentialsException
     */
    public function testEnsuresSufficientProfileData($data)
    {
        $path = $this->createProfile($data, '/credentials');
        $resolver = new AssumeRoleCredentialResolver([
            'assume_role_profile' => 'assumes_role',
            'file_name' => $path,
        ]);
        $resolver()->wait();
    }
 
    public function insufficientParamsProvider()
    {
        $noAssumeRole = <<<EOT
[default]
aws_access_key_id = foo
aws_secret_access_key = bar
aws_session_token = baz
EOT;
        $noRegion = <<<EOT
[default]
aws_access_key_id=foo
aws_secret_access_key=bar
aws_session_token=baz

[assumes_role]
role_arn=arn:aws:iam::123456789:role/foo
role_session_name=test
EOT;
        return [
            [ $noAssumeRole ],
            [ $noRegion ]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing required 'AssumeRoleCredentialResolver' configuration option:
     */
    public function testEnsureSufficientArguments()
    {
        $resolver = new AssumeRoleCredentialResolver([
            'assume_role_profile' => 'assumes_role',
        ]);
        $resolver()->wait();

        $resolver = new AssumeRoleCredentialResolver([
            'file_name' => 'filename',
        ]);
        $resolver()->wait();
    }

    public function testCanResolveCrossFile()
    {
        $credFile = <<<EOT
[default]
aws_access_key_id=foo
aws_secret_access_key=bar
aws_session_token=baz
region=us-east-1

[assumes_role]
role_arn=arn:aws:iam::123456789:role/foo
role_session_name=test
source_profile=profile default
EOT;
        $configFile = <<<EOT
[profile default]
aws_access_key_id=baz
aws_secret_access_key=foo
aws_session_token=bar
region=us-east-1
EOT;
        $path = $this->createProfile($credFile, '/credentials');
        $configPath = $this->createProfile($configFile, '/config');

        $params = [
            'region' => 'us-east-1',
            'credentials' => new Credentials('baz', 'foo', 'bar'),
            'assume_role_params' => [
                'roleArn' => 'arn:aws:iam::123456789:role/foo',
                'roleSessionName' => 'test',
            ]
        ];

        $resolver = new AssumeRoleCredentialResolver([
            'assume_role_profile' => 'assumes_role',
            'file_name' => $path,
            'provider_param' => true,
        ]);
        $args = $resolver();
        $found = $args['credentials']()->wait();

        $creds = $params['credentials'];
        $this->assertEquals($args['region'], $params['region']);
        $this->assertEquals($creds->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertEquals($creds->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($creds->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($creds->getExpiration(), $found->getExpiration());
        unlink($path);
        unlink($configPath);
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error retrieving credentials from the instance profile metadata server
     */
    public function testResolveWithSourceProfileMissing()
    {
        $differFromAssumeRole = <<<EOT
[default]
aws_access_key_id=foo
aws_secret_access_key=bar
aws_session_token=baz
region=us-east-1

[assumes_role]
role_arn=arn:aws:iam::123456789:role/foo
role_session_name=test
EOT;
        $path = $this->createProfile($differFromAssumeRole, '/credentials');
        $params = [
            'region' => 'us-east-1',
            'credentials' => new Credentials('foo', 'bar', 'baz'),
            'assume_role_params' => [
                'roleArn' => 'arn:aws:iam::123456789:role/foo',
                'roleSessionName' => 'test',
            ]
        ];

        $resolver = new AssumeRoleCredentialResolver([
            'assume_role_profile' => 'assumes_role',
            'file_name' => $path,
            'provider_param' => true,
        ]);
        $args = $resolver();
        $this->assertEquals($args['region'], $params['region']);
        unlink($path);

        $args['credentials']()->wait();
    }

    public function testCanResolveWithSameProfileName()
    {
        $sameWithAssumeRole = <<<EOT
[default]
aws_access_key_id=foo
aws_secret_access_key=bar
aws_session_token=baz
region=us-east-1

[assumes_role]
role_arn=arn:aws:iam::123456789:role/foo
role_session_name=test
source_profile=assumes_role
region=us-west-2
EOT;
        $path = $this->createProfile($sameWithAssumeRole, '/credentials');

        $params = [
            'region' => 'us-west-2',
            'credentials' => new Credentials('foo', 'bar', 'baz'),
            'assume_role_params' => [
                'roleArn' => 'arn:aws:iam::123456789:role/foo',
                'roleSessionName' => 'test',
            ]
        ];

        $resolver = new AssumeRoleCredentialResolver([
            'assume_role_profile' => 'assumes_role',
            'file_name' => $path,
            'provider_param' => true,
        ]);
        $args = $resolver();
        $found = $args['credentials']()->wait();

        $creds = $params['credentials'];
        $this->assertEquals($args['region'], $params['region']);
        $this->assertEquals($creds->getAccessKeyId(), $found->getAccessKeyId());
        $this->assertEquals($creds->getSecretKey(), $found->getSecretKey());
        $this->assertEquals($creds->getSecurityToken(), $found->getSecurityToken());
        $this->assertEquals($creds->getExpiration(), $found->getExpiration());
        unlink($path);
    }

    private function clearEnv()
    {
        $dir = sys_get_temp_dir() . '/.aws';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        return $dir;
    }

    private function createProfile($data, $fileName)
    {
        $dir = $this->clearEnv();
        file_put_contents($dir . $fileName, $data);
        putenv('HOME=' . dirname($dir));

        return $dir . $fileName;
    }

    public function setUp()
    {
        $this->home = getenv('HOME');
    }

    public function tearDown()
    {
        putenv('HOME=' . $this->home);
    }
}
