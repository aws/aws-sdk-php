<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Endpoint\Bytecode;

use Aws\Core\Endpoint\Partitions;
use Smithy\Client\Endpoint\Bytecode\OpcodeHandlerInterface;
use Smithy\Client\Endpoint\Bytecode\RulesEvaluationException;

/**
 * Fuses the three hot AWS endpoint-rules functions
 * (`aws.parseArn`, `aws.partition`, `aws.isVirtualHostableS3Bucket`)
 * into dedicated opcode arms — bypassing the generic
 * {@see \Smithy\Client\Endpoint\Bytecode\RulesFunctionInterface}
 * dispatch (function-table lookup + virtual `apply1`/`apply2` call)
 * that showed up as ~5% of samples in the S3 endpoint-resolution
 * profile.
 *
 * {@see \Smithy\Client\Endpoint\Bytecode\Compiler\BddCompiler} emits
 * opcodes {@see AwsOpcodes::PARSE_ARN}, {@see AwsOpcodes::PARTITION},
 * and {@see AwsOpcodes::IS_VIRTUAL_HOSTABLE_S3_BUCKET} when the AWS
 * SDK codegen passes them in as `extendedOpcodes` (a fn-name → opcode
 * map). The per-service `*EndpointResolver` constructs the base
 * {@see \Smithy\Client\Endpoint\Bytecode\Evaluator} with an
 * `AwsOpcodeHandler` instance so the runtime can dispatch them.
 *
 * # Layering
 *
 * Lives in `aws-sdk-php` so `smithy-php` stays free of AWS-specific
 * code. Delegates to {@see Partitions::resolve()} for `aws.partition`
 * and inlines the ARN parser + S3 virtual-host bucket validator
 * verbatim from {@see \Aws\Core\Endpoint\AwsFunctions} — those
 * remain in place for the generic-registry fallback path (custom
 * ruleset compilers that use the plain function call opcode).
 */
final class AwsOpcodeHandler implements OpcodeHandlerInterface
{
    /**
     * @param array<int, mixed> $stack Interpreter stack. Slots are
     *     overwritten in place by offset, so the array is not kept as a list.
     */
    public function handle(
        int $op,
        array $code,
        int &$pc,
        array &$stack,
        int &$sp,
        array &$regs,
        array $constants,
    ): void
    {
        switch ($op) {
            case AwsOpcodes::PARSE_ARN:
                // 1-arg; stack top is the ARN string (or non-string,
                // which the spec says returns null).
                $arn = $stack[$sp - 1];
                $stack[$sp - 1] = \is_string($arn) ? self::parseArn($arn) : null;
                return;

            case AwsOpcodes::PARTITION:
                // 1-arg; stack top is the region string. Delegates
                // to the pre-computed partition/region index — one
                // hashmap lookup, no regex fallback in the common case.
                $region = $stack[$sp - 1];
                $stack[$sp - 1] = \is_string($region)
                    ? Partitions::resolve($region)
                    : null;
                return;

            case AwsOpcodes::IS_VIRTUAL_HOSTABLE_S3_BUCKET:
                // 2-arg; stack top two are [name, allowSubdomains]
                // in push order — allowSubdomains was pushed last.
                $allow = $stack[$sp - 1] === true;
                $name = $stack[$sp - 2];
                $stack[$sp - 2] = \is_string($name)
                    && self::isVirtualHostableS3Bucket($name, $allow);
                --$sp;
                return;
        }

        throw new RulesEvaluationException(
            "Unknown AWS opcode {$op} at pc " . ($pc - 1),
        );
    }

    // -----------------------------------------------------------------
    // Fused function bodies. Copies of the anon-class `apply1`/`apply2`
    // implementations in {@see \Aws\Core\Endpoint\AwsFunctions}; keeping
    // them here means the handler is self-contained and the JIT sees a
    // small, stable class shape for tracing.
    // -----------------------------------------------------------------

    /**
     * @return array{partition:string, service:string, region:string, accountId:string, resourceId:list<string>}|null
     */
    private static function parseArn(string $arn): ?array
    {
        // ARN format: arn:partition:service:region:accountId:resource(:more)
        $parts = \explode(':', $arn, 6);
        if (\count($parts) < 6
            || $parts[0] !== 'arn'
            || $parts[1] === ''
            || $parts[2] === ''
            || $parts[5] === ''
        ) {
            return null;
        }
        $resource = $parts[5];
        // resourceId is the / or : separated tail; expose as list<string>.
        $resourceId = \preg_split('/[:\\/]/', $resource) ?: [$resource];
        return [
            'partition' => $parts[1],
            'service' => $parts[2],
            'region' => $parts[3],
            'accountId' => $parts[4],
            'resourceId' => $resourceId,
        ];
    }

    private static function isVirtualHostableS3Bucket(string $name, bool $allowSubdomains): bool
    {
        $len = \strlen($name);
        if ($len < 3 || $len > 63) {
            return false;
        }
        $pattern = $allowSubdomains
            ? '/^[a-z0-9][a-z0-9\-.]*[a-z0-9]$/'
            : '/^[a-z0-9][a-z0-9\-]*[a-z0-9]$/';
        if (!\preg_match($pattern, $name)) {
            return false;
        }
        // Reject IPv4-looking names.
        if (\preg_match('/^\d+\.\d+\.\d+\.\d+$/', $name)) {
            return false;
        }
        if ($allowSubdomains) {
            foreach (\explode('.', $name) as $label) {
                if ($label === ''
                    || \strlen($label) > 63
                    || !\preg_match('/^[a-z0-9][a-z0-9\-]*[a-z0-9]$/', $label)
                ) {
                    return false;
                }
            }
        }
        return true;
    }
}
