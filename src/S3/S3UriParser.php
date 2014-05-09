<?php
namespace Aws\S3;

use GuzzleHttp\Url;

/**
 * Extracts a region, bucket, key, and and if a URI is in path-style
 */
class S3UriParser
{
    private $pattern = '/^(.+\\.)?s3[.-]([a-z0-9-]+)\\./';

    /**
     * Parses a URL into an associative array of Amazon S3 data including:
     *
     * - bucket: The Amazon S3 bucket (null if none)
     * - key: The Amazon S3 key (null if none)
     * - path_style: Set to true if using path style, or false if not
     * - region: Set to a string if a non-class endpoint is used or null.
     *
     * @param $uri
     *
     * @return array
     * @throws \InvalidArgumentException
     */
    public function parse($uri)
    {
        $url = Url::fromString($uri);
        if (!$url->getHost()) {
            throw new \InvalidArgumentException('No hostname found in URI: '
                . $uri);
        }

        if (!preg_match($this->pattern, $url->getHost(), $matches)) {
            throw new \InvalidArgumentException('Not a valid S3 endpoint: '
                . $uri);
        }

        // Parse the URI based on the matched format (path / virtual)
        $result = empty($matches[1])
            ? $this->parsePathStyle($url)
            : $this->parseVirtualHosted($url, $matches);

        // Add the region if one was found and not the classic endpoint
        if ($matches[2] == 'amazonaws') {
            $result['region'] = null;
        } else {
            $result['region'] = $matches[2];
        }

        return $result;
    }

    private function parsePathStyle(Url $url)
    {
        $result = [
            'path_style' => true,
            'bucket'     => null,
            'key'        => null
        ];

        if ($url->getPath() != '/') {
            $path = ltrim($url->getPath(), '/');
            if ($path) {
                $pathPos = strpos($path, '/');
                if ($pathPos === false) {
                    // https://s3.amazonaws.com/bucket
                    $result['bucket'] = $path;
                } elseif ($pathPos == strlen($path) - 1) {
                    // https://s3.amazonaws.com/bucket/
                    $result['bucket'] = substr($path, 0, -1);
                } else {
                    // https://s3.amazonaws.com/bucket/key
                    $result['bucket'] = substr($path, 0, $pathPos);
                    $result['key'] = substr($path, $pathPos + 1) ?: null;
                }
            }
        }

        return $result;
    }

    private function parseVirtualHosted(Url $url, array $matches)
    {
        $result = [
            'path_style' => false,
            // Remove trailing "." from the prefix to get the bucket
            'bucket'     => substr($matches[1], 0, -1)
        ];

        $path = $url->getPath();
        // Check if a key was present, and if so, removing the leading "/"
        $result['key'] = !$path || $path == '/'
            ? null
            : substr($path, 1);

        return $result;
    }
}
