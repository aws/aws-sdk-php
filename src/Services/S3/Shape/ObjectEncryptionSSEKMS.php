<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Services\S3\Shape;

/**
 * <p>
      Specifies to update the object encryption type to server-side encryption with Key Management Service (KMS)
 * keys 
      (SSE-KMS). 
    </p>
 */
/** @internal */
final readonly class ObjectEncryptionSSEKMS extends ObjectEncryption
{
    public function __construct(public SSEKMSEncryption $value) {}

    public function getMemberIndex(): int
    {
        return 0;
    }

    public function tag(): string
    {
        return 'SSEKMS';
    }

    public function value(): SSEKMSEncryption
    {
        return $this->value;
    }
}
