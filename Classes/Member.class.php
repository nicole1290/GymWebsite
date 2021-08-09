<?php

class Member extends Account{

    public $yoe;
    public $diplomas;

    public function __construct($firstname,$lastname,$gender,$birthdate,$phoneNumber,$email){
        parent::__construct($firstname,$lastname,$gender,"member",$birthdate,$phoneNumber,$email);

    }

    //Nicole start
    public static function isAdmin($AccountID){
        $pdo = DataBase::getConnection();
        $statement="SELECT * FROM `admin` WHERE `account_id` = ?";
        $parameters = [$AccountID];

        $results = $pdo->query($statement,$parameters);
        //returns number of rows found
        $row=$pdo->rowCount();
        if($row==1)
            return true;            
        return false;    
    }
    //Nicole End

    public static function isAlreadyMember($email){
        $pdo = DataBase::getConnection();
        $statement = "SELECT * FROM `account` WHERE `email` = ?";
        $parameters = [$AccountID];
        $results = $pdo->query($statement,$parameters);
        $row=$pdo->rowCount();
        if($row==1)
            return true;            
        return false;    
    }

    public function registerMemberInformation($accountID){

        $pdo = DataBase::getConnection();
        $statement = "INSERT INTO `member`(`account_id`) VALUES (?)";
        $parameters = [$accountID];

        $result = $pdo->query($statement,$parameters);

        return $result;

    }
    

    public function getType(){
        return "member";
    }

}

$member = new Member();
echo 'test';
// $result = Member::isAdmin(2);
// echo $result;