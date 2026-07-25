<?php
namespace Aws\PartnerCentralSelling;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Selling API** service.
 * @method \Aws\Result acceptEngagementInvitation(array $args = [])
 * @phpstan-method \Aws\Result acceptEngagementInvitation(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptEngagementInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptEngagementInvitationAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result assignOpportunity(array $args = [])
 * @phpstan-method \Aws\Result assignOpportunity(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     Assignee?: array{Email?: string, FirstName?: string, LastName?: string, Phone?: string, BusinessTitle?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise assignOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assignOpportunityAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     Assignee?: array{Email?: string, FirstName?: string, LastName?: string, Phone?: string, BusinessTitle?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateOpportunity(array $args = [])
 * @phpstan-method \Aws\Result associateOpportunity(array{
 *     Catalog?: string,
 *     OpportunityIdentifier?: string,
 *     RelatedEntityType?: 'AwsMarketplaceOfferSets'|'AwsMarketplaceOffers'|'AwsMarketplaceProducts'|'AwsMarketplaceSolutions'|'AwsProducts'|'Solutions',
 *     RelatedEntityIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateOpportunityAsync(array{
 *     Catalog?: string,
 *     OpportunityIdentifier?: string,
 *     RelatedEntityType?: 'AwsMarketplaceOfferSets'|'AwsMarketplaceOffers'|'AwsMarketplaceProducts'|'AwsMarketplaceSolutions'|'AwsProducts'|'Solutions',
 *     RelatedEntityIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEngagement(array $args = [])
 * @phpstan-method \Aws\Result createEngagement(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Title?: string,
 *     Description?: string,
 *     Contexts?: list<array{Id?: string, Type?: 'CustomerProject'|'Lead'|'ProspectingResult', Payload?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEngagementAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Title?: string,
 *     Description?: string,
 *     Contexts?: list<array{Id?: string, Type?: 'CustomerProject'|'Lead'|'ProspectingResult', Payload?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEngagementContext(array $args = [])
 * @phpstan-method \Aws\Result createEngagementContext(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ClientToken?: string,
 *     Type?: 'CustomerProject'|'Lead'|'ProspectingResult',
 *     Payload?: array{
 *         CustomerProject?: array{Customer?: array, Project?: array, ...},
 *         Lead?: array{Insights?: array, QualificationStatus?: string, Customer?: array, Interactions?: list<array>, ...},
 *         ProspectingResult?: array{Aws?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEngagementContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEngagementContextAsync(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ClientToken?: string,
 *     Type?: 'CustomerProject'|'Lead'|'ProspectingResult',
 *     Payload?: array{
 *         CustomerProject?: array{Customer?: array, Project?: array, ...},
 *         Lead?: array{Insights?: array, QualificationStatus?: string, Customer?: array, Interactions?: list<array>, ...},
 *         ProspectingResult?: array{Aws?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createEngagementInvitation(array $args = [])
 * @phpstan-method \Aws\Result createEngagementInvitation(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     EngagementIdentifier?: string,
 *     Invitation?: array{
 *         Message?: string,
 *         Receiver?: array{Account?: array, ...},
 *         Payload?: array{OpportunityInvitation?: array, LeadInvitation?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createEngagementInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEngagementInvitationAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     EngagementIdentifier?: string,
 *     Invitation?: array{
 *         Message?: string,
 *         Receiver?: array{Account?: array, ...},
 *         Payload?: array{OpportunityInvitation?: array, LeadInvitation?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result createOpportunity(array $args = [])
 * @phpstan-method \Aws\Result createOpportunity(array{
 *     Catalog?: string,
 *     PrimaryNeedsFromAws?: list<'Co-Sell - Architectural Validation'|'Co-Sell - Business Presentation'|'Co-Sell - Competitive Information'|'Co-Sell - Deal Support'|'Co-Sell - Pricing Assistance'|'Co-Sell - Support for Public Tender / RFx'|'Co-Sell - Technical Consultation'|'Co-Sell - Total Cost of Ownership Evaluation'>,
 *     NationalSecurity?: 'No'|'Yes',
 *     PartnerOpportunityIdentifier?: string,
 *     Customer?: array{
 *         Account?: array{
 *             Industry?: 'Aerospace'|'Agriculture'|'Automotive'|'Computers and Electronics'|'Consumer Goods'|'Education'|'Energy - Oil and Gas'|'Energy - Power and Utilities'|'Financial Services'|'Gaming'|'Government'|'Healthcare'|'Hospitality'|'Life Sciences'|'Manufacturing'|'Marketing and Advertising'|'Media and Entertainment'|'Mining'|'Non-Profit Organization'|'Other'|'Professional Services'|'Real Estate and Construction'|'Retail'|'Software and Internet'|'Telecommunications'|'Transportation and Logistics'|'Travel'|'Wholesale and Distribution',
 *             OtherIndustry?: string,
 *             CompanyName?: string,
 *             WebsiteUrl?: string,
 *             AwsAccountId?: string,
 *             Address?: array,
 *             Duns?: string,
 *             ...,
 *         },
 *         Contacts?: list<array>,
 *         ...,
 *     },
 *     Project?: array{
 *         DeliveryModels?: list<'BYOL or AMI'|'Managed Services'|'Other'|'Professional Services'|'Resell'|'SaaS or PaaS'>,
 *         ExpectedCustomerSpend?: list<array>,
 *         ExpectedContractDuration?: array{Term?: 'Months', Value?: string, ...},
 *         Title?: string,
 *         ApnPrograms?: list<string>,
 *         CustomerBusinessProblem?: string,
 *         CustomerUseCase?: string,
 *         RelatedOpportunityIdentifier?: string,
 *         SalesActivities?: list<'Agreed on solution to Business Problem'|'Completed Action Plan'|'Conducted POC / Demo'|'Customer has shown interest in solution'|'Finalized Deployment Need'|'In evaluation / planning stage'|'Initialized discussions with customer'|'SOW Signed'>,
 *         CompetitorName?: '*Other'|'Akamai'|'AliCloud'|'Co-location'|'Google Cloud Platform'|'IBM Softlayer'|'Microsoft Azure'|'No Competition'|'On-Prem'|'Oracle Cloud'|'Other- Cost Optimization',
 *         OtherCompetitorNames?: string,
 *         OtherSolutionDescription?: string,
 *         AdditionalComments?: string,
 *         AwsPartition?: 'aws-eusc',
 *         ...,
 *     },
 *     OpportunityType?: 'Expansion'|'Flat Renewal'|'Net New Business',
 *     Marketing?: array{
 *         CampaignName?: string,
 *         Source?: 'Marketing Activity'|'None',
 *         UseCases?: list<string>,
 *         Channels?: list<'AWS Marketing Central'|'Content Syndication'|'Display'|'Email'|'Live Event'|'Out Of Home (OOH)'|'Print'|'Search'|'Social'|'TV'|'Telemarketing'|'Video'|'Virtual Event'>,
 *         AwsFundingUsed?: 'No'|'Yes',
 *         ...,
 *     },
 *     SoftwareRevenue?: array{
 *         DeliveryModel?: 'Contract'|'Pay-as-you-go'|'Subscription',
 *         Value?: array{
 *             Amount?: string,
 *             CurrencyCode?: 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XCD'|'XDR'|'XOF'|'XPF'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL',
 *             ...,
 *         },
 *         EffectiveDate?: string,
 *         ExpirationDate?: string,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     LifeCycle?: array{
 *         Stage?: 'Business Validation'|'Closed Lost'|'Committed'|'Launched'|'Prospect'|'Qualified'|'Technical Validation',
 *         ClosedLostReason?: 'Customer Deficiency'|'Customer Experience'|'Delay / Cancellation of Project'|'Financial/Commercial'|'Legal / Tax / Regulatory'|'Lost to Competitor - Google'|'Lost to Competitor - Microsoft'|'Lost to Competitor - Other'|'Lost to Competitor - SoftLayer'|'Lost to Competitor - VMWare'|'No Opportunity'|'On Premises Deployment'|'Other'|'Partner Gap'|'People/Relationship/Governance'|'Price'|'Product/Technology'|'Security / Compliance'|'Technical Limitations',
 *         NextSteps?: string,
 *         TargetCloseDate?: string,
 *         ReviewStatus?: 'Action Required'|'Approved'|'In review'|'Pending Submission'|'Rejected'|'Submitted',
 *         ReviewComments?: string,
 *         ReviewStatusReason?: string,
 *         NextStepsHistory?: list<array>,
 *         ...,
 *     },
 *     Origin?: 'AWS Referral'|'Partner Referral',
 *     OpportunityTeam?: list<array{Email?: string, FirstName?: string, LastName?: string, BusinessTitle?: string, Phone?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createOpportunityAsync(array{
 *     Catalog?: string,
 *     PrimaryNeedsFromAws?: list<'Co-Sell - Architectural Validation'|'Co-Sell - Business Presentation'|'Co-Sell - Competitive Information'|'Co-Sell - Deal Support'|'Co-Sell - Pricing Assistance'|'Co-Sell - Support for Public Tender / RFx'|'Co-Sell - Technical Consultation'|'Co-Sell - Total Cost of Ownership Evaluation'>,
 *     NationalSecurity?: 'No'|'Yes',
 *     PartnerOpportunityIdentifier?: string,
 *     Customer?: array{
 *         Account?: array{
 *             Industry?: 'Aerospace'|'Agriculture'|'Automotive'|'Computers and Electronics'|'Consumer Goods'|'Education'|'Energy - Oil and Gas'|'Energy - Power and Utilities'|'Financial Services'|'Gaming'|'Government'|'Healthcare'|'Hospitality'|'Life Sciences'|'Manufacturing'|'Marketing and Advertising'|'Media and Entertainment'|'Mining'|'Non-Profit Organization'|'Other'|'Professional Services'|'Real Estate and Construction'|'Retail'|'Software and Internet'|'Telecommunications'|'Transportation and Logistics'|'Travel'|'Wholesale and Distribution',
 *             OtherIndustry?: string,
 *             CompanyName?: string,
 *             WebsiteUrl?: string,
 *             AwsAccountId?: string,
 *             Address?: array,
 *             Duns?: string,
 *             ...,
 *         },
 *         Contacts?: list<array>,
 *         ...,
 *     },
 *     Project?: array{
 *         DeliveryModels?: list<'BYOL or AMI'|'Managed Services'|'Other'|'Professional Services'|'Resell'|'SaaS or PaaS'>,
 *         ExpectedCustomerSpend?: list<array>,
 *         ExpectedContractDuration?: array{Term?: 'Months', Value?: string, ...},
 *         Title?: string,
 *         ApnPrograms?: list<string>,
 *         CustomerBusinessProblem?: string,
 *         CustomerUseCase?: string,
 *         RelatedOpportunityIdentifier?: string,
 *         SalesActivities?: list<'Agreed on solution to Business Problem'|'Completed Action Plan'|'Conducted POC / Demo'|'Customer has shown interest in solution'|'Finalized Deployment Need'|'In evaluation / planning stage'|'Initialized discussions with customer'|'SOW Signed'>,
 *         CompetitorName?: '*Other'|'Akamai'|'AliCloud'|'Co-location'|'Google Cloud Platform'|'IBM Softlayer'|'Microsoft Azure'|'No Competition'|'On-Prem'|'Oracle Cloud'|'Other- Cost Optimization',
 *         OtherCompetitorNames?: string,
 *         OtherSolutionDescription?: string,
 *         AdditionalComments?: string,
 *         AwsPartition?: 'aws-eusc',
 *         ...,
 *     },
 *     OpportunityType?: 'Expansion'|'Flat Renewal'|'Net New Business',
 *     Marketing?: array{
 *         CampaignName?: string,
 *         Source?: 'Marketing Activity'|'None',
 *         UseCases?: list<string>,
 *         Channels?: list<'AWS Marketing Central'|'Content Syndication'|'Display'|'Email'|'Live Event'|'Out Of Home (OOH)'|'Print'|'Search'|'Social'|'TV'|'Telemarketing'|'Video'|'Virtual Event'>,
 *         AwsFundingUsed?: 'No'|'Yes',
 *         ...,
 *     },
 *     SoftwareRevenue?: array{
 *         DeliveryModel?: 'Contract'|'Pay-as-you-go'|'Subscription',
 *         Value?: array{
 *             Amount?: string,
 *             CurrencyCode?: 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XCD'|'XDR'|'XOF'|'XPF'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL',
 *             ...,
 *         },
 *         EffectiveDate?: string,
 *         ExpirationDate?: string,
 *         ...,
 *     },
 *     ClientToken?: string,
 *     LifeCycle?: array{
 *         Stage?: 'Business Validation'|'Closed Lost'|'Committed'|'Launched'|'Prospect'|'Qualified'|'Technical Validation',
 *         ClosedLostReason?: 'Customer Deficiency'|'Customer Experience'|'Delay / Cancellation of Project'|'Financial/Commercial'|'Legal / Tax / Regulatory'|'Lost to Competitor - Google'|'Lost to Competitor - Microsoft'|'Lost to Competitor - Other'|'Lost to Competitor - SoftLayer'|'Lost to Competitor - VMWare'|'No Opportunity'|'On Premises Deployment'|'Other'|'Partner Gap'|'People/Relationship/Governance'|'Price'|'Product/Technology'|'Security / Compliance'|'Technical Limitations',
 *         NextSteps?: string,
 *         TargetCloseDate?: string,
 *         ReviewStatus?: 'Action Required'|'Approved'|'In review'|'Pending Submission'|'Rejected'|'Submitted',
 *         ReviewComments?: string,
 *         ReviewStatusReason?: string,
 *         NextStepsHistory?: list<array>,
 *         ...,
 *     },
 *     Origin?: 'AWS Referral'|'Partner Referral',
 *     OpportunityTeam?: list<array{Email?: string, FirstName?: string, LastName?: string, BusinessTitle?: string, Phone?: string, ...}>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceSnapshot(array $args = [])
 * @phpstan-method \Aws\Result createResourceSnapshot(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceSnapshotAsync(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createResourceSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result createResourceSnapshotJob(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createResourceSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceSnapshotJobAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteResourceSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceSnapshotJob(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourceSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceSnapshotJobAsync(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disassociateOpportunity(array $args = [])
 * @phpstan-method \Aws\Result disassociateOpportunity(array{
 *     Catalog?: string,
 *     OpportunityIdentifier?: string,
 *     RelatedEntityType?: 'AwsMarketplaceOfferSets'|'AwsMarketplaceOffers'|'AwsMarketplaceProducts'|'AwsMarketplaceSolutions'|'AwsProducts'|'Solutions',
 *     RelatedEntityIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateOpportunityAsync(array{
 *     Catalog?: string,
 *     OpportunityIdentifier?: string,
 *     RelatedEntityType?: 'AwsMarketplaceOfferSets'|'AwsMarketplaceOffers'|'AwsMarketplaceProducts'|'AwsMarketplaceSolutions'|'AwsProducts'|'Solutions',
 *     RelatedEntityIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAwsOpportunitySummary(array $args = [])
 * @phpstan-method \Aws\Result getAwsOpportunitySummary(array{Catalog?: string, RelatedOpportunityIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAwsOpportunitySummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAwsOpportunitySummaryAsync(array{Catalog?: string, RelatedOpportunityIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEngagement(array $args = [])
 * @phpstan-method \Aws\Result getEngagement(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEngagementAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getEngagementInvitation(array $args = [])
 * @phpstan-method \Aws\Result getEngagementInvitation(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEngagementInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEngagementInvitationAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getOpportunity(array $args = [])
 * @phpstan-method \Aws\Result getOpportunity(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOpportunityAsync(array{Catalog?: string, Identifier?: string, ...} $args = [])
 * @method \Aws\Result getProspectingFromEngagementTask(array $args = [])
 * @phpstan-method \Aws\Result getProspectingFromEngagementTask(array{Catalog?: string, TaskIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProspectingFromEngagementTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProspectingFromEngagementTaskAsync(array{Catalog?: string, TaskIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getResourceSnapshot(array $args = [])
 * @phpstan-method \Aws\Result getResourceSnapshot(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     Revision?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceSnapshotAsync(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     Revision?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getResourceSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result getResourceSnapshotJob(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getResourceSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceSnapshotJobAsync(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getSellingSystemSettings(array $args = [])
 * @phpstan-method \Aws\Result getSellingSystemSettings(array{Catalog?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getSellingSystemSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSellingSystemSettingsAsync(array{Catalog?: string, ...} $args = [])
 * @method \Aws\Result listEngagementByAcceptingInvitationTasks(array $args = [])
 * @phpstan-method \Aws\Result listEngagementByAcceptingInvitationTasks(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'StartTime', ...},
 *     Catalog?: string,
 *     TaskStatus?: list<'COMPLETE'|'FAILED'|'IN_PROGRESS'>,
 *     OpportunityIdentifier?: list<string>,
 *     EngagementInvitationIdentifier?: list<string>,
 *     TaskIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementByAcceptingInvitationTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementByAcceptingInvitationTasksAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'StartTime', ...},
 *     Catalog?: string,
 *     TaskStatus?: list<'COMPLETE'|'FAILED'|'IN_PROGRESS'>,
 *     OpportunityIdentifier?: list<string>,
 *     EngagementInvitationIdentifier?: list<string>,
 *     TaskIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEngagementFromOpportunityTasks(array $args = [])
 * @phpstan-method \Aws\Result listEngagementFromOpportunityTasks(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'StartTime', ...},
 *     Catalog?: string,
 *     TaskStatus?: list<'COMPLETE'|'FAILED'|'IN_PROGRESS'>,
 *     TaskIdentifier?: list<string>,
 *     OpportunityIdentifier?: list<string>,
 *     EngagementIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementFromOpportunityTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementFromOpportunityTasksAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'StartTime', ...},
 *     Catalog?: string,
 *     TaskStatus?: list<'COMPLETE'|'FAILED'|'IN_PROGRESS'>,
 *     TaskIdentifier?: list<string>,
 *     OpportunityIdentifier?: list<string>,
 *     EngagementIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEngagementInvitations(array $args = [])
 * @phpstan-method \Aws\Result listEngagementInvitations(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'InvitationDate', ...},
 *     PayloadType?: list<'LeadInvitation'|'OpportunityInvitation'>,
 *     ParticipantType?: 'RECEIVER'|'SENDER',
 *     Status?: list<'ACCEPTED'|'EXPIRED'|'PENDING'|'REJECTED'>,
 *     EngagementIdentifier?: list<string>,
 *     SenderAwsAccountId?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementInvitationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementInvitationsAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'InvitationDate', ...},
 *     PayloadType?: list<'LeadInvitation'|'OpportunityInvitation'>,
 *     ParticipantType?: 'RECEIVER'|'SENDER',
 *     Status?: list<'ACCEPTED'|'EXPIRED'|'PENDING'|'REJECTED'>,
 *     EngagementIdentifier?: list<string>,
 *     SenderAwsAccountId?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEngagementMembers(array $args = [])
 * @phpstan-method \Aws\Result listEngagementMembers(array{Catalog?: string, Identifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementMembersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementMembersAsync(array{Catalog?: string, Identifier?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \Aws\Result listEngagementResourceAssociations(array $args = [])
 * @phpstan-method \Aws\Result listEngagementResourceAssociations(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     CreatedBy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementResourceAssociationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementResourceAssociationsAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     CreatedBy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEngagements(array $args = [])
 * @phpstan-method \Aws\Result listEngagements(array{
 *     Catalog?: string,
 *     CreatedBy?: list<string>,
 *     ExcludeCreatedBy?: list<string>,
 *     ContextTypes?: list<'CustomerProject'|'Lead'|'ProspectingResult'>,
 *     ExcludeContextTypes?: list<'CustomerProject'|'Lead'|'ProspectingResult'>,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'CreatedDate', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEngagementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEngagementsAsync(array{
 *     Catalog?: string,
 *     CreatedBy?: list<string>,
 *     ExcludeCreatedBy?: list<string>,
 *     ContextTypes?: list<'CustomerProject'|'Lead'|'ProspectingResult'>,
 *     ExcludeContextTypes?: list<'CustomerProject'|'Lead'|'ProspectingResult'>,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'CreatedDate', ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOpportunities(array $args = [])
 * @phpstan-method \Aws\Result listOpportunities(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{
 *         SortOrder?: 'ASCENDING'|'DESCENDING',
 *         SortBy?: 'CreatedDate'|'CustomerCompanyName'|'Identifier'|'LastModifiedDate'|'TargetCloseDate',
 *         ...,
 *     },
 *     LastModifiedDate?: array{
 *         AfterLastModifiedDate?: int|string|\DateTimeInterface,
 *         BeforeLastModifiedDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     Identifier?: list<string>,
 *     LifeCycleStage?: list<'Business Validation'|'Closed Lost'|'Committed'|'Launched'|'Prospect'|'Qualified'|'Technical Validation'>,
 *     LifeCycleReviewStatus?: list<'Action Required'|'Approved'|'In review'|'Pending Submission'|'Rejected'|'Submitted'>,
 *     CustomerCompanyName?: list<string>,
 *     CreatedDate?: array{
 *         AfterCreatedDate?: int|string|\DateTimeInterface,
 *         BeforeCreatedDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     TargetCloseDate?: array{AfterTargetCloseDate?: string, BeforeTargetCloseDate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpportunitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpportunitiesAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{
 *         SortOrder?: 'ASCENDING'|'DESCENDING',
 *         SortBy?: 'CreatedDate'|'CustomerCompanyName'|'Identifier'|'LastModifiedDate'|'TargetCloseDate',
 *         ...,
 *     },
 *     LastModifiedDate?: array{
 *         AfterLastModifiedDate?: int|string|\DateTimeInterface,
 *         BeforeLastModifiedDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     Identifier?: list<string>,
 *     LifeCycleStage?: list<'Business Validation'|'Closed Lost'|'Committed'|'Launched'|'Prospect'|'Qualified'|'Technical Validation'>,
 *     LifeCycleReviewStatus?: list<'Action Required'|'Approved'|'In review'|'Pending Submission'|'Rejected'|'Submitted'>,
 *     CustomerCompanyName?: list<string>,
 *     CreatedDate?: array{
 *         AfterCreatedDate?: int|string|\DateTimeInterface,
 *         BeforeCreatedDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     TargetCloseDate?: array{AfterTargetCloseDate?: string, BeforeTargetCloseDate?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listOpportunityFromEngagementTasks(array $args = [])
 * @phpstan-method \Aws\Result listOpportunityFromEngagementTasks(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'StartTime', ...},
 *     Catalog?: string,
 *     TaskStatus?: list<'COMPLETE'|'FAILED'|'IN_PROGRESS'>,
 *     TaskIdentifier?: list<string>,
 *     OpportunityIdentifier?: list<string>,
 *     EngagementIdentifier?: list<string>,
 *     ContextIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOpportunityFromEngagementTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOpportunityFromEngagementTasksAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'StartTime', ...},
 *     Catalog?: string,
 *     TaskStatus?: list<'COMPLETE'|'FAILED'|'IN_PROGRESS'>,
 *     TaskIdentifier?: list<string>,
 *     OpportunityIdentifier?: list<string>,
 *     EngagementIdentifier?: list<string>,
 *     ContextIdentifier?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProspectingFromEngagementTasks(array $args = [])
 * @phpstan-method \Aws\Result listProspectingFromEngagementTasks(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     TaskIdentifier?: list<string>,
 *     TaskName?: list<string>,
 *     StartAfter?: int|string|\DateTimeInterface,
 *     StartBefore?: int|string|\DateTimeInterface,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'FailedEngagementCount'|'StartTime'|'TaskName', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProspectingFromEngagementTasksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProspectingFromEngagementTasksAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     TaskIdentifier?: list<string>,
 *     TaskName?: list<string>,
 *     StartAfter?: int|string|\DateTimeInterface,
 *     StartBefore?: int|string|\DateTimeInterface,
 *     Sort?: array{SortOrder?: 'ASCENDING'|'DESCENDING', SortBy?: 'FailedEngagementCount'|'StartTime'|'TaskName', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceSnapshotJobs(array $args = [])
 * @phpstan-method \Aws\Result listResourceSnapshotJobs(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: string,
 *     Status?: 'Running'|'Stopped',
 *     Sort?: array{SortBy?: 'CreatedDate', SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceSnapshotJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSnapshotJobsAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: string,
 *     Status?: 'Running'|'Stopped',
 *     Sort?: array{SortBy?: 'CreatedDate', SortOrder?: 'ASCENDING'|'DESCENDING', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourceSnapshots(array $args = [])
 * @phpstan-method \Aws\Result listResourceSnapshots(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     CreatedBy?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourceSnapshotsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSnapshotsAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     EngagementIdentifier?: string,
 *     ResourceType?: 'Opportunity',
 *     ResourceIdentifier?: string,
 *     ResourceSnapshotTemplateIdentifier?: string,
 *     CreatedBy?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listSolutions(array $args = [])
 * @phpstan-method \Aws\Result listSolutions(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{
 *         SortOrder?: 'ASCENDING'|'DESCENDING',
 *         SortBy?: 'Category'|'CreatedDate'|'Identifier'|'Name'|'Status',
 *         ...,
 *     },
 *     Status?: list<'Active'|'Draft'|'Inactive'>,
 *     Identifier?: list<string>,
 *     Category?: list<string>,
 *     AwsMarketplaceSolutionArn?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listSolutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSolutionsAsync(array{
 *     Catalog?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Sort?: array{
 *         SortOrder?: 'ASCENDING'|'DESCENDING',
 *         SortBy?: 'Category'|'CreatedDate'|'Identifier'|'Name'|'Status',
 *         ...,
 *     },
 *     Status?: list<'Active'|'Draft'|'Inactive'>,
 *     Identifier?: list<string>,
 *     Category?: list<string>,
 *     AwsMarketplaceSolutionArn?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putSellingSystemSettings(array $args = [])
 * @phpstan-method \Aws\Result putSellingSystemSettings(array{Catalog?: string, ResourceSnapshotJobRoleIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putSellingSystemSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSellingSystemSettingsAsync(array{Catalog?: string, ResourceSnapshotJobRoleIdentifier?: string, ...} $args = [])
 * @method \Aws\Result rejectEngagementInvitation(array $args = [])
 * @phpstan-method \Aws\Result rejectEngagementInvitation(array{Catalog?: string, Identifier?: string, RejectionReason?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectEngagementInvitationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectEngagementInvitationAsync(array{Catalog?: string, Identifier?: string, RejectionReason?: string, ...} $args = [])
 * @method \Aws\Result startEngagementByAcceptingInvitationTask(array $args = [])
 * @phpstan-method \Aws\Result startEngagementByAcceptingInvitationTask(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEngagementByAcceptingInvitationTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEngagementByAcceptingInvitationTaskAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startEngagementFromOpportunityTask(array $args = [])
 * @phpstan-method \Aws\Result startEngagementFromOpportunityTask(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     AwsSubmission?: array{InvolvementType?: 'Co-Sell'|'For Visibility Only', Visibility?: 'Full'|'Limited', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startEngagementFromOpportunityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEngagementFromOpportunityTaskAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     AwsSubmission?: array{InvolvementType?: 'Co-Sell'|'For Visibility Only', Visibility?: 'Full'|'Limited', ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startOpportunityFromEngagementTask(array $args = [])
 * @phpstan-method \Aws\Result startOpportunityFromEngagementTask(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     ContextIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise startOpportunityFromEngagementTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startOpportunityFromEngagementTaskAsync(array{
 *     Catalog?: string,
 *     ClientToken?: string,
 *     Identifier?: string,
 *     ContextIdentifier?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startProspectingFromEngagementTask(array $args = [])
 * @phpstan-method \Aws\Result startProspectingFromEngagementTask(array{Catalog?: string, Identifiers?: list<string>, TaskName?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startProspectingFromEngagementTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startProspectingFromEngagementTaskAsync(array{Catalog?: string, Identifiers?: list<string>, TaskName?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result startResourceSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result startResourceSnapshotJob(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startResourceSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startResourceSnapshotJobAsync(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result stopResourceSnapshotJob(array $args = [])
 * @phpstan-method \Aws\Result stopResourceSnapshotJob(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise stopResourceSnapshotJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopResourceSnapshotJobAsync(array{Catalog?: string, ResourceSnapshotJobIdentifier?: string, ...} $args = [])
 * @method \Aws\Result submitOpportunity(array $args = [])
 * @phpstan-method \Aws\Result submitOpportunity(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     InvolvementType?: 'Co-Sell'|'For Visibility Only',
 *     Visibility?: 'Full'|'Limited',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise submitOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise submitOpportunityAsync(array{
 *     Catalog?: string,
 *     Identifier?: string,
 *     InvolvementType?: 'Co-Sell'|'For Visibility Only',
 *     Visibility?: 'Full'|'Limited',
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
 * @method \Aws\Result updateEngagementContext(array $args = [])
 * @phpstan-method \Aws\Result updateEngagementContext(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ContextIdentifier?: string,
 *     EngagementLastModifiedAt?: int|string|\DateTimeInterface,
 *     Type?: 'CustomerProject'|'Lead'|'ProspectingResult',
 *     Payload?: array{
 *         Lead?: array{QualificationStatus?: string, Customer?: array, Interaction?: array, Insights?: array, ...},
 *         CustomerProject?: array{Customer?: array, Project?: array, ...},
 *         ProspectingResult?: array{Aws?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEngagementContextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEngagementContextAsync(array{
 *     Catalog?: string,
 *     EngagementIdentifier?: string,
 *     ContextIdentifier?: string,
 *     EngagementLastModifiedAt?: int|string|\DateTimeInterface,
 *     Type?: 'CustomerProject'|'Lead'|'ProspectingResult',
 *     Payload?: array{
 *         Lead?: array{QualificationStatus?: string, Customer?: array, Interaction?: array, Insights?: array, ...},
 *         CustomerProject?: array{Customer?: array, Project?: array, ...},
 *         ProspectingResult?: array{Aws?: array, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateOpportunity(array $args = [])
 * @phpstan-method \Aws\Result updateOpportunity(array{
 *     Catalog?: string,
 *     PrimaryNeedsFromAws?: list<'Co-Sell - Architectural Validation'|'Co-Sell - Business Presentation'|'Co-Sell - Competitive Information'|'Co-Sell - Deal Support'|'Co-Sell - Pricing Assistance'|'Co-Sell - Support for Public Tender / RFx'|'Co-Sell - Technical Consultation'|'Co-Sell - Total Cost of Ownership Evaluation'>,
 *     NationalSecurity?: 'No'|'Yes',
 *     PartnerOpportunityIdentifier?: string,
 *     Customer?: array{
 *         Account?: array{
 *             Industry?: 'Aerospace'|'Agriculture'|'Automotive'|'Computers and Electronics'|'Consumer Goods'|'Education'|'Energy - Oil and Gas'|'Energy - Power and Utilities'|'Financial Services'|'Gaming'|'Government'|'Healthcare'|'Hospitality'|'Life Sciences'|'Manufacturing'|'Marketing and Advertising'|'Media and Entertainment'|'Mining'|'Non-Profit Organization'|'Other'|'Professional Services'|'Real Estate and Construction'|'Retail'|'Software and Internet'|'Telecommunications'|'Transportation and Logistics'|'Travel'|'Wholesale and Distribution',
 *             OtherIndustry?: string,
 *             CompanyName?: string,
 *             WebsiteUrl?: string,
 *             AwsAccountId?: string,
 *             Address?: array,
 *             Duns?: string,
 *             ...,
 *         },
 *         Contacts?: list<array>,
 *         ...,
 *     },
 *     Project?: array{
 *         DeliveryModels?: list<'BYOL or AMI'|'Managed Services'|'Other'|'Professional Services'|'Resell'|'SaaS or PaaS'>,
 *         ExpectedCustomerSpend?: list<array>,
 *         ExpectedContractDuration?: array{Term?: 'Months', Value?: string, ...},
 *         Title?: string,
 *         ApnPrograms?: list<string>,
 *         CustomerBusinessProblem?: string,
 *         CustomerUseCase?: string,
 *         RelatedOpportunityIdentifier?: string,
 *         SalesActivities?: list<'Agreed on solution to Business Problem'|'Completed Action Plan'|'Conducted POC / Demo'|'Customer has shown interest in solution'|'Finalized Deployment Need'|'In evaluation / planning stage'|'Initialized discussions with customer'|'SOW Signed'>,
 *         CompetitorName?: '*Other'|'Akamai'|'AliCloud'|'Co-location'|'Google Cloud Platform'|'IBM Softlayer'|'Microsoft Azure'|'No Competition'|'On-Prem'|'Oracle Cloud'|'Other- Cost Optimization',
 *         OtherCompetitorNames?: string,
 *         OtherSolutionDescription?: string,
 *         AdditionalComments?: string,
 *         AwsPartition?: 'aws-eusc',
 *         ...,
 *     },
 *     OpportunityType?: 'Expansion'|'Flat Renewal'|'Net New Business',
 *     Marketing?: array{
 *         CampaignName?: string,
 *         Source?: 'Marketing Activity'|'None',
 *         UseCases?: list<string>,
 *         Channels?: list<'AWS Marketing Central'|'Content Syndication'|'Display'|'Email'|'Live Event'|'Out Of Home (OOH)'|'Print'|'Search'|'Social'|'TV'|'Telemarketing'|'Video'|'Virtual Event'>,
 *         AwsFundingUsed?: 'No'|'Yes',
 *         ...,
 *     },
 *     SoftwareRevenue?: array{
 *         DeliveryModel?: 'Contract'|'Pay-as-you-go'|'Subscription',
 *         Value?: array{
 *             Amount?: string,
 *             CurrencyCode?: 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XCD'|'XDR'|'XOF'|'XPF'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL',
 *             ...,
 *         },
 *         EffectiveDate?: string,
 *         ExpirationDate?: string,
 *         ...,
 *     },
 *     LastModifiedDate?: int|string|\DateTimeInterface,
 *     Identifier?: string,
 *     LifeCycle?: array{
 *         Stage?: 'Business Validation'|'Closed Lost'|'Committed'|'Launched'|'Prospect'|'Qualified'|'Technical Validation',
 *         ClosedLostReason?: 'Customer Deficiency'|'Customer Experience'|'Delay / Cancellation of Project'|'Financial/Commercial'|'Legal / Tax / Regulatory'|'Lost to Competitor - Google'|'Lost to Competitor - Microsoft'|'Lost to Competitor - Other'|'Lost to Competitor - SoftLayer'|'Lost to Competitor - VMWare'|'No Opportunity'|'On Premises Deployment'|'Other'|'Partner Gap'|'People/Relationship/Governance'|'Price'|'Product/Technology'|'Security / Compliance'|'Technical Limitations',
 *         NextSteps?: string,
 *         TargetCloseDate?: string,
 *         ReviewStatus?: 'Action Required'|'Approved'|'In review'|'Pending Submission'|'Rejected'|'Submitted',
 *         ReviewComments?: string,
 *         ReviewStatusReason?: string,
 *         NextStepsHistory?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateOpportunityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateOpportunityAsync(array{
 *     Catalog?: string,
 *     PrimaryNeedsFromAws?: list<'Co-Sell - Architectural Validation'|'Co-Sell - Business Presentation'|'Co-Sell - Competitive Information'|'Co-Sell - Deal Support'|'Co-Sell - Pricing Assistance'|'Co-Sell - Support for Public Tender / RFx'|'Co-Sell - Technical Consultation'|'Co-Sell - Total Cost of Ownership Evaluation'>,
 *     NationalSecurity?: 'No'|'Yes',
 *     PartnerOpportunityIdentifier?: string,
 *     Customer?: array{
 *         Account?: array{
 *             Industry?: 'Aerospace'|'Agriculture'|'Automotive'|'Computers and Electronics'|'Consumer Goods'|'Education'|'Energy - Oil and Gas'|'Energy - Power and Utilities'|'Financial Services'|'Gaming'|'Government'|'Healthcare'|'Hospitality'|'Life Sciences'|'Manufacturing'|'Marketing and Advertising'|'Media and Entertainment'|'Mining'|'Non-Profit Organization'|'Other'|'Professional Services'|'Real Estate and Construction'|'Retail'|'Software and Internet'|'Telecommunications'|'Transportation and Logistics'|'Travel'|'Wholesale and Distribution',
 *             OtherIndustry?: string,
 *             CompanyName?: string,
 *             WebsiteUrl?: string,
 *             AwsAccountId?: string,
 *             Address?: array,
 *             Duns?: string,
 *             ...,
 *         },
 *         Contacts?: list<array>,
 *         ...,
 *     },
 *     Project?: array{
 *         DeliveryModels?: list<'BYOL or AMI'|'Managed Services'|'Other'|'Professional Services'|'Resell'|'SaaS or PaaS'>,
 *         ExpectedCustomerSpend?: list<array>,
 *         ExpectedContractDuration?: array{Term?: 'Months', Value?: string, ...},
 *         Title?: string,
 *         ApnPrograms?: list<string>,
 *         CustomerBusinessProblem?: string,
 *         CustomerUseCase?: string,
 *         RelatedOpportunityIdentifier?: string,
 *         SalesActivities?: list<'Agreed on solution to Business Problem'|'Completed Action Plan'|'Conducted POC / Demo'|'Customer has shown interest in solution'|'Finalized Deployment Need'|'In evaluation / planning stage'|'Initialized discussions with customer'|'SOW Signed'>,
 *         CompetitorName?: '*Other'|'Akamai'|'AliCloud'|'Co-location'|'Google Cloud Platform'|'IBM Softlayer'|'Microsoft Azure'|'No Competition'|'On-Prem'|'Oracle Cloud'|'Other- Cost Optimization',
 *         OtherCompetitorNames?: string,
 *         OtherSolutionDescription?: string,
 *         AdditionalComments?: string,
 *         AwsPartition?: 'aws-eusc',
 *         ...,
 *     },
 *     OpportunityType?: 'Expansion'|'Flat Renewal'|'Net New Business',
 *     Marketing?: array{
 *         CampaignName?: string,
 *         Source?: 'Marketing Activity'|'None',
 *         UseCases?: list<string>,
 *         Channels?: list<'AWS Marketing Central'|'Content Syndication'|'Display'|'Email'|'Live Event'|'Out Of Home (OOH)'|'Print'|'Search'|'Social'|'TV'|'Telemarketing'|'Video'|'Virtual Event'>,
 *         AwsFundingUsed?: 'No'|'Yes',
 *         ...,
 *     },
 *     SoftwareRevenue?: array{
 *         DeliveryModel?: 'Contract'|'Pay-as-you-go'|'Subscription',
 *         Value?: array{
 *             Amount?: string,
 *             CurrencyCode?: 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XCD'|'XDR'|'XOF'|'XPF'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL',
 *             ...,
 *         },
 *         EffectiveDate?: string,
 *         ExpirationDate?: string,
 *         ...,
 *     },
 *     LastModifiedDate?: int|string|\DateTimeInterface,
 *     Identifier?: string,
 *     LifeCycle?: array{
 *         Stage?: 'Business Validation'|'Closed Lost'|'Committed'|'Launched'|'Prospect'|'Qualified'|'Technical Validation',
 *         ClosedLostReason?: 'Customer Deficiency'|'Customer Experience'|'Delay / Cancellation of Project'|'Financial/Commercial'|'Legal / Tax / Regulatory'|'Lost to Competitor - Google'|'Lost to Competitor - Microsoft'|'Lost to Competitor - Other'|'Lost to Competitor - SoftLayer'|'Lost to Competitor - VMWare'|'No Opportunity'|'On Premises Deployment'|'Other'|'Partner Gap'|'People/Relationship/Governance'|'Price'|'Product/Technology'|'Security / Compliance'|'Technical Limitations',
 *         NextSteps?: string,
 *         TargetCloseDate?: string,
 *         ReviewStatus?: 'Action Required'|'Approved'|'In review'|'Pending Submission'|'Rejected'|'Submitted',
 *         ReviewComments?: string,
 *         ReviewStatusReason?: string,
 *         NextStepsHistory?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class PartnerCentralSellingClient extends AwsClient {}
