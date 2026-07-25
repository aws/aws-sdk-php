<?php
namespace Aws\Iot;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT** service.
 *
 * @method \Aws\Result acceptCertificateTransfer(array $args = [])
 * @phpstan-method \Aws\Result acceptCertificateTransfer(array{certificateId?: string, setAsActive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptCertificateTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptCertificateTransferAsync(array{certificateId?: string, setAsActive?: bool, ...} $args = [])
 * @method \Aws\Result addThingToBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result addThingToBillingGroup(array{billingGroupName?: string, billingGroupArn?: string, thingName?: string, thingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise addThingToBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addThingToBillingGroupAsync(array{billingGroupName?: string, billingGroupArn?: string, thingName?: string, thingArn?: string, ...} $args = [])
 * @method \Aws\Result addThingToThingGroup(array $args = [])
 * @phpstan-method \Aws\Result addThingToThingGroup(array{
 *     thingGroupName?: string,
 *     thingGroupArn?: string,
 *     thingName?: string,
 *     thingArn?: string,
 *     overrideDynamicGroups?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise addThingToThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addThingToThingGroupAsync(array{
 *     thingGroupName?: string,
 *     thingGroupArn?: string,
 *     thingName?: string,
 *     thingArn?: string,
 *     overrideDynamicGroups?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateSbomWithPackageVersion(array $args = [])
 * @phpstan-method \Aws\Result associateSbomWithPackageVersion(array{
 *     packageName?: string,
 *     versionName?: string,
 *     sbom?: array{s3Location?: array{bucket?: string, key?: string, version?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSbomWithPackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateSbomWithPackageVersionAsync(array{
 *     packageName?: string,
 *     versionName?: string,
 *     sbom?: array{s3Location?: array{bucket?: string, key?: string, version?: string, ...}, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateTargetsWithJob(array $args = [])
 * @phpstan-method \Aws\Result associateTargetsWithJob(array{targets?: list<string>, jobId?: string, comment?: string, namespaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTargetsWithJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTargetsWithJobAsync(array{targets?: list<string>, jobId?: string, comment?: string, namespaceId?: string, ...} $args = [])
 * @method \Aws\Result attachPolicy(array $args = [])
 * @phpstan-method \Aws\Result attachPolicy(array{policyName?: string, target?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachPolicyAsync(array{policyName?: string, target?: string, ...} $args = [])
 * @method \Aws\Result attachPrincipalPolicy(array $args = [])
 * @phpstan-method \Aws\Result attachPrincipalPolicy(array{policyName?: string, principal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachPrincipalPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachPrincipalPolicyAsync(array{policyName?: string, principal?: string, ...} $args = [])
 * @method \Aws\Result attachSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result attachSecurityProfile(array{securityProfileName?: string, securityProfileTargetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise attachSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachSecurityProfileAsync(array{securityProfileName?: string, securityProfileTargetArn?: string, ...} $args = [])
 * @method \Aws\Result attachThingPrincipal(array $args = [])
 * @phpstan-method \Aws\Result attachThingPrincipal(array{
 *     thingName?: string,
 *     principal?: string,
 *     thingPrincipalType?: 'EXCLUSIVE_THING'|'NON_EXCLUSIVE_THING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise attachThingPrincipalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise attachThingPrincipalAsync(array{
 *     thingName?: string,
 *     principal?: string,
 *     thingPrincipalType?: 'EXCLUSIVE_THING'|'NON_EXCLUSIVE_THING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelAuditMitigationActionsTask(array $args = [])
 * @phpstan-method \Aws\Result cancelAuditMitigationActionsTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAuditMitigationActionsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAuditMitigationActionsTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result cancelAuditTask(array $args = [])
 * @phpstan-method \Aws\Result cancelAuditTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelAuditTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelAuditTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result cancelCertificateTransfer(array $args = [])
 * @phpstan-method \Aws\Result cancelCertificateTransfer(array{certificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelCertificateTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelCertificateTransferAsync(array{certificateId?: string, ...} $args = [])
 * @method \Aws\Result cancelDetectMitigationActionsTask(array $args = [])
 * @phpstan-method \Aws\Result cancelDetectMitigationActionsTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelDetectMitigationActionsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelDetectMitigationActionsTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{jobId?: string, reasonCode?: string, comment?: string, force?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{jobId?: string, reasonCode?: string, comment?: string, force?: bool, ...} $args = [])
 * @method \Aws\Result cancelJobExecution(array $args = [])
 * @phpstan-method \Aws\Result cancelJobExecution(array{
 *     jobId?: string,
 *     thingName?: string,
 *     force?: bool,
 *     expectedVersion?: int,
 *     statusDetails?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobExecutionAsync(array{
 *     jobId?: string,
 *     thingName?: string,
 *     force?: bool,
 *     expectedVersion?: int,
 *     statusDetails?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result clearDefaultAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result clearDefaultAuthorizer(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise clearDefaultAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise clearDefaultAuthorizerAsync(array{...} $args = [])
 * @method \Aws\Result confirmTopicRuleDestination(array $args = [])
 * @phpstan-method \Aws\Result confirmTopicRuleDestination(array{confirmationToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise confirmTopicRuleDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise confirmTopicRuleDestinationAsync(array{confirmationToken?: string, ...} $args = [])
 * @method \Aws\Result createAuditSuppression(array $args = [])
 * @phpstan-method \Aws\Result createAuditSuppression(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     expirationDate?: int|string|\DateTimeInterface,
 *     suppressIndefinitely?: bool,
 *     description?: string,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAuditSuppressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAuditSuppressionAsync(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     expirationDate?: int|string|\DateTimeInterface,
 *     suppressIndefinitely?: bool,
 *     description?: string,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result createAuthorizer(array{
 *     authorizerName?: string,
 *     authorizerFunctionArn?: string,
 *     tokenKeyName?: string,
 *     tokenSigningPublicKeys?: array<string, string>,
 *     status?: 'ACTIVE'|'INACTIVE',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     signingDisabled?: bool,
 *     enableCachingForHttp?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAuthorizerAsync(array{
 *     authorizerName?: string,
 *     authorizerFunctionArn?: string,
 *     tokenKeyName?: string,
 *     tokenSigningPublicKeys?: array<string, string>,
 *     status?: 'ACTIVE'|'INACTIVE',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     signingDisabled?: bool,
 *     enableCachingForHttp?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result createBillingGroup(array{
 *     billingGroupName?: string,
 *     billingGroupProperties?: array{billingGroupDescription?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBillingGroupAsync(array{
 *     billingGroupName?: string,
 *     billingGroupProperties?: array{billingGroupDescription?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCertificateFromCsr(array $args = [])
 * @phpstan-method \Aws\Result createCertificateFromCsr(array{certificateSigningRequest?: string, setAsActive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createCertificateFromCsrAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCertificateFromCsrAsync(array{certificateSigningRequest?: string, setAsActive?: bool, ...} $args = [])
 * @method \Aws\Result createCertificateProvider(array $args = [])
 * @phpstan-method \Aws\Result createCertificateProvider(array{
 *     certificateProviderName?: string,
 *     lambdaFunctionArn?: string,
 *     accountDefaultForOperations?: list<'CreateCertificateFromCsr'>,
 *     clientToken?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCertificateProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCertificateProviderAsync(array{
 *     certificateProviderName?: string,
 *     lambdaFunctionArn?: string,
 *     accountDefaultForOperations?: list<'CreateCertificateFromCsr'>,
 *     clientToken?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCommand(array $args = [])
 * @phpstan-method \Aws\Result createCommand(array{
 *     commandId?: string,
 *     namespace?: 'AWS-IoT'|'AWS-IoT-FleetWise',
 *     displayName?: string,
 *     description?: string,
 *     payload?: array{content?: string|resource|\Psr\Http\Message\StreamInterface, contentType?: string, ...},
 *     payloadTemplate?: string,
 *     preprocessor?: array{awsJsonSubstitution?: array{outputFormat?: 'CBOR'|'JSON', ...}, ...},
 *     mandatoryParameters?: list<array{
 *         name?: string,
 *         type?: 'BINARY'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'LONG'|'STRING'|'UNSIGNEDLONG',
 *         value?: array,
 *         defaultValue?: array,
 *         valueConditions?: list<array>,
 *         description?: string,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCommandAsync(array{
 *     commandId?: string,
 *     namespace?: 'AWS-IoT'|'AWS-IoT-FleetWise',
 *     displayName?: string,
 *     description?: string,
 *     payload?: array{content?: string|resource|\Psr\Http\Message\StreamInterface, contentType?: string, ...},
 *     payloadTemplate?: string,
 *     preprocessor?: array{awsJsonSubstitution?: array{outputFormat?: 'CBOR'|'JSON', ...}, ...},
 *     mandatoryParameters?: list<array{
 *         name?: string,
 *         type?: 'BINARY'|'BOOLEAN'|'DOUBLE'|'INTEGER'|'LONG'|'STRING'|'UNSIGNEDLONG',
 *         value?: array,
 *         defaultValue?: array,
 *         valueConditions?: list<array>,
 *         description?: string,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createCustomMetric(array $args = [])
 * @phpstan-method \Aws\Result createCustomMetric(array{
 *     metricName?: string,
 *     displayName?: string,
 *     metricType?: 'ip-address-list'|'number'|'number-list'|'string-list',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createCustomMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomMetricAsync(array{
 *     metricName?: string,
 *     displayName?: string,
 *     metricType?: 'ip-address-list'|'number'|'number-list'|'string-list',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDimension(array $args = [])
 * @phpstan-method \Aws\Result createDimension(array{
 *     name?: string,
 *     type?: 'TOPIC_FILTER',
 *     stringValues?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDimensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDimensionAsync(array{
 *     name?: string,
 *     type?: 'TOPIC_FILTER',
 *     stringValues?: list<string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDomainConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createDomainConfiguration(array{
 *     domainConfigurationName?: string,
 *     domainName?: string,
 *     serverCertificateArns?: list<string>,
 *     validationCertificateArn?: string,
 *     authorizerConfig?: array{defaultAuthorizerName?: string, allowAuthorizerOverride?: bool, ...},
 *     serviceType?: 'CREDENTIAL_PROVIDER'|'DATA'|'JOBS',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     tlsConfig?: array{securityPolicy?: string, ...},
 *     serverCertificateConfig?: array{enableOCSPCheck?: bool, ocspLambdaArn?: string, ocspAuthorizedResponderArn?: string, ...},
 *     authenticationType?: 'AWS_SIGV4'|'AWS_X509'|'CUSTOM_AUTH'|'CUSTOM_AUTH_X509'|'DEFAULT',
 *     applicationProtocol?: 'DEFAULT'|'HTTPS'|'MQTT_WSS'|'SECURE_MQTT',
 *     clientCertificateConfig?: array{clientCertificateCallbackArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDomainConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainConfigurationAsync(array{
 *     domainConfigurationName?: string,
 *     domainName?: string,
 *     serverCertificateArns?: list<string>,
 *     validationCertificateArn?: string,
 *     authorizerConfig?: array{defaultAuthorizerName?: string, allowAuthorizerOverride?: bool, ...},
 *     serviceType?: 'CREDENTIAL_PROVIDER'|'DATA'|'JOBS',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     tlsConfig?: array{securityPolicy?: string, ...},
 *     serverCertificateConfig?: array{enableOCSPCheck?: bool, ocspLambdaArn?: string, ocspAuthorizedResponderArn?: string, ...},
 *     authenticationType?: 'AWS_SIGV4'|'AWS_X509'|'CUSTOM_AUTH'|'CUSTOM_AUTH_X509'|'DEFAULT',
 *     applicationProtocol?: 'DEFAULT'|'HTTPS'|'MQTT_WSS'|'SECURE_MQTT',
 *     clientCertificateConfig?: array{clientCertificateCallbackArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createDynamicThingGroup(array $args = [])
 * @phpstan-method \Aws\Result createDynamicThingGroup(array{
 *     thingGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     indexName?: string,
 *     queryString?: string,
 *     queryVersion?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createDynamicThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDynamicThingGroupAsync(array{
 *     thingGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     indexName?: string,
 *     queryString?: string,
 *     queryVersion?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createFleetMetric(array $args = [])
 * @phpstan-method \Aws\Result createFleetMetric(array{
 *     metricName?: string,
 *     queryString?: string,
 *     aggregationType?: array{name?: 'Cardinality'|'Percentiles'|'Statistics', values?: list<string>, ...},
 *     period?: int,
 *     aggregationField?: string,
 *     description?: string,
 *     queryVersion?: string,
 *     indexName?: string,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createFleetMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFleetMetricAsync(array{
 *     metricName?: string,
 *     queryString?: string,
 *     aggregationType?: array{name?: 'Cardinality'|'Percentiles'|'Statistics', values?: list<string>, ...},
 *     period?: int,
 *     aggregationField?: string,
 *     description?: string,
 *     queryVersion?: string,
 *     indexName?: string,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     jobId?: string,
 *     targets?: list<string>,
 *     documentSource?: string,
 *     document?: string,
 *     description?: string,
 *     presignedUrlConfig?: array{roleArn?: string, expiresInSec?: int, ...},
 *     targetSelection?: 'CONTINUOUS'|'SNAPSHOT',
 *     jobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     abortConfig?: array{criteriaList?: list<array>, ...},
 *     timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     namespaceId?: string,
 *     jobTemplateArn?: string,
 *     jobExecutionsRetryConfig?: array{criteriaList?: list<array>, ...},
 *     documentParameters?: array<string, string>,
 *     schedulingConfig?: array{
 *         startTime?: string,
 *         endTime?: string,
 *         endBehavior?: 'CANCEL'|'FORCE_CANCEL'|'STOP_ROLLOUT',
 *         maintenanceWindows?: list<array>,
 *         ...,
 *     },
 *     destinationPackageVersions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     jobId?: string,
 *     targets?: list<string>,
 *     documentSource?: string,
 *     document?: string,
 *     description?: string,
 *     presignedUrlConfig?: array{roleArn?: string, expiresInSec?: int, ...},
 *     targetSelection?: 'CONTINUOUS'|'SNAPSHOT',
 *     jobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     abortConfig?: array{criteriaList?: list<array>, ...},
 *     timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     namespaceId?: string,
 *     jobTemplateArn?: string,
 *     jobExecutionsRetryConfig?: array{criteriaList?: list<array>, ...},
 *     documentParameters?: array<string, string>,
 *     schedulingConfig?: array{
 *         startTime?: string,
 *         endTime?: string,
 *         endBehavior?: 'CANCEL'|'FORCE_CANCEL'|'STOP_ROLLOUT',
 *         maintenanceWindows?: list<array>,
 *         ...,
 *     },
 *     destinationPackageVersions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result createJobTemplate(array{
 *     jobTemplateId?: string,
 *     jobArn?: string,
 *     documentSource?: string,
 *     document?: string,
 *     description?: string,
 *     presignedUrlConfig?: array{roleArn?: string, expiresInSec?: int, ...},
 *     jobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     abortConfig?: array{criteriaList?: list<array>, ...},
 *     timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     jobExecutionsRetryConfig?: array{criteriaList?: list<array>, ...},
 *     maintenanceWindows?: list<array{startTime?: string, durationInMinutes?: int, ...}>,
 *     destinationPackageVersions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobTemplateAsync(array{
 *     jobTemplateId?: string,
 *     jobArn?: string,
 *     documentSource?: string,
 *     document?: string,
 *     description?: string,
 *     presignedUrlConfig?: array{roleArn?: string, expiresInSec?: int, ...},
 *     jobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     abortConfig?: array{criteriaList?: list<array>, ...},
 *     timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     jobExecutionsRetryConfig?: array{criteriaList?: list<array>, ...},
 *     maintenanceWindows?: list<array{startTime?: string, durationInMinutes?: int, ...}>,
 *     destinationPackageVersions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createKeysAndCertificate(array $args = [])
 * @phpstan-method \Aws\Result createKeysAndCertificate(array{setAsActive?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createKeysAndCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createKeysAndCertificateAsync(array{setAsActive?: bool, ...} $args = [])
 * @method \Aws\Result createMitigationAction(array $args = [])
 * @phpstan-method \Aws\Result createMitigationAction(array{
 *     actionName?: string,
 *     roleArn?: string,
 *     actionParams?: array{
 *         updateDeviceCertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         updateCACertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         addThingsToThingGroupParams?: array{thingGroupNames?: list<string>, overrideDynamicGroups?: bool, ...},
 *         replaceDefaultPolicyVersionParams?: array{templateName?: 'BLANK_POLICY', ...},
 *         enableIoTLoggingParams?: array{roleArnForLogging?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', ...},
 *         publishFindingToSnsParams?: array{topicArn?: string, ...},
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createMitigationActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMitigationActionAsync(array{
 *     actionName?: string,
 *     roleArn?: string,
 *     actionParams?: array{
 *         updateDeviceCertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         updateCACertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         addThingsToThingGroupParams?: array{thingGroupNames?: list<string>, overrideDynamicGroups?: bool, ...},
 *         replaceDefaultPolicyVersionParams?: array{templateName?: 'BLANK_POLICY', ...},
 *         enableIoTLoggingParams?: array{roleArnForLogging?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', ...},
 *         publishFindingToSnsParams?: array{topicArn?: string, ...},
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOTAUpdate(array $args = [])
 * @phpstan-method \Aws\Result createOTAUpdate(array{
 *     otaUpdateId?: string,
 *     description?: string,
 *     targets?: list<string>,
 *     protocols?: list<'HTTP'|'MQTT'>,
 *     targetSelection?: 'CONTINUOUS'|'SNAPSHOT',
 *     awsJobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     awsJobPresignedUrlConfig?: array{expiresInSec?: int, ...},
 *     awsJobAbortConfig?: array{abortCriteriaList?: list<array>, ...},
 *     awsJobTimeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     files?: list<array{
 *         fileName?: string,
 *         fileType?: int,
 *         fileVersion?: string,
 *         fileLocation?: array,
 *         codeSigning?: array,
 *         attributes?: array<string, string>,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     additionalParameters?: array<string, string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOTAUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOTAUpdateAsync(array{
 *     otaUpdateId?: string,
 *     description?: string,
 *     targets?: list<string>,
 *     protocols?: list<'HTTP'|'MQTT'>,
 *     targetSelection?: 'CONTINUOUS'|'SNAPSHOT',
 *     awsJobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     awsJobPresignedUrlConfig?: array{expiresInSec?: int, ...},
 *     awsJobAbortConfig?: array{abortCriteriaList?: list<array>, ...},
 *     awsJobTimeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     files?: list<array{
 *         fileName?: string,
 *         fileType?: int,
 *         fileVersion?: string,
 *         fileLocation?: array,
 *         codeSigning?: array,
 *         attributes?: array<string, string>,
 *         ...,
 *     }>,
 *     roleArn?: string,
 *     additionalParameters?: array<string, string>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPackage(array $args = [])
 * @phpstan-method \Aws\Result createPackage(array{packageName?: string, description?: string, tags?: array<string, string>, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackageAsync(array{packageName?: string, description?: string, tags?: array<string, string>, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createPackageVersion(array $args = [])
 * @phpstan-method \Aws\Result createPackageVersion(array{
 *     packageName?: string,
 *     versionName?: string,
 *     description?: string,
 *     attributes?: array<string, string>,
 *     artifact?: array{s3Location?: array{bucket?: string, key?: string, version?: string, ...}, ...},
 *     recipe?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackageVersionAsync(array{
 *     packageName?: string,
 *     versionName?: string,
 *     description?: string,
 *     attributes?: array<string, string>,
 *     artifact?: array{s3Location?: array{bucket?: string, key?: string, version?: string, ...}, ...},
 *     recipe?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicy(array $args = [])
 * @phpstan-method \Aws\Result createPolicy(array{
 *     policyName?: string,
 *     policyDocument?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyAsync(array{
 *     policyName?: string,
 *     policyDocument?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result createPolicyVersion(array{policyName?: string, policyDocument?: string, setAsDefault?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPolicyVersionAsync(array{policyName?: string, policyDocument?: string, setAsDefault?: bool, ...} $args = [])
 * @method \Aws\Result createProvisioningClaim(array $args = [])
 * @phpstan-method \Aws\Result createProvisioningClaim(array{templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisioningClaimAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisioningClaimAsync(array{templateName?: string, ...} $args = [])
 * @method \Aws\Result createProvisioningTemplate(array $args = [])
 * @phpstan-method \Aws\Result createProvisioningTemplate(array{
 *     templateName?: string,
 *     description?: string,
 *     templateBody?: string,
 *     enabled?: bool,
 *     provisioningRoleArn?: string,
 *     preProvisioningHook?: array{payloadVersion?: string, targetArn?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     type?: 'FLEET_PROVISIONING'|'JITP',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisioningTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisioningTemplateAsync(array{
 *     templateName?: string,
 *     description?: string,
 *     templateBody?: string,
 *     enabled?: bool,
 *     provisioningRoleArn?: string,
 *     preProvisioningHook?: array{payloadVersion?: string, targetArn?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     type?: 'FLEET_PROVISIONING'|'JITP',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProvisioningTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result createProvisioningTemplateVersion(array{templateName?: string, templateBody?: string, setAsDefault?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisioningTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisioningTemplateVersionAsync(array{templateName?: string, templateBody?: string, setAsDefault?: bool, ...} $args = [])
 * @method \Aws\Result createRoleAlias(array $args = [])
 * @phpstan-method \Aws\Result createRoleAlias(array{
 *     roleAlias?: string,
 *     roleArn?: string,
 *     credentialDurationSeconds?: int,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRoleAliasAsync(array{
 *     roleAlias?: string,
 *     roleArn?: string,
 *     credentialDurationSeconds?: int,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScheduledAudit(array $args = [])
 * @phpstan-method \Aws\Result createScheduledAudit(array{
 *     frequency?: 'BIWEEKLY'|'DAILY'|'MONTHLY'|'WEEKLY',
 *     dayOfMonth?: string,
 *     dayOfWeek?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED',
 *     targetCheckNames?: list<string>,
 *     scheduledAuditName?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScheduledAuditAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScheduledAuditAsync(array{
 *     frequency?: 'BIWEEKLY'|'DAILY'|'MONTHLY'|'WEEKLY',
 *     dayOfMonth?: string,
 *     dayOfWeek?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED',
 *     targetCheckNames?: list<string>,
 *     scheduledAuditName?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result createSecurityProfile(array{
 *     securityProfileName?: string,
 *     securityProfileDescription?: string,
 *     behaviors?: list<array{
 *         name?: string,
 *         metric?: string,
 *         metricDimension?: array,
 *         criteria?: array,
 *         suppressAlerts?: bool,
 *         exportMetric?: bool,
 *         ...,
 *     }>,
 *     alertTargets?: array<string, array{alertTargetArn?: string, roleArn?: string, ...}>,
 *     additionalMetricsToRetain?: list<string>,
 *     additionalMetricsToRetainV2?: list<array{metric?: string, metricDimension?: array, exportMetric?: bool, ...}>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     metricsExportConfig?: array{mqttTopic?: string, roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSecurityProfileAsync(array{
 *     securityProfileName?: string,
 *     securityProfileDescription?: string,
 *     behaviors?: list<array{
 *         name?: string,
 *         metric?: string,
 *         metricDimension?: array,
 *         criteria?: array,
 *         suppressAlerts?: bool,
 *         exportMetric?: bool,
 *         ...,
 *     }>,
 *     alertTargets?: array<string, array{alertTargetArn?: string, roleArn?: string, ...}>,
 *     additionalMetricsToRetain?: list<string>,
 *     additionalMetricsToRetainV2?: list<array{metric?: string, metricDimension?: array, exportMetric?: bool, ...}>,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     metricsExportConfig?: array{mqttTopic?: string, roleArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createStream(array $args = [])
 * @phpstan-method \Aws\Result createStream(array{
 *     streamId?: string,
 *     description?: string,
 *     files?: list<array{fileId?: int, s3Location?: array, ...}>,
 *     roleArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamAsync(array{
 *     streamId?: string,
 *     description?: string,
 *     files?: list<array{fileId?: int, s3Location?: array, ...}>,
 *     roleArn?: string,
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThing(array $args = [])
 * @phpstan-method \Aws\Result createThing(array{
 *     thingName?: string,
 *     thingTypeName?: string,
 *     attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *     billingGroupName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThingAsync(array{
 *     thingName?: string,
 *     thingTypeName?: string,
 *     attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *     billingGroupName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThingGroup(array $args = [])
 * @phpstan-method \Aws\Result createThingGroup(array{
 *     thingGroupName?: string,
 *     parentGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThingGroupAsync(array{
 *     thingGroupName?: string,
 *     parentGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createThingType(array $args = [])
 * @phpstan-method \Aws\Result createThingType(array{
 *     thingTypeName?: string,
 *     thingTypeProperties?: array{
 *         thingTypeDescription?: string,
 *         searchableAttributes?: list<string>,
 *         mqtt5Configuration?: array{propagatingAttributes?: list<array>, ...},
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createThingTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createThingTypeAsync(array{
 *     thingTypeName?: string,
 *     thingTypeProperties?: array{
 *         thingTypeDescription?: string,
 *         searchableAttributes?: list<string>,
 *         mqtt5Configuration?: array{propagatingAttributes?: list<array>, ...},
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTopicRule(array $args = [])
 * @phpstan-method \Aws\Result createTopicRule(array{
 *     ruleName?: string,
 *     topicRulePayload?: array{
 *         sql?: string,
 *         description?: string,
 *         actions?: list<array>,
 *         ruleDisabled?: bool,
 *         awsIotSqlVersion?: string,
 *         errorAction?: array{
 *             dynamoDB?: array,
 *             dynamoDBv2?: array,
 *             lambda?: array,
 *             sns?: array,
 *             sqs?: array,
 *             kinesis?: array,
 *             republish?: array,
 *             s3?: array,
 *             firehose?: array,
 *             cloudwatchMetric?: array,
 *             cloudwatchAlarm?: array,
 *             cloudwatchLogs?: array,
 *             elasticsearch?: array,
 *             salesforce?: array,
 *             iotAnalytics?: array,
 *             iotEvents?: array,
 *             iotSiteWise?: array,
 *             stepFunctions?: array,
 *             timestream?: array,
 *             http?: array,
 *             kafka?: array,
 *             openSearch?: array,
 *             location?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTopicRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTopicRuleAsync(array{
 *     ruleName?: string,
 *     topicRulePayload?: array{
 *         sql?: string,
 *         description?: string,
 *         actions?: list<array>,
 *         ruleDisabled?: bool,
 *         awsIotSqlVersion?: string,
 *         errorAction?: array{
 *             dynamoDB?: array,
 *             dynamoDBv2?: array,
 *             lambda?: array,
 *             sns?: array,
 *             sqs?: array,
 *             kinesis?: array,
 *             republish?: array,
 *             s3?: array,
 *             firehose?: array,
 *             cloudwatchMetric?: array,
 *             cloudwatchAlarm?: array,
 *             cloudwatchLogs?: array,
 *             elasticsearch?: array,
 *             salesforce?: array,
 *             iotAnalytics?: array,
 *             iotEvents?: array,
 *             iotSiteWise?: array,
 *             stepFunctions?: array,
 *             timestream?: array,
 *             http?: array,
 *             kafka?: array,
 *             openSearch?: array,
 *             location?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     tags?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTopicRuleDestination(array $args = [])
 * @phpstan-method \Aws\Result createTopicRuleDestination(array{
 *     destinationConfiguration?: array{
 *         httpUrlConfiguration?: array{confirmationUrl?: string, ...},
 *         vpcConfiguration?: array{subnetIds?: list<string>, securityGroups?: list<string>, vpcId?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTopicRuleDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTopicRuleDestinationAsync(array{
 *     destinationConfiguration?: array{
 *         httpUrlConfiguration?: array{confirmationUrl?: string, ...},
 *         vpcConfiguration?: array{subnetIds?: list<string>, securityGroups?: list<string>, vpcId?: string, roleArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAccountAuditConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteAccountAuditConfiguration(array{deleteScheduledAudits?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAuditConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccountAuditConfigurationAsync(array{deleteScheduledAudits?: bool, ...} $args = [])
 * @method \Aws\Result deleteAuditSuppression(array $args = [])
 * @phpstan-method \Aws\Result deleteAuditSuppression(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAuditSuppressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAuditSuppressionAsync(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result deleteAuthorizer(array{authorizerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array{authorizerName?: string, ...} $args = [])
 * @method \Aws\Result deleteBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteBillingGroup(array{billingGroupName?: string, expectedVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBillingGroupAsync(array{billingGroupName?: string, expectedVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteCACertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteCACertificate(array{certificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCACertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCACertificateAsync(array{certificateId?: string, ...} $args = [])
 * @method \Aws\Result deleteCertificate(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificate(array{certificateId?: string, forceDelete?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateAsync(array{certificateId?: string, forceDelete?: bool, ...} $args = [])
 * @method \Aws\Result deleteCertificateProvider(array $args = [])
 * @phpstan-method \Aws\Result deleteCertificateProvider(array{certificateProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCertificateProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCertificateProviderAsync(array{certificateProviderName?: string, ...} $args = [])
 * @method \Aws\Result deleteCommand(array $args = [])
 * @phpstan-method \Aws\Result deleteCommand(array{commandId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCommandAsync(array{commandId?: string, ...} $args = [])
 * @method \Aws\Result deleteCommandExecution(array $args = [])
 * @phpstan-method \Aws\Result deleteCommandExecution(array{executionId?: string, targetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCommandExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCommandExecutionAsync(array{executionId?: string, targetArn?: string, ...} $args = [])
 * @method \Aws\Result deleteCustomMetric(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomMetric(array{metricName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteCustomMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomMetricAsync(array{metricName?: string, ...} $args = [])
 * @method \Aws\Result deleteDimension(array $args = [])
 * @phpstan-method \Aws\Result deleteDimension(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDimensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDimensionAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result deleteDomainConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainConfiguration(array{domainConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDomainConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainConfigurationAsync(array{domainConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result deleteDynamicThingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteDynamicThingGroup(array{thingGroupName?: string, expectedVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDynamicThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDynamicThingGroupAsync(array{thingGroupName?: string, expectedVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteFleetMetric(array $args = [])
 * @phpstan-method \Aws\Result deleteFleetMetric(array{metricName?: string, expectedVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteFleetMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFleetMetricAsync(array{metricName?: string, expectedVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteJob(array $args = [])
 * @phpstan-method \Aws\Result deleteJob(array{jobId?: string, force?: bool, namespaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobAsync(array{jobId?: string, force?: bool, namespaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteJobExecution(array $args = [])
 * @phpstan-method \Aws\Result deleteJobExecution(array{jobId?: string, thingName?: string, executionNumber?: int, force?: bool, namespaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobExecutionAsync(array{jobId?: string, thingName?: string, executionNumber?: int, force?: bool, namespaceId?: string, ...} $args = [])
 * @method \Aws\Result deleteJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteJobTemplate(array{jobTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array{jobTemplateId?: string, ...} $args = [])
 * @method \Aws\Result deleteMitigationAction(array $args = [])
 * @phpstan-method \Aws\Result deleteMitigationAction(array{actionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMitigationActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMitigationActionAsync(array{actionName?: string, ...} $args = [])
 * @method \Aws\Result deleteOTAUpdate(array $args = [])
 * @phpstan-method \Aws\Result deleteOTAUpdate(array{otaUpdateId?: string, deleteStream?: bool, forceDeleteAWSJob?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteOTAUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteOTAUpdateAsync(array{otaUpdateId?: string, deleteStream?: bool, forceDeleteAWSJob?: bool, ...} $args = [])
 * @method \Aws\Result deletePackage(array $args = [])
 * @phpstan-method \Aws\Result deletePackage(array{packageName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageAsync(array{packageName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deletePackageVersion(array $args = [])
 * @phpstan-method \Aws\Result deletePackageVersion(array{packageName?: string, versionName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageVersionAsync(array{packageName?: string, versionName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deletePolicy(array $args = [])
 * @phpstan-method \Aws\Result deletePolicy(array{policyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyAsync(array{policyName?: string, ...} $args = [])
 * @method \Aws\Result deletePolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyVersion(array{policyName?: string, policyVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyVersionAsync(array{policyName?: string, policyVersionId?: string, ...} $args = [])
 * @method \Aws\Result deleteProvisioningTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisioningTemplate(array{templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisioningTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisioningTemplateAsync(array{templateName?: string, ...} $args = [])
 * @method \Aws\Result deleteProvisioningTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisioningTemplateVersion(array{templateName?: string, versionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisioningTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisioningTemplateVersionAsync(array{templateName?: string, versionId?: int, ...} $args = [])
 * @method \Aws\Result deleteRegistrationCode(array $args = [])
 * @phpstan-method \Aws\Result deleteRegistrationCode(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRegistrationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRegistrationCodeAsync(array{...} $args = [])
 * @method \Aws\Result deleteRoleAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteRoleAlias(array{roleAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRoleAliasAsync(array{roleAlias?: string, ...} $args = [])
 * @method \Aws\Result deleteScheduledAudit(array $args = [])
 * @phpstan-method \Aws\Result deleteScheduledAudit(array{scheduledAuditName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScheduledAuditAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScheduledAuditAsync(array{scheduledAuditName?: string, ...} $args = [])
 * @method \Aws\Result deleteSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteSecurityProfile(array{securityProfileName?: string, expectedVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSecurityProfileAsync(array{securityProfileName?: string, expectedVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteStream(array $args = [])
 * @phpstan-method \Aws\Result deleteStream(array{streamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamAsync(array{streamId?: string, ...} $args = [])
 * @method \Aws\Result deleteThing(array $args = [])
 * @phpstan-method \Aws\Result deleteThing(array{thingName?: string, expectedVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThingAsync(array{thingName?: string, expectedVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteThingGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteThingGroup(array{thingGroupName?: string, expectedVersion?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThingGroupAsync(array{thingGroupName?: string, expectedVersion?: int, ...} $args = [])
 * @method \Aws\Result deleteThingType(array $args = [])
 * @phpstan-method \Aws\Result deleteThingType(array{thingTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteThingTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteThingTypeAsync(array{thingTypeName?: string, ...} $args = [])
 * @method \Aws\Result deleteTopicRule(array $args = [])
 * @phpstan-method \Aws\Result deleteTopicRule(array{ruleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTopicRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTopicRuleAsync(array{ruleName?: string, ...} $args = [])
 * @method \Aws\Result deleteTopicRuleDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteTopicRuleDestination(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTopicRuleDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTopicRuleDestinationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result deleteV2LoggingLevel(array $args = [])
 * @phpstan-method \Aws\Result deleteV2LoggingLevel(array{targetType?: 'CLIENT_ID'|'DEFAULT'|'PRINCIPAL_ID'|'SOURCE_IP'|'THING_GROUP', targetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteV2LoggingLevelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteV2LoggingLevelAsync(array{targetType?: 'CLIENT_ID'|'DEFAULT'|'PRINCIPAL_ID'|'SOURCE_IP'|'THING_GROUP', targetName?: string, ...} $args = [])
 * @method \Aws\Result deprecateThingType(array $args = [])
 * @phpstan-method \Aws\Result deprecateThingType(array{thingTypeName?: string, undoDeprecate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateThingTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateThingTypeAsync(array{thingTypeName?: string, undoDeprecate?: bool, ...} $args = [])
 * @method \Aws\Result describeAccountAuditConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeAccountAuditConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccountAuditConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountAuditConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeAuditFinding(array $args = [])
 * @phpstan-method \Aws\Result describeAuditFinding(array{findingId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuditFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuditFindingAsync(array{findingId?: string, ...} $args = [])
 * @method \Aws\Result describeAuditMitigationActionsTask(array $args = [])
 * @phpstan-method \Aws\Result describeAuditMitigationActionsTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuditMitigationActionsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuditMitigationActionsTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result describeAuditSuppression(array $args = [])
 * @phpstan-method \Aws\Result describeAuditSuppression(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuditSuppressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuditSuppressionAsync(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeAuditTask(array $args = [])
 * @phpstan-method \Aws\Result describeAuditTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuditTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuditTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result describeAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result describeAuthorizer(array{authorizerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAuthorizerAsync(array{authorizerName?: string, ...} $args = [])
 * @method \Aws\Result describeBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result describeBillingGroup(array{billingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBillingGroupAsync(array{billingGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeCACertificate(array $args = [])
 * @phpstan-method \Aws\Result describeCACertificate(array{certificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCACertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCACertificateAsync(array{certificateId?: string, ...} $args = [])
 * @method \Aws\Result describeCertificate(array $args = [])
 * @phpstan-method \Aws\Result describeCertificate(array{certificateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateAsync(array{certificateId?: string, ...} $args = [])
 * @method \Aws\Result describeCertificateProvider(array $args = [])
 * @phpstan-method \Aws\Result describeCertificateProvider(array{certificateProviderName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCertificateProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCertificateProviderAsync(array{certificateProviderName?: string, ...} $args = [])
 * @method \Aws\Result describeCustomMetric(array $args = [])
 * @phpstan-method \Aws\Result describeCustomMetric(array{metricName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCustomMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomMetricAsync(array{metricName?: string, ...} $args = [])
 * @method \Aws\Result describeDefaultAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result describeDefaultAuthorizer(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDefaultAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDefaultAuthorizerAsync(array{...} $args = [])
 * @method \Aws\Result describeDetectMitigationActionsTask(array $args = [])
 * @phpstan-method \Aws\Result describeDetectMitigationActionsTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDetectMitigationActionsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDetectMitigationActionsTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result describeDimension(array $args = [])
 * @phpstan-method \Aws\Result describeDimension(array{name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDimensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDimensionAsync(array{name?: string, ...} $args = [])
 * @method \Aws\Result describeDomainConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeDomainConfiguration(array{domainConfigurationName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDomainConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainConfigurationAsync(array{domainConfigurationName?: string, ...} $args = [])
 * @method \Aws\Result describeEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeEncryptionConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEncryptionConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result describeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result describeEndpoint(array{endpointType?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEndpointAsync(array{endpointType?: string, ...} $args = [])
 * @method \Aws\Result describeEventConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeEventConfigurations(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeEventConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEventConfigurationsAsync(array{...} $args = [])
 * @method \Aws\Result describeFleetMetric(array $args = [])
 * @phpstan-method \Aws\Result describeFleetMetric(array{metricName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeFleetMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFleetMetricAsync(array{metricName?: string, ...} $args = [])
 * @method \Aws\Result describeIndex(array $args = [])
 * @phpstan-method \Aws\Result describeIndex(array{indexName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeIndexAsync(array{indexName?: string, ...} $args = [])
 * @method \Aws\Result describeJob(array $args = [])
 * @phpstan-method \Aws\Result describeJob(array{jobId?: string, beforeSubstitution?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobAsync(array{jobId?: string, beforeSubstitution?: bool, ...} $args = [])
 * @method \Aws\Result describeJobExecution(array $args = [])
 * @phpstan-method \Aws\Result describeJobExecution(array{jobId?: string, thingName?: string, executionNumber?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobExecutionAsync(array{jobId?: string, thingName?: string, executionNumber?: int, ...} $args = [])
 * @method \Aws\Result describeJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeJobTemplate(array{jobTemplateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeJobTemplateAsync(array{jobTemplateId?: string, ...} $args = [])
 * @method \Aws\Result describeManagedJobTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeManagedJobTemplate(array{templateName?: string, templateVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeManagedJobTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeManagedJobTemplateAsync(array{templateName?: string, templateVersion?: string, ...} $args = [])
 * @method \Aws\Result describeMitigationAction(array $args = [])
 * @phpstan-method \Aws\Result describeMitigationAction(array{actionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeMitigationActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMitigationActionAsync(array{actionName?: string, ...} $args = [])
 * @method \Aws\Result describeProvisioningTemplate(array $args = [])
 * @phpstan-method \Aws\Result describeProvisioningTemplate(array{templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisioningTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProvisioningTemplateAsync(array{templateName?: string, ...} $args = [])
 * @method \Aws\Result describeProvisioningTemplateVersion(array $args = [])
 * @phpstan-method \Aws\Result describeProvisioningTemplateVersion(array{templateName?: string, versionId?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisioningTemplateVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProvisioningTemplateVersionAsync(array{templateName?: string, versionId?: int, ...} $args = [])
 * @method \Aws\Result describeRoleAlias(array $args = [])
 * @phpstan-method \Aws\Result describeRoleAlias(array{roleAlias?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRoleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRoleAliasAsync(array{roleAlias?: string, ...} $args = [])
 * @method \Aws\Result describeScheduledAudit(array $args = [])
 * @phpstan-method \Aws\Result describeScheduledAudit(array{scheduledAuditName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScheduledAuditAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScheduledAuditAsync(array{scheduledAuditName?: string, ...} $args = [])
 * @method \Aws\Result describeSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result describeSecurityProfile(array{securityProfileName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSecurityProfileAsync(array{securityProfileName?: string, ...} $args = [])
 * @method \Aws\Result describeStream(array $args = [])
 * @phpstan-method \Aws\Result describeStream(array{streamId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamAsync(array{streamId?: string, ...} $args = [])
 * @method \Aws\Result describeThing(array $args = [])
 * @phpstan-method \Aws\Result describeThing(array{thingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThingAsync(array{thingName?: string, ...} $args = [])
 * @method \Aws\Result describeThingGroup(array $args = [])
 * @phpstan-method \Aws\Result describeThingGroup(array{thingGroupName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThingGroupAsync(array{thingGroupName?: string, ...} $args = [])
 * @method \Aws\Result describeThingRegistrationTask(array $args = [])
 * @phpstan-method \Aws\Result describeThingRegistrationTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThingRegistrationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThingRegistrationTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result describeThingType(array $args = [])
 * @phpstan-method \Aws\Result describeThingType(array{thingTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeThingTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeThingTypeAsync(array{thingTypeName?: string, ...} $args = [])
 * @method \Aws\Result detachPolicy(array $args = [])
 * @phpstan-method \Aws\Result detachPolicy(array{policyName?: string, target?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachPolicyAsync(array{policyName?: string, target?: string, ...} $args = [])
 * @method \Aws\Result detachPrincipalPolicy(array $args = [])
 * @phpstan-method \Aws\Result detachPrincipalPolicy(array{policyName?: string, principal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachPrincipalPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachPrincipalPolicyAsync(array{policyName?: string, principal?: string, ...} $args = [])
 * @method \Aws\Result detachSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result detachSecurityProfile(array{securityProfileName?: string, securityProfileTargetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachSecurityProfileAsync(array{securityProfileName?: string, securityProfileTargetArn?: string, ...} $args = [])
 * @method \Aws\Result detachThingPrincipal(array $args = [])
 * @phpstan-method \Aws\Result detachThingPrincipal(array{thingName?: string, principal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise detachThingPrincipalAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise detachThingPrincipalAsync(array{thingName?: string, principal?: string, ...} $args = [])
 * @method \Aws\Result disableTopicRule(array $args = [])
 * @phpstan-method \Aws\Result disableTopicRule(array{ruleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableTopicRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableTopicRuleAsync(array{ruleName?: string, ...} $args = [])
 * @method \Aws\Result disassociateSbomFromPackageVersion(array $args = [])
 * @phpstan-method \Aws\Result disassociateSbomFromPackageVersion(array{packageName?: string, versionName?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSbomFromPackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateSbomFromPackageVersionAsync(array{packageName?: string, versionName?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result enableTopicRule(array $args = [])
 * @phpstan-method \Aws\Result enableTopicRule(array{ruleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableTopicRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableTopicRuleAsync(array{ruleName?: string, ...} $args = [])
 * @method \Aws\Result getBehaviorModelTrainingSummaries(array $args = [])
 * @phpstan-method \Aws\Result getBehaviorModelTrainingSummaries(array{securityProfileName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBehaviorModelTrainingSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBehaviorModelTrainingSummariesAsync(array{securityProfileName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result getBucketsAggregation(array $args = [])
 * @phpstan-method \Aws\Result getBucketsAggregation(array{
 *     indexName?: string,
 *     queryString?: string,
 *     aggregationField?: string,
 *     queryVersion?: string,
 *     bucketsAggregationType?: array{termsAggregation?: array{maxBuckets?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getBucketsAggregationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBucketsAggregationAsync(array{
 *     indexName?: string,
 *     queryString?: string,
 *     aggregationField?: string,
 *     queryVersion?: string,
 *     bucketsAggregationType?: array{termsAggregation?: array{maxBuckets?: int, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getCardinality(array $args = [])
 * @phpstan-method \Aws\Result getCardinality(array{indexName?: string, queryString?: string, aggregationField?: string, queryVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCardinalityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCardinalityAsync(array{indexName?: string, queryString?: string, aggregationField?: string, queryVersion?: string, ...} $args = [])
 * @method \Aws\Result getDeviceCommand(array $args = [])
 * @phpstan-method \Aws\Result getDeviceCommand(array{commandId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceCommandAsync(array{commandId?: string, ...} $args = [])
 * @method \Aws\Result getCommandExecution(array $args = [])
 * @phpstan-method \Aws\Result getCommandExecution(array{executionId?: string, targetArn?: string, includeResult?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getCommandExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCommandExecutionAsync(array{executionId?: string, targetArn?: string, includeResult?: bool, ...} $args = [])
 * @method \Aws\Result getEffectivePolicies(array $args = [])
 * @phpstan-method \Aws\Result getEffectivePolicies(array{principal?: string, cognitoIdentityPoolId?: string, thingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEffectivePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEffectivePoliciesAsync(array{principal?: string, cognitoIdentityPoolId?: string, thingName?: string, ...} $args = [])
 * @method \Aws\Result getIndexingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getIndexingConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getIndexingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIndexingConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getJobDocument(array $args = [])
 * @phpstan-method \Aws\Result getJobDocument(array{jobId?: string, beforeSubstitution?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobDocumentAsync(array{jobId?: string, beforeSubstitution?: bool, ...} $args = [])
 * @method \Aws\Result getLoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result getLoggingOptions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLoggingOptionsAsync(array{...} $args = [])
 * @method \Aws\Result getOTAUpdate(array $args = [])
 * @phpstan-method \Aws\Result getOTAUpdate(array{otaUpdateId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOTAUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOTAUpdateAsync(array{otaUpdateId?: string, ...} $args = [])
 * @method \Aws\Result getPackage(array $args = [])
 * @phpstan-method \Aws\Result getPackage(array{packageName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPackageAsync(array{packageName?: string, ...} $args = [])
 * @method \Aws\Result getPackageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getPackageConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPackageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPackageConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result getPackageVersion(array $args = [])
 * @phpstan-method \Aws\Result getPackageVersion(array{packageName?: string, versionName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPackageVersionAsync(array{packageName?: string, versionName?: string, ...} $args = [])
 * @method \Aws\Result getPercentiles(array $args = [])
 * @phpstan-method \Aws\Result getPercentiles(array{
 *     indexName?: string,
 *     queryString?: string,
 *     aggregationField?: string,
 *     queryVersion?: string,
 *     percents?: list<float>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getPercentilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPercentilesAsync(array{
 *     indexName?: string,
 *     queryString?: string,
 *     aggregationField?: string,
 *     queryVersion?: string,
 *     percents?: list<float>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{policyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{policyName?: string, ...} $args = [])
 * @method \Aws\Result getPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result getPolicyVersion(array{policyName?: string, policyVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyVersionAsync(array{policyName?: string, policyVersionId?: string, ...} $args = [])
 * @method \Aws\Result getRegistrationCode(array $args = [])
 * @phpstan-method \Aws\Result getRegistrationCode(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getRegistrationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistrationCodeAsync(array{...} $args = [])
 * @method \Aws\Result getStatistics(array $args = [])
 * @phpstan-method \Aws\Result getStatistics(array{indexName?: string, queryString?: string, aggregationField?: string, queryVersion?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStatisticsAsync(array{indexName?: string, queryString?: string, aggregationField?: string, queryVersion?: string, ...} $args = [])
 * @method \Aws\Result getThingConnectivityData(array $args = [])
 * @phpstan-method \Aws\Result getThingConnectivityData(array{thingName?: string, includeSocketInformation?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getThingConnectivityDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getThingConnectivityDataAsync(array{thingName?: string, includeSocketInformation?: bool, ...} $args = [])
 * @method \Aws\Result getTopicRule(array $args = [])
 * @phpstan-method \Aws\Result getTopicRule(array{ruleName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTopicRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTopicRuleAsync(array{ruleName?: string, ...} $args = [])
 * @method \Aws\Result getTopicRuleDestination(array $args = [])
 * @phpstan-method \Aws\Result getTopicRuleDestination(array{arn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTopicRuleDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTopicRuleDestinationAsync(array{arn?: string, ...} $args = [])
 * @method \Aws\Result getV2LoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result getV2LoggingOptions(array{verbose?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getV2LoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getV2LoggingOptionsAsync(array{verbose?: bool, ...} $args = [])
 * @method \Aws\Result listActiveViolations(array $args = [])
 * @phpstan-method \Aws\Result listActiveViolations(array{
 *     thingName?: string,
 *     securityProfileName?: string,
 *     behaviorCriteriaType?: 'MACHINE_LEARNING'|'STATIC'|'STATISTICAL',
 *     listSuppressedAlerts?: bool,
 *     verificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listActiveViolationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActiveViolationsAsync(array{
 *     thingName?: string,
 *     securityProfileName?: string,
 *     behaviorCriteriaType?: 'MACHINE_LEARNING'|'STATIC'|'STATISTICAL',
 *     listSuppressedAlerts?: bool,
 *     verificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAttachedPolicies(array $args = [])
 * @phpstan-method \Aws\Result listAttachedPolicies(array{target?: string, recursive?: bool, marker?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttachedPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttachedPoliciesAsync(array{target?: string, recursive?: bool, marker?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result listAuditFindings(array $args = [])
 * @phpstan-method \Aws\Result listAuditFindings(array{
 *     taskId?: string,
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     listSuppressedFindings?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuditFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuditFindingsAsync(array{
 *     taskId?: string,
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     listSuppressedFindings?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAuditMitigationActionsExecutions(array $args = [])
 * @phpstan-method \Aws\Result listAuditMitigationActionsExecutions(array{
 *     taskId?: string,
 *     actionStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PENDING'|'SKIPPED',
 *     findingId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuditMitigationActionsExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuditMitigationActionsExecutionsAsync(array{
 *     taskId?: string,
 *     actionStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS'|'PENDING'|'SKIPPED',
 *     findingId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAuditMitigationActionsTasks(array $args = [])
 * @phpstan-method \Aws\Result listAuditMitigationActionsTasks(array{
 *     auditTaskId?: string,
 *     findingId?: string,
 *     taskStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuditMitigationActionsTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuditMitigationActionsTasksAsync(array{
 *     auditTaskId?: string,
 *     findingId?: string,
 *     taskStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAuditSuppressions(array $args = [])
 * @phpstan-method \Aws\Result listAuditSuppressions(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     ascendingOrder?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuditSuppressionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuditSuppressionsAsync(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     ascendingOrder?: bool,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAuditTasks(array $args = [])
 * @phpstan-method \Aws\Result listAuditTasks(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     taskType?: 'ON_DEMAND_AUDIT_TASK'|'SCHEDULED_AUDIT_TASK',
 *     taskStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuditTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuditTasksAsync(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     taskType?: 'ON_DEMAND_AUDIT_TASK'|'SCHEDULED_AUDIT_TASK',
 *     taskStatus?: 'CANCELED'|'COMPLETED'|'FAILED'|'IN_PROGRESS',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAuthorizers(array $args = [])
 * @phpstan-method \Aws\Result listAuthorizers(array{pageSize?: int, marker?: string, ascendingOrder?: bool, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAuthorizersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAuthorizersAsync(array{pageSize?: int, marker?: string, ascendingOrder?: bool, status?: 'ACTIVE'|'INACTIVE', ...} $args = [])
 * @method \Aws\Result listBillingGroups(array $args = [])
 * @phpstan-method \Aws\Result listBillingGroups(array{nextToken?: string, maxResults?: int, namePrefixFilter?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBillingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBillingGroupsAsync(array{nextToken?: string, maxResults?: int, namePrefixFilter?: string, ...} $args = [])
 * @method \Aws\Result listCACertificates(array $args = [])
 * @phpstan-method \Aws\Result listCACertificates(array{pageSize?: int, marker?: string, ascendingOrder?: bool, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCACertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCACertificatesAsync(array{pageSize?: int, marker?: string, ascendingOrder?: bool, templateName?: string, ...} $args = [])
 * @method \Aws\Result listCertificateProviders(array $args = [])
 * @phpstan-method \Aws\Result listCertificateProviders(array{nextToken?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificateProvidersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificateProvidersAsync(array{nextToken?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listCertificates(array $args = [])
 * @phpstan-method \Aws\Result listCertificates(array{pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificatesAsync(array{pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listCertificatesByCA(array $args = [])
 * @phpstan-method \Aws\Result listCertificatesByCA(array{caCertificateId?: string, pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCertificatesByCAAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCertificatesByCAAsync(array{caCertificateId?: string, pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listCommandExecutions(array $args = [])
 * @phpstan-method \Aws\Result listCommandExecutions(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     namespace?: 'AWS-IoT'|'AWS-IoT-FleetWise',
 *     status?: 'CREATED'|'FAILED'|'IN_PROGRESS'|'REJECTED'|'SUCCEEDED'|'TIMED_OUT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     startedTimeFilter?: array{after?: string, before?: string, ...},
 *     completedTimeFilter?: array{after?: string, before?: string, ...},
 *     targetArn?: string,
 *     commandArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommandExecutionsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     namespace?: 'AWS-IoT'|'AWS-IoT-FleetWise',
 *     status?: 'CREATED'|'FAILED'|'IN_PROGRESS'|'REJECTED'|'SUCCEEDED'|'TIMED_OUT',
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     startedTimeFilter?: array{after?: string, before?: string, ...},
 *     completedTimeFilter?: array{after?: string, before?: string, ...},
 *     targetArn?: string,
 *     commandArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCommands(array $args = [])
 * @phpstan-method \Aws\Result listCommands(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     namespace?: 'AWS-IoT'|'AWS-IoT-FleetWise',
 *     commandParameterName?: string,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommandsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     namespace?: 'AWS-IoT'|'AWS-IoT-FleetWise',
 *     commandParameterName?: string,
 *     sortOrder?: 'ASCENDING'|'DESCENDING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listCustomMetrics(array $args = [])
 * @phpstan-method \Aws\Result listCustomMetrics(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listCustomMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomMetricsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDetectMitigationActionsExecutions(array $args = [])
 * @phpstan-method \Aws\Result listDetectMitigationActionsExecutions(array{
 *     taskId?: string,
 *     violationId?: string,
 *     thingName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDetectMitigationActionsExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDetectMitigationActionsExecutionsAsync(array{
 *     taskId?: string,
 *     violationId?: string,
 *     thingName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDetectMitigationActionsTasks(array $args = [])
 * @phpstan-method \Aws\Result listDetectMitigationActionsTasks(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listDetectMitigationActionsTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDetectMitigationActionsTasksAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listDimensions(array $args = [])
 * @phpstan-method \Aws\Result listDimensions(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDimensionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDimensionsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listDomainConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listDomainConfigurations(array{marker?: string, pageSize?: int, serviceType?: 'CREDENTIAL_PROVIDER'|'DATA'|'JOBS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listDomainConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainConfigurationsAsync(array{marker?: string, pageSize?: int, serviceType?: 'CREDENTIAL_PROVIDER'|'DATA'|'JOBS', ...} $args = [])
 * @method \Aws\Result listFleetMetrics(array $args = [])
 * @phpstan-method \Aws\Result listFleetMetrics(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listFleetMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFleetMetricsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listIndices(array $args = [])
 * @phpstan-method \Aws\Result listIndices(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listIndicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIndicesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobExecutionsForJob(array $args = [])
 * @phpstan-method \Aws\Result listJobExecutionsForJob(array{
 *     jobId?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'REMOVED'|'SUCCEEDED'|'TIMED_OUT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobExecutionsForJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobExecutionsForJobAsync(array{
 *     jobId?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'REMOVED'|'SUCCEEDED'|'TIMED_OUT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobExecutionsForThing(array $args = [])
 * @phpstan-method \Aws\Result listJobExecutionsForThing(array{
 *     thingName?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'REMOVED'|'SUCCEEDED'|'TIMED_OUT',
 *     namespaceId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     jobId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobExecutionsForThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobExecutionsForThingAsync(array{
 *     thingName?: string,
 *     status?: 'CANCELED'|'FAILED'|'IN_PROGRESS'|'QUEUED'|'REJECTED'|'REMOVED'|'SUCCEEDED'|'TIMED_OUT',
 *     namespaceId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     jobId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listJobTemplates(array $args = [])
 * @phpstan-method \Aws\Result listJobTemplates(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobTemplatesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     status?: 'CANCELED'|'COMPLETED'|'DELETION_IN_PROGRESS'|'IN_PROGRESS'|'SCHEDULED',
 *     targetSelection?: 'CONTINUOUS'|'SNAPSHOT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     thingGroupName?: string,
 *     thingGroupId?: string,
 *     namespaceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     status?: 'CANCELED'|'COMPLETED'|'DELETION_IN_PROGRESS'|'IN_PROGRESS'|'SCHEDULED',
 *     targetSelection?: 'CONTINUOUS'|'SNAPSHOT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     thingGroupName?: string,
 *     thingGroupId?: string,
 *     namespaceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listManagedJobTemplates(array $args = [])
 * @phpstan-method \Aws\Result listManagedJobTemplates(array{templateName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedJobTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedJobTemplatesAsync(array{templateName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listMetricValues(array $args = [])
 * @phpstan-method \Aws\Result listMetricValues(array{
 *     thingName?: string,
 *     metricName?: string,
 *     dimensionName?: string,
 *     dimensionValueOperator?: 'IN'|'NOT_IN',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMetricValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMetricValuesAsync(array{
 *     thingName?: string,
 *     metricName?: string,
 *     dimensionName?: string,
 *     dimensionValueOperator?: 'IN'|'NOT_IN',
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listMitigationActions(array $args = [])
 * @phpstan-method \Aws\Result listMitigationActions(array{
 *     actionType?: 'ADD_THINGS_TO_THING_GROUP'|'ENABLE_IOT_LOGGING'|'PUBLISH_FINDING_TO_SNS'|'REPLACE_DEFAULT_POLICY_VERSION'|'UPDATE_CA_CERTIFICATE'|'UPDATE_DEVICE_CERTIFICATE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listMitigationActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMitigationActionsAsync(array{
 *     actionType?: 'ADD_THINGS_TO_THING_GROUP'|'ENABLE_IOT_LOGGING'|'PUBLISH_FINDING_TO_SNS'|'REPLACE_DEFAULT_POLICY_VERSION'|'UPDATE_CA_CERTIFICATE'|'UPDATE_DEVICE_CERTIFICATE',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOTAUpdates(array $args = [])
 * @phpstan-method \Aws\Result listOTAUpdates(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     otaUpdateStatus?: 'CREATE_COMPLETE'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'CREATE_PENDING'|'DELETE_FAILED'|'DELETE_IN_PROGRESS',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOTAUpdatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOTAUpdatesAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     otaUpdateStatus?: 'CREATE_COMPLETE'|'CREATE_FAILED'|'CREATE_IN_PROGRESS'|'CREATE_PENDING'|'DELETE_FAILED'|'DELETE_IN_PROGRESS',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOutgoingCertificates(array $args = [])
 * @phpstan-method \Aws\Result listOutgoingCertificates(array{pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listOutgoingCertificatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOutgoingCertificatesAsync(array{pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listPackageVersions(array $args = [])
 * @phpstan-method \Aws\Result listPackageVersions(array{
 *     packageName?: string,
 *     status?: 'DEPRECATED'|'DRAFT'|'PUBLISHED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPackageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackageVersionsAsync(array{
 *     packageName?: string,
 *     status?: 'DEPRECATED'|'DRAFT'|'PUBLISHED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPackages(array $args = [])
 * @phpstan-method \Aws\Result listPackages(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackagesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{marker?: string, pageSize?: int, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{marker?: string, pageSize?: int, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listPolicyPrincipals(array $args = [])
 * @phpstan-method \Aws\Result listPolicyPrincipals(array{policyName?: string, marker?: string, pageSize?: int, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyPrincipalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyPrincipalsAsync(array{policyName?: string, marker?: string, pageSize?: int, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listPolicyVersions(array $args = [])
 * @phpstan-method \Aws\Result listPolicyVersions(array{policyName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array{policyName?: string, ...} $args = [])
 * @method \Aws\Result listPrincipalPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPrincipalPolicies(array{principal?: string, marker?: string, pageSize?: int, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrincipalPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrincipalPoliciesAsync(array{principal?: string, marker?: string, pageSize?: int, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listPrincipalThings(array $args = [])
 * @phpstan-method \Aws\Result listPrincipalThings(array{nextToken?: string, maxResults?: int, principal?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrincipalThingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrincipalThingsAsync(array{nextToken?: string, maxResults?: int, principal?: string, ...} $args = [])
 * @method \Aws\Result listPrincipalThingsV2(array $args = [])
 * @phpstan-method \Aws\Result listPrincipalThingsV2(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     principal?: string,
 *     thingPrincipalType?: 'EXCLUSIVE_THING'|'NON_EXCLUSIVE_THING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrincipalThingsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrincipalThingsV2Async(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     principal?: string,
 *     thingPrincipalType?: 'EXCLUSIVE_THING'|'NON_EXCLUSIVE_THING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProvisioningTemplateVersions(array $args = [])
 * @phpstan-method \Aws\Result listProvisioningTemplateVersions(array{templateName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisioningTemplateVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisioningTemplateVersionsAsync(array{templateName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listProvisioningTemplates(array $args = [])
 * @phpstan-method \Aws\Result listProvisioningTemplates(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisioningTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisioningTemplatesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRelatedResourcesForAuditFinding(array $args = [])
 * @phpstan-method \Aws\Result listRelatedResourcesForAuditFinding(array{findingId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRelatedResourcesForAuditFindingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRelatedResourcesForAuditFindingAsync(array{findingId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listRoleAliases(array $args = [])
 * @phpstan-method \Aws\Result listRoleAliases(array{pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoleAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRoleAliasesAsync(array{pageSize?: int, marker?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listSbomValidationResults(array $args = [])
 * @phpstan-method \Aws\Result listSbomValidationResults(array{
 *     packageName?: string,
 *     versionName?: string,
 *     validationResult?: 'FAILED'|'SUCCEEDED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSbomValidationResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSbomValidationResultsAsync(array{
 *     packageName?: string,
 *     versionName?: string,
 *     validationResult?: 'FAILED'|'SUCCEEDED',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listScheduledAudits(array $args = [])
 * @phpstan-method \Aws\Result listScheduledAudits(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScheduledAuditsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScheduledAuditsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listSecurityProfiles(array $args = [])
 * @phpstan-method \Aws\Result listSecurityProfiles(array{nextToken?: string, maxResults?: int, dimensionName?: string, metricName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityProfilesAsync(array{nextToken?: string, maxResults?: int, dimensionName?: string, metricName?: string, ...} $args = [])
 * @method \Aws\Result listSecurityProfilesForTarget(array $args = [])
 * @phpstan-method \Aws\Result listSecurityProfilesForTarget(array{nextToken?: string, maxResults?: int, recursive?: bool, securityProfileTargetArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSecurityProfilesForTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSecurityProfilesForTargetAsync(array{nextToken?: string, maxResults?: int, recursive?: bool, securityProfileTargetArn?: string, ...} $args = [])
 * @method \Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{maxResults?: int, nextToken?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{maxResults?: int, nextToken?: string, ascendingOrder?: bool, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTargetsForPolicy(array $args = [])
 * @phpstan-method \Aws\Result listTargetsForPolicy(array{policyName?: string, marker?: string, pageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetsForPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetsForPolicyAsync(array{policyName?: string, marker?: string, pageSize?: int, ...} $args = [])
 * @method \Aws\Result listTargetsForSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result listTargetsForSecurityProfile(array{securityProfileName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTargetsForSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTargetsForSecurityProfileAsync(array{securityProfileName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listThingGroups(array $args = [])
 * @phpstan-method \Aws\Result listThingGroups(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     parentGroup?: string,
 *     namePrefixFilter?: string,
 *     recursive?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingGroupsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     parentGroup?: string,
 *     namePrefixFilter?: string,
 *     recursive?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listThingGroupsForThing(array $args = [])
 * @phpstan-method \Aws\Result listThingGroupsForThing(array{thingName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingGroupsForThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingGroupsForThingAsync(array{thingName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listThingPrincipals(array $args = [])
 * @phpstan-method \Aws\Result listThingPrincipals(array{nextToken?: string, maxResults?: int, thingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingPrincipalsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingPrincipalsAsync(array{nextToken?: string, maxResults?: int, thingName?: string, ...} $args = [])
 * @method \Aws\Result listThingPrincipalsV2(array $args = [])
 * @phpstan-method \Aws\Result listThingPrincipalsV2(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     thingName?: string,
 *     thingPrincipalType?: 'EXCLUSIVE_THING'|'NON_EXCLUSIVE_THING',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingPrincipalsV2Async(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingPrincipalsV2Async(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     thingName?: string,
 *     thingPrincipalType?: 'EXCLUSIVE_THING'|'NON_EXCLUSIVE_THING',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listThingRegistrationTaskReports(array $args = [])
 * @phpstan-method \Aws\Result listThingRegistrationTaskReports(array{taskId?: string, reportType?: 'ERRORS'|'RESULTS', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingRegistrationTaskReportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingRegistrationTaskReportsAsync(array{taskId?: string, reportType?: 'ERRORS'|'RESULTS', nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listThingRegistrationTasks(array $args = [])
 * @phpstan-method \Aws\Result listThingRegistrationTasks(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'Cancelled'|'Cancelling'|'Completed'|'Failed'|'InProgress',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingRegistrationTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingRegistrationTasksAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     status?: 'Cancelled'|'Cancelling'|'Completed'|'Failed'|'InProgress',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listThingTypes(array $args = [])
 * @phpstan-method \Aws\Result listThingTypes(array{nextToken?: string, maxResults?: int, thingTypeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingTypesAsync(array{nextToken?: string, maxResults?: int, thingTypeName?: string, ...} $args = [])
 * @method \Aws\Result listThings(array $args = [])
 * @phpstan-method \Aws\Result listThings(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     attributeName?: string,
 *     attributeValue?: string,
 *     thingTypeName?: string,
 *     usePrefixAttributeValue?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     attributeName?: string,
 *     attributeValue?: string,
 *     thingTypeName?: string,
 *     usePrefixAttributeValue?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listThingsInBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result listThingsInBillingGroup(array{billingGroupName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingsInBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingsInBillingGroupAsync(array{billingGroupName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listThingsInThingGroup(array $args = [])
 * @phpstan-method \Aws\Result listThingsInThingGroup(array{thingGroupName?: string, recursive?: bool, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listThingsInThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listThingsInThingGroupAsync(array{thingGroupName?: string, recursive?: bool, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTopicRuleDestinations(array $args = [])
 * @phpstan-method \Aws\Result listTopicRuleDestinations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicRuleDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicRuleDestinationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTopicRules(array $args = [])
 * @phpstan-method \Aws\Result listTopicRules(array{topic?: string, maxResults?: int, nextToken?: string, ruleDisabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTopicRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTopicRulesAsync(array{topic?: string, maxResults?: int, nextToken?: string, ruleDisabled?: bool, ...} $args = [])
 * @method \Aws\Result listV2LoggingLevels(array $args = [])
 * @phpstan-method \Aws\Result listV2LoggingLevels(array{
 *     targetType?: 'CLIENT_ID'|'DEFAULT'|'PRINCIPAL_ID'|'SOURCE_IP'|'THING_GROUP',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listV2LoggingLevelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listV2LoggingLevelsAsync(array{
 *     targetType?: 'CLIENT_ID'|'DEFAULT'|'PRINCIPAL_ID'|'SOURCE_IP'|'THING_GROUP',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listViolationEvents(array $args = [])
 * @phpstan-method \Aws\Result listViolationEvents(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     thingName?: string,
 *     securityProfileName?: string,
 *     behaviorCriteriaType?: 'MACHINE_LEARNING'|'STATIC'|'STATISTICAL',
 *     listSuppressedAlerts?: bool,
 *     verificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listViolationEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listViolationEventsAsync(array{
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     thingName?: string,
 *     securityProfileName?: string,
 *     behaviorCriteriaType?: 'MACHINE_LEARNING'|'STATIC'|'STATISTICAL',
 *     listSuppressedAlerts?: bool,
 *     verificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVerificationStateOnViolation(array $args = [])
 * @phpstan-method \Aws\Result putVerificationStateOnViolation(array{
 *     violationId?: string,
 *     verificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     verificationStateDescription?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVerificationStateOnViolationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVerificationStateOnViolationAsync(array{
 *     violationId?: string,
 *     verificationState?: 'BENIGN_POSITIVE'|'FALSE_POSITIVE'|'TRUE_POSITIVE'|'UNKNOWN',
 *     verificationStateDescription?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerCACertificate(array $args = [])
 * @phpstan-method \Aws\Result registerCACertificate(array{
 *     caCertificate?: string,
 *     verificationCertificate?: string,
 *     setAsActive?: bool,
 *     allowAutoRegistration?: bool,
 *     registrationConfig?: array{templateBody?: string, roleArn?: string, templateName?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     certificateMode?: 'DEFAULT'|'SNI_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCACertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCACertificateAsync(array{
 *     caCertificate?: string,
 *     verificationCertificate?: string,
 *     setAsActive?: bool,
 *     allowAutoRegistration?: bool,
 *     registrationConfig?: array{templateBody?: string, roleArn?: string, templateName?: string, ...},
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     certificateMode?: 'DEFAULT'|'SNI_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerCertificate(array $args = [])
 * @phpstan-method \Aws\Result registerCertificate(array{
 *     certificatePem?: string,
 *     caCertificatePem?: string,
 *     setAsActive?: bool,
 *     status?: 'ACTIVE'|'INACTIVE'|'PENDING_ACTIVATION'|'PENDING_TRANSFER'|'REGISTER_INACTIVE'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCertificateAsync(array{
 *     certificatePem?: string,
 *     caCertificatePem?: string,
 *     setAsActive?: bool,
 *     status?: 'ACTIVE'|'INACTIVE'|'PENDING_ACTIVATION'|'PENDING_TRANSFER'|'REGISTER_INACTIVE'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerCertificateWithoutCA(array $args = [])
 * @phpstan-method \Aws\Result registerCertificateWithoutCA(array{
 *     certificatePem?: string,
 *     status?: 'ACTIVE'|'INACTIVE'|'PENDING_ACTIVATION'|'PENDING_TRANSFER'|'REGISTER_INACTIVE'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise registerCertificateWithoutCAAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerCertificateWithoutCAAsync(array{
 *     certificatePem?: string,
 *     status?: 'ACTIVE'|'INACTIVE'|'PENDING_ACTIVATION'|'PENDING_TRANSFER'|'REGISTER_INACTIVE'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result registerThing(array $args = [])
 * @phpstan-method \Aws\Result registerThing(array{templateBody?: string, parameters?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise registerThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerThingAsync(array{templateBody?: string, parameters?: array<string, string>, ...} $args = [])
 * @method \Aws\Result rejectCertificateTransfer(array $args = [])
 * @phpstan-method \Aws\Result rejectCertificateTransfer(array{certificateId?: string, rejectReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectCertificateTransferAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectCertificateTransferAsync(array{certificateId?: string, rejectReason?: string, ...} $args = [])
 * @method \Aws\Result removeThingFromBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result removeThingFromBillingGroup(array{billingGroupName?: string, billingGroupArn?: string, thingName?: string, thingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeThingFromBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeThingFromBillingGroupAsync(array{billingGroupName?: string, billingGroupArn?: string, thingName?: string, thingArn?: string, ...} $args = [])
 * @method \Aws\Result removeThingFromThingGroup(array $args = [])
 * @phpstan-method \Aws\Result removeThingFromThingGroup(array{thingGroupName?: string, thingGroupArn?: string, thingName?: string, thingArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise removeThingFromThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise removeThingFromThingGroupAsync(array{thingGroupName?: string, thingGroupArn?: string, thingName?: string, thingArn?: string, ...} $args = [])
 * @method \Aws\Result replaceTopicRule(array $args = [])
 * @phpstan-method \Aws\Result replaceTopicRule(array{
 *     ruleName?: string,
 *     topicRulePayload?: array{
 *         sql?: string,
 *         description?: string,
 *         actions?: list<array>,
 *         ruleDisabled?: bool,
 *         awsIotSqlVersion?: string,
 *         errorAction?: array{
 *             dynamoDB?: array,
 *             dynamoDBv2?: array,
 *             lambda?: array,
 *             sns?: array,
 *             sqs?: array,
 *             kinesis?: array,
 *             republish?: array,
 *             s3?: array,
 *             firehose?: array,
 *             cloudwatchMetric?: array,
 *             cloudwatchAlarm?: array,
 *             cloudwatchLogs?: array,
 *             elasticsearch?: array,
 *             salesforce?: array,
 *             iotAnalytics?: array,
 *             iotEvents?: array,
 *             iotSiteWise?: array,
 *             stepFunctions?: array,
 *             timestream?: array,
 *             http?: array,
 *             kafka?: array,
 *             openSearch?: array,
 *             location?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise replaceTopicRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise replaceTopicRuleAsync(array{
 *     ruleName?: string,
 *     topicRulePayload?: array{
 *         sql?: string,
 *         description?: string,
 *         actions?: list<array>,
 *         ruleDisabled?: bool,
 *         awsIotSqlVersion?: string,
 *         errorAction?: array{
 *             dynamoDB?: array,
 *             dynamoDBv2?: array,
 *             lambda?: array,
 *             sns?: array,
 *             sqs?: array,
 *             kinesis?: array,
 *             republish?: array,
 *             s3?: array,
 *             firehose?: array,
 *             cloudwatchMetric?: array,
 *             cloudwatchAlarm?: array,
 *             cloudwatchLogs?: array,
 *             elasticsearch?: array,
 *             salesforce?: array,
 *             iotAnalytics?: array,
 *             iotEvents?: array,
 *             iotSiteWise?: array,
 *             stepFunctions?: array,
 *             timestream?: array,
 *             http?: array,
 *             kafka?: array,
 *             openSearch?: array,
 *             location?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchIndex(array $args = [])
 * @phpstan-method \Aws\Result searchIndex(array{
 *     indexName?: string,
 *     queryString?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     queryVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchIndexAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchIndexAsync(array{
 *     indexName?: string,
 *     queryString?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     queryVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result setDefaultAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result setDefaultAuthorizer(array{authorizerName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultAuthorizerAsync(array{authorizerName?: string, ...} $args = [])
 * @method \Aws\Result setDefaultPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result setDefaultPolicyVersion(array{policyName?: string, policyVersionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise setDefaultPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setDefaultPolicyVersionAsync(array{policyName?: string, policyVersionId?: string, ...} $args = [])
 * @method \Aws\Result setLoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result setLoggingOptions(array{
 *     loggingOptionsPayload?: array{roleArn?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setLoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setLoggingOptionsAsync(array{
 *     loggingOptionsPayload?: array{roleArn?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result setV2LoggingLevel(array $args = [])
 * @phpstan-method \Aws\Result setV2LoggingLevel(array{
 *     logTarget?: array{targetType?: 'CLIENT_ID'|'DEFAULT'|'PRINCIPAL_ID'|'SOURCE_IP'|'THING_GROUP', targetName?: string, ...},
 *     logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setV2LoggingLevelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setV2LoggingLevelAsync(array{
 *     logTarget?: array{targetType?: 'CLIENT_ID'|'DEFAULT'|'PRINCIPAL_ID'|'SOURCE_IP'|'THING_GROUP', targetName?: string, ...},
 *     logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result setV2LoggingOptions(array $args = [])
 * @phpstan-method \Aws\Result setV2LoggingOptions(array{
 *     roleArn?: string,
 *     defaultLogLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN',
 *     disableAllLogs?: bool,
 *     eventConfigurations?: list<array{eventType?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', logDestination?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise setV2LoggingOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setV2LoggingOptionsAsync(array{
 *     roleArn?: string,
 *     defaultLogLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN',
 *     disableAllLogs?: bool,
 *     eventConfigurations?: list<array{eventType?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', logDestination?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startAuditMitigationActionsTask(array $args = [])
 * @phpstan-method \Aws\Result startAuditMitigationActionsTask(array{
 *     taskId?: string,
 *     target?: array{
 *         auditTaskId?: string,
 *         findingIds?: list<string>,
 *         auditCheckToReasonCodeFilter?: array<string, list<string>>,
 *         ...,
 *     },
 *     auditCheckToActionsMapping?: array<string, list<string>>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startAuditMitigationActionsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startAuditMitigationActionsTaskAsync(array{
 *     taskId?: string,
 *     target?: array{
 *         auditTaskId?: string,
 *         findingIds?: list<string>,
 *         auditCheckToReasonCodeFilter?: array<string, list<string>>,
 *         ...,
 *     },
 *     auditCheckToActionsMapping?: array<string, list<string>>,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startDetectMitigationActionsTask(array $args = [])
 * @phpstan-method \Aws\Result startDetectMitigationActionsTask(array{
 *     taskId?: string,
 *     target?: array{violationIds?: list<string>, securityProfileName?: string, behaviorName?: string, ...},
 *     actions?: list<string>,
 *     violationEventOccurrenceRange?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *     includeOnlyActiveViolations?: bool,
 *     includeSuppressedAlerts?: bool,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startDetectMitigationActionsTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDetectMitigationActionsTaskAsync(array{
 *     taskId?: string,
 *     target?: array{violationIds?: list<string>, securityProfileName?: string, behaviorName?: string, ...},
 *     actions?: list<string>,
 *     violationEventOccurrenceRange?: array{startTime?: int|string|\DateTimeInterface, endTime?: int|string|\DateTimeInterface, ...},
 *     includeOnlyActiveViolations?: bool,
 *     includeSuppressedAlerts?: bool,
 *     clientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startOnDemandAuditTask(array $args = [])
 * @phpstan-method \Aws\Result startOnDemandAuditTask(array{targetCheckNames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startOnDemandAuditTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOnDemandAuditTaskAsync(array{targetCheckNames?: list<string>, ...} $args = [])
 * @method \Aws\Result startThingRegistrationTask(array $args = [])
 * @phpstan-method \Aws\Result startThingRegistrationTask(array{templateBody?: string, inputFileBucket?: string, inputFileKey?: string, roleArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startThingRegistrationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startThingRegistrationTaskAsync(array{templateBody?: string, inputFileBucket?: string, inputFileKey?: string, roleArn?: string, ...} $args = [])
 * @method \Aws\Result stopThingRegistrationTask(array $args = [])
 * @phpstan-method \Aws\Result stopThingRegistrationTask(array{taskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopThingRegistrationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopThingRegistrationTaskAsync(array{taskId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result testAuthorization(array $args = [])
 * @phpstan-method \Aws\Result testAuthorization(array{
 *     principal?: string,
 *     cognitoIdentityPoolId?: string,
 *     authInfos?: list<array{actionType?: 'CONNECT'|'PUBLISH'|'RECEIVE'|'SUBSCRIBE', resources?: list<string>, ...}>,
 *     clientId?: string,
 *     policyNamesToAdd?: list<string>,
 *     policyNamesToSkip?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testAuthorizationAsync(array{
 *     principal?: string,
 *     cognitoIdentityPoolId?: string,
 *     authInfos?: list<array{actionType?: 'CONNECT'|'PUBLISH'|'RECEIVE'|'SUBSCRIBE', resources?: list<string>, ...}>,
 *     clientId?: string,
 *     policyNamesToAdd?: list<string>,
 *     policyNamesToSkip?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result testInvokeAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result testInvokeAuthorizer(array{
 *     authorizerName?: string,
 *     token?: string,
 *     tokenSignature?: string,
 *     httpContext?: array{headers?: array<string, string>, queryString?: string, ...},
 *     mqttContext?: array{username?: string, password?: string|resource|\Psr\Http\Message\StreamInterface, clientId?: string, ...},
 *     tlsContext?: array{serverName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise testInvokeAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testInvokeAuthorizerAsync(array{
 *     authorizerName?: string,
 *     token?: string,
 *     tokenSignature?: string,
 *     httpContext?: array{headers?: array<string, string>, queryString?: string, ...},
 *     mqttContext?: array{username?: string, password?: string|resource|\Psr\Http\Message\StreamInterface, clientId?: string, ...},
 *     tlsContext?: array{serverName?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result transferCertificate(array $args = [])
 * @phpstan-method \Aws\Result transferCertificate(array{certificateId?: string, targetAwsAccount?: string, transferMessage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise transferCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise transferCertificateAsync(array{certificateId?: string, targetAwsAccount?: string, transferMessage?: string, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateAccountAuditConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAccountAuditConfiguration(array{
 *     roleArn?: string,
 *     auditNotificationTargetConfigurations?: array<string, array{targetArn?: string, roleArn?: string, enabled?: bool, ...}>,
 *     auditCheckConfigurations?: array<string, array{enabled?: bool, configuration?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountAuditConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountAuditConfigurationAsync(array{
 *     roleArn?: string,
 *     auditNotificationTargetConfigurations?: array<string, array{targetArn?: string, roleArn?: string, enabled?: bool, ...}>,
 *     auditCheckConfigurations?: array<string, array{enabled?: bool, configuration?: array<string, string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAuditSuppression(array $args = [])
 * @phpstan-method \Aws\Result updateAuditSuppression(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     expirationDate?: int|string|\DateTimeInterface,
 *     suppressIndefinitely?: bool,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAuditSuppressionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAuditSuppressionAsync(array{
 *     checkName?: string,
 *     resourceIdentifier?: array{
 *         deviceCertificateId?: string,
 *         caCertificateId?: string,
 *         cognitoIdentityPoolId?: string,
 *         clientId?: string,
 *         policyVersionIdentifier?: array{policyName?: string, policyVersionId?: string, ...},
 *         account?: string,
 *         iamRoleArn?: string,
 *         roleAliasArn?: string,
 *         issuerCertificateIdentifier?: array{issuerCertificateSubject?: string, issuerId?: string, issuerCertificateSerialNumber?: string, ...},
 *         deviceCertificateArn?: string,
 *         ...,
 *     },
 *     expirationDate?: int|string|\DateTimeInterface,
 *     suppressIndefinitely?: bool,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateAuthorizer(array $args = [])
 * @phpstan-method \Aws\Result updateAuthorizer(array{
 *     authorizerName?: string,
 *     authorizerFunctionArn?: string,
 *     tokenKeyName?: string,
 *     tokenSigningPublicKeys?: array<string, string>,
 *     status?: 'ACTIVE'|'INACTIVE',
 *     enableCachingForHttp?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAuthorizerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAuthorizerAsync(array{
 *     authorizerName?: string,
 *     authorizerFunctionArn?: string,
 *     tokenKeyName?: string,
 *     tokenSigningPublicKeys?: array<string, string>,
 *     status?: 'ACTIVE'|'INACTIVE',
 *     enableCachingForHttp?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBillingGroup(array $args = [])
 * @phpstan-method \Aws\Result updateBillingGroup(array{
 *     billingGroupName?: string,
 *     billingGroupProperties?: array{billingGroupDescription?: string, ...},
 *     expectedVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBillingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBillingGroupAsync(array{
 *     billingGroupName?: string,
 *     billingGroupProperties?: array{billingGroupDescription?: string, ...},
 *     expectedVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCACertificate(array $args = [])
 * @phpstan-method \Aws\Result updateCACertificate(array{
 *     certificateId?: string,
 *     newStatus?: 'ACTIVE'|'INACTIVE',
 *     newAutoRegistrationStatus?: 'DISABLE'|'ENABLE',
 *     registrationConfig?: array{templateBody?: string, roleArn?: string, templateName?: string, ...},
 *     removeAutoRegistration?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCACertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCACertificateAsync(array{
 *     certificateId?: string,
 *     newStatus?: 'ACTIVE'|'INACTIVE',
 *     newAutoRegistrationStatus?: 'DISABLE'|'ENABLE',
 *     registrationConfig?: array{templateBody?: string, roleArn?: string, templateName?: string, ...},
 *     removeAutoRegistration?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCertificate(array $args = [])
 * @phpstan-method \Aws\Result updateCertificate(array{
 *     certificateId?: string,
 *     newStatus?: 'ACTIVE'|'INACTIVE'|'PENDING_ACTIVATION'|'PENDING_TRANSFER'|'REGISTER_INACTIVE'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCertificateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCertificateAsync(array{
 *     certificateId?: string,
 *     newStatus?: 'ACTIVE'|'INACTIVE'|'PENDING_ACTIVATION'|'PENDING_TRANSFER'|'REGISTER_INACTIVE'|'REVOKED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCertificateProvider(array $args = [])
 * @phpstan-method \Aws\Result updateCertificateProvider(array{
 *     certificateProviderName?: string,
 *     lambdaFunctionArn?: string,
 *     accountDefaultForOperations?: list<'CreateCertificateFromCsr'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCertificateProviderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCertificateProviderAsync(array{
 *     certificateProviderName?: string,
 *     lambdaFunctionArn?: string,
 *     accountDefaultForOperations?: list<'CreateCertificateFromCsr'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateCommand(array $args = [])
 * @phpstan-method \Aws\Result updateCommand(array{commandId?: string, displayName?: string, description?: string, deprecated?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCommandAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCommandAsync(array{commandId?: string, displayName?: string, description?: string, deprecated?: bool, ...} $args = [])
 * @method \Aws\Result updateCustomMetric(array $args = [])
 * @phpstan-method \Aws\Result updateCustomMetric(array{metricName?: string, displayName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateCustomMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCustomMetricAsync(array{metricName?: string, displayName?: string, ...} $args = [])
 * @method \Aws\Result updateDimension(array $args = [])
 * @phpstan-method \Aws\Result updateDimension(array{name?: string, stringValues?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDimensionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDimensionAsync(array{name?: string, stringValues?: list<string>, ...} $args = [])
 * @method \Aws\Result updateDomainConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateDomainConfiguration(array{
 *     domainConfigurationName?: string,
 *     authorizerConfig?: array{defaultAuthorizerName?: string, allowAuthorizerOverride?: bool, ...},
 *     domainConfigurationStatus?: 'DISABLED'|'ENABLED',
 *     removeAuthorizerConfig?: bool,
 *     tlsConfig?: array{securityPolicy?: string, ...},
 *     serverCertificateConfig?: array{enableOCSPCheck?: bool, ocspLambdaArn?: string, ocspAuthorizedResponderArn?: string, ...},
 *     authenticationType?: 'AWS_SIGV4'|'AWS_X509'|'CUSTOM_AUTH'|'CUSTOM_AUTH_X509'|'DEFAULT',
 *     applicationProtocol?: 'DEFAULT'|'HTTPS'|'MQTT_WSS'|'SECURE_MQTT',
 *     clientCertificateConfig?: array{clientCertificateCallbackArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDomainConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainConfigurationAsync(array{
 *     domainConfigurationName?: string,
 *     authorizerConfig?: array{defaultAuthorizerName?: string, allowAuthorizerOverride?: bool, ...},
 *     domainConfigurationStatus?: 'DISABLED'|'ENABLED',
 *     removeAuthorizerConfig?: bool,
 *     tlsConfig?: array{securityPolicy?: string, ...},
 *     serverCertificateConfig?: array{enableOCSPCheck?: bool, ocspLambdaArn?: string, ocspAuthorizedResponderArn?: string, ...},
 *     authenticationType?: 'AWS_SIGV4'|'AWS_X509'|'CUSTOM_AUTH'|'CUSTOM_AUTH_X509'|'DEFAULT',
 *     applicationProtocol?: 'DEFAULT'|'HTTPS'|'MQTT_WSS'|'SECURE_MQTT',
 *     clientCertificateConfig?: array{clientCertificateCallbackArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateDynamicThingGroup(array $args = [])
 * @phpstan-method \Aws\Result updateDynamicThingGroup(array{
 *     thingGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     expectedVersion?: int,
 *     indexName?: string,
 *     queryString?: string,
 *     queryVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDynamicThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDynamicThingGroupAsync(array{
 *     thingGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     expectedVersion?: int,
 *     indexName?: string,
 *     queryString?: string,
 *     queryVersion?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEncryptionConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateEncryptionConfiguration(array{
 *     encryptionType?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *     kmsKeyArn?: string,
 *     kmsAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEncryptionConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEncryptionConfigurationAsync(array{
 *     encryptionType?: 'AWS_OWNED_KMS_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *     kmsKeyArn?: string,
 *     kmsAccessRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEventConfigurations(array $args = [])
 * @phpstan-method \Aws\Result updateEventConfigurations(array{eventConfigurations?: array<string, array{Enabled?: bool, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEventConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEventConfigurationsAsync(array{eventConfigurations?: array<string, array{Enabled?: bool, ...}>, ...} $args = [])
 * @method \Aws\Result updateFleetMetric(array $args = [])
 * @phpstan-method \Aws\Result updateFleetMetric(array{
 *     metricName?: string,
 *     queryString?: string,
 *     aggregationType?: array{name?: 'Cardinality'|'Percentiles'|'Statistics', values?: list<string>, ...},
 *     period?: int,
 *     aggregationField?: string,
 *     description?: string,
 *     queryVersion?: string,
 *     indexName?: string,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     expectedVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateFleetMetricAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFleetMetricAsync(array{
 *     metricName?: string,
 *     queryString?: string,
 *     aggregationType?: array{name?: 'Cardinality'|'Percentiles'|'Statistics', values?: list<string>, ...},
 *     period?: int,
 *     aggregationField?: string,
 *     description?: string,
 *     queryVersion?: string,
 *     indexName?: string,
 *     unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *     expectedVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateIndexingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateIndexingConfiguration(array{
 *     thingIndexingConfiguration?: array{
 *         thingIndexingMode?: 'OFF'|'REGISTRY'|'REGISTRY_AND_SHADOW',
 *         thingConnectivityIndexingMode?: 'OFF'|'STATUS',
 *         deviceDefenderIndexingMode?: 'OFF'|'VIOLATIONS',
 *         namedShadowIndexingMode?: 'OFF'|'ON',
 *         managedFields?: list<array>,
 *         customFields?: list<array>,
 *         filter?: array{namedShadowNames?: list<string>, geoLocations?: list<array>, connectivity?: array, ...},
 *         ...,
 *     },
 *     thingGroupIndexingConfiguration?: array{thingGroupIndexingMode?: 'OFF'|'ON', managedFields?: list<array>, customFields?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIndexingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIndexingConfigurationAsync(array{
 *     thingIndexingConfiguration?: array{
 *         thingIndexingMode?: 'OFF'|'REGISTRY'|'REGISTRY_AND_SHADOW',
 *         thingConnectivityIndexingMode?: 'OFF'|'STATUS',
 *         deviceDefenderIndexingMode?: 'OFF'|'VIOLATIONS',
 *         namedShadowIndexingMode?: 'OFF'|'ON',
 *         managedFields?: list<array>,
 *         customFields?: list<array>,
 *         filter?: array{namedShadowNames?: list<string>, geoLocations?: list<array>, connectivity?: array, ...},
 *         ...,
 *     },
 *     thingGroupIndexingConfiguration?: array{thingGroupIndexingMode?: 'OFF'|'ON', managedFields?: list<array>, customFields?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateJob(array $args = [])
 * @phpstan-method \Aws\Result updateJob(array{
 *     jobId?: string,
 *     description?: string,
 *     presignedUrlConfig?: array{roleArn?: string, expiresInSec?: int, ...},
 *     jobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     abortConfig?: array{criteriaList?: list<array>, ...},
 *     timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     namespaceId?: string,
 *     jobExecutionsRetryConfig?: array{criteriaList?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobAsync(array{
 *     jobId?: string,
 *     description?: string,
 *     presignedUrlConfig?: array{roleArn?: string, expiresInSec?: int, ...},
 *     jobExecutionsRolloutConfig?: array{
 *         maximumPerMinute?: int,
 *         exponentialRate?: array{baseRatePerMinute?: int, incrementFactor?: float, rateIncreaseCriteria?: array, ...},
 *         ...,
 *     },
 *     abortConfig?: array{criteriaList?: list<array>, ...},
 *     timeoutConfig?: array{inProgressTimeoutInMinutes?: int, ...},
 *     namespaceId?: string,
 *     jobExecutionsRetryConfig?: array{criteriaList?: list<array>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateMitigationAction(array $args = [])
 * @phpstan-method \Aws\Result updateMitigationAction(array{
 *     actionName?: string,
 *     roleArn?: string,
 *     actionParams?: array{
 *         updateDeviceCertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         updateCACertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         addThingsToThingGroupParams?: array{thingGroupNames?: list<string>, overrideDynamicGroups?: bool, ...},
 *         replaceDefaultPolicyVersionParams?: array{templateName?: 'BLANK_POLICY', ...},
 *         enableIoTLoggingParams?: array{roleArnForLogging?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', ...},
 *         publishFindingToSnsParams?: array{topicArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateMitigationActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMitigationActionAsync(array{
 *     actionName?: string,
 *     roleArn?: string,
 *     actionParams?: array{
 *         updateDeviceCertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         updateCACertificateParams?: array{action?: 'DEACTIVATE', ...},
 *         addThingsToThingGroupParams?: array{thingGroupNames?: list<string>, overrideDynamicGroups?: bool, ...},
 *         replaceDefaultPolicyVersionParams?: array{templateName?: 'BLANK_POLICY', ...},
 *         enableIoTLoggingParams?: array{roleArnForLogging?: string, logLevel?: 'DEBUG'|'DISABLED'|'ERROR'|'INFO'|'WARN', ...},
 *         publishFindingToSnsParams?: array{topicArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePackage(array $args = [])
 * @phpstan-method \Aws\Result updatePackage(array{
 *     packageName?: string,
 *     description?: string,
 *     defaultVersionName?: string,
 *     unsetDefaultVersion?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageAsync(array{
 *     packageName?: string,
 *     description?: string,
 *     defaultVersionName?: string,
 *     unsetDefaultVersion?: bool,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePackageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updatePackageConfiguration(array{versionUpdateByJobsConfig?: array{enabled?: bool, roleArn?: string, ...}, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageConfigurationAsync(array{versionUpdateByJobsConfig?: array{enabled?: bool, roleArn?: string, ...}, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updatePackageVersion(array $args = [])
 * @phpstan-method \Aws\Result updatePackageVersion(array{
 *     packageName?: string,
 *     versionName?: string,
 *     description?: string,
 *     attributes?: array<string, string>,
 *     artifact?: array{s3Location?: array{bucket?: string, key?: string, version?: string, ...}, ...},
 *     action?: 'DEPRECATE'|'PUBLISH',
 *     recipe?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageVersionAsync(array{
 *     packageName?: string,
 *     versionName?: string,
 *     description?: string,
 *     attributes?: array<string, string>,
 *     artifact?: array{s3Location?: array{bucket?: string, key?: string, version?: string, ...}, ...},
 *     action?: 'DEPRECATE'|'PUBLISH',
 *     recipe?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProvisioningTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateProvisioningTemplate(array{
 *     templateName?: string,
 *     description?: string,
 *     enabled?: bool,
 *     defaultVersionId?: int,
 *     provisioningRoleArn?: string,
 *     preProvisioningHook?: array{payloadVersion?: string, targetArn?: string, ...},
 *     removePreProvisioningHook?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisioningTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProvisioningTemplateAsync(array{
 *     templateName?: string,
 *     description?: string,
 *     enabled?: bool,
 *     defaultVersionId?: int,
 *     provisioningRoleArn?: string,
 *     preProvisioningHook?: array{payloadVersion?: string, targetArn?: string, ...},
 *     removePreProvisioningHook?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRoleAlias(array $args = [])
 * @phpstan-method \Aws\Result updateRoleAlias(array{roleAlias?: string, roleArn?: string, credentialDurationSeconds?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoleAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRoleAliasAsync(array{roleAlias?: string, roleArn?: string, credentialDurationSeconds?: int, ...} $args = [])
 * @method \Aws\Result updateScheduledAudit(array $args = [])
 * @phpstan-method \Aws\Result updateScheduledAudit(array{
 *     frequency?: 'BIWEEKLY'|'DAILY'|'MONTHLY'|'WEEKLY',
 *     dayOfMonth?: string,
 *     dayOfWeek?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED',
 *     targetCheckNames?: list<string>,
 *     scheduledAuditName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScheduledAuditAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScheduledAuditAsync(array{
 *     frequency?: 'BIWEEKLY'|'DAILY'|'MONTHLY'|'WEEKLY',
 *     dayOfMonth?: string,
 *     dayOfWeek?: 'FRI'|'MON'|'SAT'|'SUN'|'THU'|'TUE'|'WED',
 *     targetCheckNames?: list<string>,
 *     scheduledAuditName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSecurityProfile(array $args = [])
 * @phpstan-method \Aws\Result updateSecurityProfile(array{
 *     securityProfileName?: string,
 *     securityProfileDescription?: string,
 *     behaviors?: list<array{
 *         name?: string,
 *         metric?: string,
 *         metricDimension?: array,
 *         criteria?: array,
 *         suppressAlerts?: bool,
 *         exportMetric?: bool,
 *         ...,
 *     }>,
 *     alertTargets?: array<string, array{alertTargetArn?: string, roleArn?: string, ...}>,
 *     additionalMetricsToRetain?: list<string>,
 *     additionalMetricsToRetainV2?: list<array{metric?: string, metricDimension?: array, exportMetric?: bool, ...}>,
 *     deleteBehaviors?: bool,
 *     deleteAlertTargets?: bool,
 *     deleteAdditionalMetricsToRetain?: bool,
 *     expectedVersion?: int,
 *     metricsExportConfig?: array{mqttTopic?: string, roleArn?: string, ...},
 *     deleteMetricsExportConfig?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSecurityProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSecurityProfileAsync(array{
 *     securityProfileName?: string,
 *     securityProfileDescription?: string,
 *     behaviors?: list<array{
 *         name?: string,
 *         metric?: string,
 *         metricDimension?: array,
 *         criteria?: array,
 *         suppressAlerts?: bool,
 *         exportMetric?: bool,
 *         ...,
 *     }>,
 *     alertTargets?: array<string, array{alertTargetArn?: string, roleArn?: string, ...}>,
 *     additionalMetricsToRetain?: list<string>,
 *     additionalMetricsToRetainV2?: list<array{metric?: string, metricDimension?: array, exportMetric?: bool, ...}>,
 *     deleteBehaviors?: bool,
 *     deleteAlertTargets?: bool,
 *     deleteAdditionalMetricsToRetain?: bool,
 *     expectedVersion?: int,
 *     metricsExportConfig?: array{mqttTopic?: string, roleArn?: string, ...},
 *     deleteMetricsExportConfig?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateStream(array $args = [])
 * @phpstan-method \Aws\Result updateStream(array{
 *     streamId?: string,
 *     description?: string,
 *     files?: list<array{fileId?: int, s3Location?: array, ...}>,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamAsync(array{
 *     streamId?: string,
 *     description?: string,
 *     files?: list<array{fileId?: int, s3Location?: array, ...}>,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThing(array $args = [])
 * @phpstan-method \Aws\Result updateThing(array{
 *     thingName?: string,
 *     thingTypeName?: string,
 *     attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *     expectedVersion?: int,
 *     removeThingType?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThingAsync(array{
 *     thingName?: string,
 *     thingTypeName?: string,
 *     attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *     expectedVersion?: int,
 *     removeThingType?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThingGroup(array $args = [])
 * @phpstan-method \Aws\Result updateThingGroup(array{
 *     thingGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     expectedVersion?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThingGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThingGroupAsync(array{
 *     thingGroupName?: string,
 *     thingGroupProperties?: array{
 *         thingGroupDescription?: string,
 *         attributePayload?: array{attributes?: array<string, string>, merge?: bool, ...},
 *         ...,
 *     },
 *     expectedVersion?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThingGroupsForThing(array $args = [])
 * @phpstan-method \Aws\Result updateThingGroupsForThing(array{
 *     thingName?: string,
 *     thingGroupsToAdd?: list<string>,
 *     thingGroupsToRemove?: list<string>,
 *     overrideDynamicGroups?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThingGroupsForThingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThingGroupsForThingAsync(array{
 *     thingName?: string,
 *     thingGroupsToAdd?: list<string>,
 *     thingGroupsToRemove?: list<string>,
 *     overrideDynamicGroups?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateThingType(array $args = [])
 * @phpstan-method \Aws\Result updateThingType(array{
 *     thingTypeName?: string,
 *     thingTypeProperties?: array{
 *         thingTypeDescription?: string,
 *         searchableAttributes?: list<string>,
 *         mqtt5Configuration?: array{propagatingAttributes?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateThingTypeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateThingTypeAsync(array{
 *     thingTypeName?: string,
 *     thingTypeProperties?: array{
 *         thingTypeDescription?: string,
 *         searchableAttributes?: list<string>,
 *         mqtt5Configuration?: array{propagatingAttributes?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTopicRuleDestination(array $args = [])
 * @phpstan-method \Aws\Result updateTopicRuleDestination(array{arn?: string, status?: 'DELETING'|'DISABLED'|'ENABLED'|'ERROR'|'IN_PROGRESS', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTopicRuleDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTopicRuleDestinationAsync(array{arn?: string, status?: 'DELETING'|'DISABLED'|'ENABLED'|'ERROR'|'IN_PROGRESS', ...} $args = [])
 * @method \Aws\Result validateSecurityProfileBehaviors(array $args = [])
 * @phpstan-method \Aws\Result validateSecurityProfileBehaviors(array{
 *     behaviors?: list<array{
 *         name?: string,
 *         metric?: string,
 *         metricDimension?: array,
 *         criteria?: array,
 *         suppressAlerts?: bool,
 *         exportMetric?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validateSecurityProfileBehaviorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateSecurityProfileBehaviorsAsync(array{
 *     behaviors?: list<array{
 *         name?: string,
 *         metric?: string,
 *         metricDimension?: array,
 *         criteria?: array,
 *         suppressAlerts?: bool,
 *         exportMetric?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class IotClient extends AwsClient {}
