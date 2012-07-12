<?php
/**
 * Copyright 2010-2012 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Aws\DynamoDb;

use Aws\Common\Exception\Parser\DefaultJsonExceptionParser;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;

/**
 * Custom DynamoDB exponential backoff error checking logic
 */
class ThrottlingErrorChecker
{
    /**
     * @var DefaultJsonExceptionParser Parser used to parse exception responses
     */
    protected $parser;

    /**
     * Create the internal parser
     */
    public function __construct()
    {
        $this->parser = new DefaultJsonExceptionParser();
    }

    /**
     * @param RequestInterface $request  Request sent
     * @param Response|null    $response Response received
     *
     * @return bool|null
     */
    public function __invoke(RequestInterface $request, Response $response = null)
    {
        static $codes = array(
            'ProvisionedThroughputExceededException' => 1,
            'ThrottlingException'                    => 1,
        );

        if ($response && $response->isClientError()) {
            $parts = $this->parser->parse($response);
            return $parts['type'] == 'client' && isset($codes[$parts['code']]) ?: null;
        }
    }
}
