<?php
namespace Aws\Kms;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Key Management Service**.
 *
 * @method \Aws\Result createAlias(array $args = [])
 * @method \Aws\Result createGrant(array $args = [])
 * @method \Aws\Result createKey(array $args = [])
 * @method \Aws\Result decrypt(array $args = [])
 * @method \Aws\Result deleteAlias(array $args = [])
 * @method \Aws\Result describeKey(array $args = [])
 * @method \Aws\Result disableKey(array $args = [])
 * @method \Aws\Result disableKeyRotation(array $args = [])
 * @method \Aws\Result enableKey(array $args = [])
 * @method \Aws\Result enableKeyRotation(array $args = [])
 * @method \Aws\Result encrypt(array $args = [])
 * @method \Aws\Result generateDataKey(array $args = [])
 * @method \Aws\Result generateDataKeyWithoutPlaintext(array $args = [])
 * @method \Aws\Result generateRandom(array $args = [])
 * @method \Aws\Result getKeyPolicy(array $args = [])
 * @method \Aws\Result getKeyRotationStatus(array $args = [])
 * @method \Aws\Result listAliases(array $args = [])
 * @method \Aws\Result listGrants(array $args = [])
 * @method \Aws\Result listKeyPolicies(array $args = [])
 * @method \Aws\Result listKeys(array $args = [])
 * @method \Aws\Result putKeyPolicy(array $args = [])
 * @method \Aws\Result reEncrypt(array $args = [])
 * @method \Aws\Result retireGrant(array $args = [])
 * @method \Aws\Result revokeGrant(array $args = [])
 * @method \Aws\Result updateAlias(array $args = [])
 * @method \Aws\Result updateKeyDescription(array $args = [])
 */
class KmsClient extends AwsClient {}
