<?php
Phar::mapPhar('aws.phar');
define('AWS_PHAR', true);
define('AWS_FILE_PREFIX', 'phar://aws.phar');
return (require 'phar://aws.phar/aws-autoloader.php');
__HALT_COMPILER();
