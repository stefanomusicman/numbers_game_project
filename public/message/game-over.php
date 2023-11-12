<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Game Over</title>
    <link rel="stylesheet" href="../assets/css/game-won.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <div class="main">
        <?php include '../template/nav.php'; ?>

        <div class="container_2">
            <div class="promo-container">
                <h2>You've Lost</h2>
            </div>
            <div class="main-container">
                <div class="text-container">
                    <p>Sorry you were not able to complete all the levels in 6 attempts. Keep trying, you'll get it!</p>
                </div>
                <div class="button-container">
                    <a id="play_again_button" href="../form/game-form.php">Play Again</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>