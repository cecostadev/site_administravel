<?php


function resolve($route)
{
    $path = $_SERVER['PATH_INFO']  ?? '/';

    $route = '/^' . str_replace('/', '\/', $route) . '$/';

    if(preg_match($route, $path, $params)){
        return $params;
    }

    return false;

}

if(resolve('/')):
    require __DIR__ . '/public/site/routes.php';
elseif(resolve('/admin/?(.*)')):
    require __DIR__ . '/public/admin/routes.php';
endif;