<?php
/**
 *
 *
*/
require_once "../../public/model/user.php";

if (isset($_POST['send'])) {
    //Assign data collected from the form signin-form.php
    $user= $_POST['user'];  
    $password= $_POST['password'];

    $userLogged = new User($user);


    //DB info
    $tableName = "player";

    //Load the content of the user-defined functions used to interact with MySQL
    include_once "../../db/Database.php";
    include_once "../../db/Create.php";
    include_once "../../db/Insert.php";
    include_once "../../db/Select.php";
  

    //Instanciate an object of the Create class used to create the database and table  
    //Create the database and tables
    $obj = new Create ();

    //Instanciate an object of Select Class to look for the user inside the database
    $obj = new Select ($tableName, $user, $password);
    $userLogged = $obj ->checkUser();
    echo "the user logged is ". $userLogged->getUserName();



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
