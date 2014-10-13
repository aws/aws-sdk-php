<?php
namespace Aws\Build\Docs;

use Aws\Common\Api\FilesystemApiProvider;
use Aws\Common\Api\Operation;
use Aws\Common\Api\Service as Api;

class DocsBuilder
{
    /** @var string */
    private $themeSource;

    /** @var string */
    private $docModelsDir;

    /** @var string */
    private $apiModelsDir;

    /** @var string */
    private $outputDir;

    public function __construct($apiModelsDir, $docModelsDir, $outputDir)
    {
        $this->apiModelsDir = $apiModelsDir;
        $this->docModelsDir = $docModelsDir;
        $this->outputDir = $outputDir;
        $this->themeSource = realpath(__DIR__ . '/../theme');
    }

    public function getSami($sourceDir)
    {
        $this->generateTheme();

        if (!class_exists($sami = '\Sami\Sami')) {
            throw new \RuntimeException('Sami class is not available. Are you sure you are using Sami right now?');
        }

        return new $sami($sourceDir, [
            'title'                => 'AWS SDK for PHP',
            'theme'                => 'aws',
            'template_dirs'        => ["{$this->outputDir}/theme"],
            'build_dir'            => "{$this->outputDir}/build",
            'cache_dir'            => "{$this->outputDir}/cache",
            'default_opened_level' => 1,
        ]);
    }

    private function generateTheme()
    {
        // Create API pages, manifest, and sami.js twigs. Copy static artifacts.
        $services = [];
        $manifest = '';
        $indexes = '';

        foreach (glob($this->apiModelsDir . '/*.api.php') as $file) {
            $file = basename($file, '.api.php');
            if (preg_match('/([a-z0-9-]+?)-([0-9-]+)/', $file, $matches)) {
                list(/*skip*/, $name, $version) = $matches;
                $apiProvider = new FilesystemApiProvider($this->apiModelsDir);
                $service = new Service(
                    $name,
                    new Api($apiProvider, $name, $version),
                    new DocModel($this->docModelsDir, $name, $version)
                );

                $indexes .= $this->createIndexEntryForService($service);

                $html = (new HtmlDocument)->open('section', 'Operations');
                $html->append($this->createHtmlForToc($service->api->getOperations()));
                foreach ($service->api->getOperations() as $opName => $operation) {
                    $indexes .= $this->createIndexEntryForOperation($service, $opName);
                    $html->append($this->createHtmlForOperation($service, $opName, $operation));
                }
                $html->close();
                $this->writeServiceApiPage($service, $html);

                $manifest .= "    '{$service->slug}.twig': '{$service->serviceLink}'\n";

                if (!isset($services[$service->title])) $services[$service->title] = [];
                $services[$service->title][$version] = $service;
            }
        }
        $this->writeThemeFile('manifest.yml', [':manifest' => $manifest]);
        $this->writeThemeFile('sami.js.twig', [':indexes' => $indexes]);
        $this->writeThemeFile('layout/layout.twig');
        $this->writeThemeFile('img/service-sprites.png');

        // Create index and class twigs.
        ksort($services, SORT_NATURAL | SORT_FLAG_CASE);
        $servicesTable = '';
        $classBlocks = '';
        foreach ($services as $versions) {
            krsort($versions);
            $service = reset($versions);
            $servicesTable .= "<tr><td><a href=\"{$service->serviceLink}\">{$service->title}</a></td>";
            $servicesTable .= "<td><a href=\"{$service->clientLink}\">{$service->client}</a></td>";
            $servicesTable .= "<td><ul class=\"list-unstyled\">";
            $classBlocks .= "\t{% elseif class.shortname == '{$service->clientName}' %}\n\t\t{% set apiLinks = '";
            $latest = count($versions) > 1 ? ' (latest)' : '';
            foreach ($versions as $sv) {
                $servicesTable .= "<li><a href=\"{$sv->serviceLink}\">{$sv->version} {$latest}</a></li>";
                $classBlocks .= "<li><a href=\"{$sv->slug}.html\">{$sv->shortTitle} &ndash; {$sv->version} API</a></li>";
                $latest = '';
            }
            $classBlocks .= "' %}\n\t\t{{ block('client_heading') }}\n";
            $servicesTable .= "</ul></td></tr>";
        }
        $this->writeThemeFile('index.twig', [':services' => $servicesTable]);
        $this->writeThemeFile('class.twig', [':services' => $classBlocks]);
    }

    private function createIndexEntryForService(Service $service)
    {
        return json_encode([
            'type'     => 'Service',
            'fromName' => $service->client,
            'fromLink' => $service->clientLink,
            'link'     => $service->serviceLink,
            'name'     => $service->fullTitle,
            'doc'      => "API documentation for the {$service->version} version of the {$service->title} service.",
        ]) . ",\n";
    }

