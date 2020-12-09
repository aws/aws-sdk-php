<?php
namespace Aws\Signature;

// Hack gmdate() to returned the canned result.
function gmdate($format, $ts = null)
{
    $formatAwsTime = isset($_SERVER['formatAwsTime'])
        && $_SERVER['formatAwsTime'] === true;
    if (isset($_SERVER['aws_time']) && $formatAwsTime) {
        return \gmdate($format, $_SERVER['aws_time']);
    }
    return isset($_SERVER['aws_time'])
        ? $_SERVER['aws_time']
        : \gmdate($format, $ts ?: time());
}

function time()
{
    if (isset($_SERVER['aws_time'])) {
        return $_SERVER['aws_time'] === true
            ? strtotime('December 5, 2013 00:00:00 UTC')
            : $_SERVER['aws_time'];
    }

    return \time();
}
