<?php
session_start();

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
                <input type="text" placeholder="Username" name = "user"/>
                <input type="password" placeholder="Password" name = "password" />
                <div class="button-container">
                    <input id="login_button" type="submit" name="send" value="Login" />
                </div>
                <p>Don't have an account? <a href="signup-form.php">Create One!</a></p>
            </form>
        </div>
    </div>
</body>

</html>
 