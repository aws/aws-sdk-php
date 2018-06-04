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
    public static function getRequestDataConfiguration()
    {
        return [
            'Fqdn' => [
                'valueAccessors' => [
                    RequestInterface::class => function (RequestInterface $request) {
                        return $request->getUri()->getHost();
                    },
                ],
            ],
            'UserAgent' => [
                'valueAccessors' => [
                    RequestInterface::class => function (RequestInterface $request) {
                        return $request->getHeaderLine('User-Agent')
                            . ' ' . \GuzzleHttp\default_user_agent();
                    },
                ],
                'maxLength' => 256,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getResponseDataConfiguration()
    {
        return [
            'AttemptLatency' => [
                'valueAccessors' => [
                    ResultInterface::class => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            $attempt = end($result['@metadata']['transferStats']['http']);
                            reset($result['@metadata']['transferStats']['http']);
                            if (isset($attempt['total_time'])) {
                                return floor($attempt['total_time'] * 1000);
                            }
                        }
                        return null;
                    },
                    AwsException::class => function (AwsException $exception) {
                        $attempt = $exception->getTransferInfo();
                        if (isset($attempt['total_time'])) {
                            return floor($attempt['total_time'] * 1000);
                        }
                        return null;
                    },
                ],
            ],
            'AwsException' => [
                'valueAccessors' => [
                    AwsException::class => function (AwsException $exception) {
                        return $exception->getAwsErrorCode();
                    },
                ],
                'maxLength' => 128,
            ],
            'AwsExceptionMessage' => [
                'valueAccessors' => [
                    AwsException::class => function (AwsException $exception) {
                        return $exception->getAwsErrorMessage();
                    },
                ],
                'maxLength' => 512,
            ],
            'DestinationIp' => [
                'valueAccessors' => [
                    ResultInterface::class => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            $attempt = end($result['@metadata']['transferStats']['http']);
                            reset($result['@metadata']['transferStats']['http']);
                            if (isset($attempt['primary_ip'])) {
                                return $attempt['primary_ip'];
                            }
                        }
                        return null;
                    },
                    AwsException::class => function (AwsException $exception) {
                        $attempt = $exception->getTransferInfo();
                        if (isset($attempt['primary_ip'])) {
                            return $attempt['primary_ip'];
                        }
                        return null;
                    },
                ],
            ],
            'DnsLatency' => [
                'valueAccessors' => [
                    ResultInterface::class => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            $attempt = end($result['@metadata']['transferStats']['http']);
                            reset($result['@metadata']['transferStats']['http']);
                            if (isset($attempt['namelookup_time'])) {
                                return floor($attempt['namelookup_time'] * 1000);
                            }
                        }
                        return null;
                    },
                    AwsException::class => function (AwsException $exception) {
                        $attempt = $exception->getTransferInfo();
                        if (isset($attempt['namelookup_time'])) {
                            return floor($attempt['namelookup_time'] * 1000);
                        }
                        return null;
                    },
                ],
            ],
            'HttpStatusCode' => [
                'valueAccessors' => [
                    ResultInterface::class => function (ResultInterface $result) {
                        return $result['@metadata']['statusCode'];
                    },
                    AwsException::class => function(AwsException $e) {
                        $response = $e->getResponse();
                        if ($response !== null) {
                            return $response->getStatusCode();
                        }
                        return null;
                    },
                ],
            ],
            'SdkException' => [
                'valueAccessors' => [
                    \Exception::class => function (\Exception $e) {
                        if (!($e instanceof AwsException)) {
                            return $e->getCode();
                        }
                        return null;
                    },
                ],
                'maxLength' => 128,
            ],
            'SdkExceptionMessage' => [
                'valueAccessors' => [
                    \Exception::class => function (\Exception $e) {
                        if (!($e instanceof AwsException)) {
                            return $e->getMessage();
                        }
                        return null;
                    },
                ],
                'maxLength' => 512,
            ],
            'XAmzId2' => [
                'valueAccessors' => [
                    ResultInterface::class => self::getResultHeaderAccessor('x-amz-id-2'),
                    AwsException::class => self::getExceptionHeaderAccessor('x-amz-id-2'),
                ],
            ],
            'XAmzRequestId' => [
                'valueAccessors' => [
                    ResultInterface::class => self::getResultHeaderAccessor('x-amz-request-id'),
                    AwsException::class => self::getExceptionHeaderAccessor('x-amz-request-id'),
                ],
            ],
            'XAmznRequestId' => [
                'valueAccessors' => [
                    ResultInterface::class => self::getResultHeaderAccessor('x-amzn-RequestId'),
                    AwsException::class => self::getExceptionHeaderAccessor('x-amzn-RequestId'),
                ],
            ],
        ];
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
