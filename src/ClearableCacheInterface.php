<?php
namespace Aws;

/**
 * Represents a cache that can be purged.
 */
interface ClearableCacheInterface extends CacheInterface
{
    public function purge();
}