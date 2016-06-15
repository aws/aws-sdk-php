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

namespace Aws\Common\Enum;

use Aws\Common\Enum;

/**
 * Contains enumerable default factory options that can be passed to a client's factory method
 */
class ClientOptions extends Enum
{
    /**
     * AWS Access Key ID
     *
     * @deprecated Use "credentials" instead.
     */
    const KEY = 'key';

    /**
     * AWS secret access key
     *
     * @deprecated Use "credentials" instead.
     */
    const SECRET = 'secret';

    /**
     * Custom AWS security token to use with request authentication.
     *
     * @deprecated Use "credentials" instead.
     */
    const TOKEN = 'token';

    /**
     * Provide an array of "key", "secret", and "token" or an instance of
     * `Aws\Common\Credentials\CredentialsInterface`.
     */
    const CREDENTIALS = 'credentials';

    /**
     * @var string Name of a credential profile to read from your ~/.aws/credentials file
     */
    const PROFILE = 'profile';

    /**
     * @var string UNIX timestamp for when the custom credentials expire
     */
    const TOKEN_TTD = 'token.ttd';

    /**
     * @var string Used to cache credentials when using providers that require HTTP requests. Set the trueto use the
     *             default APC cache or provide a `Guzzle\Cache\CacheAdapterInterface` object.
     */
    const CREDENTIALS_CACHE = 'credentials.cache';

    /**
     * @var string Optional custom cache key to use with the credentials
     */
    const CREDENTIALS_CACHE_KEY = 'credentials.cache.key';

    /**
     * @var string Pass this option to specify a custom `Guzzle\Http\ClientInterface` to use if your credentials require
     *             a HTTP request (e.g. RefreshableInstanceProfileCredentials)
     */
    const CREDENTIALS_CLIENT = 'credentials.client';

    /**
     * @var string Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     */
    const REGION = 'region';

    /**
     * @var string URI Scheme of the base URL (e.g. 'https', 'http').
     */
    const SCHEME = 'scheme';

    /**
     * @var string Specify the name of the service
     */
    const SERVICE = 'service';

    /**
     * Instead of using a `region` and `scheme`, you can specify a custom base
     * URL for the client.
     *
     * @deprecated Use the "endpoint" option instead.
     */
    const BASE_URL = 'base_url';

    /**
     * @var string You can optionally provide a custom signature implementation used to sign requests
     */
    const SIGNATURE = 'signature';

    /**
     * @var string Set to explicitly override the service name used in signatures
     */
    const SIGNATURE_SERVICE = 'signature.service';

    /**
     * @var string Set to explicitly override the region name used in signatures
     */
    const SIGNATURE_REGION = 'signature.region';

    /**
     * @var string Option key holding an exponential backoff plugin
     */
    const BACKOFF = 'client.backoff';

    /**
     * @var string Option key holding the exponential backoff retries
     */
    const BACKOFF_RETRIES = 'client.backoff.retries';

    /**
     * @var string `Guzzle\Log\LogAdapterInterface` object used to log backoff retries. Use 'debug' to emit PHP
     *             warnings when a retry is issued.
     */
    const BACKOFF_LOGGER = 'client.backoff.logger';

    /**
     * @var string Optional template to use for exponential backoff log messages. See
     *             `Guzzle\Plugin\Backoff\BackoffLogger` for formatting information.
     */
    const BACKOFF_LOGGER_TEMPLATE = 'client.backoff.logger.template';

    /**
     * Set to true to use the bundled CA cert or pass the full path to an SSL
     * certificate bundle. This option should be modified when you encounter
     * curl error code 60. Set to "system" to use the cacert bundle on your
     * system.
     */
    const SSL_CERT = 'ssl.certificate_authority';

    /**
     * @var string Service description to use with the client
     */
    const SERVICE_DESCRIPTION = 'service.description';

    /**
     * @var string Whether or not modeled responses have transformations applied to them
     */
    const MODEL_PROCESSING = 'command.model_processing';

    /**
     * @var bool Set to false to disable validation
     */
    const VALIDATION = 'validation';

    /**
     * @var string API version used by the client
     */
    const VERSION = 'version';
}
