<?php

spl_autoload_register(function ($name)
{
    $parts = explode ('\\', $name);
    $path = implode(DIRECTORY_SEPARATOR, $parts);

    $file = "models" . DIRECTORY_SEPARATOR
                     . "{$path}.php";

    if(!file_exists($file) || !is_file($file))
        die("file not found");

    include_once $file;

    if(!class_exists($path)
        and !trait_exists($path)
        and !interface_exists($path))
            die("Object not found");
});