<?php

class Bundles{

    //This is the constructor
    public function __construct(){}

    //Function used to create a new Bundle
    public static function createNewBundle($Name,$Price,$Description){

        $pdo = DataBase::getConnection();

        $statement = "INSERT INTO `bundle`(`Name`, `Price`, `Description`) VALUES (?,?,?)";

        $parameters = [$Name,$Price,$Description];

        $result = $pdo->query($statement,$parameters);

        if($result){
            return true;
        }else{
            return false;
        }

    }

}