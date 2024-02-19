<?php

namespace Aws\Auth\Exception;

use Aws\HasMonitoringEventsTrait;
use Aws\MonitoringEventsInterface;

/**
 * Represents an error when attempting to resolve authentication.
 */
class AuthException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
