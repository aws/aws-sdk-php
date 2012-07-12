<?php

namespace Aws\S3\Command;

/**
 * Filters used in the Amazon S3 service description
 */
class Filters
{
    /**
     * Prepends x-amz-meta- to each array key if it does not already exist
     *
     * @param array $data Data that should have x-amz-meta- prepended to each key
     *
     * @return array
     */
    public static function prependAmzMeta(array $data = null)
    {
        $mapped = array();
        if ($data) {
            foreach ($data as $key => $value) {
                if (strpos($key, 'x-amz-meta-') === 0) {
                    $mapped[$key] = $value;
                } else {
                    $mapped["x-amz-meta-{$key}"] = $value;
                }
            }
        }

        return $mapped;
    }
}
