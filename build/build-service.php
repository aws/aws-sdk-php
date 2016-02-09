<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/ServiceBuilder.php';

$options = getopt('', [
    'namespace:',
    'model:',
    'clientPath:',
    'exceptionPath:'
]);

if (empty($options['namespace']) || empty($options['model'])) {
    throw new LogicException(
        "You must specify a namespace (--namespace=) and path to an api model "
        . "(--model=) to build a service"
    );
}

$options['model'] = \Aws\load_compiled_json($options['model']);

$options += [
    'clientPath' => dirname(__DIR__)
        . "/src/{$options['namespace']}/{$options['namespace']}Client.php",
    'exceptionPath' => dirname(__DIR__)
        . "/src/{$options['namespace']}/Exception/{$options['namespace']}Exception.php",
];

(new ServiceBuilder(
    $options['namespace'],
    $options['model'],
    $options['clientPath'],
    $options['exceptionPath']
))
    ->buildClient()
    ->buildException();
