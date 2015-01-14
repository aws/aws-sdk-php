<?php
namespace Aws\Waiter;

/**
 * Hack usleep() to not actually sleep
 *
 * @param int $microSeconds
 * @return int
 */
function usleep($microSeconds = null)
{
    static $totalTime = 0;

    if ($microSeconds === 0) {
        $result = $totalTime;
        $totalTime = 0;
    } else {
        $result = ($totalTime += $microSeconds);
    }

    return $result;
}
