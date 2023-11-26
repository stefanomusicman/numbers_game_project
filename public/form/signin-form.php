<?php 
    session_start(); 

    $error_message = isset($_SESSION['err_signin']) ? $_SESSION['err_signin'] : '';
    unset($_SESSION['err_signin']);

    // Check if there is an error message in the session
    $account_success = isset($_SESSION['account_success']) ? $_SESSION['account_success'] : '';

    // Clear the error message from the session
    unset($_SESSION['account_success']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Sign In</title>
    <link rel="stylesheet" href="../assets/css/signIn.css" />
</head>

<body>
    <div class="main">
        <div class="container_2">
            <div class="promo-container">
                <h2>LaSalle Quiz Game</h2>
            </div>
            <form method="post" action="../../src/features/signin.php">
                <?php if (!empty($account_success)): ?>
                <p class="error-message"><?php echo $account_success; ?></p>
                <?php endif; ?>
                <input type="text" placeholder="Username" name = "user"
                value="<?php echo isset($_SESSION['userName']) ? $_SESSION['userName'] : ''; ?>"/>
                <input type="password" placeholder="Password" name = "password"/>
                <?php if (!empty($error_message)): ?>
                <p><?php echo $error_message; ?></p>
                <p>Forgot your password? <a href="../../public/form/pw-update-form.php">Change it</a><p>
                <?php endif; ?>
                <div class="button-container">
                    <input id="login_button" type="submit" name="send" value="Login" />
                </div>
                <p>Don't have an account? <a href="signup-form.php">Create One!</a></p>
                
            </form>
        </div>
    </div>
</body>

</html>
 