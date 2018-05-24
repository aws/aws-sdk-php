<?php

namespace Aws\ClientSideMonitoring;

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
                'AccessKey' => [
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    }
                ],
                'AttemptLatency' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    }
                ],
                'AwsException' => [
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'maxLength' => 128,
                ],
                'AwsExceptionMessage' => [
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'maxLength' => 512,
                ],
                'Fqdn' => [
                    'valueObject' => RequestInterface::class,
                    'valueAccessor' => function (RequestInterface $request) {
                        return $request->getUri()->getHost();
                    }
                ],
                'HttpStatusCode' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function (ResultInterface $result) {
                        return $result['@metadata']['statusCode'];
                    }
                ],
                'SdkException' => [
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'maxLength' => 128,
                ],
                'SdkExceptionMessage' => [
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'maxLength' => 512,
                ],
                'Type' => [
                    'valueAccessor' => function () {
                        return 'ApiCallAttempt';
                    },
                ],
                'UserAgent' => [
                    'valueObject' => RequestInterface::class,
                    'valueAccessor' => function (RequestInterface $request) {
                        return $request->getHeaderLine('User-Agent')
                            . ' ' . \GuzzleHttp\default_user_agent();
                    },
                    'maxLength' => 256,
                ],
                'XAmzId2' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => self::getResultHeaderAccessor('x-amz-id-2')
                ],
                'XAmzRequestId' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => self::getResultHeaderAccessor('x-amz-request-id')
                ],
                'XAmznRequestId' => [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => self::getResultHeaderAccessor('x-amzn-RequestId')
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
