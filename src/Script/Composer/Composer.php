<?php
namespace Aws\Script\Composer;

require_once __DIR__ . '/../../functions.php';

use Aws;
use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

class Composer
{
    public static function removeUnusedServices(
        Event      $event,
        Filesystem $filesystem = null
    )
    {
        $composer = $event->getComposer();
        $extra = $composer->getPackage()->getExtra();
        $listedServices = isset($extra['aws/aws-sdk-php'])
            ? $extra['aws/aws-sdk-php']
            : [];

        if ($listedServices) {
            $serviceMapping = self::buildServiceMapping();
            self::verifyListedServices($serviceMapping, $listedServices);
            $filesystem = $filesystem ?: new Filesystem();
            $vendorPath = $composer->getConfig()->get('vendor-dir');
            self::removeServiceDirs(
                $event,
                $filesystem,
                $serviceMapping,
                $listedServices,
                $vendorPath
            );
        } else {
            throw new \InvalidArgumentException(
                'There are no services listed. Did you intend to use this script?'
            );
        }
    }

    public static function buildServiceMapping()
    {
        $serviceMapping = [];
        $source = Aws\manifest();

        foreach ($source as $key => $value) {
            $serviceMapping[$value['namespace']] = $key;
        }

        return $serviceMapping;
    }

    private static function verifyListedServices($serviceMapping, $listedServices)
    {
        foreach ($listedServices as $serviceToKeep) {
            if (!isset($serviceMapping[$serviceToKeep])) {
                throw new \InvalidArgumentException(
                    "'$serviceToKeep' is not a valid AWS service namespace. Please check spelling and casing."
                );
            }
        }
    }

    private static function removeServiceDirs(
        $event,
        $filesystem,
        $serviceMapping,
        $listedServices,
        $vendorPath
    ) {
        $unsafeForDeletion = ['Kms', 'S3', 'SSO', 'Sts'];
        if (in_array('DynamoDbStreams', $listedServices)) {
            $unsafeForDeletion[] = 'DynamoDb';
        }

        $clientPath = $vendorPath . '/aws/aws-sdk-php/src/';
        $modelPath = $clientPath . 'data/';
        $deleteCount = 0;

        foreach ($serviceMapping as $clientName => $modelName) {
            if (!in_array($clientName, $listedServices) &&
                !in_array($clientName, $unsafeForDeletion)
            ) {
                $clientDir = $clientPath . $clientName;
                $modelDir = $modelPath . $modelName;

                if ($filesystem->exists([$clientDir, $modelDir])) {
                    $filesystem->remove([$clientDir, $modelDir]);;
                    $deleteCount++;
                }
            }
        }
        $event->getIO()->write(
            "Removed $deleteCount AWS services"
        );
    }
}