<?php
namespace Aws\Arn;

class ArnBuilder
{
    public static function build($string)
    {
        $data = Arn::parse($string);
        if ($data['resource_type'] === 'endpoint') {
            return new EndpointArn($data);
        }

        return new Arn($data);
    }
}