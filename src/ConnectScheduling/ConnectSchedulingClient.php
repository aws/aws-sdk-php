<?php
namespace Aws\ConnectScheduling;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Scheduling** service.
 * @method \Aws\Result approveTimeOff(array $args = [])
 * @phpstan-method \Aws\Result approveTimeOff(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     TimeOffId?: string,
 *     Description?: string,
 *     RuleFailureAction?: 'OVERRIDE'|'REJECT',
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise approveTimeOffAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise approveTimeOffAsync(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     TimeOffId?: string,
 *     Description?: string,
 *     RuleFailureAction?: 'OVERRIDE'|'REJECT',
 *     ...,
 * } $args = [])
 * @method \Aws\Result cancelTimeOff(array $args = [])
 * @phpstan-method \Aws\Result cancelTimeOff(array{InstanceId?: string, UserId?: string, TimeOffId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelTimeOffAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelTimeOffAsync(array{InstanceId?: string, UserId?: string, TimeOffId?: string, Description?: string, ...} $args = [])
 * @method \Aws\Result createTimeOff(array $args = [])
 * @phpstan-method \Aws\Result createTimeOff(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     ShiftActivityId?: string,
 *     StartAt?: int|string|\DateTimeInterface,
 *     EndAt?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ApprovalType?: 'AUTOMATIC'|'AWAIT_APPROVAL',
 *     RuleFailureAction?: 'OVERRIDE'|'REJECT',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise createTimeOffAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTimeOffAsync(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     ShiftActivityId?: string,
 *     StartAt?: int|string|\DateTimeInterface,
 *     EndAt?: int|string|\DateTimeInterface,
 *     Description?: string,
 *     ApprovalType?: 'AUTOMATIC'|'AWAIT_APPROVAL',
 *     RuleFailureAction?: 'OVERRIDE'|'REJECT',
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \Aws\Result getTimeOff(array $args = [])
 * @phpstan-method \Aws\Result getTimeOff(array{InstanceId?: string, UserId?: string, TimeOffId?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getTimeOffAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTimeOffAsync(array{InstanceId?: string, UserId?: string, TimeOffId?: string, ...} $args = [])
 * @method \Aws\Result putTimeOffBalance(array $args = [])
 * @phpstan-method \Aws\Result putTimeOffBalance(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     ShiftActivityId?: string,
 *     Balance?: array{Value?: int, Unit?: 'DAYS'|'HOURS'|'MINUTES', ...},
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise putTimeOffBalanceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putTimeOffBalanceAsync(array{
 *     InstanceId?: string,
 *     UserId?: string,
 *     ShiftActivityId?: string,
 *     Balance?: array{Value?: int, Unit?: 'DAYS'|'HOURS'|'MINUTES', ...},
 *     ...,
 * } $args = [])
 * @method \Aws\Result rejectTimeOff(array $args = [])
 * @phpstan-method \Aws\Result rejectTimeOff(array{InstanceId?: string, UserId?: string, TimeOffId?: string, Description?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise rejectTimeOffAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectTimeOffAsync(array{InstanceId?: string, UserId?: string, TimeOffId?: string, Description?: string, ...} $args = [])
 */
class ConnectSchedulingClient extends AwsClient {}
