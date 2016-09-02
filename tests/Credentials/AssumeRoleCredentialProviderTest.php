<?php
namespace Aws\Test\Credentials;

use Aws\Credentials\AssumeRoleCredentialProvider;
use Aws\Credentials\CredentialProvider;
use Aws\Exception\AwsException;
use Aws\Exception\CredentialsException;
use Aws\Result;
use Aws\Sts\StsClient;
use Aws\Api\DateTimeResult;
use GuzzleHttp\Psr7;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\FulfilledPromise;
use GuzzleHttp\Promise\RejectedPromise;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Aws\Test\UsesServiceTrait;

/**
 * @covers \Aws\Credentials\AssumeRoleCredentialProvider
 */
class AssumeRoleCredentialProviderTest extends \PHPUnit_Framework_TestCase
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
        $region = ['region' => 'us-west-2'];
        $source_profile = [
            'credentials' => CredentialProvider::ini('test')
        ];
        $params = [
            'assume_role_params' => [
                'RoleArn' => self::SAMPLE_ROLE_ARN,
                'RoleSessionName' => 'test_session',
            ]
        ];

        return [
            [ $region + $params ],
            [ $source_profile + $params ],
            [ $region + $source_profile ],
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
        $args['region'] = 'us-west-2';
        $args['credentials'] = CredentialProvider::ini('default');

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

        $this->assertEquals('foo', $creds->getAccessKeyId());
        $this->assertEquals('bar', $creds->getSecretKey());
        $this->assertEquals(null, $creds->getSecurityToken());
        $this->assertInternalType('int', $creds->getExpiration());
        $this->assertFalse($creds->isExpired());
    }

    /**
     * @expectedException \Aws\Exception\AwsException
     */
    public function testThrowsExceptionWhenRetrievingAssumeRoleCredentialFails()
    {
        $args['region'] = 'us-west-2';
        $args['credentials'] = CredentialProvider::ini('default');

        $sts = new StsClient([
            'region' => 'us-west-2',
            'version' => 'latest',
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
