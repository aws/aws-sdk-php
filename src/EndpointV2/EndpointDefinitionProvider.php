<?php

namespace Aws\EndpointV2;

/**
 * Provides Endpoint-related artifacts used for endpoint resolution
 * and testing.
 */
class EndpointDefinitionProvider
{
    public static function getEndpointRuleset(
        $service,
        $apiVersion,
        $getTestFile = false
    )
    {
        $basePath = __DIR__ . '/../data';
        $serviceDir = $basePath . "/{$service}";
        if (!is_dir($serviceDir)) {
            throw new \InvalidArgumentException(
                'Invalid service name.'
            );
        }

        if ($apiVersion === 'latest') {
            $apiVersion = self::getLatest($service);
        }

        $rulesetPath = $serviceDir . '/' . $apiVersion;
        if (!is_dir($rulesetPath)) {
            throw new \InvalidArgumentException(
                'Invalid api version.'
            );
        }
        $fileName = $getTestFile ? '/endpoint-tests-1' : '/endpoint-rule-set-1';

        if (file_exists($rulesetPath . $fileName . '.json.php')) {
            return require($rulesetPath . $fileName . '.json.php');
        } else {
            return json_decode(file_get_contents($rulesetPath . $fileName . '.json'), true);
        }
    }

    public static function getPartitions()
    {
        $basePath = __DIR__ . '/../data';
        $file = '/partitions.json';

        if (file_exists($basePath . $file . '.php')) {
           return require($basePath . $file . '.php');
        }

        return require($basePath . $file);
    }

    private static function getLatest($service)
    {
        $manifest = \Aws\manifest();
        return $manifest[$service]['versions']['latest'];
    }
}