<?php
namespace Aws\Glacier;

use Aws\Common\ClientFactory;
use Aws\Common\Subscriber\SourceFile;

/**
 * @internal
 */
class GlacierFactory extends ClientFactory
{
    protected function createClient(array $args)
    {
        if (!isset($args['defaults'])) {
            $args['defaults'] = [];
        }

        // Set the default accountId to "-" for all operations.
        $args['defaults']['accountId'] = '-';

        $client = parent::createClient($args);

        // Add the Glacier version header required for all operations.
        $client->getHttpClient()->setDefaultOption(
            'headers/x-amz-glacier-version',
            $client->getApi()->getMetadata('apiVersion')
        );

        $emitter = $client->getEmitter();
        // Allow for specifying bodies with file paths and file handles.
        $emitter->attach(new SourceFile('body', 'sourceFile'));
        // Listen for upload operations and make sure the required hash headers
        // are added.
        $emitter->attach(new ApplyHashes);

        return $client;
    }
}
