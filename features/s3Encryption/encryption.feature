@s3Encryption @integ
Feature: S3 Client Side Encryption

  Scenario: Upload PHP's GCM encrypted fixtures
    When I get all fixtures for "aes_gcm" from "aws-s3-shared-tests"
    Then I encrypt each fixture with "kms" "AWS_SDK_TEST_ALIAS" "us-west-2" and "aes_gcm"
    And upload "PHP" data with folder "version_2"

  Scenario: Upload PHP's CBC encrypted fixtures
    When I get all fixtures for "aes_cbc" from "aws-s3-shared-tests"
    Then I encrypt each fixture with "kms" "AWS_SDK_TEST_ALIAS" "us-west-2" and "aes_cbc"
    And upload "PHP" data with folder "version_2"

  Scenario: Get all PHP plaintext fixtures for kms keyed aes gcm
    When I get all fixtures for "aes_gcm" from "aws-s3-shared-tests"
    Then I decrypt each fixture against "PHP" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all PHP plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-s3-shared-tests"
    Then I decrypt each fixture against "PHP" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Go plaintext fixtures for kms keyed aes gcm
    When I get all fixtures for "aes_gcm" from "aws-s3-shared-tests"
    Then I decrypt each fixture against "Go" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Go plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-s3-shared-tests"
    Then I decrypt each fixture against "Go" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Java plaintext fixtures for kms keyed aes gcm
    When I get all fixtures for "aes_gcm" from "aws-s3-shared-tests"
    Then I decrypt each fixture against "Java" "version_2"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all Java plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-s3-shared-tests"
    Then I decrypt each fixture against "Java" "version_2"
    And I compare the decrypted ciphertext to the plaintext