    private function createIndexEntryForOperation(Service $service, $operation)
    {
        return json_encode([
            'type'     => 'Operation',
            'fromName' => $service->client,
            'fromLink' => $service->clientLink,
            'link'     => $service->serviceLink . '#' . strtolower($operation),
            'name'     => "{$service->namespace}Client::" . lcfirst($operation) . " ({$service->version})",
            'doc'      => "API documentation for the {$operation} operation called using the {$service->client}.",
        ]) . ",\n";
    }

    private function createHtmlForToc(array $operations)
    {
        $html = (new HtmlDocument)->open('div', 'toc list-group');
        foreach ($operations as $opName => $operation) {
            $item = '<strong>' . $html->glyph('cog') . ' '
                . '<a href="#' . $html->slug($opName) . '">' . "{$opName}</a></strong> &mdash; "
                . '<a href="#' . $html->slug($opName . '-parameters') . '">Parameters</a> | '
                . '<a href="#' . $html->slug($opName . '-results') . '">Results</a> | '
                . '<a href="#' . $html->slug($opName . '-errors') . '">Errors</a>';
            $html->elem('div', 'list-group-item', $item);
        }
        $html->close();

        return $html;
    }

    private function createHtmlForOperation(Service $service, $name, Operation $operation)
    {
        $html = new HtmlDocument;

        // Name
        $html->section(2, $html->glyph('cog') . ' ' . $name, null, 'operation');

        // Code
        $html->elem('pre', 'opcode', '$result = $client-&gt;<code>' . lcfirst($name) . '</code>([...]);');

        // Description
        if ($description = $service->docs->getOperationDocs($name)) {
            $html->elem('div', 'well', $description);
        }

        // Parameters
        $inputShapes = new ShapeIterator($operation->getInput(), $service->docs);
        $inputExample = new ExampleBuilder($name);
        $inputDocs = new ThemeBuilder($name);
        foreach ($inputShapes as $shape) {
            $inputExample->addShape($shape);
            $inputDocs->addShape($shape);
        }
        $html->section(3, 'Parameters', $name)
            ->elem('h5', null, 'Formatting Example')
            ->elem('pre', null, htmlentities($inputExample->getCode()))
            ->elem('h5', null, 'Parameter Details')
            ->open('ul')->append($inputDocs->getHtml())->close()
            ->close();

        // Results
        $html->section(3, 'Results', $name);
        if (count($operation->getOutput()->getMembers())) {
            $outputShapes = new ShapeIterator($operation->getOutput(), $service->docs);
            $outputExample = new ExampleBuilder($name, false);
            $outputDocs = new ThemeBuilder($name, false);
            foreach ($outputShapes as $shape) {
                $outputExample->addShape($shape);
                $outputDocs->addShape($shape);
            }
            $html->elem('h5', null, 'Formatting Example')
                ->elem('pre', null, htmlentities($outputExample->getCode()))
                ->elem('h5', null, 'Results Details')
                ->open('ul')->append($outputDocs->getHtml())->close();
        } else {
            $html->elem('div', 'alert alert-info', 'The results for this operation are always empty.');
        }
        $html->close();

        // Errors
        $html->section(3, 'Errors', $name);
        if ($errors = $operation->getErrors()) {
            foreach ($errors as $error) {
                $html->open('div', 'panel panel-default')
                    ->open('div', 'panel-heading')->elem('h5', 'panel-title', $error['name'])->close()
                    ->elem('div', 'panel-body', $service->docs->getErrorDocs($error->getName())
                                    ?: 'This error does not currently have a description.')
                    ->close();
            }
        } else {
            $html->elem('p', null, 'There are no errors described for this operation.');
        }
        $html->close();

        return $html->close();
    }

    private function writeServiceApiPage(Service $service, HtmlDocument $html)
    {
        $this->writeThemeFile(['api.twig', "{$service->slug}.twig"], [
            ':service'   => $service->title,
            ':namespace' => $service->namespace,
            ':version'   => $service->version,
            ':slug'      => "'service:{$service->slug}'",
            ':content'   => $html->render(),
        ]);
    }

    private function writeThemeFile($name, array $data = null)
    {
        if (is_array($name)) {
            list($in, $out) = $name;
        } else {
            $in = $out = $name;
        }

        fwrite(STDOUT, "Writing theme file: {$out}.\n");
        if ($data) {
            $content = strtr(file_get_contents("{$this->themeSource}/{$in}"), $data);
            return (bool) file_put_contents("{$this->outputDir}/theme/{$out}", $content);
        } else {
            return copy("{$this->themeSource}/{$in}", "{$this->outputDir}/theme/{$out}");
        }
    }
}