<?php
namespace Aws\SocialMessaging;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS End User Messaging Social** service.
 * @method \Aws\Result associateWhatsAppBusinessAccount(array $args = [])
 * @phpstan-method \Aws\Result associateWhatsAppBusinessAccount(array{
 *     signupCallback?: array{accessToken?: string, callbackUrl?: string, ...},
 *     setupFinalization?: array{
 *         associateInProgressToken?: string,
 *         phoneNumbers?: list<array>,
 *         phoneNumberParent?: string,
 *         waba?: array{id?: string, eventDestinations?: list<array>, tags?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateWhatsAppBusinessAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateWhatsAppBusinessAccountAsync(array{
 *     signupCallback?: array{accessToken?: string, callbackUrl?: string, ...},
 *     setupFinalization?: array{
 *         associateInProgressToken?: string,
 *         phoneNumbers?: list<array>,
 *         phoneNumberParent?: string,
 *         waba?: array{id?: string, eventDestinations?: list<array>, tags?: list<array>, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWhatsAppFlow(array $args = [])
 * @phpstan-method \Aws\Result createWhatsAppFlow(array{
 *     id?: string,
 *     flowName?: string,
 *     categories?: list<'APPOINTMENT_BOOKING'|'CONTACT_US'|'CUSTOMER_SUPPORT'|'LEAD_GENERATION'|'OTHER'|'SHOPPING'|'SIGN_IN'|'SIGN_UP'|'SURVEY'>,
 *     flowJson?: string|resource|\Psr\Http\Message\StreamInterface,
 *     publish?: bool,
 *     cloneFlowId?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatsAppFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatsAppFlowAsync(array{
 *     id?: string,
 *     flowName?: string,
 *     categories?: list<'APPOINTMENT_BOOKING'|'CONTACT_US'|'CUSTOMER_SUPPORT'|'LEAD_GENERATION'|'OTHER'|'SHOPPING'|'SIGN_IN'|'SIGN_UP'|'SURVEY'>,
 *     flowJson?: string|resource|\Psr\Http\Message\StreamInterface,
 *     publish?: bool,
 *     cloneFlowId?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWhatsAppMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result createWhatsAppMessageTemplate(array{templateDefinition?: string|resource|\Psr\Http\Message\StreamInterface, id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateAsync(array{templateDefinition?: string|resource|\Psr\Http\Message\StreamInterface, id?: string, ...} $args = [])
 * @method \Aws\Result createWhatsAppMessageTemplateFromLibrary(array $args = [])
 * @phpstan-method \Aws\Result createWhatsAppMessageTemplateFromLibrary(array{
 *     metaLibraryTemplate?: array{
 *         templateName?: string,
 *         libraryTemplateName?: string,
 *         templateCategory?: string,
 *         templateLanguage?: string,
 *         libraryTemplateButtonInputs?: list<array>,
 *         libraryTemplateBodyInputs?: array{
 *             addContactNumber?: bool,
 *             addLearnMoreLink?: bool,
 *             addSecurityRecommendation?: bool,
 *             addTrackPackageLink?: bool,
 *             codeExpirationMinutes?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     id?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateFromLibraryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateFromLibraryAsync(array{
 *     metaLibraryTemplate?: array{
 *         templateName?: string,
 *         libraryTemplateName?: string,
 *         templateCategory?: string,
 *         templateLanguage?: string,
 *         libraryTemplateButtonInputs?: list<array>,
 *         libraryTemplateBodyInputs?: array{
 *             addContactNumber?: bool,
 *             addLearnMoreLink?: bool,
 *             addSecurityRecommendation?: bool,
 *             addTrackPackageLink?: bool,
 *             codeExpirationMinutes?: int,
 *             ...,
 *         },
 *         ...,
 *     },
 *     id?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWhatsAppMessageTemplateMedia(array $args = [])
 * @phpstan-method \Aws\Result createWhatsAppMessageTemplateMedia(array{id?: string, sourceS3File?: array{bucketName?: string, key?: string, ...}, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWhatsAppMessageTemplateMediaAsync(array{id?: string, sourceS3File?: array{bucketName?: string, key?: string, ...}, ...} $args = [])
 * @method \Aws\Result deleteWhatsAppFlow(array $args = [])
 * @phpstan-method \Aws\Result deleteWhatsAppFlow(array{id?: string, flowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWhatsAppFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWhatsAppFlowAsync(array{id?: string, flowId?: string, ...} $args = [])
 * @method \Aws\Result deleteWhatsAppMessageMedia(array $args = [])
 * @phpstan-method \Aws\Result deleteWhatsAppMessageMedia(array{mediaId?: string, originationPhoneNumberId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWhatsAppMessageMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWhatsAppMessageMediaAsync(array{mediaId?: string, originationPhoneNumberId?: string, ...} $args = [])
 * @method \Aws\Result deleteWhatsAppMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result deleteWhatsAppMessageTemplate(array{metaTemplateId?: string, deleteAllLanguages?: bool, id?: string, templateName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWhatsAppMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWhatsAppMessageTemplateAsync(array{metaTemplateId?: string, deleteAllLanguages?: bool, id?: string, templateName?: string, ...} $args = [])
 * @method \Aws\Result deprecateWhatsAppFlow(array $args = [])
 * @phpstan-method \Aws\Result deprecateWhatsAppFlow(array{id?: string, flowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deprecateWhatsAppFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deprecateWhatsAppFlowAsync(array{id?: string, flowId?: string, ...} $args = [])
 * @method \Aws\Result disassociateWhatsAppBusinessAccount(array $args = [])
 * @phpstan-method \Aws\Result disassociateWhatsAppBusinessAccount(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateWhatsAppBusinessAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateWhatsAppBusinessAccountAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getLinkedWhatsAppBusinessAccount(array $args = [])
 * @phpstan-method \Aws\Result getLinkedWhatsAppBusinessAccount(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkedWhatsAppBusinessAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkedWhatsAppBusinessAccountAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getLinkedWhatsAppBusinessAccountPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result getLinkedWhatsAppBusinessAccountPhoneNumber(array{id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLinkedWhatsAppBusinessAccountPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLinkedWhatsAppBusinessAccountPhoneNumberAsync(array{id?: string, ...} $args = [])
 * @method \Aws\Result getWhatsAppFlow(array $args = [])
 * @phpstan-method \Aws\Result getWhatsAppFlow(array{id?: string, flowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWhatsAppFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWhatsAppFlowAsync(array{id?: string, flowId?: string, ...} $args = [])
 * @method \Aws\Result getWhatsAppFlowPreview(array $args = [])
 * @phpstan-method \Aws\Result getWhatsAppFlowPreview(array{id?: string, flowId?: string, invalidate?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWhatsAppFlowPreviewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWhatsAppFlowPreviewAsync(array{id?: string, flowId?: string, invalidate?: bool, ...} $args = [])
 * @method \Aws\Result getWhatsAppMessageMedia(array $args = [])
 * @phpstan-method \Aws\Result getWhatsAppMessageMedia(array{
 *     mediaId?: string,
 *     originationPhoneNumberId?: string,
 *     metadataOnly?: bool,
 *     destinationS3PresignedUrl?: array{url?: string, headers?: array<string, string>, ...},
 *     destinationS3File?: array{bucketName?: string, key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getWhatsAppMessageMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWhatsAppMessageMediaAsync(array{
 *     mediaId?: string,
 *     originationPhoneNumberId?: string,
 *     metadataOnly?: bool,
 *     destinationS3PresignedUrl?: array{url?: string, headers?: array<string, string>, ...},
 *     destinationS3File?: array{bucketName?: string, key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result getWhatsAppMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result getWhatsAppMessageTemplate(array{metaTemplateId?: string, id?: string, templateName?: string, templateLanguageCode?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getWhatsAppMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWhatsAppMessageTemplateAsync(array{metaTemplateId?: string, id?: string, templateName?: string, templateLanguageCode?: string, ...} $args = [])
 * @method \Aws\Result listLinkedWhatsAppBusinessAccounts(array $args = [])
 * @phpstan-method \Aws\Result listLinkedWhatsAppBusinessAccounts(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLinkedWhatsAppBusinessAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLinkedWhatsAppBusinessAccountsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWhatsAppFlowAssets(array $args = [])
 * @phpstan-method \Aws\Result listWhatsAppFlowAssets(array{id?: string, flowId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatsAppFlowAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatsAppFlowAssetsAsync(array{id?: string, flowId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listWhatsAppFlows(array $args = [])
 * @phpstan-method \Aws\Result listWhatsAppFlows(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatsAppFlowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatsAppFlowsAsync(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listWhatsAppMessageTemplates(array $args = [])
 * @phpstan-method \Aws\Result listWhatsAppMessageTemplates(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatsAppMessageTemplatesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatsAppMessageTemplatesAsync(array{id?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listWhatsAppTemplateLibrary(array $args = [])
 * @phpstan-method \Aws\Result listWhatsAppTemplateLibrary(array{nextToken?: string, maxResults?: int, id?: string, filters?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWhatsAppTemplateLibraryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWhatsAppTemplateLibraryAsync(array{nextToken?: string, maxResults?: int, id?: string, filters?: array<string, string>, ...} $args = [])
 * @method \Aws\Result postWhatsAppMessageMedia(array $args = [])
 * @phpstan-method \Aws\Result postWhatsAppMessageMedia(array{
 *     originationPhoneNumberId?: string,
 *     sourceS3PresignedUrl?: array{url?: string, headers?: array<string, string>, ...},
 *     sourceS3File?: array{bucketName?: string, key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise postWhatsAppMessageMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postWhatsAppMessageMediaAsync(array{
 *     originationPhoneNumberId?: string,
 *     sourceS3PresignedUrl?: array{url?: string, headers?: array<string, string>, ...},
 *     sourceS3File?: array{bucketName?: string, key?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result publishWhatsAppFlow(array $args = [])
 * @phpstan-method \Aws\Result publishWhatsAppFlow(array{id?: string, flowId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise publishWhatsAppFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishWhatsAppFlowAsync(array{id?: string, flowId?: string, ...} $args = [])
 * @method \Aws\Result putWhatsAppBusinessAccountEventDestinations(array $args = [])
 * @phpstan-method \Aws\Result putWhatsAppBusinessAccountEventDestinations(array{id?: string, eventDestinations?: list<array{eventDestinationArn?: string, roleArn?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putWhatsAppBusinessAccountEventDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putWhatsAppBusinessAccountEventDestinationsAsync(array{id?: string, eventDestinations?: list<array{eventDestinationArn?: string, roleArn?: string, ...}>, ...} $args = [])
 * @method \Aws\Result sendWhatsAppMessage(array $args = [])
 * @phpstan-method \Aws\Result sendWhatsAppMessage(array{
 *     originationPhoneNumberId?: string,
 *     message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     metaApiVersion?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendWhatsAppMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendWhatsAppMessageAsync(array{
 *     originationPhoneNumberId?: string,
 *     message?: string|resource|\Psr\Http\Message\StreamInterface,
 *     metaApiVersion?: string,
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
 * @method \Aws\Result updateWhatsAppFlow(array $args = [])
 * @phpstan-method \Aws\Result updateWhatsAppFlow(array{
 *     id?: string,
 *     flowId?: string,
 *     flowName?: string,
 *     categories?: list<'APPOINTMENT_BOOKING'|'CONTACT_US'|'CUSTOMER_SUPPORT'|'LEAD_GENERATION'|'OTHER'|'SHOPPING'|'SIGN_IN'|'SIGN_UP'|'SURVEY'>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWhatsAppFlowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWhatsAppFlowAsync(array{
 *     id?: string,
 *     flowId?: string,
 *     flowName?: string,
 *     categories?: list<'APPOINTMENT_BOOKING'|'CONTACT_US'|'CUSTOMER_SUPPORT'|'LEAD_GENERATION'|'OTHER'|'SHOPPING'|'SIGN_IN'|'SIGN_UP'|'SURVEY'>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWhatsAppFlowAssets(array $args = [])
 * @phpstan-method \Aws\Result updateWhatsAppFlowAssets(array{id?: string, flowId?: string, flowJson?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWhatsAppFlowAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWhatsAppFlowAssetsAsync(array{id?: string, flowId?: string, flowJson?: string|resource|\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \Aws\Result updateWhatsAppMessageTemplate(array $args = [])
 * @phpstan-method \Aws\Result updateWhatsAppMessageTemplate(array{
 *     id?: string,
 *     metaTemplateId?: string,
 *     templateName?: string,
 *     templateLanguageCode?: string,
 *     parameterFormat?: string,
 *     templateCategory?: string,
 *     templateComponents?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ctaUrlLinkTrackingOptedOut?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWhatsAppMessageTemplateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWhatsAppMessageTemplateAsync(array{
 *     id?: string,
 *     metaTemplateId?: string,
 *     templateName?: string,
 *     templateLanguageCode?: string,
 *     parameterFormat?: string,
 *     templateCategory?: string,
 *     templateComponents?: string|resource|\Psr\Http\Message\StreamInterface,
 *     ctaUrlLinkTrackingOptedOut?: bool,
 *     ...,
 * } $args = [])
 */
class SocialMessagingClient extends AwsClient {}
