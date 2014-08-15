<?php
/**
 * Packages the zip and phar file using a staging directory.
 */

function debug_log($message)
{
    echo $message . "\n";
}

function deep_copy($from, $to)
{
    $dir = dirname($to);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    copy($from, $to);
}

// Files to be added to the package
function create_staging_dir($baseDir)
{
    debug_log("Creating staging directory at: $baseDir");
    debug_log("  Cleaning $baseDir");
    exec("rm -rf $baseDir");
    mkdir($baseDir);
    chdir(__DIR__ . '/..');

    debug_log("  Copying meta-files to $baseDir");
    foreach (['README.md', 'LICENSE.md', 'NOTICE.md'] as $file) {
        deep_copy($file, $baseDir . '/Aws/' . $file);
    }

    // Copy the autoloader
    debug_log('  Copying aws-autoloader');
    copy(__DIR__ . '/aws-autoloader.php', $baseDir . '/aws-autoloader.php');

    $directories = [
        'src',
        'vendor/guzzle/guzzle/src',
        'vendor/symfony/event-dispatcher',
        'vendor/symfony/class-loader',
        'vendor/doctrine/cache/lib',
        'vendor/psr/log',
        'vendor/monolog/monolog/src'
    ];

    debug_log('  Copying files');
    foreach ($directories as $dir) {
        recursive_copy($dir, $baseDir);
    }

    // Delete the duplicate LICENSE
    unlink($baseDir . '/LICENSE');

    debug_log("  Created staging directory at: $baseDir");
}


/**
 * Recursively copy a dependency
 */
function recursive_copy($fromDir, $baseDir)
{
    // File extensions added to the output
    $exts = array_fill_keys(['php', 'pem'], true);

    $fromDir = realpath($fromDir);
    $iter = new RecursiveDirectoryIterator($fromDir);
    $iter = new RecursiveIteratorIterator($iter);

    debug_log("    > From $fromDir");

    $total = 0;
    foreach ($iter as $file) {
        if (isset($exts[$file->getExtension()])
            || $file->getBaseName() == 'LICENSE'
        ) {
            $toPath = str_replace($fromDir, '', (string) $file);
            $toPath = $baseDir . '/' . $toPath;
            deep_copy((string) $file, $toPath);
            $total++;
        }
    }

    debug_log("      Copied $total files");
}

function create_phar($baseDir, $dest)
{
    debug_log('Creating full phar file');
    $phar = new Phar($dest, 0, 'aws.phar');
    $phar->buildFromDirectory($baseDir);
    $phar->setStub(file_get_contents(__DIR__ . '/phar-stub.php'));

    debug_log("  > Created at $dest");
}

function test_phar($baseDir, $phar)
{
    debug_log('Testing the phar');
    exec('php ' . __DIR__ . '/test_phar.php', $output, $ret);
    if ($ret !== 0) {
        die("Testing the phar failed with exit code {$ret}\n"
            . implode("\n", $output));
    }
    debug_log('  > Phar is OK: ' . implode("\n", $output));
}

function create_zip($baseDir, $dest)
{
    debug_log('Creating zip file');
    chdir($baseDir);
    exec("zip -r $dest ./");
    debug_log("  > Created at $dest");
    chdir(__DIR__);
}

$baseDir = realpath(__DIR__ . '/..') . '/build/artifacts/staging';

create_staging_dir($baseDir);
create_phar($baseDir, __DIR__ . '/artifacts/aws.phar');
test_phar($baseDir, __DIR__ . '/artifacts/aws.phar');
create_zip($baseDir, __DIR__ . '/artifacts/aws.zip');
