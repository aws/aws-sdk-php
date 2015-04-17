<?php
namespace Aws\Build\Docs;

use Aws\Api\ApiProvider;
use Aws\Api\Operation;
use Aws\Api\Service as Api;

class DocsBuilder
{
    /** @var string HTML template to replace {{ contents }} */
    private $template;

    /** @var string */
    private $outputDir;

    /** @var ApiProvider */
    private $apiProvider;

    public function __construct(ApiProvider $provider, $outputDir, $template)
    {
        $this->apiProvider = $provider;
        $this->outputDir = $outputDir;
        $this->template = $template;
    }

    public function build()
    {
        fwrite(STDOUT, "Parsing available service API versions...\n");
        // Collect versions
        $services = [];

        foreach ($this->gatherServiceVersions() as $name => $versions) {
            foreach ($versions as $alias => $version) {
                if ($alias === 'latest') {
                    continue;
                }
                $service = new Service(
                    $name,
                    new Api($this->apiProvider, $name, $version),
                    new DocModel($this->apiProvider, $name, $version)
                );
                $this->renderService($service);
                $services[$service->title][$version] = $service;
            }
        }

        ksort($services, SORT_NATURAL | SORT_FLAG_CASE);
        $this->updateHomepage($services);
        $this->updateClients($services);
    }

    private function updateHomepage(array $services)
    {
        fwrite(STDOUT, "Building homepage service table\n");
        // Build up the list of services for the homepage.
        $servicesTable = '';

        foreach ($services as $versions) {
            krsort($versions);
            $service = reset($versions);
            $servicesTable .= "<tr><td><a href=\"{$service->serviceLink}\">{$service->title}</a></td>";
            $servicesTable .= "<td><a href=\"{$service->clientLink}\">{$service->client}</a></td>";
            $servicesTable .= "<td><ul class=\"list-unstyled\">";
            $latest = count($versions) > 1 ? ' (latest)' : '';
            foreach ($versions as $sv) {
                $servicesTable .= "<li><a href=\"{$sv->serviceLink}\">{$sv->version} {$latest}</a></li>";
                $latest = '';
            }
            $servicesTable .= "</ul></td></tr>";
        }

        $this->replaceInner('index', $servicesTable, ':services:');
    }

    private function renderService(Service $service)
    {
        $html = new HtmlDocument;
        $html->open('div', 'page-header');
        $html->elem('h1', null, "$service->fullTitle <small>{$service->version}</small>");
        $html->close();
        $metadata = <<<EOT
<dd><strong>Client:</strong> <a href="{$service->clientLink}">{$service->client}</a></dd>
<dd><strong>Service ID:</strong> {$service->name}</dd>
<dd><strong>Version:</strong> {$service->version}</dd>
EOT;
        $html->elem('dl', 'tree well', $metadata);
        $desc = <<<EOT
This page describes the parameters and results for the operations of the
{$service->fullTitle}, and shows how to use the <a href="{$service->clientLink}">{$service->client}</a>
object to call the described operations. This documentation is specific to the
{$service->version} API version of the service.
EOT;
        $html->elem('p', null, $desc);
        $html->elem('h2', null, 'Operation Summary');
        $desc = <<<EOT
Each of the following operations can be created from a client using
<code>\$client-&gt;getCommand('CommandName')</code>, where "CommandName" is the
name of one of the following operations. Note: a command is a value that
encapsulates an operation and the parameters used to create an HTTP request.
EOT;
        $html->elem('p', null, $desc);
        $desc = <<<EOT
You can also create and send a command immediately using the magic methods
available on a client object: <code>\$client-&gt;commandName(/* parameters */)</code>.
You can send the command asynchronously (returning a promise) by appending the
word "Async" to the operation name: <code>\$client-&gt;commandNameAsync(/* parameters */)</code>.
EOT;
        $html->elem('p', null, $desc);
        $html->append($this->createHtmlForToc($service, $service->api->getOperations()));

        $this->createHtmlForPaginators($html, $service->api);
        $this->createHtmlForWaiters($html, $service->api);

        $html->section(2, 'Operations');
        foreach ($service->api->getOperations() as $opName => $operation) {
            $html->append($this->createHtmlForOperation($service, $opName, $operation));
        }
        $html->close();


        $this->writeThemeFile($service->serviceLink, $html->render());
    }

    private function createHtmlForToc(Service $service, array $operations)
    {
        $html = (new HtmlDocument)->open('ul', 'methods-summary');
        foreach ($operations as $opName => $operation) {
            $item = '<a class="method-summary-link" href="#' . $html->slug($opName)
                . '"><strong>' . "{$opName}</strong></a>";

            if ($description = $service->docs->getOperationDocs($opName)) {
                $shortened = strip_tags($description);
                $item .= '<div class="summary-info"><p>' . $shortened . '</p></div>';
            }

            $html->elem('li', null, $item);
        }
        $html->close();

        return $html;
    }

