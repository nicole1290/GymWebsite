<?php

class Register extends Controller{

    private $result = false;

    public function __construct()
    {
        $account = new Member($_POST['firstname'],$_POST['lastname'],$_POST['gender'],$_POST['birthdate'],$_POST['phone'],$_POST['email']);     
        $this->result = $account->registerNewAccount($_POST['password']);
    }

    public static function parametersSet(){

        if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['gender'])&&isset($_POST['type'])&&isset($_POST['birthdate'])
        &&isset($_POST['phone'])&&isset($_POST['email'])&&isset($_POST['password'])){
            return true;
        }else{
            return false;
        }
    }

    public function getResult(){
        return $this->result;
    }

}

if(isset($_POST['submit'])){
    if(Register::parametersSet()){
        $registration = new Register();
        Register::redirect('index.php');
    }
}