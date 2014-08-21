<?php
namespace Aws\CloudSearchDomain;

use Aws\Common\ClientFactory;
use GuzzleHttp\Url;

/**
 * @internal
 */
class CloudSearchDomainFactory extends ClientFactory
{
    /**
     * {@inheritdoc}
     *
     * CloudSearchDomain does not require a region, but does need an endpoint.
     */
    protected function addDefaultArgs(&$args)
    {
        // An endpoint is required.
        if (!isset($args['endpoint'])) {
            throw new \InvalidArgumentException('You must provide the endpoint '
                . 'for the CloudSearch domain.');
        }

        // Make sure the endpoint includes a scheme
        if (strpos($args['endpoint'], 'http') !== 0) {
            $args['endpoint'] = Url::buildUrl([
                'host'   => $args['endpoint'],
                'scheme' => $args['scheme'],
            ]);
        }

        // Determine the region from the provided endpoint.
        // (e.g. http://search-blah.{region}.cloudsearch.amazonaws.com)
        list(,$args['region']) = explode('.', Url::fromString($args['endpoint']));

        parent::addDefaultArgs($args);
    }
}
