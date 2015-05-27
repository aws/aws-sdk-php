<?php
namespace Aws\Ec2;

use Aws\AwsClient;
use Aws\Api\Service;
use Aws\Api\DocModel;
use Aws\Api\ApiProvider;

/**
 * Client used to interact with Amazon EC2.
 */
class Ec2Client extends AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                CopySnapshotMiddleware::wrap(
                    $this,
                    $args['endpoint_provider']
                ),
                'ec2.copy_snapshot'
            );
        };

        parent::__construct($args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Several copy snapshot parameters are optional.
        $docs['shapes']['String']['refs']['CopySnapshotRequest$PresignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CopySnapshotRequest$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
