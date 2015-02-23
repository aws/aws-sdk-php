<?php
namespace Aws\Ec2;

use Aws\AwsClientInterface;
use Aws\Signature\SignatureV4;
use Aws\Endpoint\EndpointProvider;
use Aws\CommandInterface;
use GuzzleHttp\Uri;

/**
 * @internal Adds computed values to the CopySnapshot operation.
 */
class CopySnapshotMiddleware
{
    private $client;
    private $endpointProvider;
    private $nextHandler;

    public static function create(AwsClientInterface $client, callable $endpointProvider)
    {
        return function (callable $handler) use ($endpointProvider, $client) {
            $f = new CopySnapshotMiddleware();
            $f->endpointProvider = $endpointProvider;
            $f->client = $client;
            $f->nextHandler = $handler;
            return $f;
        };
    }

    public function __invoke(CommandInterface $command)
    {
        if ($command->getName() == 'CopySnapshot') {
            $cmd['PresignedUrl'] = $this->createPresignedUrl($this->client, $command);
            $cmd['DestinationRegion'] = $this->client->getRegion();
        }

        $f = $this->nextHandler;
        return $f($command);
    }

    private function createPresignedUrl(
        AwsClientInterface $client,
        CommandInterface $cmd
    ) {
        $newCmd = $client->getCommand('CopySnapshot', $cmd->toArray());
        $newCmd->getHandlerStack()->remove($this);
        // Serialize a request for the CopySnapshot operation.
        $request = $client->serialize($newCmd);

        // Create the new endpoint for the target endpoint.
        $endpoint = EndpointProvider::resolve($this->endpointProvider, [
            'region'  => $cmd['SourceRegion'],
            'service' => 'ec2'
        ])['endpoint'];

        // Set the request to hit the target endpoint.
        $uri = $request->getUri()->withHost((new Uri($endpoint))->getHost());
        $request = $request->withUri($uri);

        // Create a presigned URL for our generated request.
        $signer = new SignatureV4('ec2', $cmd['SourceRegion']);

        return $signer->createPresignedUrl(
            SignatureV4::convertPostToGet($request),
            $client->getCredentials(),
            '+1 hour'
        );
    }
}
