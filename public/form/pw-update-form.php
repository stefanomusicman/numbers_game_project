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
                <input name="userName" type="text" placeholder="Username" />
                <input name="nPassword" type="password" placeholder="New Password" />
                <input name="cPassword" type="password" placeholder="Confirm Password" />
                <div class="button-container">
                    <button type="submit">Update</button>
                    <a href="signin-form.php" class="back-button">Return to Login</a>
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>
