<?php
namespace Aws\OperationTrait\RequestCompressionTrait\DisableRequestCompression;

interface ConfigurationInterface
{
    /**
     * Returns whether or not request compression is disabled
     *
     * @return bool
     */
    public function isDisableRequestCompression();

    /**
     * Returns the configuration as an associative array
     *
     * @return array
     */
    public function toArray();
}