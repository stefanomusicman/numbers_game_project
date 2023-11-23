<?php

require_once "../../public/model/user.php";
class Select extends Database {

    private $user;
    private $password;
    private $registrationOrder = 0;

    //Constructor method 
    public function __construct($user, $password ){

        $this->user = $user;
        $this->password = $password;
        
    }

    public function setRegistrationOrder() {
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
                $this->registrationOrder = $dataFound['row1']['registrationOrder'];
            }
        }
    }


    //SQL query method
    private function sql(){
        $sql['descTable'] = "DESC player";
        $sql['selectUser'] = "SELECT * FROM player WHERE userName = '" . $this->user . "'";
        $sql['selectAuth'] = "SELECT * FROM authenticator WHERE registrationOrder = '". $this->registrationOrder."'";
        return $sql;
    }
    

    public function checkUserName(){
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
                $this->registrationOrder = $dataFound['row1']['registrationOrder'];
                return true;
            }
            return false;
        } else {
            return false;
        }
            
    }

    public function checkPassword() {
        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-SELECT THE DATABASE
        $this->selectDatabase(DBASE);
        //4-EXECUTE THE QUERY TO SELECT FROM THE TABLE
        $dataFound = $this->executeQuery($sql['selectAuth']);
        if (!empty($dataFound)) {
            if(count($dataFound) === 1){
                if($this->password === $dataFound['row1']['passCode']){
                    return true;
                }
                return false;
            }
            return false;
        } else {
            return false;
        }
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}