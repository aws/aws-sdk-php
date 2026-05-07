<?php

namespace Aws\Test\EndpointV2\Bdd;

use Aws\EndpointV2\Bdd\BddRuleset;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\Ruleset\RulesetParameter;
use Aws\EndpointV2\Ruleset\RulesetStandardLibrary;
use Aws\Exception\UnresolvedEndpointException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(BddRuleset::class)]
class BddRulesetTest extends TestCase
{
    private array $partitions;

    protected function set_up()
    {
        $this->partitions = EndpointDefinitionProvider::getPartitions();
    }

    public function testExposesParsedFields()
    {
        $ruleset = $this->buildRuleset([
            'parameters' => ['Region' => ['type' => 'string']],
            'conditions' => [['fn' => 'isSet', 'argv' => [['ref' => 'Region']]]],
            'results' => [$this->endpointResult('https://example')],
            'nodes' => BddFixtures::encodeNodes([
                [-1, 1, -1],
                [0, 100_000_001, -1],
            ]),
            'nodeCount' => 2,
            'root' => 2,
        ]);

        $this->assertSame(2, $ruleset->getRoot());
        $this->assertSame(
            [-1, 1, -1, 0, 100_000_001, -1],
            $ruleset->getNodes()
        );
        $this->assertCount(1, $ruleset->getConditions());
        $this->assertCount(1, $ruleset->getResults());
        $this->assertInstanceOf(
            RulesetStandardLibrary::class,
            $ruleset->standardLibrary
        );
    }

    public function testBuildsParametersAsRulesetParameterObjects()
    {
        $ruleset = $this->buildRuleset([
            'parameters' => [
                'Region' => ['type' => 'string', 'required' => true],
                'UseFIPS' => ['type' => 'boolean', 'default' => false],
            ],
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ]);

        $params = $ruleset->getParameters();

        $this->assertArrayHasKey('Region', $params);
        $this->assertArrayHasKey('UseFIPS', $params);
        $this->assertInstanceOf(RulesetParameter::class, $params['Region']);
        $this->assertSame('String', $params['Region']->getType());
        $this->assertSame('Boolean', $params['UseFIPS']->getType());
    }

    public function testParametersDefaultToEmptyWhenOmitted()
    {
        $ruleset = $this->buildRuleset([
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ]);

        $this->assertSame([], $ruleset->getParameters());
    }

    public function testApplyParameterDefaultsFillsMissingValues()
    {
        $ruleset = $this->buildRuleset([
            'parameters' => [
                'UseFIPS' => ['type' => 'boolean', 'default' => false],
                'Region' => ['type' => 'string'],
            ],
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ]);

        $params = ['Region' => 'us-east-1'];
        $ruleset->applyParameterDefaults($params);

        $this->assertSame(false, $params['UseFIPS']);
        $this->assertSame('us-east-1', $params['Region']);
    }

    public function testApplyParameterDefaultsLeavesProvidedValuesAlone()
    {
        $ruleset = $this->buildRuleset([
            'parameters' => [
                'UseFIPS' => ['type' => 'boolean', 'default' => false],
            ],
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ]);

        $params = ['UseFIPS' => true];
        $ruleset->applyParameterDefaults($params);

        $this->assertSame(true, $params['UseFIPS']);
    }

    public function testApplyParameterDefaultsValidatesProvidedType()
    {
        $ruleset = $this->buildRuleset([
            'parameters' => [
                'UseFIPS' => ['type' => 'boolean'],
            ],
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ]);

        $this->expectException(UnresolvedEndpointException::class);

        $params = ['UseFIPS' => 'not-a-boolean'];
        $ruleset->applyParameterDefaults($params);
    }

    /**
     * @return array<string, array<int, string>>
     */
    public static function missingRequiredKeyProvider(): array
    {
        return [
            'missing conditions' => ['conditions'],
            'missing results' => ['results'],
            'missing nodes' => ['nodes'],
            'missing root' => ['root'],
        ];
    }

    #[DataProvider('missingRequiredKeyProvider')]
    public function testThrowsWhenRequiredKeyIsMissing($missingKey)
    {
        $definition = [
            'parameters' => [],
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ];
        unset($definition[$missingKey]);

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage("missing `{$missingKey}`");

        new BddRuleset($definition, $this->partitions);
    }

    public function testDecodesNodesAccordingToNodeCount()
    {
        $encoded = BddFixtures::encodeNodes([
            [-1, 1, -1],
            [0, 5, -3],
            [1, 100_000_001, -1],
        ]);

        $ruleset = $this->buildRuleset([
            'conditions' => [],
            'results' => [],
            'nodes' => $encoded,
            'nodeCount' => 3,
            'root' => 1,
        ]);

        $this->assertCount(9, $ruleset->getNodes());
        $this->assertSame(5, $ruleset->getNodes()[4]);
    }

    public function testStandardLibraryIsWiredWithPartitions()
    {
        $ruleset = $this->buildRuleset([
            'conditions' => [],
            'results' => [],
            'nodes' => '',
            'nodeCount' => 0,
            'root' => 1,
        ]);

        // Only a library with access to partitions can resolve a region.
        $partitionResult = $ruleset->standardLibrary->partition('us-east-1');

        $this->assertIsArray($partitionResult);
        $this->assertArrayHasKey('name', $partitionResult);
    }

    private function buildRuleset(array $definition): BddRuleset
    {
        return new BddRuleset($definition, $this->partitions);
    }

    private function endpointResult(string $url): array
    {
        return [
            'endpoint' => ['url' => $url],
            'type' => 'endpoint',
        ];
    }
}
