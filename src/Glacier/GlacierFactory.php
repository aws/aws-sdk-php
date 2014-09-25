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

        $em = $client->getEmitter();
        // Allow for specifying bodies with file paths and file handles.
        $em->attach(new SourceFile($client->getApi(), 'body', 'sourceFile'));
        // Listen for upload operations and make sure the required hash headers
        // are added.
        $em->attach(new ApplyChecksums);

        return $client;
    }
}
