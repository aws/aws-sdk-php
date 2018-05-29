<?php

namespace Aws\ClientSideMonitoring;

use Aws\Exception\AwsException;
use Aws\Result;
use Aws\ResultInterface;
use GuzzleHttp\Psr7\Request;
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
                'AccessKey' => [
                    'valueAccessor' => [
                        RequestInterface::class => function () {
                            return 1; // TODO get real value
                        }
                    ]
                ],
                'AttemptLatency' => [
                    'valueAccessor' => [
                        ResultInterface::class => function () {
                            return 1; // TODO get real value
                        }
                    ]
                ],
                'AwsException' => [
                    'valueAccessor' => [
                        AwsException::class => function ($exception) {
                            if ($exception instanceof AwsException) {
                                return $exception->getAwsErrorCode();
                            }
                            return null;
                        }
                    ],
                    'maxLength' => 128,
                ],
                'AwsExceptionMessage' => [
                    'valueAccessor' => [
                        AwsException::class => function ($exception) {
                            if ($exception instanceof AwsException) {
                                return $exception->getAwsErrorMessage();
                            }
                            return null;
                        }
                    ],
                    'maxLength' => 512,
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
                        ResultInterface::class => function ($result) {
                            return $result['@metadata']['statusCode'];
                        },
                        AwsException::class => function(AwsException $e) {
                            return $e->getResponse()->getStatusCode();
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
                'SessionToken' => [
                    'valueAccessor' => [
                        RequestInterface::class => function (RequestInterface $request) {
                            return 1; // TODO get real value
                        }
                    ]
                ],
                'Type' => [
                    'valueAccessor' => [
                        '' => function () {
                            return 'ApiCallAttempt';
                        }
                    ]
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
}
