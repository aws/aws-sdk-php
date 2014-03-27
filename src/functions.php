<?php

namespace Aws;

/**
 * Creates a new Aws builder based on the provided configuration options.
 *
 * @param array $args Associative array of arguments provided to the builder.
 *
 * @return Builder
 */
function init(array $args = [])
{
    return new Builder($args);
}
