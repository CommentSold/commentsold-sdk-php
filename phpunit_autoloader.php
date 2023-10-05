<?php

function commentsoldAutoload($class)
{
    $parts = explode('\\', $class);
    if (array_shift($parts) == 'CommentSold') {
        array_unshift($parts, 'src');
        array_unshift($parts, __DIR__);
        $file = implode('/', $parts).'.php';
        if (is_file($file)) {
            require_once $file;
        } else {
            exit($file);
        }
    }

    return true;
}

function commentsoldTestAutoload($class)
{
    $parts = explode('\\', $class);
    if (array_shift($parts) == 'CommentSoldTest') {
        array_unshift($parts, 'tests');
        array_unshift($parts, __DIR__);
        $file = implode('/', $parts).'.php';
        if (is_file($file)) {
            require_once $file;
        }
    }

    return true;
}

spl_autoload_register('commentsoldAutoload');
spl_autoload_register('commentsoldTestAutoload');
