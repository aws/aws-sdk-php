<?php

use Aws\Api\ApiProvider;

/**
 * Emits `@method` + `@phpstan-method` docblock annotations for AWS service
 * client classes.
 *
 * For each operation on a client, we emit:
 *   1. A legacy `@method` line (unchanged from the original generator) —
 *      PhpStorm and IDEs that don't parse `@phpstan-*` continue to see the
 *      familiar signature.
 *   2. A paired `@phpstan-method` line carrying an array-shape parameter
 *      built from the operation's input in api-2.json. PHPStan and Psalm
 *      read this tag; PhpStorm ignores it entirely (so its parser doesn't
 *      trip on array shapes it doesn't understand).
 *
 * Pairing invariant: every legacy `@method` must have a matching
 * `@phpstan-method`. When an operation has no modeled input (or its input
 * shape is empty), we still emit the unsealed empty shape `array{...}` so
 * consumers and static-analysis tools see a uniform surface across all
 * operations.
 */
class ClientAnnotator
{
    /**
     * Strip pattern for generated annotations. Matches the start line of
     * any annotation this generator produces. Both single-line `@method`
     * and multi-line `@phpstan-method` are covered.
     *
     * The character class `[ <(]` after the return type allows matching:
     *   * @method \Aws\Result foo(...)
     *   * @phpstan-method \Aws\Result<array{...
     *   * @phpstan-method \Aws\Result foo(array{
     */
    private const GENERATED_ANNOTATION_PATTERN =
        '/^\* @(?:phpstan-)?method (\\\\Aws\\\\Result|\\\\GuzzleHttp\\\\Promise\\\\Promise)[ <(]/';

    /** @var ReflectionClass */
    private $reflection;

    /** @var ReflectionClass|null */
    private $reflectionInterface;

    /** @var string */
    private $endpoint;

    /** @var string[] */
    private $versions;

    /** @var array */
    private $methods;

    /** @var array */
    private $aliases;

    /**
     * Per-version cache of formatters. Built lazily when the first
     * `@phpstan-method` annotation is emitted for that version.
     *
     * @var array<string, PhpstanShapeFormatter>
     */
    private $formatters = [];

    /**
     * Per-version cache of reverse-alias maps (SDK method name ->
     * server-side operation name). Used to look up the operation entry in
     * api-2.json when the SDK method has been renamed.
     *
     * @var array<string, array<string, string>>
     */
    private $reverseAliasMaps = [];


    public function __construct($clientClassName)
    {
        $this->reflection = new ReflectionClass($clientClassName);
        $this->reflectionInterface = null;
        // Check if client has an interface
        $interfaceName = $clientClassName . 'Interface';
        if (interface_exists($interfaceName)) {
            $this->reflectionInterface = new ReflectionClass($interfaceName);
        }

        $this->aliases = \Aws\load_compiled_json(__DIR__ . '/../src/data/aliases.json');
    }

    /**
     * Adds @method + @phpstan-method annotations to a client class.
     *
     * @return bool TRUE on success, FALSE on failure
     */
    public function updateApiMethodAnnotations()
    {
        $updater = new ClassAnnotationUpdater(
            $this->reflection,
            $this->getMethodAnnotations(),
            $this->getDefaultDocComment(),
            self::GENERATED_ANNOTATION_PATTERN
        );

        if ($this->reflectionInterface !== null) {
            $interfaceUpdater = new ClassAnnotationUpdater(
                $this->reflectionInterface,
                $this->getMethodAnnotations(),
                $this->getDefaultDocComment(),
                self::GENERATED_ANNOTATION_PATTERN
            );

            return $interfaceUpdater->update() && $updater->update();
        }

        return $updater->update();
    }

