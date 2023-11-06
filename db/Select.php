<?php
/**
 *
 *EXERCISE 16 VERSION 2
 *Patrick Saint-Louis, 2023
*/
class Select extends Database {

    private $dbName;
    private $tableName;
    private $user;

    //Constructor method 
    public function __construct($db, $table, $user){
        $this->dbName = $db;
        $this->tableName = $table;
        $this->user = $user;
        //$this->selectAndDisplayFromTable();
    }



    //SQL query method
    private function sql(){
        $sql['descTable'] = "DESC " . $this->tableName;
        $sql['selectAllColumns'] = "SELECT * FROM " . $this->tableName;
        $sql['selectUser'] = "SELECT * FROM " . $this->tableName . " WHERE userName = '" . $this->user . "'";
        return $sql;
    }

  

    //display method
    private function displayTwoDimAssocArray($array){
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
        foreach($array as $section => $items){
            echo "<tr>";
            foreach($items as $key => $value){
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    //main method
    private function selectAndDisplayFromTable(){
        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-SELECT THE DATABASE
        $this->selectDatabase($this->dbName);
        //3-EXECUTE THE QUERY TO DESCRIBE THE TABLE
        $this->executeQuery($sql['descTable']);
        //4-EXECUTE THE QUERY TO SELECT FROM THE TABLE
        echo $sql['selectAllColumns'];
        $dataFound = $this->executeQuery($sql['selectAllColumns']);
        //5-DISPLAY THE DATA SELECTED
        $this->displayTwoDimAssocArray($dataFound);
    }

    public function getUser($user){
        require_once "../../public/model/userLogged.php";

        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-SELECT THE DATABASE
        $this->selectDatabase($this->dbName);
        //4-EXECUTE THE QUERY TO SELECT FROM THE TABLE
        $dataFound = $this->executeQuery($sql['selectUser']);
        //5-DISPLAY THE DATA SELECTED
        
        if (!empty($dataFound)) {
            //$string = var_export($dataFound, true);

            if(count($dataFound) === 1){
                $userLogged = new UserLogged($dataFound['row1']['userName']);
                echo $userLogged->getUserName();
            } 
            
        } else {
            echo "User with username '$username' not found.";
        }
            
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}