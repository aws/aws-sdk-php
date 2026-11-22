<?php

/*
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

declare(strict_types=1);

namespace Aws\Codegen;

use Aws\Core\S3\S3AddressingPlugin;
use Smithy\Codegen\CodegenSettings;
use Smithy\Codegen\Integration\AbstractCodegenIntegration;
use Smithy\Codegen\Model\SmithyModel;

/**
 * Apply S3 model customizations to S3 code generation.
 *
 * Runs before the AWS integration so every later phase, including the
 * operation generator, sees bucket-free S3 operation URIs. See
 * {@see S3AddressingPlugin}.
 */
final class S3CodegenIntegration extends AbstractCodegenIntegration
{
    public function name(): string
    {
        return 's3';
    }

    /** @inheritDoc */
    public function runBefore(): array
    {
        return ['aws-sdk-php'];
    }

    public function preprocessModel(
        SmithyModel $model,
        CodegenSettings $settings
    ): SmithyModel
    {
        $shapes = S3AddressingPlugin::normalizeShapes(
            $model->getShapes()
        );
        if ($shapes === $model->getShapes()) {
            return $model;
        }

        return SmithyModel::fromArray([
            'smithy' => '2.0',
            'metadata' => $model->getMetadata(),
            'shapes' => $shapes
        ]);
    }
}
