<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Create an Account</title>
    <link rel="stylesheet" href="../assets/css/signup.css" />
</head>

<body>
    <div class="main">
        <div class="container_2">
            <div class="promo-container">
                <h2>LaSalle Quiz Game</h2>
            </div>
            <form method="post" action="../../src/features/signin.php">
                <input name="fName" type="text" placeholder="First Name" />
                <input name="lName" type="text" placeholder="Last Name" />
                <input name="userName" type="text" placeholder="Username" />
                <input name="password" type="password" placeholder="Password" />
                <input name="confirm-password" type="password" placeholder="confirm-password" />
                <div class="button-container">
                    <input id="create_account_button" type="submit" name="send" value="Create an Account" />
                </div>
                <p>Already have an account? <a href="signin-form.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>