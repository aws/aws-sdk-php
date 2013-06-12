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

error_reporting(-1);

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

// Include the phar files if testing against the phars
if (get_cfg_var('aws_phar')) {
    require dirname(__DIR__) . '/build/' . get_cfg_var('aws_phar');
}

// Include the composer autoloader
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->add('Aws\\Test', __DIR__);

// Register services with the GuzzleTestCase
Guzzle\Tests\GuzzleTestCase::setMockBasePath(__DIR__ . '/mock');

// Allow command line overrides
if (get_cfg_var('CONFIG')) {
    $_SERVER['CONFIG'] = get_cfg_var('CONFIG');
}

// Set the service configuration file if it was not provided from the CLI
if (!isset($_SERVER['CONFIG'])) {
    $serviceConfig = $_SERVER['CONFIG'] = dirname(__DIR__) . '/test_services.json';
    $_SERVER['CONFIG'] = $serviceConfig;
    if (!file_exists($serviceConfig)) {
        die("test_services.json does not exist.\n"
            . "Please run phing test-init or copy test_services.json.dist to test_services.json\n\n");
    }
}

if (!is_readable($_SERVER['CONFIG'])) {
    die("Unable to read service configuration from '{$_SERVER['CONFIG']}'\n");
}

// If the global prefix is hostname, then use the crc32() of gethostname()
if (!isset($_SERVER['PREFIX']) || $_SERVER['PREFIX'] == 'hostname') {
    $_SERVER['PREFIX'] = crc32(gethostname());
}

// Instantiate the service builder
$aws = Aws\Common\Aws::factory($_SERVER['CONFIG']);

// Turn on wire logging if configured
$aws->getEventDispatcher()->addListener('service_builder.create_client', function (\Guzzle\Common\Event $event) {
    if (isset($_SERVER['WIRE_LOGGING']) && $_SERVER['WIRE_LOGGING']) {
        $event['client']->addSubscriber(Guzzle\Plugin\Log\LogPlugin::getDebugPlugin());
    }
});

// Configure the tests to ise the instantiated AWS service builder
Guzzle\Tests\GuzzleTestCase::setServiceBuilder($aws);

// Emit deprecation warnings
Guzzle\Common\Version::$emitWarnings = true;
