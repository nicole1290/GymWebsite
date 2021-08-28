<?php

class Memberships{

    //This is the constructor
    public function __construct($start_date,$end_date,$user_ID,$bundle_ID){
        
        $this->user_ID = $user_ID;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->bundle_ID = $bundle_ID;

    }

    public static function addMembership($start_date, $end_date, $user_ID, $bundle_ID){

        $pdo = DataBase::getConnection();

        $statement = "INSERT INTO `membership`(`Start_date`, `End_date`, `UserID`, `BundleID`,`Active`) VALUES (?,?,?,?,true)";

        $parameters = [$start_date,$end_date,$user_ID,$bundle_ID];

        $results = $pdo->query($statement,$parameters);

        if($results){

            return true;
        
        }else{
        
            return false;
        
        }
    }

    public static function checkValidMembership($AccountID){

        $pdo = DataBase::getConnection();

        $statement = "SELECT * FROM `membership` WHERE `UserID` = ? AND CURDATE() between `Start_date` and `End_date` AND `Active` = 1 ";
        $parameters = [$AccountID];

        return $pdo->hasValidResults($statement,$parameters);

    }

}