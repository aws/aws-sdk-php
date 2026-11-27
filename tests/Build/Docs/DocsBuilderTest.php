<?php
namespace Aws\Test\Build\Docs;

use Aws\Api\DocModel;
use Aws\Api\Service as Api;
use Aws\Build\Docs\DocsBuilder;
use Aws\Build\Docs\Service;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(DocsBuilder::class)]
class DocsBuilderTest extends TestCase
{
    #[DataProvider('serviceDescriptionProvider')]
    public function testRendersServiceDescriptionWhenPresent(
        array $docs,
        $expected
    ) {
        $api = new Api(
            [
                'metadata' => [
                    'apiVersion' => '2020-01-01',
                    'protocol' => 'json',
                    'serviceFullName' => 'AWS MyService',
                    'serviceIdentifier' => 'sqs',
                    'uid' => 'myservice-2020-01-01',
                ],
            ],
            function () {
                return null;
            }
        );
        // DocModel's constructor requires the tidy extension, which reading
        // service docs does not use, so set the docs directly.
        $docModel = (new \ReflectionClass(DocModel::class))
            ->newInstanceWithoutConstructor();
        (new \ReflectionProperty(DocModel::class, 'docs'))
            ->setValue($docModel, $docs);
        $service = new Service($api, $docModel);

        $outputDir = sys_get_temp_dir() . '/' . uniqid('docs-builder-test-');
        mkdir($outputDir);
        $builder = (new \ReflectionClass(DocsBuilder::class))
            ->newInstanceWithoutConstructor();
        $properties = [
            'outputDir' => $outputDir,
            'template' => '{{ contents }}',
            'skipMembers' => new \SplObjectStorage(),
        ];
        foreach ($properties as $property => $value) {
            (new \ReflectionProperty(DocsBuilder::class, $property))
                ->setValue($builder, $value);
        }

        (new \ReflectionMethod(DocsBuilder::class, 'renderService'))
            ->invoke($builder, $service, []);
        $file = "{$outputDir}/{$service->serviceLink}";
        $html = file_get_contents($file);
        unlink($file);
        rmdir($outputDir);

        if ($expected === null) {
            $this->assertStringNotContainsString('Service Description', $html);
        } else {
            $this->assertStringContainsString('<h2>Service Description</h2>', $html);
            $this->assertStringContainsString($expected, $html);
        }
    }

    public static function serviceDescriptionProvider(): array
    {
        return [
            // service with a description in its docs model
            [
                ['service' => '<p>AWS MyService Description</p>'],
                '<p>AWS MyService Description</p>',
            ],
            // service without a description in its docs model
            [
                [],
                null,
            ],
        ];
    }
}
