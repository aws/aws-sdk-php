<?php
namespace Aws;

/**
 * Creates a new Aws builder based on the provided configuration options.
 *
 * @param array $args Associative array of arguments provided to the builder.
 *
 * @return Sdk
 */
function init(array $args = [])
{
    return new Sdk($args);
}
