<?php
namespace Aws\EndUserMessaging;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS End User Messaging** service.
 * @method \Aws\Result createBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result createBrandProfile(array{
 *     brandProfileName?: string,
 *     clientToken?: string,
 *     deletionProtectionEnabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrandProfileAsync(array{
 *     brandProfileName?: string,
 *     clientToken?: string,
 *     deletionProtectionEnabled?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBrandProfileAttributes(array $args = [])
 * @phpstan-method \Aws\Result createBrandProfileAttributes(array{
 *     brandProfileId?: string,
 *     attributes?: list<array{
 *         attributeName?: string,
 *         attributeType?: 'DOCUMENT'|'IMAGE'|'TEXT',
 *         attributeValue?: string,
 *         attachmentBody?: string|resource|\Psr\Http\Message\StreamInterface,
 *         description?: string,
 *         category?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrandProfileAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrandProfileAttributesAsync(array{
 *     brandProfileId?: string,
 *     attributes?: list<array{
 *         attributeName?: string,
 *         attributeType?: 'DOCUMENT'|'IMAGE'|'TEXT',
 *         attributeValue?: string,
 *         attachmentBody?: string|resource|\Psr\Http\Message\StreamInterface,
 *         description?: string,
 *         category?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createBrandProfileFromRegistration(array $args = [])
 * @phpstan-method \Aws\Result createBrandProfileFromRegistration(array{
 *     registrationId?: string,
 *     brandProfileName?: string,
 *     smartMatch?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createBrandProfileFromRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createBrandProfileFromRegistrationAsync(array{
 *     registrationId?: string,
 *     brandProfileName?: string,
 *     smartMatch?: bool,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createNotifyCodeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createNotifyCodeConfiguration(array{
 *     notifyCodeConfigurationName?: string,
 *     codeConfigurationParameters?: array{
 *         codeType?: 'ALPHA'|'ALPHANUMERIC'|'NUMERIC',
 *         codeLength?: int,
 *         validityPeriodMinutes?: int,
 *         maxAttempts?: int,
 *         ...,
 *     },
 *     channelParameters?: array{
 *         text?: array{inlineTemplateBody?: string, destinationCountryParameters?: array<string, string>, ...},
 *         voice?: array{
 *             inlineTemplateBody?: string,
 *             languageCode?: string,
 *             voiceId?: string,
 *             voiceMessageBodyTextType?: 'SSML'|'TEXT',
 *             ...,
 *         },
 *         notify?: array{notifyTemplateId?: string, voiceId?: string, ...},
 *         whatsApp?: array{whatsAppTemplateName?: string, languageCode?: string, ...},
 *         ...,
 *     },
 *     deletionProtectionEnabled?: bool,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createNotifyCodeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNotifyCodeConfigurationAsync(array{
 *     notifyCodeConfigurationName?: string,
 *     codeConfigurationParameters?: array{
 *         codeType?: 'ALPHA'|'ALPHANUMERIC'|'NUMERIC',
 *         codeLength?: int,
 *         validityPeriodMinutes?: int,
 *         maxAttempts?: int,
 *         ...,
 *     },
 *     channelParameters?: array{
 *         text?: array{inlineTemplateBody?: string, destinationCountryParameters?: array<string, string>, ...},
 *         voice?: array{
 *             inlineTemplateBody?: string,
 *             languageCode?: string,
 *             voiceId?: string,
 *             voiceMessageBodyTextType?: 'SSML'|'TEXT',
 *             ...,
 *         },
 *         notify?: array{notifyTemplateId?: string, voiceId?: string, ...},
 *         whatsApp?: array{whatsAppTemplateName?: string, languageCode?: string, ...},
 *         ...,
 *     },
 *     deletionProtectionEnabled?: bool,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRegistrationsFromBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result createRegistrationsFromBrandProfile(array{brandProfileId?: string, registrationTypes?: list<string>, smartMatch?: bool, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createRegistrationsFromBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRegistrationsFromBrandProfileAsync(array{brandProfileId?: string, registrationTypes?: list<string>, smartMatch?: bool, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result deleteBrandProfile(array{brandProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrandProfileAsync(array{brandProfileId?: string, ...} $args = [])
 * @method \Aws\Result deleteBrandProfileAttribute(array $args = [])
 * @phpstan-method \Aws\Result deleteBrandProfileAttribute(array{brandProfileId?: string, attributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteBrandProfileAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBrandProfileAttributeAsync(array{brandProfileId?: string, attributeName?: string, ...} $args = [])
 * @method \Aws\Result deleteNotifyCodeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteNotifyCodeConfiguration(array{notifyCodeConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteNotifyCodeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNotifyCodeConfigurationAsync(array{notifyCodeConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result getBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result getBrandProfile(array{brandProfileId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBrandProfileAsync(array{brandProfileId?: string, ...} $args = [])
 * @method \Aws\Result getBrandProfileAttribute(array $args = [])
 * @phpstan-method \Aws\Result getBrandProfileAttribute(array{brandProfileId?: string, attributeName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBrandProfileAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBrandProfileAttributeAsync(array{brandProfileId?: string, attributeName?: string, ...} $args = [])
 * @method \Aws\Result getJob(array $args = [])
 * @phpstan-method \Aws\Result getJob(array{jobId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getJobAsync(array{jobId?: string, ...} $args = [])
 * @method \Aws\Result getNotifyCodeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getNotifyCodeConfiguration(array{notifyCodeConfigurationId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getNotifyCodeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNotifyCodeConfigurationAsync(array{notifyCodeConfigurationId?: string, ...} $args = [])
 * @method \Aws\Result listBrandProfileAttributes(array $args = [])
 * @phpstan-method \Aws\Result listBrandProfileAttributes(array{brandProfileId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrandProfileAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrandProfileAttributesAsync(array{brandProfileId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listBrandProfiles(array $args = [])
 * @phpstan-method \Aws\Result listBrandProfiles(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBrandProfilesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBrandProfilesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     status?: 'FAILED'|'PROCESSING'|'SUCCESS',
 *     brandProfileId?: string,
 *     operationType?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     status?: 'FAILED'|'PROCESSING'|'SUCCESS',
 *     brandProfileId?: string,
 *     operationType?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listNotifyCodeConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listNotifyCodeConfigurations(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listNotifyCodeConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNotifyCodeConfigurationsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRegistrationsFromBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result listRegistrationsFromBrandProfile(array{brandProfileId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRegistrationsFromBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegistrationsFromBrandProfileAsync(array{brandProfileId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result sendNotifyCodeVerification(array $args = [])
 * @phpstan-method \Aws\Result sendNotifyCodeVerification(array{
 *     channel?: 'TEXT'|'VOICE'|'WHATSAPP',
 *     destinationIdentity?: string,
 *     originationIdentity?: string,
 *     notifyCodeConfiguration?: string,
 *     overrideChannelParameters?: array{
 *         text?: array{inlineTemplateBody?: string, destinationCountryParameters?: array<string, string>, ...},
 *         voice?: array{
 *             inlineTemplateBody?: string,
 *             languageCode?: string,
 *             voiceId?: string,
 *             voiceMessageBodyTextType?: 'SSML'|'TEXT',
 *             ...,
 *         },
 *         notify?: array{notifyTemplateId?: string, voiceId?: string, ...},
 *         whatsApp?: array{whatsAppTemplateName?: string, languageCode?: string, ...},
 *         ...,
 *     },
 *     overrideCodeConfigurationParameters?: array{
 *         codeType?: 'ALPHA'|'ALPHANUMERIC'|'NUMERIC',
 *         codeLength?: int,
 *         validityPeriodMinutes?: int,
 *         maxAttempts?: int,
 *         ...,
 *     },
 *     configurationSetName?: string,
 *     context?: array<string, string>,
 *     referenceId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendNotifyCodeVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendNotifyCodeVerificationAsync(array{
 *     channel?: 'TEXT'|'VOICE'|'WHATSAPP',
 *     destinationIdentity?: string,
 *     originationIdentity?: string,
 *     notifyCodeConfiguration?: string,
 *     overrideChannelParameters?: array{
 *         text?: array{inlineTemplateBody?: string, destinationCountryParameters?: array<string, string>, ...},
 *         voice?: array{
 *             inlineTemplateBody?: string,
 *             languageCode?: string,
 *             voiceId?: string,
 *             voiceMessageBodyTextType?: 'SSML'|'TEXT',
 *             ...,
 *         },
 *         notify?: array{notifyTemplateId?: string, voiceId?: string, ...},
 *         whatsApp?: array{whatsAppTemplateName?: string, languageCode?: string, ...},
 *         ...,
 *     },
 *     overrideCodeConfigurationParameters?: array{
 *         codeType?: 'ALPHA'|'ALPHANUMERIC'|'NUMERIC',
 *         codeLength?: int,
 *         validityPeriodMinutes?: int,
 *         maxAttempts?: int,
 *         ...,
 *     },
 *     configurationSetName?: string,
 *     context?: array<string, string>,
 *     referenceId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result updateBrandProfile(array{brandProfileId?: string, brandProfileName?: string, deletionProtectionEnabled?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrandProfileAsync(array{brandProfileId?: string, brandProfileName?: string, deletionProtectionEnabled?: bool, ...} $args = [])
 * @method \Aws\Result updateBrandProfileAttribute(array $args = [])
 * @phpstan-method \Aws\Result updateBrandProfileAttribute(array{
 *     brandProfileId?: string,
 *     attributeName?: string,
 *     attributeValue?: string,
 *     attachmentBody?: string|resource|\Psr\Http\Message\StreamInterface,
 *     description?: string,
 *     category?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrandProfileAttributeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrandProfileAttributeAsync(array{
 *     brandProfileId?: string,
 *     attributeName?: string,
 *     attributeValue?: string,
 *     attachmentBody?: string|resource|\Psr\Http\Message\StreamInterface,
 *     description?: string,
 *     category?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateBrandProfileFromRegistration(array $args = [])
 * @phpstan-method \Aws\Result updateBrandProfileFromRegistration(array{
 *     brandProfileId?: string,
 *     registrationId?: string,
 *     smartMatch?: bool,
 *     onAttributeConflict?: 'PRESERVE'|'REPLACE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBrandProfileFromRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateBrandProfileFromRegistrationAsync(array{
 *     brandProfileId?: string,
 *     registrationId?: string,
 *     smartMatch?: bool,
 *     onAttributeConflict?: 'PRESERVE'|'REPLACE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateNotifyCodeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateNotifyCodeConfiguration(array{
 *     notifyCodeConfigurationId?: string,
 *     notifyCodeConfigurationName?: string,
 *     codeConfigurationParameters?: array{
 *         codeType?: 'ALPHA'|'ALPHANUMERIC'|'NUMERIC',
 *         codeLength?: int,
 *         validityPeriodMinutes?: int,
 *         maxAttempts?: int,
 *         ...,
 *     },
 *     channelParameters?: array{
 *         text?: array{inlineTemplateBody?: string, destinationCountryParameters?: array<string, string>, ...},
 *         voice?: array{
 *             inlineTemplateBody?: string,
 *             languageCode?: string,
 *             voiceId?: string,
 *             voiceMessageBodyTextType?: 'SSML'|'TEXT',
 *             ...,
 *         },
 *         notify?: array{notifyTemplateId?: string, voiceId?: string, ...},
 *         whatsApp?: array{whatsAppTemplateName?: string, languageCode?: string, ...},
 *         ...,
 *     },
 *     deletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateNotifyCodeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotifyCodeConfigurationAsync(array{
 *     notifyCodeConfigurationId?: string,
 *     notifyCodeConfigurationName?: string,
 *     codeConfigurationParameters?: array{
 *         codeType?: 'ALPHA'|'ALPHANUMERIC'|'NUMERIC',
 *         codeLength?: int,
 *         validityPeriodMinutes?: int,
 *         maxAttempts?: int,
 *         ...,
 *     },
 *     channelParameters?: array{
 *         text?: array{inlineTemplateBody?: string, destinationCountryParameters?: array<string, string>, ...},
 *         voice?: array{
 *             inlineTemplateBody?: string,
 *             languageCode?: string,
 *             voiceId?: string,
 *             voiceMessageBodyTextType?: 'SSML'|'TEXT',
 *             ...,
 *         },
 *         notify?: array{notifyTemplateId?: string, voiceId?: string, ...},
 *         whatsApp?: array{whatsAppTemplateName?: string, languageCode?: string, ...},
 *         ...,
 *     },
 *     deletionProtectionEnabled?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateRegistrationsFromBrandProfile(array $args = [])
 * @phpstan-method \Aws\Result updateRegistrationsFromBrandProfile(array{
 *     brandProfileId?: string,
 *     registrationIds?: list<string>,
 *     smartMatch?: bool,
 *     onAttributeConflict?: 'PRESERVE'|'REPLACE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRegistrationsFromBrandProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRegistrationsFromBrandProfileAsync(array{
 *     brandProfileId?: string,
 *     registrationIds?: list<string>,
 *     smartMatch?: bool,
 *     onAttributeConflict?: 'PRESERVE'|'REPLACE',
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result validateNotifyCodeVerification(array $args = [])
 * @phpstan-method \Aws\Result validateNotifyCodeVerification(array{destinationIdentity?: string, referenceId?: string, code?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise validateNotifyCodeVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateNotifyCodeVerificationAsync(array{destinationIdentity?: string, referenceId?: string, code?: string, ...} $args = [])
 */
class EndUserMessagingClient extends AwsClient {}
