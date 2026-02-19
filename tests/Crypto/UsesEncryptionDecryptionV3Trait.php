<?php
namespace Aws\Test\Crypto;

use Aws\Crypto\AlgorithmSuite;

trait UsesEncryptionDecryptionV3Trait
{
    public function getAlgorithmSuites(): array
    {
        return [
            [AlgorithmSuite::ALG_AES_256_GCM_HKDF_SHA512_COMMIT_KEY],
            [AlgorithmSuite::ALG_AES_256_GCM_IV12_TAG16_NO_KDF]
        ];
    }

    public function getCommitmentPolicies(): array
    {
        return [
            ["FORBID_ENCRYPT_ALLOW_DECRYPT"],
            ["REQUIRE_ENCRYPT_ALLOW_DECRYPT"],
            ["REQUIRE_ENCRYPT_REQUIRE_DECRYPT"]
        ];
    }
}
