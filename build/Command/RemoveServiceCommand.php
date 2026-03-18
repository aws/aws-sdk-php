<?php

namespace AwsBuild\Command;

class RemoveServiceCommand extends AbstractCommand
{
    public function getName(): string
    {
        return 'remove-service';
    }

    public function getDescription(): string
    {
        return 'Removes all resources for a given AWS service from the SDK codebase.';
    }

    public function getUsage(): string
    {
        return 'php build/WorkflowCommandRunner.php remove-service'
            . ' --service-id=<identifier> [--commit=true|false] [--dry-run] [--verbose|-v]';
    }

    protected function doExecute(array $args): int
    {
        $options = $this->parseArgs($args);

        if (empty($options['service-id'])) {
            $this->error('Missing required option --service-id');
            $this->output('');
            $this->output('Usage:');
            $this->output('  ' . $this->getUsage());
            return 1;
        }

        $serviceId = $options['service-id'];
        $commit = !isset($options['commit']) || $options['commit'] !== 'false';
        $dryRun = isset($options['dry-run']);

        $serviceInfo = $this->resolveService($serviceId);
        if ($serviceInfo === null) {
            $this->error("Unable to resolve service: \"{$serviceId}\"");
            return 1;
        }

        if ($dryRun) {
            $this->printDryRunSummary($serviceInfo);
            return 0;
        }

        $namespace = $serviceInfo['namespace'];
        $serviceKey = $serviceInfo['serviceKey'];

        try {
            $this->verbose("Deleting client folder src/{$namespace}/...");
            $this->deleteClientFolder($namespace);
            $this->verbose("Deleting client folder src/{$namespace}/... done");
        } catch (\Exception $e) {
            $this->error("Failed to delete client folder: " . $e->getMessage());
            return 1;
        }

        try {
            $this->verbose("Removing Sdk.php annotations for {$namespace}...");
            $this->removeSdkAnnotations($namespace);
            $this->verbose("Removing Sdk.php annotations for {$namespace}... done");
        } catch (\Exception $e) {
            $this->error("Failed to remove Sdk.php annotations: " . $e->getMessage());
            return 1;
        }

        try {
            $this->verbose("Deleting data folder src/data/{$serviceKey}/...");
            $this->deleteDataFolder($serviceKey);
            $this->verbose("Deleting data folder src/data/{$serviceKey}/... done");
        } catch (\Exception $e) {
            $this->error("Failed to delete data folder: " . $e->getMessage());
            return 1;
        }

        try {
            $this->verbose("Removing {$namespace} from grandfathered-services.json...");
            $this->removeFromGrandfatheredJson($namespace);
            $this->verbose("Removing {$namespace} from grandfathered-services.json... done");
        } catch (\Exception $e) {
            $this->error("Failed to remove from grandfathered-services.json: " . $e->getMessage());
            return 1;
        }

        try {
            $this->verbose("Removing {$namespace} from grandfathered-services.json.php...");
            $this->removeFromGrandfatheredPhp($namespace);
            $this->verbose("Removing {$namespace} from grandfathered-services.json.php... done");
        } catch (\Exception $e) {
            $this->error("Failed to remove from grandfathered-services.json.php: " . $e->getMessage());
            return 1;
        }

        try {
            $this->verbose("Removing {$serviceKey} from manifest.json...");
            $this->removeFromManifest($serviceKey);
            $this->verbose("Removing {$serviceKey} from manifest.json... done");
        } catch (\Exception $e) {
            $this->error("Failed to remove from manifest.json: " . $e->getMessage());
            return 1;
        }

        try {
            $this->verbose("Creating changelog entry for {$serviceKey}...");
            $this->createChangelogEntry($serviceKey, $namespace);
            $this->verbose("Creating changelog entry for {$serviceKey}... done");
        } catch (\Exception $e) {
            $this->error("Failed to create changelog entry: " . $e->getMessage());
            return 1;
        }

        if ($commit) {
            $this->verbose("Committing changes for {$namespace}...");
            $this->gitCommit($serviceKey, $namespace);
            $this->verbose("Committing changes for {$namespace}... done");
        }

        $this->output("Successfully removed service: {$namespace}");
        return 0;
    }

