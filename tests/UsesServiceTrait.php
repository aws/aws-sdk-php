<?php
namespace Aws\Test;

use Aws\AwsClientInterface;
use Aws\Exception\AwsException;
use Aws\MockHandler;
use Aws\Result;
use Aws\Sdk;
use Aws\Api\Service;

/**
 * @internal
 */
trait UsesServiceTrait
{
    private $_mock_handler;

    /**
     * Creates an instance of the AWS SDK for a test
     *
     * @param array $args
     *
     * @return Sdk
     */
    private function getTestSdk(array $args = [])
    {
        return new Sdk($args + [
            'region'      => 'us-east-1',
            'version'     => 'latest',
            'retries'     => 0
        ]);
    }

    /**
     * Creates an instance of a service client for a test
     *
     * @param string $service
     * @param array  $args
     *
     * @return AwsClientInterface
     */
    private function getTestClient($service, array $args = [])
    {
        // Disable network access. If the INTEGRATION envvar is set, then this
        // disabling is not done.
        if (!isset($_SERVER['INTEGRATION'])
            && !isset($args['handler'])
            && !isset($args['http_handler'])
        ) {
            $this->_mock_handler = $args['handler'] = new MockHandler([]);
        }

        return $this->getTestSdk($args)->createClient($service);
    }

    /**
     * Queues up mock Result objects for a client
     *
     * @param AwsClientInterface $client
     * @param Result[]|array[]   $results
     * @param callable $onFulfilled Callback to invoke when the return value is fulfilled.
     * @param callable $onRejected  Callback to invoke when the return value is rejected.
     *
     * @return AwsClientInterface
     */
    private function addMockResults(
        AwsClientInterface $client,
        array $results,
        callable $onFulfilled = null,
        callable $onRejected = null
    ) {
        foreach ($results as &$res) {
            if (is_array($res)) {
                $res = new Result($res);
            }
        }

        $this->_mock_handler = new MockHandler($results, $onFulfilled, $onRejected);
        $client->getHandlerList()->setHandler($this->_mock_handler);

        return $client;
    }

    private function mockQueueEmpty()
    {
        return 0 === count($this->_mock_handler);
    }

    /**
     * Creates a mock CommandException with a given error code
     *
     * @param string $code
     * @param string $type
     * @param string|null $message
     *
     * @return AwsException
     */
    private function createMockAwsException(
        $code = null,
        $type = null,
        $message = null
    ) {
        $code = $code ?: 'ERROR';
        $type = $type ?: 'Aws\Exception\AwsException';

        $client = $this->getMockBuilder('Aws\AwsClientInterface')
            ->setMethods(['getApi'])
            ->getMockForAbstractClass();

        $client->expects($this->any())
            ->method('getApi')
            ->will($this->returnValue(
                new Service(
                    [
                        'metadata' => [
                            'endpointPrefix' => 'foo',
                            'apiVersion' => 'version'
                        ]
                    ],
                    function () { return []; }
                )));

        return new $type(
            $message ?: 'Test error',
            $this->getMockBuilder('Aws\CommandInterface')->getMock(),
            [
                'message' => $message ?: 'Test error',
                'code'    => $code
            ]
        );
    }
}
