<?php
namespace Aws\Ssm;

use Aws\AwsClient;

/**
 * Amazon EC2 Simple Systems Manager client.
 *
 * @method \Aws\Result createAssociation(array $args = [])
 * @method \Aws\Result createAssociationBatch(array $args = [])
 * @method \Aws\Result createDocument(array $args = [])
 * @method \Aws\Result deleteAssociation(array $args = [])
 * @method \Aws\Result deleteDocument(array $args = [])
 * @method \Aws\Result describeAssociation(array $args = [])
 * @method \Aws\Result describeDocument(array $args = [])
 * @method \Aws\Result getDocument(array $args = [])
 * @method \Aws\Result listAssociations(array $args = [])
 * @method \Aws\Result listDocuments(array $args = [])
 * @method \Aws\Result updateAssociationStatus(array $args = [])
 */
class SsmClient extends AwsClient {}
