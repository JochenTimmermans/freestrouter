<?php
namespace freest\router;

class Router 
{
    private $routes;
    private $routemap;
    
    public function __construct() 
    {
        $uri = $_SERVER['REQUEST_URI'];
        $exp = explode('/',$uri);

        if ($exp[0] == "" || $exp[0] == BASE_ROUTE) {
            array_shift($exp);
            if ($exp[0] == "" || $exp[0] == BASE_ROUTE) {
                array_shift($exp);
            }
        }
        $exp2 = array();
        foreach ($exp as $e) {
            if ($e != "") {
                $exp2[] = $e;
            }
        }
        $this->routes = $exp2;
    }
    
    public function route(string $route, $return)
    {
        $this->routemap[] = array(explode('/',$route),$return);
    }
    
    public function get()
    {
        /*
        echo var_dump($this->routes);
        echo 'routes[0]: '.$this->routes[0];
        */
        if (isset($this->routes[0])) {
            foreach ($this->routemap as $rm) {
                if ($rm[0][0] == $this->routes[0]) {
                
                    return $rm[1];
                }
            }
        }
        else {
            return '0';
        }
    }
    
}
