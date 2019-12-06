<?php
error_reporting(-1);
date_default_timezone_set('UTC');

// Include the composer autoloader
$loader = require __DIR__ . '/../vendor/autoload.php';

if (!class_exists('\PHPUnit\Framework\Constraint\RegularExpression')) {
    class_alias('\PHPUnit_Framework_Constraint_PCREMatch', '\PHPUnit\Framework\Constraint\RegularExpression');
}

if (!class_exists('\PHPUnit\Framework\Constraint\Callback')) {
    class_alias('\PHPUnit_Framework_Constraint_Callback','\PHPUnit\Framework\Constraint\Callback');
}

if (!class_exists('\PHPUnit\Framework\Error\Warning')) {
    class_alias('\PHPUnit_Framework_Error_Warning', '\PHPUnit\Framework\Error\Warning');
}

// Clear out any previously compiled JMESPath files.
JmesPath\Env::cleanCompileDir();

// Patch PHPUnit class for PHP 7.4+ and PHPUnit 5.x to avoid deprecation warning
// Necessary because older versions of PHPUnit are no longer supported
$version = PHPUnit_Runner_Version::id();
$versionData = explode('.', $version);
if (PHP_VERSION_ID >= 70400 && $versionData[0] == 5) {
    $vendorGeneratorPath = __DIR__ . '/../vendor/phpunit/phpunit-mock-objects/src/Framework/MockObject/Generator.php';
    $patchGeneratorPath = __DIR__ . '/bootstrap/PHPUnit_Framework_MockObject_Generator_7.4.php';
    file_put_contents($vendorGeneratorPath, file_get_contents($patchGeneratorPath));
}
