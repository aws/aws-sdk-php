<?php
namespace Aws\Exception;

use Aws\HasMonitoringEventsTrait;

class UnresolvedApiException extends \RuntimeException {
    use HasMonitoringEventsTrait;
}
