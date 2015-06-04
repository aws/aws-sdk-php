<?php

error_reporting(E_ALL & ~E_USER_DEPRECATED);
date_default_timezone_set('UTC');

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
    $serviceConfig = dirname(__DIR__) . '/test_services.json';
    if (file_exists($serviceConfig)) {
        $_SERVER['CONFIG'] = $serviceConfig;
    }
}

// If the global prefix is hostname, then use the crc32() of gethostname()
if (!isset($_SERVER['PREFIX']) || $_SERVER['PREFIX'] == 'hostname') {
    $_SERVER['PREFIX'] = crc32(gethostname());
}

// Instantiate the service builder
$aws = Aws\Common\Aws::factory(isset($_SERVER['CONFIG']) ? $_SERVER['CONFIG'] : __DIR__ . '/../test_services.dist.json');

// Turn on wire logging if configured
$aws->getEventDispatcher()->addListener('service_builder.create_client', function (\Guzzle\Common\Event $event) {
    if (isset($_SERVER['WIRE_LOGGING']) && $_SERVER['WIRE_LOGGING']) {
        $event['client']->addSubscriber(Guzzle\Plugin\Log\LogPlugin::getDebugPlugin());
    }
});

// Configure the tests to use the instantiated AWS service builder
Guzzle\Tests\GuzzleTestCase::setServiceBuilder($aws);

// Emit deprecation warnings
Guzzle\Common\Version::$emitWarnings = true;

function can_mock_internal_classes()
{
    switch (substr(PHP_VERSION, 0, 3)) {
        case '5.3.':
            return true;
        case '5.4.':
            return version_compare(PHP_VERSION, '5.4.30', '<');
        case '5.5.':
            return version_compare(PHP_VERSION, '5.5.14', '<');
        default:
            return false;
    }
}
