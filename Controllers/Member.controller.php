<?php

class Member extends Controller{

    public static function registrationParametersAreSet(){

        if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['gender'])
        &&isset($_POST['birthdate'])&&isset($_POST['phone'])&&isset($_POST['email'])
        &&isset($_POST['password'])){
            
            return true;
        
        }else{
        
            return false;
        
        }

    }

    public static function RegisterMember(){
        
        $account = new Member($_POST['firstname'],$_POST['lastname'],$_POST['gender'],$_POST['birthdate'],$_POST['phone'],$_POST['email']);
        
        $newAccountId = $account->registerNewAccount($_POST['password']);

        if($newAccountId != null){

            $account->registerMemberInformation($newAccountId);

            Controller::redirect('adminDashboard');

        }else{
            Controller::redirect('ErrorPage');
        }
        
    }

    public static function CreateView($viewName){
    
        if(Controller::accountAccessIsProhibited()){
                
            if($viewName == "newMember"){
            
                //TODO: Add the admin restriction here to allow only admins to enter this part

                Controller::CreateView('registerclient');
            
            }else{

                parent::CreateView($viewName);
            
            }

        }else{
            
            Controller::redirect('index.php');

        }
    
    }
}

if(isset($_POST['registerClient'])){

    if(Coaches::registrationParametersAreSet()){
        
        Coaches::RegisterCoach();
        
    }else{
        Controller::redirect("newCoach");
    }

}