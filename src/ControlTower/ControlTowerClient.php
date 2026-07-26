<?php
namespace Aws\ControlTower;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Control Tower** service.
 * @method \Aws\Result createLandingZone(array $args = [])
 * @phpstan-method \Aws\Result createLandingZone(array{
 *     version?: string,
 *     remediationTypes?: list<'INHERITANCE_DRIFT'>,
 *     tags?: array<string, string>,
 *     manifest?: array,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createLandingZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createLandingZoneAsync(array{
 *     version?: string,
 *     remediationTypes?: list<'INHERITANCE_DRIFT'>,
 *     tags?: array<string, string>,
 *     manifest?: array,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deleteLandingZone(array $args = [])
 * @phpstan-method \Aws\Result deleteLandingZone(array{landingZoneIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteLandingZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteLandingZoneAsync(array{landingZoneIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disableBaseline(array $args = [])
 * @phpstan-method \Aws\Result disableBaseline(array{enabledBaselineIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableBaselineAsync(array{enabledBaselineIdentifier?: string, ...} $args = [])
 * @method \Aws\Result disableControl(array $args = [])
 * @phpstan-method \Aws\Result disableControl(array{controlIdentifier?: string, targetIdentifier?: string, enabledControlIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise disableControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableControlAsync(array{controlIdentifier?: string, targetIdentifier?: string, enabledControlIdentifier?: string, ...} $args = [])
 * @method \Aws\Result enableBaseline(array $args = [])
 * @phpstan-method \Aws\Result enableBaseline(array{
 *     baselineVersion?: string,
 *     parameters?: list<array{key?: string, value?: array, ...}>,
 *     baselineIdentifier?: string,
 *     targetIdentifier?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableBaselineAsync(array{
 *     baselineVersion?: string,
 *     parameters?: list<array{key?: string, value?: array, ...}>,
 *     baselineIdentifier?: string,
 *     targetIdentifier?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result enableControl(array $args = [])
 * @phpstan-method \Aws\Result enableControl(array{
 *     controlIdentifier?: string,
 *     targetIdentifier?: string,
 *     tags?: array<string, string>,
 *     parameters?: list<array{key?: string, value?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise enableControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableControlAsync(array{
 *     controlIdentifier?: string,
 *     targetIdentifier?: string,
 *     tags?: array<string, string>,
 *     parameters?: list<array{key?: string, value?: array, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getBaseline(array $args = [])
 * @phpstan-method \Aws\Result getBaseline(array{baselineIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBaselineAsync(array{baselineIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getBaselineOperation(array $args = [])
 * @phpstan-method \Aws\Result getBaselineOperation(array{operationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getBaselineOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBaselineOperationAsync(array{operationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getControlOperation(array $args = [])
 * @phpstan-method \Aws\Result getControlOperation(array{operationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getControlOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getControlOperationAsync(array{operationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEnabledBaseline(array $args = [])
 * @phpstan-method \Aws\Result getEnabledBaseline(array{enabledBaselineIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnabledBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnabledBaselineAsync(array{enabledBaselineIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getEnabledControl(array $args = [])
 * @phpstan-method \Aws\Result getEnabledControl(array{enabledControlIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getEnabledControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnabledControlAsync(array{enabledControlIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getLandingZone(array $args = [])
 * @phpstan-method \Aws\Result getLandingZone(array{landingZoneIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLandingZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLandingZoneAsync(array{landingZoneIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getLandingZoneOperation(array $args = [])
 * @phpstan-method \Aws\Result getLandingZoneOperation(array{operationIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getLandingZoneOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLandingZoneOperationAsync(array{operationIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listBaselines(array $args = [])
 * @phpstan-method \Aws\Result listBaselines(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listBaselinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listBaselinesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listControlOperations(array $args = [])
 * @phpstan-method \Aws\Result listControlOperations(array{
 *     filter?: array{
 *         controlIdentifiers?: list<string>,
 *         targetIdentifiers?: list<string>,
 *         enabledControlIdentifiers?: list<string>,
 *         statuses?: list<'FAILED'|'IN_PROGRESS'|'SUCCEEDED'>,
 *         controlOperationTypes?: list<'DISABLE_CONTROL'|'ENABLE_CONTROL'|'RESET_ENABLED_CONTROL'|'UPDATE_ENABLED_CONTROL'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listControlOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlOperationsAsync(array{
 *     filter?: array{
 *         controlIdentifiers?: list<string>,
 *         targetIdentifiers?: list<string>,
 *         enabledControlIdentifiers?: list<string>,
 *         statuses?: list<'FAILED'|'IN_PROGRESS'|'SUCCEEDED'>,
 *         controlOperationTypes?: list<'DISABLE_CONTROL'|'ENABLE_CONTROL'|'RESET_ENABLED_CONTROL'|'UPDATE_ENABLED_CONTROL'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnabledBaselines(array $args = [])
 * @phpstan-method \Aws\Result listEnabledBaselines(array{
 *     filter?: array{
 *         targetIdentifiers?: list<string>,
 *         baselineIdentifiers?: list<string>,
 *         parentIdentifiers?: list<string>,
 *         statuses?: list<'FAILED'|'SUCCEEDED'|'UNDER_CHANGE'>,
 *         inheritanceDriftStatuses?: list<'DRIFTED'|'IN_SYNC'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     includeChildren?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnabledBaselinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnabledBaselinesAsync(array{
 *     filter?: array{
 *         targetIdentifiers?: list<string>,
 *         baselineIdentifiers?: list<string>,
 *         parentIdentifiers?: list<string>,
 *         statuses?: list<'FAILED'|'SUCCEEDED'|'UNDER_CHANGE'>,
 *         inheritanceDriftStatuses?: list<'DRIFTED'|'IN_SYNC'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     includeChildren?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listEnabledControls(array $args = [])
 * @phpstan-method \Aws\Result listEnabledControls(array{
 *     targetIdentifier?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{
 *         controlIdentifiers?: list<string>,
 *         statuses?: list<'FAILED'|'SUCCEEDED'|'UNDER_CHANGE'>,
 *         driftStatuses?: list<'DRIFTED'|'IN_SYNC'|'NOT_CHECKING'|'UNKNOWN'>,
 *         parentIdentifiers?: list<string>,
 *         inheritanceDriftStatuses?: list<'DRIFTED'|'IN_SYNC'|'NOT_CHECKING'|'UNKNOWN'>,
 *         resourceDriftStatuses?: list<'DRIFTED'|'IN_SYNC'|'NOT_CHECKING'|'UNKNOWN'>,
 *         ...,
 *     },
 *     includeChildren?: bool,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listEnabledControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnabledControlsAsync(array{
 *     targetIdentifier?: string,
 *     nextToken?: string,
 *     maxResults?: int,
 *     filter?: array{
 *         controlIdentifiers?: list<string>,
 *         statuses?: list<'FAILED'|'SUCCEEDED'|'UNDER_CHANGE'>,
 *         driftStatuses?: list<'DRIFTED'|'IN_SYNC'|'NOT_CHECKING'|'UNKNOWN'>,
 *         parentIdentifiers?: list<string>,
 *         inheritanceDriftStatuses?: list<'DRIFTED'|'IN_SYNC'|'NOT_CHECKING'|'UNKNOWN'>,
 *         resourceDriftStatuses?: list<'DRIFTED'|'IN_SYNC'|'NOT_CHECKING'|'UNKNOWN'>,
 *         ...,
 *     },
 *     includeChildren?: bool,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLandingZoneOperations(array $args = [])
 * @phpstan-method \Aws\Result listLandingZoneOperations(array{
 *     filter?: array{
 *         types?: list<'CREATE'|'DELETE'|'RESET'|'UPDATE'>,
 *         statuses?: list<'FAILED'|'IN_PROGRESS'|'SUCCEEDED'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listLandingZoneOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLandingZoneOperationsAsync(array{
 *     filter?: array{
 *         types?: list<'CREATE'|'DELETE'|'RESET'|'UPDATE'>,
 *         statuses?: list<'FAILED'|'IN_PROGRESS'|'SUCCEEDED'>,
 *         ...,
 *     },
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \Aws\Result listLandingZones(array $args = [])
 * @phpstan-method \Aws\Result listLandingZones(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listLandingZonesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLandingZonesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \Aws\Result resetEnabledBaseline(array $args = [])
 * @phpstan-method \Aws\Result resetEnabledBaseline(array{enabledBaselineIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetEnabledBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetEnabledBaselineAsync(array{enabledBaselineIdentifier?: string, ...} $args = [])
 * @method \Aws\Result resetEnabledControl(array $args = [])
 * @phpstan-method \Aws\Result resetEnabledControl(array{enabledControlIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetEnabledControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetEnabledControlAsync(array{enabledControlIdentifier?: string, ...} $args = [])
 * @method \Aws\Result resetLandingZone(array $args = [])
 * @phpstan-method \Aws\Result resetLandingZone(array{landingZoneIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise resetLandingZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resetLandingZoneAsync(array{landingZoneIdentifier?: string, ...} $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \Aws\Result updateEnabledBaseline(array $args = [])
 * @phpstan-method \Aws\Result updateEnabledBaseline(array{
 *     baselineVersion?: string,
 *     parameters?: list<array{key?: string, value?: array, ...}>,
 *     enabledBaselineIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnabledBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnabledBaselineAsync(array{
 *     baselineVersion?: string,
 *     parameters?: list<array{key?: string, value?: array, ...}>,
 *     enabledBaselineIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateEnabledControl(array $args = [])
 * @phpstan-method \Aws\Result updateEnabledControl(array{parameters?: list<array{key?: string, value?: array, ...}>, enabledControlIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateEnabledControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnabledControlAsync(array{parameters?: list<array{key?: string, value?: array, ...}>, enabledControlIdentifier?: string, ...} $args = [])
 * @method \Aws\Result updateLandingZone(array $args = [])
 * @phpstan-method \Aws\Result updateLandingZone(array{
 *     version?: string,
 *     remediationTypes?: list<'INHERITANCE_DRIFT'>,
 *     landingZoneIdentifier?: string,
 *     manifest?: array,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updateLandingZoneAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateLandingZoneAsync(array{
 *     version?: string,
 *     remediationTypes?: list<'INHERITANCE_DRIFT'>,
 *     landingZoneIdentifier?: string,
 *     manifest?: array,
 *     ...,
 * } $args = [])
 */
class ControlTowerClient extends AwsClient {}
