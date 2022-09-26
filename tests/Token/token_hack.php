<?php
namespace Aws\Token;

// Hack time() to returned the canned result.

function time()
{
    if (isset($_SERVER['aws_time'])) {
        return $_SERVER['aws_time'] === true
            ? strtotime('1640467800')
            : $_SERVER['aws_time'];
    }

    return \time();
}
