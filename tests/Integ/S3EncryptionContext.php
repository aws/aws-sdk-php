<?php
namespace Aws\Test\Integ;

use Aws\Crypto\KmsMaterialsProvider;
use Aws\Crypto\MetadataEnvelope;
use Aws\Exception\AwsException;
use Aws\S3\Crypto\S3EncryptionClient;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Tester\Exception\PendingException;
use Aws\Crypto\AbstractCryptoClient;
use Aws\Kms\KmsClient;
use PHPUnit_Framework_Assert as Assert;

class S3EncryptionContext implements Context, SnippetAcceptingContext
{
    use IntegUtils;

    const DEFAULT_REGION = 'us-west-2';
    const DEFAULT_BUCKET = 'aws-s3-shared-tests';

    private $plaintexts;
    private $decrypted;
    private $operationParams;

    private $region;
    private $cipher;
    private $bucket;

    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     */
    public function setUp(BeforeScenarioScope $scope)
    {
        $scenarioTitle = $scope->getScenario()->getTitle();
        if (!empty($scenarioTitle) && stripos($scenarioTitle, 'gcm') !== false) {
            if (version_compare(PHP_VERSION, '7.1', '<')) {
                throw new PendingException('Test skipped on no GCM support');
            }
        }

        $this->plaintexts = [];
        $this->decrypted = [];
        $this->operationParams = [];
        $this->region = self::DEFAULT_REGION;
        $this->cipher = null;
        $this->bucket = self::DEFAULT_BUCKET;
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
     * @Then I encrypt each fixture with :wrapAlgorithm :alias :region and :cipher
     */
    public function iEncryptEachFixtureWith($wrapAlgorithm, $alias, $region, $cipher)
    {
        $this->region = $region;

        $kmsClient = self::getSdk()->createKms([
            'region' => $region
        ]);
        $keyArn = $this->getKmsArnFromAlias($kmsClient, $alias);

        $materialsProvider = new KmsMaterialsProvider(
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

            if (!AbstractCryptoClient::isSupportedCipher($shortCipher)) {
                continue;
            }

            $this->operationParams[$fileKeyPart] = [
                '@CipherOptions' => [
                    'Cipher' => $shortCipher
                ],
                '@MaterialsProvider' => $materialsProvider,
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
        $s3EncryptionClient = new S3EncryptionClient($s3Client);

        foreach ($this->plaintexts as $fileKeyPart => $plaintext) {
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
     * @Then I decrypt each fixture against :language :folder
     */
    public function iDecryptEachFixtureAgainstLanguageEncryptionVersion($language, $folder)
    {
        $materialsProvider = new KmsMaterialsProvider(
            self::getSdk()->createKms([
                'region' => $this->region
            ])
        );

        $s3Client = self::getSdk()->createS3([
            'region' => $this->region,
            'version' => 'latest'
        ]);
        $s3EncryptionClient = new S3EncryptionClient($s3Client);

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
            $result = $s3EncryptionClient->getObject($params);
            $this->decrypted[$fileKeyPart] = (string)$result['Body'];
        }
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
                strlen($this->decrypted[$key])
            );
            Assert::assertEquals(
                $this->plaintexts[$key],
                $this->decrypted[$key]
            );
        }
    }

    private function getKmsArnFromAlias(KmsClient $kmsClient, $alias)
    {
        $results = $kmsClient->getPaginator('ListAliases', [
            'Bucket' => 'my-bucket'
        ]);

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
