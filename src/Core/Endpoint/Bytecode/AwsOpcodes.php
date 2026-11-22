<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Endpoint\Bytecode;

/**
 * AWS-specific opcode constants — extensions to
 * {@see \Smithy\Client\Endpoint\Bytecode\Opcodes}.
 *
 * Values ≥ 56 are reserved for vendor extensions; the base evaluator
 * dispatches anything it doesn't recognize to its composed
 * {@see \Smithy\Client\Endpoint\Bytecode\OpcodeHandlerInterface}. When
 * an AWS-mode compilation is in effect, {@see AwsOpcodeHandler} is
 * wired at `Evaluator` construction time and handles these codes.
 *
 * These bypass the generic `CALL_FN` registry path — see the docblock on
 * {@see \Smithy\Client\Endpoint\Bytecode\Compiler\BddCompiler} for the
 * fusion strategy. Each opcode replaces one virtual `apply1` / `apply2`
 * call plus one hash lookup in the function-index table.
 */
final class AwsOpcodes
{
    private function __construct() {}

    /**
     * Fused `aws.parseArn(x)`. 1-arg. Pops an ARN string from the
     * stack; pushes the parsed struct
     * (`['partition' => ..., 'service' => ..., 'region' => ...,
     * 'accountId' => ..., 'resourceId' => list<string>]`) or `null`
     * on malformed input.
     */
    public const PARSE_ARN = 56;

    /**
     * Fused `aws.partition(region)`. 1-arg. Pops the region string;
     * pushes the partition-outputs struct from
     * {@see \Aws\Core\Endpoint\Partitions::resolve()} or `null` for
     * non-string input.
     */
    public const PARTITION = 57;

    /**
     * Fused `aws.isVirtualHostableS3Bucket(name, allowSubdomains)`.
     * 2-arg. Pops the boolean flag then the bucket name; pushes a
     * boolean.
     */
    public const IS_VIRTUAL_HOSTABLE_S3_BUCKET = 58;
}
