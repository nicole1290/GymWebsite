<?php

abstract class Controller extends DataBase
{

    protected $data = array();
    protected $view = "";
    protected $head = array('title' => '', 'description' => '');

    //method used to process data
    //abstract function procecss($params);

    //method used to load a view
    public static function CreateView($viewName)
    {

        require_once("./Views/" . $viewName . ".php");
    }

    public static function openController($controllerName)
    {
        require_once "./Controllers/" . $controllerName . ".controller.php";
    }

    //method used to redirect to another page
    public static function redirect($PageName, $parameters = [])
    {

        if ($parameters === []) {
            header("Location: " . $PageName);
            exit();
        } else {

            $params = Controller::generateGETQueryURL($parameters);

            header("Location: " . $PageName . $params);
        }
    }

    //Generating a unique token
    public static function generateToken()
    {
        return bin2hex(random_bytes(50));
    }

    //Generate the url part related to the GET parameters and returns it as string
    public static function generateGETQueryURL($parameters)
    {
        $firstElmntKey = array_key_first($parameters);
        
        $query = "?" . $firstElmntKey . "=" . $parameters[$firstElmntKey];

        array_shift($parameters);

        foreach ($parameters as $key => $val) {
            $query .= "&" . $key . "=" . $val;
        }

        return $query;
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
