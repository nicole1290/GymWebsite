<?php

class Mail{

    public static function sendRegistrationMail($receiver,$AccountID){

        $type = "registrationMail";
        $subject = "Registration Mail";

        $account = Account::retrieveAccount($_COOKIE['email']);

        $data = array(
            "{SITE_ADDRESS}" => "localhost/gymWebsite",
            "{User_Name}" => $account['firstname']
        );

        $mail = MailServer::getInstance();
        $mail->sendMail($type,$subject,$receiver,$data);


    }

}