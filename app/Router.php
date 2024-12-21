<?php

namespace App;

class Router
{
    private $routes = [];
    private $basePath = '/'; 


    public function __construct($basePath = '/')
    {
        $this->basePath = $basePath;
    }


    public function get($uri, $callback)
    {

        $uri = $this->basePath . $uri;
        $this->routes['GET'][$uri] = $callback;
    }


    public function post($uri, $callback)
    {
        
        $uri = $this->basePath . $uri;
        $this->routes['POST'][$uri] = $callback;
    }

   
    public function handle($method, $uri)
    {
        $callback = $this->routes[$method][$uri] ?? null;

        if (!$callback) {
            http_response_code(404);
            return '404 Not Found';
        }

        if (is_array($callback) && class_exists($callback[0]) && method_exists($callback[0], $callback[1])) {
            $controller = new $callback[0]();
            return call_user_func([$controller, $callback[1]]);
        }
        return call_user_func($callback);
    }

}
