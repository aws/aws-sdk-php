<?php
namespace Aws\PrometheusService;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Prometheus Service** service.
 * @method \Aws\Result createAlertManagerDefinition(array $args = [])
 * @phpstan-method \Aws\Result createAlertManagerDefinition(array{
 *     workspaceId?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAlertManagerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAlertManagerDefinitionAsync(array{
 *     workspaceId?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result createAnomalyDetector(array{
 *     workspaceId?: string,
 *     alias?: string,
 *     evaluationIntervalInSeconds?: int,
 *     missingDataAction?: array{markAsAnomaly?: bool, skip?: bool, ...},
 *     configuration?: array{
 *         randomCutForest?: array{
 *             query?: string,
 *             shingleSize?: int,
 *             sampleSize?: int,
 *             ignoreNearExpectedFromAbove?: array,
 *             ignoreNearExpectedFromBelow?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     labels?: array<string, string>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAnomalyDetectorAsync(array{
 *     workspaceId?: string,
 *     alias?: string,
 *     evaluationIntervalInSeconds?: int,
 *     missingDataAction?: array{markAsAnomaly?: bool, skip?: bool, ...},
 *     configuration?: array{
 *         randomCutForest?: array{
 *             query?: string,
 *             shingleSize?: int,
 *             sampleSize?: int,
 *             ignoreNearExpectedFromAbove?: array,
 *             ignoreNearExpectedFromBelow?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     labels?: array<string, string>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createLoggingConfiguration(array{workspaceId?: string, logGroupArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLoggingConfigurationAsync(array{workspaceId?: string, logGroupArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result createQueryLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createQueryLoggingConfiguration(array{
 *     workspaceId?: string,
 *     destinations?: list<array{cloudWatchLogs?: array, filters?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createQueryLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createQueryLoggingConfigurationAsync(array{
 *     workspaceId?: string,
 *     destinations?: list<array{cloudWatchLogs?: array, filters?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createRuleGroupsNamespace(array $args = [])
 * @phpstan-method \Aws\Result createRuleGroupsNamespace(array{
 *     workspaceId?: string,
 *     name?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleGroupsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRuleGroupsNamespaceAsync(array{
 *     workspaceId?: string,
 *     name?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createScraper(array $args = [])
 * @phpstan-method \Aws\Result createScraper(array{
 *     alias?: string,
 *     scrapeConfiguration?: array{configurationBlob?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     source?: array{
 *         eksConfiguration?: array{clusterArn?: string, securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *         vpcConfiguration?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *         ...,
 *     },
 *     destination?: array{
 *         ampConfiguration?: array{workspaceArn?: string, ...},
 *         cloudWatchConfiguration?: array{datasetArn?: string, ...},
 *         ...,
 *     },
 *     roleConfiguration?: array{sourceRoleArn?: string, targetRoleArn?: string, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createScraperAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScraperAsync(array{
 *     alias?: string,
 *     scrapeConfiguration?: array{configurationBlob?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     source?: array{
 *         eksConfiguration?: array{clusterArn?: string, securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *         vpcConfiguration?: array{securityGroupIds?: list<string>, subnetIds?: list<string>, ...},
 *         ...,
 *     },
 *     destination?: array{
 *         ampConfiguration?: array{workspaceArn?: string, ...},
 *         cloudWatchConfiguration?: array{datasetArn?: string, ...},
 *         ...,
 *     },
 *     roleConfiguration?: array{sourceRoleArn?: string, targetRoleArn?: string, ...},
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result createWorkspace(array $args = [])
 * @phpstan-method \Aws\Result createWorkspace(array{alias?: string, clientToken?: string, tags?: array<string, string>, kmsKeyArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkspaceAsync(array{alias?: string, clientToken?: string, tags?: array<string, string>, kmsKeyArn?: string, ...} $args = [])
 * @method \Aws\Result deleteAlertManagerDefinition(array $args = [])
 * @phpstan-method \Aws\Result deleteAlertManagerDefinition(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAlertManagerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlertManagerDefinitionAsync(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result deleteAnomalyDetector(array{workspaceId?: string, anomalyDetectorId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAnomalyDetectorAsync(array{workspaceId?: string, anomalyDetectorId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteLoggingConfiguration(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteQueryLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteQueryLoggingConfiguration(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteQueryLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteQueryLoggingConfigurationAsync(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{workspaceId?: string, clientToken?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{workspaceId?: string, clientToken?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result deleteRuleGroupsNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteRuleGroupsNamespace(array{workspaceId?: string, name?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleGroupsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRuleGroupsNamespaceAsync(array{workspaceId?: string, name?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteScraper(array $args = [])
 * @phpstan-method \Aws\Result deleteScraper(array{scraperId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScraperAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScraperAsync(array{scraperId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteScraperLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteScraperLoggingConfiguration(array{scraperId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteScraperLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScraperLoggingConfigurationAsync(array{scraperId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result deleteWorkspace(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkspace(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array{workspaceId?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result describeAlertManagerDefinition(array $args = [])
 * @phpstan-method \Aws\Result describeAlertManagerDefinition(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAlertManagerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAlertManagerDefinitionAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result describeAnomalyDetector(array{workspaceId?: string, anomalyDetectorId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAnomalyDetectorAsync(array{workspaceId?: string, anomalyDetectorId?: string, ...} $args = [])
 * @method \Aws\Result describeLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeLoggingConfiguration(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLoggingConfigurationAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeQueryLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeQueryLoggingConfiguration(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeQueryLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeQueryLoggingConfigurationAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result describeResourcePolicy(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeResourcePolicyAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeRuleGroupsNamespace(array $args = [])
 * @phpstan-method \Aws\Result describeRuleGroupsNamespace(array{workspaceId?: string, name?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeRuleGroupsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRuleGroupsNamespaceAsync(array{workspaceId?: string, name?: string, ...} $args = [])
 * @method \Aws\Result describeScraper(array $args = [])
 * @phpstan-method \Aws\Result describeScraper(array{scraperId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScraperAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScraperAsync(array{scraperId?: string, ...} $args = [])
 * @method \Aws\Result describeScraperLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeScraperLoggingConfiguration(array{scraperId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeScraperLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScraperLoggingConfigurationAsync(array{scraperId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspace(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspace(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result describeWorkspaceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeWorkspaceConfiguration(array{workspaceId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise describeWorkspaceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkspaceConfigurationAsync(array{workspaceId?: string, ...} $args = [])
 * @method \Aws\Result getDefaultScraperConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getDefaultScraperConfiguration(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDefaultScraperConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDefaultScraperConfigurationAsync(array{...} $args = [])
 * @method \Aws\Result listAnomalyDetectors(array $args = [])
 * @phpstan-method \Aws\Result listAnomalyDetectors(array{workspaceId?: string, alias?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAnomalyDetectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAnomalyDetectorsAsync(array{workspaceId?: string, alias?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \Aws\Result listRuleGroupsNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listRuleGroupsNamespaces(array{workspaceId?: string, name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listRuleGroupsNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRuleGroupsNamespacesAsync(array{workspaceId?: string, name?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listScrapers(array $args = [])
 * @phpstan-method \Aws\Result listScrapers(array{filters?: array<string, list<string>>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listScrapersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScrapersAsync(array{filters?: array<string, list<string>>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result listWorkspaces(array $args = [])
 * @phpstan-method \Aws\Result listWorkspaces(array{nextToken?: string, alias?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkspacesAsync(array{nextToken?: string, alias?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result putAlertManagerDefinition(array $args = [])
 * @phpstan-method \Aws\Result putAlertManagerDefinition(array{
 *     workspaceId?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAlertManagerDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAlertManagerDefinitionAsync(array{
 *     workspaceId?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putAnomalyDetector(array $args = [])
 * @phpstan-method \Aws\Result putAnomalyDetector(array{
 *     workspaceId?: string,
 *     anomalyDetectorId?: string,
 *     evaluationIntervalInSeconds?: int,
 *     missingDataAction?: array{markAsAnomaly?: bool, skip?: bool, ...},
 *     configuration?: array{
 *         randomCutForest?: array{
 *             query?: string,
 *             shingleSize?: int,
 *             sampleSize?: int,
 *             ignoreNearExpectedFromAbove?: array,
 *             ignoreNearExpectedFromBelow?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     labels?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putAnomalyDetectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAnomalyDetectorAsync(array{
 *     workspaceId?: string,
 *     anomalyDetectorId?: string,
 *     evaluationIntervalInSeconds?: int,
 *     missingDataAction?: array{markAsAnomaly?: bool, skip?: bool, ...},
 *     configuration?: array{
 *         randomCutForest?: array{
 *             query?: string,
 *             shingleSize?: int,
 *             sampleSize?: int,
 *             ignoreNearExpectedFromAbove?: array,
 *             ignoreNearExpectedFromBelow?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     labels?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{workspaceId?: string, policyDocument?: string, clientToken?: string, revisionId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{workspaceId?: string, policyDocument?: string, clientToken?: string, revisionId?: string, ...} $args = [])
 * @method \Aws\Result putRuleGroupsNamespace(array $args = [])
 * @phpstan-method \Aws\Result putRuleGroupsNamespace(array{
 *     workspaceId?: string,
 *     name?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putRuleGroupsNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRuleGroupsNamespaceAsync(array{
 *     workspaceId?: string,
 *     name?: string,
 *     data?: string|resource|\Psr\Http\Message\StreamInterface,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateLoggingConfiguration(array{workspaceId?: string, logGroupArn?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array{workspaceId?: string, logGroupArn?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateQueryLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateQueryLoggingConfiguration(array{
 *     workspaceId?: string,
 *     destinations?: list<array{cloudWatchLogs?: array, filters?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateQueryLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateQueryLoggingConfigurationAsync(array{
 *     workspaceId?: string,
 *     destinations?: list<array{cloudWatchLogs?: array, filters?: array, ...}>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScraper(array $args = [])
 * @phpstan-method \Aws\Result updateScraper(array{
 *     scraperId?: string,
 *     alias?: string,
 *     scrapeConfiguration?: array{configurationBlob?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     destination?: array{
 *         ampConfiguration?: array{workspaceArn?: string, ...},
 *         cloudWatchConfiguration?: array{datasetArn?: string, ...},
 *         ...,
 *     },
 *     roleConfiguration?: array{sourceRoleArn?: string, targetRoleArn?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScraperAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScraperAsync(array{
 *     scraperId?: string,
 *     alias?: string,
 *     scrapeConfiguration?: array{configurationBlob?: string|resource|\Psr\Http\Message\StreamInterface, ...},
 *     destination?: array{
 *         ampConfiguration?: array{workspaceArn?: string, ...},
 *         cloudWatchConfiguration?: array{datasetArn?: string, ...},
 *         ...,
 *     },
 *     roleConfiguration?: array{sourceRoleArn?: string, targetRoleArn?: string, ...},
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateScraperLoggingConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateScraperLoggingConfiguration(array{
 *     scraperId?: string,
 *     loggingDestination?: array{cloudWatchLogs?: array{logGroupArn?: string, ...}, ...},
 *     scraperComponents?: list<array{type?: 'COLLECTOR'|'EXPORTER'|'SERVICE_DISCOVERY', config?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateScraperLoggingConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScraperLoggingConfigurationAsync(array{
 *     scraperId?: string,
 *     loggingDestination?: array{cloudWatchLogs?: array{logGroupArn?: string, ...}, ...},
 *     scraperComponents?: list<array{type?: 'COLLECTOR'|'EXPORTER'|'SERVICE_DISCOVERY', config?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateWorkspaceAlias(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceAlias(array{workspaceId?: string, alias?: string, clientToken?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceAliasAsync(array{workspaceId?: string, alias?: string, clientToken?: string, ...} $args = [])
 * @method \Aws\Result updateWorkspaceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateWorkspaceConfiguration(array{
 *     workspaceId?: string,
 *     clientToken?: string,
 *     limitsPerLabelSet?: list<array{limits?: array, labelSet?: array<string, string>, ...}>,
 *     retentionPeriodInDays?: int,
 *     outOfOrderTimeWindowInSeconds?: int,
 *     ruleQueryOffsetInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWorkspaceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWorkspaceConfigurationAsync(array{
 *     workspaceId?: string,
 *     clientToken?: string,
 *     limitsPerLabelSet?: list<array{limits?: array, labelSet?: array<string, string>, ...}>,
 *     retentionPeriodInDays?: int,
 *     outOfOrderTimeWindowInSeconds?: int,
 *     ruleQueryOffsetInSeconds?: int,
 *     ...,
 * } $args = [])
 */
class PrometheusServiceClient extends AwsClient {}
