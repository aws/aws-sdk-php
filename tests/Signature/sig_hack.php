<?php
namespace Aws\Signature;

use Aws\Test\Signature\SignatureV2Test;

// Hack gmdate() to returned the canned result.
function gmdate($format, $ts = null) {

    if (isset($_SERVER['aws_time'])) {
        switch (basename(debug_backtrace()[0]['file'])) {
            case 'SignatureV4.php':
                if ($format == 'D, d M Y H:i:s \G\M\T') {
                    return 'Mon, 09 Sep 2011 23:36:00 GMT';
                }
                return '20110909T233600Z';
            case 'SignatureV2.php':
                return SignatureV2Test::DEFAULT_DATETIME;
        }
    }

    return gmdate($format, $ts ?: time());
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
