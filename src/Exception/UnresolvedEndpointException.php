<?php
namespace Aws\Exception;

use Aws\HasMonitoringEventsTrait;

class UnresolvedEndpointException extends \RuntimeException {
    use HasMonitoringEventsTrait;
}
