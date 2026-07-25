<?php
namespace Aws\Signin;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Sign-In Service** service.
 * @method \Aws\Result createOAuth2Token(array $args = [])
 * @phpstan-method \Aws\Result createOAuth2Token(array{
 *     tokenInput?: array{
 *         clientId?: string,
 *         grantType?: string,
 *         code?: string,
 *         redirectUri?: string,
 *         codeVerifier?: string,
 *         refreshToken?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOAuth2TokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOAuth2TokenAsync(array{
 *     tokenInput?: array{
 *         clientId?: string,
 *         grantType?: string,
 *         code?: string,
 *         redirectUri?: string,
 *         codeVerifier?: string,
 *         refreshToken?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOAuth2TokenWithIAM(array $args = [])
 * @phpstan-method \Aws\Result createOAuth2TokenWithIAM(array{grantType?: string, resource?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createOAuth2TokenWithIAMAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOAuth2TokenWithIAMAsync(array{grantType?: string, resource?: string, ...} $args = [])
 * @method \Aws\Result deleteConsoleAuthorizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteConsoleAuthorizationConfiguration(array{targetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConsoleAuthorizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConsoleAuthorizationConfigurationAsync(array{targetId?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePermissionStatement(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePermissionStatement(array{statementId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePermissionStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePermissionStatementAsync(array{statementId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result getConsoleAuthorizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getConsoleAuthorizationConfiguration(array{targetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConsoleAuthorizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConsoleAuthorizationConfigurationAsync(array{targetId?: string, ...} $args = [])
 * @method \Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{...} $args = [])
 * @method \Aws\Result introspectOAuth2TokenWithIAM(array $args = [])
 * @phpstan-method \Aws\Result introspectOAuth2TokenWithIAM(array{token?: string, tokenTypeHint?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise introspectOAuth2TokenWithIAMAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise introspectOAuth2TokenWithIAMAsync(array{token?: string, tokenTypeHint?: string, ...} $args = [])
 * @method \Aws\Result listResourcePermissionStatements(array $args = [])
 * @phpstan-method \Aws\Result listResourcePermissionStatements(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcePermissionStatementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcePermissionStatementsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result putConsoleAuthorizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putConsoleAuthorizationConfiguration(array{targetId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putConsoleAuthorizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConsoleAuthorizationConfigurationAsync(array{targetId?: string, ...} $args = [])
 * @method \Aws\Result putResourcePermissionStatement(array $args = [])
 * @phpstan-method \Aws\Result putResourcePermissionStatement(array{
 *     sourceVpc?: string,
 *     signinSourceVpce?: string,
 *     consoleSourceVpce?: string,
 *     vpcSourceIp?: string,
 *     sourceIp?: string,
 *     requestedRegion?: string,
 *     excludedPrincipal?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePermissionStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePermissionStatementAsync(array{
 *     sourceVpc?: string,
 *     signinSourceVpce?: string,
 *     consoleSourceVpce?: string,
 *     vpcSourceIp?: string,
 *     sourceIp?: string,
 *     requestedRegion?: string,
 *     excludedPrincipal?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result revokeOAuth2TokenWithIAM(array $args = [])
 * @phpstan-method \Aws\Result revokeOAuth2TokenWithIAM(array{token?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise revokeOAuth2TokenWithIAMAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokeOAuth2TokenWithIAMAsync(array{token?: string, ...} $args = [])
 */
class SigninClient extends AwsClient {}
