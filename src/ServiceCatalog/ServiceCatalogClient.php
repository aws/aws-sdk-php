<?php
namespace Aws\ServiceCatalog;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Service Catalog** service.
 * @method \Aws\Result acceptPortfolioShare(array $args = [])
 * @phpstan-method \Aws\Result acceptPortfolioShare(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PortfolioShareType?: 'AWS_ORGANIZATIONS'|'AWS_SERVICECATALOG'|'IMPORTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise acceptPortfolioShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptPortfolioShareAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PortfolioShareType?: 'AWS_ORGANIZATIONS'|'AWS_SERVICECATALOG'|'IMPORTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateBudgetWithResource(array $args = [])
 * @phpstan-method \Aws\Result associateBudgetWithResource(array{BudgetName?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateBudgetWithResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateBudgetWithResourceAsync(array{BudgetName?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result associatePrincipalWithPortfolio(array $args = [])
 * @phpstan-method \Aws\Result associatePrincipalWithPortfolio(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PrincipalARN?: string,
 *     PrincipalType?: 'IAM'|'IAM_PATTERN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePrincipalWithPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associatePrincipalWithPortfolioAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PrincipalARN?: string,
 *     PrincipalType?: 'IAM'|'IAM_PATTERN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateProductWithPortfolio(array $args = [])
 * @phpstan-method \Aws\Result associateProductWithPortfolio(array{AcceptLanguage?: string, ProductId?: string, PortfolioId?: string, SourcePortfolioId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateProductWithPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateProductWithPortfolioAsync(array{AcceptLanguage?: string, ProductId?: string, PortfolioId?: string, SourcePortfolioId?: string, ...} $args = [])
 * @method \Aws\Result associateServiceActionWithProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result associateServiceActionWithProvisioningArtifact(array{
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     ServiceActionId?: string,
 *     AcceptLanguage?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise associateServiceActionWithProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateServiceActionWithProvisioningArtifactAsync(array{
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     ServiceActionId?: string,
 *     AcceptLanguage?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result associateTagOptionWithResource(array $args = [])
 * @phpstan-method \Aws\Result associateTagOptionWithResource(array{ResourceId?: string, TagOptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTagOptionWithResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateTagOptionWithResourceAsync(array{ResourceId?: string, TagOptionId?: string, ...} $args = [])
 * @method \Aws\Result batchAssociateServiceActionWithProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result batchAssociateServiceActionWithProvisioningArtifact(array{
 *     ServiceActionAssociations?: list<array{ServiceActionId?: string, ProductId?: string, ProvisioningArtifactId?: string, ...}>,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateServiceActionWithProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchAssociateServiceActionWithProvisioningArtifactAsync(array{
 *     ServiceActionAssociations?: list<array{ServiceActionId?: string, ProductId?: string, ProvisioningArtifactId?: string, ...}>,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result batchDisassociateServiceActionFromProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result batchDisassociateServiceActionFromProvisioningArtifact(array{
 *     ServiceActionAssociations?: list<array{ServiceActionId?: string, ProductId?: string, ProvisioningArtifactId?: string, ...}>,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateServiceActionFromProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDisassociateServiceActionFromProvisioningArtifactAsync(array{
 *     ServiceActionAssociations?: list<array{ServiceActionId?: string, ProductId?: string, ProvisioningArtifactId?: string, ...}>,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result copyProduct(array $args = [])
 * @phpstan-method \Aws\Result copyProduct(array{
 *     AcceptLanguage?: string,
 *     SourceProductArn?: string,
 *     TargetProductId?: string,
 *     TargetProductName?: string,
 *     SourceProvisioningArtifactIdentifiers?: list<array<string, string>>,
 *     CopyOptions?: list<'CopyTags'>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise copyProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyProductAsync(array{
 *     AcceptLanguage?: string,
 *     SourceProductArn?: string,
 *     TargetProductId?: string,
 *     TargetProductName?: string,
 *     SourceProvisioningArtifactIdentifiers?: list<array<string, string>>,
 *     CopyOptions?: list<'CopyTags'>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createConstraint(array $args = [])
 * @phpstan-method \Aws\Result createConstraint(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     ProductId?: string,
 *     Parameters?: string,
 *     Type?: string,
 *     Description?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createConstraintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConstraintAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     ProductId?: string,
 *     Parameters?: string,
 *     Type?: string,
 *     Description?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortfolio(array $args = [])
 * @phpstan-method \Aws\Result createPortfolio(array{
 *     AcceptLanguage?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     ProviderName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortfolioAsync(array{
 *     AcceptLanguage?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     ProviderName?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createPortfolioShare(array $args = [])
 * @phpstan-method \Aws\Result createPortfolioShare(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     AccountId?: string,
 *     OrganizationNode?: array{Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT', Value?: string, ...},
 *     ShareTagOptions?: bool,
 *     SharePrincipals?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortfolioShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPortfolioShareAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     AccountId?: string,
 *     OrganizationNode?: array{Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT', Value?: string, ...},
 *     ShareTagOptions?: bool,
 *     SharePrincipals?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProduct(array $args = [])
 * @phpstan-method \Aws\Result createProduct(array{
 *     AcceptLanguage?: string,
 *     Name?: string,
 *     Owner?: string,
 *     Description?: string,
 *     Distributor?: string,
 *     SupportDescription?: string,
 *     SupportEmail?: string,
 *     SupportUrl?: string,
 *     ProductType?: 'CLOUD_FORMATION_TEMPLATE'|'EXTERNAL'|'MARKETPLACE'|'TERRAFORM_CLOUD'|'TERRAFORM_OPEN_SOURCE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ProvisioningArtifactParameters?: array{
 *         Name?: string,
 *         Description?: string,
 *         Info?: array<string, string>,
 *         Type?: 'CLOUD_FORMATION_TEMPLATE'|'EXTERNAL'|'MARKETPLACE_AMI'|'MARKETPLACE_CAR'|'TERRAFORM_CLOUD'|'TERRAFORM_OPEN_SOURCE',
 *         DisableTemplateValidation?: bool,
 *         ...,
 *     },
 *     IdempotencyToken?: string,
 *     SourceConnection?: array{Type?: 'CODESTAR', ConnectionParameters?: array{CodeStar?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProductAsync(array{
 *     AcceptLanguage?: string,
 *     Name?: string,
 *     Owner?: string,
 *     Description?: string,
 *     Distributor?: string,
 *     SupportDescription?: string,
 *     SupportEmail?: string,
 *     SupportUrl?: string,
 *     ProductType?: 'CLOUD_FORMATION_TEMPLATE'|'EXTERNAL'|'MARKETPLACE'|'TERRAFORM_CLOUD'|'TERRAFORM_OPEN_SOURCE',
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ProvisioningArtifactParameters?: array{
 *         Name?: string,
 *         Description?: string,
 *         Info?: array<string, string>,
 *         Type?: 'CLOUD_FORMATION_TEMPLATE'|'EXTERNAL'|'MARKETPLACE_AMI'|'MARKETPLACE_CAR'|'TERRAFORM_CLOUD'|'TERRAFORM_OPEN_SOURCE',
 *         DisableTemplateValidation?: bool,
 *         ...,
 *     },
 *     IdempotencyToken?: string,
 *     SourceConnection?: array{Type?: 'CODESTAR', ConnectionParameters?: array{CodeStar?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProvisionedProductPlan(array $args = [])
 * @phpstan-method \Aws\Result createProvisionedProductPlan(array{
 *     AcceptLanguage?: string,
 *     PlanName?: string,
 *     PlanType?: 'CLOUDFORMATION',
 *     NotificationArns?: list<string>,
 *     PathId?: string,
 *     ProductId?: string,
 *     ProvisionedProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningParameters?: list<array{Key?: string, Value?: string, UsePreviousValue?: bool, ...}>,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisionedProductPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisionedProductPlanAsync(array{
 *     AcceptLanguage?: string,
 *     PlanName?: string,
 *     PlanType?: 'CLOUDFORMATION',
 *     NotificationArns?: list<string>,
 *     PathId?: string,
 *     ProductId?: string,
 *     ProvisionedProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningParameters?: list<array{Key?: string, Value?: string, UsePreviousValue?: bool, ...}>,
 *     IdempotencyToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result createProvisioningArtifact(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     Parameters?: array{
 *         Name?: string,
 *         Description?: string,
 *         Info?: array<string, string>,
 *         Type?: 'CLOUD_FORMATION_TEMPLATE'|'EXTERNAL'|'MARKETPLACE_AMI'|'MARKETPLACE_CAR'|'TERRAFORM_CLOUD'|'TERRAFORM_OPEN_SOURCE',
 *         DisableTemplateValidation?: bool,
 *         ...,
 *     },
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProvisioningArtifactAsync(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     Parameters?: array{
 *         Name?: string,
 *         Description?: string,
 *         Info?: array<string, string>,
 *         Type?: 'CLOUD_FORMATION_TEMPLATE'|'EXTERNAL'|'MARKETPLACE_AMI'|'MARKETPLACE_CAR'|'TERRAFORM_CLOUD'|'TERRAFORM_OPEN_SOURCE',
 *         DisableTemplateValidation?: bool,
 *         ...,
 *     },
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createServiceAction(array $args = [])
 * @phpstan-method \Aws\Result createServiceAction(array{
 *     Name?: string,
 *     DefinitionType?: 'SSM_AUTOMATION',
 *     Definition?: array<string, string>,
 *     Description?: string,
 *     AcceptLanguage?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createServiceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createServiceActionAsync(array{
 *     Name?: string,
 *     DefinitionType?: 'SSM_AUTOMATION',
 *     Definition?: array<string, string>,
 *     Description?: string,
 *     AcceptLanguage?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createTagOption(array $args = [])
 * @phpstan-method \Aws\Result createTagOption(array{Key?: string, Value?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createTagOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagOptionAsync(array{Key?: string, Value?: string, ...} $args = [])
 * @method \Aws\Result deleteConstraint(array $args = [])
 * @phpstan-method \Aws\Result deleteConstraint(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteConstraintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConstraintAsync(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result deletePortfolio(array $args = [])
 * @phpstan-method \Aws\Result deletePortfolio(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortfolioAsync(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result deletePortfolioShare(array $args = [])
 * @phpstan-method \Aws\Result deletePortfolioShare(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     AccountId?: string,
 *     OrganizationNode?: array{Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT', Value?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortfolioShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePortfolioShareAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     AccountId?: string,
 *     OrganizationNode?: array{Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT', Value?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteProduct(array $args = [])
 * @phpstan-method \Aws\Result deleteProduct(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProductAsync(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result deleteProvisionedProductPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisionedProductPlan(array{AcceptLanguage?: string, PlanId?: string, IgnoreErrors?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisionedProductPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisionedProductPlanAsync(array{AcceptLanguage?: string, PlanId?: string, IgnoreErrors?: bool, ...} $args = [])
 * @method \Aws\Result deleteProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result deleteProvisioningArtifact(array{AcceptLanguage?: string, ProductId?: string, ProvisioningArtifactId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProvisioningArtifactAsync(array{AcceptLanguage?: string, ProductId?: string, ProvisioningArtifactId?: string, ...} $args = [])
 * @method \Aws\Result deleteServiceAction(array $args = [])
 * @phpstan-method \Aws\Result deleteServiceAction(array{Id?: string, AcceptLanguage?: string, IdempotencyToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteServiceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteServiceActionAsync(array{Id?: string, AcceptLanguage?: string, IdempotencyToken?: string, ...} $args = [])
 * @method \Aws\Result deleteTagOption(array $args = [])
 * @phpstan-method \Aws\Result deleteTagOption(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTagOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagOptionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result describeConstraint(array $args = [])
 * @phpstan-method \Aws\Result describeConstraint(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeConstraintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConstraintAsync(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result describeCopyProductStatus(array $args = [])
 * @phpstan-method \Aws\Result describeCopyProductStatus(array{AcceptLanguage?: string, CopyProductToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeCopyProductStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCopyProductStatusAsync(array{AcceptLanguage?: string, CopyProductToken?: string, ...} $args = [])
 * @method \Aws\Result describePortfolio(array $args = [])
 * @phpstan-method \Aws\Result describePortfolio(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePortfolioAsync(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result describePortfolioShareStatus(array $args = [])
 * @phpstan-method \Aws\Result describePortfolioShareStatus(array{PortfolioShareToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describePortfolioShareStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePortfolioShareStatusAsync(array{PortfolioShareToken?: string, ...} $args = [])
 * @method \Aws\Result describePortfolioShares(array $args = [])
 * @phpstan-method \Aws\Result describePortfolioShares(array{
 *     PortfolioId?: string,
 *     Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT'|'ORGANIZATION_MEMBER_ACCOUNT',
 *     PageToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describePortfolioSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePortfolioSharesAsync(array{
 *     PortfolioId?: string,
 *     Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT'|'ORGANIZATION_MEMBER_ACCOUNT',
 *     PageToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeProduct(array $args = [])
 * @phpstan-method \Aws\Result describeProduct(array{AcceptLanguage?: string, Id?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProductAsync(array{AcceptLanguage?: string, Id?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result describeProductAsAdmin(array $args = [])
 * @phpstan-method \Aws\Result describeProductAsAdmin(array{AcceptLanguage?: string, Id?: string, Name?: string, SourcePortfolioId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductAsAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProductAsAdminAsync(array{AcceptLanguage?: string, Id?: string, Name?: string, SourcePortfolioId?: string, ...} $args = [])
 * @method \Aws\Result describeProductView(array $args = [])
 * @phpstan-method \Aws\Result describeProductView(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProductViewAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProductViewAsync(array{AcceptLanguage?: string, Id?: string, ...} $args = [])
 * @method \Aws\Result describeProvisionedProduct(array $args = [])
 * @phpstan-method \Aws\Result describeProvisionedProduct(array{AcceptLanguage?: string, Id?: string, Name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisionedProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProvisionedProductAsync(array{AcceptLanguage?: string, Id?: string, Name?: string, ...} $args = [])
 * @method \Aws\Result describeProvisionedProductPlan(array $args = [])
 * @phpstan-method \Aws\Result describeProvisionedProductPlan(array{AcceptLanguage?: string, PlanId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisionedProductPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProvisionedProductPlanAsync(array{AcceptLanguage?: string, PlanId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \Aws\Result describeProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result describeProvisioningArtifact(array{
 *     AcceptLanguage?: string,
 *     ProvisioningArtifactId?: string,
 *     ProductId?: string,
 *     ProvisioningArtifactName?: string,
 *     ProductName?: string,
 *     Verbose?: bool,
 *     IncludeProvisioningArtifactParameters?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProvisioningArtifactAsync(array{
 *     AcceptLanguage?: string,
 *     ProvisioningArtifactId?: string,
 *     ProductId?: string,
 *     ProvisioningArtifactName?: string,
 *     ProductName?: string,
 *     Verbose?: bool,
 *     IncludeProvisioningArtifactParameters?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeProvisioningParameters(array $args = [])
 * @phpstan-method \Aws\Result describeProvisioningParameters(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningArtifactName?: string,
 *     PathId?: string,
 *     PathName?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProvisioningParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProvisioningParametersAsync(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningArtifactName?: string,
 *     PathId?: string,
 *     PathName?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result describeRecord(array $args = [])
 * @phpstan-method \Aws\Result describeRecord(array{AcceptLanguage?: string, Id?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRecordAsync(array{AcceptLanguage?: string, Id?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result describeServiceAction(array $args = [])
 * @phpstan-method \Aws\Result describeServiceAction(array{Id?: string, AcceptLanguage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceActionAsync(array{Id?: string, AcceptLanguage?: string, ...} $args = [])
 * @method \Aws\Result describeServiceActionExecutionParameters(array $args = [])
 * @phpstan-method \Aws\Result describeServiceActionExecutionParameters(array{ProvisionedProductId?: string, ServiceActionId?: string, AcceptLanguage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeServiceActionExecutionParametersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeServiceActionExecutionParametersAsync(array{ProvisionedProductId?: string, ServiceActionId?: string, AcceptLanguage?: string, ...} $args = [])
 * @method \Aws\Result describeTagOption(array $args = [])
 * @phpstan-method \Aws\Result describeTagOption(array{Id?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTagOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagOptionAsync(array{Id?: string, ...} $args = [])
 * @method \Aws\Result disableAWSOrganizationsAccess(array $args = [])
 * @phpstan-method \Aws\Result disableAWSOrganizationsAccess(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableAWSOrganizationsAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableAWSOrganizationsAccessAsync(array{...} $args = [])
 * @method \Aws\Result disassociateBudgetFromResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateBudgetFromResource(array{BudgetName?: string, ResourceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateBudgetFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateBudgetFromResourceAsync(array{BudgetName?: string, ResourceId?: string, ...} $args = [])
 * @method \Aws\Result disassociatePrincipalFromPortfolio(array $args = [])
 * @phpstan-method \Aws\Result disassociatePrincipalFromPortfolio(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PrincipalARN?: string,
 *     PrincipalType?: 'IAM'|'IAM_PATTERN',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePrincipalFromPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociatePrincipalFromPortfolioAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PrincipalARN?: string,
 *     PrincipalType?: 'IAM'|'IAM_PATTERN',
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateProductFromPortfolio(array $args = [])
 * @phpstan-method \Aws\Result disassociateProductFromPortfolio(array{AcceptLanguage?: string, ProductId?: string, PortfolioId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateProductFromPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateProductFromPortfolioAsync(array{AcceptLanguage?: string, ProductId?: string, PortfolioId?: string, ...} $args = [])
 * @method \Aws\Result disassociateServiceActionFromProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result disassociateServiceActionFromProvisioningArtifact(array{
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     ServiceActionId?: string,
 *     AcceptLanguage?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateServiceActionFromProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateServiceActionFromProvisioningArtifactAsync(array{
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     ServiceActionId?: string,
 *     AcceptLanguage?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result disassociateTagOptionFromResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateTagOptionFromResource(array{ResourceId?: string, TagOptionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTagOptionFromResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateTagOptionFromResourceAsync(array{ResourceId?: string, TagOptionId?: string, ...} $args = [])
 * @method \Aws\Result enableAWSOrganizationsAccess(array $args = [])
 * @phpstan-method \Aws\Result enableAWSOrganizationsAccess(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise enableAWSOrganizationsAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableAWSOrganizationsAccessAsync(array{...} $args = [])
 * @method \Aws\Result executeProvisionedProductPlan(array $args = [])
 * @phpstan-method \Aws\Result executeProvisionedProductPlan(array{AcceptLanguage?: string, PlanId?: string, IdempotencyToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise executeProvisionedProductPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeProvisionedProductPlanAsync(array{AcceptLanguage?: string, PlanId?: string, IdempotencyToken?: string, ...} $args = [])
 * @method \Aws\Result executeProvisionedProductServiceAction(array $args = [])
 * @phpstan-method \Aws\Result executeProvisionedProductServiceAction(array{
 *     ProvisionedProductId?: string,
 *     ServiceActionId?: string,
 *     ExecuteToken?: string,
 *     AcceptLanguage?: string,
 *     Parameters?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise executeProvisionedProductServiceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise executeProvisionedProductServiceActionAsync(array{
 *     ProvisionedProductId?: string,
 *     ServiceActionId?: string,
 *     ExecuteToken?: string,
 *     AcceptLanguage?: string,
 *     Parameters?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getAWSOrganizationsAccessStatus(array $args = [])
 * @phpstan-method \Aws\Result getAWSOrganizationsAccessStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAWSOrganizationsAccessStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAWSOrganizationsAccessStatusAsync(array{...} $args = [])
 * @method \Aws\Result getProvisionedProductOutputs(array $args = [])
 * @phpstan-method \Aws\Result getProvisionedProductOutputs(array{
 *     AcceptLanguage?: string,
 *     ProvisionedProductId?: string,
 *     ProvisionedProductName?: string,
 *     OutputKeys?: list<string>,
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise getProvisionedProductOutputsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProvisionedProductOutputsAsync(array{
 *     AcceptLanguage?: string,
 *     ProvisionedProductId?: string,
 *     ProvisionedProductName?: string,
 *     OutputKeys?: list<string>,
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result importAsProvisionedProduct(array $args = [])
 * @phpstan-method \Aws\Result importAsProvisionedProduct(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisionedProductName?: string,
 *     PhysicalId?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise importAsProvisionedProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importAsProvisionedProductAsync(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisionedProductName?: string,
 *     PhysicalId?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listAcceptedPortfolioShares(array $args = [])
 * @phpstan-method \Aws\Result listAcceptedPortfolioShares(array{
 *     AcceptLanguage?: string,
 *     PageToken?: string,
 *     PageSize?: int,
 *     PortfolioShareType?: 'AWS_ORGANIZATIONS'|'AWS_SERVICECATALOG'|'IMPORTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listAcceptedPortfolioSharesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAcceptedPortfolioSharesAsync(array{
 *     AcceptLanguage?: string,
 *     PageToken?: string,
 *     PageSize?: int,
 *     PortfolioShareType?: 'AWS_ORGANIZATIONS'|'AWS_SERVICECATALOG'|'IMPORTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result listBudgetsForResource(array $args = [])
 * @phpstan-method \Aws\Result listBudgetsForResource(array{AcceptLanguage?: string, ResourceId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBudgetsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBudgetsForResourceAsync(array{AcceptLanguage?: string, ResourceId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \Aws\Result listConstraintsForPortfolio(array $args = [])
 * @phpstan-method \Aws\Result listConstraintsForPortfolio(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     ProductId?: string,
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listConstraintsForPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConstraintsForPortfolioAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     ProductId?: string,
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLaunchPaths(array $args = [])
 * @phpstan-method \Aws\Result listLaunchPaths(array{AcceptLanguage?: string, ProductId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLaunchPathsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLaunchPathsAsync(array{AcceptLanguage?: string, ProductId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \Aws\Result listOrganizationPortfolioAccess(array $args = [])
 * @phpstan-method \Aws\Result listOrganizationPortfolioAccess(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     OrganizationNodeType?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT',
 *     PageToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listOrganizationPortfolioAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOrganizationPortfolioAccessAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     OrganizationNodeType?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT',
 *     PageToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPortfolioAccess(array $args = [])
 * @phpstan-method \Aws\Result listPortfolioAccess(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     OrganizationParentId?: string,
 *     PageToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortfolioAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortfolioAccessAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     OrganizationParentId?: string,
 *     PageToken?: string,
 *     PageSize?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listPortfolios(array $args = [])
 * @phpstan-method \Aws\Result listPortfolios(array{AcceptLanguage?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortfoliosAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortfoliosAsync(array{AcceptLanguage?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listPortfoliosForProduct(array $args = [])
 * @phpstan-method \Aws\Result listPortfoliosForProduct(array{AcceptLanguage?: string, ProductId?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortfoliosForProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPortfoliosForProductAsync(array{AcceptLanguage?: string, ProductId?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listPrincipalsForPortfolio(array $args = [])
 * @phpstan-method \Aws\Result listPrincipalsForPortfolio(array{AcceptLanguage?: string, PortfolioId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listPrincipalsForPortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPrincipalsForPortfolioAsync(array{AcceptLanguage?: string, PortfolioId?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \Aws\Result listProvisionedProductPlans(array $args = [])
 * @phpstan-method \Aws\Result listProvisionedProductPlans(array{
 *     AcceptLanguage?: string,
 *     ProvisionProductId?: string,
 *     PageSize?: int,
 *     PageToken?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisionedProductPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisionedProductPlansAsync(array{
 *     AcceptLanguage?: string,
 *     ProvisionProductId?: string,
 *     PageSize?: int,
 *     PageToken?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result listProvisioningArtifacts(array $args = [])
 * @phpstan-method \Aws\Result listProvisioningArtifacts(array{AcceptLanguage?: string, ProductId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisioningArtifactsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisioningArtifactsAsync(array{AcceptLanguage?: string, ProductId?: string, ...} $args = [])
 * @method \Aws\Result listProvisioningArtifactsForServiceAction(array $args = [])
 * @phpstan-method \Aws\Result listProvisioningArtifactsForServiceAction(array{ServiceActionId?: string, PageSize?: int, PageToken?: string, AcceptLanguage?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listProvisioningArtifactsForServiceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProvisioningArtifactsForServiceActionAsync(array{ServiceActionId?: string, PageSize?: int, PageToken?: string, AcceptLanguage?: string, ...} $args = [])
 * @method \Aws\Result listRecordHistory(array $args = [])
 * @phpstan-method \Aws\Result listRecordHistory(array{
 *     AcceptLanguage?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     SearchFilter?: array{Key?: string, Value?: string, ...},
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listRecordHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecordHistoryAsync(array{
 *     AcceptLanguage?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     SearchFilter?: array{Key?: string, Value?: string, ...},
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listResourcesForTagOption(array $args = [])
 * @phpstan-method \Aws\Result listResourcesForTagOption(array{TagOptionId?: string, ResourceType?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listResourcesForTagOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesForTagOptionAsync(array{TagOptionId?: string, ResourceType?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceActions(array $args = [])
 * @phpstan-method \Aws\Result listServiceActions(array{AcceptLanguage?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceActionsAsync(array{AcceptLanguage?: string, PageSize?: int, PageToken?: string, ...} $args = [])
 * @method \Aws\Result listServiceActionsForProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result listServiceActionsForProvisioningArtifact(array{
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     PageSize?: int,
 *     PageToken?: string,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listServiceActionsForProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServiceActionsForProvisioningArtifactAsync(array{
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     PageSize?: int,
 *     PageToken?: string,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listStackInstancesForProvisionedProduct(array $args = [])
 * @phpstan-method \Aws\Result listStackInstancesForProvisionedProduct(array{AcceptLanguage?: string, ProvisionedProductId?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listStackInstancesForProvisionedProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStackInstancesForProvisionedProductAsync(array{AcceptLanguage?: string, ProvisionedProductId?: string, PageToken?: string, PageSize?: int, ...} $args = [])
 * @method \Aws\Result listTagOptions(array $args = [])
 * @phpstan-method \Aws\Result listTagOptions(array{
 *     Filters?: array{Key?: string, Value?: string, Active?: bool, ...},
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagOptionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagOptionsAsync(array{
 *     Filters?: array{Key?: string, Value?: string, Active?: bool, ...},
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result notifyProvisionProductEngineWorkflowResult(array $args = [])
 * @phpstan-method \Aws\Result notifyProvisionProductEngineWorkflowResult(array{
 *     WorkflowToken?: string,
 *     RecordId?: string,
 *     Status?: 'FAILED'|'SUCCEEDED',
 *     FailureReason?: string,
 *     ResourceIdentifier?: array{UniqueTag?: array{Key?: string, Value?: string, ...}, ...},
 *     Outputs?: list<array{OutputKey?: string, OutputValue?: string, Description?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyProvisionProductEngineWorkflowResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyProvisionProductEngineWorkflowResultAsync(array{
 *     WorkflowToken?: string,
 *     RecordId?: string,
 *     Status?: 'FAILED'|'SUCCEEDED',
 *     FailureReason?: string,
 *     ResourceIdentifier?: array{UniqueTag?: array{Key?: string, Value?: string, ...}, ...},
 *     Outputs?: list<array{OutputKey?: string, OutputValue?: string, Description?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result notifyTerminateProvisionedProductEngineWorkflowResult(array $args = [])
 * @phpstan-method \Aws\Result notifyTerminateProvisionedProductEngineWorkflowResult(array{
 *     WorkflowToken?: string,
 *     RecordId?: string,
 *     Status?: 'FAILED'|'SUCCEEDED',
 *     FailureReason?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyTerminateProvisionedProductEngineWorkflowResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyTerminateProvisionedProductEngineWorkflowResultAsync(array{
 *     WorkflowToken?: string,
 *     RecordId?: string,
 *     Status?: 'FAILED'|'SUCCEEDED',
 *     FailureReason?: string,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result notifyUpdateProvisionedProductEngineWorkflowResult(array $args = [])
 * @phpstan-method \Aws\Result notifyUpdateProvisionedProductEngineWorkflowResult(array{
 *     WorkflowToken?: string,
 *     RecordId?: string,
 *     Status?: 'FAILED'|'SUCCEEDED',
 *     FailureReason?: string,
 *     Outputs?: list<array{OutputKey?: string, OutputValue?: string, Description?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise notifyUpdateProvisionedProductEngineWorkflowResultAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise notifyUpdateProvisionedProductEngineWorkflowResultAsync(array{
 *     WorkflowToken?: string,
 *     RecordId?: string,
 *     Status?: 'FAILED'|'SUCCEEDED',
 *     FailureReason?: string,
 *     Outputs?: list<array{OutputKey?: string, OutputValue?: string, Description?: string, ...}>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result provisionProduct(array $args = [])
 * @phpstan-method \Aws\Result provisionProduct(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningArtifactName?: string,
 *     PathId?: string,
 *     PathName?: string,
 *     ProvisionedProductName?: string,
 *     ProvisioningParameters?: list<array{Key?: string, Value?: string, ...}>,
 *     ProvisioningPreferences?: array{
 *         StackSetAccounts?: list<string>,
 *         StackSetRegions?: list<string>,
 *         StackSetFailureToleranceCount?: int,
 *         StackSetFailureTolerancePercentage?: int,
 *         StackSetMaxConcurrencyCount?: int,
 *         StackSetMaxConcurrencyPercentage?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NotificationArns?: list<string>,
 *     ProvisionToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise provisionProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise provisionProductAsync(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningArtifactName?: string,
 *     PathId?: string,
 *     PathName?: string,
 *     ProvisionedProductName?: string,
 *     ProvisioningParameters?: list<array{Key?: string, Value?: string, ...}>,
 *     ProvisioningPreferences?: array{
 *         StackSetAccounts?: list<string>,
 *         StackSetRegions?: list<string>,
 *         StackSetFailureToleranceCount?: int,
 *         StackSetFailureTolerancePercentage?: int,
 *         StackSetMaxConcurrencyCount?: int,
 *         StackSetMaxConcurrencyPercentage?: int,
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     NotificationArns?: list<string>,
 *     ProvisionToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectPortfolioShare(array $args = [])
 * @phpstan-method \Aws\Result rejectPortfolioShare(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PortfolioShareType?: 'AWS_ORGANIZATIONS'|'AWS_SERVICECATALOG'|'IMPORTED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectPortfolioShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectPortfolioShareAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     PortfolioShareType?: 'AWS_ORGANIZATIONS'|'AWS_SERVICECATALOG'|'IMPORTED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result scanProvisionedProducts(array $args = [])
 * @phpstan-method \Aws\Result scanProvisionedProducts(array{
 *     AcceptLanguage?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise scanProvisionedProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise scanProvisionedProductsAsync(array{
 *     AcceptLanguage?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchProducts(array $args = [])
 * @phpstan-method \Aws\Result searchProducts(array{
 *     AcceptLanguage?: string,
 *     Filters?: array<string, list<string>>,
 *     PageSize?: int,
 *     SortBy?: 'CreationDate'|'Title'|'VersionCount',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchProductsAsync(array{
 *     AcceptLanguage?: string,
 *     Filters?: array<string, list<string>>,
 *     PageSize?: int,
 *     SortBy?: 'CreationDate'|'Title'|'VersionCount',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchProductsAsAdmin(array $args = [])
 * @phpstan-method \Aws\Result searchProductsAsAdmin(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     Filters?: array<string, list<string>>,
 *     SortBy?: 'CreationDate'|'Title'|'VersionCount',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     PageToken?: string,
 *     PageSize?: int,
 *     ProductSource?: 'ACCOUNT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchProductsAsAdminAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchProductsAsAdminAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     Filters?: array<string, list<string>>,
 *     SortBy?: 'CreationDate'|'Title'|'VersionCount',
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     PageToken?: string,
 *     PageSize?: int,
 *     ProductSource?: 'ACCOUNT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result searchProvisionedProducts(array $args = [])
 * @phpstan-method \Aws\Result searchProvisionedProducts(array{
 *     AcceptLanguage?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     Filters?: array<string, list<string>>,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise searchProvisionedProductsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchProvisionedProductsAsync(array{
 *     AcceptLanguage?: string,
 *     AccessLevelFilter?: array{Key?: 'Account'|'Role'|'User', Value?: string, ...},
 *     Filters?: array<string, list<string>>,
 *     SortBy?: string,
 *     SortOrder?: 'ASCENDING'|'DESCENDING',
 *     PageSize?: int,
 *     PageToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result terminateProvisionedProduct(array $args = [])
 * @phpstan-method \Aws\Result terminateProvisionedProduct(array{
 *     ProvisionedProductName?: string,
 *     ProvisionedProductId?: string,
 *     TerminateToken?: string,
 *     IgnoreErrors?: bool,
 *     AcceptLanguage?: string,
 *     RetainPhysicalResources?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise terminateProvisionedProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise terminateProvisionedProductAsync(array{
 *     ProvisionedProductName?: string,
 *     ProvisionedProductId?: string,
 *     TerminateToken?: string,
 *     IgnoreErrors?: bool,
 *     AcceptLanguage?: string,
 *     RetainPhysicalResources?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateConstraint(array $args = [])
 * @phpstan-method \Aws\Result updateConstraint(array{AcceptLanguage?: string, Id?: string, Description?: string, Parameters?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateConstraintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConstraintAsync(array{AcceptLanguage?: string, Id?: string, Description?: string, Parameters?: string, ...} $args = [])
 * @method \Aws\Result updatePortfolio(array $args = [])
 * @phpstan-method \Aws\Result updatePortfolio(array{
 *     AcceptLanguage?: string,
 *     Id?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     ProviderName?: string,
 *     AddTags?: list<array{Key?: string, Value?: string, ...}>,
 *     RemoveTags?: list<string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortfolioAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortfolioAsync(array{
 *     AcceptLanguage?: string,
 *     Id?: string,
 *     DisplayName?: string,
 *     Description?: string,
 *     ProviderName?: string,
 *     AddTags?: list<array{Key?: string, Value?: string, ...}>,
 *     RemoveTags?: list<string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updatePortfolioShare(array $args = [])
 * @phpstan-method \Aws\Result updatePortfolioShare(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     AccountId?: string,
 *     OrganizationNode?: array{Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT', Value?: string, ...},
 *     ShareTagOptions?: bool,
 *     SharePrincipals?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortfolioShareAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePortfolioShareAsync(array{
 *     AcceptLanguage?: string,
 *     PortfolioId?: string,
 *     AccountId?: string,
 *     OrganizationNode?: array{Type?: 'ACCOUNT'|'ORGANIZATION'|'ORGANIZATIONAL_UNIT', Value?: string, ...},
 *     ShareTagOptions?: bool,
 *     SharePrincipals?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProduct(array $args = [])
 * @phpstan-method \Aws\Result updateProduct(array{
 *     AcceptLanguage?: string,
 *     Id?: string,
 *     Name?: string,
 *     Owner?: string,
 *     Description?: string,
 *     Distributor?: string,
 *     SupportDescription?: string,
 *     SupportEmail?: string,
 *     SupportUrl?: string,
 *     AddTags?: list<array{Key?: string, Value?: string, ...}>,
 *     RemoveTags?: list<string>,
 *     SourceConnection?: array{Type?: 'CODESTAR', ConnectionParameters?: array{CodeStar?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProductAsync(array{
 *     AcceptLanguage?: string,
 *     Id?: string,
 *     Name?: string,
 *     Owner?: string,
 *     Description?: string,
 *     Distributor?: string,
 *     SupportDescription?: string,
 *     SupportEmail?: string,
 *     SupportUrl?: string,
 *     AddTags?: list<array{Key?: string, Value?: string, ...}>,
 *     RemoveTags?: list<string>,
 *     SourceConnection?: array{Type?: 'CODESTAR', ConnectionParameters?: array{CodeStar?: array, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProvisionedProduct(array $args = [])
 * @phpstan-method \Aws\Result updateProvisionedProduct(array{
 *     AcceptLanguage?: string,
 *     ProvisionedProductName?: string,
 *     ProvisionedProductId?: string,
 *     ProductId?: string,
 *     ProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningArtifactName?: string,
 *     PathId?: string,
 *     PathName?: string,
 *     ProvisioningParameters?: list<array{Key?: string, Value?: string, UsePreviousValue?: bool, ...}>,
 *     ProvisioningPreferences?: array{
 *         StackSetAccounts?: list<string>,
 *         StackSetRegions?: list<string>,
 *         StackSetFailureToleranceCount?: int,
 *         StackSetFailureTolerancePercentage?: int,
 *         StackSetMaxConcurrencyCount?: int,
 *         StackSetMaxConcurrencyPercentage?: int,
 *         StackSetOperationType?: 'CREATE'|'DELETE'|'UPDATE',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisionedProductAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProvisionedProductAsync(array{
 *     AcceptLanguage?: string,
 *     ProvisionedProductName?: string,
 *     ProvisionedProductId?: string,
 *     ProductId?: string,
 *     ProductName?: string,
 *     ProvisioningArtifactId?: string,
 *     ProvisioningArtifactName?: string,
 *     PathId?: string,
 *     PathName?: string,
 *     ProvisioningParameters?: list<array{Key?: string, Value?: string, UsePreviousValue?: bool, ...}>,
 *     ProvisioningPreferences?: array{
 *         StackSetAccounts?: list<string>,
 *         StackSetRegions?: list<string>,
 *         StackSetFailureToleranceCount?: int,
 *         StackSetFailureTolerancePercentage?: int,
 *         StackSetMaxConcurrencyCount?: int,
 *         StackSetMaxConcurrencyPercentage?: int,
 *         StackSetOperationType?: 'CREATE'|'DELETE'|'UPDATE',
 *         ...,
 *     },
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     UpdateToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProvisionedProductProperties(array $args = [])
 * @phpstan-method \Aws\Result updateProvisionedProductProperties(array{
 *     AcceptLanguage?: string,
 *     ProvisionedProductId?: string,
 *     ProvisionedProductProperties?: array<string, string>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisionedProductPropertiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProvisionedProductPropertiesAsync(array{
 *     AcceptLanguage?: string,
 *     ProvisionedProductId?: string,
 *     ProvisionedProductProperties?: array<string, string>,
 *     IdempotencyToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateProvisioningArtifact(array $args = [])
 * @phpstan-method \Aws\Result updateProvisioningArtifact(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Active?: bool,
 *     Guidance?: 'DEFAULT'|'DEPRECATED',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProvisioningArtifactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProvisioningArtifactAsync(array{
 *     AcceptLanguage?: string,
 *     ProductId?: string,
 *     ProvisioningArtifactId?: string,
 *     Name?: string,
 *     Description?: string,
 *     Active?: bool,
 *     Guidance?: 'DEFAULT'|'DEPRECATED',
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateServiceAction(array $args = [])
 * @phpstan-method \Aws\Result updateServiceAction(array{
 *     Id?: string,
 *     Name?: string,
 *     Definition?: array<string, string>,
 *     Description?: string,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateServiceActionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceActionAsync(array{
 *     Id?: string,
 *     Name?: string,
 *     Definition?: array<string, string>,
 *     Description?: string,
 *     AcceptLanguage?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateTagOption(array $args = [])
 * @phpstan-method \Aws\Result updateTagOption(array{Id?: string, Value?: string, Active?: bool, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateTagOptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateTagOptionAsync(array{Id?: string, Value?: string, Active?: bool, ...} $args = [])
 */
class ServiceCatalogClient extends AwsClient {}
