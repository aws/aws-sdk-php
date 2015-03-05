<?php
namespace Aws;

use GuzzleHttp\Client;

class GuzzleBridge
{
    public static function getDefaultHandler()
    {

    }

    public static function getDefaultHttpHandlerFn()
    {
        $handler = self::getDefaultHandler();
        return function () use ($handler) {
            return new Client(['handler' => $handler]);
        };
    }
}
