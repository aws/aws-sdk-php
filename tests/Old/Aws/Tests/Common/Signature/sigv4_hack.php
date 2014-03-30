<?php
/**
 * This file is used to override the gmdate function used in the SignatureV4
 * class so that it returns the mangled date present in the sigv4_testsuite.
 *
 * This function overrides PHP's global gmdate function in the
 * Aws\Common\Signature namespace. This override only overrides the gmdate
 * function when the exact timestamp from the testsuite is provided (again,
 * the date that is overridden is invalid so this is a safe hack for the
 * test suite).
 */

namespace Aws\Common\Signature
{
    use Aws\Common\Enum\DateFormat;

    function gmdate($format, $timestamp)
    {
        if ($timestamp != strtotime('Mon, 09 Sep 2011 23:36:00 GMT')) {
            return \gmdate($format, $timestamp);
        }

        $mapping = array(
            DateFormat::RFC1123 => 'Mon, 09 Sep 2011 23:36:00 GMT',
            DateFormat::ISO8601 => '20110909T233600Z',
            DateFormat::SHORT   => '20110909'
        );

        return $mapping[$format];
    }
}
