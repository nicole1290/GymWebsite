<?php

class Membership
{

    public static function makeMembership(){

        if(isset($_COOKIE['email'])&&isset($_POST['StartDate'])&&isset($_POST['EndDate'])){

            $user_ID = Account::retrieveAccountID($_COOKIE['email']);

            //TODO: Retrieve the current Date as start Date 
            $start_date = $_POST['StartDate'];
            $end_date = $_POST['EndDate'];


            if(Memberships::checkValidMembership($user_ID)){

                //TODO: Retrieve the Bundle ID requested
                $result = Memberships::addMembership($start_date,$end_date,$user_ID,1);

                if($result){

                    Controller::redirect('index.php');

                }else{

                    Controller::redirect('Error');

                }
                
            }else{

                //TODO: Display Message that this user already has an active Membership

            }
        }
    }
}

if(isset($_POST['membership'])){

    Membership::makeMembership();

}