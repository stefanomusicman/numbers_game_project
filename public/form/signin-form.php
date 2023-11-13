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
                <input type="text" placeholder="Username" />
                <input type="password" placeholder="Password" />
                <div class="button-container">
                    <input id="login_button" type="submit" name="send" value="Login" />
                </div>
                <p>Don't have an account? <a href="signup-form.php">Create One!</a></p>
            </form>
        </div>
    </div>
</body>

</html>