<?php
namespace Aws\Test\Script;

use Aws;
use Aws\Script\Composer\Composer;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Symfony\Component\Filesystem\Filesystem;

class ComposerTest extends TestCase
{
    public function invalidServiceNameProvider()
    {
        return [
            [['foo'], 'foo'],
            [['S3', 'foo'], 'foo'],
            [[''], ''],
            [['S3', ''], '']
        ];
    }

    /**
     * @dataProvider invalidServiceNameProvider
     *
     * @param $serviceList
     * @param $invalidService
     */
    public function testListInvalidServiceName($serviceList, $invalidService)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "'$invalidService' is not a valid AWS service namespace. Please check spelling and casing."
        );

        Composer::removeUnusedServices($this->getMockEvent($serviceList));
    }

    public function testNoListedServices()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            "There are no services listed. Did you intend to use this script?"
        );

        Composer::removeUnusedServices($this->getMockEvent([]));
    }

    public function servicesToKeepProvider()
    {
        return [
            [['S3']],
            [['S3', 'Rds']],
            [['signer']],
            [['signer', 'kendra']],
            [['CloudFront', 'SageMaker']],
            [['DynamoDbStreams']]
        ];
    }

    /**
     * @dataProvider servicesToKeepProvider
     *
     * @param $servicesToKeep
     */
    public function testRemoveServices($servicesToKeep)
    {
        $filesystem = new Filesystem();

        $tempDir = sys_get_temp_dir();
        $vendorDir = $tempDir . '/aws/aws-sdk-php';
        $clientPath = $vendorDir . '/src/';
        $modelPath = $clientPath . 'data/';

        $serviceList = composer::buildServiceMapping();

        foreach ($serviceList as $client => $data) {
            $clientDir = $clientPath . $client;
            $modelDir = $modelPath . $data;

            $filesystem->mkdir($clientDir);
            $filesystem->mkdir($modelDir);
        }
        $filesystem->mkdir( $clientPath . 'Api');

        $unsafeForDeletion = ['Kms', 'S3', 'SSO', 'SSOOIDC', 'Sts'];
        if (in_array('DynamoDbStreams', $servicesToKeep)) {
            $unsafeForDeletion[] = 'DynamoDb';
        }
        //offset to allow for values listed as unsafe and also to keep
        $servicesKept = count($servicesToKeep);
        $unsafeAndNotKept = count($unsafeForDeletion) - count(array_intersect($servicesToKeep, $unsafeForDeletion));
        $keptActual = $servicesKept + $unsafeAndNotKept;
        $servicesToRemove = (count($serviceList) - $keptActual);
        $message = 'Removed ' . $servicesToRemove . ' AWS services';

        Composer::removeUnusedServices(
            $this->getMockEvent($servicesToKeep, $tempDir, $message),
            $filesystem
        );

        $this->assertTrue($filesystem->exists($clientPath . 'Api'));
        foreach ($serviceList as $client => $data) {
            $clientDir = $clientPath . $client;
            $modelDir = $modelPath . $data;

            if (!in_array($client, $servicesToKeep) &&
                !in_array($client, $unsafeForDeletion)
            ) {
                $this->assertFalse($filesystem->exists([$clientDir, $modelDir]));
            } else {
                $this->assertTrue($filesystem->exists([$clientDir, $modelDir]));
            }
        }
    }

    private function getMockEvent(
        array $servicesToKeep,
              $vendorDir = '',
              $message = null
    ) {
        $mockPackage = $this->getMockBuilder('Composer\Package\RootPackage')
            ->disableOriginalConstructor()
            ->getMock();
        $mockPackage->expects($this->any())
            ->method('getExtra')
            ->willReturn(['aws/aws-sdk-php' => $servicesToKeep]);

        $mockConfig = $this->getMockBuilder('Composer\Config')
            ->disableOriginalConstructor()
            ->getMock();
        $mockConfig->expects($this->any())
            ->method('get')
            ->willReturn($vendorDir);

        $mockComposer = $this->getMockBuilder('Composer\Composer')
        ->disableOriginalConstructor()
        ->getMock();
        $mockComposer->expects($this->any())
            ->method('getPackage')
            ->willReturn($mockPackage);
        $mockComposer->expects($this->any())
            ->method('getConfig')
            ->willReturn($mockConfig);

        $mockEvent = $this->getMockBuilder('Composer\Script\Event')
            ->disableOriginalConstructor()
            ->getMock();
        $mockEvent->expects($this->any())
            ->method('getComposer')
            ->willReturn($mockComposer);

        if ($message) {
            $mockIO = $this->getMockBuilder('Composer\IO\ConsoleIO')
                ->disableOriginalConstructor()
                ->getMock();
            $mockIO->expects($this->once())
                ->method('write')
                ->with($message);
            $mockEvent->expects($this->any())
                ->method('getIO')
                ->willReturn($mockIO);
        }

        return $mockEvent;
    }
}