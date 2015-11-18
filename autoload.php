<?php
/**
 * @author Jenner <hypxm@qq.com>
 * @blog http://www.huyanping.cn
 * @license https://opensource.org/licenses/MIT MIT
 * @datetime: 2015/11/18 10:01
 */

spl_autoload_register(function($class_name){
    echo $class_name . PHP_EOL;
    if(strpos($class_name, 'Aws') !== 0){
        return;
    }

    $class_name = str_replace('\\', '/', $class_name);
    $filename = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .
        $class_name . '.php';
    echo $filename . PHP_EOL;
    require $filename;
});


var_dump(class_exists("\\Aws\\Api\\AbstractModel"));