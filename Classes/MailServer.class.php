<?php

class MailServer
{

    private $mail_Address;
    private $site_address;
    private $headers;
    private $templates_path;

    //Array of strings that will contain the mail receiver(s)
    private static $mail_to = array();

    //Array of strings that will contain all the available email templates 
    private static $templates = array();

    public static $instance;

    //private constructor
    private function __construct(){}

    //Get instance of the Class
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //Send mail to the a given recepient
    public function sendMail($type, $subject, $recepient, $data){

        $templates_path = "./assets/emailTemplate/";
        $template_name = $templates_path . $type.'.php';

        $mail_Address = "marounnawwar@gmail.com";

        $headers  =
            'From: PowerLab <'.$mail_Address.'>' . "\r\n"
            . 'MIME-Version: 1.0' . "\r\n"
            . 'Content-type: text/html; charset=ISO-8859-1' . "\r\n";


        if (file_exists($template_name)) {
            $message = file_get_contents($template_name);
        } else {
            die("unable to find the registration template");
        }

        foreach (array_keys($data) as $key) {
            if (strlen($key) > 2 && trim($key) != "") {
                $message = str_replace($key, $data[$key], $message);
            }
        }

        //send mail to the targetted receiver
        if (mail($recepient, $subject, $message, $headers)) {
           
            echo "Success";
            //TODO: redirect to Membership page
        
        } else {
         
            echo "Email sending failed";
            //TODO: Generate fail message

        }

    }
    
}
