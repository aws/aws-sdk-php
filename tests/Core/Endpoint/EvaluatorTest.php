<?php

declare(strict_types=1);

namespace Aws\Tests\Core\Endpoint;

use Smithy\Client\Endpoint\Bytecode\Bytecode;
use Smithy\Client\Endpoint\Bytecode\Evaluator;
use Smithy\Client\Endpoint\Bytecode\Opcodes;
use Smithy\Client\Endpoint\Bytecode\RulesEvaluationException;
use Smithy\Client\Endpoint\Bytecode\RulesFunctionInterface;
use PHPUnit\Framework\TestCase;

/**
 * Unit tests for {@see Evaluator}. Each test hand-crafts a minimal
 * {@see Bytecode} value to exercise a specific opcode class without
 * relying on the compiler.
 *
 * BDD encoding conventions (per the specification, matching smithy-java):
 *   - `nodes[0..2]` is a sentinel triple, never dereferenced.
 *   - Real nodes start at `nodes[3..5]` and are addressed with `ref = 2`.
 *   - `ref = ±1` are terminal true/false → treated as no-match.
 *   - `ref >= RESULT_OFFSET`: BDD result index `ref - RESULT_OFFSET`.
 *     BDD result index 0 is the implicit NoMatchRule; trait `results[0]`
 *     lives at BDD result index 1. Tests therefore use
 *     `RESULT_OFFSET + 1` for the first serialized result.
 *
 * The sentinel keeps `idx = |ref| - 1` valid: positive ref=1 is terminal,
 * so real refs start at 2, giving `idx = 1` (skipping physical slot 0).
 */
final class EvaluatorTest extends TestCase
{
    /** Sentinel node at physical slot 0 (never reached). */
    private const SENTINEL = [-1, 1, -1];

    /**
     * Trivial BDD: `if Region isSet then "https://foo.{Region}" else error`.
     */
    public function testMinimalBddResolves(): void
    {
        // Constants
        //   0: "https://foo."
        //   1: "Missing region"
        $constants = ['https://foo.', 'Missing region', null];

        // Code layout:
        //   result 0 program @ offset 0:
        //     LOAD_CONST 0           ; "https://foo."
        //     LOAD_REGISTER 0        ; region
        //     RESOLVE_TEMPLATE 2
        //     RETURN_ENDPOINT 0
        //   result 1 program @ offset 8:
        //     LOAD_CONST 1
        //     RETURN_ERROR
        $code = [
            Opcodes::LOAD_CONST, 0,
            Opcodes::LOAD_REGISTER, 0,
            Opcodes::RESOLVE_TEMPLATE, 2,
            Opcodes::RETURN_ENDPOINT, 0,
            Opcodes::LOAD_CONST, 1,
            Opcodes::RETURN_ERROR,
            Opcodes::LOAD_CONST, 2,
            Opcodes::RETURN_VALUE,
        ];

        // BDD: sentinel + one real node.
        //   node 1: condIdx=0, hi = trait result[0], lo = trait result[1].
        //   Encoded as BDD result indices 1 and 2 (index 0 is the
        //   implicit NoMatchRule, present at resultOffsets[0]).
        $nodes = [
            ...self::SENTINEL,
            0,
            Bytecode::RESULT_OFFSET + 1,
            Bytecode::RESULT_OFFSET + 2,
        ];

        $bc = new Bytecode(
            code: $code,
            constants: $constants,
            functions: [],
            registers: [
                ['name' => 'Region', 'builtIn' => 'AWS::Region', 'default' => null, 'required' => false, 'type' => 'string'],
            ],
            inputRegisterMap: ['Region' => 0],
            bddNodes: $nodes,
            bddRoot: 2,      // -> idx 1 (first real node)
            conditionOffsets: [0], // not exercised (fast-path handles it)
            resultOffsets: [11, 0, 8],
            conditionTypes: [Opcodes::COND_ISSET],
            conditionOperands: [0], // register 0
        );

        $ev = new Evaluator($bc);

        $endpoint = $ev->evaluate(['Region' => 'us-east-1']);
        $this->assertSame('https://foo.us-east-1', $endpoint->url);

        $this->expectException(RulesEvaluationException::class);
        $this->expectExceptionMessage('Missing region');
        $ev->evaluate([]);
    }

    /**
     * Verify COND_STRING_EQ_REG_CONST fast-path.
     */
    public function testStringEqualsFastPath(): void
    {
        $constants = [
            'us-east-1',
            'https://east/',
            'https://other/',
            null
        ];

        $code = [
            // result 0
            Opcodes::LOAD_CONST, 1,
            Opcodes::RETURN_ENDPOINT, 0,
            // result 1
            Opcodes::LOAD_CONST, 2,
            Opcodes::RETURN_ENDPOINT, 0,
            // implicit NoMatchRule
            Opcodes::LOAD_CONST, 3,
            Opcodes::RETURN_VALUE,
        ];

        $nodes = [
            ...self::SENTINEL,
            0,
            Bytecode::RESULT_OFFSET + 1, // trait result[0]
            Bytecode::RESULT_OFFSET + 2, // trait result[1]
        ];

        $bc = new Bytecode(
            code: $code,
            constants: $constants,
            functions: [],
            registers: [
                ['name' => 'Region', 'builtIn' => null, 'default' => null, 'required' => false, 'type' => 'string'],
            ],
            inputRegisterMap: ['Region' => 0],
            bddNodes: $nodes,
            bddRoot: 2,
            conditionOffsets: [0],
            resultOffsets: [8, 0, 4],
            conditionTypes: [Opcodes::COND_STRING_EQ_REG_CONST],
            // Packed: low 8 bits = register, upper bits = const index.
            conditionOperands: [(0 << 8) | 0],
        );

        $ev = new Evaluator($bc);
        $this->assertSame('https://east/', $ev->evaluate(['Region' => 'us-east-1'])->url);
        $this->assertSame('https://other/', $ev->evaluate(['Region' => 'us-west-2'])->url);
    }

