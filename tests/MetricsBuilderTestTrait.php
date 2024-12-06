<?php
namespace Aws\Test;

use Psr\Http\Message\RequestInterface;

trait MetricsBuilderTestTrait
{
    public function getMetricsAsArray(RequestInterface $request): array
    {
        $regex = "/([mM]\/)([A-Za-z,0-9]+)/";
        if (preg_match(
                $regex,
                $request->getHeaderLine('User-Agent'),
                $matches
            ) !== false) {
            $metrics = $matches[2];

            return explode(',', $metrics);
        }

        return [];
    }
}
