<?php
namespace Aws\Common\Signature;

use Aws\Test\Common\Signature\SignatureV2Test;
use Aws\Test\Common\Signature\SignatureV3HttpsTest;

// Hack gmdate() to returned the canned result.
function gmdate() {

    if (isset($_SERVER['aws_time'])) {
        switch (basename(debug_backtrace()[0]['file'])) {
            case 'SignatureV4.php':
                return '20110909T233600Z';
            case 'SignatureV2.php':
                return SignatureV2Test::DEFAULT_DATETIME;
            case 'SignatureV3Https.php':
                return SignatureV3HttpsTest::DEFAULT_DATETIME;
        }
    }

    return call_user_func_array('gmdate', func_get_args());
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
