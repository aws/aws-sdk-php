<?php
namespace Aws\Test;

use Aws\AwsClientInterface;
use Aws\AwsException;
use Aws\Result;
use Aws\Sdk;
use Aws\Common\Api\Service;
use GuzzleHttp\Adapter\MockAdapter;
use GuzzleHttp\Client;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\PrepareEvent;
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
        if (!isset($args['client']) && !isset($_SERVER['INTEGRATION'])) {
            $args['client'] = new Client([
                'adapter' => new MockAdapter(function () {
                    throw new \RuntimeException('No network access');
                })
            ]);
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
        $client->getEmitter()->on('prepare',
            function (PrepareEvent $event) use (&$results) {
                $result = array_shift($results);
                if (is_array($result)) {
                    $event->setResult(new Result($result));
                } elseif ($result instanceof Result) {
                    $event->setResult($result);
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
     *
     * @return CommandException
     */
    private function createMockAwsException($code)
    {
        $client = $this->getMockBuilder('Aws\AwsClientInterface')
            ->setMethods(['getApi'])
            ->getMockForAbstractClass();

        $client->expects($this->any())
            ->method('getApi')
            ->will($this->returnValue($this->createServiceApi(['metadata' => [
                'endpointPrefix' => 'foo'
            ]])));

        $trans = new CommandTransaction(
            $client,
            $this->getMock('Aws\AwsCommandInterface'),
            ['aws_error' => ['message' => 'Test error', 'code' => $code]]
        );

        return new AwsException('Test error', $trans);
    }

    private function createServiceApi(array $serviceData = [], &$api = null)
    {
        $api = $this->getMock('Aws\Common\Api\ApiProviderInterface');
        $api->expects($this->any())
            ->method('getService')
            ->willReturn($serviceData);

        return new Service($api, 'service', 'region');
    }
}
