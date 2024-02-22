<?php

namespace Aws;

/**
 * this class aims to resolve a value lazily.
 */
interface LazyResolver
{
    /**
     * Resolves the value lazily.
     *
     * @param bool $force Optional, just for resolvers that caches the value;
     *  If true, forces re-computation of the value even if it has been resolved before.
     * @return mixed The resolved value.
     */
    public function resolve(bool $force = false): mixed;

    /**
     * Checks if the value has been resolved.
     *
     * @return bool True if the value has been resolved, false otherwise.
     */
    public function isResolved(): bool;
}
