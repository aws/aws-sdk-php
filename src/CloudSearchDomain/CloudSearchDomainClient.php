<?php
namespace Aws\CloudSearchDomain;

use Aws\AwsClient;
use GuzzleHttp\Psr7\Uri;

/**
 * This client is used to search and upload documents to an **Amazon CloudSearch** Domain.
 */
class CloudSearchDomainClient extends AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['endpoint']['required'] = true;
        $args['region']['default'] = function (array $args) {
            // Determine the region from the provided endpoint.
            // (e.g. http://search-blah.{region}.cloudsearch.amazonaws.com)
            return explode('.', new Uri($args['endpoint']))[1];
        };

        return $args;
    }
}
