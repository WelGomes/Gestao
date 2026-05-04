<?php

namespace Config;

use Src\Exception\RoutesException;

abstract class Routes 
{
    public static function callRoutes(string $uri, string $method): callable
    {
        $routeArray = [
            "GET"  => [
                "/"          => fn() => self::instantiateClass(class: "UserController", method: "index", api: false),
                "/home"      => fn() => self::instantiateClass(class: "UserController", method: "show", api: false),
            ],
            "POST" => [
                "/api/login" => fn() => self::instantiateClass(class: "UserAPIController", method: "show", api: true),
            ]
        ];

        if(!array_key_exists($uri, $routeArray[$method])) {
            throw new RoutesException("$uri não existe essa rota no method $method");
        }

        return $routeArray[$method][$uri]();
    }

    private static function instantiateClass(string $class, string $method, bool $api = false): callable
    {
        if($api) {
            $dirClass = "\Src\Controller\API\\$class";
        } else {
            $dirClass = "\Src\Controller\\$class";
        }

        
        if(!class_exists($dirClass)) {
            throw new RoutesException("A classe $class não existe no Controller");
        }

        $class = new $dirClass();

        if(!method_exists($class, $method)) {
            throw new RoutesException("O método $method não existe na classe");
        }

        return fn() => $class->$method();
    }
}
