<?php
session_start();

// Check if there is an error message in the session
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';

// Clear the error message from the session
unset($_SESSION['error_message']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Create an Account</title>
    <link rel="stylesheet" href="../assets/css/signup.css" />
    <script async src="../assets/js/main.js" type="text/javascript" ></script>
    <script async src="../assets/js/signup-onkeyup/fname-ajax.js" type="text/javascript" ></script>
    <script async src="../assets/js/signup-onkeyup/lname-ajax.js" type="text/javascript" ></script>
    <script async src="../assets/js/signup-onkeyup/uname-ajax.js" type="text/javascript" ></script>
    <script async src="../assets/js/signup-onkeyup/pcode1-ajax.js" type="text/javascript" ></script>
    <script async src="../assets/js/signup-onkeyup/pcode2-ajax.js" type="text/javascript" ></script>
</head>

<body>
    <div class="main">
        <div class="container_2">
            <div class="promo-container">
                <h2>LaSalle Quiz Game</h2>
            </div>
            <form method="post" action="../../src/features/signup.php">
                <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <input id="fName" name="fName" type="text" placeholder="First Name" onkeyup="validate_fName()"/>
                <p id="fName-feedback"></p>
                <input id="lName" name="lName" type="text" placeholder="Last Name" onkeyup="validate_lName()"/>
                <p id="lName-feedback"></p>
                <input id="userName" name="userName" type="text" placeholder="Username" onkeyup="validate_userName()"/>
                <p id="username-feedback"></p>
                <input id="pcode1" name="password" type="password" placeholder="Password" onkeyup="validate_pcode1()"/>
                <p id="pcode1-feedback"></p>
                <input id="pcode2" name="confirm-password" type="password" placeholder="confirm-password" onkeyup="validate_pcode2()"/>
                <p id="pcode2-feedback"></p>
                <div class="button-container">
                    <input id="create_account_button" type="submit" name="send" value="Create an Account" />
                </div>
                <p>Already have an account? <a href="signin-form.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>