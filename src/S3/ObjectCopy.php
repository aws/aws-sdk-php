<?php
namespace Aws\S3;

use GuzzleHttp\Promise\PromisorInterface;

class ObjectCopy implements PromisorInterface
{
    private $client;
    private $sourceBucket;
    private $sourceKey;
    private $destinationBucket;
    private $destinationKey;
    private $acl;
    private $options;
    private static $defaults = [
        'before_upload' => null,
        'concurrency'   => 5,
        'mup_threshold' => MultipartUploader::PART_MAX_SIZE,
        'params'        => [],
        'part_size'     => null,
        'version_id'    => null,
    ];

    public function __construct(
        S3ClientInterface $client,
        $sourceBucket,
        $sourceKey,
        $destinationBucket,
        $destinationKey,
        $acl = 'private',
        array $options = []
    ) {
        $this->client = $client;
        $this->sourceBucket = $sourceBucket;
        $this->sourceKey = $sourceKey;
        $this->destinationBucket = $destinationBucket;
        $this->destinationKey = $destinationKey;
        $this->acl = $acl;
        $this->options = $options + self::$defaults;
    }

    public function promise()
    {
        return \GuzzleHttp\Promise\coroutine(function () {
            $sourcePath = "/{$this->sourceBucket}/"
                . rawurlencode($this->sourceKey);
            if ($this->options['version_id']) {
                $sourcePath .= "?versionId={$this->options['version_id']}";
            }
            $objectStats = (yield $this->client->executeAsync(
                $this->client->getCommand('HeadObject', array_filter([
                    'Bucket' => $this->sourceBucket,
                    'Key' => $this->sourceKey,
                    'VersionId' => $this->options['version_id'],
                ]))
            ));

            if ($objectStats['ContentLength'] > $this->options['mup_threshold']) {
                $mup = new MultipartCopy($this->client, $sourcePath, [
                    'source_metadata' => $objectStats,
                    'acl' => $this->acl,
                    'Bucket' => $this->destinationBucket,
                    'Key' => $this->destinationKey
                ] + $this->options);

                yield $mup->promise();
            } else {
                $params = array_diff_key($this->options, self::$defaults) + [
                    'Bucket' => $this->destinationBucket,
                    'Key' => $this->destinationKey,
                    'ACL' => $this->acl,
                    'MetadataDirective' => 'COPY',
                    'CopySource' => $sourcePath,
                ] + $this->options['params'];

                yield $this->client->executeAsync(
                    $this->client->getCommand('CopyObject', $params)
                );
            }
        });
    }

    public function copy()
    {
        return $this->promise()->wait();
    }
}
