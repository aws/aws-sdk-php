<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Core\Endpoint;

use Smithy\Client\Endpoint\Bytecode\RulesFunctionInterface;

/**
 * Registry of AWS-specific rules-engine functions.
 *
 * These are the `aws.*` functions defined by the AWS auth-and-endpoint
 * spec:
 *
 *   - `aws.partition(region)` — resolve a partition record from a region.
 *   - `aws.parseArn(arn)` — decompose an ARN string into named parts.
 *   - `aws.isVirtualHostableS3Bucket(bucket, allowSubdomains)` — bucket
 *     name validation for S3 virtual-hosted-style URLs.
 *   - `aws.stringEqualsIgnoreCase(a, b)` — case-insensitive string equality.
 *
 * Consumers get a fully-populated `array<string, RulesFunctionInterface>` from
 * {@see AwsFunctions::all()} and merge it with
 * {@see \Smithy\Client\Endpoint\Bytecode\StdFunctions::all()} before handing
 * to the compiler.
 */
final class AwsFunctions
{
    /** @var array<string, RulesFunctionInterface>|null */
    private static ?array $cache = null;

    private function __construct() {}

    /**
     * Look up a single AWS-namespaced function by name. Symmetric with
     * {@see \Smithy\Client\Endpoint\Bytecode\StdFunctions::get()} — the
     * generated per-service endpoint-bytecode class calls this to
     * reconstitute its function table.
     */
    public static function get(string $name): RulesFunctionInterface
    {
        $fn = self::all()[$name] ?? null;
        if ($fn === null) {
            throw new \InvalidArgumentException(
                "Unknown aws function: {$name}",
            );
        }
        return $fn;
    }

    /**
     * @return array<string, RulesFunctionInterface>
     */
    public static function all(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        return self::$cache = [
            'aws.partition' => new class implements RulesFunctionInterface {
                public function getName(): string { return 'aws.partition'; }
                public function getRegistryClass(): string { return AwsFunctions::class; }
                public function getArgumentCount(): int { return 1; }
                public function apply0(): mixed { return null; }
                public function apply1(mixed $a0): mixed
                {
                    return \is_string($a0) ? Partitions::resolve($a0) : null;
                }
                public function apply2(mixed $a0, mixed $a1): mixed { return null; }
                public function apply3(mixed $a0, mixed $a1, mixed $a2): mixed { return null; }
                public function apply(array $args): mixed { return $this->apply1($args[0]); }
            },
            'aws.parseArn' => new class implements RulesFunctionInterface {
                public function getName(): string { return 'aws.parseArn'; }
                public function getRegistryClass(): string { return AwsFunctions::class; }
                public function getArgumentCount(): int { return 1; }
                public function apply0(): mixed { return null; }
                public function apply1(mixed $a0): mixed
                {
                    if (!\is_string($a0)) {
                        return null;
                    }
                    // ARN format: arn:partition:service:region:accountId:resource(:more)
                    $parts = \explode(':', $a0, 6);
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
                public function apply2(mixed $a0, mixed $a1): mixed { return null; }
                public function apply3(mixed $a0, mixed $a1, mixed $a2): mixed { return null; }
                public function apply(array $args): mixed { return $this->apply1($args[0]); }
            },
            'aws.isVirtualHostableS3Bucket' => new class implements RulesFunctionInterface {
                public function getName(): string { return 'aws.isVirtualHostableS3Bucket'; }
                public function getRegistryClass(): string { return AwsFunctions::class; }
                public function getArgumentCount(): int { return 2; }
                public function apply0(): mixed { return null; }
                public function apply1(mixed $a0): mixed { return null; }
                public function apply2(mixed $a0, mixed $a1): mixed
                {
                    if (!\is_string($a0) || \strlen($a0) < 3 || \strlen($a0) > 63) {
                        return false;
                    }
                    $allowSub = $a1 === true;
                    $pattern = $allowSub
                        ? '/^[a-z0-9][a-z0-9\-.]*[a-z0-9]$/'
                        : '/^[a-z0-9][a-z0-9\-]*[a-z0-9]$/';
                    if (!\preg_match($pattern, $a0)) {
                        return false;
                    }
                    // Reject IPv4-looking names.
                    if (\preg_match('/^\\d+\\.\\d+\\.\\d+\\.\\d+$/', $a0)) {
                        return false;
                    }
                    if ($allowSub) {
                        foreach (\explode('.', $a0) as $label) {
                            if ($label === '' || \strlen($label) > 63
                                || !\preg_match('/^[a-z0-9][a-z0-9\-]*[a-z0-9]$/', $label)
                            ) {
                                return false;
                            }
                        }
                    }
                    return true;
                }
                public function apply3(mixed $a0, mixed $a1, mixed $a2): mixed { return null; }
                public function apply(array $args): mixed { return $this->apply2($args[0], $args[1]); }
            },
            'aws.stringEqualsIgnoreCase' => new class implements RulesFunctionInterface {
                public function getName(): string { return 'aws.stringEqualsIgnoreCase'; }
                public function getRegistryClass(): string { return AwsFunctions::class; }
                public function getArgumentCount(): int { return 2; }
                public function apply0(): mixed { return null; }
                public function apply1(mixed $a0): mixed { return null; }
                public function apply2(mixed $a0, mixed $a1): mixed
                {
                    return \is_string($a0) && \is_string($a1) && \strcasecmp($a0, $a1) === 0;
                }
                public function apply3(mixed $a0, mixed $a1, mixed $a2): mixed { return null; }
                public function apply(array $args): mixed { return $this->apply2($args[0], $args[1]); }
            },
        ];
    }
}
