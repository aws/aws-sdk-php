<?php

declare(strict_types=1);

namespace Aws\Tests\Utils;

/**
 * Run a callback with a controlled AWS environment.
 *
 * The callback sees an empty shared credentials file, a shared config file
 * with the given contents, and no region, profile or S3 settings in the
 * environment unless the caller sets them. The previous environment is
 * restored and the temporary files are removed afterwards.
 */
final class TemporaryAwsEnvironment
{
    private const NAMES = [
        'AWS_PROFILE',
        'AWS_SHARED_CREDENTIALS_FILE',
        'AWS_CONFIG_FILE',
        'AWS_REGION',
        'AWS_DEFAULT_REGION',
        'AWS_S3_USE_ARN_REGION',
        'HOME',
        'HOMEDRIVE',
        'HOMEPATH'
    ];

    /**
     * @template T
     *
     * @param callable(): T $callback
     * @param array<string, string> $env Environment variables to set.
     * @param string $configContents Contents of the shared config file.
     *
     * @return T
     */
    public static function run(
        callable $callback,
        array $env = [],
        string $configContents = ''
    ): mixed {
        $directory = \sys_get_temp_dir() . '/aws-env-' . \uniqid('', true);
        if (!\mkdir($directory) && !\is_dir($directory)) {
            throw new \RuntimeException('Failed to create temp dir.');
        }
        $credentials = $directory . '/credentials';
        $config = $directory . '/config';
        \file_put_contents($credentials, '');
        \file_put_contents($config, $configContents);

        $values = \array_fill_keys(self::NAMES, null);
        $values['AWS_SHARED_CREDENTIALS_FILE'] = $credentials;
        $values['AWS_CONFIG_FILE'] = $config;
        foreach ($env as $name => $value) {
            $values[$name] = $value;
        }

        $previous = [];
        foreach ($values as $name => $value) {
            $previous[$name] = \getenv($name);
            self::set($name, $value);
        }

        try {
            return $callback();
        } finally {
            foreach ($previous as $name => $value) {
                self::set($name, $value === false ? null : $value);
            }
            \unlink($credentials);
            \unlink($config);
            \rmdir($directory);
        }
    }

    private static function set(string $name, ?string $value): void
    {
        if ($value === null) {
            \putenv($name);
            unset($_ENV[$name]);

            return;
        }

        \putenv($name . '=' . $value);
        $_ENV[$name] = $value;
    }
}
