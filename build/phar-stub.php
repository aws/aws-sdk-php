<?php
/**
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 * http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

Phar::mapPhar('aws.phar');

define('AWS_PHAR', true);
define('AWS_FILE_PREFIX', 'phar://aws.phar');

// Copy the cacert.pem file from the phar if it is not in the temp folder.
$from = 'phar://aws.phar/Guzzle/Http/Resources/cacert.pem';
$certFile = sys_get_temp_dir() . '/guzzle-cacert.pem';

// Only copy when the file size is different
if (!file_exists($certFile) || filesize($certFile) != filesize($from)) {
    if (!copy($from, $certFile)) {
        throw new RuntimeException("Could not copy {$from} to {$certFile}: "
            . var_export(error_get_last(), true));
    }
}

return (require 'phar://aws.phar/aws-autoloader.php');

__HALT_COMPILER();
