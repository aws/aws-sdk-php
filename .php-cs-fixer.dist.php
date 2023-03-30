<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->exclude([
        'data'
    ])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PER' => true,

        // By default, visibility is required by PSR-12 for property, method and const.
        // PHP >= 7.1 is required for const.
        // Since we support PHP >= 5.5, the required visibility for const's is disabled.
        // See https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/rules/class_notation/visibility_required.rst
        'visibility_required' => [
            'elements' => [
                'property',
                'method',
            ],
        ]
    ])
    ->setFinder($finder)
;
