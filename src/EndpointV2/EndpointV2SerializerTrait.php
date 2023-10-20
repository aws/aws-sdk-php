<?php

namespace Aws\EndpointV2;

use Aws\Api\Serializer\RestSerializer;
use GuzzleHttp\Psr7\Uri;

/**
 * Set of helper functions used to set endpoints and endpoint
 * properties derived from dynamic endpoint resolution.
 *
 * @internal
 */
trait EndpointV2SerializerTrait
{
    private function setEndpointV2RequestOptions($endpoint, $headers)
    {
        $this->applyHeaders($endpoint, $headers);
        $resolvedUrl = $endpoint->getUrl();
        $this->applyScheme($resolvedUrl);
        $this->endpoint = $this instanceof RestSerializer
            ? new Uri($resolvedUrl)
            : $resolvedUrl;
    }

    private function applyHeaders($endpoint, &$headers)
    {
        if (!is_null($endpoint->getHeaders())) {
           $headers = array_merge(
               $headers,
               $endpoint->getHeaders()
           );
        }
    }

    private function applyScheme(&$resolvedUrl)
    {
        $resolvedEndpointScheme = parse_url($resolvedUrl, PHP_URL_SCHEME);
        $scheme = $this->endpoint instanceof Uri
            ? $this->endpoint->getScheme()
            : parse_url($this->endpoint, PHP_URL_SCHEME);

        if (!empty($scheme) && $scheme !== $resolvedEndpointScheme) {
            $resolvedUrl = str_replace(
                $resolvedEndpointScheme,
                $scheme,
                $resolvedUrl
            );
        }
    }
}
