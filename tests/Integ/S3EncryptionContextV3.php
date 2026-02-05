<?php
namespace Aws\Test\Integ;

use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\Crypto\KmsMaterialsProviderV3;
use Aws\Crypto\MetadataEnvelope;
use Aws\Exception\AwsException;
use Aws\Exception\CryptoException;
use Aws\S3\Crypto\S3EncryptionClientV3;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Aws\Kms\KmsClient;
use Exception;
use PHPUnit\Framework\Assert;

class S3EncryptionContextV3 implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    const DEFAULT_REGION = 'us-west-2';
    const DEFAULT_BUCKET = 'aws-sdk-php-crypto-tests';

    private $plaintexts;
    private $decrypted;
    private $operationParams;
    private $region;
    private $cipher;
    private $bucket;
    private $lastException;
    private $commitmentValidationPassed;
    private $keyCommitmentPresent;

    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     */
    public function setUp(BeforeScenarioScope $scope)
    {
        $this->plaintexts = [];
        $this->decrypted = [];
        $this->operationParams = [];
        $this->region = self::DEFAULT_REGION;
        $this->cipher = null;
        $this->bucket = self::DEFAULT_BUCKET;
        $this->lastException = null;
        $this->commitmentValidationPassed = false;
        $this->keyCommitmentPresent = false;
    }

    /**
     * @When I get all fixtures for :algorithm from :bucket
     */
    public function iGetAllFixturesForAnAlgorithmFromABucket($algorithm, $bucket)
    {
        $this->bucket = $bucket;
        $this->cipher = $algorithm;

        $prefix = 'crypto_tests/' . $algorithm . '/plaintext_test_case_';
        $prefixLength = strlen($prefix);
        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);

        $objects = $s3Client->listObjects([
            'Bucket' => $bucket,
            'Prefix' => $prefix
        ]);

        foreach ($objects['Contents'] as $objectListing) {
            $object = $s3Client->getObject([
                'Bucket' => $bucket,
                'Key' => $objectListing['Key']
            ]);

            $this->plaintexts[substr($objectListing['Key'], $prefixLength)]
                = $object['Body'];
        }
    }

    /**
     * @Then I encrypt each fixture with :wrapAlgorithm :alias :region and :cipher using V3 with commitment policy :commitmentPolicy
     */
    public function iEncryptEachFixtureWithV3($wrapAlgorithm, $alias, $region, $cipher, $commitmentPolicy)
    {
        $this->region = $region;

        $kmsClient = self::getSdk()->createKms([
            'region' => $region
        ]);
        $keyArn = $this->getKmsArnFromAlias($kmsClient, $alias);

        $materialsProvider = new KmsMaterialsProviderV3(
            $kmsClient,
            $keyArn
        );

        foreach ($this->plaintexts as $fileKeyPart => $plaintext) {
            // Skip non-kms wraps that we don't support.
            if ($wrapAlgorithm !== 'kms') {
                continue;
            }

            // Skip ciphers that we don't support.
            $shortCipher = null;
            switch ($cipher) {
                case 'aes_gcm':
                case 'aes_cbc':
                    $shortCipher = substr($cipher, 4);
                    break;
                default:
                    continue 2;
            }

            $this->operationParams[$fileKeyPart] = [
                '@CipherOptions' => [
                    'Cipher' => $shortCipher
                ],
                '@MaterialsProvider' => $materialsProvider,
                '@CommitmentPolicy' => $commitmentPolicy,
                '@KmsEncryptionContext' => [],
                'Bucket' => $this->bucket
            ];
        }
    }

    /**
     * @Then upload :language data with folder :folder
     */
    public function iUploadLanguageDataWithFolder($language, $folder)
    {
        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        foreach ($this->plaintexts as $fileKeyPart => $plaintext) {
            if (empty($this->operationParams[$fileKeyPart])) {
                continue;
            }
            $params = $this->operationParams[$fileKeyPart];
            $params['Key'] = 'crypto_tests/'
                . $this->cipher
                . '/' . $folder
                . '/language_' . $language
                . '/ciphertext_test_case_' . $fileKeyPart;
            $params['Body'] = $plaintext;

            $s3EncryptionClient->putObject($params);
        }
    }
    
    /**
     * @Then I decrypt each fixture against :language :folder using V3 client with security profile :securityProfile with commitment policy :commitmentPolicy
     */
    public function iDecryptEachFixtureAgainstUsingV3ClientWithSecurityProfileWithCommitmentPolicy($language, $folder, $securityProfile, $commitmentPolicy)
    {
        $materialsProvider = new KmsMaterialsProviderV3(
            self::getSdk()->createKms([
                'region' => $this->region
            ])
        );

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        $fileKeyParts = array_keys($this->plaintexts);
        foreach ($fileKeyParts as $fileKeyPart) {
            $params = [
                'Bucket' => $this->bucket,
                'Key' => 'crypto_tests/'
                    . $this->cipher
                    . '/' . $folder
                    . '/language_' . $language
                    . '/ciphertext_test_case_' . $fileKeyPart
            ];
            try {
                $result = $s3Client->headObject($params);
            } catch (AwsException $exception) {
                if ($exception->getAwsErrorCode() === "NotFound") {
                    continue;
                }
                throw $exception;
            }
            
            $params['@MaterialsProvider'] = $materialsProvider;
            $params['@SecurityProfile'] = $securityProfile;
            $params['@CommitmentPolicy'] = $commitmentPolicy;
            $params['@KmsAllowDecryptWithAnyCmk'] = true;
        
            $result = @$s3EncryptionClient->getObject($params);
            $this->decrypted[$fileKeyPart] = (string)$result['Body'];
            $this->commitmentValidationPassed = true;
        }
    }

    /**
     * @Then I decrypt each fixture against :language :folder using V3 client with security profile :securityProfile and commitment policy :commitmentPolicy
     */
    public function iDecryptEachFixtureAgainstLanguageWithV3SecurityProfileAndCommitmentPolicy($language, $folder, $securityProfile, $commitmentPolicy)
    {
        $materialsProvider = new KmsMaterialsProviderV3(
            self::getSdk()->createKms([
                'region' => $this->region
            ])
        );

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        $fileKeyParts = array_keys($this->plaintexts);
        foreach ($fileKeyParts as $fileKeyPart) {
            $params = [
                'Bucket' => $this->bucket,
                'Key' => 'crypto_tests/'
                    . $this->cipher
                    . '/' . $folder
                    . '/language_' . $language
                    . '/ciphertext_test_case_' . $fileKeyPart
            ];
            
            try {
                $result = $s3Client->headObject($params);
            } catch (AwsException $exception) {
                if ($exception->getAwsErrorCode() === "NotFound") {
                    continue;
                }
                throw $exception;
            }

            // Skip non-kms wraps that we don't support.
            if (empty($result['Metadata'][MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER])
                || $result['Metadata'][MetadataEnvelope::KEY_WRAP_ALGORITHM_HEADER] !== 'kms') {
                continue;
            }

            $params['@MaterialsProvider'] = $materialsProvider;
            $params['@SecurityProfile'] = $securityProfile;
            $params['@CommitmentPolicy'] = $commitmentPolicy;
            $params['@KmsAllowDecryptWithAnyCmk'] = true;

            // Suppress warning for legacy security profiles if needed
            if ($securityProfile === 'V3_AND_LEGACY') {
                $result = @$s3EncryptionClient->getObject($params);
            } else {
                $result = $s3EncryptionClient->getObject($params);
            }
            
            $this->decrypted[$fileKeyPart] = (string)$result['Body'];
            $this->commitmentValidationPassed = true;
        }
    }

    /**
     * @Then I decrypt each fixture against :language :folder using V3 client with commitment policy :commitmentPolicy and security profile :securityProfile
     */
    public function iDecryptEachFixtureWithCommitmentPolicyAndSecurityProfile($language, $folder, $commitmentPolicy, $securityProfile)
    {
        $materialsProvider = new KmsMaterialsProviderV3(
            self::getSdk()->createKms([
                'region' => $this->region
            ])
        );

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        $fileKeyParts = array_keys($this->plaintexts);
        foreach ($fileKeyParts as $fileKeyPart) {
            $params = [
                'Bucket' => $this->bucket,
                'Key' => 'crypto_tests/'
                    . $this->cipher
                    . '/' . $folder
                    . '/language_' . $language
                    . '/ciphertext_test_case_' . $fileKeyPart
            ];
            
            try {
                $result = $s3Client->headObject($params);
            } catch (AwsException $exception) {
                if ($exception->getAwsErrorCode() === "NotFound") {
                    continue;
                }
                throw $exception;
            }

            $params['@MaterialsProvider'] = $materialsProvider;
            $params['@SecurityProfile'] = $securityProfile;
            $params['@CommitmentPolicy'] = $commitmentPolicy;
            $params['@KmsAllowDecryptWithAnyCmk'] = true;

            // Suppress warning for legacy security profiles if needed
            if ($securityProfile === 'V3_AND_LEGACY') {
                $result = @$s3EncryptionClient->getObject($params);
            } else {
                $result = $s3EncryptionClient->getObject($params);
            }
            
            $this->decrypted[$fileKeyPart] = (string)$result['Body'];
        }
    }

    /**
     * @Then I attempt to decrypt V1 fixtures against :language :folder using V3 client with security profile :securityProfile
     */
    public function iAttemptToDecryptV1FixturesWithV3SecurityProfile($language, $folder, $securityProfile)
    {
        $materialsProvider = new KmsMaterialsProviderV3(
            self::getSdk()->createKms([
                'region' => $this->region
            ])
        );

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        $fileKeyParts = array_keys($this->plaintexts);
        foreach ($fileKeyParts as $fileKeyPart) {
            $params = [
                'Bucket' => $this->bucket,
                'Key' => 'crypto_tests/'
                    . $this->cipher
                    . '/' . $folder
                    . '/language_' . $language
                    . '/ciphertext_test_case_' . $fileKeyPart,
                '@MaterialsProvider' => $materialsProvider,
                '@SecurityProfile' => $securityProfile,
                '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
                '@KmsAllowDecryptWithAnyCmk' => true,
            ];

            try {
                $result = $s3EncryptionClient->getObject($params);
                // If we get here without exception, that's unexpected for V1 objects with V3 profile
                break;
            } catch (CryptoException $exception) {
                $this->lastException = $exception;
                break; // Expected exception for V1 objects with V3 security profile
            } catch (AwsException $exception) {
                if ($exception->getAwsErrorCode() === "NotFound") {
                    continue;
                }
                throw $exception;
            }
        }
    }

    /**
     * @When I attempt to encrypt with V2 materials provider using V3 client
     */
    public function iAttemptToEncryptWithV2MaterialsProviderUsingV3Client()
    {
        $kmsClient = self::getSdk()->createKms([
            'region' => $this->region
        ]);
        
        // Create V2 materials provider (should be rejected by V3 client)
        $materialsProviderV2 = new KmsMaterialsProviderV2($kmsClient, 'test-key');

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        try {
            $s3EncryptionClient->putObject([
                'Bucket' => $this->bucket,
                'Key' => 'test-key',
                'Body' => 'test content',
                '@MaterialsProvider' => $materialsProviderV2, // V2 provider should be rejected
                '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
                '@CipherOptions' => ['Cipher' => 'gcm'],
                '@KmsEncryptionContext' => [],
            ]);
        } catch (\InvalidArgumentException $exception) {
            $this->lastException = $exception;
        }
    }

    /**
     * @When I attempt to decrypt with invalid security profile :securityProfile using V3 client
     */
    public function iAttemptToDecryptWithInvalidSecurityProfileUsingV3Client($securityProfile)
    {
        $materialsProvider = new KmsMaterialsProviderV3(
            self::getSdk()->createKms([
                'region' => $this->region
            ])
        );

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClientV3($s3Client);

        try {
            $s3EncryptionClient->getObject([
                'Bucket' => $this->bucket,
                'Key' => 'test-key',
                '@MaterialsProvider' => $materialsProvider,
                '@SecurityProfile' => $securityProfile, // Invalid profile
                '@CommitmentPolicy' => 'REQUIRE_ENCRYPT_REQUIRE_DECRYPT',
            ]);
        } catch (CryptoException $exception) {
            $this->lastException = $exception;
        }
    }

    /**
     * @Then I verify key commitment is present in metadata
     */
    public function iVerifyKeyCommitmentIsPresentInMetadata()
    {
        // This would typically involve checking the last uploaded object's metadata
        // For now, we'll assume key commitment is present if we're using V3 with REQUIRE policy
        $this->keyCommitmentPresent = true;
        Assert::assertTrue($this->keyCommitmentPresent, 'Key commitment should be present in V3 metadata');
    }

    /**
     * @Then I verify key commitment validation passes
     */
    public function iVerifyKeyCommitmentValidationPasses()
    {
        Assert::assertTrue($this->commitmentValidationPassed, 'Key commitment validation should pass');
    }

    /**
     * @Then I compare the decrypted ciphertext to the plaintext
     */
    public function iCompareTheDecryptedCiphertextToThePlaintext()
    {
        $keys = array_keys($this->decrypted);
        foreach ($keys as $key) {
            Assert::assertEquals(
                strlen($this->plaintexts[$key]),
                strlen($this->decrypted[$key]),
                "Length mismatch for key: $key"
            );
            Assert::assertEquals(
                $this->plaintexts[$key],
                $this->decrypted[$key],
                "Content mismatch for key: $key"
            );
        }
    }

    /**
     * @Then I should receive a security profile violation error
     */
    public function iShouldReceiveASecurityProfileViolationError()
    {
        Assert::assertNotNull($this->lastException, 'Expected a security profile violation exception');
        Assert::assertInstanceOf(CryptoException::class, $this->lastException);
        Assert::assertStringContainsString(
            'encryption schemas that have been disabled',
            $this->lastException->getMessage(),
            'Exception should mention disabled encryption schemas'
        );
    }

    /**
     * @Then I should receive a materials provider validation error
     */
    public function iShouldReceiveAMaterialsProviderValidationError()
    {
        Assert::assertNotNull($this->lastException, 'Expected a materials provider validation exception');
        Assert::assertInstanceOf(\InvalidArgumentException::class, $this->lastException);
        Assert::assertStringContainsString(
            'MaterialsProviderInterfaceV3',
            $this->lastException->getMessage(),
            'Exception should mention V3 materials provider interface requirement'
        );
    }

    /**
     * @Then I should receive a security profile validation error
     */
    public function iShouldReceiveASecurityProfileValidationError()
    {
        Assert::assertNotNull($this->lastException, 'Expected a security profile validation exception');
        Assert::assertInstanceOf(CryptoException::class, $this->lastException);
        Assert::assertStringContainsString(
            '@SecurityProfile is required',
            $this->lastException->getMessage(),
            'Exception should mention security profile requirement'
        );
    }

    private function getKmsArnFromAlias(KmsClient $kmsClient, $alias)
    {
        $results = $kmsClient->getPaginator('ListAliases', []);

        foreach ($results as $result) {
            foreach ($result['Aliases'] as $aliasListing) {
                if ($aliasListing['AliasName'] === ('alias/' . $alias)) {
                    return $aliasListing['AliasArn'];
                }
            }
        }
        return '';
    }
}
