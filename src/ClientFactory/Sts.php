<?php
namespace Aws\ClientFactory;

/**
 * @internal
 */
class Sts extends ClientFactory
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
