<?php

namespace Aws\Handler\GuzzleV6;

class_exists(\Aws\Handler\Guzzle\GuzzleHandler::class)

// @trigger_error(sprintf('Using the "\Aws\Handler\GuzzleV6\GuzzleHandler" class is deprecated, use "\Aws\Handler\Guzzle\GuzzleHandler" instead.'), \E_USER_DEPRECATED);

if (\false) {
    /** @deprecated use "\Aws\Handler\Guzzle\GuzzleHandler" instead */
    class GuzzleHandler extends \Aws\Handler\Guzzle\GuzzleHandler
    {
    }
}
