<?php
namespace Aws\ARCZonalShift;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS ARC - Zonal Shift** service.
 * @method \Aws\Result cancelPracticeRun(array $args = [])
 * @phpstan-method \Aws\Result cancelPracticeRun(array{zonalShiftId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelPracticeRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelPracticeRunAsync(array{zonalShiftId?: string, ...} $args = [])
 * @method \Aws\Result cancelZonalShift(array $args = [])
 * @phpstan-method \Aws\Result cancelZonalShift(array{zonalShiftId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelZonalShiftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelZonalShiftAsync(array{zonalShiftId?: string, ...} $args = [])
 * @method \Aws\Result createPracticeRunConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createPracticeRunConfiguration(array{
 *     resourceIdentifier?: string,
 *     blockedWindows?: list<string>,
 *     blockedDates?: list<string>,
 *     blockingAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     allowedWindows?: list<string>,
 *     outcomeAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createPracticeRunConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPracticeRunConfigurationAsync(array{
 *     resourceIdentifier?: string,
 *     blockedWindows?: list<string>,
 *     blockedDates?: list<string>,
 *     blockingAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     allowedWindows?: list<string>,
 *     outcomeAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result deletePracticeRunConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deletePracticeRunConfiguration(array{resourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePracticeRunConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePracticeRunConfigurationAsync(array{resourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result getAutoshiftObserverNotificationStatus(array $args = [])
 * @phpstan-method \Aws\Result getAutoshiftObserverNotificationStatus(array{...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getAutoshiftObserverNotificationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAutoshiftObserverNotificationStatusAsync(array{...} $args = [])
 * @method \Aws\Result getManagedResource(array $args = [])
 * @phpstan-method \Aws\Result getManagedResource(array{resourceIdentifier?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getManagedResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getManagedResourceAsync(array{resourceIdentifier?: string, ...} $args = [])
 * @method \Aws\Result listAutoshifts(array $args = [])
 * @phpstan-method \Aws\Result listAutoshifts(array{nextToken?: string, status?: 'ACTIVE'|'COMPLETED', maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listAutoshiftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAutoshiftsAsync(array{nextToken?: string, status?: 'ACTIVE'|'COMPLETED', maxResults?: int, ...} $args = [])
 * @method \Aws\Result listManagedResources(array $args = [])
 * @phpstan-method \Aws\Result listManagedResources(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise listManagedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listManagedResourcesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \Aws\Result listZonalShifts(array $args = [])
 * @phpstan-method \Aws\Result listZonalShifts(array{
 *     nextToken?: string,
 *     status?: 'ACTIVE'|'CANCELED'|'EXPIRED',
 *     maxResults?: int,
 *     resourceIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise listZonalShiftsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listZonalShiftsAsync(array{
 *     nextToken?: string,
 *     status?: 'ACTIVE'|'CANCELED'|'EXPIRED',
 *     maxResults?: int,
 *     resourceIdentifier?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result startPracticeRun(array $args = [])
 * @phpstan-method \Aws\Result startPracticeRun(array{resourceIdentifier?: string, awayFrom?: string, comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startPracticeRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPracticeRunAsync(array{resourceIdentifier?: string, awayFrom?: string, comment?: string, ...} $args = [])
 * @method \Aws\Result startZonalShift(array $args = [])
 * @phpstan-method \Aws\Result startZonalShift(array{resourceIdentifier?: string, awayFrom?: string, expiresIn?: string, comment?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise startZonalShiftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startZonalShiftAsync(array{resourceIdentifier?: string, awayFrom?: string, expiresIn?: string, comment?: string, ...} $args = [])
 * @method \Aws\Result updateAutoshiftObserverNotificationStatus(array $args = [])
 * @phpstan-method \Aws\Result updateAutoshiftObserverNotificationStatus(array{status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAutoshiftObserverNotificationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAutoshiftObserverNotificationStatusAsync(array{status?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updatePracticeRunConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updatePracticeRunConfiguration(array{
 *     resourceIdentifier?: string,
 *     blockedWindows?: list<string>,
 *     blockedDates?: list<string>,
 *     blockingAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     allowedWindows?: list<string>,
 *     outcomeAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePracticeRunConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePracticeRunConfigurationAsync(array{
 *     resourceIdentifier?: string,
 *     blockedWindows?: list<string>,
 *     blockedDates?: list<string>,
 *     blockingAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     allowedWindows?: list<string>,
 *     outcomeAlarms?: list<array{type?: 'CLOUDWATCH', alarmIdentifier?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \Aws\Result updateZonalAutoshiftConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateZonalAutoshiftConfiguration(array{resourceIdentifier?: string, zonalAutoshiftStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateZonalAutoshiftConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateZonalAutoshiftConfigurationAsync(array{resourceIdentifier?: string, zonalAutoshiftStatus?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \Aws\Result updateZonalShift(array $args = [])
 * @phpstan-method \Aws\Result updateZonalShift(array{zonalShiftId?: string, comment?: string, expiresIn?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise updateZonalShiftAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateZonalShiftAsync(array{zonalShiftId?: string, comment?: string, expiresIn?: string, ...} $args = [])
 */
class ARCZonalShiftClient extends AwsClient {}
