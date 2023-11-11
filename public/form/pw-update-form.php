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

        <?php include '../template/nav.php'; ?>
        
        <div class="container_2">
            <div class="promo-container">
                <h2>Update Password</h2>
            </div>
            <form>
                <input name="old-password" type="text" placeholder="Old Password" />
                <input name="new-password" type="text" placeholder="New Password" />
                <div class="button-container">
                    <button>Update</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>