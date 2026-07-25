<?php
namespace Aws\SSOOIDC;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SSO OIDC** service.
 * @method \Aws\Result createToken(array $args = [])
 * @phpstan-method \Aws\Result createToken(array{
 *     clientId?: string,
 *     clientSecret?: string,
 *     grantType?: string,
 *     deviceCode?: string,
 *     code?: string,
 *     refreshToken?: string,
 *     scope?: list<string>,
 *     redirectUri?: string,
 *     codeVerifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTokenAsync(array{
 *     clientId?: string,
 *     clientSecret?: string,
 *     grantType?: string,
 *     deviceCode?: string,
 *     code?: string,
 *     refreshToken?: string,
 *     scope?: list<string>,
 *     redirectUri?: string,
 *     codeVerifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTokenWithIAM(array $args = [])
 * @phpstan-method \Aws\Result createTokenWithIAM(array{
 *     clientId?: string,
 *     grantType?: string,
 *     code?: string,
 *     refreshToken?: string,
 *     assertion?: string,
 *     scope?: list<string>,
 *     redirectUri?: string,
 *     subjectToken?: string,
 *     subjectTokenType?: string,
 *     requestedTokenType?: string,
 *     codeVerifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTokenWithIAMAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTokenWithIAMAsync(array{
 *     clientId?: string,
 *     grantType?: string,
 *     code?: string,
 *     refreshToken?: string,
 *     assertion?: string,
 *     scope?: list<string>,
 *     redirectUri?: string,
 *     subjectToken?: string,
 *     subjectTokenType?: string,
 *     requestedTokenType?: string,
 *     codeVerifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerClient(array $args = [])
 * @phpstan-method \Aws\Result registerClient(array{
 *     clientName?: string,
 *     clientType?: string,
 *     scopes?: list<string>,
 *     redirectUris?: list<string>,
 *     grantTypes?: list<string>,
 *     issuerUrl?: string,
 *     entitledApplicationArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerClientAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerClientAsync(array{
 *     clientName?: string,
 *     clientType?: string,
 *     scopes?: list<string>,
 *     redirectUris?: list<string>,
 *     grantTypes?: list<string>,
 *     issuerUrl?: string,
 *     entitledApplicationArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDeviceAuthorization(array $args = [])
 * @phpstan-method \Aws\Result startDeviceAuthorization(array{clientId?: string, clientSecret?: string, startUrl?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startDeviceAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDeviceAuthorizationAsync(array{clientId?: string, clientSecret?: string, startUrl?: string, ...} $args = [])
 */
class SSOOIDCClient extends AwsClient {}
