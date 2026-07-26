<?php
namespace Aws\Invoicing;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Invoicing** service.
 * @method \Aws\Result batchGetInvoiceProfile(array $args = [])
 * @phpstan-method \Aws\Result batchGetInvoiceProfile(array{AccountIds?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetInvoiceProfileAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetInvoiceProfileAsync(array{AccountIds?: list<string>, ...} $args = [])
 * @method \Aws\Result createInvoiceUnit(array $args = [])
 * @phpstan-method \Aws\Result createInvoiceUnit(array{
 *     Name?: string,
 *     InvoiceReceiver?: string,
 *     Description?: string,
 *     TaxInheritanceDisabled?: bool,
 *     Rule?: array{LinkedAccounts?: list<string>, BillSourceAccounts?: list<string>, ...},
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createInvoiceUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createInvoiceUnitAsync(array{
 *     Name?: string,
 *     InvoiceReceiver?: string,
 *     Description?: string,
 *     TaxInheritanceDisabled?: bool,
 *     Rule?: array{LinkedAccounts?: list<string>, BillSourceAccounts?: list<string>, ...},
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProcurementPortalPreference(array $args = [])
 * @phpstan-method \Aws\Result createProcurementPortalPreference(array{
 *     ProcurementPortalName?: 'COUPA'|'SAP_BUSINESS_NETWORK',
 *     BuyerDomain?: 'NetworkID',
 *     BuyerIdentifier?: string,
 *     SupplierDomain?: 'NetworkID',
 *     SupplierIdentifier?: string,
 *     Selector?: array{InvoiceUnitArns?: list<string>, SellerOfRecords?: list<string>, ...},
 *     ProcurementPortalSharedSecret?: string,
 *     ProcurementPortalInstanceEndpoint?: string,
 *     TestEnvPreference?: array{
 *         BuyerDomain?: 'NetworkID',
 *         BuyerIdentifier?: string,
 *         SupplierDomain?: 'NetworkID',
 *         SupplierIdentifier?: string,
 *         ProcurementPortalSharedSecret?: string,
 *         ProcurementPortalInstanceEndpoint?: string,
 *         ...,
 *     },
 *     EinvoiceDeliveryEnabled?: bool,
 *     EinvoiceDeliveryPreference?: array{
 *         EinvoiceDeliveryDocumentTypes?: list<'AWS_CLOUD_CREDIT_MEMO'|'AWS_CLOUD_INVOICE'|'AWS_MARKETPLACE_CREDIT_MEMO'|'AWS_MARKETPLACE_INVOICE'|'AWS_REQUEST_FOR_PAYMENT'>,
 *         EinvoiceDeliveryAttachmentTypes?: list<'INVOICE_PDF'|'RFP_PDF'>,
 *         Protocol?: 'CXML',
 *         PurchaseOrderDataSources?: list<array>,
 *         ConnectionTestingMethod?: 'PROD_ENV_DOLLAR_TEST'|'TEST_ENV_REPLAY_TEST',
 *         EinvoiceDeliveryActivationDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     PurchaseOrderRetrievalEnabled?: bool,
 *     Contacts?: list<array{Name?: string, Email?: string, ...}>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProcurementPortalPreferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProcurementPortalPreferenceAsync(array{
 *     ProcurementPortalName?: 'COUPA'|'SAP_BUSINESS_NETWORK',
 *     BuyerDomain?: 'NetworkID',
 *     BuyerIdentifier?: string,
 *     SupplierDomain?: 'NetworkID',
 *     SupplierIdentifier?: string,
 *     Selector?: array{InvoiceUnitArns?: list<string>, SellerOfRecords?: list<string>, ...},
 *     ProcurementPortalSharedSecret?: string,
 *     ProcurementPortalInstanceEndpoint?: string,
 *     TestEnvPreference?: array{
 *         BuyerDomain?: 'NetworkID',
 *         BuyerIdentifier?: string,
 *         SupplierDomain?: 'NetworkID',
 *         SupplierIdentifier?: string,
 *         ProcurementPortalSharedSecret?: string,
 *         ProcurementPortalInstanceEndpoint?: string,
 *         ...,
 *     },
 *     EinvoiceDeliveryEnabled?: bool,
 *     EinvoiceDeliveryPreference?: array{
 *         EinvoiceDeliveryDocumentTypes?: list<'AWS_CLOUD_CREDIT_MEMO'|'AWS_CLOUD_INVOICE'|'AWS_MARKETPLACE_CREDIT_MEMO'|'AWS_MARKETPLACE_INVOICE'|'AWS_REQUEST_FOR_PAYMENT'>,
 *         EinvoiceDeliveryAttachmentTypes?: list<'INVOICE_PDF'|'RFP_PDF'>,
 *         Protocol?: 'CXML',
 *         PurchaseOrderDataSources?: list<array>,
 *         ConnectionTestingMethod?: 'PROD_ENV_DOLLAR_TEST'|'TEST_ENV_REPLAY_TEST',
 *         EinvoiceDeliveryActivationDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     PurchaseOrderRetrievalEnabled?: bool,
 *     Contacts?: list<array{Name?: string, Email?: string, ...}>,
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteInvoiceUnit(array $args = [])
 * @phpstan-method \Aws\Result deleteInvoiceUnit(array{InvoiceUnitArn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteInvoiceUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInvoiceUnitAsync(array{InvoiceUnitArn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteProcurementPortalPreference(array $args = [])
 * @phpstan-method \Aws\Result deleteProcurementPortalPreference(array{ProcurementPortalPreferenceArn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProcurementPortalPreferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProcurementPortalPreferenceAsync(array{ProcurementPortalPreferenceArn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result getInvoicePDF(array $args = [])
 * @phpstan-method \Aws\Result getInvoicePDF(array{InvoiceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvoicePDFAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvoicePDFAsync(array{InvoiceId?: string, ...} $args = [])
 * @method \Aws\Result getInvoiceUnit(array $args = [])
 * @phpstan-method \Aws\Result getInvoiceUnit(array{InvoiceUnitArn?: string, AsOf?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getInvoiceUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInvoiceUnitAsync(array{InvoiceUnitArn?: string, AsOf?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \Aws\Result getProcurementPortalPreference(array $args = [])
 * @phpstan-method \Aws\Result getProcurementPortalPreference(array{ProcurementPortalPreferenceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getProcurementPortalPreferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProcurementPortalPreferenceAsync(array{ProcurementPortalPreferenceArn?: string, ...} $args = [])
 * @method \Aws\Result listInvoiceSummaries(array $args = [])
 * @phpstan-method \Aws\Result listInvoiceSummaries(array{
 *     Selector?: array{ResourceType?: 'ACCOUNT_ID'|'INVOICE_ID', Value?: string, ...},
 *     Filter?: array{
 *         TimeInterval?: array{StartDate?: int|string|\DateTimeInterface, EndDate?: int|string|\DateTimeInterface, ...},
 *         BillingPeriod?: array{Month?: int, Year?: int, ...},
 *         InvoicingEntity?: string,
 *         ReceiverRole?: 'BUYER'|'RESELLER'|'SELLER',
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvoiceSummariesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvoiceSummariesAsync(array{
 *     Selector?: array{ResourceType?: 'ACCOUNT_ID'|'INVOICE_ID', Value?: string, ...},
 *     Filter?: array{
 *         TimeInterval?: array{StartDate?: int|string|\DateTimeInterface, EndDate?: int|string|\DateTimeInterface, ...},
 *         BillingPeriod?: array{Month?: int, Year?: int, ...},
 *         InvoicingEntity?: string,
 *         ReceiverRole?: 'BUYER'|'RESELLER'|'SELLER',
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listInvoiceUnits(array $args = [])
 * @phpstan-method \Aws\Result listInvoiceUnits(array{
 *     Filters?: array{
 *         Names?: list<string>,
 *         InvoiceReceivers?: list<string>,
 *         Accounts?: list<string>,
 *         BillSourceAccounts?: list<string>,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AsOf?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listInvoiceUnitsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listInvoiceUnitsAsync(array{
 *     Filters?: array{
 *         Names?: list<string>,
 *         InvoiceReceivers?: list<string>,
 *         Accounts?: list<string>,
 *         BillSourceAccounts?: list<string>,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     AsOf?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProcurementPortalPreferences(array $args = [])
 * @phpstan-method \Aws\Result listProcurementPortalPreferences(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProcurementPortalPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProcurementPortalPreferencesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \Aws\Result putProcurementPortalPreference(array $args = [])
 * @phpstan-method \Aws\Result putProcurementPortalPreference(array{
 *     ProcurementPortalPreferenceArn?: string,
 *     Selector?: array{InvoiceUnitArns?: list<string>, SellerOfRecords?: list<string>, ...},
 *     ProcurementPortalSharedSecret?: string,
 *     ProcurementPortalInstanceEndpoint?: string,
 *     TestEnvPreference?: array{
 *         BuyerDomain?: 'NetworkID',
 *         BuyerIdentifier?: string,
 *         SupplierDomain?: 'NetworkID',
 *         SupplierIdentifier?: string,
 *         ProcurementPortalSharedSecret?: string,
 *         ProcurementPortalInstanceEndpoint?: string,
 *         ...,
 *     },
 *     EinvoiceDeliveryEnabled?: bool,
 *     EinvoiceDeliveryPreference?: array{
 *         EinvoiceDeliveryDocumentTypes?: list<'AWS_CLOUD_CREDIT_MEMO'|'AWS_CLOUD_INVOICE'|'AWS_MARKETPLACE_CREDIT_MEMO'|'AWS_MARKETPLACE_INVOICE'|'AWS_REQUEST_FOR_PAYMENT'>,
 *         EinvoiceDeliveryAttachmentTypes?: list<'INVOICE_PDF'|'RFP_PDF'>,
 *         Protocol?: 'CXML',
 *         PurchaseOrderDataSources?: list<array>,
 *         ConnectionTestingMethod?: 'PROD_ENV_DOLLAR_TEST'|'TEST_ENV_REPLAY_TEST',
 *         EinvoiceDeliveryActivationDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     PurchaseOrderRetrievalEnabled?: bool,
 *     Contacts?: list<array{Name?: string, Email?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putProcurementPortalPreferenceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putProcurementPortalPreferenceAsync(array{
 *     ProcurementPortalPreferenceArn?: string,
 *     Selector?: array{InvoiceUnitArns?: list<string>, SellerOfRecords?: list<string>, ...},
 *     ProcurementPortalSharedSecret?: string,
 *     ProcurementPortalInstanceEndpoint?: string,
 *     TestEnvPreference?: array{
 *         BuyerDomain?: 'NetworkID',
 *         BuyerIdentifier?: string,
 *         SupplierDomain?: 'NetworkID',
 *         SupplierIdentifier?: string,
 *         ProcurementPortalSharedSecret?: string,
 *         ProcurementPortalInstanceEndpoint?: string,
 *         ...,
 *     },
 *     EinvoiceDeliveryEnabled?: bool,
 *     EinvoiceDeliveryPreference?: array{
 *         EinvoiceDeliveryDocumentTypes?: list<'AWS_CLOUD_CREDIT_MEMO'|'AWS_CLOUD_INVOICE'|'AWS_MARKETPLACE_CREDIT_MEMO'|'AWS_MARKETPLACE_INVOICE'|'AWS_REQUEST_FOR_PAYMENT'>,
 *         EinvoiceDeliveryAttachmentTypes?: list<'INVOICE_PDF'|'RFP_PDF'>,
 *         Protocol?: 'CXML',
 *         PurchaseOrderDataSources?: list<array>,
 *         ConnectionTestingMethod?: 'PROD_ENV_DOLLAR_TEST'|'TEST_ENV_REPLAY_TEST',
 *         EinvoiceDeliveryActivationDate?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     PurchaseOrderRetrievalEnabled?: bool,
 *     Contacts?: list<array{Name?: string, Email?: string, ...}>,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result sendProcurementPortalValidation(array $args = [])
 * @phpstan-method \Aws\Result sendProcurementPortalValidation(array{ProcurementPortalPreferenceArn?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendProcurementPortalValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendProcurementPortalValidationAsync(array{ProcurementPortalPreferenceArn?: string, ClientToken?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateInvoiceUnit(array $args = [])
 * @phpstan-method \Aws\Result updateInvoiceUnit(array{
 *     InvoiceUnitArn?: string,
 *     Description?: string,
 *     TaxInheritanceDisabled?: bool,
 *     Rule?: array{LinkedAccounts?: list<string>, BillSourceAccounts?: list<string>, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateInvoiceUnitAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateInvoiceUnitAsync(array{
 *     InvoiceUnitArn?: string,
 *     Description?: string,
 *     TaxInheritanceDisabled?: bool,
 *     Rule?: array{LinkedAccounts?: list<string>, BillSourceAccounts?: list<string>, ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProcurementPortalPreferenceStatus(array $args = [])
 * @phpstan-method \Aws\Result updateProcurementPortalPreferenceStatus(array{
 *     ProcurementPortalPreferenceArn?: string,
 *     EinvoiceDeliveryPreferenceStatus?: 'ACTIVE'|'PENDING_VERIFICATION'|'SUSPENDED'|'TEST_FAILED'|'TEST_INITIALIZATION_FAILED'|'TEST_INITIALIZED'|'VALIDATED',
 *     EinvoiceDeliveryPreferenceStatusReason?: string,
 *     PurchaseOrderRetrievalPreferenceStatus?: 'ACTIVE'|'PENDING_VERIFICATION'|'SUSPENDED'|'TEST_FAILED'|'TEST_INITIALIZATION_FAILED'|'TEST_INITIALIZED'|'VALIDATED',
 *     PurchaseOrderRetrievalPreferenceStatusReason?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProcurementPortalPreferenceStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProcurementPortalPreferenceStatusAsync(array{
 *     ProcurementPortalPreferenceArn?: string,
 *     EinvoiceDeliveryPreferenceStatus?: 'ACTIVE'|'PENDING_VERIFICATION'|'SUSPENDED'|'TEST_FAILED'|'TEST_INITIALIZATION_FAILED'|'TEST_INITIALIZED'|'VALIDATED',
 *     EinvoiceDeliveryPreferenceStatusReason?: string,
 *     PurchaseOrderRetrievalPreferenceStatus?: 'ACTIVE'|'PENDING_VERIFICATION'|'SUSPENDED'|'TEST_FAILED'|'TEST_INITIALIZATION_FAILED'|'TEST_INITIALIZED'|'VALIDATED',
 *     PurchaseOrderRetrievalPreferenceStatusReason?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result verifyProcurementPortalValidation(array $args = [])
 * @phpstan-method \Aws\Result verifyProcurementPortalValidation(array{ProcurementPortalPreferenceArn?: string, Code?: string, ClientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise verifyProcurementPortalValidationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyProcurementPortalValidationAsync(array{ProcurementPortalPreferenceArn?: string, Code?: string, ClientToken?: string, ...} $args = [])
 */
class InvoicingClient extends AwsClient {}
