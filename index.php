<?php
if (!isset($_SESSION)){
    //Redirect to the login form
    header('Location: public/form/signin-form.php'); 
    echo "hola mundo";
}
else {
    //Redirect to the appropriate game form level
    header('Location: game.php');
}
