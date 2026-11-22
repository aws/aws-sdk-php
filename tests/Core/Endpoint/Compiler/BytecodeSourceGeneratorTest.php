<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Endpoint\Compiler;

use Aws\Core\Endpoint\AwsFunctions;
use Aws\Core\Endpoint\Bytecode\AwsOpcodes;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Endpoint\Bytecode\Bytecode;
use Smithy\Client\Endpoint\Bytecode\Compiler\BddCompiler;
use Smithy\Client\Endpoint\Bytecode\Compiler\BytecodeSourceGenerator;
use Smithy\Client\Endpoint\Bytecode\StdFunctions;

/**
 * Round-trip test for {@see BytecodeSourceGenerator}.
 *
 * Compiles Lambda's real endpoint BDD to an in-memory {@see Bytecode},
 * generates PHP source for it, requires the source, then compares the
 * resulting `Bytecode::get()` return field-by-field against the
 * original.
 *
 * Function-table entries can't be compared with `===` because
 * `StdFunctions`/`AwsFunctions` returns fresh anonymous-class instances
 * each cold cache — instead we compare by `getName()`.
 */
final class BytecodeSourceGeneratorTest extends TestCase
{
    private const MODEL_PATH = __DIR__ . '/../../../../../aws-models/lambda/smithy/model.json';

    public function testRoundTripsLambdaBytecode(): void
    {
        $trait = $this->loadLambdaTrait();
        // Mirror the codegen extended-opcode wiring so the round-tripped
        // bytecode matches what the generator would produce in-tree.
        $originalCompiler = new BddCompiler(
            [
                ...StdFunctions::all(),
                ...AwsFunctions::all(),
            ],
            [
                'aws.parseArn' => AwsOpcodes::PARSE_ARN,
                'aws.partition' => AwsOpcodes::PARTITION,
                'aws.isVirtualHostableS3Bucket' => AwsOpcodes::IS_VIRTUAL_HOSTABLE_S3_BUCKET,
            ],
        );
        $original = $originalCompiler->compile($trait);

        $generator = new BytecodeSourceGenerator();
        $source = $generator->generate(
            $original,
            namespace: 'Aws\\Tests\\Core\\Endpoint\\Compiler\\Fixtures',
            className: 'RoundTripLambdaBytecode',
            sourceModel: 'aws-models/lambda/smithy/model.json (test fixture)',
        );

        // Eval the generated source. `eval` strips the leading `<?php`.
        $stripped = preg_replace('/^<\?php\s*/', '', $source, 1) ?? $source;
        eval($stripped);

        $reconstructed = \Aws\Tests\Core\Endpoint\Compiler\Fixtures\RoundTripLambdaBytecode::get();

        $this->assertBytecodesEqual($original, $reconstructed);
    }

    /**
     * Compare every {@see Bytecode} field. Function-table entries are
     * matched by name because anonymous class instances aren't identity-comparable.
     */
    private function assertBytecodesEqual(Bytecode $a, Bytecode $b): void
    {
        $this->assertSame($a->code, $b->code, 'code');
        $this->assertEquals($a->constants, $b->constants, 'constants');
        $this->assertSame($a->registers, $b->registers, 'registers');
        $this->assertSame($a->inputRegisterMap, $b->inputRegisterMap, 'inputRegisterMap');
        $this->assertSame($a->bddNodes, $b->bddNodes, 'bddNodes');
        $this->assertSame($a->bddRoot, $b->bddRoot, 'bddRoot');
        $this->assertSame($a->conditionOffsets, $b->conditionOffsets, 'conditionOffsets');
        $this->assertSame($a->resultOffsets, $b->resultOffsets, 'resultOffsets');
        $this->assertSame($a->conditionTypes, $b->conditionTypes, 'conditionTypes');
        $this->assertSame($a->conditionOperands, $b->conditionOperands, 'conditionOperands');

        $this->assertCount(count($a->functions), $b->functions, 'functions length');
        foreach ($a->functions as $i => $fn) {
            $this->assertSame(
                $fn->getName(),
                $b->functions[$i]->getName(),
                "function[{$i}] name mismatch",
            );
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function loadLambdaTrait(): array
    {
        if (!is_file(self::MODEL_PATH)) {
            $this->markTestSkipped('Lambda model not present at ' . self::MODEL_PATH);
        }
        $model = json_decode((string) file_get_contents(self::MODEL_PATH), true);
        foreach ($model['shapes'] ?? [] as $shape) {
            if (($shape['type'] ?? '') !== 'service') {
                continue;
            }
            $trait = $shape['traits']['smithy.rules#endpointBdd'] ?? null;
            if ($trait !== null) {
                return $trait;
            }
        }
        $this->fail('Lambda endpointBdd trait not found in model.');
    }
}
