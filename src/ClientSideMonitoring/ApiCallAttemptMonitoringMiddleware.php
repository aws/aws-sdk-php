<?php

namespace Aws\ClientSideMonitoring;

use Aws\CommandInterface;
use Aws\Credentials\CredentialsInterface;
use Aws\Exception\AwsException;
use Aws\ResponseContainerInterface;
use Aws\ResultInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

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
                    RequestInterface::class => function (
                        $command,
                        RequestInterface $request
                    ) {
                        return $request->getUri()->getHost();
                    },
                ],
            ],
            'UserAgent' => [
                'valueAccessors' => [
                    RequestInterface::class => function (
                        $command,
                        RequestInterface $request
                    ) {
                        return $request->getHeaderLine('User-Agent')
                            . ' ' . \GuzzleHttp\default_user_agent();
                    },
                ],
                'maxLength' => 256,
            ],
        ];
    }


    public static function getResponseDataConfiguration($klass)
    {

        $dataFormat = [
            ResultInterface::class => [
                'AttemptLatency' => [
                    'value' => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            $attempt = end($result['@metadata']['transferStats']['http']);
                            if (isset($attempt['total_time'])) {
                                return (int) floor($attempt['total_time'] * 1000);
                            }
                        }
                        return null;
                    }
                ],
                'DestinationIp' => [
                    'value' => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            $attempt = end($result['@metadata']['transferStats']['http']);
                            if (isset($attempt['primary_ip'])) {
                                return $attempt['primary_ip'];
                            }
                        }
                        return null;
                    },
                ],
                'DnsLatency' => [
                    'value' => function (ResultInterface $result) {
                        if (isset($result['@metadata']['transferStats']['http'])) {
                            $attempt = end($result['@metadata']['transferStats']['http']);
                            if (isset($attempt['namelookup_time'])) {
                                return (int) floor($attempt['namelookup_time'] * 1000);
                            }
                        }
                        return null;
                    },
                ],
                'HttpStatusCode' => [
                    'value' => function (ResultInterface $result) {
                        return $result['@metadata']['statusCode'];
                    },
                ],
                'XAmzId2' => [
                    'value' => self::getResultHeaderAccessor('x-amz-id-2'),
                ],
                'XAmzRequestId' => [
                    'value' => self::getResultHeaderAccessor('x-amz-request-id'),
                ],
                'XAmznRequestId' => [
                    'value' => self::getResultHeaderAccessor('x-amzn-RequestId'),
                ],
            ],
            AwsException::class => [
                'AttemptLatency' => [
                    'value' => function (AwsException $exception) {
                        $attempt = $exception->getTransferInfo();
                        if (isset($attempt['total_time'])) {
                            return (int) floor($attempt['total_time'] * 1000);
                        }
                        return null;
                    },
                ],
                'AwsException' => [
                    'value' => function (AwsException $exception) {
                        return $exception->getAwsErrorCode();
                    },
                    'maxLength' => 128,
                ],
                'AwsExceptionMessage' => [
                    'value' => function (AwsException $exception) {
                        return $exception->getAwsErrorMessage();
                    },
                    'maxLength' => 512,
                ],
                'DestinationIp' => [
                    'value' => function (AwsException $exception) {
                        $attempt = $exception->getTransferInfo();
                        if (isset($attempt['primary_ip'])) {
                            return $attempt['primary_ip'];
                        }
                        return null;
                    },
                ],
                'DnsLatency' => [
                    'value' => function (AwsException $exception) {
                        $attempt = $exception->getTransferInfo();
                        if (isset($attempt['namelookup_time'])) {
                            return (int) floor($attempt['namelookup_time'] * 1000);
                        }
                        return null;
                    },
                ],
                'HttpStatusCode' => [
                    'value' => function(AwsException $e) {
                        $response = $e->getResponse();
                        if ($response !== null) {
                            return $response->getStatusCode();
                        }
                        return null;
                    },
                ],
                'XAmzId2' => [
                    'value' => self::getAwsExceptionHeaderAccessor('x-amz-id-2'),
                ],
                'XAmzRequestId' => [
                    'value' => self::getAwsExceptionHeaderAccessor('x-amz-request-id'),
                ],
                'XAmznRequestId' => [
                    'value' => self::getAwsExceptionHeaderAccessor('x-amzn-RequestId'),
                ],
            ],
            \Exception::class => [
                'HttpStatusCode' => [
                    'value' => function (\Exception $exception) {
                        if ($exception instanceof ResponseContainerInterface) {
                            $response = $exception->getResponse();
                            if ($response instanceof ResponseInterface) {
                                return $response->getStatusCode();
                            }
                        }
                        return null;
                    },
                ],
                'SdkException' => [
                    'value' => function (\Exception $e) {
                        if (!($e instanceof AwsException)) {
                            return get_class($e);
                        }
                        return null;
                    },
                    'maxLength' => 128,
                ],
                'SdkExceptionMessage' => [
                    'value' => function (\Exception $e) {
                        if (!($e instanceof AwsException)) {
                            return $e->getMessage();
                        }
                        return null;
                    },
                    'maxLength' => 512,
                ],
                'XAmzId2' => [
                    'value' => self::getExceptionHeaderAccessor('x-amz-id-2'),
                ],
                'XAmzRequestId' => [
                    'value' => self::getExceptionHeaderAccessor('x-amz-request-id'),
                ],
                'XAmznRequestId' => [
                    'value' => self::getExceptionHeaderAccessor('x-amzn-RequestId'),
                ],
            ],
        ];


        if ($klass instanceof ResultInterface) {
            return $dataFormat[ResultInterface::class];
        }
        if ($klass instanceof AwsException) {
            return $dataFormat[AwsException::class];
        }
        if ($klass instanceof \Exception) {
            return $dataFormat[\Exception::class];
        }

        throw new \Exception('illegal class!');
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
        if ($sessionToken !== null) {
            $event['SessionToken'] = $sessionToken;
        }
        if (empty($event['AttemptLatency'])) {
            $event['AttemptLatency'] = (int) (floor(microtime(true) * 1000) - $event['Timestamp']);
        }
        return $event;
    }
}
