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

        $token = Controller::generateToken();
        
        $account = new Members($_POST['firstname'], $_POST['lastname'], $_POST['gender'], $_POST['birthdate'], $_POST['phone'], $_POST['email']);

        $newAccountId = $account->CreateNewAccount($token);

        if ($newAccountId != null) {

            setcookie('login',true,time() + (86400 * 30 * 3),"/");
            setcookie('email',$_POST['email'],time() + (86400 * 30 * 3),"/");

            //Send Confirmation mail
            Mail::sendRegistrationMail($_POST['email'],$newAccountId);

            //TODO:: Open the registration succeed alert and open the membership page

        } else {
            
        }
    }

}

if (isset($_POST['registerNewMember'])) {

    if (Account::isAdmin(1) && Member::registrationParametersAreSet()) {

        Member::RegisterMember();
        
    } else { //Case where the user's access is not prohibited

        Controller::redirect('javascript://history.go(-1)');

    }
}
