<?php
namespace Aws\S3;

// Hack gmdate() to returned the canned result.
function gmdate($format, $ts = null)
{
    return isset($_SERVER['aws_time'])
        ? $_SERVER['aws_time']
        : \gmdate($format, $ts ?: time());
}
