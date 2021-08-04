<?php

class DataBase{

    private static $host = "127.0.0.1";
    private static $dbName = "powerlab";
    private static $userName = "root";
    private static $password = "";

    private static $instance;

    private $pdo;

    //private constructor
    
    private function __construct(){
        $this->pdo = $this->connect();
    }

    //Using the getInstance to obtain a Database Object
    public static function getConnection(): DataBase{
        
        $cls = static::class;
        
        if (!isset(self::$instance[$cls])) {
            self::$instance[$cls] = new static();
        }
        
        return self::$instance[$cls];
    
    }

    public function closeConnection(){
        if(isset($this->pdo)) unset($this->pdo);
        if(isset($instance)) unset($instance);
    }

    //Private function to connect to the database
    private function connect(){

        try{
            $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName,self::$userName,self::$password);
        
            //For Error Handling
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            //Setting the Default Fetching Mode
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        
            return $pdo;
        
        }catch(Exception $e){
        
            throw new Exception($e->getMessage());
        
        }

    }

    //Function to execute a query in the database
    //Returns an array of elements if the query is of type "SELECT".
    //Returns the Id of the new inserted row if the query is of type "INSERT".
    //Returns an integer that represents the number of rows affected by a query of type "DELETE".
    //Returns a boolean result that show the success/fail of a query if it is of type "UPDATE".
    public function query($query,$params = array()){
    
            $queryType = explode(' ',$query);

            if($queryType[0] == "SELECT"){  
                $statement = $this->pdo->prepare($query);
                $statement->execute($params);
                $data = $statement->fetchAll();
                return $data;
        
            }elseif($queryType[0] == "INSERT"){
           
                $statement = $this->pdo->prepare($query);
                $statement->execute($params);
                return $this->pdo->lastInsertId();
        
            }elseif($queryType[0]=="DELETE"){

                $statement = $this->pdo->prepare($query);
                $statement->execute($params);
                return $statement->rowCount();
        
            }elseif($queryType[0]=="UPDATE"){

                try{
                    
                    $statement = $this->pdo->prepare($query);
                    $statement->execute($params);
                    return $statement->rowCount() > 0;
                
                }catch(Exception $e){

                    $e->getMessage();
            
                }
            }
    
        
    
    }

    //Function that returns true if there at least 1 valid row for a given query of type "SELECT"
    public function hasValidResults($query){

        if(explode(' ',$query[0]=='SELECT') && count($this->query($query,[]))!=0)
            return true;
        return false;

    }

    public function countResult($query){

        $result = $this->pdo->query($query);
        $ctr = $result->fetchColumn();
        return $ctr;
        
    }

}