<?php return [
  'operations' => [
    'CreateIdentityPool' => '<p>Creates a new identity pool. The identity pool is a store of user identity information that is specific to your AWS account. The limit on identity pools is 60 per account.</p>',
    'DeleteIdentityPool' => '<p>Deletes a user pool. Once a pool is deleted, users will not be able to authenticate with the pool.</p>',
    'DescribeIdentityPool' => '<p>Gets details about a particular identity pool, including the pool name, ID description, creation date, and current number of users.</p>',
    'GetId' => '<p>Generates (or retrieves] a Cognito ID. Supplying multiple logins will create an implicit linked account.</p>',
    'GetOpenIdToken' => '<p>Gets an OpenID token, using a known Cognito ID. This known Cognito ID is returned by <a>GetId</a>. You can optionally add additional logins for the identity. Supplying multiple logins creates an implicit link.</p> <p>The OpenId token is valid for 15 minutes.</p>',
    'GetOpenIdTokenForDeveloperIdentity' => '<p>Registers (or retrieves] a Cognito <code>IdentityId</code> and an OpenID Connect token for a user authenticated by your backend authentication process. Supplying multiple logins will create an implicit linked account. You can only specify one developer provider as part of the <code>Logins</code> map, which is linked to the identity pool. The developer provider is the "domain" by which Cognito will refer to your users.</p> <p>You can use <code>GetOpenIdTokenForDeveloperIdentity</code> to create a new identity and to link new logins (that is, user credentials issued by a public provider or developer provider] to an existing identity. When you want to create a new identity, the <code>IdentityId</code> should be null. When you want to associate a new login with an existing authenticated/unauthenticated identity, you can do so by providing the existing <code>IdentityId</code>. This API will create the identity in the specified <code>IdentityPoolId</code>.</p>',
    'ListIdentities' => '<p>Lists the identities in a pool.</p>',
    'ListIdentityPools' => '<p>Lists all of the Cognito identity pools registered for your account.</p>',
    'LookupDeveloperIdentity' => '<p>Retrieves the <code>IdentityID</code> associated with a <code>DeveloperUserIdentifier</code> or the list of <code>DeveloperUserIdentifier</code>s associated with an <code>IdentityId</code> for an existing identity. Either <code>IdentityID</code> or <code>DeveloperUserIdentifier</code> must not be null. If you supply only one of these values, the other value will be searched in the database and returned as a part of the response. If you supply both, <code>DeveloperUserIdentifier</code> will be matched against <code>IdentityID</code>. If the values are verified against the database, the response returns both values and is the same as the request. Otherwise a <code>ResourceConflictException</code> is thrown.</p>',
    'MergeDeveloperIdentities' => '<p>Merges two users having different <code>IdentityId</code>s, existing in the same identity pool, and identified by the same developer provider. You can use this action to request that discrete users be merged and identified as a single user in the Cognito environment. Cognito associates the given source user (<code>SourceUserIdentifier</code>] with the <code>IdentityId</code> of the <code>DestinationUserIdentifier</code>. Only developer-authenticated users can be merged. If the users to be merged are associated with the same public provider, but as two different users, an exception will be thrown.</p>',
    'UnlinkDeveloperIdentity' => '<p>Unlinks a <code>DeveloperUserIdentifier</code> from an existing identity. Unlinked developer users will be considered new identities next time they are seen. If, for a given Cognito identity, you remove all federated identities as well as the developer user identifier, the Cognito identity becomes inaccessible.</p>',
    'UnlinkIdentity' => '<p>Unlinks a federated identity from an existing account. Unlinked logins will be considered new identities next time they are seen. Removing the last linked login will make this identity inaccessible.</p>',
    'UpdateIdentityPool' => '<p>Updates a user pool.</p>',
  ],
  'service' => '<fullname>Amazon Cognito</fullname> <p>Amazon Cognito is a web service that delivers scoped temporary credentials to mobile devices and other untrusted environments. Amazon Cognito uniquely identifies a device and supplies the user with a consistent identity over the lifetime of an application.</p> <p>Using Amazon Cognito, you can enable authentication with one or more third-party identity providers (Facebook, Google, or Login with Amazon], and you can also choose to support unauthenticated access from your app. Cognito delivers a unique identifier for each user and acts as an OpenID token provider trusted by AWS Security Token Service (STS] to access temporary, limited-privilege AWS credentials.</p> <p>To provide end-user credentials, first make an unsigned call to <a>GetId</a>. If the end user is authenticated with one of the supported identity providers, set the <code>Logins</code> map with the identity provider token. <code>GetId</code> returns a unique identifier for the user.</p> <p>Next, make an unsigned call to <a>GetOpenIdToken</a>, which returns the OpenID token necessary to call STS and retrieve AWS credentials. This call expects the same <code>Logins</code> map as the <code>GetId</code> call, as well as the <code>IdentityID</code> originally returned by <code>GetId</code>. The token returned by <code>GetOpenIdToken</code> can be passed to the STS operation <a href="http://docs.aws.amazon.com/STS/latest/APIReference/API_AssumeRoleWithWebIdentity.html">AssumeRoleWithWebIdentity</a> to retrieve AWS credentials.</p>',
  'shapes' => [
    'AccountId' => [
      'base' => NULL,
      'refs' => [
        'GetIdInput$AccountId' => 'A standard AWS account ID (9+ digits].',
      ],
    ],
    'CreateIdentityPoolInput' => [
      'base' => '<p>Input to the CreateIdentityPool action.</p>',
      'refs' => [],
    ],
    'DeleteIdentityPoolInput' => [
      'base' => '<p>Input to the DeleteIdentityPool action.</p>',
      'refs' => [],
    ],
    'DescribeIdentityPoolInput' => [
      'base' => 'Input to the DescribeIdentityPool action.',
      'refs' => [],
    ],
    'DeveloperProviderName' => [
      'base' => NULL,
      'refs' => [
        'CreateIdentityPoolInput$DeveloperProviderName' => '<p>The "domain" by which Cognito will refer to your users. This name acts as a placeholder that allows your backend and the Cognito service to communicate about the developer provider. For the <code>DeveloperProviderName</code>, you can use letters as well as period (<code>.</code>], underscore (<code>_</code>], and dash (<code>-</code>].</p> <p>Once you have set a developer provider name, you cannot change it. Please take care in setting this parameter.</p>',
        'IdentityPool$DeveloperProviderName' => '<p>The "domain" by which Cognito will refer to your users.</p>',
        'MergeDeveloperIdentitiesInput$DeveloperProviderName' => '<p>The "domain" by which Cognito will refer to your users. This is a (pseudo] domain name that you provide while creating an identity pool. This name acts as a placeholder that allows your backend and the Cognito service to communicate about the developer provider. For the <code>DeveloperProviderName</code>, you can use letters as well as period (.], underscore (_], and dash (-].</p>',
        'UnlinkDeveloperIdentityInput$DeveloperProviderName' => '<p>The "domain" by which Cognito will refer to your users.</p>',
      ],
    ],
    'DeveloperUserAlreadyRegisteredException' => [
      'base' => '<p>The provided developer user identifier is already registered with Cognito under a different identity ID.</p>',
      'refs' => [],
    ],
    'DeveloperUserIdentifier' => [
      'base' => NULL,
      'refs' => [
        'DeveloperUserIdentifierList$member' => NULL,
        'LookupDeveloperIdentityInput$DeveloperUserIdentifier' => '<p>A unique ID used by your backend authentication process to identify a user. Typically, a developer identity provider would issue many developer user identifiers, in keeping with the number of users.</p>',
        'MergeDeveloperIdentitiesInput$SourceUserIdentifier' => '<p>User identifier for the source user. The value should be a <code>DeveloperUserIdentifier</code>.</p>',
        'MergeDeveloperIdentitiesInput$DestinationUserIdentifier' => '<p>User identifier for the destination user. The value should be a <code>DeveloperUserIdentifier</code>.</p>',
        'UnlinkDeveloperIdentityInput$DeveloperUserIdentifier' => 'A unique ID used by your backend authentication process to identify a user.',
      ],
    ],
    'DeveloperUserIdentifierList' => [
      'base' => NULL,
      'refs' => [
        'LookupDeveloperIdentityResponse$DeveloperUserIdentifierList' => '<p>This is the list of developer user identifiers associated with an identity ID. Cognito supports the association of multiple developer user identifiers with an identity ID.</p>',
      ],
    ],
    'GetIdInput' => [
      'base' => 'Input to the GetId action.',
      'refs' => [],
    ],
    'GetIdResponse' => [
      'base' => 'Returned in response to a GetId request.',
      'refs' => [],
    ],
    'GetOpenIdTokenForDeveloperIdentityInput' => [
      'base' => '<p>Input to the <code>GetOpenIdTokenForDeveloperIdentity</code> action.</p>',
      'refs' => [],
    ],
    'GetOpenIdTokenForDeveloperIdentityResponse' => [
      'base' => '<p>Returned in response to a successful <code>GetOpenIdTokenForDeveloperIdentity</code> request.</p>',
      'refs' => [],
    ],
    'GetOpenIdTokenInput' => [
      'base' => 'Input to the GetOpenIdToken action.',
      'refs' => [],
    ],
    'GetOpenIdTokenResponse' => [
      'base' => 'Returned in response to a successful GetOpenIdToken request.',
      'refs' => [],
    ],
    'IdentitiesList' => [
      'base' => NULL,
      'refs' => [
        'ListIdentitiesResponse$Identities' => 'An object containing a set of identities and associated mappings.',
      ],
    ],
    'IdentityDescription' => [
      'base' => 'A description of the identity.',
      'refs' => [
        'IdentitiesList$member' => NULL,
      ],
    ],
    'IdentityId' => [
      'base' => NULL,
      'refs' => [
        'GetIdResponse$IdentityId' => 'A unique identifier in the format REGION:GUID.',
        'GetOpenIdTokenForDeveloperIdentityInput$IdentityId' => '<p>A unique identifier in the format REGION:GUID.</p>',
        'GetOpenIdTokenForDeveloperIdentityResponse$IdentityId' => '<p>A unique identifier in the format REGION:GUID.</p>',
        'GetOpenIdTokenInput$IdentityId' => 'A unique identifier in the format REGION:GUID.',
        'GetOpenIdTokenResponse$IdentityId' => 'A unique identifier in the format REGION:GUID. Note that the IdentityId returned may not match the one passed on input.',
        'IdentityDescription$IdentityId' => 'A unique identifier in the format REGION:GUID.',
        'LookupDeveloperIdentityInput$IdentityId' => '<p>A unique identifier in the format REGION:GUID.</p>',
        'LookupDeveloperIdentityResponse$IdentityId' => '<p>A unique identifier in the format REGION:GUID.</p>',
        'MergeDeveloperIdentitiesResponse$IdentityId' => '<p>A unique identifier in the format REGION:GUID.</p>',
        'UnlinkDeveloperIdentityInput$IdentityId' => '<p>A unique identifier in the format REGION:GUID.</p>',
        'UnlinkIdentityInput$IdentityId' => 'A unique identifier in the format REGION:GUID.',
      ],
    ],
    'IdentityPool' => [
      'base' => 'An object representing a Cognito identity pool.',
      'refs' => [],
    ],
    'IdentityPoolId' => [
      'base' => NULL,
      'refs' => [
        'DeleteIdentityPoolInput$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'DescribeIdentityPoolInput$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'GetIdInput$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'GetOpenIdTokenForDeveloperIdentityInput$IdentityPoolId' => '<p>An identity pool ID in the format REGION:GUID.</p>',
        'IdentityPool$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'IdentityPoolShortDescription$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'ListIdentitiesInput$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'ListIdentitiesResponse$IdentityPoolId' => 'An identity pool ID in the format REGION:GUID.',
        'LookupDeveloperIdentityInput$IdentityPoolId' => '<p>An identity pool ID in the format REGION:GUID.</p>',
        'MergeDeveloperIdentitiesInput$IdentityPoolId' => '<p>An identity pool ID in the format REGION:GUID.</p>',
        'UnlinkDeveloperIdentityInput$IdentityPoolId' => '<p>An identity pool ID in the format REGION:GUID.</p>',
      ],
    ],
    'IdentityPoolName' => [
      'base' => NULL,
      'refs' => [
        'CreateIdentityPoolInput$IdentityPoolName' => '<p>A string that you provide.</p>',
        'IdentityPool$IdentityPoolName' => '<p>A string that you provide.</p>',
        'IdentityPoolShortDescription$IdentityPoolName' => 'A string that you provide.',
      ],
    ],
    'IdentityPoolShortDescription' => [
      'base' => 'A description of the identity pool.',
      'refs' => [
        'IdentityPoolsList$member' => NULL,
      ],
    ],
    'IdentityPoolUnauthenticated' => [
      'base' => NULL,
      'refs' => [
        'CreateIdentityPoolInput$AllowUnauthenticatedIdentities' => '<p>TRUE if the identity pool supports unauthenticated logins.</p>',
        'IdentityPool$AllowUnauthenticatedIdentities' => 'TRUE if the identity pool supports unauthenticated logins.',
      ],
    ],
    'IdentityPoolsList' => [
      'base' => NULL,
      'refs' => [
        'ListIdentityPoolsResponse$IdentityPools' => 'The identity pools returned by the ListIdentityPools action.',
      ],
    ],
    'IdentityProviderId' => [
      'base' => NULL,
      'refs' => [
        'IdentityProviders$value' => NULL,
      ],
    ],
    'IdentityProviderName' => [
      'base' => NULL,
      'refs' => [
        'IdentityProviders$key' => NULL,
        'LoginsList$member' => NULL,
        'LoginsMap$key' => NULL,
      ],
    ],
    'IdentityProviderToken' => [
      'base' => NULL,
      'refs' => [
        'LoginsMap$value' => NULL,
      ],
    ],
    'IdentityProviders' => [
      'base' => NULL,
      'refs' => [
        'CreateIdentityPoolInput$SupportedLoginProviders' => '<p>Optional key:value pairs mapping provider names to provider app IDs.</p>',
        'IdentityPool$SupportedLoginProviders' => '<p>Optional key:value pairs mapping provider names to provider app IDs.</p>',
      ],
    ],
    'InternalErrorException' => [
      'base' => 'Thrown when the service encounters an error during processing the request.',
      'refs' => [],
    ],
    'InvalidParameterException' => [
      'base' => 'Thrown for missing or bad input parameter(s].',
      'refs' => [],
    ],
    'LimitExceededException' => [
      'base' => 'Thrown when the total number of user pools has exceeded a preset limit.',
      'refs' => [],
    ],
    'ListIdentitiesInput' => [
      'base' => 'Input to the ListIdentities action.',
      'refs' => [],
    ],
    'ListIdentitiesResponse' => [
      'base' => 'The response to a ListIdentities request.',
      'refs' => [],
    ],
    'ListIdentityPoolsInput' => [
      'base' => 'Input to the ListIdentityPools action.',
      'refs' => [],
    ],
    'ListIdentityPoolsResponse' => [
      'base' => 'The result of a successful ListIdentityPools action.',
      'refs' => [],
    ],
    'LoginsList' => [
      'base' => NULL,
      'refs' => [
        'IdentityDescription$Logins' => 'A set of optional name-value pairs that map provider names to provider tokens.',
        'UnlinkIdentityInput$LoginsToRemove' => 'Provider names to unlink from this identity.',
      ],
    ],
    'LoginsMap' => [
      'base' => NULL,
      'refs' => [
        'GetIdInput$Logins' => '<p>A set of optional name-value pairs that map provider names to provider tokens.</p> <p>The available provider names for <code>Logins</code> are as follows: <ul> <li>Facebook: <code>graph.facebook.com</code> </li> <li>Google: <code>accounts.google.com</code> </li> <li>Amazon: <code>www.amazon.com</code> </li> </ul> </p>',
        'GetOpenIdTokenForDeveloperIdentityInput$Logins' => '<p>A set of optional name-value pairs that map provider names to provider tokens. Each name-value pair represents a user from a public provider or developer provider. If the user is from a developer provider, the name-value pair will follow the syntax <code>"developer_provider_name": "developer_user_identifier"</code>. The developer provider is the "domain" by which Cognito will refer to your users; you provided this domain while creating/updating the identity pool. The developer user identifier is an identifier from your backend that uniquely identifies a user. When you create an identity pool, you can specify the supported logins.</p>',
        'GetOpenIdTokenInput$Logins' => 'A set of optional name-value pairs that map provider names to provider tokens.',
        'UnlinkIdentityInput$Logins' => 'A set of optional name-value pairs that map provider names to provider tokens.',
      ],
    ],
    'LookupDeveloperIdentityInput' => [
      'base' => '<p>Input to the <code>LookupDeveloperIdentityInput</code> action.</p>',
      'refs' => [],
    ],
    'LookupDeveloperIdentityResponse' => [
      'base' => '<p>Returned in response to a successful <code>LookupDeveloperIdentity</code> action.</p>',
      'refs' => [],
    ],
    'MergeDeveloperIdentitiesInput' => [
      'base' => '<p>Input to the <code>MergeDeveloperIdentities</code> action.</p>',
      'refs' => [],
    ],
    'MergeDeveloperIdentitiesResponse' => [
      'base' => '<p>Returned in response to a successful <code>MergeDeveloperIdentities</code> action.</p>',
      'refs' => [],
    ],
    'NotAuthorizedException' => [
      'base' => 'Thrown when a user is not authorized to access the requested resource.',
      'refs' => [],
    ],
    'OIDCProviderARN' => [
      'base' => NULL,
      'refs' => [
        'OIDCProviderList$member' => NULL,
      ],
    ],
    'OIDCProviderList' => [
      'base' => NULL,
      'refs' => [
        'CreateIdentityPoolInput$OpenIdConnectProviderARNs' => NULL,
        'IdentityPool$OpenIdConnectProviderARNs' => NULL,
      ],
    ],
    'OIDCToken' => [
      'base' => NULL,
      'refs' => [
        'GetOpenIdTokenForDeveloperIdentityResponse$Token' => '<p>An OpenID token.</p>',
        'GetOpenIdTokenResponse$Token' => 'An OpenID token, valid for 15 minutes.',
      ],
    ],
    'PaginationKey' => [
      'base' => NULL,
      'refs' => [
        'ListIdentitiesInput$NextToken' => 'A pagination token.',
        'ListIdentitiesResponse$NextToken' => 'A pagination token.',
        'ListIdentityPoolsInput$NextToken' => 'A pagination token.',
        'ListIdentityPoolsResponse$NextToken' => 'A pagination token.',
        'LookupDeveloperIdentityInput$NextToken' => '<p>A pagination token. The first call you make will have <code>NextToken</code> set to null. After that the service will return <code>NextToken</code> values as needed. For example, let\'s say you make a request with <code>MaxResults</code> set to 10, and there are 20 matches in the database. The service will return a pagination token as a part of the response. This token can be used to call the API again and get results starting from the 11th match.</p>',
        'LookupDeveloperIdentityResponse$NextToken' => '<p>A pagination token. The first call you make will have <code>NextToken</code> set to null. After that the service will return <code>NextToken</code> values as needed. For example, let\'s say you make a request with <code>MaxResults</code> set to 10, and there are 20 matches in the database. The service will return a pagination token as a part of the response. This token can be used to call the API again and get results starting from the 11th match.</p>',
      ],
    ],
    'QueryLimit' => [
      'base' => NULL,
      'refs' => [
        'ListIdentitiesInput$MaxResults' => 'The maximum number of identities to return.',
        'ListIdentityPoolsInput$MaxResults' => 'The maximum number of identities to return.',
        'LookupDeveloperIdentityInput$MaxResults' => '<p>The maximum number of identities to return.</p>',
      ],
    ],
    'ResourceConflictException' => [
      'base' => 'Thrown when a user tries to use a login which is already linked to another account.',
      'refs' => [],
    ],
    'ResourceNotFoundException' => [
      'base' => 'Thrown when the requested resource (for example, a dataset or record] does not exist.',
      'refs' => [],
    ],
    'String' => [
      'base' => NULL,
      'refs' => [
        'DeveloperUserAlreadyRegisteredException$message' => '<p>This developer user identifier is already registered with Cognito.</p>',
        'InternalErrorException$message' => 'The message returned by an InternalErrorException.',
        'InvalidParameterException$message' => 'The message returned by an InvalidParameterException.',
        'LimitExceededException$message' => 'The message returned by a LimitExceededException.',
        'NotAuthorizedException$message' => 'The message returned by a NotAuthorizedException',
        'ResourceConflictException$message' => 'The message returned by a ResourceConflictException.',
        'ResourceNotFoundException$message' => 'The message returned by a ResourceNotFoundException.',
        'TooManyRequestsException$message' => 'Message returned by a TooManyRequestsException',
      ],
    ],
    'TokenDuration' => [
      'base' => NULL,
      'refs' => [
        'GetOpenIdTokenForDeveloperIdentityInput$TokenDuration' => '<p>The expiration time of the token, in seconds. You can specify a custom expiration time for the token so that you can cache it. If you don\'t provide an expiration time, the token is valid for 15 minutes. You can exchange the token with Amazon STS for temporary AWS credentials, which are valid for a maximum of one hour. The maximum token duration you can set is 24 hours. You should take care in setting the expiration time for a token, as there are significant security implications: an attacker could use a leaked token to access your AWS resources for the token\'s duration.</p>',
      ],
    ],
    'TooManyRequestsException' => [
      'base' => 'Thrown when a request is throttled.',
      'refs' => [],
    ],
    'UnlinkDeveloperIdentityInput' => [
      'base' => '<p>Input to the <code>UnlinkDeveloperIdentity</code> action.</p>',
      'refs' => [],
    ],
    'UnlinkIdentityInput' => [
      'base' => 'Input to the UnlinkIdentity action.',
      'refs' => [],
    ],
  ],
];
