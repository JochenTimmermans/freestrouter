<?php
namespace freest\router;

class Router 
{
    private $routes;
    private $routemap;
    
    public function __construct() 
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = $this->filterBase($uri);        
        $exp = explode('/',$uri);

        // filter all empties
        $routes = array();
        foreach ($exp as $e) {
            if ($e != "") {
                array_push($routes, $e);
            }
        }
        
        //echo 'URI: '.$uri.'<br/>';
        //var_dump($routes);
        
        
        
    }
    
    public function route(string $route, $return)
    {
        $this->routemap[] = array(explode('/',$route),$return);
    }
    
    public function get()
    {
        
        echo var_dump($this->routes);
        echo 'routes[0]: '.$this->routes[0];
        
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
        
    
    // dus ... eerst de eerste twee filteren
    private function filterBase(string $uri): string 
    {
        if (strstr($uri, BASE_ROUTE)) {
            $pos = strpos($uri, BASE_ROUTE);
            //echo $pos.'</br>';
            $pos += strlen(BASE_ROUTE); 
            //echo $pos.'</br>';
            return substr($uri, $pos);
        }
        else {
            return $uri;
        }
    }
    
}
