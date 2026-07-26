<?php
namespace Aws\SagemakerEdgeManager;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Sagemaker Edge Manager** service.
 * @method \Aws\Result getDeployments(array $args = [])
 * @phpstan-method \Aws\Result getDeployments(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \Aws\Result getDeviceRegistration(array $args = [])
 * @phpstan-method \Aws\Result getDeviceRegistration(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise getDeviceRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceRegistrationAsync(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \Aws\Result sendHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result sendHeartbeat(array{
 *     AgentMetrics?: list<array{Dimension?: string, MetricName?: string, Value?: float, Timestamp?: int|string|\DateTimeInterface, ...}>,
 *     Models?: list<array{
 *         ModelName?: string,
 *         ModelVersion?: string,
 *         LatestSampleTime?: int|string|\DateTimeInterface,
 *         LatestInference?: int|string|\DateTimeInterface,
 *         ModelMetrics?: list<array>,
 *         ...,
 *     }>,
 *     AgentVersion?: string,
 *     DeviceName?: string,
 *     DeviceFleetName?: string,
 *     DeploymentResult?: array{
 *         DeploymentName?: string,
 *         DeploymentStatus?: string,
 *         DeploymentStatusMessage?: string,
 *         DeploymentStartTime?: int|string|\DateTimeInterface,
 *         DeploymentEndTime?: int|string|\DateTimeInterface,
 *         DeploymentModels?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \GuzzleHttp\Promise\Promise sendHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendHeartbeatAsync(array{
 *     AgentMetrics?: list<array{Dimension?: string, MetricName?: string, Value?: float, Timestamp?: int|string|\DateTimeInterface, ...}>,
 *     Models?: list<array{
 *         ModelName?: string,
 *         ModelVersion?: string,
 *         LatestSampleTime?: int|string|\DateTimeInterface,
 *         LatestInference?: int|string|\DateTimeInterface,
 *         ModelMetrics?: list<array>,
 *         ...,
 *     }>,
 *     AgentVersion?: string,
 *     DeviceName?: string,
 *     DeviceFleetName?: string,
 *     DeploymentResult?: array{
 *         DeploymentName?: string,
 *         DeploymentStatus?: string,
 *         DeploymentStatusMessage?: string,
 *         DeploymentStartTime?: int|string|\DateTimeInterface,
 *         DeploymentEndTime?: int|string|\DateTimeInterface,
 *         DeploymentModels?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class SagemakerEdgeManagerClient extends AwsClient {}
