<?php
namespace Aws\S3\Crypto;

use Aws\AwsClient;
use Aws\Middleware;
use Psr\Http\Message\RequestInterface;

trait UserAgentTrait
{
    private function appendUserAgent(AwsClient $client, $agentString)
    {
        $list = $client->getHandlerList();
        $list->appendBuild(Middleware::mapRequest(
            function(RequestInterface $req) use ($agentString) {
                if (!empty($req->getHeader('User-Agent'))
                    && !empty($req->getHeader('User-Agent')[0])
                ) {
                    $userAgent = $req->getHeader('User-Agent')[0] . " {$agentString}";
                } else {
                    $userAgent = $agentString;
                }

                $req =  $req->withHeader('User-Agent', $userAgent);
                return $req;
            }
        ));
    }
}
