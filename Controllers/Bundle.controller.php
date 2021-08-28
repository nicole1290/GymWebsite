<?php

class Bundle{

    public static function registrationProcessHasValidParameters(){

        if(isset($_POST['bundleName'])&&!empty($_POST['bundleName'])
        &&isset($_POST['bundlePrice'])&&!empty($_POST['bundleName'])
        &&isset($_POST['descriptionBundle'])&&!empty($_POST['descriptionBundle'])){
            return true;
        }else{
            return false;
        }

    }

    //Function used to regsiter New Bundles
    public static function registerNewBundle(){

        $Name = $_POST['bundleName'];
        $Price = $_POST['bundlePrice'];
        $Description = $_POST['descriptionBundle'];

        $result = Bundles::createNewBundle($Name,$Price,$Description);

        //TODO: adjust the redirections
        if($result){
            Controller::redirect('index.php');
        }else{
            Controller::redirect('ErrorPage');
        }

    }

}

if(isset($_POST['registerNewBundle'])){
    //TODO: Add restriction for access of registration Process
    if(Bundle::registrationProcessHasValidParameters()){
        Bundle::registerNewBundle();
    }
}