    private function createHtmlForOperation(Service $service, $name, Operation $operation)
    {
        $html = new HtmlDocument;

        // Name
        $html->section(3, $html->glyph('cog') . ' ' . $name, null, 'method-title');

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

    private function writeThemeFile($name, $contents)
    {
        $name = str_replace('.html', '', $name);
        $name .= '.html';
        fwrite(STDOUT, "Writing file: {$name}.\n");
        $html = str_replace('{{ contents }}', $contents, $this->template);
        return (bool) file_put_contents("{$this->outputDir}/{$name}", $html);
    }

    private function replaceInner($name, $replace, $search = '{{ contents }}')
    {
        $name = str_replace('.html', '', $name);
        fwrite(STDOUT, "Updating file: {$name}.\n");
        $path = "{$this->outputDir}/{$name}.html";
        $contents = file_get_contents($path);
        $contents = str_replace($search, $replace, $contents);
        file_put_contents($path, $contents);
    }

    private function gatherServiceVersions()
    {
        $manifest = __DIR__ . '/../../../src/data/version-manifest.json';

        return json_decode(file_get_contents($manifest), true);
    }

    private function updateClients(array $services)
    {
        fwrite(STDOUT, "Updating client pages with service links\n");

        foreach ($services as $versions) {
            krsort($versions);
            $service = reset($versions);
            $html = '<h2>Supported API Versions</h2>';
            $html .= <<<EOT
<p>This class uses a <em>service description model</em> that is associated at
runtime based on the <code>version</code> option given when constructing the
client. The <code>version</code> option will determine which API operations,
waiters, and paginators are available for a client. Creating a command or a
specific API operation can be done using magic methods (e.g.,
<code>\$client->commandName(/** parameters */)</code>, or using the
<code>$\client->getCommand</code> method of the client.</p>
EOT;

            $html .= '<div class="element-summary"><ul>';
            $latest = count($versions) > 1 ? ' (latest)' : '';
            foreach ($versions as $sv) {
                $html .= "<li><a href=\"{$sv->serviceLink}\">{$sv->version} {$latest}</a></li>";
                $latest = '';
            }
            $html .= '</ul></div>';
            $this->replaceInner($service->clientLink, $html, '<!-- api -->');
        }
    }

    private function createHtmlForWaiters(HtmlDocument $html, Api $service)
    {
        $waiters = $service->getWaiters();

        if (!$waiters) {
            return;
        }

        $desc = <<<EOT
Waiters allow you to poll a resource until it enters into a desired state.
A waiter has a name used to describe what it does, and is associated with an
API operation. When creating a waiter, you can provide the API operation
parameters associated with the corresponding operation. Waiters can be
accessed using the <a href="class-Aws.AwsClientInterface.html#_getWaiter">
getWaiter(\$waiterName, \$operationParameters)</a> method of a client object.
This client supports the following waiters:
EOT;

        $html->section(2, 'Waiters');
        $html->open('div', 'element-summary');
            $html->elem('p', null, $desc);
            $html->open('table', 'table table-condensed');
                $html->open('thead');
                    $html->open('tr');
                        $html->elem('th', null, 'Waiter name');
                        $html->elem('th', null, 'API Operation');
                        $html->elem('th', null, 'Delay');
                        $html->elem('th', null, 'Max Attempts');
                    $html->close();
                $html->close();
                $html->open('tbody');
                    foreach ($waiters as $name => $config) {
                        $html->open('tr');
                            $html->elem('td', null, $name);
                            $html->elem('td', null, '<a href="#'
                                . strtolower($config['operation'])
                                . '">' . $config['operation'] . '</a>');
                            $html->elem('td', null, $config['delay']);
                            $html->elem('td', null, $config['maxAttempts']);
                        $html->close();
                    }
                $html->close();
            $html->close();
        $html->close();
        $html->close(); // Opening section
    }

    private function createHtmlForPaginators(HtmlDocument $html, Api $service)
    {
        $paginators = $service->getPaginators();

        if (!$paginators) {
            return;
        }

        $desc = <<<EOT
Paginators handle automatically iterating over paginated API results. Paginators
are associated with specific API operations, and they accept the parameters
that the corresponding API operation accepts. You can get a paginator from a
client class using <a href="class-Aws.AwsClientInterface.html#_getPaginator">
getPaginator(\$paginatorName, \$operationParameters)</a>. This client supports
the following paginators:
EOT;

        $html->section(2, 'Paginators');
        $html->open('div', 'element-summary');
            $html->elem('p', null, $desc);
            $html->open('ul');
                foreach ($paginators as $name => $config) {
                    $html->open('li');
                        $attr = ['href' => '#' . strtolower($name)];
                        $html->elem('a', $attr, $name);
                    $html->close();
                }
            $html->close();
        $html->close();
        $html->close(); // Opening section
    }
}
