<?php
namespace Aws\Test\Integ;

trait IntegUtils
{
    private static function getSdk()
    {
        return new \Aws\Sdk([
            'region'  => 'us-east-1',
            'profile' => 'integ',
            'version' => 'latest',
        ]);
    }

    public static function log($message)
    {
        fwrite(STDERR, date('c') . ': ' . $message . "\n");
    }

    /**
     * Get the resource prefix to add to created resources
     *
     * @return string
     */
    public static function getResourcePrefix()
    {
        if (!isset($_SERVER['PREFIX']) || $_SERVER['PREFIX'] == 'hostname') {
            $_SERVER['PREFIX'] = crc32(gethostname()) . rand(0, 10000);
        }

        return $_SERVER['PREFIX'];
    }
}
