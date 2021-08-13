<?php

class Mail{

    public static function sendRegistrationMail($receiver,$AccountID,$verificationToken){

        $type = "registrationMail";
        $subject = "Registration Mail";

        $account = Account::retrieveAccount($AccountID);

        $data = array(
            "{SITE_ADDRESS}" => "localhost/gymWebsite",
            "{User_Name}" => $account['firstname'],
            "{mail}" => $account['email'],
            "{verificationToken}" => $verificationToken
        );

        $mail = MailServer::getInstance();
        $mail->sendMail($type,$subject,$receiver,$data);

    }

    

}