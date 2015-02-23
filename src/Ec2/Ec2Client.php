<?php
namespace Aws\Ec2;

use Aws\AwsClient;

/**
 * This client is used to interact with **Amazon EC2**.
 */
class Ec2Client extends AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerStack()->push(
                CopySnapshotMiddleware::create(
                    $this,
                    $args['endpoint_provider']
                )
            );
        };
        parent::__construct($args);
    }
}
