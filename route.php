<?php

class Route{
	protected $params = [];
	protected $routes = [];

    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
    	foreach ($this->routes as $key => $value) {
    		if($url == $key){
    			$this->params = $value;
    			return true;
    		}
    	}
    	return false;
    }

    public function getParams()
    {
    	return $this->params;
    }
}
?>