    /**
     * Exercise a function call — a Region-suffix built via FN1.
     */
    public function testFunctionCall(): void
    {
        $suffixFn = new class implements RulesFunctionInterface {
            public function getName(): string { return 'testSuffix'; }
            public function getRegistryClass(): string { return self::class; }
            public function getArgumentCount(): int { return 1; }
            public function apply0(): mixed { return null; }
            public function apply1(mixed $a0): mixed
            {
                return $a0 === 'us-gov-west-1' ? 'amazonaws.us-gov' : 'amazonaws.com';
            }
            public function apply2(mixed $a0, mixed $a1): mixed { return null; }
            public function apply3(mixed $a0, mixed $a1, mixed $a2): mixed { return null; }
            public function apply(array $args): mixed { return $this->apply1($args[0]); }
        };

        $constants = ['https://lambda.', '.', null];
        $code = [
            // Result 0:
            //   LOAD_CONST 0           "https://lambda."
            //   LOAD_REGISTER 0        region
            //   LOAD_CONST 1           "."
            //   LOAD_REGISTER 0        region
            //   FN1 0                  suffixFn(region)
            //   RESOLVE_TEMPLATE 4
            //   RETURN_ENDPOINT 0
            Opcodes::LOAD_CONST, 0,
            Opcodes::LOAD_REGISTER, 0,
            Opcodes::LOAD_CONST, 1,
            Opcodes::LOAD_REGISTER, 0,
            Opcodes::FN1, 0,
            Opcodes::RESOLVE_TEMPLATE, 4,
            Opcodes::RETURN_ENDPOINT, 0,
            // implicit NoMatchRule
            Opcodes::LOAD_CONST, 2,
            Opcodes::RETURN_VALUE,
        ];

        $nodes = [
            ...self::SENTINEL,
            0,
            Bytecode::RESULT_OFFSET + 1, // trait result[0]
            -1,
        ];
        $bc = new Bytecode(
            code: $code,
            constants: $constants,
            functions: [$suffixFn],
            registers: [
                ['name' => 'Region', 'builtIn' => null, 'default' => null, 'required' => false, 'type' => 'string'],
            ],
            inputRegisterMap: ['Region' => 0],
            bddNodes: $nodes,
            bddRoot: 2,
            conditionOffsets: [0],
            resultOffsets: [14, 0],
            conditionTypes: [Opcodes::COND_ISSET],
            conditionOperands: [0],
        );

        $ev = new Evaluator($bc);
        $this->assertSame(
            'https://lambda.us-east-1.amazonaws.com',
            $ev->evaluate(['Region' => 'us-east-1'])->url,
        );
        $this->assertSame(
            'https://lambda.us-gov-west-1.amazonaws.us-gov',
            $ev->evaluate(['Region' => 'us-gov-west-1'])->url,
        );
    }

    /**
     * Ensure BDD complement bit (negative refs) inverts the condition.
     */
    public function testComplementedBddRef(): void
    {
        $constants = [
            'https://only-when-unset/',
            'https://only-when-set/',
            null
        ];

        $code = [
            // result 0 (unset path)
            Opcodes::LOAD_CONST, 0,
            Opcodes::RETURN_ENDPOINT, 0,
            // result 1 (set path)
            Opcodes::LOAD_CONST, 1,
            Opcodes::RETURN_ENDPOINT, 0,
            // implicit NoMatchRule
            Opcodes::LOAD_CONST, 2,
            Opcodes::RETURN_VALUE,
        ];

        // Node truth table (positive): isSet -> trait result[1]; unset -> trait result[0].
        // Root = -2 (complemented) flips the sense of the top-level test.
        $nodes = [
            ...self::SENTINEL,
            0,
            Bytecode::RESULT_OFFSET + 2, // set -> trait result[1]
            Bytecode::RESULT_OFFSET + 1, // unset -> trait result[0]
        ];

        $bc = new Bytecode(
            code: $code,
            constants: $constants,
            functions: [],
            registers: [
                ['name' => 'Region', 'builtIn' => null, 'default' => null, 'required' => false, 'type' => 'string'],
            ],
            inputRegisterMap: ['Region' => 0],
            bddNodes: $nodes,
            bddRoot: -2, // complemented root
            conditionOffsets: [0],
            resultOffsets: [8, 0, 4],
            conditionTypes: [Opcodes::COND_ISSET],
            conditionOperands: [0],
        );

        $ev = new Evaluator($bc);

        // With complement, isSet=true selects lo (result 0)
        $this->assertSame(
            'https://only-when-unset/',
            $ev->evaluate(['Region' => 'us-east-1'])->url,
        );
        // With complement, isSet=false selects hi (result 1)
        $this->assertSame(
            'https://only-when-set/',
            $ev->evaluate([])->url,
        );
    }
}
