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

namespace Aws\DynamoDb;

use Aws\Common\Exception\Parser\JsonQueryExceptionParser;
use Guzzle\Http\Exception\HttpException;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Backoff\BackoffStrategyInterface;
use Guzzle\Plugin\Backoff\AbstractBackoffStrategy;

/**
 * Custom DynamoDB exponential backoff error checking logic
 */
class ThrottlingErrorChecker extends AbstractBackoffStrategy
{
    /**
     * @var JsonQueryExceptionParser Parser used to parse exception responses
     */
    protected $parser;

    /**
     * Create the internal parser
     */
    public function __construct(BackoffStrategyInterface $next = null)
    {
        $this->parser = new JsonQueryExceptionParser();
        if ($next) {
            $this->setNext($next);
        }
    }

    /**
     * {@inheridoc}
     */
    public function makesDecision()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function getDelay(
        $retries,
        RequestInterface $request,
        Response $response = null,
        HttpException $e = null
    ) {
        if ($response && $response->isClientError()) {
            $parts = $this->parser->parse($response);
            return $parts['code'] == 'ProvisionedThroughputExceededException'
                || $parts['code'] == 'ThrottlingException' ? true : null;
        }
    }
}
