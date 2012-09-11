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

namespace Aws\Common\Exception\Parser;

use Guzzle\Http\Message\Response;

/**
 * Parses JSON encoded exception responses
 */
abstract class AbstractJsonExceptionParser implements ExceptionParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse(Response $response)
    {
        $data = array(
            'code'       => null,
            'message'    => null,
            'type'       => $response->isClientError() ? 'client' : 'server',
            'request_id' => (string) $response->getHeader('x-amzn-RequestId'),
            'parsed'     => null
        );

        if (null !== $json = json_decode($response->getBody(true), true)) {
            $data['parsed'] = $json;
            $json = array_change_key_case($json);
            $data = $this->doParse($data, $json);
        }

        return $data;
    }

    /**
     * Pull relevant exception data out of the parsed json
     *
     * @param array $data The exception data
     * @param array $json The JSON data
     *
     * @return array
     */
    abstract protected function doParse(array $data, array $json);
}
