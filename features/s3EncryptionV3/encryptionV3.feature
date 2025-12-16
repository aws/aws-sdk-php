@s3EncryptionV2 @integ @requiresUniqueResources
Feature: S3 Client Side Encryption V3

  Scenario: Upload PHP V3 GCM encrypted fixtures with key commitment
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I encrypt each fixture with "kms" "AWS_SDK_PHP_TEST_ALIAS" "us-west-2" and "aes_gcm" using V3 with commitment policy "REQUIRE_ENCRYPT_REQUIRE_DECRYPT"
    And upload "PHP" data with folder "version_3"

   Scenario: Get all PHP V3 plaintext fixtures for kms keyed aes gcm with key commitment and commitment policy "REQUIRE_ENCRYPT_REQUIRE_DECRYPT" 
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_3" using V3 client with security profile "V3" with commitment policy "REQUIRE_ENCRYPT_REQUIRE_DECRYPT" 
    And I compare the decrypted ciphertext to the plaintext
  
   Scenario: Get all PHP V3 plaintext fixtures for kms keyed aes gcm with key commitment and commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT" 
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_3" using V3 client with security profile "V3" with commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT" 
    And I compare the decrypted ciphertext to the plaintext
   
   Scenario: Get all PHP V3 plaintext fixtures for kms keyed aes gcm with key commitment and commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT" 
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_3" using V3 client with security profile "V3" with commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT" 
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Get all PHP V3 plaintext fixtures for kms keyed aes cbc
    When I get all fixtures for "aes_cbc" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_3" using V3 client with security profile "V3_AND_LEGACY" and commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Cross-language compatibility - V3 decrypts Go V2 objects with legacy profile and commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Go" "version_2" using V3 client with security profile "V3_AND_LEGACY" and commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT"
    And I compare the decrypted ciphertext to the plaintext
  
  Scenario: Cross-language compatibility - V3 decrypts Go V2 objects with legacy profile and commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Go" "version_2" using V3 client with security profile "V3_AND_LEGACY" and commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Cross-language compatibility - V3 decrypts Java V2 objects with legacy profile and commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Java" "version_2" using V3 client with security profile "V3_AND_LEGACY" and commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT"
    And I compare the decrypted ciphertext to the plaintext
  
  Scenario: Cross-language compatibility - V3 decrypts Java V2 objects with legacy profile and commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "Java" "version_2" using V3 client with security profile "V3_AND_LEGACY" and commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Key commitment validation - V3 encrypts with commitment policy REQUIRE_ENCRYPT_REQUIRE_DECRYPT
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I encrypt each fixture with "kms" "AWS_SDK_PHP_TEST_ALIAS" "us-west-2" and "aes_gcm" using V3 with commitment policy "REQUIRE_ENCRYPT_REQUIRE_DECRYPT"
    And I verify key commitment is present in metadata
    And upload "PHP" data with folder "version_3_commitment"

  Scenario: Key commitment validation - V3 decrypts objects with valid commitment policy "REQUIRE_ENCRYPT_REQUIRE_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests" 
    Then I decrypt each fixture against "PHP" "version_3_commitment" using V3 client with security profile "V3" with commitment policy "REQUIRE_ENCRYPT_REQUIRE_DECRYPT"
    And I verify key commitment validation passes
    And I compare the decrypted ciphertext to the plaintext
  
  Scenario: Key commitment validation - V3 decrypts objects with valid commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_3_commitment" using V3 client with security profile "V3" with commitment policy "REQUIRE_ENCRYPT_ALLOW_DECRYPT"
    And I verify key commitment validation passes
    And I compare the decrypted ciphertext to the plaintext
  
  Scenario: Key commitment validation - V3 decrypts objects with valid commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_3_commitment" using V3 client with security profile "V3" with commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT"
    And I verify key commitment validation passes
    And I compare the decrypted ciphertext to the plaintext

  Scenario: Commitment policy FORBID_ENCRYPT_ALLOW_DECRYPT - V3 decrypts V2 objects
    When I get all fixtures for "aes_gcm" from "aws-sdk-php-crypto-tests"
    Then I decrypt each fixture against "PHP" "version_2" using V3 client with commitment policy "FORBID_ENCRYPT_ALLOW_DECRYPT" and security profile "V3_AND_LEGACY"
    And I compare the decrypted ciphertext to the plaintext
