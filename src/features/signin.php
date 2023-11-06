<?php
/**
 *
 *
*/
require_once "../../public/model/userLogged.php";

if (isset($_POST['send'])) {
    //Assign data collected from the form signin-form.php
    $user= $_POST['user'];  
    $password= $_POST['password'];

    
    //Declare variables and constants
    $userLogged = new UserLogged($user);

    //Login info 
        
    //const DB = 'kidsGames'; //database's name

    //DB info
    $dbName = "kidsGames"; 
    $tableName = "player";

    //Load the content of the user-defined functions used to interact with MySQL
    include_once "../../db/Database.php";
    include_once "../../db/Create.php";
    include_once "../../db/Insert.php";
    include_once "../../db/Select.php";
  

    //Instanciate an object of the user-defined class used to create the database and table  
    //Create the database and table
    $obj = new Create ($dbName, $tableName);
    $obj = new Select ($dbName, $tableName, $user);
    $obj ->getUser($user);
     
    //$obj = new Select ($dbName, $tableName);


}
            

            
            
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Answer</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="back">
            <a href="index.php"><input type="submit" value="Try again!"></a>
        </div>
    </body>
</html>
