<?php
namespace Aws\Test;

use Aws\Common\AwsClientInterface;
use Aws\Common\Result;
use Aws\Sdk;
use Aws\Common\Api\Service;
use GuzzleHttp\Ring\Client\MockHandler;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PreparedEvent;
use GuzzleHttp\Command\Exception\CommandException;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Subscriber\Mock;

/**
 * @internal
 */
trait UsesServiceTrait
{
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
            'credentials' => false,
            'retries'     => false
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
            && !isset($args['client'])
            && !isset($args['ringphp_handler'])
        ) {
            $args['ringphp_handler'] = new MockHandler(function () {
                return ['error' => new \RuntimeException('No network access')];
            });
        }

        return $this->getTestSdk()->getClient($service, $args);
    }

    /**
     * Queues up mock Result objects for a client
     *
     * @param AwsClientInterface $client
     * @param Result[]|array[]   $results
     *
     * @return AwsClientInterface
     */
    private function addMockResults(AwsClientInterface $client, array $results)
    {
        $client->getEmitter()->on('prepared',
            function (PreparedEvent $event) use (&$results) {
                $result = array_shift($results);
                if (is_array($result)) {
                    $event->intercept(new Result($result));
                    $event->getTransaction()->response = new Response(200);
                } elseif ($result instanceof Result) {
                    $event->intercept($result);
                    $event->getTransaction()->response = new Response(200);
                } elseif ($result instanceof CommandException) {
                    throw $result;
                } else {
                    throw new \Exception('There are no more mock results left. '
                        . 'This client executed more commands than expected.');
                }
            },
            'last'
        );

        return $client;
    }

    /**
     * Queues up mock HTTP Response objects for a client
     *
     * @param AwsClientInterface $client
     * @param Response[]         $responses
     * @param bool               $readBodies
     *
     * @return AwsClientInterface
     * @throws \InvalidArgumentException
     */
    private function addMockResponses(
        $client,
        array $responses,
        $readBodies = true
    ) {
        $mock = new Mock($responses, $readBodies);
        $client->getHttpClient()->getEmitter()->attach($mock);

        return $client;
    }

    /**
     * Creates a mock CommandException with a given error code
     *
     * @param string $code
     * @param string $type
     * @param string|null $message
     *
     * @return CommandException
     */
    private function createMockAwsException(
        $code = null,
        $type = null,
        $message = null
    ) {
        $code = $code ?: 'ERROR';
        $type = $type ?: 'Aws\Common\Exception\AwsException';

        $client = $this->getMockBuilder('Aws\Common\AwsClientInterface')
            ->setMethods(['getApi'])
            ->getMockForAbstractClass();

        $client->expects($this->any())
            ->method('getApi')
            ->will($this->returnValue(
                new Service(
                    function () {
                        return ['metadata' => ['endpointPrefix' => 'foo']];
                    },
                    'service',
                    'version'
                )));

        $trans = new CommandTransaction(
            $client,
            $this->getMock('GuzzleHttp\Command\CommandInterface'),
            [
                'aws_error' => [
                    'message' => $message ?: 'Test error',
                    'code'    => $code
                ]
            ]
        );

        return new $type($message ?: 'Test error', $trans);
    }
}
