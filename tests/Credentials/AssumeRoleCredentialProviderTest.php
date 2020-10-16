<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\AssumeRoleCredentialProvider;
use Aws\Credentials\Credentials;
use Aws\Exception\AwsException;
use Aws\Result;
use Aws\Sts\StsClient;
use Aws\Api\DateTimeResult;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\RejectedPromise;
use Aws\Test\UsesServiceTrait;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Aws\Credentials\AssumeRoleCredentialProvider
 */
class AssumeRoleCredentialProviderTest extends TestCase
{
    const SAMPLE_ROLE_ARN = 'arn:aws:iam::012345678910:role/role_name';

    use UsesServiceTrait;

    /**
     * @dataProvider insufficientArguments
     *
     * @param array $config
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage  Missing required 'AssumeRoleCredentialProvider' configuration option:
     */
    public function testEnsureSourceProfileProvidedForAssumeRole($config)
    {
        new AssumeRoleCredentialProvider($config);
    }

    /**
     * @dataProvider insufficientArguments
     */
    public function insufficientArguments()
    {
        $client = [
            'client' => new StsClient([
                'region' => 'us-west-2',
                'version' => 'latest',
                'credentials' => new Credentials('foo', 'bar')
            ])
        ];
        $params = [
            'assume_role_params' => [
                'RoleArn' => self::SAMPLE_ROLE_ARN,
                'RoleSessionName' => 'test_session',
            ]
        ];

        return [
            [ $client ],
            [ $params ],
        ];
    }

    public function testCanLoadAssumeRoleCredentials()
    {
        $result = [
            'Credentials' => [
                'AccessKeyId'     => 'foo',
                'SecretAccessKey' => 'bar',
                'SessionToken'    => null,
                'Expiration'      => DateTimeResult::fromEpoch(time() + 10)
            ],
            'AssumedRoleUser' => [
                'AssumedRoleId' => 'ARXXXXXXXXXXXXXXXXXXX:test_session',
                'Arn' => self::SAMPLE_ROLE_ARN . "/test_session"
            ]
        ];

        $sts = $this->getTestClient('Sts');
        $sts->getHandlerList()->setHandler(
            function ($c, $r) use ($result) {
                return Promise\promise_for(new Result($result));
            }
        );
        $args['client'] = $sts;
        $args['assume_role_params'] = [
            'RoleArn' => self::SAMPLE_ROLE_ARN,
            'RoleSessionName' => 'test_session',
        ];
        $provider = new AssumeRoleCredentialProvider($args);
        $creds = $provider()->wait();

        $this->assertSame('foo', $creds->getAccessKeyId());
        $this->assertSame('bar', $creds->getSecretKey());
        $this->assertNull($creds->getSecurityToken());
        $this->assertInternalType('int', $creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    /**
     * @expectedException \Aws\Exception\CredentialsException
     * @expectedExceptionMessage Error in retrieving assume role credentials.
     */
    public function testThrowsExceptionWhenRetrievingAssumeRoleCredentialFails()
    {
        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
            'credentials' => new Credentials('foo', 'bar'),
            'http_handler' => function () {
                return new RejectedPromise([
                    'connection_error' => false,
                    'exception' => $this->getMockBuilder(AwsException::class)
                        ->disableOriginalConstructor()
                        ->getMock(),
                    'result' => null,
                ]);
            }
        ]);
        $args['client'] = $sts;
        $args['assume_role_params'] = [
            'RoleArn' => self::SAMPLE_ROLE_ARN,
            'RoleSessionName' => 'test_session',
        ];
        $provider = new AssumeRoleCredentialProvider($args);
        $provider()->wait();
    }
}
