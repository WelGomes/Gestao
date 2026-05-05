<?php

namespace Config;

use Src\Exception\RoutesException;
use Src\Middleware\Auth;

final class Routes 
{
    private Auth $auth;

    public function __construct() {
        $this->auth = new Auth();
    }
    
    public function callRoutes(string $uri, string $method): callable
    {
        $routeArray = [
            "GET"  => [
                "/"          => fn() => self::instantiateClass(class: "LoginController", method: "index", api: false),
                "/home"      => fn() => self::instantiateClass(class: "LoginController", method: "show", api: false, authMethod: $this->auth->verifySession()),
            ],
            "POST" => [
                "/api/login" => fn() => self::instantiateClass(class: "LoginController", method: "show", api: true),
            ]
        ];

        if(!array_key_exists($uri, $routeArray[$method])) {
            throw new RoutesException("$uri não existe essa rota no method $method");
        }

        return $routeArray[$method][$uri]();
    }

    private function instantiateClass(string $class, string $method, bool $api = false, ?callable $authMethod = null): callable
    {
        if(!is_null($authMethod)) {
            $this->auth->$authMethod();
        }

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
