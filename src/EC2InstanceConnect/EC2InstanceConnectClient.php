<?php
namespace Aws\EC2InstanceConnect;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS EC2 Instance Connect** service.
 * @method \Aws\Result sendSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result sendSSHPublicKey(array{InstanceId?: string, InstanceOSUser?: string, SSHPublicKey?: string, AvailabilityZone?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendSSHPublicKeyAsync(array{InstanceId?: string, InstanceOSUser?: string, SSHPublicKey?: string, AvailabilityZone?: string, ...} $args = [])
 * @method \Aws\Result sendSerialConsoleSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result sendSerialConsoleSSHPublicKey(array{InstanceId?: string, SerialPort?: int, SSHPublicKey?: string, ...} $args = [])
 * @method \GuzzleHttp\Promise\Promise sendSerialConsoleSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendSerialConsoleSSHPublicKeyAsync(array{InstanceId?: string, SerialPort?: int, SSHPublicKey?: string, ...} $args = [])
 */
class EC2InstanceConnectClient extends AwsClient {}
