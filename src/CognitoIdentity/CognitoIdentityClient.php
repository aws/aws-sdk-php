<?php
namespace Aws\CognitoIdentity;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Identity** service.
 *
 * @method \Aws\Result createIdentityPool(array $args = [])
 * @method \Aws\Result deleteIdentities(array $args = [])
 * @method \Aws\Result deleteIdentityPool(array $args = [])
 * @method \Aws\Result describeIdentity(array $args = [])
 * @method \Aws\Result describeIdentityPool(array $args = [])
 * @method \Aws\Result getCredentialsForIdentity(array $args = [])
 * @method \Aws\Result getId(array $args = [])
 * @method \Aws\Result getIdentityPoolRoles(array $args = [])
 * @method \Aws\Result getOpenIdToken(array $args = [])
 * @method \Aws\Result getOpenIdTokenForDeveloperIdentity(array $args = [])
 * @method \Aws\Result listIdentities(array $args = [])
 * @method \Aws\Result listIdentityPools(array $args = [])
 * @method \Aws\Result lookupDeveloperIdentity(array $args = [])
 * @method \Aws\Result mergeDeveloperIdentities(array $args = [])
 * @method \Aws\Result setIdentityPoolRoles(array $args = [])
 * @method \Aws\Result unlinkDeveloperIdentity(array $args = [])
 * @method \Aws\Result unlinkIdentity(array $args = [])
 * @method \Aws\Result updateIdentityPool(array $args = [])
 */
class CognitoIdentityClient extends AwsClient {}
