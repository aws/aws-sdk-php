<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\Credentials\CredentialsInterface;
use Aws\Exception\AwsException;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;

/**
 * @internal
 */
class ApiCallAttemptMonitoringMiddleware extends AbstractMonitoringMiddleware
{
    /**
     * @inheritdoc
     */
    public static function getDataConfiguration()
    {
        static $callDataConfig;
        if (empty($callDataConfig)) {
            $callDataConfig = [
                'AttemptLatency' => [
                    'valueAccessor' => [
                        ResultInterface::class => function (ResultInterface $result) {
                            if (isset($result['@metadata']['transferStats']['http'])) {
                                $attempt = end($result['@metadata']['transferStats']['http']);
                                reset($result['@metadata']['transferStats']['http']);
                                if (isset($attempt['total_time'])) {
                                    return $attempt['total_time'];
                                }
                            }
                            return null;
                        },
                        AwsException::class => function (AwsException $exception) {
                            return null; // TODO get real value
                        }
                    ]
                ],
                'AwsException' => [
                    'valueAccessor' => [
                        AwsException::class => function (AwsException $exception) {
                            return $exception->getAwsErrorCode();
                        }
                    ],
                    'maxLength' => 128,
                ],
                'AwsExceptionMessage' => [
                    'valueAccessor' => [
                        AwsException::class => function (AwsException $exception) {
                            return $exception->getAwsErrorMessage();
                        }
                    ],
                    'maxLength' => 512,
                ],
                'DnsLatency' => [
                    'valueAccessor' => [
                        ResultInterface::class => function (ResultInterface $result) {
                            if (isset($result['@metadata']['transferStats']['http'])) {
                                $attempt = end($result['@metadata']['transferStats']['http']);
                                reset($result['@metadata']['transferStats']['http']);
                                if (isset($attempt['namelookup_time'])) {
                                    return $attempt['namelookup_time'];
                                }
                            }
                            return null;
                        }
                    ]
                ],
                'Fqdn' => [
                    'valueAccessor' => [
                        RequestInterface::class => function (RequestInterface $request) {
                            return $request->getUri()->getHost();
                        }
                    ]
                ],
                'HttpStatusCode' => [
                    'valueAccessor' => [
                        ResultInterface::class => function (ResultInterface $result) {
                            return $result['@metadata']['statusCode'];
                        },
                        AwsException::class => function(AwsException $e) {
                            $response = $e->getResponse();
                            if ($response !== null) {
                                return $response->getStatusCode();
                            }
                            return null;
                        }
                    ]
                ],
                'SdkException' => [
                    'valueAccessor' => [
                        \Exception::class => function (\Exception $e) {
                            if (!($e instanceof AwsException)) {
                                return $e->getCode();
                            }
                            return null;
                        }
                    ],
                    'maxLength' => 128,
                ],
                'SdkExceptionMessage' => [
                    'valueAccessor' => [
                        \Exception::class => function (\Exception $e) {
                            if (!($e instanceof AwsException)) {
                                return $e->getMessage();
                            }
                            return null;
                        }
                    ],
                    'maxLength' => 512,
                ],
                'UserAgent' => [
                    'valueAccessor' => [
                        RequestInterface::class => function (RequestInterface $request) {
                            return $request->getHeaderLine('User-Agent')
                                . ' ' . \GuzzleHttp\default_user_agent();
                        }
                    ],
                    'maxLength' => 256,
                ],
                'XAmzId2' => [
                    'valueAccessor' => [
                        ResultInterface::class => self::getResultHeaderAccessor('x-amz-id-2'),
                        AwsException::class => self::getExceptionHeaderAccessor('x-amz-id-2')
                    ]
                ],
                'XAmzRequestId' => [
                    'valueAccessor' => [
                        ResultInterface::class => self::getResultHeaderAccessor('x-amz-request-id'),
                        AwsException::class => self::getExceptionHeaderAccessor('x-amz-request-id')
                    ]
                ],
                'XAmznRequestId' => [
                    'valueAccessor' => [
                        ResultInterface::class => self::getResultHeaderAccessor('x-amzn-RequestId'),
                        AwsException::class => self::getExceptionHeaderAccessor('x-amzn-RequestId')
                    ]
                ]
            ];
        }

        static $dataConfig;
        if (empty($dataConfig)) {
            $dataConfig = array_merge(
                $callDataConfig,
                parent::getDataConfiguration()
            );
        }

        return $dataConfig;
    }

    /**
     * @inheritdoc
     */
    protected function populateRequestEventData(
        CommandInterface $cmd,
        RequestInterface $request,
        array $event
    ) {
        $event = parent::populateRequestEventData($cmd, $request, $event);
        $event['Type'] = 'ApiCallAttempt';
        return $event;
    }

    /**
     * @inheritdoc
     */
    protected function populateResultEventData(
        $result,
        array $event
    ) {
        $event = parent::populateResultEventData($result, $event);

        $provider = $this->credentialProvider;
        /** @var CredentialsInterface $credentials */
        $credentials = $provider()->wait();
        $event['AccessKey'] = $credentials->getAccessKeyId();
        $sessionToken = $credentials->getSecurityToken();
        if (!empty($sessionToken)) {
            $event['SessionToken'] = $sessionToken;
        }
        return $event;
    }
}
