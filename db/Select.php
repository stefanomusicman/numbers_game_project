<?php

require_once "../../public/model/user.php";
class Select extends Database {

    private $tableName;
    private $user;
    private $password;

    //Constructor method 
    public function __construct($table, $user, $password ){

        $this->tableName = $table;
        $this->user = $user;
        $this->password = $password;
    }



    //SQL query method
    private function sql(){
        $sql['descTable'] = "DESC " . $this->tableName;
        $sql['selectAllColumns'] = "SELECT * FROM " . $this->tableName;
        $sql['selectUser'] = "SELECT * FROM " . $this->tableName . " WHERE userName = '" . $this->user . "'";
        return $sql;
    }

    public function checkUser(){

        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-SELECT THE DATABASE
        $this->selectDatabase(DBASE);
        //4-EXECUTE THE QUERY TO SELECT FROM THE TABLE
       
        $dataFound = $this->executeQuery($sql['selectUser']);
        if (!empty($dataFound)) {
        
            if(count($dataFound) === 1){
                $userLogged = new User($dataFound['row1']['userName']);
                
                return $userLogged;
            } 
        } else {
            return $userNotFound = new User("");
        }
            
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}