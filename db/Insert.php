<?php

class Insert extends Database {

    private $dbName;
    private $tableName;

    //Constructor method 
    public function __construct($db, $table, $fname, $lname, $userName){
        $this->dbName = $db;
        $this->tableName = $table;
        $this->insertToTable($fname, $lname, $userName);
    }

    //SQL query method
    private function sql($theFirstName, $theLastName, $uName){
        $sql['descTable'] = "DESC " . $this->tableName;
        $sql['insertAllColumns'] = "INSERT INTO " . $this->tableName . " (firstname, lastname, userName)
            VALUES ('$theFirstName', '$theLastName', '$uName');";
        return $sql;
    }

    //main method
    private function insertToTable($fn, $ln, $em){
        //Assign sql query
        $sql = $this->sql($fn, $ln, $em);
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-SELECT THE DATABASE
        $this->selectDatabase($this->dbName);
        //3-EXECUTE THE QUERY TO DESCRIBE THE TABLE
        $this->executeQuery($sql['descTable']);
        //4-EXECUTE THE QUERY TO INSERT INTO THE TABLE
        $this->executeQuery($sql['insertAllColumns']);
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}