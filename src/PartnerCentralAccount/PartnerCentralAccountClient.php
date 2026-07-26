<?php
namespace Aws\PartnerCentralAccount;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Account API** service.
 * @method \Aws\Result acceptConnectionInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptConnectionInvitation(array{Catalog?: string, Identifier?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptConnectionInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptConnectionInvitationAsync(array{Catalog?: string, Identifier?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result associateAwsTrainingCertificationEmailDomain(array $args = [])
 * @phpstan-method \Aws\Result associateAwsTrainingCertificationEmailDomain(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     Email?: string,
 *     EmailVerificationCode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAwsTrainingCertificationEmailDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAwsTrainingCertificationEmailDomainAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     Email?: string,
 *     EmailVerificationCode?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelConnection(array $args = [])
 * @phpstan-method \Aws\Result cancelConnection(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ConnectionType?: 'OPPORTUNITY_COLLABORATION'|'SUBSIDIARY',
 *     Reason?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelConnectionAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ConnectionType?: 'OPPORTUNITY_COLLABORATION'|'SUBSIDIARY',
 *     Reason?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelConnectionInvitation(array $args = [])
 * @phpstan-method \Aws\Result cancelConnectionInvitation(array{Catalog?: string, Identifier?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelConnectionInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelConnectionInvitationAsync(array{Catalog?: string, Identifier?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result cancelProfileUpdateTask(array $args = [])
 * @phpstan-method \Aws\Result cancelProfileUpdateTask(array{Catalog?: string, Identifier?: string, ClientToken?: string, TaskId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelProfileUpdateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelProfileUpdateTaskAsync(array{Catalog?: string, Identifier?: string, ClientToken?: string, TaskId?: string, ...} $args = [])
 * @method \Aws\Result createConnectionInvitation(array $args = [])
 * @phpstan-method \Aws\Result createConnectionInvitation(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     ConnectionType?: 'OPPORTUNITY_COLLABORATION'|'SUBSIDIARY',
 *     Email?: string,
 *     Message?: string,
 *     Name?: string,
 *     ReceiverIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConnectionInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectionInvitationAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     ConnectionType?: 'OPPORTUNITY_COLLABORATION'|'SUBSIDIARY',
 *     Email?: string,
 *     Message?: string,
 *     Name?: string,
 *     ReceiverIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPartner(array $args = [])
 * @phpstan-method \Aws\Result createPartner(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     LegalName?: string,
 *     PrimarySolutionType?: 'COMMUNICATION_SERVICES'|'CONSULTING_SERVICES'|'HARDWARE_PRODUCTS'|'MANAGED_SERVICES'|'PROFESSIONAL_SERVICES'|'SOFTWARE_PRODUCTS'|'TRAINING_SERVICES'|'VALUE_ADDED_RESALE_AWS_SERVICES',
 *     AllianceLeadContact?: array{FirstName?: string, LastName?: string, Email?: string, BusinessTitle?: string, ...},
 *     EmailVerificationCode?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPartnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPartnerAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     LegalName?: string,
 *     PrimarySolutionType?: 'COMMUNICATION_SERVICES'|'CONSULTING_SERVICES'|'HARDWARE_PRODUCTS'|'MANAGED_SERVICES'|'PROFESSIONAL_SERVICES'|'SOFTWARE_PRODUCTS'|'TRAINING_SERVICES'|'VALUE_ADDED_RESALE_AWS_SERVICES',
 *     AllianceLeadContact?: array{FirstName?: string, LastName?: string, Email?: string, BusinessTitle?: string, ...},
 *     EmailVerificationCode?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateAwsTrainingCertificationEmailDomain(array $args = [])
 * @phpstan-method \Aws\Result disassociateAwsTrainingCertificationEmailDomain(array{Catalog?: string, Identifier?: string, ClientToken?: string, DomainName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAwsTrainingCertificationEmailDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAwsTrainingCertificationEmailDomainAsync(array{Catalog?: string, Identifier?: string, ClientToken?: string, DomainName?: string, ...} $args = [])
 * @method \Aws\Result getAllianceLeadContact(array $args = [])
 * @phpstan-method \Aws\Result getAllianceLeadContact(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAllianceLeadContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAllianceLeadContactAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConnectionInvitation(array $args = [])
 * @phpstan-method \Aws\Result getConnectionInvitation(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionInvitationAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getConnectionPreferences(array $args = [])
 * @phpstan-method \Aws\Result getConnectionPreferences(array{Catalog?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getConnectionPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionPreferencesAsync(array{Catalog?: string, ...} $args = [])
 * @method \Aws\Result getPartner(array $args = [])
 * @phpstan-method \Aws\Result getPartner(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getPartnerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPartnerAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getProfileUpdateTask(array $args = [])
 * @phpstan-method \Aws\Result getProfileUpdateTask(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileUpdateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileUpdateTaskAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getProfileVisibility(array $args = [])
 * @phpstan-method \Aws\Result getProfileVisibility(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProfileVisibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProfileVisibilityAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getQualificationsAssociationDetails(array $args = [])
 * @phpstan-method \Aws\Result getQualificationsAssociationDetails(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQualificationsAssociationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQualificationsAssociationDetailsAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getQualificationsAssociationTask(array $args = [])
 * @phpstan-method \Aws\Result getQualificationsAssociationTask(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQualificationsAssociationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQualificationsAssociationTaskAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getQualificationsDisassociationTask(array $args = [])
 * @phpstan-method \Aws\Result getQualificationsDisassociationTask(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getQualificationsDisassociationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQualificationsDisassociationTaskAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getVerification(array $args = [])
 * @phpstan-method \Aws\Result getVerification(array{VerificationType?: 'BUSINESS_VERIFICATION'|'REGISTRANT_VERIFICATION', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getVerificationAsync(array{VerificationType?: 'BUSINESS_VERIFICATION'|'REGISTRANT_VERIFICATION', ...} $args = [])
 * @method \Aws\Result listConnectionInvitations(array $args = [])
 * @phpstan-method \Aws\Result listConnectionInvitations(array{
 *     Catalog?: string,
 *     NextToken?: string,
 *     ConnectionType?: 'OPPORTUNITY_COLLABORATION'|'SUBSIDIARY',
 *     MaxResults?: int,
 *     OtherParticipantIdentifiers?: list<string>,
 *     ParticipantType?: 'RECEIVER'|'SENDER',
 *     Status?: 'ACCEPTED'|'CANCELED'|'EXPIRED'|'PENDING'|'REJECTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionInvitationsAsync(array{
 *     Catalog?: string,
 *     NextToken?: string,
 *     ConnectionType?: 'OPPORTUNITY_COLLABORATION'|'SUBSIDIARY',
 *     MaxResults?: int,
 *     OtherParticipantIdentifiers?: list<string>,
 *     ParticipantType?: 'RECEIVER'|'SENDER',
 *     Status?: 'ACCEPTED'|'CANCELED'|'EXPIRED'|'PENDING'|'REJECTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listConnections(array $args = [])
 * @phpstan-method \Aws\Result listConnections(array{
 *     Catalog?: string,
 *     NextToken?: string,
 *     ConnectionType?: string,
 *     MaxResults?: int,
 *     OtherParticipantIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectionsAsync(array{
 *     Catalog?: string,
 *     NextToken?: string,
 *     ConnectionType?: string,
 *     MaxResults?: int,
 *     OtherParticipantIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPartners(array $args = [])
 * @phpstan-method \Aws\Result listPartners(array{Catalog?: string, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPartnersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPartnersAsync(array{Catalog?: string, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putAllianceLeadContact(array $args = [])
 * @phpstan-method \Aws\Result putAllianceLeadContact(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     AllianceLeadContact?: array{FirstName?: string, LastName?: string, Email?: string, BusinessTitle?: string, ...},
 *     EmailVerificationCode?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAllianceLeadContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAllianceLeadContactAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     AllianceLeadContact?: array{FirstName?: string, LastName?: string, Email?: string, BusinessTitle?: string, ...},
 *     EmailVerificationCode?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putProfileVisibility(array $args = [])
 * @phpstan-method \Aws\Result putProfileVisibility(array{Catalog?: string, Identifier?: string, Visibility?: 'PRIVATE'|'PUBLIC', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putProfileVisibilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProfileVisibilityAsync(array{Catalog?: string, Identifier?: string, Visibility?: 'PRIVATE'|'PUBLIC', ...} $args = [])
 * @method \Aws\Result rejectConnectionInvitation(array $args = [])
 * @phpstan-method \Aws\Result rejectConnectionInvitation(array{Catalog?: string, Identifier?: string, ClientToken?: string, Reason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectConnectionInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectConnectionInvitationAsync(array{Catalog?: string, Identifier?: string, ClientToken?: string, Reason?: string, ...} $args = [])
 * @method \Aws\Result sendEmailVerificationCode(array $args = [])
 * @phpstan-method \Aws\Result sendEmailVerificationCode(array{Catalog?: string, Email?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendEmailVerificationCodeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendEmailVerificationCodeAsync(array{Catalog?: string, Email?: string, ...} $args = [])
 * @method \Aws\Result startProfileUpdateTask(array $args = [])
 * @phpstan-method \Aws\Result startProfileUpdateTask(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     TaskDetails?: array{
 *         DisplayName?: string,
 *         Description?: string,
 *         WebsiteUrl?: string,
 *         LogoUrl?: string,
 *         PrimarySolutionType?: 'COMMUNICATION_SERVICES'|'CONSULTING_SERVICES'|'HARDWARE_PRODUCTS'|'MANAGED_SERVICES'|'PROFESSIONAL_SERVICES'|'SOFTWARE_PRODUCTS'|'TRAINING_SERVICES'|'VALUE_ADDED_RESALE_AWS_SERVICES',
 *         IndustrySegments?: list<'AGRICULTURE_MINING'|'BIOTECHNOLOGY'|'BUSINESS_CONSUMER_SERVICES'|'BUSINESS_SERV'|'COMMUNICATIONS'|'COMPUTERS_ELECTRONICS'|'COMPUTER_HARDWARE'|'COMPUTER_SOFTWARE'|'CONSUMER_GOODS'|'CONSUMER_RELATED'|'EDUCATION'|'ENERGY_UTILITIES'|'FINANCIAL_SERVICES'|'GAMING'|'GOVERNMENT'|'GOVERNMENT_EDUCATION_PUBLIC_SERVICES'|'HEALTHCARE'|'HEALTHCARE_PHARMACEUTICALS_BIOTECH'|'INDUSTRIAL_ENERGY'|'INTERNET_SPECIFIC'|'LIFE_SCIENCES'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'MEDIA_ENTERTAINMENT_LEISURE'|'MEDICAL_HEALTH'|'NON_PROFIT_ORGANIZATION'|'OTHER'|'PROFESSIONAL_SERVICES'|'REAL_ESTATE_CONSTRUCTION'|'RETAIL'|'RETAIL_WHOLESALE_DISTRIBUTION'|'SEMICONDUCTOR_ELECTR'|'SOFTWARE_INTERNET'|'TELECOMMUNICATIONS'|'TRANSPORTATION_LOGISTICS'|'TRAVEL_HOSPITALITY'|'WHOLESALE_DISTRIBUTION'>,
 *         TranslationSourceLocale?: string,
 *         LocalizedContents?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startProfileUpdateTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProfileUpdateTaskAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     TaskDetails?: array{
 *         DisplayName?: string,
 *         Description?: string,
 *         WebsiteUrl?: string,
 *         LogoUrl?: string,
 *         PrimarySolutionType?: 'COMMUNICATION_SERVICES'|'CONSULTING_SERVICES'|'HARDWARE_PRODUCTS'|'MANAGED_SERVICES'|'PROFESSIONAL_SERVICES'|'SOFTWARE_PRODUCTS'|'TRAINING_SERVICES'|'VALUE_ADDED_RESALE_AWS_SERVICES',
 *         IndustrySegments?: list<'AGRICULTURE_MINING'|'BIOTECHNOLOGY'|'BUSINESS_CONSUMER_SERVICES'|'BUSINESS_SERV'|'COMMUNICATIONS'|'COMPUTERS_ELECTRONICS'|'COMPUTER_HARDWARE'|'COMPUTER_SOFTWARE'|'CONSUMER_GOODS'|'CONSUMER_RELATED'|'EDUCATION'|'ENERGY_UTILITIES'|'FINANCIAL_SERVICES'|'GAMING'|'GOVERNMENT'|'GOVERNMENT_EDUCATION_PUBLIC_SERVICES'|'HEALTHCARE'|'HEALTHCARE_PHARMACEUTICALS_BIOTECH'|'INDUSTRIAL_ENERGY'|'INTERNET_SPECIFIC'|'LIFE_SCIENCES'|'MANUFACTURING'|'MEDIA_ENTERTAINMENT'|'MEDIA_ENTERTAINMENT_LEISURE'|'MEDICAL_HEALTH'|'NON_PROFIT_ORGANIZATION'|'OTHER'|'PROFESSIONAL_SERVICES'|'REAL_ESTATE_CONSTRUCTION'|'RETAIL'|'RETAIL_WHOLESALE_DISTRIBUTION'|'SEMICONDUCTOR_ELECTR'|'SOFTWARE_INTERNET'|'TELECOMMUNICATIONS'|'TRANSPORTATION_LOGISTICS'|'TRAVEL_HOSPITALITY'|'WHOLESALE_DISTRIBUTION'>,
 *         TranslationSourceLocale?: string,
 *         LocalizedContents?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQualificationsAssociationTask(array $args = [])
 * @phpstan-method \Aws\Result startQualificationsAssociationTask(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     PrimaryPartner?: array{ProfileId?: string, AccountId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQualificationsAssociationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQualificationsAssociationTaskAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     PrimaryPartner?: array{ProfileId?: string, AccountId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startQualificationsDisassociationTask(array $args = [])
 * @phpstan-method \Aws\Result startQualificationsDisassociationTask(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     AssociatedPartner?: array{ProfileId?: string, AccountId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startQualificationsDisassociationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQualificationsDisassociationTaskAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     ClientToken?: string,
 *     AssociatedPartner?: array{ProfileId?: string, AccountId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result startVerification(array $args = [])
 * @phpstan-method \Aws\Result startVerification(array{
 *     ClientToken?: string,
 *     VerificationDetails?: array{
 *         BusinessVerificationDetails?: array{
 *             LegalName?: string,
 *             RegistrationId?: string,
 *             CountryCode?: string,
 *             JurisdictionOfIncorporation?: string,
 *             ...,
 *         },
 *         RegistrantVerificationDetails?: array,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startVerificationAsync(array{
 *     ClientToken?: string,
 *     VerificationDetails?: array{
 *         BusinessVerificationDetails?: array{
 *             LegalName?: string,
 *             RegistrationId?: string,
 *             CountryCode?: string,
 *             JurisdictionOfIncorporation?: string,
 *             ...,
 *         },
 *         RegistrantVerificationDetails?: array,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateConnectionPreferences(array $args = [])
 * @phpstan-method \Aws\Result updateConnectionPreferences(array{
 *     Catalog?: string,
 *     Revision?: int,
 *     AccessType?: 'ALLOW_ALL'|'ALLOW_BY_DEFAULT_DENY_SOME'|'DENY_ALL',
 *     ExcludedParticipantIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConnectionPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectionPreferencesAsync(array{
 *     Catalog?: string,
 *     Revision?: int,
 *     AccessType?: 'ALLOW_ALL'|'ALLOW_BY_DEFAULT_DENY_SOME'|'DENY_ALL',
 *     ExcludedParticipantIdentifiers?: list<string>,
 *     ...,
 * } $args = [])
 */
class PartnerCentralAccountClient extends AwsClient {}
