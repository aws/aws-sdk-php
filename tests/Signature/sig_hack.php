<?php
namespace Aws\Signature;

use Aws\Test\Signature\SignatureV2Test;

// Hack gmdate() to returned the canned result.
function gmdate() {

    if (isset($_SERVER['aws_time'])) {
        switch (basename(debug_backtrace()[0]['file'])) {
            case 'SignatureV4.php':
                return '20110909T233600Z';
            case 'SignatureV2.php':
                return SignatureV2Test::DEFAULT_DATETIME;
        }
    }

    return call_user_func_array('gmdate', func_get_args());
}
