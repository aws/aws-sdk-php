<?php
namespace Aws\Exception;

use Aws\HasMonitoringEventsTrait;

class CredentialsException extends \RuntimeException {
    use HasMonitoringEventsTrait;
}
