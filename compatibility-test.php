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

// Run this script from the command line to see if your system is able to run the AWS SDK for PHP

class CompatibilityTest
{
    protected $isCli;
    protected $lines = array();

    public function __construct()
    {
        $this->isCli = php_sapi_name() == 'cli';
        $title = 'AWS SDK for PHP Compatibility Test';
        if ($this->isCli) {
            $rep = str_repeat('=', strlen($title));
            $this->lines[] = "{$rep}\n{$title}\n{$rep}";
        } else {
            $this->lines[] = sprintf(
                '<style type="text/css">%s %s</style>',
                'html {font-family:verdana;} .OK {color: #166116;}',
                '.FAIL {margin-top: 1em; color: #A52C27;} .WARNING {margin-top: 1em; color:#6B036B;}'
            );
            $this->lines[] = "<h1>{$title}</h1>";
        }
    }

    public function endTest()
    {
        $text = implode("\n", $this->lines);
        echo $this->isCli ? $text : "<html><body>{$text}</body></html>";
    }

    public function title($text)
    {
        $this->lines[] = $this->isCli
            ?  "\n" . $text . "\n" . str_repeat('-', strlen($text)) . "\n"
            : "<h2>{$text}</h2>";
    }

    public function write($text)
    {
        $this->lines[] = $text;
    }

    public function quote($text)
    {
        return !$this->isCli
            ? "<pre>{$text}</pre>"
            : implode("\n", array_map(function ($t) { return '    ' . $t; }, explode("\n", $text)));
    }

    public function check($info, $func, $text, $required)
    {
        $level = $func() ? 'OK' : ($required ? 'FAIL' : 'WARNING');
        if ($this->isCli) {
            $text = $level == 'OK' ? "- {$info}: [OK]" : "- {$info}: [{$level}]\n  - {$text}";
        } else {
            $text = $level == 'OK'
                ? "<span class=\"{$level}\">{$info}</span><br />"
                : "<div class=\"{$level}\">{$info}: [{$level}]<br /><blockquote>{$text}</blockquote></div>";
        }
        $this->write($text);
    }

    public function addRecommend($info, $func, $text)
    {
        $this->check($info, $func, $text, false);
    }

    public function addRequire($info, $func, $text)
    {
        $this->check($info, $func, $text, true);
    }

    public function iniCheck($info, $setting, $expected, $required = true, $help = null)
    {
        $current = ini_get($setting);
        $cb = function () use ($current, $expected) {
            return is_callable($expected)
                ? call_user_func($expected, $current)
                : $current == $expected;
        };

        $message = sprintf(
            '%s in %s is currently set to %s but %s be set to %s.',
            $setting,
            php_ini_loaded_file(),
            var_export($current, true),
            $required ? 'must' : 'should',
            var_export($expected, true)
        ) . ' ' . $help;

        $this->check($info, $cb, trim($message), $required);
    }

    public function extCheck($ext, $required = true, $help = '')
    {
        $info = sprintf('Checking if the %s extension is installed', $ext);
        $cb = function () use ($ext) { return extension_loaded($ext); };
        $message = $help ?: sprintf('The %s extension %s be installed', $ext, $required ? 'must' : 'should');
        $this->check($info, $cb, $message, $required);
    }
}

$c = new CompatibilityTest();
$c->title('System requirements');
$c->addRequire(
    'Ensuring that the version of PHP is >= 5.3.3',
    function () { return version_compare(phpversion(), '5.3.3', '>='); },
    'You must update your version of PHP to 5.3.3 to run the AWS SDK for PHP'
);

$c->iniCheck('Ensuring that detect_unicode is disabled', 'detect_unicode', false, true, 'Enabling detect_unicode may cause errors when using phar files. See https://bugs.php.net/bug.php?id=42396');
$c->iniCheck('Ensuring that session.auto_start is disabled', 'session.auto_start', false);

if (extension_loaded('suhosin')) {
    $c->addRequire(
        'Ensuring that phar files can be run with the suhosin patch',
        function () {
            return false !== stripos(ini_get('suhosin.executor.include.whitelist'), 'phar');
        },
        sprintf('suhosin.executor.include.whitelist must be configured to include "phar" in %s so that the phar file works correctly', php_ini_loaded_file())
    );
}

foreach (array('pcre', 'spl', 'json', 'dom', 'simplexml', 'curl') as $ext) {
    $c->extCheck($ext, true);
}

if (function_exists('curl_version')) {
    $c->addRequire('Ensuring that cURL can send https requests', function () {
        $version = curl_version();
        return in_array('https', $version['protocols'], true);
    }, 'cURL must be able to send https requests');
}

$c->addRequire('Ensuring that file_get_contents works', function () {
    return function_exists('file_get_contents');
}, 'file_get_contents has been disabled');

$c->title('System recommendations');

$c->addRecommend(
    'Checking if PHP version is >= 5.4.1',
    function () { return version_compare(phpversion(), '5.4.1', '>='); },
    'You are using an older version of PHP (' . phpversion() . '). Consider updating to PHP 5.4.1 or newer to improve the performance and stability of the SDK.'
);

$c->addRecommend('Checking if you are running on a 64-bit platform', function () {
    return PHP_INT_MAX === 9223372036854775807;
}, 'You are not running on a 64-bit installation of PHP. You may run into issues uploading or downloading files larger than 2GB.');

$c->iniCheck('Ensuring that zend.enable_gc is enabled', 'zend.enable_gc', true, false);

$c->check('Ensuring that date.timezone is set', function () {
    return (bool) ini_get('date.timezone');
}, 'The date.timezone PHP ini setting has not been set in ' . php_ini_loaded_file(), false);

if (extension_loaded('xdebug')) {
    $c->addRecommend('Checking if Xdebug is installed', function () { return false; }, 'Xdebug is installed. Consider uninstalling Xdebug to make the SDK run much faster.');
    $c->iniCheck('Ensuring that Xdebug\'s infinite recursion detection does not erroneously cause a fatal error', 'xdebug.max_nesting_level', 0, false);
}

$c->extCheck('openssl', false);
$c->extCheck('zlib', false);
$c->extCheck('uri_template', false, 'Installing the uri_template extension will make the SDK faster. Install using pecl install uri_template-alpha');

// Is an opcode cache installed or are they running >= PHP 5.5?
$c->addRecommend(
    'Checking if an opcode cache is installed',
    function () {
        return version_compare(phpversion(), '5.5.0', '>=') || extension_loaded('apc') || extension_loaded('xcache');
    },
    'You are not utilizing an opcode cache. Consider upgrading to PHP >= 5.5 or install APC.'
);

$c->title('PHP information');
ob_start();
phpinfo(INFO_GENERAL);
$info = ob_get_clean();
$c->write($c->quote($info));

$c->endTest();
