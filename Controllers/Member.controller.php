<?php

class Member extends Controller
{

    public static function registrationParametersAreSet(){

        if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['gender'])
            && isset($_POST['birthdate']) && isset($_POST['phone']) && isset($_POST['email']))
            return true;
        else
            return false;
    }
    

    public static function RegisterMember(){

        $verificationToken = Controller::generateToken();
        
        $account = new Members($_POST['firstname'], $_POST['lastname'], $_POST['gender'], $_POST['birthdate'], $_POST['phone'], $_POST['email']);

        $newAccountId = $account->CreateNewAccount($verificationToken);

        if ($newAccountId != null) {

            setcookie('login',true,time() + (86400 * 30 * 3),"/");
            setcookie('email',$_POST['email'],time() + (86400 * 30 * 3),"/");

            //Send Confirmation mail
            Mail::sendRegistrationMail($_POST['email'],$newAccountId,$verificationToken);

            //TODO:: Open the registration succeed alert and open the membership page

        } else {
            
        }
    }

    public static function confirmActivation(){

        $mail = MailServer::getInstance();

        $result = $mail->verifyActivationCode($_GET['token'],$_GET['email']);

        if($result){

            Controller::redirect('RegistrationNewPassword');

        }else{
            
            Controller::redirect('ErrorPage');
        
        }

    }

    public static function setPassword(){

        

    }

}

//Catch the request for new Member registration
if (isset($_POST['registerNewMember'])) {

    if (Account::isAdmin(1) && Member::registrationParametersAreSet()) {

        Member::RegisterMember();
        
    }else{//Case where the user's access is not prohibited

        Controller::redirect('javascript://history.go(-1)');

    }
}

//Catch the request for mail registration confirmation
if(isset($_GET['token'])&&!empty($_GET['token'])
   &&isset($_GET['email'])&&!empty($_GET['email'])){

    Member::confirmActivation();

}

if(isset($_GET['password'])&&isset($_GET['passwordConfirmation'])
    &&!empty($_GET['password'])&&!empty($_GET['passwordConfirmation'])){

    Member::setPassword();

}