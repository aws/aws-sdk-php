<?php

namespace Aws\Test\AccountIdEndpointSupport;

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use AWS\CRT\Auth\CredentialsProvider;
use Aws\Exception\CredentialsException;
use Aws\Result;
use Aws\Sts\StsClient;
use GuzzleHttp\Promise\Create;
use PHPUnit\Framework\TestCase;

class SourceAccountIdEndpointTest extends TestCase
{

    private $deferredFns = [];

    public function tearDown(): void
    {
        foreach ($this->deferredFns as $deferredFn) {
            $deferredFn();
        }

        $this->deferredFns = [];
    }

    /**
     * @dataProvider stsDataProvider
     * @param $operation
     * @param $response
     * @param $expected
     * @return void
     */
    public function testStsCredentialProviders($operation, $response, $expected)
    {
        $stsClient = $this->getMockBuilder(StsClient::class)
            -> disableOriginalConstructor()
            -> setMethods(['__call'])
            -> getMock();
        $stsClient->method('__call')
            -> willReturnCallback(function ($callOperation) use ($operation, $response) {
                if (($callOperation === $operation . 'Async')) {
                    return Create::promiseFor(
                        new Result(
                            $response
                        )
                    );
                }

                if (($callOperation === $operation)) {
                    return new Result(
                        $response
                    );
                }

                return null;
            });

        $provider = null;
        switch ($operation) {
            case 'assumeRole':
                $params = [
                    'client' => $stsClient,
                    'assume_role_params' => [
                        'RoleArn' => 'arn:aws:sts::123456789001:assumed-role/test-role/Name',
                        'RoleSessionName' => 'TestSession'
                    ]
                ];
                $provider = CredentialProvider::assumeRole($params);
                break;
            case 'assumeRoleWithSAML':
                $provider = function () use($stsClient) {
                    $params = [
                        'RoleArn' => 'arn:aws:sts::123456789001:assumed-role/test-role/Name',
                        'PrincipalArn' => 'arn:aws:sts::123456789001:assumed-role/test-role/Name',
                        'SAMLAssertion' => 'VGhpcyBpcyBhIHRlc3QgYXNzZXJ0aW9u'
                    ];

                    return $stsClient->assumeRoleWithSAMLAsync($params)
                        -> then(function (Result $result) use ($stsClient) {
                            return $stsClient->createCredentials($result);
                        }) -> otherwise(function (\RuntimeException $exception) {
                            throw new CredentialsException(
                                "Error in retrieving assume role credentials.",
                                0,
                                $exception
                            );
                        });
                };
                break;
            case 'assumeRoleWithWebIdentity':
                $tokenPath = $this->createTestWebIdentityToken();
                $this->putEnv([
                    CredentialProvider::ENV_ARN => 'arn:aws:sts::123456789001:assumed-role/test-role/Name',
                    CredentialProvider::ENV_ROLE_SESSION_NAME => 'TestSession',
                    CredentialProvider::ENV_TOKEN_FILE => $tokenPath
                ]);
                $params = [
                    'stsClient' => $stsClient,
                    'region' => 'us-east-1'
                ];
                $provider = CredentialProvider::assumeRoleWithWebIdentityCredentialProvider($params);
                break;
            case 'getFederationToken':
                $provider = function () use ($stsClient) {
                    $params = [
                        'Name' => 'TestUserName'
                    ];

                    return $stsClient->getFederationTokenAsync($params)
                        -> then(function (Result $result) use ($stsClient) {
                            return $stsClient->createCredentials($result);
                        }) -> otherwise(function (\RuntimeException $exception) {
                            throw new CredentialsException(
                                "Error in retrieving assume role credentials.",
                                0,
                                $exception
                            );
                        });
                };
                break;
            default:
                self::fail("Unrecognized operation `$operation` for testing");
        }

        $response = $provider()->wait();
        $expected = $this->normalizeExpectedResponse($expected);

        self::assertSame($expected->toArray(), $response->toArray());
    }

    public function stsDataProvider(): array
    {
        return [
            'Sts::AssumeRole' => [
                'operation' => 'assumeRole',
                'response' => [
                    "AssumedRoleUser" => [
                        "AssumedRoleId" => "roleId",
                        "Arn" => "arn:aws:sts::123456789001:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "123456789001",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz"
                ]
            ],
            'Sts::AssumeRoleWithSaml' => [
                'operation' => 'assumeRoleWithSAML',
                'response' => [
                    "AssumedRoleUser" => [
                        "AssumedRoleId" => "roleId",
                        "Arn" => "arn:aws:sts::123456789001:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "123456789001",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz"
                ]
            ],
            'Sts::AssumeRoleWithWebIdentity' => [
                'operation' => 'assumeRoleWithWebIdentity',
                'response' => [
                    "AssumedRoleUser" => [
                        "AssumedRoleId" => "roleId",
                        "Arn" => "arn:aws:sts::123456789001:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "123456789001",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz"
                ]
            ],
            'Sts::GetFederationToken' => [
                'operation' => 'getFederationToken',
                'response' => [
                    "FederatedUser" => [
                        "FederatedUserId" => "roleId",
                        "Arn" => "arn:aws:sts::123456789001:assumed-role/assume-role-integration-test-role/Name"
                    ],
                    "Credentials" => [
                        "AccessKeyId" => "foo",
                        "SecretAccessKey" => "bar",
                        "SessionToken" => "baz"
                    ]
                ],
                'expected' => [
                    "accountId" => "123456789001",
                    "accessKeyId" => "foo",
                    "secretAccessKey" => "bar",
                    "sessionToken" => "baz"
                ]
            ],
        ];
    }

    private function normalizeExpectedResponse($expected): Credentials
    {
        return new Credentials(
            $expected['accessKeyId'] ?? null,
            $expected['secretAccessKey'] ?? null,
            $expected['sessionToken'] ?? null,
            $expected['expires'] ?? null,
            $expected['accountId'] ?? null
        );
    }

    /**
     * @param array $envValues
     * @return void
     */
    private function putEnv(array $envValues): void
    {
        foreach ($envValues as $key => $value) {
            $currentValue = getenv($key);
            $deferFn = function () use ($key, $currentValue) {
                if (!empty($currentValue)) {
                    putenv($key.'='.$currentValue);
                }
            };
            $this->deferredFns[] = $deferFn;

            putenv($key.'='.$value);
        }
    }

    private function createTestWebIdentityToken(): string
    {
        $dir = sys_get_temp_dir();
        $tokenPath = $dir . '/token';
        file_put_contents($tokenPath, 'token');
        $deferFn = function () use ($tokenPath) {
            unlink($tokenPath);
        };
        $this->deferredFns[] = $deferFn;

        return $tokenPath;
    }
}
