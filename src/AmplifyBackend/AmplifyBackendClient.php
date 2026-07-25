<?php
namespace Aws\AmplifyBackend;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AmplifyBackend** service.
 * @method \Aws\Result cloneBackend(array $args = [])
 * @phpstan-method \Aws\Result cloneBackend(array{AppId?: string, BackendEnvironmentName?: string, TargetEnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cloneBackendAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cloneBackendAsync(array{AppId?: string, BackendEnvironmentName?: string, TargetEnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result createBackend(array $args = [])
 * @phpstan-method \Aws\Result createBackend(array{
 *     AppId?: string,
 *     AppName?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array,
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackendAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackendAsync(array{
 *     AppId?: string,
 *     AppName?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array,
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackendAPI(array $args = [])
 * @phpstan-method \Aws\Result createBackendAPI(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackendAPIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackendAPIAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackendAuth(array $args = [])
 * @phpstan-method \Aws\Result createBackendAuth(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AuthResources?: 'IDENTITY_POOL_AND_USER_POOL'|'USER_POOL_ONLY',
 *         IdentityPoolConfigs?: array{IdentityPoolName?: string, UnauthenticatedLogin?: bool, ...},
 *         Service?: 'COGNITO',
 *         UserPoolConfigs?: array{
 *             ForgotPassword?: array,
 *             Mfa?: array,
 *             OAuth?: array,
 *             PasswordPolicy?: array,
 *             RequiredSignUpAttributes?: list<'ADDRESS'|'BIRTHDATE'|'EMAIL'|'FAMILY_NAME'|'GENDER'|'GIVEN_NAME'|'LOCALE'|'MIDDLE_NAME'|'NAME'|'NICKNAME'|'PHONE_NUMBER'|'PICTURE'|'PREFERRED_USERNAME'|'PROFILE'|'UPDATED_AT'|'WEBSITE'|'ZONE_INFO'>,
 *             SignInMethod?: 'EMAIL'|'EMAIL_AND_PHONE_NUMBER'|'PHONE_NUMBER'|'USERNAME',
 *             UserPoolName?: string,
 *             VerificationMessage?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackendAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackendAuthAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AuthResources?: 'IDENTITY_POOL_AND_USER_POOL'|'USER_POOL_ONLY',
 *         IdentityPoolConfigs?: array{IdentityPoolName?: string, UnauthenticatedLogin?: bool, ...},
 *         Service?: 'COGNITO',
 *         UserPoolConfigs?: array{
 *             ForgotPassword?: array,
 *             Mfa?: array,
 *             OAuth?: array,
 *             PasswordPolicy?: array,
 *             RequiredSignUpAttributes?: list<'ADDRESS'|'BIRTHDATE'|'EMAIL'|'FAMILY_NAME'|'GENDER'|'GIVEN_NAME'|'LOCALE'|'MIDDLE_NAME'|'NAME'|'NICKNAME'|'PHONE_NUMBER'|'PICTURE'|'PREFERRED_USERNAME'|'PROFILE'|'UPDATED_AT'|'WEBSITE'|'ZONE_INFO'>,
 *             SignInMethod?: 'EMAIL'|'EMAIL_AND_PHONE_NUMBER'|'PHONE_NUMBER'|'USERNAME',
 *             UserPoolName?: string,
 *             VerificationMessage?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBackendConfig(array $args = [])
 * @phpstan-method \Aws\Result createBackendConfig(array{AppId?: string, BackendManagerAppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackendConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackendConfigAsync(array{AppId?: string, BackendManagerAppId?: string, ...} $args = [])
 * @method \Aws\Result createBackendStorage(array $args = [])
 * @phpstan-method \Aws\Result createBackendStorage(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         BucketName?: string,
 *         Permissions?: array{
 *             Authenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             UnAuthenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             ...,
 *         },
 *         ServiceName?: 'S3',
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBackendStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBackendStorageAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         BucketName?: string,
 *         Permissions?: array{
 *             Authenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             UnAuthenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             ...,
 *         },
 *         ServiceName?: 'S3',
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createToken(array $args = [])
 * @phpstan-method \Aws\Result createToken(array{AppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTokenAsync(array{AppId?: string, ...} $args = [])
 * @method \Aws\Result deleteBackend(array $args = [])
 * @phpstan-method \Aws\Result deleteBackend(array{AppId?: string, BackendEnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackendAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackendAsync(array{AppId?: string, BackendEnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result deleteBackendAPI(array $args = [])
 * @phpstan-method \Aws\Result deleteBackendAPI(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackendAPIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackendAPIAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteBackendAuth(array $args = [])
 * @phpstan-method \Aws\Result deleteBackendAuth(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackendAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackendAuthAsync(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \Aws\Result deleteBackendStorage(array $args = [])
 * @phpstan-method \Aws\Result deleteBackendStorage(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ServiceName?: 'S3', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBackendStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackendStorageAsync(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ServiceName?: 'S3', ...} $args = [])
 * @method \Aws\Result deleteToken(array $args = [])
 * @phpstan-method \Aws\Result deleteToken(array{AppId?: string, SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTokenAsync(array{AppId?: string, SessionId?: string, ...} $args = [])
 * @method \Aws\Result generateBackendAPIModels(array $args = [])
 * @phpstan-method \Aws\Result generateBackendAPIModels(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise generateBackendAPIModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateBackendAPIModelsAsync(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \Aws\Result getBackend(array $args = [])
 * @phpstan-method \Aws\Result getBackend(array{AppId?: string, BackendEnvironmentName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendAsync(array{AppId?: string, BackendEnvironmentName?: string, ...} $args = [])
 * @method \Aws\Result getBackendAPI(array $args = [])
 * @phpstan-method \Aws\Result getBackendAPI(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendAPIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendAPIAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getBackendAPIModels(array $args = [])
 * @phpstan-method \Aws\Result getBackendAPIModels(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendAPIModelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendAPIModelsAsync(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \Aws\Result getBackendAuth(array $args = [])
 * @phpstan-method \Aws\Result getBackendAuth(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendAuthAsync(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \Aws\Result getBackendJob(array $args = [])
 * @phpstan-method \Aws\Result getBackendJob(array{AppId?: string, BackendEnvironmentName?: string, JobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendJobAsync(array{AppId?: string, BackendEnvironmentName?: string, JobId?: string, ...} $args = [])
 * @method \Aws\Result getBackendStorage(array $args = [])
 * @phpstan-method \Aws\Result getBackendStorage(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBackendStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBackendStorageAsync(array{AppId?: string, BackendEnvironmentName?: string, ResourceName?: string, ...} $args = [])
 * @method \Aws\Result getChallengeToken(array $args = [])
 * @phpstan-method \Aws\Result getChallengeToken(array{AppId?: string, SessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getChallengeTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getChallengeTokenAsync(array{AppId?: string, SessionId?: string, ...} $args = [])
 * @method \Aws\Result importBackendAuth(array $args = [])
 * @phpstan-method \Aws\Result importBackendAuth(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     IdentityPoolId?: string,
 *     NativeClientId?: string,
 *     UserPoolId?: string,
 *     WebClientId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importBackendAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importBackendAuthAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     IdentityPoolId?: string,
 *     NativeClientId?: string,
 *     UserPoolId?: string,
 *     WebClientId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importBackendStorage(array $args = [])
 * @phpstan-method \Aws\Result importBackendStorage(array{AppId?: string, BackendEnvironmentName?: string, BucketName?: string, ServiceName?: 'S3', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise importBackendStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importBackendStorageAsync(array{AppId?: string, BackendEnvironmentName?: string, BucketName?: string, ServiceName?: 'S3', ...} $args = [])
 * @method \Aws\Result listBackendJobs(array $args = [])
 * @phpstan-method \Aws\Result listBackendJobs(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     JobId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Operation?: string,
 *     Status?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listBackendJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBackendJobsAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     JobId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Operation?: string,
 *     Status?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listS3Buckets(array $args = [])
 * @phpstan-method \Aws\Result listS3Buckets(array{NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listS3BucketsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listS3BucketsAsync(array{NextToken?: string, ...} $args = [])
 * @method \Aws\Result removeAllBackends(array $args = [])
 * @phpstan-method \Aws\Result removeAllBackends(array{AppId?: string, CleanAmplifyApp?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeAllBackendsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeAllBackendsAsync(array{AppId?: string, CleanAmplifyApp?: bool, ...} $args = [])
 * @method \Aws\Result removeBackendConfig(array $args = [])
 * @phpstan-method \Aws\Result removeBackendConfig(array{AppId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeBackendConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeBackendConfigAsync(array{AppId?: string, ...} $args = [])
 * @method \Aws\Result updateBackendAPI(array $args = [])
 * @phpstan-method \Aws\Result updateBackendAPI(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBackendAPIAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBackendAPIAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AdditionalAuthTypes?: list<array>,
 *         ApiName?: string,
 *         ConflictResolution?: array{ResolutionStrategy?: 'AUTOMERGE'|'LAMBDA'|'NONE'|'OPTIMISTIC_CONCURRENCY', ...},
 *         DefaultAuthType?: array{Mode?: 'AMAZON_COGNITO_USER_POOLS'|'API_KEY'|'AWS_IAM'|'OPENID_CONNECT', Settings?: array, ...},
 *         Service?: string,
 *         TransformSchema?: string,
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBackendAuth(array $args = [])
 * @phpstan-method \Aws\Result updateBackendAuth(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AuthResources?: 'IDENTITY_POOL_AND_USER_POOL'|'USER_POOL_ONLY',
 *         IdentityPoolConfigs?: array{UnauthenticatedLogin?: bool, ...},
 *         Service?: 'COGNITO',
 *         UserPoolConfigs?: array{
 *             ForgotPassword?: array,
 *             Mfa?: array,
 *             OAuth?: array,
 *             PasswordPolicy?: array,
 *             VerificationMessage?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBackendAuthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBackendAuthAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         AuthResources?: 'IDENTITY_POOL_AND_USER_POOL'|'USER_POOL_ONLY',
 *         IdentityPoolConfigs?: array{UnauthenticatedLogin?: bool, ...},
 *         Service?: 'COGNITO',
 *         UserPoolConfigs?: array{
 *             ForgotPassword?: array,
 *             Mfa?: array,
 *             OAuth?: array,
 *             PasswordPolicy?: array,
 *             VerificationMessage?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBackendConfig(array $args = [])
 * @phpstan-method \Aws\Result updateBackendConfig(array{
 *     AppId?: string,
 *     LoginAuthConfig?: array{
 *         AwsCognitoIdentityPoolId?: string,
 *         AwsCognitoRegion?: string,
 *         AwsUserPoolsId?: string,
 *         AwsUserPoolsWebClientId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBackendConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBackendConfigAsync(array{
 *     AppId?: string,
 *     LoginAuthConfig?: array{
 *         AwsCognitoIdentityPoolId?: string,
 *         AwsCognitoRegion?: string,
 *         AwsUserPoolsId?: string,
 *         AwsUserPoolsWebClientId?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBackendJob(array $args = [])
 * @phpstan-method \Aws\Result updateBackendJob(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     JobId?: string,
 *     Operation?: string,
 *     Status?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBackendJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBackendJobAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     JobId?: string,
 *     Operation?: string,
 *     Status?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBackendStorage(array $args = [])
 * @phpstan-method \Aws\Result updateBackendStorage(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         Permissions?: array{
 *             Authenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             UnAuthenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             ...,
 *         },
 *         ServiceName?: 'S3',
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBackendStorageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBackendStorageAsync(array{
 *     AppId?: string,
 *     BackendEnvironmentName?: string,
 *     ResourceConfig?: array{
 *         Permissions?: array{
 *             Authenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             UnAuthenticated?: list<'CREATE_AND_UPDATE'|'DELETE'|'READ'>,
 *             ...,
 *         },
 *         ServiceName?: 'S3',
 *         ...,
 *     },
 *     ResourceName?: string,
 *     ...,
 * } $args = [])
 */
class AmplifyBackendClient extends AwsClient {}
