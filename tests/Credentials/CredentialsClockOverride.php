<?php
namespace Aws\Credentials;

// Lets tests set the current time by assigning a timestamp to $_SERVER['aws_time'].

function time()
{
    if (isset($_SERVER['aws_time'])) {
        return $_SERVER['aws_time'] === true
            ? 1792065600
            : $_SERVER['aws_time'];
    }

    return \time();
}
