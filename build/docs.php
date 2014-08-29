<?php

return new Sami\Sami(__DIR__ . '/artifacts/staging', [
    'title'                => 'AWS SDK for PHP',
    'build_dir'            => __DIR__ . '/artifacts/docs-build',
    'cache_dir'            => __DIR__ . '/artifacts/docs-cache',
    'default_opened_level' => 1,
]);
