<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Service;

use Aws\Service\Glacier\GlacierUploadListener;
use Aws\Subscriber\UploadBody;

/**
 * @internal
 */
class GlacierFactory extends ClientFactory
{
    protected function createClient(array $args)
    {
        $client = parent::createClient($args);

        // Set the default accountId to "~" for all operations.
        $client->setConfig('defaults/accountId', '~');

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
