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
        if ($klass instanceof ResultInterface) {
            return self::getResultResponseData($klass);
        }
        if ($klass instanceof AwsException) {
            return self::getAwsExceptionResponseData($klass);
        }
        if ($klass instanceof \Exception) {
            return self::getExceptionResponseData($klass);
        }

        throw new \InvalidArgumentException('Parameter must be an instance of ResultInterface, AwsException or Exception.');
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

    private static function getResultAttemptLatency(ResultInterface $result)
    {
        if (isset($result['@metadata']['transferStats']['http'])) {
            $attempt = end($result['@metadata']['transferStats']['http']);
            if (isset($attempt['total_time'])) {
                return (int) floor($attempt['total_time'] * 1000);
            }
        }
        return null;
    }

    private static function getResultDestinationIp(ResultInterface $result)
    {
        if (isset($result['@metadata']['transferStats']['http'])) {
            $attempt = end($result['@metadata']['transferStats']['http']);
            if (isset($attempt['primary_ip'])) {
                return $attempt['primary_ip'];
            }
        }
        return null;
    }

    private static function getResultDnsLatency(ResultInterface $result)
    {
        if (isset($result['@metadata']['transferStats']['http'])) {
            $attempt = end($result['@metadata']['transferStats']['http']);
            if (isset($attempt['namelookup_time'])) {
                return (int) floor($attempt['namelookup_time'] * 1000);
            }
        }
        return null;
    }

    private static function getResultResponseData($klass)
    {
        return [
            'AttemptLatency' => [
                'value' => self::getResultAttemptLatency($klass),
            ],
            'DestinationIp' => [
                'value' => self::getResultDestinationIp($klass),
            ],
            'DnsLatency' => [
                'value' => self::getResultDnsLatency($klass),
            ],
            'HttpStatusCode' => [
                'value' => self::getResultHttpStatusCode($klass),
            ],
            'XAmzId2' => [
                'value' => self::getResultHeader($klass, 'x-amz-id-2'),
            ],
            'XAmzRequestId' => [
                'value' => self::getResultHeader($klass, 'x-amz-request-id'),
            ],
            'XAmznRequestId' => [
                'value' => self::getResultHeader($klass, 'x-amzn-RequestId'),
            ],
        ];
    }

    private static function getAwsExceptionResponseData($klass)
    {
        return [
            'AttemptLatency' => [
                'value' => self::getAwsExceptionAttemptLatency($klass),
            ],
            'AwsException' => [
                'value' => self::getAwsExceptionErrorCode($klass),
                'maxLength' => 128,
            ],
            'AwsExceptionMessage' => [
                'value' => self::getAwsExceptionMessage($klass),
                'maxLength' => 512,
            ],
            'DestinationIp' => [
                'value' => self::getAwsExceptionDestinationIp($klass),
            ],
            'DnsLatency' => [
                'value' => self::getAwsExceptionDnsLatency($klass),
            ],
            'HttpStatusCode' => [
                'value' => self::getAwsExceptionHttpStatusCode($klass),
            ],
            'XAmzId2' => [
                'value' => self::getAwsExceptionHeader($klass, 'x-amz-id-2'),
            ],
            'XAmzRequestId' => [
                'value' => self::getAwsExceptionHeader($klass, 'x-amz-request-id'),
            ],
            'XAmznRequestId' => [
                'value' => self::getAwsExceptionHeader($klass, 'x-amzn-RequestId'),
            ],
        ];
    }

    private static function getExceptionResponseData($klass)
    {
        return [
            'HttpStatusCode' => [
                'value' => self::getExceptionHttpStatusCode($klass),
            ],
            'SdkException' => [
                'value' => self::getExceptionCode($klass),
                'maxLength' => 128,
            ],
            'SdkExceptionMessage' => [
                'value' => self::getExceptionMessage($klass),
                'maxLength' => 512,
            ],
            'XAmzId2' => [
                'value' => self::getExceptionHeader($klass, 'x-amz-id-2'),
            ],
            'XAmzRequestId' => [
                'value' => self::getExceptionHeader($klass, 'x-amz-request-id'),
            ],
            'XAmznRequestId' => [
                'value' => self::getExceptionHeader($klass, 'x-amzn-RequestId'),
            ],
        ];
    }

    private static function getResultHttpStatusCode(ResultInterface $result)
    {
        return $result['@metadata']['statusCode'];
    }

    private static function getAwsExceptionAttemptLatency(AwsException $e) {
        $attempt = $e->getTransferInfo();
        if (isset($attempt['total_time'])) {
            return (int) floor($attempt['total_time'] * 1000);
        }
        return null;
    }

    private static function getAwsExceptionErrorCode(AwsException $e) {
        return $e->getAwsErrorCode();
    }

    private static function getAwsExceptionMessage(AwsException $e) {
        return $e->getAwsErrorMessage();
    }

    private static function getAwsExceptionDestinationIp(AwsException $e) {
        $attempt = $e->getTransferInfo();
        if (isset($attempt['primary_ip'])) {
            return $attempt['primary_ip'];
        }
        return null;
    }

    private static function getAwsExceptionDnsLatency(AwsException $e) {
        $attempt = $e->getTransferInfo();
        if (isset($attempt['namelookup_time'])) {
            return (int) floor($attempt['namelookup_time'] * 1000);
        }
        return null;
    }

    private static function getAwsExceptionHttpStatusCode(AwsException $e) {
        $response = $e->getResponse();
        if ($response !== null) {
            return $response->getStatusCode();
        }
        return null;
    }

    private static function getExceptionHttpStatusCode(\Exception $e) {
        if ($e instanceof ResponseContainerInterface) {
            $response = $e->getResponse();
            if ($response instanceof ResponseInterface) {
                return $response->getStatusCode();
            }
        }
        return null;
    }

    private static function getExceptionCode(\Exception $e) {
        if (!($e instanceof AwsException)) {
            return get_class($e);
        }
        return null;
    }

    private static function getExceptionMessage(\Exception $e) {
        if (!($e instanceof AwsException)) {
            return $e->getMessage();
        }
        return null;
    }
}
