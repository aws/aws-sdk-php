<?php

namespace Aws\Test\EndpointV2\Bdd;

use Aws\EndpointV2\Bdd\BddEvaluator;
use Aws\EndpointV2\Bdd\BddResultResolver;
use Aws\EndpointV2\Bdd\BddRuleset;
use Aws\EndpointV2\EndpointDefinitionProvider;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;
use Aws\Exception\UnresolvedEndpointException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

#[CoversClass(BddEvaluator::class)]
class BddEvaluatorTest extends TestCase
{
    private array $partitions;

    protected function set_up()
    {
        $this->partitions = EndpointDefinitionProvider::getPartitions();
    }

    /**
     * Ref table:
     *  - 1 / -1          : terminals (no match)
     *  - 2, 3, ...       : positive node refs (nodes[ref - 1])
     *  - -2, -3, ...     : complemented node refs (flip hi/lo)
     *  - 100_000_000+N   : result[N] (N=0 is the implicit no-match rule)
     *
     * @return array<string, array<int, mixed>>
     */
    public static function branchProvider(): array
    {
        // A BDD with one decision node over condition 0 (isSet(Region)):
        //   node 0: terminal [-1, 1, -1]
        //   node 1: [cond=0, hi=100_000_001, lo=100_000_002]
        //
        // With root = 2 (positive ref to node 1): true → result 1, false → result 2.
        // With root = -2 (complement): swap the branches.
        return [
            'positive ref + condition true follows high' => [
                2, ['Region' => 'us-east-1'], 'https://true.example',
            ],
            'positive ref + condition false follows low' => [
                2, [], 'https://false.example',
            ],
            'complement ref + condition true follows low' => [
                -2, ['Region' => 'us-east-1'], 'https://false.example',
            ],
            'complement ref + condition false follows high' => [
                -2, [], 'https://true.example',
            ],
        ];
    }

    #[DataProvider('branchProvider')]
    public function testTraversesBranchesCorrectly($root, $params, $expectedUrl)
    {
        $evaluator = $this->buildEvaluator(
            root: $root,
            nodes: [[-1, 1, -1], [0, 100_000_001, 100_000_002]],
            conditions: [$this->isSetCondition('Region')],
            results: [
                $this->endpointResult('https://true.example'),
                $this->endpointResult('https://false.example'),
            ],
            parameters: ['Region' => ['type' => 'string']]
        );

        $endpoint = $evaluator->evaluate($params);

        $this->assertInstanceOf(RulesetEndpoint::class, $endpoint);
        $this->assertSame($expectedUrl, $endpoint->getUrl());
    }

    public function testRootPointingStraightAtResultReturnsEndpoint()
    {
        $evaluator = $this->buildEvaluator(
            root: 100_000_001,
            nodes: [[-1, 1, -1]],
            conditions: [],
            results: [$this->endpointResult('https://direct.example')],
            parameters: []
        );

        $this->assertSame(
            'https://direct.example',
            $evaluator->evaluate([])->getUrl()
        );
    }

    public function testReachingTrueTerminalThrowsNoMatch()
    {
        $evaluator = $this->buildEvaluator(
            root: 2,
            nodes: [[-1, 1, -1], [0, 1, 100_000_001]],
            conditions: [$this->isSetCondition('Region')],
            results: [$this->endpointResult('https://only-on-false.example')],
            parameters: ['Region' => ['type' => 'string']]
        );

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Unable to resolve an endpoint');
        $evaluator->evaluate(['Region' => 'us-east-1']);
    }

    public function testReachingFalseTerminalThrowsNoMatch()
    {
        $evaluator = $this->buildEvaluator(
            root: 2,
            nodes: [[-1, 1, -1], [0, 100_000_001, -1]],
            conditions: [$this->isSetCondition('Region')],
            results: [$this->endpointResult('https://only-on-true.example')],
            parameters: ['Region' => ['type' => 'string']]
        );

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('Unable to resolve an endpoint');
        $evaluator->evaluate([]);
    }

    public function testErrorResultThrowsResolvedMessage()
    {
        $evaluator = $this->buildEvaluator(
            root: 2,
            nodes: [[-1, 1, -1], [0, 100_000_001, -1]],
            conditions: [$this->isSetCondition('Region')],
            results: [[
                'error' => 'No endpoint for region {Region}',
                'type' => 'error',
            ]],
            parameters: ['Region' => ['type' => 'string']]
        );

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('No endpoint for region eu-west-9');
        $evaluator->evaluate(['Region' => 'eu-west-9']);
    }

    public function testAssignedVariableCarriesAcrossConditions()
    {
        // Two nodes: first condition parses an ARN and assigns it, second
        // condition reads a field out of the assigned value. The BDD reaches
        // the endpoint result only if both conditions succeed on the same
        // traversal — which validates that assignment state survives between
        // node evaluations.
        $evaluator = $this->buildEvaluator(
            root: 2,
            nodes: [
                [-1, 1, -1],
                [0, 3, -1],     // node 1: cond 0 (parseArn) → node 2 else no-match
                [1, 100_000_001, -1], // node 2: cond 1 (stringEquals on parsed service)
            ],
            conditions: [
                [
                    'fn' => 'aws.parseArn',
                    'argv' => [['ref' => 'Bucket']],
                    'assign' => 'parsedArn',
                ],
                [
                    'fn' => 'stringEquals',
                    'argv' => [
                        ['fn' => 'getAttr', 'argv' => [['ref' => 'parsedArn'], 'service']],
                        's3',
                    ],
                ],
            ],
            results: [$this->endpointResult('https://matched.example')],
            parameters: ['Bucket' => ['type' => 'string']]
        );

        $endpoint = $evaluator->evaluate([
            'Bucket' => 'arn:aws:s3:us-east-1:123456789012:mybucket',
        ]);

        $this->assertSame('https://matched.example', $endpoint->getUrl());
    }

    public function testUnknownResultIndexThrows()
    {
        $evaluator = $this->buildEvaluator(
            root: 100_000_099,
            nodes: [[-1, 1, -1]],
            conditions: [],
            results: [],
            parameters: []
        );

        $this->expectException(UnresolvedEndpointException::class);
        $this->expectExceptionMessage('unknown result index 99');
        $evaluator->evaluate([]);
    }

    private function buildEvaluator(
        int $root,
        array $nodes,
        array $conditions,
        array $results,
        array $parameters
    ): BddEvaluator {
        $ruleset = new BddRuleset(
            [
                'parameters' => $parameters,
                'conditions' => $conditions,
                'results' => $results,
                'nodes' => BddFixtures::encodeNodes($nodes),
                'nodeCount' => count($nodes),
                'root' => $root,
            ],
            $this->partitions
        );

        return new BddEvaluator($ruleset, new BddResultResolver($ruleset));
    }

    private function isSetCondition(string $paramName): array
    {
        return [
            'fn' => 'isSet',
            'argv' => [['ref' => $paramName]],
        ];
    }

    private function endpointResult(string $url): array
    {
        return [
            'endpoint' => ['url' => $url],
            'type' => 'endpoint',
        ];
    }
}
