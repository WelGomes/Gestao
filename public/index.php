<?php

use Config\Routes;
use Src\Exception\RoutesException;

require_once __DIR__ . "/../vendor/autoload.php";

try {
    $file = __DIR__ . "/../";
    $dotenv = Dotenv\Dotenv::createImmutable($file);
    $dotenv->load();

    $uri    = $_SERVER["REQUEST_URI"];
    $method = $_SERVER["REQUEST_METHOD"];
    
    $routes = Routes::callRoutes(uri: $uri, method: $method)();

} catch(RoutesException $ex) {

    echo $ex->getMessage();

}
