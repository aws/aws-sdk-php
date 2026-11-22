<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Tests\Core\Endpoint;

use Aws\Core\Endpoint\AwsFunctions;
use Aws\Core\Endpoint\Bytecode\AwsOpcodeHandler;
use Aws\Core\Endpoint\Bytecode\AwsOpcodes;
use PHPUnit\Framework\TestCase;
use Smithy\Client\Endpoint\Bytecode\Compiler\BddCompiler;
use Smithy\Client\Endpoint\Bytecode\Evaluator;
use Smithy\Client\Endpoint\Bytecode\RulesEvaluationException;
use Smithy\Client\Endpoint\Bytecode\StdFunctions;

/**
 * End-to-end test: compile Lambda's real `smithy.rules#endpointBdd` trait
 * from `aws-models/lambda/smithy/model.json`, then evaluate against the
 * common set of Region / UseFIPS / UseDualStack combinations.
 *
 * If this passes we know:
 *   - The BDD blob (base64, big-endian int32 triples) decodes correctly.
 *   - All 4 parameters (Region, UseFIPS, UseDualStack, Endpoint) round-trip
 *     through the register machine.
 *   - The full-dispatch condition path works (aws.partition + getAttr).
 *   - Template resolution (`https://lambda.{Region}.{PartitionResult#dnsSuffix}`)
 *     is emitted correctly.
 *   - The Result → Endpoint object construction lands on a valid URL.
 */
final class LambdaEndpointResolverTest extends TestCase
{
    private const MODEL_PATH = __DIR__ . '/../../../../aws-models/lambda/smithy/model.json';

    private static ?Evaluator $evaluator = null;

    private function evaluator(): Evaluator
    {
        if (self::$evaluator !== null) {
            return self::$evaluator;
        }

        if (!is_file(self::MODEL_PATH)) {
            $this->markTestSkipped('Lambda model not present at ' . self::MODEL_PATH);
        }
        $model = json_decode((string) file_get_contents(self::MODEL_PATH), true);
        $trait = $this->findBddTrait($model);
        $this->assertIsArray($trait, 'endpointBdd trait not found on Lambda service');

        // Mirror the codegen setup: pass the AWS-fused opcode map so the
        // compiled bytecode emits fused arms for aws.partition (and, in
        // other services, aws.parseArn / aws.isVirtualHostableS3Bucket),
        // then supply the matching AwsOpcodeHandler to the Evaluator.
        $compiler = new BddCompiler(
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
        $bytecode = $compiler->compile($trait);
        return self::$evaluator = new Evaluator($bytecode, new AwsOpcodeHandler());
    }

    public function testStandardRegion(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
        ]);
        $this->assertSame('https://lambda.us-east-1.amazonaws.com', $endpoint->url);
    }

    public function testFipsRegion(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
        ]);
        $this->assertSame('https://lambda-fips.us-east-1.amazonaws.com', $endpoint->url);
    }

    public function testDualStackRegion(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => true,
        ]);
        $this->assertSame('https://lambda.us-east-1.api.aws', $endpoint->url);
    }

    public function testFipsPlusDualStack(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => true,
        ]);
        $this->assertSame('https://lambda-fips.us-east-1.api.aws', $endpoint->url);
    }

    public function testGovCloud(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'us-gov-west-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
        ]);
        $this->assertSame('https://lambda.us-gov-west-1.amazonaws.com', $endpoint->url);
    }

    public function testChinaPartition(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'cn-north-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
        ]);
        $this->assertSame('https://lambda.cn-north-1.amazonaws.com.cn', $endpoint->url);
    }

    public function testEndpointOverride(): void
    {
        $endpoint = $this->evaluator()->evaluate([
            'Region' => 'us-east-1',
            'UseFIPS' => false,
            'UseDualStack' => false,
            'Endpoint' => 'https://custom.example.com',
        ]);
        $this->assertSame('https://custom.example.com', $endpoint->url);
    }

    public function testMissingRegion(): void
    {
        $this->expectException(RulesEvaluationException::class);
        $this->expectExceptionMessage('Missing Region');
        $this->evaluator()->evaluate([
            'UseFIPS' => false,
            'UseDualStack' => false,
        ]);
    }

    public function testFipsAndCustomEndpointInvalid(): void
    {
        // Lambda's BDD is minimized — the exact error message returned
        // when combining FIPS with a custom endpoint depends on which
        // top-level condition the reduced diagram tests first. Any of
        // the "custom endpoint are not supported" messages is fine.
        $this->expectException(RulesEvaluationException::class);
        $this->expectExceptionMessageMatches('/(FIPS|Dualstack) and custom endpoint are not supported/');
        $this->evaluator()->evaluate([
            'Region' => 'us-east-1',
            'UseFIPS' => true,
            'UseDualStack' => false,
            'Endpoint' => 'https://custom.example.com',
        ]);
    }

    // -----------------------------------------------------------------
    // Model traversal helpers
    // -----------------------------------------------------------------

    /**
     * @param array<string, mixed>|null $model
     *
     * @return array<string, mixed>|null
     */
    private function findBddTrait(?array $model): ?array
    {
        if (!isset($model['shapes']) || !is_array($model['shapes'])) {
            return null;
        }
        foreach ($model['shapes'] as $shape) {
            if (($shape['type'] ?? '') !== 'service') {
                continue;
            }
            $traits = $shape['traits'] ?? [];
            if (isset($traits['smithy.rules#endpointBdd'])) {
                return $traits['smithy.rules#endpointBdd'];
            }
        }
        return null;
    }
}
