<?php
/**
 *
 *EXERCISE 16 VERSION 2
 *Patrick Saint-Louis, 2023
*/
include('../../config.php');
class Create extends Database {

    private $dbName;
    private $tableName;

    //Constructor method 
    public function __construct($db, $table){
        $this->dbName = $db;
        $this->tableName = $table;
        $this->createDBComponents();
    }

    //SQL query method
    private function sql(){
        $sql=array();
        $sql['createDB'] = "CREATE DATABASE IF NOT EXISTS " . $this->dbName;
        $sql['createTable'] = "CREATE TABLE IF NOT EXISTS " . $this->tableName . " (
                fName VARCHAR(50) NOT NULL, 
                lName VARCHAR(50) NOT NULL, 
                userName VARCHAR(20) NOT NULL UNIQUE,
                registrationTime DATETIME NOT NULL,
                id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
                registrationOrder INTEGER AUTO_INCREMENT,
                PRIMARY KEY (registrationOrder)
                )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; ";
        $sql['descTable'] = "DESC " . $this->tableName;
        $sql['insertDummyData1'] = "INSERT INTO " . $this->tableName . " (fName, lName, userName, registrationTime)
            VALUES('Patrick','Saint-Louis', 'sonic12345', now());";
        $sql['insertDummyData2'] = "INSERT INTO " . $this->tableName . " (fName, lName, userName, registrationTime)
            VALUES('Marie','Jourdain', 'asterix2023', now());";
        $sql['insertDummyData3'] = "INSERT INTO " . $this->tableName . " (fName, lName, userName, registrationTime)
            VALUES('Jonathan','David', 'pokemon', now());";

        return $sql;
        
    }

    //main method
    private function createDBComponents(){
        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-EXECUTE THE QUERY TO CREATE THE DATABASE IF IT DOESN'T EXIST YET
        $this->executeQuery($sql['createDB']);
        //3-SELECT THE DATABASE
        $this->selectDatabase($this->dbName);
        //4-EXECUTE THE QUERY TO CREATE THE TABLE IF IT DOESN'T EXIST YET
        $this->executeQuery($sql['createTable']);
        //5-EXECUTE THE QUERY TO DESCRIBE THE TABLE
        $this->executeQuery($sql['descTable']);
        
        $this->executeQuery($sql['insertDummyData1']);
        $this->executeQuery($sql['insertDummyData2']);
        $this->executeQuery($sql['insertDummyData3']);

        
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}