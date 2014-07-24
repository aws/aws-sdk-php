<?php
namespace Aws\Sts;

use Aws\Common\ClientFactory;

/**
 * @internal
 */
class StsFactory extends ClientFactory
{
    /**
     * {@inheritdoc}
     *
     * STS does not require a region.
     */
    protected function addDefaultArgs(&$args)
    {
        if (!isset($args['region'])) {
            $args['region'] = 'us-east-1';
        }

        parent::addDefaultArgs($args);
    }
}
