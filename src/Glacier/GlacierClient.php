<?php
namespace Aws\Glacier;

use Aws\AwsClient;
use Aws\Subscriber\SourceFile;

/**
 * This client is used to interact with the **Amazon Glacier** service.
 */
class GlacierClient extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $api = $this->getApi();
        // Add the Glacier version header required for all operations.
        $this->getHttpClient()->setDefaultOption(
            'headers/x-amz-glacier-version',
            $api->getMetadata('apiVersion')
        );
        $em = $this->getEmitter();
        // Allow for specifying bodies with file paths and file handles.
        $em->attach(new SourceFile($api, 'body', 'sourceFile'));
        // Listen for upload operations and make sure the required hash headers
        // are added.
        $em->attach(new ApplyChecksumsSubscriber());
    }

    public function getCommand($name, array $args = [])
    {
        // Set the default accountId to "-" for all operations.
        if (!isset($args['accountId'])) {
            $args['accountId'] = '-';
        }

        return parent::getCommand($name, $args);
    }
}
