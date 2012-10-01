<?php
use Vanity\Console\Utilities;

if (!file_exists(dirname(dirname(__DIR__)) . '/vendor/composer/autoload_namespaces.php')) {
    $formatters = Utilities::formatters();
    echo $formatters->warning->apply(' You must run Composer\'s `install` task before generating documentation. ') . PHP_EOL . PHP_EOL;
    exit(1);
}
