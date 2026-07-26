<?php
namespace Aws\ChimeSDKVoice;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Voice** service.
 * @method \Aws\Result associatePhoneNumbersWithVoiceConnector(array $args = [])
 * @phpstan-method \Aws\Result associatePhoneNumbersWithVoiceConnector(array{VoiceConnectorId?: string, E164PhoneNumbers?: list<string>, ForceAssociate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorAsync(array{VoiceConnectorId?: string, E164PhoneNumbers?: list<string>, ForceAssociate?: bool, ...} $args = [])
 * @method \Aws\Result associatePhoneNumbersWithVoiceConnectorGroup(array $args = [])
 * @phpstan-method \Aws\Result associatePhoneNumbersWithVoiceConnectorGroup(array{VoiceConnectorGroupId?: string, E164PhoneNumbers?: list<string>, ForceAssociate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorGroupAsync(array{VoiceConnectorGroupId?: string, E164PhoneNumbers?: list<string>, ForceAssociate?: bool, ...} $args = [])
 * @method \Aws\Result batchDeletePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result batchDeletePhoneNumber(array{PhoneNumberIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeletePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeletePhoneNumberAsync(array{PhoneNumberIds?: list<string>, ...} $args = [])
 * @method \Aws\Result batchUpdatePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result batchUpdatePhoneNumber(array{
 *     UpdatePhoneNumberRequestItems?: list<array{
 *         PhoneNumberId?: string,
 *         ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *         CallingName?: string,
 *         Name?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdatePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchUpdatePhoneNumberAsync(array{
 *     UpdatePhoneNumberRequestItems?: list<array{
 *         PhoneNumberId?: string,
 *         ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *         CallingName?: string,
 *         Name?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPhoneNumberOrder(array $args = [])
 * @phpstan-method \Aws\Result createPhoneNumberOrder(array{
 *     ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *     E164PhoneNumbers?: list<string>,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPhoneNumberOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPhoneNumberOrderAsync(array{
 *     ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *     E164PhoneNumbers?: list<string>,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProxySession(array $args = [])
 * @phpstan-method \Aws\Result createProxySession(array{
 *     VoiceConnectorId?: string,
 *     ParticipantPhoneNumbers?: list<string>,
 *     Name?: string,
 *     ExpiryMinutes?: int,
 *     Capabilities?: list<'SMS'|'Voice'>,
 *     NumberSelectionBehavior?: 'AvoidSticky'|'PreferSticky',
 *     GeoMatchLevel?: 'AreaCode'|'Country',
 *     GeoMatchParams?: array{Country?: string, AreaCode?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProxySessionAsync(array{
 *     VoiceConnectorId?: string,
 *     ParticipantPhoneNumbers?: list<string>,
 *     Name?: string,
 *     ExpiryMinutes?: int,
 *     Capabilities?: list<'SMS'|'Voice'>,
 *     NumberSelectionBehavior?: 'AvoidSticky'|'PreferSticky',
 *     GeoMatchLevel?: 'AreaCode'|'Country',
 *     GeoMatchParams?: array{Country?: string, AreaCode?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSipMediaApplication(array $args = [])
 * @phpstan-method \Aws\Result createSipMediaApplication(array{
 *     AwsRegion?: string,
 *     Name?: string,
 *     Endpoints?: list<array{LambdaArn?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipMediaApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSipMediaApplicationAsync(array{
 *     AwsRegion?: string,
 *     Name?: string,
 *     Endpoints?: list<array{LambdaArn?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSipMediaApplicationCall(array $args = [])
 * @phpstan-method \Aws\Result createSipMediaApplicationCall(array{
 *     FromPhoneNumber?: string,
 *     ToPhoneNumber?: string,
 *     SipMediaApplicationId?: string,
 *     SipHeaders?: array<string, string>,
 *     ArgumentsMap?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipMediaApplicationCallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSipMediaApplicationCallAsync(array{
 *     FromPhoneNumber?: string,
 *     ToPhoneNumber?: string,
 *     SipMediaApplicationId?: string,
 *     SipHeaders?: array<string, string>,
 *     ArgumentsMap?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createSipRule(array $args = [])
 * @phpstan-method \Aws\Result createSipRule(array{
 *     Name?: string,
 *     TriggerType?: 'RequestUriHostname'|'ToPhoneNumber',
 *     TriggerValue?: string,
 *     Disabled?: bool,
 *     TargetApplications?: list<array{SipMediaApplicationId?: string, Priority?: int, AwsRegion?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSipRuleAsync(array{
 *     Name?: string,
 *     TriggerType?: 'RequestUriHostname'|'ToPhoneNumber',
 *     TriggerValue?: string,
 *     Disabled?: bool,
 *     TargetApplications?: list<array{SipMediaApplicationId?: string, Priority?: int, AwsRegion?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVoiceConnector(array $args = [])
 * @phpstan-method \Aws\Result createVoiceConnector(array{
 *     Name?: string,
 *     AwsRegion?: 'ap-northeast-1'|'ap-northeast-2'|'ap-southeast-1'|'ap-southeast-2'|'ca-central-1'|'eu-central-1'|'eu-west-1'|'eu-west-2'|'us-east-1'|'us-west-2',
 *     RequireEncryption?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IntegrationType?: 'CONNECT_ANALYTICS_CONNECTOR'|'CONNECT_CALL_TRANSFER_CONNECTOR',
 *     NetworkType?: 'DUAL_STACK'|'IPV4_ONLY',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVoiceConnectorAsync(array{
 *     Name?: string,
 *     AwsRegion?: 'ap-northeast-1'|'ap-northeast-2'|'ap-southeast-1'|'ap-southeast-2'|'ca-central-1'|'eu-central-1'|'eu-west-1'|'eu-west-2'|'us-east-1'|'us-west-2',
 *     RequireEncryption?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IntegrationType?: 'CONNECT_ANALYTICS_CONNECTOR'|'CONNECT_CALL_TRANSFER_CONNECTOR',
 *     NetworkType?: 'DUAL_STACK'|'IPV4_ONLY',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVoiceConnectorGroup(array $args = [])
 * @phpstan-method \Aws\Result createVoiceConnectorGroup(array{
 *     Name?: string,
 *     VoiceConnectorItems?: list<array{VoiceConnectorId?: string, Priority?: int, ...}>,
 *     CallDistributionType?: 'LoadBalancedDistribution'|'PriorityWeightedDistribution',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceConnectorGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVoiceConnectorGroupAsync(array{
 *     Name?: string,
 *     VoiceConnectorItems?: list<array{VoiceConnectorId?: string, Priority?: int, ...}>,
 *     CallDistributionType?: 'LoadBalancedDistribution'|'PriorityWeightedDistribution',
 *     ...,
 * } $args = [])
 * @method \Aws\Result createVoiceProfile(array $args = [])
 * @phpstan-method \Aws\Result createVoiceProfile(array{SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVoiceProfileAsync(array{SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \Aws\Result createVoiceProfileDomain(array $args = [])
 * @phpstan-method \Aws\Result createVoiceProfileDomain(array{
 *     Name?: string,
 *     Description?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyArn?: string, ...},
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceProfileDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createVoiceProfileDomainAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyArn?: string, ...},
 *     ClientRequestToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result deletePhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result deleteProxySession(array $args = [])
 * @phpstan-method \Aws\Result deleteProxySession(array{VoiceConnectorId?: string, ProxySessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProxySessionAsync(array{VoiceConnectorId?: string, ProxySessionId?: string, ...} $args = [])
 * @method \Aws\Result deleteSipMediaApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteSipMediaApplication(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSipMediaApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSipMediaApplicationAsync(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \Aws\Result deleteSipRule(array $args = [])
 * @phpstan-method \Aws\Result deleteSipRule(array{SipRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSipRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSipRuleAsync(array{SipRuleId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnector(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorEmergencyCallingConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorEmergencyCallingConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorExternalSystemsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorExternalSystemsConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorExternalSystemsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorExternalSystemsConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorGroup(array{VoiceConnectorGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorGroupAsync(array{VoiceConnectorGroupId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorOrigination(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorOrigination(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorOriginationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorOriginationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorProxy(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorProxy(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorProxyAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorStreamingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorStreamingConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorStreamingConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorTermination(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorTermination(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceConnectorTerminationCredentials(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceConnectorTerminationCredentials(array{VoiceConnectorId?: string, Usernames?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationCredentialsAsync(array{VoiceConnectorId?: string, Usernames?: list<string>, ...} $args = [])
 * @method \Aws\Result deleteVoiceProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceProfile(array{VoiceProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceProfileAsync(array{VoiceProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteVoiceProfileDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteVoiceProfileDomain(array{VoiceProfileDomainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceProfileDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteVoiceProfileDomainAsync(array{VoiceProfileDomainId?: string, ...} $args = [])
 * @method \Aws\Result disassociatePhoneNumbersFromVoiceConnector(array $args = [])
 * @phpstan-method \Aws\Result disassociatePhoneNumbersFromVoiceConnector(array{VoiceConnectorId?: string, E164PhoneNumbers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorAsync(array{VoiceConnectorId?: string, E164PhoneNumbers?: list<string>, ...} $args = [])
 * @method \Aws\Result disassociatePhoneNumbersFromVoiceConnectorGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociatePhoneNumbersFromVoiceConnectorGroup(array{VoiceConnectorGroupId?: string, E164PhoneNumbers?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorGroupAsync(array{VoiceConnectorGroupId?: string, E164PhoneNumbers?: list<string>, ...} $args = [])
 * @method \Aws\Result getGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result getGlobalSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result getPhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result getPhoneNumberOrder(array $args = [])
 * @phpstan-method \Aws\Result getPhoneNumberOrder(array{PhoneNumberOrderId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberOrderAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPhoneNumberOrderAsync(array{PhoneNumberOrderId?: string, ...} $args = [])
 * @method \Aws\Result getPhoneNumberSettings(array $args = [])
 * @phpstan-method \Aws\Result getPhoneNumberSettings(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPhoneNumberSettingsAsync(array{...} $args = [])
 * @method \Aws\Result getProxySession(array $args = [])
 * @phpstan-method \Aws\Result getProxySession(array{VoiceConnectorId?: string, ProxySessionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProxySessionAsync(array{VoiceConnectorId?: string, ProxySessionId?: string, ...} $args = [])
 * @method \Aws\Result getSipMediaApplication(array $args = [])
 * @phpstan-method \Aws\Result getSipMediaApplication(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSipMediaApplicationAsync(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getSipMediaApplicationAlexaSkillConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getSipMediaApplicationAlexaSkillConfiguration(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationAlexaSkillConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSipMediaApplicationAlexaSkillConfigurationAsync(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getSipMediaApplicationLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getSipMediaApplicationLoggingConfiguration(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSipMediaApplicationLoggingConfigurationAsync(array{SipMediaApplicationId?: string, ...} $args = [])
 * @method \Aws\Result getSipRule(array $args = [])
 * @phpstan-method \Aws\Result getSipRule(array{SipRuleId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSipRuleAsync(array{SipRuleId?: string, ...} $args = [])
 * @method \Aws\Result getSpeakerSearchTask(array $args = [])
 * @phpstan-method \Aws\Result getSpeakerSearchTask(array{VoiceConnectorId?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSpeakerSearchTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSpeakerSearchTaskAsync(array{VoiceConnectorId?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnector(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnector(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorEmergencyCallingConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorEmergencyCallingConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorExternalSystemsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorExternalSystemsConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorExternalSystemsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorExternalSystemsConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorGroup(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorGroup(array{VoiceConnectorGroupId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorGroupAsync(array{VoiceConnectorGroupId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorLoggingConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorLoggingConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorOrigination(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorOrigination(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorOriginationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorOriginationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorProxy(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorProxy(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorProxyAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorStreamingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorStreamingConfiguration(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorStreamingConfigurationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorTermination(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorTermination(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceConnectorTerminationHealth(array $args = [])
 * @phpstan-method \Aws\Result getVoiceConnectorTerminationHealth(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationHealthAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationHealthAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceProfile(array $args = [])
 * @phpstan-method \Aws\Result getVoiceProfile(array{VoiceProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceProfileAsync(array{VoiceProfileId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceProfileDomain(array $args = [])
 * @phpstan-method \Aws\Result getVoiceProfileDomain(array{VoiceProfileDomainId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceProfileDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceProfileDomainAsync(array{VoiceProfileDomainId?: string, ...} $args = [])
 * @method \Aws\Result getVoiceToneAnalysisTask(array $args = [])
 * @phpstan-method \Aws\Result getVoiceToneAnalysisTask(array{VoiceConnectorId?: string, VoiceToneAnalysisTaskId?: string, IsCaller?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceToneAnalysisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVoiceToneAnalysisTaskAsync(array{VoiceConnectorId?: string, VoiceToneAnalysisTaskId?: string, IsCaller?: bool, ...} $args = [])
 * @method \Aws\Result listAvailableVoiceConnectorRegions(array $args = [])
 * @phpstan-method \Aws\Result listAvailableVoiceConnectorRegions(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAvailableVoiceConnectorRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAvailableVoiceConnectorRegionsAsync(array{...} $args = [])
 * @method \Aws\Result listPhoneNumberOrders(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumberOrders(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumberOrdersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumberOrdersAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listPhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result listPhoneNumbers(array{
 *     Status?: string,
 *     ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *     FilterName?: 'SipRuleId'|'VoiceConnectorGroupId'|'VoiceConnectorId',
 *     FilterValue?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array{
 *     Status?: string,
 *     ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *     FilterName?: 'SipRuleId'|'VoiceConnectorGroupId'|'VoiceConnectorId',
 *     FilterValue?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProxySessions(array $args = [])
 * @phpstan-method \Aws\Result listProxySessions(array{
 *     VoiceConnectorId?: string,
 *     Status?: 'Closed'|'InProgress'|'Open',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxySessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProxySessionsAsync(array{
 *     VoiceConnectorId?: string,
 *     Status?: 'Closed'|'InProgress'|'Open',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSipMediaApplications(array $args = [])
 * @phpstan-method \Aws\Result listSipMediaApplications(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSipMediaApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSipMediaApplicationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSipRules(array $args = [])
 * @phpstan-method \Aws\Result listSipRules(array{SipMediaApplicationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSipRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSipRulesAsync(array{SipMediaApplicationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listSupportedPhoneNumberCountries(array $args = [])
 * @phpstan-method \Aws\Result listSupportedPhoneNumberCountries(array{ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportedPhoneNumberCountriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSupportedPhoneNumberCountriesAsync(array{ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector', ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \Aws\Result listVoiceConnectorGroups(array $args = [])
 * @phpstan-method \Aws\Result listVoiceConnectorGroups(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVoiceConnectorGroupsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listVoiceConnectorTerminationCredentials(array $args = [])
 * @phpstan-method \Aws\Result listVoiceConnectorTerminationCredentials(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVoiceConnectorTerminationCredentialsAsync(array{VoiceConnectorId?: string, ...} $args = [])
 * @method \Aws\Result listVoiceConnectors(array $args = [])
 * @phpstan-method \Aws\Result listVoiceConnectors(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVoiceConnectorsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listVoiceProfileDomains(array $args = [])
 * @phpstan-method \Aws\Result listVoiceProfileDomains(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceProfileDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVoiceProfileDomainsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listVoiceProfiles(array $args = [])
 * @phpstan-method \Aws\Result listVoiceProfiles(array{VoiceProfileDomainId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listVoiceProfilesAsync(array{VoiceProfileDomainId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result putSipMediaApplicationAlexaSkillConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putSipMediaApplicationAlexaSkillConfiguration(array{
 *     SipMediaApplicationId?: string,
 *     SipMediaApplicationAlexaSkillConfiguration?: array{AlexaSkillStatus?: 'ACTIVE'|'INACTIVE', AlexaSkillIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSipMediaApplicationAlexaSkillConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSipMediaApplicationAlexaSkillConfigurationAsync(array{
 *     SipMediaApplicationId?: string,
 *     SipMediaApplicationAlexaSkillConfiguration?: array{AlexaSkillStatus?: 'ACTIVE'|'INACTIVE', AlexaSkillIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putSipMediaApplicationLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putSipMediaApplicationLoggingConfiguration(array{
 *     SipMediaApplicationId?: string,
 *     SipMediaApplicationLoggingConfiguration?: array{EnableSipMediaApplicationMessageLogs?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putSipMediaApplicationLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSipMediaApplicationLoggingConfigurationAsync(array{
 *     SipMediaApplicationId?: string,
 *     SipMediaApplicationLoggingConfiguration?: array{EnableSipMediaApplicationMessageLogs?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorEmergencyCallingConfiguration(array{VoiceConnectorId?: string, EmergencyCallingConfiguration?: array{DNIS?: list<array>, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorEmergencyCallingConfigurationAsync(array{VoiceConnectorId?: string, EmergencyCallingConfiguration?: array{DNIS?: list<array>, ...}, ...} $args = [])
 * @method \Aws\Result putVoiceConnectorExternalSystemsConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorExternalSystemsConfiguration(array{
 *     VoiceConnectorId?: string,
 *     SessionBorderControllerTypes?: list<'AUDIOCODES_MEDIANT_SBC'|'AVAYA_SBCE'|'CISCO_UNIFIED_BORDER_ELEMENT'|'ORACLE_ACME_PACKET_SBC'|'RIBBON_SBC'>,
 *     ContactCenterSystemTypes?: list<'AVAYA_AURA_CALL_CENTER_ELITE'|'AVAYA_AURA_CONTACT_CENTER'|'CISCO_UNIFIED_CONTACT_CENTER_ENTERPRISE'|'GENESYS_ENGAGE_ON_PREMISES'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorExternalSystemsConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorExternalSystemsConfigurationAsync(array{
 *     VoiceConnectorId?: string,
 *     SessionBorderControllerTypes?: list<'AUDIOCODES_MEDIANT_SBC'|'AVAYA_SBCE'|'CISCO_UNIFIED_BORDER_ELEMENT'|'ORACLE_ACME_PACKET_SBC'|'RIBBON_SBC'>,
 *     ContactCenterSystemTypes?: list<'AVAYA_AURA_CALL_CENTER_ELITE'|'AVAYA_AURA_CONTACT_CENTER'|'CISCO_UNIFIED_CONTACT_CENTER_ENTERPRISE'|'GENESYS_ENGAGE_ON_PREMISES'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVoiceConnectorLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorLoggingConfiguration(array{
 *     VoiceConnectorId?: string,
 *     LoggingConfiguration?: array{EnableSIPLogs?: bool, EnableMediaMetricLogs?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorLoggingConfigurationAsync(array{
 *     VoiceConnectorId?: string,
 *     LoggingConfiguration?: array{EnableSIPLogs?: bool, EnableMediaMetricLogs?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVoiceConnectorOrigination(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorOrigination(array{VoiceConnectorId?: string, Origination?: array{Routes?: list<array>, Disabled?: bool, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorOriginationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorOriginationAsync(array{VoiceConnectorId?: string, Origination?: array{Routes?: list<array>, Disabled?: bool, ...}, ...} $args = [])
 * @method \Aws\Result putVoiceConnectorProxy(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorProxy(array{
 *     VoiceConnectorId?: string,
 *     DefaultSessionExpiryMinutes?: int,
 *     PhoneNumberPoolCountries?: list<string>,
 *     FallBackPhoneNumber?: string,
 *     Disabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorProxyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorProxyAsync(array{
 *     VoiceConnectorId?: string,
 *     DefaultSessionExpiryMinutes?: int,
 *     PhoneNumberPoolCountries?: list<string>,
 *     FallBackPhoneNumber?: string,
 *     Disabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVoiceConnectorStreamingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorStreamingConfiguration(array{
 *     VoiceConnectorId?: string,
 *     StreamingConfiguration?: array{
 *         DataRetentionInHours?: int,
 *         Disabled?: bool,
 *         StreamingNotificationTargets?: list<array>,
 *         MediaInsightsConfiguration?: array{Disabled?: bool, ConfigurationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorStreamingConfigurationAsync(array{
 *     VoiceConnectorId?: string,
 *     StreamingConfiguration?: array{
 *         DataRetentionInHours?: int,
 *         Disabled?: bool,
 *         StreamingNotificationTargets?: list<array>,
 *         MediaInsightsConfiguration?: array{Disabled?: bool, ConfigurationArn?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVoiceConnectorTermination(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorTermination(array{
 *     VoiceConnectorId?: string,
 *     Termination?: array{
 *         CpsLimit?: int,
 *         DefaultPhoneNumber?: string,
 *         CallingRegions?: list<string>,
 *         CidrAllowedList?: list<string>,
 *         Disabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationAsync(array{
 *     VoiceConnectorId?: string,
 *     Termination?: array{
 *         CpsLimit?: int,
 *         DefaultPhoneNumber?: string,
 *         CallingRegions?: list<string>,
 *         CidrAllowedList?: list<string>,
 *         Disabled?: bool,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result putVoiceConnectorTerminationCredentials(array $args = [])
 * @phpstan-method \Aws\Result putVoiceConnectorTerminationCredentials(array{VoiceConnectorId?: string, Credentials?: list<array{Username?: string, Password?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationCredentialsAsync(array{VoiceConnectorId?: string, Credentials?: list<array{Username?: string, Password?: string, ...}>, ...} $args = [])
 * @method \Aws\Result restorePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result restorePhoneNumber(array{PhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise restorePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restorePhoneNumberAsync(array{PhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result searchAvailablePhoneNumbers(array $args = [])
 * @phpstan-method \Aws\Result searchAvailablePhoneNumbers(array{
 *     AreaCode?: string,
 *     City?: string,
 *     Country?: string,
 *     State?: string,
 *     TollFreePrefix?: string,
 *     PhoneNumberType?: 'Local'|'TollFree',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array{
 *     AreaCode?: string,
 *     City?: string,
 *     Country?: string,
 *     State?: string,
 *     TollFreePrefix?: string,
 *     PhoneNumberType?: 'Local'|'TollFree',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startSpeakerSearchTask(array $args = [])
 * @phpstan-method \Aws\Result startSpeakerSearchTask(array{
 *     VoiceConnectorId?: string,
 *     TransactionId?: string,
 *     VoiceProfileDomainId?: string,
 *     ClientRequestToken?: string,
 *     CallLeg?: 'Callee'|'Caller',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startSpeakerSearchTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSpeakerSearchTaskAsync(array{
 *     VoiceConnectorId?: string,
 *     TransactionId?: string,
 *     VoiceProfileDomainId?: string,
 *     ClientRequestToken?: string,
 *     CallLeg?: 'Callee'|'Caller',
 *     ...,
 * } $args = [])
 * @method \Aws\Result startVoiceToneAnalysisTask(array $args = [])
 * @phpstan-method \Aws\Result startVoiceToneAnalysisTask(array{
 *     VoiceConnectorId?: string,
 *     TransactionId?: string,
 *     LanguageCode?: 'en-US',
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startVoiceToneAnalysisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startVoiceToneAnalysisTaskAsync(array{
 *     VoiceConnectorId?: string,
 *     TransactionId?: string,
 *     LanguageCode?: 'en-US',
 *     ClientRequestToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result stopSpeakerSearchTask(array $args = [])
 * @phpstan-method \Aws\Result stopSpeakerSearchTask(array{VoiceConnectorId?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopSpeakerSearchTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopSpeakerSearchTaskAsync(array{VoiceConnectorId?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \Aws\Result stopVoiceToneAnalysisTask(array $args = [])
 * @phpstan-method \Aws\Result stopVoiceToneAnalysisTask(array{VoiceConnectorId?: string, VoiceToneAnalysisTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopVoiceToneAnalysisTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopVoiceToneAnalysisTaskAsync(array{VoiceConnectorId?: string, VoiceToneAnalysisTaskId?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateGlobalSettings(array $args = [])
 * @phpstan-method \Aws\Result updateGlobalSettings(array{VoiceConnector?: array{CdrBucket?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array{VoiceConnector?: array{CdrBucket?: string, ...}, ...} $args = [])
 * @method \Aws\Result updatePhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumber(array{
 *     PhoneNumberId?: string,
 *     ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *     CallingName?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array{
 *     PhoneNumberId?: string,
 *     ProductType?: 'SipMediaApplicationDialIn'|'VoiceConnector',
 *     CallingName?: string,
 *     Name?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePhoneNumberSettings(array $args = [])
 * @phpstan-method \Aws\Result updatePhoneNumberSettings(array{CallingName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePhoneNumberSettingsAsync(array{CallingName?: string, ...} $args = [])
 * @method \Aws\Result updateProxySession(array $args = [])
 * @phpstan-method \Aws\Result updateProxySession(array{
 *     VoiceConnectorId?: string,
 *     ProxySessionId?: string,
 *     Capabilities?: list<'SMS'|'Voice'>,
 *     ExpiryMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxySessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProxySessionAsync(array{
 *     VoiceConnectorId?: string,
 *     ProxySessionId?: string,
 *     Capabilities?: list<'SMS'|'Voice'>,
 *     ExpiryMinutes?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateSipMediaApplication(array $args = [])
 * @phpstan-method \Aws\Result updateSipMediaApplication(array{SipMediaApplicationId?: string, Name?: string, Endpoints?: list<array{LambdaArn?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipMediaApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSipMediaApplicationAsync(array{SipMediaApplicationId?: string, Name?: string, Endpoints?: list<array{LambdaArn?: string, ...}>, ...} $args = [])
 * @method \Aws\Result updateSipMediaApplicationCall(array $args = [])
 * @phpstan-method \Aws\Result updateSipMediaApplicationCall(array{SipMediaApplicationId?: string, TransactionId?: string, Arguments?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipMediaApplicationCallAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSipMediaApplicationCallAsync(array{SipMediaApplicationId?: string, TransactionId?: string, Arguments?: array<string, string>, ...} $args = [])
 * @method \Aws\Result updateSipRule(array $args = [])
 * @phpstan-method \Aws\Result updateSipRule(array{
 *     SipRuleId?: string,
 *     Name?: string,
 *     Disabled?: bool,
 *     TargetApplications?: list<array{SipMediaApplicationId?: string, Priority?: int, AwsRegion?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipRuleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSipRuleAsync(array{
 *     SipRuleId?: string,
 *     Name?: string,
 *     Disabled?: bool,
 *     TargetApplications?: list<array{SipMediaApplicationId?: string, Priority?: int, AwsRegion?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVoiceConnector(array $args = [])
 * @phpstan-method \Aws\Result updateVoiceConnector(array{VoiceConnectorId?: string, Name?: string, RequireEncryption?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVoiceConnectorAsync(array{VoiceConnectorId?: string, Name?: string, RequireEncryption?: bool, ...} $args = [])
 * @method \Aws\Result updateVoiceConnectorGroup(array $args = [])
 * @phpstan-method \Aws\Result updateVoiceConnectorGroup(array{
 *     VoiceConnectorGroupId?: string,
 *     Name?: string,
 *     VoiceConnectorItems?: list<array{VoiceConnectorId?: string, Priority?: int, ...}>,
 *     CallDistributionType?: 'LoadBalancedDistribution'|'PriorityWeightedDistribution',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceConnectorGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVoiceConnectorGroupAsync(array{
 *     VoiceConnectorGroupId?: string,
 *     Name?: string,
 *     VoiceConnectorItems?: list<array{VoiceConnectorId?: string, Priority?: int, ...}>,
 *     CallDistributionType?: 'LoadBalancedDistribution'|'PriorityWeightedDistribution',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateVoiceProfile(array $args = [])
 * @phpstan-method \Aws\Result updateVoiceProfile(array{VoiceProfileId?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVoiceProfileAsync(array{VoiceProfileId?: string, SpeakerSearchTaskId?: string, ...} $args = [])
 * @method \Aws\Result updateVoiceProfileDomain(array $args = [])
 * @phpstan-method \Aws\Result updateVoiceProfileDomain(array{VoiceProfileDomainId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceProfileDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateVoiceProfileDomainAsync(array{VoiceProfileDomainId?: string, Name?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result validateE911Address(array $args = [])
 * @phpstan-method \Aws\Result validateE911Address(array{
 *     AwsAccountId?: string,
 *     StreetNumber?: string,
 *     StreetInfo?: string,
 *     City?: string,
 *     State?: string,
 *     Country?: string,
 *     PostalCode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise validateE911AddressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateE911AddressAsync(array{
 *     AwsAccountId?: string,
 *     StreetNumber?: string,
 *     StreetInfo?: string,
 *     City?: string,
 *     State?: string,
 *     Country?: string,
 *     PostalCode?: string,
 *     ...,
 * } $args = [])
 */
class ChimeSDKVoiceClient extends AwsClient {}
