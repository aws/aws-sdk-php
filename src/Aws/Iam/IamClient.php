<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Aws\Iam;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Guzzle\Common\Collection;
use Guzzle\Service\Resource\Model;

/**
 * Client to interact with AWS Identity and Access Management
 *
 * @method Model addRoleToInstanceProfile(array $args = array()) {@command iam AddRoleToInstanceProfile}
 * @method Model addUserToGroup(array $args = array()) {@command iam AddUserToGroup}
 * @method Model changePassword(array $args = array()) {@command iam ChangePassword}
 * @method Model createAccessKey(array $args = array()) {@command iam CreateAccessKey}
 * @method Model createAccountAlias(array $args = array()) {@command iam CreateAccountAlias}
 * @method Model createGroup(array $args = array()) {@command iam CreateGroup}
 * @method Model createInstanceProfile(array $args = array()) {@command iam CreateInstanceProfile}
 * @method Model createLoginProfile(array $args = array()) {@command iam CreateLoginProfile}
 * @method Model createRole(array $args = array()) {@command iam CreateRole}
 * @method Model createUser(array $args = array()) {@command iam CreateUser}
 * @method Model createVirtualMFADevice(array $args = array()) {@command iam CreateVirtualMFADevice}
 * @method Model deactivateMFADevice(array $args = array()) {@command iam DeactivateMFADevice}
 * @method Model deleteAccessKey(array $args = array()) {@command iam DeleteAccessKey}
 * @method Model deleteAccountAlias(array $args = array()) {@command iam DeleteAccountAlias}
 * @method Model deleteAccountPasswordPolicy(array $args = array()) {@command iam DeleteAccountPasswordPolicy}
 * @method Model deleteGroup(array $args = array()) {@command iam DeleteGroup}
 * @method Model deleteGroupPolicy(array $args = array()) {@command iam DeleteGroupPolicy}
 * @method Model deleteInstanceProfile(array $args = array()) {@command iam DeleteInstanceProfile}
 * @method Model deleteLoginProfile(array $args = array()) {@command iam DeleteLoginProfile}
 * @method Model deleteRole(array $args = array()) {@command iam DeleteRole}
 * @method Model deleteRolePolicy(array $args = array()) {@command iam DeleteRolePolicy}
 * @method Model deleteServerCertificate(array $args = array()) {@command iam DeleteServerCertificate}
 * @method Model deleteSigningCertificate(array $args = array()) {@command iam DeleteSigningCertificate}
 * @method Model deleteUser(array $args = array()) {@command iam DeleteUser}
 * @method Model deleteUserPolicy(array $args = array()) {@command iam DeleteUserPolicy}
 * @method Model deleteVirtualMFADevice(array $args = array()) {@command iam DeleteVirtualMFADevice}
 * @method Model enableMFADevice(array $args = array()) {@command iam EnableMFADevice}
 * @method Model getAccountPasswordPolicy(array $args = array()) {@command iam GetAccountPasswordPolicy}
 * @method Model getAccountSummary(array $args = array()) {@command iam GetAccountSummary}
 * @method Model getGroup(array $args = array()) {@command iam GetGroup}
 * @method Model getGroupPolicy(array $args = array()) {@command iam GetGroupPolicy}
 * @method Model getInstanceProfile(array $args = array()) {@command iam GetInstanceProfile}
 * @method Model getLoginProfile(array $args = array()) {@command iam GetLoginProfile}
 * @method Model getRole(array $args = array()) {@command iam GetRole}
 * @method Model getRolePolicy(array $args = array()) {@command iam GetRolePolicy}
 * @method Model getServerCertificate(array $args = array()) {@command iam GetServerCertificate}
 * @method Model getUser(array $args = array()) {@command iam GetUser}
 * @method Model getUserPolicy(array $args = array()) {@command iam GetUserPolicy}
 * @method Model listAccessKeys(array $args = array()) {@command iam ListAccessKeys}
 * @method Model listAccountAliases(array $args = array()) {@command iam ListAccountAliases}
 * @method Model listGroupPolicies(array $args = array()) {@command iam ListGroupPolicies}
 * @method Model listGroups(array $args = array()) {@command iam ListGroups}
 * @method Model listGroupsForUser(array $args = array()) {@command iam ListGroupsForUser}
 * @method Model listInstanceProfiles(array $args = array()) {@command iam ListInstanceProfiles}
 * @method Model listInstanceProfilesForRole(array $args = array()) {@command iam ListInstanceProfilesForRole}
 * @method Model listMFADevices(array $args = array()) {@command iam ListMFADevices}
 * @method Model listRolePolicies(array $args = array()) {@command iam ListRolePolicies}
 * @method Model listRoles(array $args = array()) {@command iam ListRoles}
 * @method Model listServerCertificates(array $args = array()) {@command iam ListServerCertificates}
 * @method Model listSigningCertificates(array $args = array()) {@command iam ListSigningCertificates}
 * @method Model listUserPolicies(array $args = array()) {@command iam ListUserPolicies}
 * @method Model listUsers(array $args = array()) {@command iam ListUsers}
 * @method Model listVirtualMFADevices(array $args = array()) {@command iam ListVirtualMFADevices}
 * @method Model putGroupPolicy(array $args = array()) {@command iam PutGroupPolicy}
 * @method Model putRolePolicy(array $args = array()) {@command iam PutRolePolicy}
 * @method Model putUserPolicy(array $args = array()) {@command iam PutUserPolicy}
 * @method Model removeRoleFromInstanceProfile(array $args = array()) {@command iam RemoveRoleFromInstanceProfile}
 * @method Model removeUserFromGroup(array $args = array()) {@command iam RemoveUserFromGroup}
 * @method Model resyncMFADevice(array $args = array()) {@command iam ResyncMFADevice}
 * @method Model updateAccessKey(array $args = array()) {@command iam UpdateAccessKey}
 * @method Model updateAccountPasswordPolicy(array $args = array()) {@command iam UpdateAccountPasswordPolicy}
 * @method Model updateAssumeRolePolicy(array $args = array()) {@command iam UpdateAssumeRolePolicy}
 * @method Model updateGroup(array $args = array()) {@command iam UpdateGroup}
 * @method Model updateLoginProfile(array $args = array()) {@command iam UpdateLoginProfile}
 * @method Model updateServerCertificate(array $args = array()) {@command iam UpdateServerCertificate}
 * @method Model updateSigningCertificate(array $args = array()) {@command iam UpdateSigningCertificate}
 * @method Model updateUser(array $args = array()) {@command iam UpdateUser}
 * @method Model uploadServerCertificate(array $args = array()) {@command iam UploadServerCertificate}
 * @method Model uploadSigningCertificate(array $args = array()) {@command iam UploadSigningCertificate}
 */
