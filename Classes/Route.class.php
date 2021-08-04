<?php

class Route{

    //Arrays containing the valid URL's
    public static $validRoutes = array();

    //Function to set the valid URL
    public static function set($route,$function){
 
        self::$validRoutes[] = $route;

        if($_GET['url'] == $route){
            
            $function->__invoke();
        
        }
    }

}

