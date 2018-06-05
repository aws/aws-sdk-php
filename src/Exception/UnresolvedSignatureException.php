<?php
namespace Aws\Exception;

use Aws\HasMonitoringEventsTrait;

class UnresolvedSignatureException extends \RuntimeException {
    use HasMonitoringEventsTrait;
}
