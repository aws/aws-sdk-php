@s3EncryptionV2 @integ
Feature: S3 Client Side Encryption V2

  Scenario: Upload PHP's GCM encrypted fixtures
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I encrypt each fixture with "kms" "AWS_SDK_PHP_TEST_ALIAS" "us-west-2" and "aes_gcm"
    And upload "PHP" data with folder "version_2"

  Scenario: Get all PHP plaintext fixtures for kms keyed aes gcm
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all PHP plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Go plaintext fixtures for kms keyed aes gcm
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Go" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Go plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Go" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Java plaintext fixtures for kms keyed aes gcm
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Java" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Java plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Java" "version_2"
    And I compare the decrypted ciphertext to the plaintext