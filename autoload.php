<?php
/**
 * @author Jenner <hypxm@qq.com>
 * @blog http://www.huyanping.cn
 * @license https://opensource.org/licenses/MIT MIT
 * @datetime: 2015/11/18 10:01
 */

spl_autoload_register(function($class_name){
    $prefix = 'Aws\\';
    if(strpos($class_name, $prefix) !== 0){
        return;
    }
    $class_name = substr($class_name, strlen($prefix));

    $class_name = str_replace('\\', '/', $class_name);
    $filename = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .
        $class_name . '.php';

    require $filename;
});

var_dump(class_exists("\\Aws\\Api\\ListShape"));