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
use TokenReflection\Broker;
use TokenReflection\ReflectionBase;
use TokenReflection\ReflectionFunction;
use TokenReflection\ReflectionMethod;

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

    /** @var string */
    private $baseUrl;

    /** @var string[] */
    private $quickLinks;

    /** @var string[] */
    private $sources;

    /** @var bool[][][] */
    private $issues = [];

    /** @var bool Enables writing of build-issues.log file when set. */
    private $issueLoggingEnabled;

    /** @var array Printable error names for build-issues.log file */
    private static $ERROR_PRINT_NAMES =[
        E_ERROR              => 'Error',
        E_WARNING            => 'Warning',
        E_PARSE              => 'Parse Error',
        E_NOTICE             => 'Notice',
        E_CORE_ERROR         => 'Core Error',
        E_CORE_WARNING       => 'Core Warning',
        E_COMPILE_ERROR      => 'Compile Error',
        E_COMPILE_WARNING    => 'Compile Warning',
        E_USER_ERROR         => 'User Error',
        E_USER_WARNING       => 'User Warning',
        E_USER_NOTICE        => 'User Notice',
        E_STRICT             => 'Strict Notice',
        E_RECOVERABLE_ERROR  => 'Recoverable Error'
    ];

    public function __construct(
        ApiProvider $provider,
        $outputDir,
        $template,
        $baseUrl,
        array $quickLinks,
        array $sources,
        $issueLoggingEnabled = false
    ) {
        $this->apiProvider = $provider;
        $this->outputDir = $outputDir;
        $this->template = $template;
        $this->baseUrl = $baseUrl;
        $this->quickLinks = $quickLinks;
        $this->sources = $sources;
        $this->issueLoggingEnabled = $issueLoggingEnabled;
    }

    public function build()
    {
        $this->skipMembers = new \SplObjectStorage();
        fwrite(STDOUT, "Parsing available service API versions...\n");
        // Collect versions
        $services = [];
        $aliases = [];

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
                $title = isset($service->shortTitle) && $service->shortTitle !== ''
                    ? $service->shortTitle
                    : $service->title;

                if (isset($services[$title][$version])) {
                    if (empty($aliases[$title][$version])) {
                        $aliases[$title][$version] = [];
                    }
                    $aliases[$title][$version] []= $alias;
                    continue;
                }
                $examples = $this->loadExamples($name, $version);
                $this->renderService($service, $examples);
                $services[$title][$version] = $service;
            }
        }

        uasort($services, function($a, $b) {
            $serviceA = current($a);
            $serviceB = current($b);
            return strcasecmp($serviceA->namespace, $serviceB->namespace);
        });
        $this->updateHomepage($services);
        $this->updateClients($services);
        $this->updateExceptions($services);
        $this->updateAliases($services, $aliases);
        $this->updateSitemap();
        $this->updateSearch($services);
        if ($this->issueLoggingEnabled) {
            $this->updateIssues();
        }
    }

    private function updateHomepage(array $services)
    {
        $this->updateServiceTable($services);
        $this->updateQuickLinks($services);
    }

    private function updateServiceTable(array $services)
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

    private function updateQuickLinks(array $services)
    {
        fwrite(STDOUT, "Updating homepage quick links\n");

        // Determine which services in the provided array should have a quick link
        $services = array_filter($services, function (array $versions) {
            return 0 < count(array_filter($versions, function (Service $service) {
                return in_array($service->name, $this->quickLinks);
            }));
        });

        // Drop all but the latest version of each service from the array
        $services = array_map(function (array $versions) {
            return array_shift($versions);
        }, $services);

        $serviceMap = [];
        foreach ($services as $service) {
            $isOlderVersion = isset($serviceMap[$service->name]) &&
                $service->version < $serviceMap[$service->name]->version;
            if ($isOlderVersion) {
                continue;
            }
            $serviceMap[$service->name] = $service;
        }
        $services = array_values($serviceMap);

        // Sort the services in the order provided in the config
        usort($services, function (Service $a, Service $b) {
            return array_search($a->name, $this->quickLinks)
                - array_search($b->name, $this->quickLinks);
        });

        // Build up the quick links for the home page
        $quickLinks = '';
        foreach ($services as $service) {
            $title = $service->shortTitle ?: $service->title;
            $quickLinks .= <<<EOT
<div class="col-md-3">
    <a class="btn btn-default btn-lg btn-block lead" href="{$service->serviceLink}" role="button">
        <span class="awsicon awsicon-{$service->name}"></span> {$title}
    </a>
</div>

EOT;
        }

        $this->replaceInner('index', $quickLinks, ':quickLinks:');
    }

    private function updateIssues()
    {
        $text = '';
        foreach ($this->issues as $level=>$levelIssues) {
            foreach ($levelIssues as $serviceName => $versions) {
                foreach ($versions as $serviceVersion => $messages) {
                    foreach (array_keys($messages) as $message) {
                        if (!empty($text)) {
                            $text .= PHP_EOL;
                        }
                        $levelName = isset(DocsBuilder::$ERROR_PRINT_NAMES[$level])
                            ? DocsBuilder::$ERROR_PRINT_NAMES[$level]
                            : 'Unknown';

                        $text .= '[' . date("Y-m-d H:i:s (T)") . '] '
                            . '[' . $levelName . '] '
                            . $serviceName . '-' . $serviceVersion
                            . ': ' . $message;
                    }
                }
            }
        }

        return (bool) file_put_contents("{$this->outputDir}/build-issues.log", $text);
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
            $html->append($this->createHtmlForOperation(
                $service,
                $opName,
                $operation,
                isset($examples[$opName]) ? $examples[$opName] : []
            ));
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
                $shortened = strpos($shortened, '.') === false
                    ? $shortened
                    : substr($shortened, 0, strpos($shortened, '.') + 1);
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
        try {
            return \Aws\load_compiled_json($path)['examples'];
        } catch (\InvalidArgumentException $e) {
            return [];
        }
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
                $html .= "<li>";
                $html .= "<p><a href=\"{$sv->serviceLink}\">{$sv->version} {$latest}</a></p>";
                $html .= "<ul class=\"container-fluid\">";
                foreach (array_keys($sv->api->getOperations()) as $operation) {
                    $html .= "<div class=\"col-xs-12 col-md-6 col-lg-4\">";
                    $html .= "<a href=\"{$sv->serviceLink}#" . strtolower($operation) ."\">$operation</a>";
                    $html .= "</div>";
                }
                $html .= "</ul>";
                $html .= "</li>";
                $latest = '';
            }
            $html .= '</ul></div>';
            $this->replaceInner($service->clientLink, $html, '<!-- api -->');
        }
    }

    private function updateExceptions(array $services)
    {
        fwrite(STDOUT, "Updating exception pages with modeled exception data...\n");

        foreach ($services as $versions) {
            krsort($versions);
            $service = reset($versions);
            $shapes = $service->api->getErrorShapes();
            if (count($shapes) > 0) {
                $html = new HtmlDocument;
                $html->section(2, 'Expected Exception Codes');
                $desc = <<<EOT
The following are the known exception codes and corresponding data shapes that 
this service may return as part of an error response. 
EOT;
                $html->elem('div', null, $desc);
                foreach ($shapes as $shape) {
                    if ($shape['type'] == 'structure'
                        && !isset($this->skipMembers[$shape])
                    ) {
                        $html->section(3, $shape->getName(), 'shape', 'method-title');

                        // Add error syntax
                        $outputShapes = new ShapeIterator($shape, $service->docs);
                        $outputExample = new ExampleBuilder($shape->getName(), false);
                        foreach ($outputShapes as $outputShape) {
                            $outputExample->addShape($outputShape);
                        }
                        $html->elem('pre', null, htmlentities($outputExample->getCode()));

                        // Add member details
                        $html->append($this->renderShape($service->docs, $shape));
                    }
                }
                $this->replaceInner($service->exceptionLink, $html->render(), '<!-- modeled_exceptions -->');
            }
        }
    }

    private function updateAliases(array $services, array $compatibleVersions)
    {
        fwrite(STDOUT, "Updating redirects for forward-compatible service versions\n");

        foreach ($compatibleVersions as $service => $aliasedVersions) {
            foreach ($aliasedVersions as $version => $aliases) {
                $redirectPage = <<<EOHTML
<!DOCTYPE html>
<html>
<head>
   <!-- HTML meta refresh URL redirection -->
   <meta
       http-equiv="refresh"
       content="0; url={$services[$service][$version]->serviceLink}">
</head>
</html>
EOHTML;
                foreach ($aliases as $alias) {
                    $redirectFrom = str_replace($version, $alias, $services[$service][$version]->serviceLink);
                    file_put_contents("{$this->outputDir}/$redirectFrom", $redirectPage);
                }
            }
        }
    }

    private function updateSearch(array $services)
    {
        fwrite(STDOUT, "Updating search index\n");

        $broker = new Broker(new Broker\Backend\Memory());
        foreach ($this->sources as $sourceFile) {
            $broker->processFile($sourceFile);
        }
        $index = array_merge(
            $this->getServiceAutocompleteIndex($services),
            $this->getClassAutocompleteIndex($broker),
            $this->getFunctionAutocompleteIndex($broker)
        );
        $jsonIndex = json_encode($this->utf8Encode($index));
        $js = <<<EOJS
var AWS = AWS || {};
AWS.searchIndex = $jsonIndex;
EOJS;

        file_put_contents("{$this->outputDir}/searchIndex.js", $js);
    }

    private function utf8Encode($mixed)
    {
        if (is_array($mixed)) {
            return array_map([$this, 'utf8Encode'], $mixed);
        } elseif (is_string($mixed)) {
            return utf8_encode($mixed);
        } elseif (empty($mixed)) {
            return '';
        }

        throw new \InvalidArgumentException('Expecting string or array, got ' . gettype($mixed));
    }

    private function getServiceAutocompleteIndex(array $services)
    {
        $autoComplete = [];

        // Drop all but the latest version of each service from the array
        $services = array_map(function (array $versions) {
            return array_shift($versions);
        }, $services);
        // Add operations from latest version of each service to autocomplete index
        foreach ($services as $service) {
            foreach ($service->api->getOperations() as $operation => $def) {
                $autoComplete []= [
                    'name' => $service->namespace . '::' . lcfirst($operation),
                    'match' => $operation,
                    'link' => $service->serviceLink . '#' . strtolower($operation),
                    'description' => strip_tags($service->docs->getOperationDocs($operation)),
                ];
            }
        }

        return $autoComplete;
    }

    private function getClassAutocompleteIndex(Broker $broker)
    {
        $methodsToSkip = $this->getMethodsToSkip();

        $autoComplete = [];
        $classes = array_filter(
            array_values($broker->getClasses()),
            [$this, 'filterVisible']
        );
        foreach ($classes as $class) {
            // Add class to autocomplete index
            $autoComplete []= [
                'name' => $class->getName(),
                'match' => $class->getShortName(),
                'link' => 'class-' . str_replace('\\', '.', $class->getName()) . '.html',
                'description' => $this->shiftDocCommentLine($class->getDocComment()),
            ];

            $methods = array_filter(
                $class->getOwnMethods(\ReflectionMethod::IS_PUBLIC|\ReflectionMethod::IS_PROTECTED),
                [$this, 'filterVisible']
            );

            // Skip over methods implementing base interfaces or that start with
            // an underscore
            $methods = array_filter($methods, function (ReflectionMethod $method) use ($methodsToSkip) {
                $name = $method->getName();
                return !in_array($name, $methodsToSkip)
                    && $name{0} !== '_';
            });

            foreach ($methods as $method) {
                $autoComplete []= [
                    'name' => $class->getName() . '::' . $method->getName(),
                    'match' => $method->getName(),
                    'link' => 'class-' . str_replace('\\', '.', $class->getName()) . '.html'
                        . '#_' . $method->getName(),
                    'description' => '',
                ];
            }
        }

        return $autoComplete;
    }

    private function getMethodsToSkip()
    {
        $interfacesToSkip = [
            '\\ArrayAccess',
            '\\Countable',
            '\\Iterator',
            '\\IteratorAggregate',
            '\\JsonSerializable',
            '\\Serializable',
        ];


        $methodsToSkip = [];
        foreach ($interfacesToSkip as $interfaceToSkip) {
            $methodsToSkip = array_merge(
                $methodsToSkip,
                array_map(function (\ReflectionMethod $method) {
                    return $method->getName();
                }, (new \ReflectionClass($interfaceToSkip))->getMethods())
            );
        }

        return $methodsToSkip;
    }

    private function getFunctionAutocompleteIndex(Broker $broker)
    {
        $functions = array_filter(
            array_values($broker->getFunctions()),
            [$this, 'filterVisible']
        );

        return array_map(function (ReflectionFunction $function) {
            return [
                'name' => $function->getName(),
                'match' => $function->getShortName(),
                'link' => 'function-' . str_replace('\\', '.', $function->getName()) . '.html',
                'description' => $this->shiftDocCommentLine($function->getDocComment()),
            ];
        }, $functions);
    }

    private function filterVisible(ReflectionBase $reflected)
    {
        $annotations = $reflected->getAnnotations();

        return empty($annotations['internal'])
            && empty($annotations['deprecated']);
    }

    private function shiftDocCommentLine($comment)
    {
        $comment = array_map(function ($line) {
            return ltrim($line, '/* ');
        }, explode("\n", $comment));
        $comment = array_filter($comment, function ($line) {
            return !empty($line);
        });

        return array_shift($comment);
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
            $eventStreamExample = null;
            foreach ($outputShapes as $shape) {
                if (!empty($shape['eventstream'])) {
                    $eventStreamExample = new EventStreamExampleBuilder($shape['param']);
                }
            }
            $outputExample = new ExampleBuilder($name, false);
            foreach ($outputShapes as $shape) {
                $outputExample->addShape($shape);
                if ($eventStreamExample) {
                    $eventStreamExample->addShape($shape);
                }
            }
            $html->elem('pre', null, htmlentities($outputExample->getCode()))
                ->elem('h4', null, 'Result Details')
                ->append($this->renderShape($service->docs, $output, false));
            if ($eventStreamExample) {
                $desc = <<<EOT
To use an EventParsingIterator, you will need to loop over the events it will
generate and check the top-level field to determine which type of event it is.
EOT;

                $html->elem('h5', null, 'Using an EventParsingIterator')
                    ->elem('p', null, $desc)
                    ->elem('pre', null, htmlentities($eventStreamExample->getCode()));
            }
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
                        ->open('p')
                            ->elem(
                                'a',
                                [
                                    'href' => $service->exceptionLink . '#shape-'
                                        . strtolower($error->getName())
                                ],
                                $error['name'] . ': ')
                            ->elem('p', null, $desc)
                        ->close()
                    ->close();
            }
            $html->close();
        }

        // Examples
        if (!empty($examples)) {
            $generator = new CodeSnippetGenerator($service->api);
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
                $html->elem('pre', null, $generator->generateInput(
                    $name, 
                    isset($example['input']) ? $example['input'] : [], 
                    isset($comments['input']) ? $comments['input'] : []
                ));
                if (isset($example['output'])) {
                    $html->elem('p', null, 'Result syntax:');
                    $html->elem('pre', null, $generator->generateOutput(
                        $name, 
                        $example['output'], 
                        isset($comments['output'])
                            ? $comments['output']
                            : []
                    ));
                }
            }

            $generatorIssues = $generator->getIssues();
            foreach ($generatorIssues as $shapeName => $levelIssues) {
                foreach ($levelIssues as $level => $messages) {
                    foreach (array_keys($messages) as $message) {
                        $generatorIssues[$shapeName][$level][$message] = $name;
                    }
                }
            }
            $this->logIssues(
                $service->api->getServiceName(),
                $service->api->getApiVersion(),
                $generatorIssues
            );
        }

        $html->close(); // operation-container

        return $html;
    }

    private function logIssues($serviceName, $serviceVersion, $issuesToLog)
    {
        if (!isset($this->issues[$serviceName][$serviceVersion])) {
            $this->issues[$serviceName][$serviceVersion] = [];
        }

        foreach ($issuesToLog as $shapeName=>$shapeIssues) {
            foreach ($shapeIssues as $level => $messages) {
                foreach ($messages as $message => $exampleName) {
                    $this->issues[$level][$serviceName][$serviceVersion][
                        $exampleName . ' has an issue - '
                        . $message . ' on ' . $shapeName
                    ] = true;
                }
            }
        }
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
            $required = !empty($shape['required'])
                && in_array($name, $shape['required']);
            $html->append($this->describeParam($member, $required));
            $desc = $docs->getShapeDocs($member['name'], $shape['name'], $name);
            $html->elem('div', 'param-def-doc', $desc);
            $html->close();
        }

        $html->close();
        $html->close();

        return $html;
    }

    private function describeParam(AbstractModel $member, $required = false)
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
            $typeDesc = $this->getPrimitivePhpType($member);
        }

        $html->open('div', 'param-attributes')->open('ul');
        if ($required) {
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
            if (!empty($member['eventstream'])) {
                return $this->getEventStreamMemberText($member);
            }
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

        return $this->getPrimitivePhpType($member);
    }

    private function getEventStreamMemberText(StructureShape $member)
    {
        return 'EventParsingIterator supplying the following structures: '
            . implode(', ',
                array_map(
                    [$this, 'memberLink'],
                    array_reduce(
                        $member->getMembers(),
                        function ($carry, $item) {
                            $carry []= $item['name'];
                            return $carry;
                        },
                        []
                    )
                )
            );
    }

    private function getPrimitivePhpType($member)
    {
        switch ($member['type']) {
            case 'long': return 'long (int|float)';
            case 'integer': return 'int';
            case 'blob': return 'blob (string|resource|Psr\Http\Message\StreamInterface)';
            case 'char': return 'char (string)';
            case 'timestamp': return 'timestamp (string|DateTime or anything parsable by strtotime)';
            case 'string':
                if ($member['jsonvalue']){
                    return 'string (string|number|array|map or anything parsable by json_encode)';
                }
            default: return $member['type'];
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

    private function updateSitemap()
    {
        fwrite(STDOUT, "Updating sitemap\n");

        $writer = new \SimpleXMLElement("<urlset></urlset>");
        $writer->addAttribute('xmlns', "http://www.sitemaps.org/schemas/sitemap/0.9");

        $linksToIndex = new \GlobIterator("{$this->outputDir}/*.html", \FilesystemIterator::CURRENT_AS_FILEINFO);
        foreach ($linksToIndex as $link) {
            $url = $writer->addChild('url');
            $url->addChild('loc', "{$this->baseUrl}{$link->getBasename()}");
        }

        $writer->asXML("{$this->outputDir}/sitemap.xml");
    }
}
