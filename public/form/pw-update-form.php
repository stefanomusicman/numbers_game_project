<?php
    session_start();

    $error_message = isset($_SESSION['err_pwupdate']) ? $_SESSION['err_pwupdate'] : '';
    unset($_SESSION['err_pwupdate']); 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Update Password</title>
    <link rel="stylesheet" href="../assets/css/pw-update.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <div class="main">
        
        <div class="container_2">
            <div class="promo-container">
                <h2>Update Password</h2>
            </div>
            <form method="post" action="../../src/features/pw-update.php">
                <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <input name="userName" type="text" placeholder="Username" />
                <input name="nPassword" type="password" placeholder="New Password" />
                <input name="cPassword" type="password" placeholder="Confirm Password" />
                <div class="button-container">
                    <button id="update-button" type="submit">Update</button>
                    <a href="signin-form.php" class="back-button">Return to Login</a>
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>