    /**
     * Resolves a service from the manifest using a three-tier case-insensitive lookup.
     *
     * Lookup priority:
     *   1. Match against manifest keys (Service_Key)
     *   2. Match against namespace values
     *   3. Match against serviceIdentifier values
     *
     * @param string $input The user-provided service identifier
     * @return array|null Associative array with serviceKey, namespace, serviceIdentifier or null
     */
    private function resolveService(string $input): ?array
    {
        $manifestPath = $this->getProjectRoot() . '/src/data/manifest.json';
        $manifest = json_decode(file_get_contents($manifestPath), true);
        $lowerInput = strtolower($input);

        // Tier 1: Match against manifest keys (Service_Key)
        foreach ($manifest as $key => $entry) {
            if (strtolower($key) === $lowerInput) {
                return [
                    'serviceKey' => $key,
                    'namespace' => $entry['namespace'],
                    'serviceIdentifier' => $entry['serviceIdentifier'],
                ];
            }
        }

        // Tier 2: Match against namespace values
        foreach ($manifest as $key => $entry) {
            if (strtolower($entry['namespace']) === $lowerInput) {
                return [
                    'serviceKey' => $key,
                    'namespace' => $entry['namespace'],
                    'serviceIdentifier' => $entry['serviceIdentifier'],
                ];
            }
        }

        // Tier 3: Match against serviceIdentifier values
        foreach ($manifest as $key => $entry) {
            if (strtolower($entry['serviceIdentifier']) === $lowerInput) {
                return [
                    'serviceKey' => $key,
                    'namespace' => $entry['namespace'],
                    'serviceIdentifier' => $entry['serviceIdentifier'],
                ];
            }
        }

        return null;
    }

    /**
     * Recursively deletes the client folder at src/{Namespace}/.
     *
     * Logs a warning and continues if the directory does not exist.
     *
     * @param string $namespace The PHP namespace segment (e.g., "S3", "ACMPCA")
     */
    private function deleteClientFolder(string $namespace): void
    {
        $path = $this->getProjectRoot() . '/src/' . $namespace;

        if (!is_dir($path)) {
            $this->output("[WARNING] Client folder does not exist: {$path}");
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                rmdir($item->getPathname());
            } else {
                unlink($item->getPathname());
            }
        }

