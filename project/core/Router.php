<?php
namespace Core;

class Router
{
    protected $routes = ROUTES;

    public function direct($uri)
    {   
        if (array_key_exists($uri, $this->routes)) {
            return $this->init(...$this->getController($this->routes[$uri]));
        } else {
            foreach ($this->routes as $key => $val) {
                $pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $key). "$@";
                preg_match($pattern, $uri, $matches);
                array_shift($matches);
                if ($matches) {
                    $arr = $this->getController($val);
                    $arr[] = $matches;
                    return $this->init(...$arr);
                }
            }
            return $this->init(...$this->getController($this->routes['404']));
        }
    }

    private function getController($path)
    {
        list($controller, $action) = explode('@', $path);
        return array ($controller, $action);
    }

    protected function init($controller, $action, $vars = [])
    {
        $controller = CONTROLLERS.$controller;
        $controller = new $controller;
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        return $controller->$action($vars);
    }
}
