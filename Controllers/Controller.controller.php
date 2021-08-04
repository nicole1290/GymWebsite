<?php

abstract class Controller extends DataBase{

    protected $data = array();
    protected $view="";
    protected $head = array('title' => '', 'description' => '');

    //method used to process data
    //abstract function procecss($params);

    //method used to load a view
    public static function CreateView($viewName){
    
        require_once("./Views/". $viewName. ".php");
    
    }

    public static function openController($controllerName){
        require_once "./Controllers/".$controllerName.".controller.php";
    }

    //method used to redirect to another page
    public static function redirect($PageName){
    
        header("Location: ".$PageName);
        exit();
    
    }

    //Check if there is an admin account logged In currently
    // public static function accountAccessIsProhibited(){

    //     if(isset($_COOKIE['login']) && isset($_COOKIE['email'])){

    //         $CurrAccount = Account::retrieveAccount($_COOKIE['email']);

    //         $CurrAccID = $CurrAccount['ID'];

    //         if(Admin::isAdmin($CurrAccID)){
                
    //            return true;

    //         }else{
                
    //             return false;

    //         }

    //     }else{

    //         Controller::redirect('account');
        
    //     }

    // }

    // public static function openShowRoom(){
    //     header('Location: http://localhost/ShowRoom/index.html');
    //     exit();
    // }

}