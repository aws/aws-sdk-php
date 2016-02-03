<?php
namespace Aws\S3;

use Aws\CacheInterface;
use Aws\CommandInterface;
use Aws\LruArrayCache;
use Aws\MultiRegionClient as BaseClient;
use Aws\S3\Exception\PermanentRedirectException;
use GuzzleHttp\Promise;

class MultiRegionClient extends BaseClient implements S3ClientInterface
{
    use S3ClientTrait {
        determineBucketRegionAsync as private lookupBucketRegion;
    }

    /** @var CacheInterface */
    private $cache;

    public function __construct(array $args)
    {
        parent::__construct('s3', $args);
        $this->cache = isset($args['cache']) && $args['cache'] instanceof CacheInterface
            ? $args['cache']
            : new LruArrayCache;
    }

    public function executeAsync(CommandInterface $c)
    {
        return Promise\coroutine(function () use ($c) {
            if ($region = $this->cache->get($this->getCacheKey($c['Bucket']))) {
                $c = $this->getRegionalizedCommand($c, $region);
            }

            try {
                yield parent::executeAsync($c);
            } catch (PermanentRedirectException $e) {
                if (empty($c['Bucket'])) {
                    throw $e;
                }
                $region = (yield $this->lookupBucketRegion($c['Bucket']));
                $this->cache->set($this->getCacheKey($c['Bucket']), $region);
                $c = $this->getRegionalizedCommand($c, $region);
                yield parent::executeAsync($c);
            }
        });
    }

    private function getRegionalizedCommand(CommandInterface $command, $region)
    {
        return $this->getClientFromPool($region)
            ->getCommand($command->getName(), $command->toArray());
    }

    public function createPresignedRequest(CommandInterface $command, $expires)
    {
        if (empty($command['Bucket'])) {
            throw new \InvalidArgumentException('The S3\\MultiRegionClient'
                . ' cannot create presigned requests for commands without a'
                . ' specified bucket.');
        }

        /** @var S3ClientInterface $client */
        $client = $this->getClientFromPool(
            $this->determineBucketRegion($command['Bucket'])
        );
        return $client->createPresignedRequest(
            $client->getCommand($command->getName(), $command->toArray()),
            $expires
        );
    }

    public function getObjectUrl($bucket, $key)
    {
        return $this->getClientFromPool($this->determineBucketRegion($bucket))
            ->getObjectUrl($bucket, $key);
    }

    public function determineBucketRegionAsync($bucketName)
    {
        if ($cached = $this->cache->get($this->getCacheKey($bucketName))) {
            return Promise\promise_for($cached);
        }

        return $this->lookupBucketRegion($bucketName)
            ->then(function ($region) use ($bucketName) {
                $this->cache->set($this->getCacheKey($bucketName), $region);

                return $region;
            });
    }

    private function getCacheKey($bucketName)
    {
        return "aws:{$bucketName}:location";
    }
}
