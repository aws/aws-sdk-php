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
            $copySnap = new CopySnapshotSubscriber($args['endpoint_provider']);
            $this->getEmitter()->attach($copySnap);
        };
        parent::__construct($args);
    }
}
