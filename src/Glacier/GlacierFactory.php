<?php
namespace Aws\Glacier;

use Aws\Common\ClientFactory;
use Aws\Common\Subscriber\UploadBody;

/**
 * @internal
 */
class GlacierFactory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        // Set the default accountId to "-" for all operations.
        $client->setConfig('defaults/accountId', '-');

        // Add the Glacier version header required for all operations.
        $client->getHttpClient()->setDefaultOption(
            'headers/x-amz-glacier-version',
            $client->getApi()->getMetadata('apiVersion')
        );

        $emitter = $client->getEmitter();
        // Allow for specifying bodies with file paths and file handles.
        $emitter->attach(new UploadBody(
            ['UploadArchive', 'UploadMultipartPart'],
            'body',
            'sourceFile'
        ));
        // Listen for upload operations and make sure the required hash headers
        // are added.
        $emitter->attach(new GlacierUploadListener());

        return $client;
    }
}