    /**
     * Returns the list of docblock lines to emit. Each operation produces
     * a `@method` line (for PhpStorm + runtime baseline) immediately
     * followed by a `@phpstan-method` line (or lines, for multi-line
     * shapes) carrying the input array shape (for PHPStan/Psalm). When
     * the operation has no modeled input, we fall back to `array{...}`
     * so the pair invariant always holds.
     */
    private function getMethodAnnotations()
    {
        $annotations = [];
        $latestVersion = $this->getLatestVersion();

        foreach ($this->getMethods() as $command => $apiVersions) {
            $commandMethods = [
                $command => '\\Aws\\Result',
                "{$command}Async" => '\\GuzzleHttp\\Promise\\Promise',
            ];

            // Look up the input shape once per operation. Both the sync
            // and async variants share the same input.
            //
            // When the operation has no modeled input (`input` key absent
            // from api-2.json, e.g. AutoScaling::DescribeAdjustmentTypes,
            // Acm::GetAccountConfiguration) or its input shape is empty,
            // we still emit a paired `@phpstan-method` carrying the
            // unsealed empty shape `array{...}`. Keeping the pair
            // invariant means downstream consumers and the sweep tool
            // never see a mixed `@method`/`@phpstan-method` surface.
            $inputShape = $this->resolveInputShape(
                $command,
                $latestVersion,
                $apiVersions
            );
            $renderedShape = ($inputShape !== null)
                ? $this->getFormatter($latestVersion)->formatInput($inputShape)
                : 'array{...}';
            if ($renderedShape === null) {
                // Formatter returned null for an exotic shape (e.g. an
                // input keyed to a non-structure type). Fall back to the
                // unsealed empty shape so the pair invariant still holds.
                $renderedShape = 'array{...}';
            }

            foreach ($commandMethods as $method => $returnType) {
                $annotations []= $this->getAnnotationLine(
                    $method,
                    $returnType,
                    $apiVersions
                );

                foreach ($this->getPhpstanAnnotationLines(
                    $method,
                    $returnType,
                    $renderedShape
                ) as $line) {
                    $annotations []= $line;
                }
            }
        }

        return $annotations;
    }

    private function getAnnotationLine($method, $return, array $versionsWithSupport)
    {
        $signature = lcfirst($method) . '(array $args = [])';
        $annotation = " * @method $return $signature";

        if ($versionsWithSupport !== $this->getVersions()) {
            $supportedIn = implode(', ', $versionsWithSupport);
            $annotation .= " (supported in versions $supportedIn)";
        }

        return $annotation;
    }

    /**
     * Render the paired `@phpstan-method` annotation lines for one method.
     * Returns one or more docblock lines: a single line for compact shapes,
     * or multiple lines (one per shape line) when the shape is multi-line.
     *
     * @return string[]
     */
    private function getPhpstanAnnotationLines(
        string $method,
        string $returnType,
        string $renderedShape
    ): array {
        $methodName = lcfirst($method);

        if (strpos($renderedShape, "\n") === false) {
            // Single-line shape: emit one line with the full annotation.
            return [
                " * @phpstan-method {$returnType} {$methodName}({$renderedShape} \$args = [])",
            ];
        }

        // Multi-line shape: emit the opener with the first shape line, then
        // continuation lines prefixed with ` * `, then the closing args
        // suffix appended to the last shape line.
        $shapeLines = explode("\n", $renderedShape);
        $first = array_shift($shapeLines);
        $last = array_pop($shapeLines);

        $lines = [];
        $lines[] = " * @phpstan-method {$returnType} {$methodName}({$first}";
        foreach ($shapeLines as $continuation) {
            $lines[] = ' * ' . $continuation;
        }
        $lines[] = ' * ' . $last . ' $args = [])';

        return $lines;
    }

