<?php

include_once '../../db/Database.php';
require_once '../../config.php';

function create_player($fname, $lName, $userName, $password) {
    $mysqli = new mysqli('localhost', 'root', '', 'kidsGames');
    $currentDateTime = date("Y-m-d H:i:s");

    if($mysqli -> connect_errno) {
        echo "Failed to connect to MYSQL: " . $mysqli->connecto_error;
        exit();
    }

    $sqlCreateUser = "INSERT INTO player (fName, lName, userName, registrationTime) VALUES
    ('$fName', '$lName', '$userName', '$currentDateTime')";
    $mysqli->query($sqlCreateUser);
    $createdId = $mysqli->insert_id;
    $passcode = password_hash($password, PASSWORD_DEFAULT);
    $mysqli->query("INSERT INTO authenticator(passcode, registrationOrder) VALUES 
    ('$passcode', '$createdId')");
    $mysqli->close();

}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Add validation and error handling as needed

    // Call the create_player function
    create_player($fName, $lName, $userName, $password);

    // Redirect or display a success message as needed
    header("Location: ../../public/form/game-form.php"); // Replace with the appropriate success page
    exit();
}