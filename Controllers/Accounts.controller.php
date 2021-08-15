<?php

class Accounts extends Controller{

    private $ID;
    private $firstname;
    private $lastname;
    private $gender;
    private $type;
    private $birthdate;
    private $phoneNumber;
    private $email;

    public function __construct($firstname,$lastname,$gender,$type,$birthdate,$phoneNumber,$email){

        $this->firstname = $firstname;
        $this->lastname = $lastname; 
        $this->gender = $gender;
        $this->type = $type;
        $this->birthdate = $birthdate;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;

    }

    //Checks if there is a currently Logged In account
    public static function isLoggedIn(){
        
        if(isset($_COOKIE['login'])&&isset($_COOKIE['email']))
            return true;
        return false;
    }

    public static function messageParametersSet(){
        if(isset($_POST['Contactname'])&&isset($_POST['Contactemail'])&&
        isset($_POST['Contactsubject'])&&isset($_POST['Contactmessage'])){
            return true;
        }else{
            return false;
        }
    }

    //Function used to verify the login
    public static function logIn(){

        if(Account::loginAuthentication($_GET['mail'],$_GET['password'])){
            
            setcookie('login',true,time() - 3600,"/");
            setcookie('email',$_GET['mail'],time() - 3600 ,"/");

            //TODO: Add Redirection
            Controller::redirect('index.php');

        }else{

            //TODO: Add reply msg on UI that alerts authentication failure
            echo 'Login failed';

        }

    }

    //Function used to LogOut
    public static function logOut(){

        setcookie('login',true,time() - 3600,"/");
        setcookie('email',$_POST['email'],time() - 3600 ,"/");
        Controller::redirect('account');

    }

    // public static function CreateView($viewName){
    
    //     if($viewName == "account"){
        
    //         if(Accounts::isLoggedIn()){//Checks if there is an already logged In Account

    //             //Will Have to fetch The current Account's Information and then display It.
    //             $accountData = Account::retrieveAccount($_COOKIE['email']);

    //             new AccountEditView($accountData);

    //         }else{

    //             Controller::redirect('login');

    //         }
        
    //     }
    // }

    //Getters and Setters
    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getGender(){
        return $this->gender;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function getMail(){
        return $this->email;
    }

    public function setFirstname($newFirstName){
        $this->firstname = $newFirstName;
    }

    public function setLastname($newLastName){
        $this->lastname = $newLastName;
    }

    public function setGender($newGender){
        $this->gender = $newGender;
    }

    public function setBirthdate($newBirthDate){
        $this->birthdate = $newBirthDate;
    }

    public function setPhoneNumber($newPhoneNumber){
        $this->phoneNumber = $newPhoneNumber;
    }

    public function setMail($newMail){
        $this->email = $newMail;
    }

}

if(isset($_GET['mail'])&&isset($_GET['password'])){
    
    Accounts::logIn();
        
}