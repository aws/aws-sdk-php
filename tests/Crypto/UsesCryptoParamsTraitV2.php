<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\KmsMaterialsProvider;
use Aws\S3\Crypto\HeadersMetadataStrategy;
use Aws\S3\Crypto\InstructionFileMetadataStrategy;

trait UsesCryptoParamsTraitV2
{
    use UsesCryptoParamsTrait;

    public function getCiphers()
    {
        return [
            [
                'gcm',
                null,
                function () {
                    return version_compare(PHP_VERSION, '7.1', '<');
                }
            ],
            [
                'unsupported',
                [
                    'InvalidArgumentException',
                    'The cipher requested is not supported by the SDK.'
                ]
            ]
        ];
    }
}
