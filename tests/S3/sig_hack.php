<?php
namespace Aws\S3;

require __DIR__ . '/../Signature/sig_hack.php';

// Hack gmdate() to returned the canned result.
function gmdate($format, $ts = null)
{
    return \Aws\Signature\gmdate($format, $ts);
}