class IamClient extends AbstractClient
{
    /**
     * Factory method to create a new AWS Identity and Access Management client using an array of configuration options.
     *
     * The following array keys and values are available options:
     *
     * - Credential options (`key`, `secret`, and optional `token` OR `credentials` is required)
     *     - key: AWS Access Key ID
     *     - secret: AWS secret access key
     *     - credentials: You can optionally provide a custom `Aws\Common\Credentials\CredentialsInterface` object
     *     - token: Custom AWS security token to use with request authentication
     *     - token.ttd: UNIX timestamp for when the custom credentials expire
     *     - credentials.cache.key: Optional custom cache key to use with the credentials
     * - Region and Endpoint options (a `region` and optional `scheme` OR a `base_url` is required)
     *     - region: Region name (e.g. 'us-east-1', 'us-west-1', 'us-west-2', 'eu-west-1', etc...)
     *     - scheme: URI Scheme of the base URL (e.g. 'https', 'http').
     *     - base_url: Instead of using a `region` and `scheme`, you can specify a custom base URL for the client
     *     - endpoint_provider: Optional `Aws\Common\Region\EndpointProviderInterface` used to provide region endpoints
     * - Generic client options
     *     - ssl.cert: Set to true to use the bundled CA cert or pass the full path to an SSL certificate bundle. This
     *           option should be used when you encounter curl error code 60.
     *     - curl.CURLOPT_VERBOSE: Set to true to output curl debug information during transfers
     *     - curl.*: Prefix any available cURL option with `curl.` to add cURL options to each request.
     *           See: http://www.php.net/manual/en/function.curl-setopt.php
     *     - service.description.cache.ttl: Optional TTL used for the service description cache
     * - Signature options
     *     - signature: You can optionally provide a custom signature implementation used to sign requests
     *     - signature.service: Set to explicitly override the service name used in signatures
     *     - signature.region:  Set to explicitly override the region name used in signatures
     * - Exponential backoff options
     *     - client.backoff.logger: `Guzzle\Common\Log\LogAdapterInterface` object used to log backoff retries. Use
     *           'debug' to emit PHP warnings when a retry is issued.
     *     - client.backoff.logger.template: Optional template to use for exponential backoff log messages. See
     *           `Guzzle\Http\Plugin\ExponentialBackoffLogger` for formatting information.
     *
     * @param array|Collection $config Client configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        return ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/iam-2010-05-08.php'
            ))
            ->build();
    }
}
