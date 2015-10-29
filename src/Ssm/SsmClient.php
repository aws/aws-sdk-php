<?php
namespace Aws\Ssm;

use Aws\AwsClient;

/**
 * Amazon EC2 Simple Systems Manager client.
 *
 * @method \Aws\Result cancelCommand(array $args = [])
 * @method \GuzzleHttp\Promise\Promise cancelCommandAsync(array $args = [])
 * @method \Aws\Result createAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssociationAsync(array $args = [])
 * @method \Aws\Result createAssociationBatch(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssociationBatchAsync(array $args = [])
 * @method \Aws\Result createDocument(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDocumentAsync(array $args = [])
 * @method \Aws\Result deleteAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssociationAsync(array $args = [])
 * @method \Aws\Result deleteDocument(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDocumentAsync(array $args = [])
 * @method \Aws\Result describeAssociation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssociationAsync(array $args = [])
 * @method \Aws\Result describeDocument(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDocumentAsync(array $args = [])
 * @method \Aws\Result describeInstanceInformation(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeInstanceInformationAsync(array $args = [])
 * @method \Aws\Result getDocument(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getDocumentAsync(array $args = [])
 * @method \Aws\Result listAssociations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociationsAsync(array $args = [])
 * @method \Aws\Result listCommandInvocations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandInvocationsAsync(array $args = [])
 * @method \Aws\Result listCommands(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCommandsAsync(array $args = [])
 * @method \Aws\Result listDocuments(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDocumentsAsync(array $args = [])
 * @method \Aws\Result sendCommand(array $args = [])
 * @method \GuzzleHttp\Promise\Promise sendCommandAsync(array $args = [])
 * @method \Aws\Result updateAssociationStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssociationStatusAsync(array $args = [])
 */
class SsmClient extends AwsClient {}
