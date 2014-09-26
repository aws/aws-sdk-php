<?php
namespace Aws\Test\Integ;

trait IntegUtils
{
    private static function getSdk()
    {
        return new \Aws\Sdk([
            'region'  => 'us-east-1',
            'profile' => 'integ',
        ]);
    }
}
