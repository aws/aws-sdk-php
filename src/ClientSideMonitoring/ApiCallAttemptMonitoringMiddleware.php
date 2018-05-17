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
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'AccessKey',
                ],
                [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'AttemptLatency',
                ],
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'AwsException',
                    'maxLength' => 128,
                ],
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'AwsExceptionMessage',
                    'maxLength' => 512,
                ],
                [
                    'valueObject' => RequestInterface::class,
                    'valueAccessor' => function (RequestInterface $request) {
                        return $request->getUri()->getHost();
                    },
                    'eventKey' => 'Fqdn',
                ],
                [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => function (ResultInterface $result) {
                        return $result['@metadata']['statusCode'];
                    },
                    'eventKey' => 'HttpStatusCode',
                ],
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'SdkException',
                    'maxLength' => 128,
                ],
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 1; // TODO get real value
                    },
                    'eventKey' => 'SdkExceptionMessage',
                    'maxLength' => 512,
                ],
                [
                    'valueObject' => null,
                    'valueAccessor' => function () {
                        return 'ApiCallAttempt';
                    },
                    'eventKey' => 'Type',
                ],
                [
                    'valueObject' => RequestInterface::class,
                    'valueAccessor' => function (RequestInterface $request) {
                        return $request->getHeaderLine('User-Agent')
                            . ' ' . \GuzzleHttp\default_user_agent();
                    },
                    'eventKey' => 'UserAgent',
                    'maxLength' => 256,
                ],
                [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => self::getResultHeaderAccessor('x-amz-id-2'),
                    'eventKey' => 'XAmzId2',
                ],
                [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => self::getResultHeaderAccessor('x-amz-request-id'),
                    'eventKey' => 'XAmzRequestId',
                ],
                [
                    'valueObject' => ResultInterface::class,
                    'valueAccessor' => self::getResultHeaderAccessor('x-amzn-RequestId'),
                    'eventKey' => 'XAmznRequestId',
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
