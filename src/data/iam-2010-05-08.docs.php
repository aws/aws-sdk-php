<?php return [
  'operations' => [
    'AddClientIDToOpenIDConnectProvider' => '<p>Adds a new client ID (also known as audience] to the list of client IDs already registered for the specified IAM OpenID Connect provider.</p> <p>This action is idempotent; it does not fail or return an error if you add an existing client ID to the provider.</p>',
    'AddRoleToInstanceProfile' => '<p>Adds the specified role to the specified instance profile. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. For more information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. </p>',
    'AddUserToGroup' => '<p>Adds the specified user to the specified group.</p>',
    'ChangePassword' => '<p>Changes the password of the IAM user who is calling this action. The root account password is not affected by this action. </p> <p>To change the password for a different user, see <a>UpdateLoginProfile</a>. For more information about modifying passwords, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_ManagingLogins.html">Managing Passwords</a> in the <i>Using IAM</i> guide. </p>',
    'CreateAccessKey' => '<p> Creates a new AWS secret access key and corresponding AWS access key ID for the specified user. The default status for new keys is <code>Active</code>. </p> <p> If you do not specify a user name, IAM determines the user name implicitly based on the AWS access key ID signing the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p> <p> For information about limits on the number of keys you can create, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p> <important> To ensure the security of your AWS account, the secret access key is accessible only during key and user creation. You must save the key (for example, in a text file] if you want to be able to access it again. If a secret key is lost, you can delete the access keys for the associated user and then create new keys. </important>',
    'CreateAccountAlias' => '<p>Creates an alias for your AWS account. For information about using an AWS account alias, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AccountAlias.html">Using an Alias for Your AWS Account ID</a> in the <i>Using IAM</i> guide. </p>',
    'CreateGroup' => '<p>Creates a new group.</p> <p> For information about the number of groups you can create, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p>',
    'CreateInstanceProfile' => '<p> Creates a new instance profile. For information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. </p> <p> For information about the number of instance profiles you can create, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p>',
    'CreateLoginProfile' => '<p> Creates a password for the specified user, giving the user the ability to access AWS services through the AWS Management Console. For more information about managing passwords, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_ManagingLogins.html">Managing Passwords</a> in the <i>Using IAM</i> guide. </p>',
    'CreateOpenIDConnectProvider' => '<p>Creates an IAM entity to describe an identity provider (IdP] that supports <a href="http://openid.net/connect/">OpenID Connect (OIDC]</a>. </p> <p>The OIDC provider that you create with this operation can be used as a principal in a role\'s trust policy to establish a trust relationship between AWS and the OIDC provider. </p> <p>When you create the IAM OIDC provider, you specify the URL of the OIDC identity provider (IdP] to trust, a list of client IDs (also known as audiences] that identify the application or applications that are allowed to authenticate using the OIDC provider, and a list of thumbprints of the server certificate(s] that the IdP uses. You get all of this information from the OIDC IdP that you want to use for access to AWS. </p> <note>Because trust for the OIDC provider is ultimately derived from the IAM provider that this action creates, it is a best practice to limit access to the <a>CreateOpenIDConnectProvider</a> action to highly-privileged users. </note>',
    'CreateRole' => '<p> Creates a new role for your AWS account. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. For information about limitations on role names and the number of roles you can create, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p> <p> The example policy grants permission to an EC2 instance to assume the role. The policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>. </p>',
    'CreateSAMLProvider' => '<p>Creates an IAM entity to describe an identity provider (IdP] that supports SAML 2.0.</p> <p> The SAML provider that you create with this operation can be used as a principal in a role\'s trust policy to establish a trust relationship between AWS and a SAML identity provider. You can create an IAM role that supports Web-based single sign-on (SSO] to the AWS Management Console or one that supports API access to AWS. </p> <p> When you create the SAML provider, you upload an a SAML metadata document that you get from your IdP and that includes the issuer\'s name, expiration information, and keys that can be used to validate the SAML authentication response (assertions] that are received from the IdP. You must generate the metadata document using the identity management software that is used as your organization\'s IdP. </p> <note> This operation requires <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. </note> <p> For more information, see <a href="http://docs.aws.amazon.com/STS/latest/UsingSTS/STSMgmtConsole-SAML.html">Giving Console Access Using SAML</a> and <a href="http://docs.aws.amazon.com/STS/latest/UsingSTS/CreatingSAML.html">Creating Temporary Security Credentials for SAML Federation</a> in the <i>Using Temporary Credentials</i> guide. </p>',
    'CreateUser' => '<p>Creates a new user for your AWS account.</p> <p> For information about limitations on the number of users you can create, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p>',
    'CreateVirtualMFADevice' => '<p> Creates a new virtual MFA device for the AWS account. After creating the virtual MFA, use <a href="http://docs.aws.amazon.com/IAM/latest/APIReference/API_EnableMFADevice.html">EnableMFADevice</a> to attach the MFA device to an IAM user. For more information about creating and working with virtual MFA devices, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_VirtualMFA.html">Using a Virtual MFA Device</a> in the <i>Using IAM</i> guide. </p> <p> For information about limits on the number of MFA devices you can create, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on Entities</a> in the <i>Using IAM</i> guide. </p> <important> The seed information contained in the QR code and the Base32 string should be treated like any other secret access information, such as your AWS access keys or your passwords. After you provision your virtual device, you should ensure that the information is destroyed following secure procedures. </important>',
    'DeactivateMFADevice' => '<p>Deactivates the specified MFA device and removes it from association with the user name for which it was originally enabled. </p> <p>For more information about creating and working with virtual MFA devices, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_VirtualMFA.html">Using a Virtual MFA Device</a> in the <i>Using IAM</i> guide. </p>',
    'DeleteAccessKey' => '<p>Deletes the access key associated with the specified user.</p> <p> If you do not specify a user name, IAM determines the user name implicitly based on the AWS access key ID signing the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p>',
    'DeleteAccountAlias' => '<p> Deletes the specified AWS account alias. For information about using an AWS account alias, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AccountAlias.html">Using an Alias for Your AWS Account ID</a> in the <i>Using IAM</i> guide. </p>',
    'DeleteAccountPasswordPolicy' => '<p>Deletes the password policy for the AWS account.</p>',
    'DeleteGroup' => '<p> Deletes the specified group. The group must not contain any users or have any attached policies. </p>',
    'DeleteGroupPolicy' => '<p>Deletes the specified policy that is associated with the specified group.</p>',
    'DeleteInstanceProfile' => '<p> Deletes the specified instance profile. The instance profile must not have an associated role. </p> <important> Make sure you do not have any Amazon EC2 instances running with the instance profile you are about to delete. Deleting a role or instance profile that is associated with a running instance will break any applications running on the instance. </important> <p> For more information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. </p>',
    'DeleteLoginProfile' => '<p> Deletes the password for the specified user, which terminates the user\'s ability to access AWS services through the AWS Management Console. </p> <important> Deleting a user\'s password does not prevent a user from accessing IAM through the command line interface or the API. To prevent all user access you must also either make the access key inactive or delete it. For more information about making keys inactive or deleting them, see <a>UpdateAccessKey</a> and <a>DeleteAccessKey</a>. </important>',
    'DeleteOpenIDConnectProvider' => '<p>Deletes an IAM OpenID Connect identity provider.</p> <p>Deleting an OIDC provider does not update any roles that reference the provider as a principal in their trust policies. Any attempt to assume a role that references a provider that has been deleted will fail. </p> <p>This action is idempotent; it does not fail or return an error if you call the action for a provider that was already deleted.</p>',
    'DeleteRole' => '<p> Deletes the specified role. The role must not have any policies attached. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. </p> <important> Make sure you do not have any Amazon EC2 instances running with the role you are about to delete. Deleting a role or instance profile that is associated with a running instance will break any applications running on the instance. </important>',
    'DeleteRolePolicy' => '<p>Deletes the specified policy associated with the specified role.</p>',
    'DeleteSAMLProvider' => '<p>Deletes a SAML provider.</p> <p> Deleting the provider does not update any roles that reference the SAML provider as a principal in their trust policies. Any attempt to assume a role that references a SAML provider that has been deleted will fail. </p> <note> This operation requires <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. </note>',
    'DeleteServerCertificate' => '<p>Deletes the specified server certificate.</p> <important> If you are using a server certificate with Elastic Load Balancing, deleting the certificate could have implications for your application. If Elastic Load Balancing doesn\'t detect the deletion of bound certificates, it may continue to use the certificates. This could cause Elastic Load Balancing to stop accepting traffic. We recommend that you remove the reference to the certificate from Elastic Load Balancing before using this command to delete the certificate. For more information, go to <a href="http://docs.aws.amazon.com/ElasticLoadBalancing/latest/APIReference/API_DeleteLoadBalancerListeners.html" target="blank">DeleteLoadBalancerListeners</a> in the <i>Elastic Load Balancing API Reference</i>. </important>',
    'DeleteSigningCertificate' => '<p>Deletes the specified signing certificate associated with the specified user.</p> <p> If you do not specify a user name, IAM determines the user name implicitly based on the AWS access key ID signing the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p>',
    'DeleteUser' => '<p> Deletes the specified user. The user must not belong to any groups, have any keys or signing certificates, or have any attached policies. </p>',
    'DeleteUserPolicy' => '<p>Deletes the specified policy associated with the specified user.</p>',
    'DeleteVirtualMFADevice' => '<p>Deletes a virtual MFA device.</p> <note> You must deactivate a user\'s virtual MFA device before you can delete it. For information about deactivating MFA devices, see <a href="http://docs.aws.amazon.com/IAM/latest/APIReference/API_DeactivateMFADevice.html">DeactivateMFADevice</a>. </note>',
    'EnableMFADevice' => '<p> Enables the specified MFA device and associates it with the specified user name. When enabled, the MFA device is required for every subsequent login by the user name associated with the device. </p>',
    'GenerateCredentialReport' => '<p> Generates a credential report for the AWS account. For more information about the credential report, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/credential-reports.html">Getting Credential Reports</a> in the <i>Using IAM</i> guide. </p>',
    'GetAccountAuthorizationDetails' => '<p>Retrieves information about all IAM users, groups, and roles in your account, including their relationships to one another and their attached policies. Use this API to obtain a snapshot of the configuration of IAM permissions (users, groups, roles, and policies] in your account.</p> <p>You can optionally filter the results using the <code>Filter</code> parameter. You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters.</p>',
    'GetAccountPasswordPolicy' => '<p> Retrieves the password policy for the AWS account. For more information about using a password policy, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_ManagingPasswordPolicies.html">Managing an IAM Password Policy</a>. </p>',
    'GetAccountSummary' => '<p>Retrieves account level information about account entity usage and IAM quotas.</p> <p> For information about limitations on IAM entities, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p>',
    'GetCredentialReport' => '<p> Retrieves a credential report for the AWS account. For more information about the credential report, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/credential-reports.html">Getting Credential Reports</a> in the <i>Using IAM</i> guide. </p>',
    'GetGroup' => '<p> Returns a list of users that are in the specified group. You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'GetGroupPolicy' => '<p> Retrieves the specified policy document for the specified group. The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>. </p>',
    'GetInstanceProfile' => '<p> Retrieves information about the specified instance profile, including the instance profile\'s path, GUID, ARN, and role. For more information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. For more information about ARNs, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html#Identifiers_ARNs">ARNs</a>. </p>',
    'GetLoginProfile' => '<p> Retrieves the user name and password-creation date for the specified user. If the user has not been assigned a password, the action returns a 404 (<code>NoSuchEntity</code>] error. </p>',
    'GetOpenIDConnectProvider' => '<p>Returns information about the specified OpenID Connect provider.</p>',
    'GetRole' => '<p> Retrieves information about the specified role, including the role\'s path, GUID, ARN, and the policy granting permission to assume the role. For more information about ARNs, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html#Identifiers_ARNs">ARNs</a>. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. </p> <p> The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>. </p>',
    'GetRolePolicy' => '<p> Retrieves the specified policy document for the specified role. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. </p> <p> The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>. </p>',
    'GetSAMLProvider' => '<p> Returns the SAML provider metadocument that was uploaded when the provider was created or updated. </p> <note> This operation requires <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. </note>',
    'GetServerCertificate' => '<p>Retrieves information about the specified server certificate.</p>',
    'GetUser' => '<p>Retrieves information about the specified user, including the user\'s creation date, path, unique ID, and ARN. </p> <p>If you do not specify a user name, IAM determines the user name implicitly based on the AWS access key ID used to sign the request. </p>',
    'GetUserPolicy' => '<p> Retrieves the specified policy document for the specified user. The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>. </p>',
    'ListAccessKeys' => '<p> Returns information about the access key IDs associated with the specified user. If there are none, the action returns an empty list. </p> <p> Although each user is limited to a small number of keys, you can still paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p> <p> If the <code>UserName</code> field is not specified, the UserName is determined implicitly based on the AWS access key ID used to sign the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p> <note> To ensure the security of your AWS account, the secret access key is accessible only during key and user creation. </note>',
    'ListAccountAliases' => '<p> Lists the account aliases associated with the account. For information about using an AWS account alias, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AccountAlias.html">Using an Alias for Your AWS Account ID</a> in the <i>Using IAM</i> guide. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListGroupPolicies' => '<p> Lists the names of the policies associated with the specified group. If there are none, the action returns an empty list. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListGroups' => '<p>Lists the groups that have the specified path prefix.</p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListGroupsForUser' => '<p>Lists the groups the specified user belongs to.</p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListInstanceProfiles' => '<p> Lists the instance profiles that have the specified path prefix. If there are none, the action returns an empty list. For more information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListInstanceProfilesForRole' => '<p> Lists the instance profiles that have the specified associated role. If there are none, the action returns an empty list. For more information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListMFADevices' => '<p> Lists the MFA devices. If the request includes the user name, then this action lists all the MFA devices associated with the specified user name. If you do not specify a user name, IAM determines the user name implicitly based on the AWS access key ID signing the request. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListOpenIDConnectProviders' => '<p>Lists information about the OpenID Connect providers in the AWS account. </p>',
    'ListRolePolicies' => '<p> Lists the names of the policies associated with the specified role. If there are none, the action returns an empty list. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListRoles' => '<p> Lists the roles that have the specified path prefix. If there are none, the action returns an empty list. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p> <p> The returned policy is URL-encoded according to RFC 3986. For more information about RFC 3986, go to <a href="http://www.faqs.org/rfcs/rfc3986.html">http://www.faqs.org/rfcs/rfc3986.html</a>. </p>',
    'ListSAMLProviders' => '<p>Lists the SAML providers in the account.</p> <note> This operation requires <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. </note>',
    'ListServerCertificates' => '<p> Lists the server certificates that have the specified path prefix. If none exist, the action returns an empty list. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListSigningCertificates' => '<p> Returns information about the signing certificates associated with the specified user. If there are none, the action returns an empty list. </p> <p> Although each user is limited to a small number of signing certificates, you can still paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p> <p> If the <code>UserName</code> field is not specified, the user name is determined implicitly based on the AWS access key ID used to sign the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p>',
    'ListUserPolicies' => '<p> Lists the names of the policies associated with the specified user. If there are none, the action returns an empty list. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListUsers' => '<p>Lists the IAM users that have the specified path prefix. If no path prefix is specified, the action returns all users in the AWS account. If there are none, the action returns an empty list. </p> <p>You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'ListVirtualMFADevices' => '<p> Lists the virtual MFA devices under the AWS account by assignment status. If you do not specify an assignment status, the action returns a list of all virtual MFA devices. Assignment status can be <code>Assigned</code>, <code>Unassigned</code>, or <code>Any</code>. </p> <p> You can paginate the results using the <code>MaxItems</code> and <code>Marker</code> parameters. </p>',
    'PutGroupPolicy' => '<p> Adds (or updates] a policy document associated with the specified group. For information about policies, refer to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PoliciesOverview.html">Overview of Policies</a> in the <i>Using IAM</i> guide. </p> <p> For information about limits on the number of policies you can associate with a group, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p> <note> Because policy documents can be large, you should use POST rather than GET when calling <code>PutGroupPolicy</code>. For information about setting up signatures and authorization through the API, go to <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a> in the <i>AWS General Reference</i>. For general information about using the Query API with IAM, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html">Making Query Requests</a> in the <i>Using IAM</i> guide. </note>',
    'PutRolePolicy' => '<p> Adds (or updates] a policy document associated with the specified role. For information about policies, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PoliciesOverview.html">Overview of Policies</a> in the <i>Using IAM</i> guide. </p> <p> For information about limits on the policies you can associate with a role, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p> <note> Because policy documents can be large, you should use POST rather than GET when calling <code>PutRolePolicy</code>. For information about setting up signatures and authorization through the API, go to <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a> in the <i>AWS General Reference</i>. For general information about using the Query API with IAM, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html">Making Query Requests</a> in the <i>Using IAM</i> guide. </note>',
    'PutUserPolicy' => '<p> Adds (or updates] a policy document associated with the specified user. For information about policies, refer to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PoliciesOverview.html">Overview of Policies</a> in the <i>Using IAM</i> guide. </p> <p> For information about limits on the number of policies you can associate with a user, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p> <note> Because policy documents can be large, you should use POST rather than GET when calling <code>PutUserPolicy</code>. For information about setting up signatures and authorization through the API, go to <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a> in the <i>AWS General Reference</i>. For general information about using the Query API with IAM, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html">Making Query Requests</a> in the <i>Using IAM</i> guide. </note>',
    'RemoveClientIDFromOpenIDConnectProvider' => '<p>Removes the specified client ID (also known as audience] from the list of client IDs registered for the specified IAM OpenID Connect provider.</p> <p>This action is idempotent; it does not fail or return an error if you try to remove a client ID that was removed previously.</p>',
    'RemoveRoleFromInstanceProfile' => '<p>Removes the specified role from the specified instance profile.</p> <important> Make sure you do not have any Amazon EC2 instances running with the role you are about to remove from the instance profile. Removing a role from an instance profile that is associated with a running instance will break any applications running on the instance. </important> <p> For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. For more information about instance profiles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/AboutInstanceProfiles.html">About Instance Profiles</a>. </p>',
    'RemoveUserFromGroup' => '<p>Removes the specified user from the specified group.</p>',
    'ResyncMFADevice' => '<p>Synchronizes the specified MFA device with AWS servers.</p> <p>For more information about creating and working with virtual MFA devices, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_VirtualMFA.html">Using a Virtual MFA Device</a> in the <i>Using IAM</i> guide. </p>',
    'UpdateAccessKey' => '<p> Changes the status of the specified access key from Active to Inactive, or vice versa. This action can be used to disable a user\'s key as part of a key rotation work flow. </p> <p> If the <code>UserName</code> field is not specified, the UserName is determined implicitly based on the AWS access key ID used to sign the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p> <p> For information about rotating keys, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/ManagingCredentials.html">Managing Keys and Certificates</a> in the <i>Using IAM</i> guide. </p>',
    'UpdateAccountPasswordPolicy' => '<p>Updates the password policy settings for the AWS account.</p> <note> <p> This action does not support partial updates. No parameters are required, but if you do not specify a parameter, that parameter\'s value reverts to its default value. See the <b>Request Parameters</b> section for each parameter\'s default value. </p> </note> <p> For more information about using a password policy, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_ManagingPasswordPolicies.html">Managing an IAM Password Policy</a> in the <i>Using IAM</i> guide. </p>',
    'UpdateAssumeRolePolicy' => '<p> Updates the policy that grants an entity permission to assume a role. For more information about roles, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/WorkingWithRoles.html">Working with Roles</a>. </p>',
    'UpdateGroup' => '<p>Updates the name and/or the path of the specified group.</p> <important> You should understand the implications of changing a group\'s path or name. For more information, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_WorkingWithGroupsAndUsers.html">Renaming Users and Groups</a> in the <i>Using IAM</i> guide. </important> <note> To change a group name the requester must have appropriate permissions on both the source object and the target object. For example, to change Managers to MGRs, the entity making the request must have permission on Managers and MGRs, or must have permission on all (*]. For more information about permissions, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PermissionsAndPolicies.html" target="blank">Permissions and Policies</a>. </note>',
    'UpdateLoginProfile' => '<p>Changes the password for the specified user.</p> <p>Users can change their own passwords by calling <a>ChangePassword</a>. For more information about modifying passwords, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_ManagingLogins.html">Managing Passwords</a> in the <i>Using IAM</i> guide. </p>',
    'UpdateOpenIDConnectProviderThumbprint' => '<p>Replaces the existing list of server certificate thumbprints with a new list. </p> <p>The list that you pass with this action completely replaces the existing list of thumbprints. (The lists are not merged.]</p> <p>Typically, you need to update a thumbprint only when the identity provider\'s certificate changes, which occurs rarely. However, if the provider\'s certificate <i>does</i> change, any attempt to assume an IAM role that specifies the IAM provider as a principal will fail until the certificate thumbprint is updated.</p> <note>Because trust for the OpenID Connect provider is ultimately derived from the provider\'s certificate and is validated by the thumbprint, it is a best practice to limit access to the <code>UpdateOpenIDConnectProviderThumbprint</code> action to highly-privileged users. </note>',
    'UpdateSAMLProvider' => '<p>Updates the metadata document for an existing SAML provider.</p> <note> This operation requires <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. </note>',
    'UpdateServerCertificate' => '<p>Updates the name and/or the path of the specified server certificate.</p> <important> You should understand the implications of changing a server certificate\'s path or name. For more information, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/ManagingServerCerts.html">Managing Server Certificates</a> in the <i>Using IAM</i> guide. </important> <note> To change a server certificate name the requester must have appropriate permissions on both the source object and the target object. For example, to change the name from ProductionCert to ProdCert, the entity making the request must have permission on ProductionCert and ProdCert, or must have permission on all (*]. For more information about permissions, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PermissionsAndPolicies.html" target="blank">Permissions and Policies</a>. </note>',
    'UpdateSigningCertificate' => '<p> Changes the status of the specified signing certificate from active to disabled, or vice versa. This action can be used to disable a user\'s signing certificate as part of a certificate rotation work flow. </p> <p> If the <code>UserName</code> field is not specified, the UserName is determined implicitly based on the AWS access key ID used to sign the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p> <p> For information about rotating certificates, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/ManagingCredentials.html">Managing Keys and Certificates</a> in the <i>Using IAM</i> guide. </p>',
    'UpdateUser' => '<p>Updates the name and/or the path of the specified user.</p> <important> You should understand the implications of changing a user\'s path or name. For more information, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_WorkingWithGroupsAndUsers.html">Renaming Users and Groups</a> in the <i>Using IAM</i> guide. </important> <note> To change a user name the requester must have appropriate permissions on both the source object and the target object. For example, to change Bob to Robert, the entity making the request must have permission on Bob and Robert, or must have permission on all (*]. For more information about permissions, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/PermissionsAndPolicies.html" target="blank">Permissions and Policies</a>. </note>',
    'UploadServerCertificate' => '<p> Uploads a server certificate entity for the AWS account. The server certificate entity includes a public key certificate, a private key, and an optional certificate chain, which should all be PEM-encoded. </p> <p> For information about the number of server certificates you can upload, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/LimitationsOnEntities.html">Limitations on IAM Entities</a> in the <i>Using IAM</i> guide. </p> <note> Because the body of the public key certificate, private key, and the certificate chain can be large, you should use POST rather than GET when calling <code>UploadServerCertificate</code>. For information about setting up signatures and authorization through the API, go to <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a> in the <i>AWS General Reference</i>. For general information about using the Query API with IAM, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html">Making Query Requests</a> in the <i>Using IAM</i> guide. </note>',
    'UploadSigningCertificate' => '<p> Uploads an X.509 signing certificate and associates it with the specified user. Some AWS services use X.509 signing certificates to validate requests that are signed with a corresponding private key. When you upload the certificate, its default status is <code>Active</code>. </p> <p> If the <code>UserName</code> field is not specified, the user name is determined implicitly based on the AWS access key ID used to sign the request. Because this action works for access keys under the AWS account, you can use this action to manage root credentials even if the AWS account has no associated users. </p> <note> Because the body of a X.509 certificate can be large, you should use POST rather than GET when calling <code>UploadSigningCertificate</code>. For information about setting up signatures and authorization through the API, go to <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a> in the <i>AWS General Reference</i>. For general information about using the Query API with IAM, go to <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html">Making Query Requests</a> in the <i>Using IAM</i>guide. </note>',
  ],
  'service' => '<fullname>AWS Identity and Access Management</fullname> <p> AWS Identity and Access Management (IAM] is a web service that you can use to manage users and user permissions under your AWS account. This guide provides descriptions of IAM actions that you can call programmatically. For general information about IAM, see <a href="http://aws.amazon.com/iam/">AWS Identity and Access Management (IAM]</a>. For the user guide for IAM, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/">Using IAM</a>. </p> <note> AWS provides SDKs that consist of libraries and sample code for various programming languages and platforms (Java, Ruby, .NET, iOS, Android, etc.]. The SDKs provide a convenient way to create programmatic access to IAM and AWS. For example, the SDKs take care of tasks such as cryptographically signing requests (see below], managing errors, and retrying requests automatically. For information about the AWS SDKs, including how to download and install them, see the <a href="http://aws.amazon.com/tools/">Tools for Amazon Web Services</a> page. </note> <p> We recommend that you use the AWS SDKs to make programmatic API calls to IAM. However, you can also use the IAM Query API to make direct calls to the IAM web service. To learn more about the IAM Query API, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAM_UsingQueryAPI.html">Making Query Requests</a> in the <i>Using IAM</i> guide. IAM supports GET and POST requests for all actions. That is, the API does not require you to use GET for some actions and POST for others. However, GET requests are subject to the limitation size of a URL. Therefore, for operations that require larger sizes, use a POST request. </p> <p><b>Signing Requests</b></p> <p> Requests must be signed using an access key ID and a secret access key. We strongly recommend that you do not use your AWS account access key ID and secret access key for everyday work with IAM. You can use the access key ID and secret access key for an IAM user or you can use the AWS Security Token Service to generate temporary security credentials and use those to sign requests. </p> <p> To sign requests, we recommend that you use <a href="http://docs.aws.amazon.com/general/latest/gr/signature-version-4.html">Signature Version 4</a>. If you have an existing application that uses Signature Version 2, you do not have to update it to use Signature Version 4. However, some operations now require Signature Version 4. The documentation for operations that require version 4 indicate this requirement. </p> <p><b>Recording API requests</b></p> <p> IAM supports AWS CloudTrail, which is a service that records AWS calls for your AWS account and delivers log files to an Amazon S3 bucket. By using information collected by CloudTrail, you can determine what requests were successfully made to IAM, who made the request, when it was made, and so on. To learn more about CloudTrail, including how to turn it on and find your log files, see the <a href="http://docs.aws.amazon.com/awscloudtrail/latest/userguide/whatisawscloudtrail.html">AWS CloudTrail User Guide</a>. </p> <p><b>Additional Resources</b></p> <p>For more information, see the following:</p> <ul> <li> <a href="http://docs.aws.amazon.com/general/latest/gr/aws-security-credentials.html">AWS Security Credentials</a>. This topic provides general information about the types of credentials used for accessing AWS. </li> <li> <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/IAMBestPractices.html">IAM Best Practices</a>. This topic presents a list of suggestions for using the IAM service to help secure your AWS resources. </li> <li> <a href="http://docs.aws.amazon.com/STS/latest/UsingSTS/">AWS Security Token Service</a>. This guide describes how to create and use temporary security credentials. </li> <li> <a href="http://docs.aws.amazon.com/general/latest/gr/signing_aws_api_requests.html">Signing AWS API Requests</a>. This set of topics walk you through the process of signing a request using an access key ID and secret access key. </li> </ul>',
  'shapes' => [
    'AccessKey' => [
      'base' => '<p>Contains information about an AWS access key.</p> <p> This data type is used as a response element in the <a>CreateAccessKey</a> and <a>ListAccessKeys</a> actions. </p> <note>The <code>SecretAccessKey</code> value is returned only in response to <a>CreateAccessKey</a>. You can get a secret access key only when you first create an access key; you cannot recover the secret access key later. If you lose a secret access key, you must create a new access key. </note>',
      'refs' => [
        'CreateAccessKeyResponse$AccessKey' => '<p>Information about the access key.</p>',
      ],
    ],
    'AccessKeyMetadata' => [
      'base' => '<p>Contains information about an AWS access key, without its secret key.</p> <p>This data type is used as a response element in the <a>ListAccessKeys</a> action.</p>',
      'refs' => [
        'accessKeyMetadataListType$member' => NULL,
      ],
    ],
    'AddClientIDToOpenIDConnectProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'AddRoleToInstanceProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'AddUserToGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'BootstrapDatum' => [
      'base' => NULL,
      'refs' => [
        'VirtualMFADevice$Base32StringSeed' => '<p> The Base32 seed defined as specified in <a href="http://www.ietf.org/rfc/rfc3548.txt">RFC3548</a>. The <code>Base32StringSeed</code> is Base64-encoded. </p>',
        'VirtualMFADevice$QRCodePNG' => '<p> A QR code PNG image that encodes <code>otpauth://totp/$virtualMFADeviceName@$AccountName?secret=$Base32String</code> where <code>$virtualMFADeviceName</code> is one of the create call arguments, <code>AccountName</code> is the user name if set (otherwise, the account ID otherwise], and <code>Base32String</code> is the seed in Base32 format. The <code>Base32String</code> value is Base64-encoded. </p>',
      ],
    ],
    'ChangePasswordRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateAccessKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateAccessKeyResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateAccessKey</a> action.</p>',
      'refs' => [],
    ],
    'CreateAccountAliasRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateGroupResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateGroup</a> action.</p>',
      'refs' => [],
    ],
    'CreateInstanceProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateInstanceProfileResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateInstanceProfile</a>action.</p>',
      'refs' => [],
    ],
    'CreateLoginProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateLoginProfileResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateLoginProfile</a> action.</p>',
      'refs' => [],
    ],
    'CreateOpenIDConnectProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateOpenIDConnectProviderResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateOpenIDConnectProvider</a> action.</p>',
      'refs' => [],
    ],
    'CreateRoleRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateRoleResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateRole</a> action.</p>',
      'refs' => [],
    ],
    'CreateSAMLProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateSAMLProviderResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateSAMLProvider</a> action.</p>',
      'refs' => [],
    ],
    'CreateUserRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateUserResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateUser</a> action.</p>',
      'refs' => [],
    ],
    'CreateVirtualMFADeviceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'CreateVirtualMFADeviceResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>CreateVirtualMFADevice</a> action.</p>',
      'refs' => [],
    ],
    'CredentialReportExpiredException' => [
      'base' => '<p> The request was rejected because the most recent credential report has expired. To generate a new credential report, use <a>GenerateCredentialReport</a>. For more information about credential report expiration, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/credential-reports.html">Getting Credential Reports</a> in the <i>Using IAM</i> guide. </p>',
      'refs' => [],
    ],
    'CredentialReportNotPresentException' => [
      'base' => '<p> The request was rejected because the credential report does not exist. To generate a credential report, use <a>GenerateCredentialReport</a>. </p>',
      'refs' => [],
    ],
    'CredentialReportNotReadyException' => [
      'base' => '<p>The request was rejected because the credential report is still being generated.</p>',
      'refs' => [],
    ],
    'DeactivateMFADeviceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteAccessKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteAccountAliasRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteConflictException' => [
      'base' => '<p> The request was rejected because it attempted to delete a resource that has attached subordinate entities. The error message describes these entities. </p>',
      'refs' => [],
    ],
    'DeleteGroupPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteInstanceProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteLoginProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteOpenIDConnectProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteRolePolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteRoleRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteSAMLProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteServerCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteSigningCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteUserPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteUserRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DeleteVirtualMFADeviceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'DuplicateCertificateException' => [
      'base' => '<p> The request was rejected because the same certificate is associated to another user under the account. </p>',
      'refs' => [],
    ],
    'EnableMFADeviceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'EntityAlreadyExistsException' => [
      'base' => '<p>The request was rejected because it attempted to create a resource that already exists.</p>',
      'refs' => [],
    ],
    'EntityTemporarilyUnmodifiableException' => [
      'base' => '<p> The request was rejected because it referenced an entity that is temporarily unmodifiable, such as a user name that was deleted and then recreated. The error indicates that the request is likely to succeed if you try again after waiting several minutes. The error message describes the entity. </p>',
      'refs' => [],
    ],
    'EntityType' => [
      'base' => NULL,
      'refs' => [
        'entityListType$member' => NULL,
      ],
    ],
    'GenerateCredentialReportResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GenerateCredentialReport</a> action.</p>',
      'refs' => [],
    ],
    'GetAccountAuthorizationDetailsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetAccountAuthorizationDetailsResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetAccountAuthorizationDetails</a> action.</p>',
      'refs' => [],
    ],
    'GetAccountPasswordPolicyResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetAccountPasswordPolicy</a> action.</p>',
      'refs' => [],
    ],
    'GetAccountSummaryResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetAccountSummary</a> action.</p>',
      'refs' => [],
    ],
    'GetCredentialReportResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetCredentialReport</a> action.</p>',
      'refs' => [],
    ],
    'GetGroupPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetGroupPolicyResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetGroupPolicy</a> action.</p>',
      'refs' => [],
    ],
    'GetGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetGroupResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetGroup</a> action.</p>',
      'refs' => [],
    ],
    'GetInstanceProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetInstanceProfileResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetInstanceProfile</a> action.</p>',
      'refs' => [],
    ],
    'GetLoginProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetLoginProfileResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetLoginProfile</a> action.</p>',
      'refs' => [],
    ],
    'GetOpenIDConnectProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetOpenIDConnectProviderResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetOpenIDConnectProvider</a> action.</p>',
      'refs' => [],
    ],
    'GetRolePolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetRolePolicyResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetRolePolicy</a> action.</p>',
      'refs' => [],
    ],
    'GetRoleRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetRoleResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetRole</a> action.</p>',
      'refs' => [],
    ],
    'GetSAMLProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetSAMLProviderResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetSAMLProvider</a> action.</p>',
      'refs' => [],
    ],
    'GetServerCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetServerCertificateResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetServerCertificate</a> action.</p>',
      'refs' => [],
    ],
    'GetUserPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetUserPolicyResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetUserPolicy</a> action.</p>',
      'refs' => [],
    ],
    'GetUserRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'GetUserResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>GetUser</a> action.</p>',
      'refs' => [],
    ],
    'Group' => [
      'base' => '<p>Contains information about an IAM group entity.</p> <p> This data type is used as a response element in the following actions:</p> <ul> <li><a>CreateGroup</a></li> <li><a>GetGroup</a></li> <li><a>ListGroups</a></li> </ul>',
      'refs' => [
        'CreateGroupResponse$Group' => '<p>Information about the group.</p>',
        'GetGroupResponse$Group' => '<p>Information about the group.</p>',
        'groupListType$member' => NULL,
      ],
    ],
    'GroupDetail' => [
      'base' => '<p>Contains information about an IAM group, including all of the policies attached to the group. </p> <p>The data type is used as a response element in the <a>GetAccountAuthorizationDetails</a> action.</p>',
      'refs' => [
        'groupDetailListType$member' => NULL,
      ],
    ],
    'InstanceProfile' => [
      'base' => '<p>Contains information about an instance profile.</p> <p>This data type is used as a response element in the following actions:</p> <ul> <li><p><a>CreateInstanceProfile</a></p></li> <li><p><a>GetInstanceProfile</a></p></li> <li><p><a>ListInstanceProfiles</a></p></li> <li><p><a>ListInstanceProfilesForRole</a></p></li> </ul>',
      'refs' => [
        'CreateInstanceProfileResponse$InstanceProfile' => '<p>Information about the instance profile.</p>',
        'GetInstanceProfileResponse$InstanceProfile' => '<p>Information about the instance profile.</p>',
        'instanceProfileListType$member' => NULL,
      ],
    ],
    'InvalidAuthenticationCodeException' => [
      'base' => '<p> The request was rejected because the authentication code was not recognized. The error message describes the specific error. </p>',
      'refs' => [],
    ],
    'InvalidCertificateException' => [
      'base' => '<p>The request was rejected because the certificate is invalid.</p>',
      'refs' => [],
    ],
    'InvalidInputException' => [
      'base' => '<p>The request was rejected because an invalid or out-of-range value was supplied for an input parameter.</p>',
      'refs' => [],
    ],
    'InvalidUserTypeException' => [
      'base' => '<p>The request was rejected because the type of user for the transaction was incorrect.</p>',
      'refs' => [],
    ],
    'KeyPairMismatchException' => [
      'base' => '<p>The request was rejected because the public key certificate and the private key do not match.</p>',
      'refs' => [],
    ],
    'LimitExceededException' => [
      'base' => '<p> The request was rejected because it attempted to create resources beyond the current AWS account limits. The error message describes the limit exceeded. </p>',
      'refs' => [],
    ],
    'ListAccessKeysRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListAccessKeysResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListAccessKeys</a> action.</p>',
      'refs' => [],
    ],
    'ListAccountAliasesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListAccountAliasesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListAccountAliases</a> action.</p>',
      'refs' => [],
    ],
    'ListGroupPoliciesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListGroupPoliciesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListGroupPolicies</a> action.</p>',
      'refs' => [],
    ],
    'ListGroupsForUserRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListGroupsForUserResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListGroupsForUser</a> action.</p>',
      'refs' => [],
    ],
    'ListGroupsRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListGroupsResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListGroups</a> action.</p>',
      'refs' => [],
    ],
    'ListInstanceProfilesForRoleRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListInstanceProfilesForRoleResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListInstanceProfilesForRole</a> action.</p>',
      'refs' => [],
    ],
    'ListInstanceProfilesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListInstanceProfilesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListInstanceProfiles</a> action.</p>',
      'refs' => [],
    ],
    'ListMFADevicesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListMFADevicesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListMFADevices</a> action.</p>',
      'refs' => [],
    ],
    'ListOpenIDConnectProvidersRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListOpenIDConnectProvidersResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListOpenIDConnectProviders</a> action.</p>',
      'refs' => [],
    ],
    'ListRolePoliciesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListRolePoliciesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListRolePolicies</a> action.</p>',
      'refs' => [],
    ],
    'ListRolesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListRolesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListRoles</a> action.</p>',
      'refs' => [],
    ],
    'ListSAMLProvidersRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListSAMLProvidersResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListSAMLProviders</a> action.</p>',
      'refs' => [],
    ],
    'ListServerCertificatesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListServerCertificatesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListServerCertificates</a> action.</p>',
      'refs' => [],
    ],
    'ListSigningCertificatesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListSigningCertificatesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListSigningCertificates</a> action.</p>',
      'refs' => [],
    ],
    'ListUserPoliciesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListUserPoliciesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListUserPolicies</a> action.</p>',
      'refs' => [],
    ],
    'ListUsersRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListUsersResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListUsers</a> action.</p>',
      'refs' => [],
    ],
    'ListVirtualMFADevicesRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ListVirtualMFADevicesResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>ListVirtualMFADevices</a>action.</p>',
      'refs' => [],
    ],
    'LoginProfile' => [
      'base' => '<p>Contains the user name and password create date for a user.</p> <p> This data type is used as a response element in the <a>CreateLoginProfile</a> and <a>GetLoginProfile</a> actions. </p>',
      'refs' => [
        'CreateLoginProfileResponse$LoginProfile' => '<p>The user name and password create date.</p>',
        'GetLoginProfileResponse$LoginProfile' => '<p>The user name and password create date for the user.</p>',
      ],
    ],
    'MFADevice' => [
      'base' => '<p>Contains information about an MFA device.</p> <p>This data type is used as a response element in the <a>ListMFADevices</a> action.</p>',
      'refs' => [
        'mfaDeviceListType$member' => NULL,
      ],
    ],
    'MalformedCertificateException' => [
      'base' => '<p> The request was rejected because the certificate was malformed or expired. The error message describes the specific error. </p>',
      'refs' => [],
    ],
    'MalformedPolicyDocumentException' => [
      'base' => '<p> The request was rejected because the policy document was malformed. The error message describes the specific error. </p>',
      'refs' => [],
    ],
    'NoSuchEntityException' => [
      'base' => '<p> The request was rejected because it referenced an entity that does not exist. The error message describes the entity. </p>',
      'refs' => [],
    ],
    'OpenIDConnectProviderListEntry' => [
      'base' => '<p>Contains the Amazon Resource Name (ARN] for an IAM OpenID Connect provider.</p>',
      'refs' => [
        'OpenIDConnectProviderListType$member' => NULL,
      ],
    ],
    'OpenIDConnectProviderListType' => [
      'base' => '<p>Contains a list of IAM OpenID Connect providers.</p>',
      'refs' => [
        'ListOpenIDConnectProvidersResponse$OpenIDConnectProviderList' => '<p>The list of IAM OpenID Connect providers in the AWS account.</p>',
      ],
    ],
    'OpenIDConnectProviderUrlType' => [
      'base' => '<p>Contains a URL that specifies the endpoint for an OpenID Connect provider.</p>',
      'refs' => [
        'CreateOpenIDConnectProviderRequest$Url' => '<p>The URL of the identity provider. The URL must begin with "https://" and should correspond to the <code>iss</code> claim in the provider\'s OpenID Connect ID tokens. Per the OIDC standard, path components are allowed but query parameters are not. Typically the URL consists of only a host name, like "https://server.example.org" or "https://example.com". </p> <p>You cannot register the same provider multiple times in a single AWS account. If you try to submit a URL that has already been used for an OpenID Connect provider in the AWS account, you will get an error. </p>',
        'GetOpenIDConnectProviderResponse$Url' => '<p>The URL that the IAM OpenID Connect provider is associated with. For more information, see <a>CreateOpenIDConnectProvider</a>. </p>',
      ],
    ],
    'PasswordPolicy' => [
      'base' => '<p>Contains information about the account password policy.</p> <p> This data type is used as a response element in the <a>GetAccountPasswordPolicy</a> action. </p>',
      'refs' => [
        'GetAccountPasswordPolicyResponse$PasswordPolicy' => NULL,
      ],
    ],
    'PasswordPolicyViolationException' => [
      'base' => '<p> The request was rejected because the provided password did not meet the requirements imposed by the account password policy. </p>',
      'refs' => [],
    ],
    'PolicyDetail' => [
      'base' => '<p>Contains information about an IAM policy, including the policy document.</p> <p>This data type is used as a response element in the <a>GetAccountAuthorizationDetails</a> action.</p>',
      'refs' => [
        'policyDetailListType$member' => NULL,
      ],
    ],
    'PutGroupPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'PutRolePolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'PutUserPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RemoveClientIDFromOpenIDConnectProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RemoveRoleFromInstanceProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'RemoveUserFromGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'ReportContentType' => [
      'base' => NULL,
      'refs' => [
        'GetCredentialReportResponse$Content' => '<p>Contains the credential report. The report is Base64-encoded.</p>',
      ],
    ],
    'ReportFormatType' => [
      'base' => NULL,
      'refs' => [
        'GetCredentialReportResponse$ReportFormat' => '<p>The format (MIME type] of the credential report.</p>',
      ],
    ],
    'ReportStateDescriptionType' => [
      'base' => NULL,
      'refs' => [
        'GenerateCredentialReportResponse$Description' => '<p>Information about the credential report.</p>',
      ],
    ],
    'ReportStateType' => [
      'base' => NULL,
      'refs' => [
        'GenerateCredentialReportResponse$State' => '<p>Information about the state of a credential report.</p>',
      ],
    ],
    'ResyncMFADeviceRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'Role' => [
      'base' => '<p>Contains information about an IAM role.</p> <p> This data type is used as a response element in the following actions:</p> <ul> <li><p><a>CreateRole</a></p></li> <li><p><a>GetRole</a></p></li> <li><p><a>ListRoles</a></p></li> </ul>',
      'refs' => [
        'CreateRoleResponse$Role' => '<p>Information about the role.</p>',
        'GetRoleResponse$Role' => '<p>Information about the role.</p>',
        'roleListType$member' => NULL,
      ],
    ],
    'RoleDetail' => [
      'base' => '<p>Contains information about an IAM role, including all of the access policies attached to the role.</p> <p>This data type is used as a response element in the <a>GetAccountAuthorizationDetails</a> action.</p>',
      'refs' => [
        'roleDetailListType$member' => NULL,
      ],
    ],
    'SAMLMetadataDocumentType' => [
      'base' => NULL,
      'refs' => [
        'CreateSAMLProviderRequest$SAMLMetadataDocument' => '<p> An XML document generated by an identity provider (IdP] that supports SAML 2.0. The document includes the issuer\'s name, expiration information, and keys that can be used to validate the SAML authentication response (assertions] that are received from the IdP. You must generate the metadata document using the identity management software that is used as your organization\'s IdP. </p> <p> For more information, see <a href="http://docs.aws.amazon.com/STS/latest/UsingSTS/CreatingSAML.html">Creating Temporary Security Credentials for SAML Federation</a> in the <i>Using Temporary Security Credentials</i> guide. </p>',
        'GetSAMLProviderResponse$SAMLMetadataDocument' => '<p>The XML metadata document that includes information about an identity provider.</p>',
        'UpdateSAMLProviderRequest$SAMLMetadataDocument' => '<p> An XML document generated by an identity provider (IdP] that supports SAML 2.0. The document includes the issuer\'s name, expiration information, and keys that can be used to validate the SAML authentication response (assertions] that are received from the IdP. You must generate the metadata document using the identity management software that is used as your organization\'s IdP. </p>',
      ],
    ],
    'SAMLProviderListEntry' => [
      'base' => '<p>Contains the list of SAML providers for this account.</p>',
      'refs' => [
        'SAMLProviderListType$member' => NULL,
      ],
    ],
    'SAMLProviderListType' => [
      'base' => NULL,
      'refs' => [
        'ListSAMLProvidersResponse$SAMLProviderList' => '<p>The list of SAML providers for this account.</p>',
      ],
    ],
    'SAMLProviderNameType' => [
      'base' => NULL,
      'refs' => [
        'CreateSAMLProviderRequest$Name' => '<p>The name of the provider to create.</p>',
      ],
    ],
    'ServerCertificate' => [
      'base' => '<p>Contains information about a server certificate.</p> <p> This data type is used as a response element in the <a>GetServerCertificate</a> action. </p>',
      'refs' => [
        'GetServerCertificateResponse$ServerCertificate' => '<p>Information about the server certificate.</p>',
      ],
    ],
    'ServerCertificateMetadata' => [
      'base' => '<p>Contains information about a server certificate without its certificate body, certificate chain, and private key. </p> <p> This data type is used as a response element in the <a>UploadServerCertificate</a> and <a>ListServerCertificates</a> actions. </p>',
      'refs' => [
        'ServerCertificate$ServerCertificateMetadata' => '<p>The meta information of the server certificate, such as its name, path, ID, and ARN.</p>',
        'UploadServerCertificateResponse$ServerCertificateMetadata' => '<p> The meta information of the uploaded server certificate without its certificate body, certificate chain, and private key. </p>',
        'serverCertificateMetadataListType$member' => NULL,
      ],
    ],
    'SigningCertificate' => [
      'base' => '<p>Contains information about an X.509 signing certificate.</p> <p>This data type is used as a response element in the <a>UploadSigningCertificate</a> and <a>ListSigningCertificates</a> actions. </p>',
      'refs' => [
        'UploadSigningCertificateResponse$Certificate' => '<p>Information about the certificate.</p>',
        'certificateListType$member' => NULL,
      ],
    ],
    'UpdateAccessKeyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateAccountPasswordPolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateAssumeRolePolicyRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateGroupRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateLoginProfileRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateOpenIDConnectProviderThumbprintRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateSAMLProviderRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateSAMLProviderResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>UpdateSAMLProvider</a> action.</p>',
      'refs' => [],
    ],
    'UpdateServerCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateSigningCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UpdateUserRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UploadServerCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UploadServerCertificateResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>UploadServerCertificate</a> action.</p>',
      'refs' => [],
    ],
    'UploadSigningCertificateRequest' => [
      'base' => NULL,
      'refs' => [],
    ],
    'UploadSigningCertificateResponse' => [
      'base' => '<p>Contains the result of a successful invocation of the <a>UploadSigningCertificate</a> action.</p>',
      'refs' => [],
    ],
    'User' => [
      'base' => '<p>Contains information about an IAM user entity.</p> <p> This data type is used as a response element in the following actions:</p> <ul> <li><p><a>CreateUser</a></p></li> <li><p><a>GetUser</a></p></li> <li><p><a>ListUsers</a></p></li> </ul>',
      'refs' => [
        'CreateUserResponse$User' => '<p>Information about the user.</p>',
        'GetUserResponse$User' => '<p>Information about the user.</p>',
        'VirtualMFADevice$User' => NULL,
        'userListType$member' => NULL,
      ],
    ],
    'UserDetail' => [
      'base' => '<p>Contains information about an IAM user, including all the policies attached to the user and all the IAM groups the user is in.</p> <p>This data type is used as a response element in the <a>GetAccountAuthorizationDetails</a> action.</p>',
      'refs' => [
        'userDetailListType$member' => NULL,
      ],
    ],
    'VirtualMFADevice' => [
      'base' => '<p>Contains information about a virtual MFA device.</p>',
      'refs' => [
        'CreateVirtualMFADeviceResponse$VirtualMFADevice' => '<p>A newly created virtual MFA device.</p>',
        'virtualMFADeviceListType$member' => NULL,
      ],
    ],
    'accessKeyIdType' => [
      'base' => NULL,
      'refs' => [
        'AccessKey$AccessKeyId' => '<p>The ID for this access key.</p>',
        'AccessKeyMetadata$AccessKeyId' => '<p>The ID for this access key.</p>',
        'DeleteAccessKeyRequest$AccessKeyId' => '<p>The access key ID for the access key ID and secret access key you want to delete.</p>',
        'UpdateAccessKeyRequest$AccessKeyId' => '<p>The access key ID of the secret access key you want to update.</p>',
      ],
    ],
    'accessKeyMetadataListType' => [
      'base' => '<p>Contains a list of access key metadata.</p> <p>This data type is used as a response element in the <a>ListAccessKeys</a> action.</p>',
      'refs' => [
        'ListAccessKeysResponse$AccessKeyMetadata' => '<p>A list of access key metadata.</p>',
      ],
    ],
    'accessKeySecretType' => [
      'base' => NULL,
      'refs' => [
        'AccessKey$SecretAccessKey' => '<p>The secret key used to sign requests.</p>',
      ],
    ],
    'accountAliasListType' => [
      'base' => NULL,
      'refs' => [
        'ListAccountAliasesResponse$AccountAliases' => '<p>A list of aliases associated with the account.</p>',
      ],
    ],
    'accountAliasType' => [
      'base' => NULL,
      'refs' => [
        'CreateAccountAliasRequest$AccountAlias' => '<p>The name of the account alias to create.</p>',
        'DeleteAccountAliasRequest$AccountAlias' => '<p>The name of the account alias to delete.</p>',
        'accountAliasListType$member' => NULL,
      ],
    ],
    'arnType' => [
      'base' => '<p>The Amazon Resource Name (ARN]. ARNs are unique identifiers for AWS resources. </p> <p>For more information about ARNs, go to <a href="http://docs.aws.amazon.com/general/latest/gr/aws-arns-and-namespaces.html">Amazon Resource Names (ARNs] and AWS Service Namespaces</a> in the <i>AWS General Reference</i>. </p>',
      'refs' => [
        'AddClientIDToOpenIDConnectProviderRequest$OpenIDConnectProviderArn' => '<p>The Amazon Resource Name (ARN] of the IAM OpenID Connect (OIDC] provider to add the client ID to. You can get a list of OIDC provider ARNs by using the <a>ListOpenIDConnectProviders</a> action. </p>',
        'CreateOpenIDConnectProviderResponse$OpenIDConnectProviderArn' => '<p>The Amazon Resource Name (ARN] of the IAM OpenID Connect provider that was created. For more information, see <a>OpenIDConnectProviderListEntry</a>. </p>',
        'CreateSAMLProviderResponse$SAMLProviderArn' => '<p>The Amazon Resource Name (ARN] of the SAML provider.</p>',
        'DeleteOpenIDConnectProviderRequest$OpenIDConnectProviderArn' => '<p>The Amazon Resource Name (ARN] of the IAM OpenID Connect provider to delete. You can get a list of OpenID Connect provider ARNs by using the <a>ListOpenIDConnectProviders</a> action.</p>',
        'DeleteSAMLProviderRequest$SAMLProviderArn' => '<p>The Amazon Resource Name (ARN] of the SAML provider to delete.</p>',
        'GetOpenIDConnectProviderRequest$OpenIDConnectProviderArn' => '<p>The Amazon Resource Name (ARN] of the IAM OpenID Connect (OIDC] provider to get information for. You can get a list of OIDC provider ARNs by using the <a>ListOpenIDConnectProviders</a> action.</p>',
        'GetSAMLProviderRequest$SAMLProviderArn' => '<p>The Amazon Resource Name (ARN] of the SAML provider to get information about.</p>',
        'Group$Arn' => '<p> The Amazon Resource Name (ARN] specifying the group. For more information about ARNs and how to use them in policies, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'GroupDetail$Arn' => NULL,
        'InstanceProfile$Arn' => '<p> The Amazon Resource Name (ARN] specifying the instance profile. For more information about ARNs and how to use them in policies, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'OpenIDConnectProviderListEntry$Arn' => NULL,
        'RemoveClientIDFromOpenIDConnectProviderRequest$OpenIDConnectProviderArn' => '<p>The Amazon Resource Name (ARN] of the IAM OpenID Connect (OIDC] provider to remove the client ID from. You can get a list of OIDC provider ARNs by using the <a>ListOpenIDConnectProviders</a> action.</p>',
        'Role$Arn' => '<p> The Amazon Resource Name (ARN] specifying the role. For more information about ARNs and how to use them in policies, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'RoleDetail$Arn' => NULL,
        'SAMLProviderListEntry$Arn' => '<p>The Amazon Resource Name (ARN] of the SAML provider.</p>',
        'ServerCertificateMetadata$Arn' => '<p> The Amazon Resource Name (ARN] specifying the server certificate. For more information about ARNs and how to use them in policies, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'UpdateOpenIDConnectProviderThumbprintRequest$OpenIDConnectProviderArn' => '<p>The Amazon Resource Name (ARN] of the IAM OpenID Connect (OIDC] provider to update the thumbprint for. You can get a list of OIDC provider ARNs by using the <a>ListOpenIDConnectProviders</a> action. </p>',
        'UpdateSAMLProviderRequest$SAMLProviderArn' => '<p>The Amazon Resource Name (ARN] of the SAML provider to update.</p>',
        'UpdateSAMLProviderResponse$SAMLProviderArn' => '<p>The Amazon Resource Name (ARN] of the SAML provider that was updated.</p>',
        'User$Arn' => '<p>The Amazon Resource Name (ARN] that identifies the user. For more information about ARNs and how to use ARNs in policies, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'UserDetail$Arn' => NULL,
      ],
    ],
    'assignmentStatusType' => [
      'base' => NULL,
      'refs' => [
        'ListVirtualMFADevicesRequest$AssignmentStatus' => '<p> The status (unassigned or assigned] of the devices to list. If you do not specify an <code>AssignmentStatus</code>, the action defaults to <code>Any</code> which lists both assigned and unassigned virtual MFA devices. </p>',
      ],
    ],
    'authenticationCodeType' => [
      'base' => NULL,
      'refs' => [
        'EnableMFADeviceRequest$AuthenticationCode1' => '<p>An authentication code emitted by the device.</p>',
        'EnableMFADeviceRequest$AuthenticationCode2' => '<p>A subsequent authentication code emitted by the device.</p>',
        'ResyncMFADeviceRequest$AuthenticationCode1' => '<p>An authentication code emitted by the device.</p>',
        'ResyncMFADeviceRequest$AuthenticationCode2' => '<p>A subsequent authentication code emitted by the device.</p>',
      ],
    ],
    'booleanObjectType' => [
      'base' => NULL,
      'refs' => [
        'PasswordPolicy$HardExpiry' => '<p>Specifies whether IAM users are prevented from setting a new password after their password has expired.</p>',
        'UpdateAccountPasswordPolicyRequest$HardExpiry' => '<p>Prevents IAM users from setting a new password after their password has expired.</p> <p>Default value: false</p>',
        'UpdateLoginProfileRequest$PasswordResetRequired' => '<p>Require the specified user to set a new password on next sign-in.</p>',
      ],
    ],
    'booleanType' => [
      'base' => NULL,
      'refs' => [
        'CreateLoginProfileRequest$PasswordResetRequired' => '<p> Specifies whether the user is required to set a new password on next sign-in. </p>',
        'GetAccountAuthorizationDetailsResponse$IsTruncated' => '<p>A flag that indicates whether there are more items to return. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more items.</p>',
        'GetGroupResponse$IsTruncated' => '<p> A flag that indicates whether there are more user names to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more user names in the list. </p>',
        'ListAccessKeysResponse$IsTruncated' => '<p> A flag that indicates whether there are more keys to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more keys in the list. </p>',
        'ListAccountAliasesResponse$IsTruncated' => '<p> A flag that indicates whether there are more account aliases to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more account aliases in the list. </p>',
        'ListGroupPoliciesResponse$IsTruncated' => '<p> A flag that indicates whether there are more policy names to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more policy names in the list. </p>',
        'ListGroupsForUserResponse$IsTruncated' => '<p> A flag that indicates whether there are more groups to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more groups in the list. </p>',
        'ListGroupsResponse$IsTruncated' => '<p> A flag that indicates whether there are more groups to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more groups in the list. </p>',
        'ListInstanceProfilesForRoleResponse$IsTruncated' => '<p> A flag that indicates whether there are more instance profiles to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more instance profiles in the list. </p>',
        'ListInstanceProfilesResponse$IsTruncated' => '<p> A flag that indicates whether there are more instance profiles to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more instance profiles in the list. </p>',
        'ListMFADevicesResponse$IsTruncated' => '<p> A flag that indicates whether there are more MFA devices to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more MFA devices in the list. </p>',
        'ListRolePoliciesResponse$IsTruncated' => '<p> A flag that indicates whether there are more policy names to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more policy names in the list. </p>',
        'ListRolesResponse$IsTruncated' => '<p> A flag that indicates whether there are more roles to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more roles in the list. </p>',
        'ListServerCertificatesResponse$IsTruncated' => '<p> A flag that indicates whether there are more server certificates to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more server certificates in the list. </p>',
        'ListSigningCertificatesResponse$IsTruncated' => '<p> A flag that indicates whether there are more certificate IDs to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more certificates in the list. </p>',
        'ListUserPoliciesResponse$IsTruncated' => '<p> A flag that indicates whether there are more policy names to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more policy names in the list. </p>',
        'ListUsersResponse$IsTruncated' => '<p> A flag that indicates whether there are more user names to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more users in the list. </p>',
        'ListVirtualMFADevicesResponse$IsTruncated' => '<p> A flag that indicates whether there are more items to list. If your results were truncated, you can make a subsequent pagination request using the <code>Marker</code> request parameter to retrieve more items the list. </p>',
        'LoginProfile$PasswordResetRequired' => '<p>Specifies whether the user is required to set a new password on next sign-in.</p>',
        'PasswordPolicy$RequireSymbols' => '<p>Specifies whether to require symbols for IAM user passwords.</p>',
        'PasswordPolicy$RequireNumbers' => '<p>Specifies whether to require numbers for IAM user passwords.</p>',
        'PasswordPolicy$RequireUppercaseCharacters' => '<p>Specifies whether to require uppercase characters for IAM user passwords.</p>',
        'PasswordPolicy$RequireLowercaseCharacters' => '<p>Specifies whether to require lowercase characters for IAM user passwords.</p>',
        'PasswordPolicy$AllowUsersToChangePassword' => '<p>Specifies whether IAM users are allowed to change their own password.</p>',
        'PasswordPolicy$ExpirePasswords' => '<p>Specifies whether IAM users are required to change their password after a specified number of days.</p>',
        'UpdateAccountPasswordPolicyRequest$RequireSymbols' => '<p>Specifies whether IAM user passwords must contain at least one of the following non-alphanumeric characters:</p> <p>! @ # $ % ^ &amp;amp; * ( ] _ + - = [ ] { } | \'</p> <p>Default value: false</p>',
        'UpdateAccountPasswordPolicyRequest$RequireNumbers' => '<p>Specifies whether IAM user passwords must contain at least one numeric character (0 to 9].</p> <p>Default value: false</p>',
        'UpdateAccountPasswordPolicyRequest$RequireUppercaseCharacters' => '<p>Specifies whether IAM user passwords must contain at least one uppercase character from the ISO basic Latin alphabet (A to Z].</p> <p>Default value: false</p>',
        'UpdateAccountPasswordPolicyRequest$RequireLowercaseCharacters' => '<p>Specifies whether IAM user passwords must contain at least one lowercase character from the ISO basic Latin alphabet (a to z].</p> <p>Default value: false</p>',
        'UpdateAccountPasswordPolicyRequest$AllowUsersToChangePassword' => '<p> Allows all IAM users in your account to use the AWS Management Console to change their own passwords. For more information, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/HowToPwdIAMUser.html">Letting IAM Users Change Their Own Passwords</a> in the <i>Using IAM</i> guide. </p> <p>Default value: false</p>',
      ],
    ],
    'certificateBodyType' => [
      'base' => NULL,
      'refs' => [
        'ServerCertificate$CertificateBody' => '<p>The contents of the public key certificate.</p>',
        'SigningCertificate$CertificateBody' => '<p>The contents of the signing certificate.</p>',
        'UploadServerCertificateRequest$CertificateBody' => '<p>The contents of the public key certificate in PEM-encoded format.</p>',
        'UploadSigningCertificateRequest$CertificateBody' => '<p>The contents of the signing certificate.</p>',
      ],
    ],
    'certificateChainType' => [
      'base' => NULL,
      'refs' => [
        'ServerCertificate$CertificateChain' => '<p>The contents of the public key certificate chain.</p>',
        'UploadServerCertificateRequest$CertificateChain' => '<p> The contents of the certificate chain. This is typically a concatenation of the PEM-encoded public key certificates of the chain. </p>',
      ],
    ],
    'certificateIdType' => [
      'base' => NULL,
      'refs' => [
        'DeleteSigningCertificateRequest$CertificateId' => '<p>The ID of the signing certificate to delete.</p>',
        'SigningCertificate$CertificateId' => '<p>The ID for the signing certificate.</p>',
        'UpdateSigningCertificateRequest$CertificateId' => '<p>The ID of the signing certificate you want to update.</p>',
      ],
    ],
    'certificateListType' => [
      'base' => '<p>Contains a list of signing certificates.</p> <p>This data type is used as a response element in the <a>ListSigningCertificates</a> action.</p>',
      'refs' => [
        'ListSigningCertificatesResponse$Certificates' => '<p>A list of the user\'s signing certificate information.</p>',
      ],
    ],
    'clientIDListType' => [
      'base' => NULL,
      'refs' => [
        'CreateOpenIDConnectProviderRequest$ClientIDList' => '<p>A list of client IDs (also known as audiences]. When a mobile or web app registers with an OpenID Connect provider, they establish a value that identifies the application. (This is the value that\'s sent as the <code>client_id</code> parameter on OAuth requests.] </p> <p>You can register multiple client IDs with the same provider. For example, you might have multiple applications that use the same OIDC provider. You cannot register more than 100 client IDs with a single IAM OIDC provider. </p> <p>There is no defined format for a client ID. The <code>CreateOpenIDConnectProviderRequest</code> action accepts client IDs up to 255 characters long. </p>',
        'GetOpenIDConnectProviderResponse$ClientIDList' => '<p>A list of client IDs (also known as audiences] that are associated with the specified IAM OpenID Connect provider. For more information, see <a>CreateOpenIDConnectProvider</a>. </p>',
      ],
    ],
    'clientIDType' => [
      'base' => NULL,
      'refs' => [
        'AddClientIDToOpenIDConnectProviderRequest$ClientID' => '<p>The client ID (also known as audience] to add to the IAM OpenID Connect provider.</p>',
        'RemoveClientIDFromOpenIDConnectProviderRequest$ClientID' => '<p>The client ID (also known as audience] to remove from the IAM OpenID Connect provider. For more information about client IDs, see <a>CreateOpenIDConnectProvider</a>.</p>',
        'clientIDListType$member' => NULL,
      ],
    ],
    'credentialReportExpiredExceptionMessage' => [
      'base' => NULL,
      'refs' => [
        'CredentialReportExpiredException$message' => NULL,
      ],
    ],
    'credentialReportNotPresentExceptionMessage' => [
      'base' => NULL,
      'refs' => [
        'CredentialReportNotPresentException$message' => NULL,
      ],
    ],
    'credentialReportNotReadyExceptionMessage' => [
      'base' => NULL,
      'refs' => [
        'CredentialReportNotReadyException$message' => NULL,
      ],
    ],
    'dateType' => [
      'base' => NULL,
      'refs' => [
        'AccessKey$CreateDate' => '<p>The date when the access key was created.</p>',
        'AccessKeyMetadata$CreateDate' => '<p>The date when the access key was created.</p>',
        'GetCredentialReportResponse$GeneratedTime' => '<p> The date and time when the credential report was created, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>. </p>',
        'GetOpenIDConnectProviderResponse$CreateDate' => '<p>The date and time when the IAM OpenID Connect provider entity was created in the AWS account. </p>',
        'GetSAMLProviderResponse$CreateDate' => '<p>The date and time when the SAML provider was created.</p>',
        'GetSAMLProviderResponse$ValidUntil' => '<p>The expiration date and time for the SAML provider.</p>',
        'Group$CreateDate' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the group was created.</p>',
        'GroupDetail$CreateDate' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the group was created.</p>',
        'InstanceProfile$CreateDate' => '<p>The date when the instance profile was created.</p>',
        'LoginProfile$CreateDate' => '<p>The date when the password for the user was created.</p>',
        'MFADevice$EnableDate' => '<p>The date when the MFA device was enabled for the user.</p>',
        'Role$CreateDate' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the role was created.</p>',
        'RoleDetail$CreateDate' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the role was created.</p>',
        'SAMLProviderListEntry$ValidUntil' => '<p>The expiration date and time for the SAML provider.</p>',
        'SAMLProviderListEntry$CreateDate' => '<p>The date and time when the SAML provider was created.</p>',
        'ServerCertificateMetadata$UploadDate' => '<p>The date when the server certificate was uploaded.</p>',
        'ServerCertificateMetadata$Expiration' => '<p>The date on which the certificate is set to expire.</p>',
        'SigningCertificate$UploadDate' => '<p>The date when the signing certificate was uploaded.</p>',
        'User$CreateDate' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the user was created.</p>',
        'User$PasswordLastUsed' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the user\'s password was last used to sign in to an AWS website. For a list of AWS websites that capture a user\'s last sign-in time, see the <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/credential-reports.html">Credential Reports</a> topic in the <i>Using IAM</i> guide. If a password is used more than once in a five-minute span, only the first use is returned in this field. When the user does not have a password, this field is null (not present]. When a user\'s password exists but has never been used, or when there is no sign-in data associated with the user, this field is null (not present]. </p> <p>This value is returned only in the <a>GetUser</a> and <a>ListUsers</a> actions. </p>',
        'UserDetail$CreateDate' => '<p>The date and time, in <a href="http://www.iso.org/iso/iso8601">ISO 8601 date-time format</a>, when the user was created.</p>',
        'VirtualMFADevice$EnableDate' => '<p>The date and time on which the virtual MFA device was enabled.</p>',
      ],
    ],
    'deleteConflictMessage' => [
      'base' => NULL,
      'refs' => [
        'DeleteConflictException$message' => NULL,
      ],
    ],
    'duplicateCertificateMessage' => [
      'base' => NULL,
      'refs' => [
        'DuplicateCertificateException$message' => NULL,
      ],
    ],
    'entityAlreadyExistsMessage' => [
      'base' => NULL,
      'refs' => [
        'EntityAlreadyExistsException$message' => NULL,
      ],
    ],
    'entityListType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountAuthorizationDetailsRequest$Filter' => '<p>A list of entity types (user, group, or role] for filtering the results.</p>',
      ],
    ],
    'entityTemporarilyUnmodifiableMessage' => [
      'base' => NULL,
      'refs' => [
        'EntityTemporarilyUnmodifiableException$message' => NULL,
      ],
    ],
    'existingUserNameType' => [
      'base' => NULL,
      'refs' => [
        'AddUserToGroupRequest$UserName' => '<p>The name of the user to add.</p>',
        'CreateAccessKeyRequest$UserName' => '<p>The user name that the new key will belong to.</p>',
        'DeactivateMFADeviceRequest$UserName' => '<p>The name of the user whose MFA device you want to deactivate.</p>',
        'DeleteAccessKeyRequest$UserName' => '<p>The name of the user whose key you want to delete.</p>',
        'DeleteSigningCertificateRequest$UserName' => '<p>The name of the user the signing certificate belongs to.</p>',
        'DeleteUserPolicyRequest$UserName' => '<p>The name of the user the policy is associated with.</p>',
        'DeleteUserRequest$UserName' => '<p>The name of the user to delete.</p>',
        'EnableMFADeviceRequest$UserName' => '<p>The name of the user for whom you want to enable the MFA device.</p>',
        'GetUserPolicyRequest$UserName' => '<p>The name of the user who the policy is associated with.</p>',
        'GetUserPolicyResponse$UserName' => '<p>The user the policy is associated with.</p>',
        'GetUserRequest$UserName' => '<p>The name of the user to get information about.</p> <p>This parameter is optional. If it is not included, it defaults to the user making the request.</p>',
        'ListAccessKeysRequest$UserName' => '<p>The name of the user.</p>',
        'ListGroupsForUserRequest$UserName' => '<p>The name of the user to list groups for.</p>',
        'ListMFADevicesRequest$UserName' => '<p>The name of the user whose MFA devices you want to list.</p>',
        'ListSigningCertificatesRequest$UserName' => '<p>The name of the user.</p>',
        'ListUserPoliciesRequest$UserName' => '<p>The name of the user to list policies for.</p>',
        'PutUserPolicyRequest$UserName' => '<p>The name of the user to associate the policy with.</p>',
        'RemoveUserFromGroupRequest$UserName' => '<p>The name of the user to remove.</p>',
        'ResyncMFADeviceRequest$UserName' => '<p>The name of the user whose MFA device you want to resynchronize.</p>',
        'UpdateAccessKeyRequest$UserName' => '<p>The name of the user whose key you want to update.</p>',
        'UpdateSigningCertificateRequest$UserName' => '<p>The name of the user the signing certificate belongs to.</p>',
        'UpdateUserRequest$UserName' => '<p> Name of the user to update. If you\'re changing the name of the user, this is the original user name. </p>',
        'UploadSigningCertificateRequest$UserName' => '<p>The name of the user the signing certificate is for.</p>',
      ],
    ],
    'groupDetailListType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountAuthorizationDetailsResponse$GroupDetailList' => '<p>A list containing information about IAM groups.</p>',
      ],
    ],
    'groupListType' => [
      'base' => '<p>Contains a list of IAM groups.</p> <p>This data type is used as a response element in the <a>ListGroups</a> action.</p>',
      'refs' => [
        'ListGroupsForUserResponse$Groups' => '<p>A list of groups.</p>',
        'ListGroupsResponse$Groups' => '<p>A list of groups.</p>',
      ],
    ],
    'groupNameListType' => [
      'base' => NULL,
      'refs' => [
        'UserDetail$GroupList' => '<p>A list of the IAM groups that the user is in.</p>',
      ],
    ],
    'groupNameType' => [
      'base' => NULL,
      'refs' => [
        'AddUserToGroupRequest$GroupName' => '<p>The name of the group to update.</p>',
        'CreateGroupRequest$GroupName' => '<p>The name of the group to create. Do not include the path in this value.</p>',
        'DeleteGroupPolicyRequest$GroupName' => '<p>The name of the group the policy is associated with.</p>',
        'DeleteGroupRequest$GroupName' => '<p>The name of the group to delete.</p>',
        'GetGroupPolicyRequest$GroupName' => '<p>The name of the group the policy is associated with.</p>',
        'GetGroupPolicyResponse$GroupName' => '<p>The group the policy is associated with.</p>',
        'GetGroupRequest$GroupName' => '<p>The name of the group.</p>',
        'Group$GroupName' => '<p>The friendly name that identifies the group.</p>',
        'GroupDetail$GroupName' => '<p>The friendly name that identifies the group.</p>',
        'ListGroupPoliciesRequest$GroupName' => '<p>The name of the group to list policies for.</p>',
        'PutGroupPolicyRequest$GroupName' => '<p>The name of the group to associate the policy with.</p>',
        'RemoveUserFromGroupRequest$GroupName' => '<p>The name of the group to update.</p>',
        'UpdateGroupRequest$GroupName' => '<p> Name of the group to update. If you\'re changing the name of the group, this is the original name. </p>',
        'UpdateGroupRequest$NewGroupName' => '<p>New name for the group. Only include this if changing the group\'s name.</p>',
        'groupNameListType$member' => NULL,
      ],
    ],
    'idType' => [
      'base' => NULL,
      'refs' => [
        'Group$GroupId' => '<p> The stable and unique string identifying the group. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'GroupDetail$GroupId' => '<p>The stable and unique string identifying the group. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
        'InstanceProfile$InstanceProfileId' => '<p> The stable and unique string identifying the instance profile. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'Role$RoleId' => '<p> The stable and unique string identifying the role. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'RoleDetail$RoleId' => '<p>The stable and unique string identifying the role. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
        'ServerCertificateMetadata$ServerCertificateId' => '<p> The stable and unique string identifying the server certificate. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'User$UserId' => '<p>The stable and unique string identifying the user. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
        'UserDetail$UserId' => '<p>The stable and unique string identifying the user. For more information about IDs, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
      ],
    ],
    'instanceProfileListType' => [
      'base' => '<p>Contains a list of instance profiles.</p>',
      'refs' => [
        'ListInstanceProfilesForRoleResponse$InstanceProfiles' => '<p>A list of instance profiles.</p>',
        'ListInstanceProfilesResponse$InstanceProfiles' => '<p>A list of instance profiles.</p>',
        'RoleDetail$InstanceProfileList' => NULL,
      ],
    ],
    'instanceProfileNameType' => [
      'base' => NULL,
      'refs' => [
        'AddRoleToInstanceProfileRequest$InstanceProfileName' => '<p>The name of the instance profile to update.</p>',
        'CreateInstanceProfileRequest$InstanceProfileName' => '<p>The name of the instance profile to create.</p>',
        'DeleteInstanceProfileRequest$InstanceProfileName' => '<p>The name of the instance profile to delete.</p>',
        'GetInstanceProfileRequest$InstanceProfileName' => '<p>The name of the instance profile to get information about.</p>',
        'InstanceProfile$InstanceProfileName' => '<p>The name identifying the instance profile.</p>',
        'RemoveRoleFromInstanceProfileRequest$InstanceProfileName' => '<p>The name of the instance profile to update.</p>',
      ],
    ],
    'invalidAuthenticationCodeMessage' => [
      'base' => NULL,
      'refs' => [
        'InvalidAuthenticationCodeException$message' => NULL,
      ],
    ],
    'invalidCertificateMessage' => [
      'base' => NULL,
      'refs' => [
        'InvalidCertificateException$message' => NULL,
      ],
    ],
    'invalidInputMessage' => [
      'base' => NULL,
      'refs' => [
        'InvalidInputException$message' => NULL,
      ],
    ],
    'invalidUserTypeMessage' => [
      'base' => NULL,
      'refs' => [
        'InvalidUserTypeException$message' => NULL,
      ],
    ],
    'keyPairMismatchMessage' => [
      'base' => NULL,
      'refs' => [
        'KeyPairMismatchException$message' => NULL,
      ],
    ],
    'limitExceededMessage' => [
      'base' => NULL,
      'refs' => [
        'LimitExceededException$message' => NULL,
      ],
    ],
    'malformedCertificateMessage' => [
      'base' => NULL,
      'refs' => [
        'MalformedCertificateException$message' => NULL,
      ],
    ],
    'malformedPolicyDocumentMessage' => [
      'base' => NULL,
      'refs' => [
        'MalformedPolicyDocumentException$message' => NULL,
      ],
    ],
    'markerType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountAuthorizationDetailsRequest$Marker' => '<p>Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received.</p>',
        'GetAccountAuthorizationDetailsResponse$Marker' => '<p>If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request.</p>',
        'GetGroupRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'GetGroupResponse$Marker' => '<p> If IsTruncated is <code>true</code>, then this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListAccessKeysRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListAccessKeysResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListAccountAliasesRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListAccountAliasesResponse$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListGroupPoliciesRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListGroupPoliciesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListGroupsForUserRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListGroupsForUserResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListGroupsRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListGroupsResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListInstanceProfilesForRoleRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListInstanceProfilesForRoleResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListInstanceProfilesRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListInstanceProfilesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListMFADevicesRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListMFADevicesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListRolePoliciesRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListRolePoliciesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListRolesRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListRolesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListServerCertificatesRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListServerCertificatesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListSigningCertificatesRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListSigningCertificatesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListUserPoliciesRequest$Marker' => '<p> Use this only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListUserPoliciesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListUsersRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListUsersResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
        'ListVirtualMFADevicesRequest$Marker' => '<p> Use this parameter only when paginating results, and only in a subsequent request after you\'ve received a response where the results are truncated. Set it to the value of the <code>Marker</code> element in the response you just received. </p>',
        'ListVirtualMFADevicesResponse$Marker' => '<p> If <code>IsTruncated</code> is <code>true</code>, this element is present and contains the value to use for the <code>Marker</code> parameter in a subsequent pagination request. </p>',
      ],
    ],
    'maxItemsType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountAuthorizationDetailsRequest$MaxItems' => '<p>Use this only when paginating results to indicate the maximum number of items you want in the response. If there are additional items beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100.</p>',
        'GetGroupRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of groups you want in the response. If there are additional groups beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListAccessKeysRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of keys you want in the response. If there are additional keys beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListAccountAliasesRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of account aliases you want in the response. If there are additional account aliases beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListGroupPoliciesRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of policy names you want in the response. If there are additional policy names beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListGroupsForUserRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of groups you want in the response. If there are additional groups beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListGroupsRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of groups you want in the response. If there are additional groups beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListInstanceProfilesForRoleRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of instance profiles you want in the response. If there are additional instance profiles beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListInstanceProfilesRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of instance profiles you want in the response. If there are additional instance profiles beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListMFADevicesRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of MFA devices you want in the response. If there are additional MFA devices beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListRolePoliciesRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of role policies you want in the response. If there are additional role policies beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListRolesRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of roles you want in the response. If there are additional roles beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListServerCertificatesRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of server certificates you want in the response. If there are additional server certificates beyond the maximum you specify, the <code>IsTruncated</code> response element will be set to <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListSigningCertificatesRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of certificate IDs you want in the response. If there are additional certificate IDs beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListUserPoliciesRequest$MaxItems' => '<p> Use this only when paginating results to indicate the maximum number of policy names you want in the response. If there are additional policy names beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListUsersRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of user names you want in the response. If there are additional user names beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
        'ListVirtualMFADevicesRequest$MaxItems' => '<p> Use this parameter only when paginating results to indicate the maximum number of MFA devices you want in the response. If there are additional MFA devices beyond the maximum you specify, the <code>IsTruncated</code> response element is <code>true</code>. This parameter is optional. If you do not include it, it defaults to 100. </p>',
      ],
    ],
    'maxPasswordAgeType' => [
      'base' => NULL,
      'refs' => [
        'PasswordPolicy$MaxPasswordAge' => '<p>The number of days that an IAM user password is valid.</p>',
        'UpdateAccountPasswordPolicyRequest$MaxPasswordAge' => '<p>The number of days that an IAM user password is valid. The default value of 0 means IAM user passwords never expire.</p> <p>Default value: 0</p>',
      ],
    ],
    'mfaDeviceListType' => [
      'base' => '<p>Contains a list of MFA devices.</p> <p>This data type is used as a response element in the <a>ListMFADevices</a> and <a>ListVirtualMFADevices</a> actions. </p>',
      'refs' => [
        'ListMFADevicesResponse$MFADevices' => '<p>A list of MFA devices.</p>',
      ],
    ],
    'minimumPasswordLengthType' => [
      'base' => NULL,
      'refs' => [
        'PasswordPolicy$MinimumPasswordLength' => '<p>Minimum length to require for IAM user passwords.</p>',
        'UpdateAccountPasswordPolicyRequest$MinimumPasswordLength' => '<p>The minimum number of characters allowed in an IAM user password.</p> <p>Default value: 6</p>',
      ],
    ],
    'noSuchEntityMessage' => [
      'base' => NULL,
      'refs' => [
        'NoSuchEntityException$message' => NULL,
      ],
    ],
    'passwordPolicyViolationMessage' => [
      'base' => NULL,
      'refs' => [
        'PasswordPolicyViolationException$message' => NULL,
      ],
    ],
    'passwordReusePreventionType' => [
      'base' => NULL,
      'refs' => [
        'PasswordPolicy$PasswordReusePrevention' => '<p>Specifies the number of previous passwords that IAM users are prevented from reusing.</p>',
        'UpdateAccountPasswordPolicyRequest$PasswordReusePrevention' => '<p>Specifies the number of previous passwords that IAM users are prevented from reusing. The default value of 0 means IAM users are not prevented from reusing previous passwords.</p> <p>Default value: 0</p>',
      ],
    ],
    'passwordType' => [
      'base' => NULL,
      'refs' => [
        'ChangePasswordRequest$OldPassword' => '<p>The IAM user\'s current password.</p>',
        'ChangePasswordRequest$NewPassword' => '<p>The new password. The new password must conform to the AWS account\'s password policy, if one exists.</p>',
        'CreateLoginProfileRequest$Password' => '<p>The new password for the user.</p>',
        'UpdateLoginProfileRequest$Password' => '<p>The new password for the specified user.</p>',
      ],
    ],
    'pathPrefixType' => [
      'base' => NULL,
      'refs' => [
        'ListGroupsRequest$PathPrefix' => '<p> The path prefix for filtering the results. For example, the prefix <code>/division_abc/subdivision_xyz/</code> gets all groups whose path starts with <code>/division_abc/subdivision_xyz/</code>. </p> <p> This parameter is optional. If it is not included, it defaults to a slash (/], listing all groups. </p>',
        'ListInstanceProfilesRequest$PathPrefix' => '<p> The path prefix for filtering the results. For example, the prefix <code>/application_abc/component_xyz/</code> gets all instance profiles whose path starts with <code>/application_abc/component_xyz/</code>. </p> <p> This parameter is optional. If it is not included, it defaults to a slash (/], listing all instance profiles. </p>',
        'ListRolesRequest$PathPrefix' => '<p> The path prefix for filtering the results. For example, the prefix <code>/application_abc/component_xyz/</code> gets all roles whose path starts with <code>/application_abc/component_xyz/</code>. </p> <p> This parameter is optional. If it is not included, it defaults to a slash (/], listing all roles. </p>',
        'ListServerCertificatesRequest$PathPrefix' => '<p> The path prefix for filtering the results. For example: <code>/company/servercerts</code> would get all server certificates for which the path starts with <code>/company/servercerts</code>. </p> <p> This parameter is optional. If it is not included, it defaults to a slash (/], listing all server certificates. </p>',
        'ListUsersRequest$PathPrefix' => '<p> The path prefix for filtering the results. For example: <code>/division_abc/subdivision_xyz/</code>, which would get all user names whose path starts with <code>/division_abc/subdivision_xyz/</code>. </p> <p> This parameter is optional. If it is not included, it defaults to a slash (/], listing all user names. </p>',
      ],
    ],
    'pathType' => [
      'base' => NULL,
      'refs' => [
        'CreateGroupRequest$Path' => '<p> The path to the group. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p> <p>This parameter is optional. If it is not included, it defaults to a slash (/].</p>',
        'CreateInstanceProfileRequest$Path' => '<p> The path to the instance profile. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p> <p>This parameter is optional. If it is not included, it defaults to a slash (/].</p>',
        'CreateRoleRequest$Path' => '<p> The path to the role. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p> <p>This parameter is optional. If it is not included, it defaults to a slash (/].</p>',
        'CreateUserRequest$Path' => '<p> The path for the user name. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p> <p>This parameter is optional. If it is not included, it defaults to a slash (/].</p>',
        'CreateVirtualMFADeviceRequest$Path' => '<p> The path for the virtual MFA device. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p> <p>This parameter is optional. If it is not included, it defaults to a slash (/].</p>',
        'Group$Path' => '<p>The path to the group. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'GroupDetail$Path' => '<p>The path to the group. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
        'InstanceProfile$Path' => '<p> The path to the instance profile. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'Role$Path' => '<p> The path to the role. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'RoleDetail$Path' => '<p>The path to the role. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
        'ServerCertificateMetadata$Path' => '<p> The path to the server certificate. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p>',
        'UpdateGroupRequest$NewPath' => '<p>New path for the group. Only include this if changing the group\'s path.</p>',
        'UpdateServerCertificateRequest$NewPath' => '<p> The new path for the server certificate. Include this only if you are updating the server certificate\'s path. </p>',
        'UpdateUserRequest$NewPath' => '<p>New path for the user. Include this parameter only if you\'re changing the user\'s path.</p>',
        'UploadServerCertificateRequest$Path' => '<p> The path for the server certificate. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide. </p> <p>This parameter is optional. If it is not included, it defaults to a slash (/].</p> <note> If you are uploading a server certificate specifically for use with Amazon CloudFront distributions, you must specify a path using the <code>--path</code> option. The path must begin with <code>/cloudfront</code> and must include a trailing slash (for example, <code>/cloudfront/test/</code>]. </note>',
        'User$Path' => '<p>The path to the user. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
        'UserDetail$Path' => '<p>The path to the user. For more information about paths, see <a href="http://docs.aws.amazon.com/IAM/latest/UserGuide/Using_Identifiers.html">IAM Identifiers</a> in the <i>Using IAM</i> guide.</p>',
      ],
    ],
    'policyDetailListType' => [
      'base' => NULL,
      'refs' => [
        'GroupDetail$GroupPolicyList' => '<p>A list of the policies attached to the group.</p>',
        'RoleDetail$RolePolicyList' => '<p>A list of the access (permissions] policies attached to the role. </p>',
        'UserDetail$UserPolicyList' => '<p>A list of the policies attached to the user.</p>',
      ],
    ],
    'policyDocumentType' => [
      'base' => NULL,
      'refs' => [
        'CreateRoleRequest$AssumeRolePolicyDocument' => '<p>The policy that grants an entity permission to assume the role.</p>',
        'GetGroupPolicyResponse$PolicyDocument' => '<p>The policy document.</p>',
        'GetRolePolicyResponse$PolicyDocument' => '<p>The policy document.</p>',
        'GetUserPolicyResponse$PolicyDocument' => '<p>The policy document.</p>',
        'PolicyDetail$PolicyDocument' => '<p>The policy document.</p> <p>The returned policy is URL-encoded according to <a href="http://www.faqs.org/rfcs/rfc3986.html">RFC 3986</a>. </p>',
        'PutGroupPolicyRequest$PolicyDocument' => '<p>The policy document.</p>',
        'PutRolePolicyRequest$PolicyDocument' => '<p>The policy document.</p>',
        'PutUserPolicyRequest$PolicyDocument' => '<p>The policy document.</p>',
        'Role$AssumeRolePolicyDocument' => '<p>The policy that grants an entity permission to assume the role.</p> <p> The returned policy is URL-encoded according to <a href="http://www.faqs.org/rfcs/rfc3986.html">RFC 3986</a>. </p>',
        'RoleDetail$AssumeRolePolicyDocument' => '<p>The trust policy that grants an entity permission to assume the role.</p> <p> The returned policy is URL-encoded according to <a href="http://www.faqs.org/rfcs/rfc3986.html">RFC 3986</a>. </p>',
        'UpdateAssumeRolePolicyRequest$PolicyDocument' => '<p>The policy that grants an entity permission to assume the role.</p>',
      ],
    ],
    'policyNameListType' => [
      'base' => '<p>Contains a list of policy names.</p> <p>This data type is used as a response element in the <a>ListPolicies</a> action.</p>',
      'refs' => [
        'ListGroupPoliciesResponse$PolicyNames' => '<p>A list of policy names.</p>',
        'ListRolePoliciesResponse$PolicyNames' => '<p>A list of policy names.</p>',
        'ListUserPoliciesResponse$PolicyNames' => '<p>A list of policy names.</p>',
      ],
    ],
    'policyNameType' => [
      'base' => NULL,
      'refs' => [
        'DeleteGroupPolicyRequest$PolicyName' => '<p>The name of the policy document to delete.</p>',
        'DeleteRolePolicyRequest$PolicyName' => '<p>The name of the policy document to delete.</p>',
        'DeleteUserPolicyRequest$PolicyName' => '<p>The name of the policy document to delete.</p>',
        'GetGroupPolicyRequest$PolicyName' => '<p>The name of the policy document to get.</p>',
        'GetGroupPolicyResponse$PolicyName' => '<p>The name of the policy.</p>',
        'GetRolePolicyRequest$PolicyName' => '<p>The name of the policy document to get.</p>',
        'GetRolePolicyResponse$PolicyName' => '<p>The name of the policy.</p>',
        'GetUserPolicyRequest$PolicyName' => '<p>The name of the policy document to get.</p>',
        'GetUserPolicyResponse$PolicyName' => '<p>The name of the policy.</p>',
        'PolicyDetail$PolicyName' => '<p>The name of the policy.</p>',
        'PutGroupPolicyRequest$PolicyName' => '<p>The name of the policy document.</p>',
        'PutRolePolicyRequest$PolicyName' => '<p>The name of the policy document.</p>',
        'PutUserPolicyRequest$PolicyName' => '<p>The name of the policy document.</p>',
        'policyNameListType$member' => NULL,
      ],
    ],
    'privateKeyType' => [
      'base' => NULL,
      'refs' => [
        'UploadServerCertificateRequest$PrivateKey' => '<p>The contents of the private key in PEM-encoded format.</p>',
      ],
    ],
    'roleDetailListType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountAuthorizationDetailsResponse$RoleDetailList' => '<p>A list containing information about IAM roles.</p>',
      ],
    ],
    'roleListType' => [
      'base' => '<p>Contains a list of IAM roles.</p> <p>This data type is used as a response element in the <a>ListRoles</a> action.</p>',
      'refs' => [
        'InstanceProfile$Roles' => '<p>The role associated with the instance profile.</p>',
        'ListRolesResponse$Roles' => '<p>A list of roles.</p>',
      ],
    ],
    'roleNameType' => [
      'base' => NULL,
      'refs' => [
        'AddRoleToInstanceProfileRequest$RoleName' => '<p>The name of the role to add.</p>',
        'CreateRoleRequest$RoleName' => '<p>The name of the role to create.</p>',
        'DeleteRolePolicyRequest$RoleName' => '<p>The name of the role the associated with the policy.</p>',
        'DeleteRoleRequest$RoleName' => '<p>The name of the role to delete.</p>',
        'GetRolePolicyRequest$RoleName' => '<p>The name of the role associated with the policy.</p>',
        'GetRolePolicyResponse$RoleName' => '<p>The role the policy is associated with.</p>',
        'GetRoleRequest$RoleName' => '<p>The name of the role to get information about.</p>',
        'ListInstanceProfilesForRoleRequest$RoleName' => '<p>The name of the role to list instance profiles for.</p>',
        'ListRolePoliciesRequest$RoleName' => '<p>The name of the role to list policies for.</p>',
        'PutRolePolicyRequest$RoleName' => '<p>The name of the role to associate the policy with.</p>',
        'RemoveRoleFromInstanceProfileRequest$RoleName' => '<p>The name of the role to remove.</p>',
        'Role$RoleName' => '<p>The friendly name that identifies the role.</p>',
        'RoleDetail$RoleName' => '<p>The friendly name that identifies the role.</p>',
        'UpdateAssumeRolePolicyRequest$RoleName' => '<p>The name of the role to update.</p>',
      ],
    ],
    'serialNumberType' => [
      'base' => NULL,
      'refs' => [
        'DeactivateMFADeviceRequest$SerialNumber' => '<p> The serial number that uniquely identifies the MFA device. For virtual MFA devices, the serial number is the device ARN. </p>',
        'DeleteVirtualMFADeviceRequest$SerialNumber' => '<p> The serial number that uniquely identifies the MFA device. For virtual MFA devices, the serial number is the same as the ARN. </p>',
        'EnableMFADeviceRequest$SerialNumber' => '<p> The serial number that uniquely identifies the MFA device. For virtual MFA devices, the serial number is the device ARN. </p>',
        'MFADevice$SerialNumber' => '<p> The serial number that uniquely identifies the MFA device. For virtual MFA devices, the serial number is the device ARN. </p>',
        'ResyncMFADeviceRequest$SerialNumber' => '<p>Serial number that uniquely identifies the MFA device.</p>',
        'VirtualMFADevice$SerialNumber' => '<p>The serial number associated with <code>VirtualMFADevice</code>.</p>',
      ],
    ],
    'serverCertificateMetadataListType' => [
      'base' => NULL,
      'refs' => [
        'ListServerCertificatesResponse$ServerCertificateMetadataList' => '<p>A list of server certificates.</p>',
      ],
    ],
    'serverCertificateNameType' => [
      'base' => NULL,
      'refs' => [
        'DeleteServerCertificateRequest$ServerCertificateName' => '<p>The name of the server certificate you want to delete.</p>',
        'GetServerCertificateRequest$ServerCertificateName' => '<p>The name of the server certificate you want to retrieve information about.</p>',
        'ServerCertificateMetadata$ServerCertificateName' => '<p>The name that identifies the server certificate.</p>',
        'UpdateServerCertificateRequest$ServerCertificateName' => '<p>The name of the server certificate that you want to update.</p>',
        'UpdateServerCertificateRequest$NewServerCertificateName' => '<p> The new name for the server certificate. Include this only if you are updating the server certificate\'s name. </p>',
        'UploadServerCertificateRequest$ServerCertificateName' => '<p>The name for the server certificate. Do not include the path in this value.</p>',
      ],
    ],
    'statusType' => [
      'base' => NULL,
      'refs' => [
        'AccessKey$Status' => '<p> The status of the access key. <code>Active</code> means the key is valid for API calls, while <code>Inactive</code> means it is not. </p>',
        'AccessKeyMetadata$Status' => '<p>The status of the access key. <code>Active</code> means the key is valid for API calls; <code>Inactive</code> means it is not.</p>',
        'SigningCertificate$Status' => '<p>The status of the signing certificate. <code>Active</code> means the key is valid for API calls, while <code>Inactive</code> means it is not.</p>',
        'UpdateAccessKeyRequest$Status' => '<p> The status you want to assign to the secret access key. <code>Active</code> means the key can be used for API calls to AWS, while <code>Inactive</code> means the key cannot be used. </p>',
        'UpdateSigningCertificateRequest$Status' => '<p> The status you want to assign to the certificate. <code>Active</code> means the certificate can be used for API calls to AWS, while <code>Inactive</code> means the certificate cannot be used. </p>',
      ],
    ],
    'summaryKeyType' => [
      'base' => NULL,
      'refs' => [
        'summaryMapType$key' => NULL,
      ],
    ],
    'summaryMapType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountSummaryResponse$SummaryMap' => '<p>A set of key value pairs containing account-level information.</p> <p> <code>SummaryMap</code> contains the following keys: <ul> <li><p><code>AccessKeysPerUserQuota</code> - Maximum number of access keys that can be created per user</p></li> <li><p><code>AccountMFAEnabled</code> - 1 if the root account has an MFA device assigned to it, 0 otherwise</p></li> <li><p><code>AssumeRolePolicySizeQuota</code> - Maximum allowed size for assume role policy documents (in kilobytes]</p></li> <li><p><code>GroupPolicySizeQuota</code> - Maximum allowed size for Group policy documents (in kilobytes]</p></li> <li><p><code>Groups</code> - Number of Groups for the AWS account</p></li> <li><p><code>GroupsPerUserQuota</code> - Maximum number of groups an IAM user can belong to</p></li> <li><p><code>GroupsQuota</code> - Maximum groups allowed for the AWS account</p></li> <li><p><code>InstanceProfiles</code> - Number of instance profiles for the AWS account</p></li> <li><p><code>InstanceProfilesQuota</code> - Maximum instance profiles allowed for the AWS account</p></li> <li><p><code>MFADevices</code> - Number of MFA devices, either assigned or unassigned</p></li> <li><p><code>MFADevicesInUse</code> - Number of MFA devices that have been assigned to an IAM user or to the root account</p></li> <li><p><code>RolePolicySizeQuota</code> - Maximum allowed size for role policy documents (in kilobytes]</p></li> <li><p><code>Roles</code> - Number of roles for the AWS account</p></li> <li><p><code>RolesQuota</code> - Maximum roles allowed for the AWS account</p></li> <li><p><code>ServerCertificates</code> - Number of server certificates for the AWS account</p></li> <li><p><code>ServerCertificatesQuota</code> - Maximum server certificates allowed for the AWS account</p></li> <li><p><code>SigningCertificatesPerUserQuota</code> - Maximum number of X509 certificates allowed for a user</p></li> <li><p><code>UserPolicySizeQuota</code> - Maximum allowed size for user policy documents (in kilobytes]</p></li> <li><p><code>Users</code> - Number of users for the AWS account</p></li> <li><p><code>UsersQuota</code> - Maximum users allowed for the AWS account</p></li> </ul> </p>',
      ],
    ],
    'summaryValueType' => [
      'base' => NULL,
      'refs' => [
        'summaryMapType$value' => NULL,
      ],
    ],
    'thumbprintListType' => [
      'base' => '<p>Contains a list of thumbprints of identity provider server certificates.</p>',
      'refs' => [
        'CreateOpenIDConnectProviderRequest$ThumbprintList' => '<p>A list of server certificate thumbprints for the OpenID Connect (OIDC] identity provider\'s server certificate(s]. Typically this list includes only one entry. However, IAM lets you have up to five thumbprints for an OIDC provider. This lets you maintain multiple thumbprints if the identity provider is rotating certificates.</p> <p>The server certificate thumbprint is the hex-encoded SHA-1 hash value of the X.509 certificate used by the domain where the OpenID Connect provider makes its keys available. It is always a 40-character string. </p> <p>You must provide at least one thumbprint when creating an IAM OIDC provider. For example, if the OIDC provider is <code>server.example.com</code> and the provider stores its keys at "https://keys.server.example.com/openid-connect", the thumbprint string would be the hex-encoded SHA-1 hash value of the certificate used by https://keys.server.example.com. </p>',
        'GetOpenIDConnectProviderResponse$ThumbprintList' => '<p>A list of certificate thumbprints that are associated with the specified IAM OpenID Connect provider. For more information, see <a>CreateOpenIDConnectProvider</a>. </p>',
        'UpdateOpenIDConnectProviderThumbprintRequest$ThumbprintList' => '<p>A list of certificate thumbprints that are associated with the specified IAM OpenID Connect provider. For more information, see <a>CreateOpenIDConnectProvider</a>. </p>',
      ],
    ],
    'thumbprintType' => [
      'base' => '<p>Contains a thumbprint for an identity provider\'s server certificate.</p> <p>The identity provider\'s server certificate thumbprint is the hex-encoded SHA-1 hash value of the self-signed X.509 certificate used by the domain where the OpenID Connect provider makes its keys available. It is always a 40-character string. </p>',
      'refs' => [
        'thumbprintListType$member' => NULL,
      ],
    ],
    'userDetailListType' => [
      'base' => NULL,
      'refs' => [
        'GetAccountAuthorizationDetailsResponse$UserDetailList' => '<p>A list containing information about IAM users.</p>',
      ],
    ],
    'userListType' => [
      'base' => '<p>Contains a list of users.</p> <p>This data type is used as a response element in the <a>GetGroup</a> and <a>ListUsers</a> actions. </p>',
      'refs' => [
        'GetGroupResponse$Users' => '<p>A list of users in the group.</p>',
        'ListUsersResponse$Users' => '<p>A list of users.</p>',
      ],
    ],
    'userNameType' => [
      'base' => NULL,
      'refs' => [
        'AccessKey$UserName' => '<p>The name of the IAM user that the access key is associated with.</p>',
        'AccessKeyMetadata$UserName' => '<p>The name of the IAM user that the key is associated with.</p>',
        'CreateLoginProfileRequest$UserName' => '<p>The name of the user to create a password for.</p>',
        'CreateUserRequest$UserName' => '<p>The name of the user to create.</p>',
        'DeleteLoginProfileRequest$UserName' => '<p>The name of the user whose password you want to delete.</p>',
        'GetLoginProfileRequest$UserName' => '<p>The name of the user whose login profile you want to retrieve.</p>',
        'LoginProfile$UserName' => '<p>The name of the user, which can be used for signing in to the AWS Management Console.</p>',
        'MFADevice$UserName' => '<p>The user with whom the MFA device is associated.</p>',
        'SigningCertificate$UserName' => '<p>The name of the user the signing certificate is associated with.</p>',
        'UpdateLoginProfileRequest$UserName' => '<p>The name of the user whose password you want to update.</p>',
        'UpdateUserRequest$NewUserName' => '<p>New name for the user. Include this parameter only if you\'re changing the user\'s name.</p>',
        'User$UserName' => '<p>The friendly name identifying the user.</p>',
        'UserDetail$UserName' => '<p>The friendly name identifying the user.</p>',
      ],
    ],
    'virtualMFADeviceListType' => [
      'base' => NULL,
      'refs' => [
        'ListVirtualMFADevicesResponse$VirtualMFADevices' => '<p> The list of virtual MFA devices in the current account that match the <code>AssignmentStatus</code> value that was passed in the request. </p>',
      ],
    ],
    'virtualMFADeviceName' => [
      'base' => NULL,
      'refs' => [
        'CreateVirtualMFADeviceRequest$VirtualMFADeviceName' => '<p> The name of the virtual MFA device. Use with path to uniquely identify a virtual MFA device. </p>',
      ],
    ],
  ],
];
