<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\MultiRegionTrait;
use Aws\S3\Exception\PermanentRedirectException;
use Aws\Session;
use GuzzleHttp\Promise;

class MultiRegionClient extends S3Client
{
    use MultiRegionTrait;
    /** @var Session */
    private $session;

    public function __construct(array $args)
    {
        $this->session = new Session($args);
    }

    public function executeAsync(CommandInterface $c)
    {
        return Promise\coroutine(function () use ($c) {
            try {
                yield $this->getClientFromPool($this->getRegion())
                    ->executeAsync($c);
            } catch (PermanentRedirectException $e) {
                if (empty($c['Bucket'])) {
                    throw $e;
                }
                $region = (yield $this->determineBucketRegionAsync($c['Bucket']));
                $client = $this->getClientFromPool($region);
                $c = $client->getCommand($c->getName(), $c->toArray());
                yield $client->executeAsync($c);
            }
        });
    }

    protected function getSession()
    {
        return $this->session;
    }

    protected function getClientClass()
    {
        return S3Client::class;
    }
}
