<?php
function my_autoloader($class_name)
{
    $array_path = [
        './core/models/',
        './core/components/'
    ];

    foreach ($array_path as $item) {
        $path = $item . $class_name . '.php';
        if (is_file($path)) {
            include_once $path;
        }
    }
}