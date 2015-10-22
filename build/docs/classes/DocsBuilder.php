<?php
namespace Aws\Build\Docs;

use Aws\Api\AbstractModel;
use Aws\Api\ApiProvider;
use Aws\Api\ListShape;
use Aws\Api\MapShape;
use Aws\Api\Operation;
use Aws\Api\Service as Api;
use Aws\Api\StructureShape;
use Aws\Api\DocModel;

/**
 * Builds documentation for a given service.
 *
 * @internal
 */
class DocsBuilder
{
    /** @var string HTML template to replace {{ contents }} */
    private $template;

    /** @var string */
    private $outputDir;

    /** @var ApiProvider */
    private $apiProvider;

    /** @var \SplObjectStorage Hash of members to skip when generating shape docs. */
    private $skipMembers;

    public function __construct(ApiProvider $provider, $outputDir, $template)
    {
        $this->apiProvider = $provider;
        $this->outputDir = $outputDir;
        $this->template = $template;
    }

    public function build()
    {
        $this->skipMembers = new \SplObjectStorage();
        fwrite(STDOUT, "Parsing available service API versions...\n");
        // Collect versions
        $services = [];

        foreach ($this->gatherServiceVersions() as $name => $data) {
            // Skip "latest"
            unset($data['versions']['latest']);
            $ns = $data['namespace'];
            foreach ($data['versions'] as $alias => $version) {
                list($api, $docModel) = call_user_func(
                    "Aws\\{$ns}\\{$ns}Client::applyDocFilters",
                    ApiProvider::resolve($this->apiProvider, 'api', $name, $version),
                    ApiProvider::resolve($this->apiProvider, 'docs', $name, $version)
                );
                $service = new Service($api, $docModel);
                $examples = $this->loadExamples($name, $version);
                $this->renderService($service, $examples);
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

    private function renderService(Service $service, $examples)
    {
        $html = new HtmlDocument;
        $html->open('div', 'page-header');
        $html->elem('h1', null, "$service->title <small>{$service->version}</small>");
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
            $html->append($this->createHtmlForOperation($service, $opName, $operation, $examples[$opName]));
        }

        $html->section(2, 'Shapes');
        $map = $service->api->getShapeMap();
        $keys = array_keys($service->api['shapes']);
        sort($keys);
        foreach ($keys as $name) {
            $shape = $map->resolve(['shape' => $name]);
            // Do not render top-level input or output shapes.
            if ($shape['type'] == 'structure'
                && !isset($this->skipMembers[$shape])
            ) {
                $html->section(3, $name, 'shape', 'method-title');
                $html->append($this->renderShape($service->docs, $shape));
            }
        }

        $this->writeThemeFile($service->serviceLink, $html->render());
    }

    private function createHtmlForToc(Service $service, array $operations)
    {
        $html = new HtmlDocument();
        $html->open('ul', 'methods-summary');
        foreach ($operations as $opName => $operation) {
            $item = '<a class="method-summary-link" href="#' . $html->slug($opName)
                . '"><strong>' . "{$opName}</strong> ( array \$params = [] )</a>";

            if ($description = $service->docs->getOperationDocs($opName)) {
                $shortened = strip_tags($description);
                $firstPeriod = strpos($shortened, '.') + 1;
                $shortened = substr($shortened, 0, $firstPeriod);
                $item .= '<div class="summary-info"><p>' . $shortened . '</p></div>';
            }

            $html->elem('li', null, $item);
        }
        $html->close();

        return $html;
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
        $manifest = __DIR__ . '/../../../src/data/manifest.json';

        return json_decode(file_get_contents($manifest), true);
    }

    private function loadExamples($name, $version)
    {
        $path = __DIR__ . "/../../../src/data/{$name}/{$version}/examples-1.json";

        return file_exists($path) ? json_decode(file_get_contents($path), true)['examples'] : [];
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

            $html .= '<div class="api-version-list element-summary"><ul>';
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
    }

    private function createHtmlForOperation(Service $service, $name, Operation $operation, $examples)
    {
        $html = new HtmlDocument;
        $html->open('div', 'operation-container');

        // Name
        $html->section(3, $html->glyph('cog') . ' ' . $name, null, 'method-title');

        // Code
        $html->elem(
            'pre',
            'opcode',
            '$result = $client-&gt;<code>' . lcfirst($name) . '</code>([/* ... */]);' . "\n"
            . '$promise = $client-&gt;<code>' . lcfirst($name) . 'Async</code>([/* ... */]);' . "\n"
        );

        // Description
        if ($description = $service->docs->getOperationDocs($name)) {
            $html->elem('div', 'operation-docs', $description);
        }

        // Parameters
        $input = $operation->getInput();
        $this->skipMembers->attach($input);
        $output = $operation->getOutput();
        $this->skipMembers->attach($output);

        $inputShapes = new ShapeIterator($input, $service->docs);
        $inputExample = new ExampleBuilder($name);
        foreach ($inputShapes as $shape) {
            $inputExample->addShape($shape);
        }

        $html
            ->elem('h4', null, 'Parameter Syntax')
            ->elem('pre', null, htmlentities($inputExample->getCode()))
            ->elem('h4', null, 'Parameter Details')
            ->append($this->renderShape($service->docs, $input, false));

        // Results
        $html->elem('h4', null, 'Result Syntax');

        if (!count($output->getMembers())) {
            $html->elem('pre', null, '[]');
            $html->elem('h4', null, 'Result Details');
            $html->elem('div', 'alert alert-info', 'The results for this operation are always empty.');
        } else {
            $outputShapes = new ShapeIterator($output, $service->docs);
            $outputExample = new ExampleBuilder($name, false);
            foreach ($outputShapes as $shape) {
                $outputExample->addShape($shape);
            }
            $html->elem('pre', null, htmlentities($outputExample->getCode()))
                ->elem('h4', null, 'Result Details')
                ->append($this->renderShape($service->docs, $output, false));
        }

        // Errors
        $html->elem('h4', null, 'Errors');
        $errors = $operation->getErrors();
        if (!$errors) {
            $html->elem('p', null, 'There are no errors described for this operation.');
        } else {
            $html->open('ul');
            foreach ($errors as $error) {
                $desc = $service->docs->getErrorDocs($error->getName())
                    ?: 'This error does not currently have a description.';
                $html
                    ->open('li')
                        ->elem('p', null, $error['name'] . ': ' . $desc)
                    ->close();
            }
            $html->close();
        }

        // Examples
        if (!empty($examples)) {
            $html->elem('h4', null, 'Examples');
            foreach ($examples as $number => $example) {
                $exampleNumber = $number + 1;
                $exampleId = $this->exampleSlug($name, $exampleNumber);
                $html->open('h5', ['id' => $exampleId]);
                $html->elem('span', null, 'Example ' . $exampleNumber . ': ' . $example['title']);
                $html->elem('a', ['href' => '#' . $exampleId], $html->glyph('link'));
                $html->close();
                $html->elem('p', null, $example['description']);
                $comments = $example['comments'];
                $input = new SharedExampleBuilder($example['input'], $name, $comments['input']);
                $html->elem('pre', null, $input->getCode());
                if (isset($example['output'])) {
                    $html->elem('p', null, 'Result syntax:');
                    $output = new SharedExampleBuilder($example['output'], $name, $comments['output'], false);
                    $html->elem('pre', null, $output->getCode());
                }
            }
        }

        $html->close(); // operation-container

        return $html;
    }

    private function renderShape(
        DocModel $docs,
        StructureShape $shape,
        $showTitle = true
    ) {
        $html = new HtmlDocument();

        $html->open('div', 'shape-container');

        // Disable show title for input and output parameters.
        if ($showTitle) {
            $desc = $docs->getShapeDocs($shape['name'], null, null);
            if ($desc) {
                $html->elem('h5', null, 'Description');
                $html->elem('div', 'shape-description', $desc);
            }
        }

        $html->elem('h5', null, 'Members');
        $html->open('dl', 'shape-members');

        $members = $shape->getMembers();
        ksort($members);
        foreach ($members as $name => $member) {
            $html->open('dt', 'param-def');
            $html->elem('a', ['href' => '#' . $this->memberSlug($name)], '');
            $html->elem('span', 'term', $name);
            $html->close();
            $html->open('dd', 'param-def');
                $html->append($this->describeParam($member));
                $desc = $docs->getShapeDocs($member['name'], $shape['name'], $name);
                $html->elem('div', 'param-def-doc', $desc);
            $html->close();
        }

        $html->close();
        $html->close();

        return $html;
    }

    private function describeParam(AbstractModel $member)
    {
        $html = new HtmlDocument();
        if ($member instanceof StructureShape) {
            $typeDesc = $this->getMemberText($member);
        } elseif ($member instanceof ListShape) {
            $typeDesc = 'Array of ' . $this->getMemberText($member->getMember()) . 's';
        } elseif ($member instanceof MapShape) {
            $typeDesc = 'Associative array of custom strings keys ('
                . $member->getKey()->getName() . ') to '
                . $this->getMemberText($member->getValue()) . 's';
        } else {
            $typeDesc = $this->getPrimitivePhpType($member['type']);
        }

        $html->open('div', 'param-attributes')->open('ul');
        if ($member['required']) {
            $html->elem('li', 'required', 'Required: Yes');
        }
        $html->elem('li', '', 'Type: ' . $typeDesc);
        $html->close();
        $html->close();

        return $html;
    }

    private function getMemberText(AbstractModel $member)
    {
        if ($member instanceof StructureShape) {
            return $this->memberLink($member->getName()) . ' structure';
        } elseif ($member instanceof ListShape) {
            switch ($member->getMember()['type']) {
                case 'string': return 'strings';
                case 'double': return 'floats';
                case 'integer': return 'integers';
                case 'boolean': return 'booleans';
                case 'structure': return $this->getMemberText($member->getMember()) . 's';
            }
        } elseif ($member instanceof MapShape) {
            switch ($member->getValue()['type']) {
                case 'string': return 'strings';
                case 'double': return 'floats';
                case 'integer': return 'integers';
                case 'boolean': return 'booleans';
                case 'structure': return $this->getMemberText($member->getValue()) . 's';
            }
        }

        return $this->getPrimitivePhpType($member['type']);
    }

    private function getPrimitivePhpType($type)
    {
        switch ($type) {
            case 'long': return 'long (int|float)';
            case 'integer': return 'int';
            case 'blob': return 'blob (string|resource|Psr\Http\Message\StreamInterface)';
            case 'char': return 'char (string)';
            case 'timestamp': return 'timesamp (string|DateTime or anything parsable by strtotime)';
            default: return $type;
        }
    }

    private function exampleSlug($name, $number)
    {
        return strtolower($name) . '-example-' . $number;
    }

    private function memberSlug($name)
    {
        return 'shape-' . strtolower($name);
    }

    private function memberLink($name)
    {
        return '<a href="#' . $this->memberSlug($name) . '">' . $name . '</a>';
    }
}
