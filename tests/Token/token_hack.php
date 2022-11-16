<?php
namespace Aws\Token;

// Hack time() to returned the canned result.

function time()
{
    if (isset($_SERVER['aws_time'])) {
        return $_SERVER['aws_time'] === true
            ? 1640467800
            : $_SERVER['aws_time'];
    }

    return \time();
}

function strtotime($string)
{
    if (isset($_SERVER['aws_str_to_time'])) {
        return $_SERVER['aws_str_to_time'] === true
            ? 1640467800
            : $_SERVER['aws_str_to_time'];
    }

    return \strtotime($string);
}
