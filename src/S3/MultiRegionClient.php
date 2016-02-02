<?php
namespace Aws\S3;

use Aws\CommandInterface;
use Aws\MultiRegionClient as BaseClient;
use Aws\S3\Exception\PermanentRedirectException;
use GuzzleHttp\Promise;

class MultiRegionClient extends BaseClient implements S3ClientInterface
{
    use S3ClientTrait;

    public function __construct(array $args)
    {
        parent::__construct('s3', $args);
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
}