    /**
     * Resolve the input shape name for a given SDK method against the
     * latest API version. Returns null when the operation isn't present
     * in the latest version (e.g. it lives only in older versions), when
     * the operation has no input, or when the input shape is missing
     * from the shapes map.
     *
     * @param string[] $apiVersions Versions where this operation exists
     */
    private function resolveInputShape(
        string $command,
        string $latestVersion,
        array $apiVersions
    ): ?string {
        // Operation only exists in older versions: skip rich annotation.
        if (!in_array($latestVersion, $apiVersions, true)) {
            return null;
        }

        $api = $this->getApiDefinition($latestVersion);
        $operations = $api['operations'] ?? [];
        $shapes = $api['shapes'] ?? [];

        // The SDK method name may be an alias of a different server-side
        // operation. Reverse the alias map to find the original name.
        $serverName = $this->reverseAlias($command, $latestVersion) ?? $command;
        // api-2.json operation names are PascalCase; SDK method names are
        // lcfirst'd. Normalise both directions defensively.
        $candidates = [
            ucfirst($serverName),
            $serverName,
        ];
        $foundName = null;
        foreach ($candidates as $c) {
            if (isset($operations[$c])) {
                $foundName = $c;
                break;
            }
        }
        if ($foundName === null) {
            return null;
        }

        $inputShape = $operations[$foundName]['input']['shape'] ?? null;
        if ($inputShape === null || !isset($shapes[$inputShape])) {
            return null;
        }

        return $inputShape;
    }

    private function getMethods()
    {
        if (empty($this->methods)) {
            $this->methods = [];

            foreach ($this->getVersions() as $version) {
                $methodsInVersion = array_keys(
                    $this->getApiDefinition($version)['operations']
                );

                $api = $this->getApiDefinition($version);
                $serviceId = !empty($api['metadata']['serviceId'])
                    ? $api['metadata']['serviceId']
                    : null;

                foreach ($methodsInVersion as $method) {

                    if (!empty($serviceId)
                        && !empty($this->aliases['operations'][$serviceId][$version][$method])
                    ) {
                        $method = $this->aliases['operations'][$serviceId][$version][$method];
                    }

                    if (empty($this->methods[$method])) {
                        $this->methods[$method] = [];
                    }

                    $this->methods[$method] []= $version;
                }
            }
        }

        return $this->methods;
    }

    private function getVersions()
    {
        if (empty($this->versions)) {
            $this->versions = ApiProvider::defaultProvider()
                ->getVersions($this->getEndpoint());

            // ensure that versions are always iterated from oldest to newest
            sort($this->versions);
        }

        return $this->versions;
    }

    private function getLatestVersion(): string
    {
        $versions = $this->getVersions();
        return end($versions);
    }

    private function getApiDefinition($version = 'latest')
    {
        $provider = ApiProvider::defaultProvider();
        return $provider('api', $this->getEndpoint(), $version);
    }

    /**
     * Reverse the alias map for the given version: SDK method name ->
     * original server-side operation name. Built lazily and cached.
     */
    private function reverseAlias(string $sdkMethod, string $version): ?string
    {
        if (!isset($this->reverseAliasMaps[$version])) {
            $api = $this->getApiDefinition($version);
            $serviceId = $api['metadata']['serviceId'] ?? null;
            $forward = ($serviceId !== null)
                ? ($this->aliases['operations'][$serviceId][$version] ?? [])
                : [];
            $this->reverseAliasMaps[$version] = array_flip($forward);
        }
        return $this->reverseAliasMaps[$version][$sdkMethod] ?? null;
    }

    private function getFormatter(string $version): PhpstanShapeFormatter
    {
        if (!isset($this->formatters[$version])) {
            $this->formatters[$version] = new PhpstanShapeFormatter(
                $this->getApiDefinition($version)
            );
        }
        return $this->formatters[$version];
    }

    private function getEndpoint()
    {
        if (empty($this->endpoint)) {
            $service = strtolower(
                preg_replace('/(MultiRegion)?Client$/', '', $this->reflection->getShortName())
            );

            $this->endpoint = Aws\manifest($service)['endpoint'];
        }

        return $this->endpoint;
    }

    private function getDefaultDocComment()
    {
        $serviceName = $this->getApiDefinition()['metadata']['serviceFullName'];
        switch ($this->reflection->getParentClass()->getShortName()) {
            case 'MultiRegionClient':
                return <<<EODC
/**
 * **{$serviceName}** multi-region client.
 *
 */
EODC;
            default:
                return <<<EODC
/**
 * **{$serviceName}** client.
 *
 */
EODC;
        }
    }
}
