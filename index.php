<?php

	ini_set("display_errors", 1);
	require 'route.php';
	$requestUrl = $_SERVER['QUERY_STRING'];

	$newRoute = new Route();

	// Add the routes
	$newRoute->add('', ['controller' => 'Home', 'action' => 'index']);
	$newRoute->add('/projects', ['controller' => 'Projects', 'action' => 'index']);
	$newRoute->add('/projects/new', ['controller' => 'Projects', 'action' => 'new']);
	    

	if ($newRoute->match($requestUrl)) {
		$chkall = $newRoute->getParams();
		if(file_exists("pages/".$chkall['controller'].".php")){

			require "pages/".$chkall['controller'].".php";
			$class_ = ucwords($chkall['controller']);
			$controller = new $class_;

			if($chkall['action'] == ""){
				$controller->index();
			}else{
				$action_ = $chkall['action'];
				$controller->$action_();
			}
		}else{
			echo "No controller found named: ".$chkall['controller'];
		}
	}else{
		echo "NOT FOUND";
	}	
?>