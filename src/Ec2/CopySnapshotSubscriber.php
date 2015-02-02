<?php
namespace Aws\Ec2;

use Aws\AwsClientInterface;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Command\CommandInterface;
use GuzzleHttp\Command\CommandTransaction;
use GuzzleHttp\Command\Event\InitEvent;
use GuzzleHttp\Event\RequestEvents;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Url;

/**
 * @internal Adds computed values to the CopySnapshot operation.
 */
class CopySnapshotSubscriber implements SubscriberInterface
{
    private $endpointProvider;
    private $requestSerializer;

    public function __construct(
        callable $endpointProvider,
        callable $requestSerializer
    ) {
        $this->endpointProvider = $endpointProvider;
        $this->requestSerializer = $requestSerializer;
    }

    public function getEvents()
    {
        return ['init' => ['onInit', RequestEvents::LATE]];
    }

    public function onInit(InitEvent $event)
    {
        $cmd = $event->getCommand();
        if ($cmd->getName() == 'CopySnapshot') {
            /** @var AwsClientInterface $client */
            $client = $event->getClient();
            $cmd['PresignedUrl'] = $this->createPresignedUrl($client, $cmd);
            $cmd['DestinationRegion'] = $client->getRegion();
        }
    }

    private function createPresignedUrl(
        AwsClientInterface $client,
        CommandInterface $cmd
    ) {
        $newCmd = $client->getCommand('CopySnapshot', $cmd->toArray());
        // Serialize a request for the CopySnapshot operation.
        $trans = new CommandTransaction($client, $newCmd);
        $request = call_user_func($this->requestSerializer, $trans);
        // Create the new endpoint for the target endpoint.
        $endpoint = call_user_func($this->endpointProvider, [
            'region'  => $cmd['SourceRegion'],
            'service' => 'ec2'
        ])['endpoint'];
        // Set the request to hit the target endpoint.
        $request->setHost(Url::fromString($endpoint)->getHost());
        // Create a presigned URL for our generated request.
        $signer = new SignatureV4('ec2', $cmd['SourceRegion']);
        return $signer->createPresignedUrl(
            SignatureV4::convertPostToGet($request),
            $client->getCredentials(),
            '+1 hour'
        );
    }
}
