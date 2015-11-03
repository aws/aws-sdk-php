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

namespace Aws\Ssm;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with Amazon Simple Systems Management Service
 *
 * @method Model cancelCommand(array $args = array()) {@command Ssm CancelCommand}
 * @method Model createAssociation(array $args = array()) {@command Ssm CreateAssociation}
 * @method Model createAssociationBatch(array $args = array()) {@command Ssm CreateAssociationBatch}
 * @method Model createDocument(array $args = array()) {@command Ssm CreateDocument}
 * @method Model deleteAssociation(array $args = array()) {@command Ssm DeleteAssociation}
 * @method Model deleteDocument(array $args = array()) {@command Ssm DeleteDocument}
 * @method Model describeAssociation(array $args = array()) {@command Ssm DescribeAssociation}
 * @method Model describeDocument(array $args = array()) {@command Ssm DescribeDocument}
 * @method Model describeInstanceInformation(array $args = array()) {@command Ssm DescribeInstanceInformation}
 * @method Model getDocument(array $args = array()) {@command Ssm GetDocument}
 * @method Model listAssociations(array $args = array()) {@command Ssm ListAssociations}
 * @method Model listCommandInvocations(array $args = array()) {@command Ssm ListCommandInvocations}
 * @method Model listCommands(array $args = array()) {@command Ssm ListCommands}
 * @method Model listDocuments(array $args = array()) {@command Ssm ListDocuments}
 * @method Model sendCommand(array $args = array()) {@command Ssm SendCommand}
 * @method Model updateAssociationStatus(array $args = array()) {@command Ssm UpdateAssociationStatus}
 *
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/service-ssm.html User guide
 * @link http://docs.aws.amazon.com/aws-sdk-php/v2/api/class-Aws.Ssm.SsmClient.html API docs
 */
class SsmClient extends AbstractClient
{
    const LATEST_API_VERSION = '2014-11-06';

    /**
     * Factory method to create a new Amazon Simple Systems Management Service client using an array of configuration options.
     *
     * See http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     * @link http://docs.aws.amazon.com/aws-sdk-php/v2/guide/configuration.html#client-configuration-options
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::VERSION             => self::LATEST_API_VERSION,
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/ssm-%s.php'
            ))
            ->setExceptionParser(new JsonQueryExceptionParser())
            ->build();
    }
}
