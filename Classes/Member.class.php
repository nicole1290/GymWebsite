<?php

class Member extends Account{

    public $yoe;
    public $diplomas;

    public function __construct($firstname,$lastname,$gender,$birthdate,$phoneNumber,$email){

        parent::__construct($firstname,$lastname,$gender,"member",$birthdate,$phoneNumber,$email);

    }

    public function registerMemberInformation($accountID,$yoe,$diplomas){

        $pdo = DataBase::getConnection();

        $statement = "INSERT INTO `member`(`account_id`) VALUES (?)";
        $parameters = [$accountID];

        $result = $pdo->query($statement,$parameters);

        return $result;

    }

    public static function isMember($AccountID){

        if(!Account::retrieveAccountType($AccountID)=='member'){
            return false;
        }

        $pdo = DataBase::getConnection();

        $statement = "SELECT * FROM `member` WHERE `account_id` = ?";
        $parameters = [$AccountID];

        $results = $pdo->query($statement,$parameters);

        foreach($results as $result){
            if($result['account_id']==$AccountID){
                return true;
            }
        }
        return false;
    }

    public function getType(){
        return "member";
    }

}