        rmdir($path);
    }

    /**
     * Removes @method annotation lines for the given namespace from src/Sdk.php.
     *
     * Removes lines containing create{Namespace}( and createMultiRegion{Namespace}(.
     * Uses string matching (not regex) on each line. Logs a warning if either
     * annotation line is not found.
     *
     * @param string $namespace The PHP namespace segment (e.g., "S3", "ACMPCA")
     */
    private function removeSdkAnnotations(string $namespace): void
    {
        $sdkPath = $this->getProjectRoot() . '/src/Sdk.php';
        $content = file_get_contents($sdkPath);
        $lines = explode("\n", $content);

        $createNeedle = 'create' . $namespace . '(';
        $multiRegionNeedle = 'createMultiRegion' . $namespace . '(';

        $foundCreate = false;
        $foundMultiRegion = false;
        $filteredLines = [];

        foreach ($lines as $line) {
            if (strpos($line, $createNeedle) !== false
                && strpos($line, '@method') !== false
            ) {
                $foundCreate = true;
                continue;
            }

            if (strpos($line, $multiRegionNeedle) !== false
                && strpos($line, '@method') !== false
            ) {
                $foundMultiRegion = true;
                continue;
            }

            $filteredLines[] = $line;
        }

        if (!$foundCreate) {
            $this->output("[WARNING] Sdk.php annotation not found: {$createNeedle}");
        }

        if (!$foundMultiRegion) {
            $this->output("[WARNING] Sdk.php annotation not found: {$multiRegionNeedle}");
        }

        file_put_contents($sdkPath, implode("\n", $filteredLines));
    }

    /**
     * Recursively deletes the data folder at src/data/{serviceKey}/.
     *
     * Uses the manifest key (Service_Key), not serviceIdentifier, for the path.
     * Logs a warning and continues if the directory does not exist.
     *
     * @param string $serviceKey The manifest key (e.g., "acm-pca", "apigateway")
     */
    private function deleteDataFolder(string $serviceKey): void
    {
        $path = $this->getProjectRoot() . '/src/data/' . $serviceKey;

        if (!is_dir($path)) {
            $this->output("[WARNING] Data folder does not exist: {$path}");
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                rmdir($item->getPathname());
            } else {
                unlink($item->getPathname());
            }
        }

        rmdir($path);
    }

    /**
     * Removes the namespace from the grandfathered-services.json file.
     *
     * Loads the JSON file, removes the exact-match namespace from the
     * "grandfathered-services" array, and writes back with JSON_PRETTY_PRINT.
     * Logs a warning if the namespace is not present.
     *
     * @param string $namespace The PHP namespace segment (e.g., "S3", "ACMPCA")
     */
    private function removeFromGrandfatheredJson(string $namespace): void
    {
        $path = $this->getProjectRoot() . '/src/data/grandfathered-services.json';
        $data = json_decode(file_get_contents($path), true);

        $services = $data['grandfathered-services'];
        $index = array_search($namespace, $services, true);

        if ($index === false) {
            $this->output("[WARNING] Namespace \"{$namespace}\" not found in grandfathered-services.json");
            return;
        }

        array_splice($services, $index, 1);
        $data['grandfathered-services'] = $services;

        file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT) . "\n");
    }

    /**
     * Removes the namespace from the grandfathered-services.json.php file.
     *
     * Loads the PHP file via include, removes the exact-match namespace from the
     * "grandfathered-services" array, and regenerates the PHP file content.
     * Logs a warning if the namespace is not present.
     *
     * @param string $namespace The PHP namespace segment (e.g., "S3", "ACMPCA")
     */
    private function removeFromGrandfatheredPhp(string $namespace): void
    {
        $path = $this->getProjectRoot() . '/src/data/grandfathered-services.json.php';
        $data = include $path;

        $services = $data['grandfathered-services'];
        $index = array_search($namespace, $services, true);

        if ($index === false) {
            $this->output("[WARNING] Namespace \"{$namespace}\" not found in grandfathered-services.json.php");
            return;
        }

        array_splice($services, $index, 1);

        $items = implode(', ', array_map(function ($s) {
            return "'" . $s . "'";
        }, $services));

        $content = "<?php\n"
            . "// This file was auto-generated from sdk-root/src/data/grandfathered-services.json\n"
            . "return [ 'grandfathered-services' => [ " . $items . ", ],];\n";

        file_put_contents($path, $content);
    }

    /**
     * Removes the service entry from the manifest.json file.
     *
     * Loads src/data/manifest.json, removes the entry keyed by $serviceKey,
     * and writes back with JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES.
     *
     * @param string $serviceKey The manifest key (e.g., "acm-pca", "s3")
     */
    private function removeFromManifest(string $serviceKey): void
    {
        $root = $this->getProjectRoot();
        $jsonPath = $root . '/src/data/manifest.json';
        $phpPath = $root . '/src/data/manifest.json.php';

        $manifest = json_decode(file_get_contents($jsonPath), true);
        unset($manifest[$serviceKey]);

        // Write manifest.json
        file_put_contents(
            $jsonPath,
            json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n"
        );

        // Regenerate manifest.json.php
        $phpContent = "<?php\n"
            . "// This file was auto-generated from sdk-root/src/data/manifest.json\n"
            . "return " . var_export($manifest, true) . ";\n";
        file_put_contents($phpPath, $phpContent);
    }

    /**
     * Creates a changelog entry for the service removal.
     *
     * Creates the .changes/nextrelease/ directory if it does not exist,
     * then writes a remove-{serviceKey}.json file with the standard
     * changelog JSON structure.
     *
     * @param string $serviceKey The manifest key (e.g., "acm-pca", "s3")
     * @param string $namespace The PHP namespace segment (e.g., "S3", "ACMPCA")
     */
    private function createChangelogEntry(string $serviceKey, string $namespace): void
    {
        $dir = $this->getProjectRoot() . '/.changes/nextrelease';

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $entry = [
            [
                'type' => 'api-change',
                'category' => $namespace,
                'description' => "Removes the `{$namespace}` service, which has been deprecated.",
            ],
        ];

        file_put_contents(
            $dir . '/remove-' . $serviceKey . '.json',
            json_encode($entry, JSON_PRETTY_PRINT) . "\n"
        );
    }

    /**
     * Stages all changes and commits with a service removal message.
     *
     * Runs `git add -A` followed by `git commit -m "Remove {Namespace} service"`.
     * On failure of either command, prints the git error output and exits
     * with a non-zero code.
     *
     * @param string $namespace The PHP namespace segment (e.g., "S3", "ACMPCA")
     */
    private function gitCommit(string $serviceKey, string $namespace): void
    {
        $root = $this->getProjectRoot();
        $paths = [
            $root . '/src/' . $namespace,
            $root . '/src/data/' . $serviceKey,
            $root . '/src/Sdk.php',
            $root . '/src/data/manifest.json',
            $root . '/src/data/manifest.json.php',
            $root . '/src/data/grandfathered-services.json',
            $root . '/src/data/grandfathered-services.json.php',
            $root . '/.changes/nextrelease/remove-' . $serviceKey . '.json',
        ];

        $output = [];
        $exitCode = 0;
        $escapedPaths = implode(' ', array_map('escapeshellarg', $paths));
        exec('git add ' . $escapedPaths . ' 2>&1', $output, $exitCode);
        if ($exitCode !== 0) {
            $this->error('git add failed: ' . implode("\n", $output));
            exit($exitCode);
        }

        $output = [];
        $message = "Remove {$namespace} service";
        exec('git commit -m ' . escapeshellarg($message) . ' 2>&1', $output, $exitCode);
        if ($exitCode !== 0) {
            $this->error('git commit failed: ' . implode("\n", $output));
            exit($exitCode);
        }
    }

    /**
     * Prints a dry-run summary of what the removal tool would do.
     *
     * Checks existence of folders/files, reads Sdk.php for annotation lines,
     * checks grandfathered lists, shows manifest entry and changelog content
     * preview. Does not modify any files.
     *
     * @param array $serviceInfo Associative array with serviceKey, namespace, serviceIdentifier
     */
    private function printDryRunSummary(array $serviceInfo): void
    {
        $serviceKey = $serviceInfo['serviceKey'];
        $namespace = $serviceInfo['namespace'];
        $serviceIdentifier = $serviceInfo['serviceIdentifier'];
        $root = $this->getProjectRoot();

        $this->output('=== Dry Run Summary ===');
        $this->output("Service Key: {$serviceKey}");
        $this->output("Namespace: {$namespace}");
        $this->output("Service Identifier: {$serviceIdentifier}");
        $this->output('');

        // Client folder
        $clientPath = $root . '/src/' . $namespace;
        $clientExists = is_dir($clientPath) ? 'EXISTS' : 'NOT FOUND';
        $this->output("[Client Folder] src/{$namespace}/ - {$clientExists}");

        // Data folder
        $dataPath = $root . '/src/data/' . $serviceKey;
        $dataExists = is_dir($dataPath) ? 'EXISTS' : 'NOT FOUND';
        $this->output("[Data Folder] src/data/{$serviceKey}/ - {$dataExists}");

        // Sdk.php annotations
        $sdkPath = $root . '/src/Sdk.php';
        $createNeedle = 'create' . $namespace . '(';
        $multiRegionNeedle = 'createMultiRegion' . $namespace . '(';

        $this->output('');
        $this->output('[Sdk.php Annotations]');

        if (file_exists($sdkPath)) {
            $sdkContent = file_get_contents($sdkPath);
            $sdkLines = explode("\n", $sdkContent);
            $foundCreate = false;
            $foundMultiRegion = false;

            foreach ($sdkLines as $line) {
                if (strpos($line, $createNeedle) !== false
                    && strpos($line, '@method') !== false
                ) {
                    $this->output('  Would remove: ' . trim($line));
                    $foundCreate = true;
                }
                if (strpos($line, $multiRegionNeedle) !== false
                    && strpos($line, '@method') !== false
                ) {
                    $this->output('  Would remove: ' . trim($line));
                    $foundMultiRegion = true;
                }
            }

            if (!$foundCreate) {
                $this->output("  Annotation not found: {$createNeedle}");
            }
            if (!$foundMultiRegion) {
                $this->output("  Annotation not found: {$multiRegionNeedle}");
            }
        } else {
            $this->output('  Sdk.php not found');
        }

        // Grandfathered services
        $this->output('');
        $this->output('[Grandfathered Services]');

        $gfJsonPath = $root . '/src/data/grandfathered-services.json';
        if (file_exists($gfJsonPath)) {
            $gfData = json_decode(file_get_contents($gfJsonPath), true);
            $inJson = in_array($namespace, $gfData['grandfathered-services'], true);
            $jsonStatus = $inJson ? 'FOUND - would remove' : 'NOT FOUND';
            $this->output("  grandfathered-services.json: {$jsonStatus}");
        } else {
            $this->output('  grandfathered-services.json: file not found');
        }

        $gfPhpPath = $root . '/src/data/grandfathered-services.json.php';
        if (file_exists($gfPhpPath)) {
            $gfPhpData = include $gfPhpPath;
            $inPhp = in_array($namespace, $gfPhpData['grandfathered-services'], true);
            $phpStatus = $inPhp ? 'FOUND - would remove' : 'NOT FOUND';
            $this->output("  grandfathered-services.json.php: {$phpStatus}");
        } else {
            $this->output('  grandfathered-services.json.php: file not found');
        }

        // Manifest entry
        $this->output('');
        $this->output('[Manifest] Would remove from manifest.json and manifest.json.php:');
        $manifestPath = $root . '/src/data/manifest.json';
        $manifest = json_decode(file_get_contents($manifestPath), true);
        if (isset($manifest[$serviceKey])) {
            $entryJson = json_encode(
                [$serviceKey => $manifest[$serviceKey]],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            );
            $this->output($entryJson);
        }

        // Changelog entry preview
        $this->output('');
        $this->output('[Changelog Entry] Would create .changes/nextrelease/remove-' . $serviceKey . '.json:');
        $changelogEntry = [
            [
                'type' => 'api-change',
                'category' => $namespace,
                'description' => "Removes the `{$namespace}` service, which has been deprecated.",
            ],
        ];
        $this->output(json_encode($changelogEntry, JSON_PRETTY_PRINT));
    }

    /**
     * Parses CLI arguments from the $args array directly.
     *
     * PHP's getopt() reads from the real process argv and ignores
     * $_SERVER['argv'] modifications, so we parse the args array manually.
     *
     * @param array $args The CLI arguments passed to the command
     * @return array Associative array of option name => value (or true for flags)
     */
    private function parseArgs(array $args): array
    {
        $options = [];
        foreach ($args as $arg) {
            if (strpos($arg, '--') === 0) {
                $arg = substr($arg, 2);
                if (strpos($arg, '=') !== false) {
                    [$key, $value] = explode('=', $arg, 2);
                    $options[$key] = $value;
                } else {
                    $options[$arg] = true;
                }
            }
        }
        return $options;
    }
}
