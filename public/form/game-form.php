<?php
session_start();
require '../../src/features/game.php';

// Questions for each level
$questions = array(
    "Order 6 letters in ascending order.",
    "Order 6 letters in descending order.",
    "Order 6 numbers in ascending order.",
    "Order 6 numbers in descending order.",
    "Identify the first (smallest) and last letter (largest) in a set of 6 letters.",
    "Identify the smallest and the largest number in a set of 6 numbers.",
);

// Check if the user submitted a response
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $level = $_POST["level"];
    $userAnswer = strtolower(trim($_POST["answer"]));

    if($level == 1){
        if(checkAnswerOne($userAnswer)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 2){
        if(checkAnswerTwo($userAnswer)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 3){
        if(checkAnswerThree($userAnswer)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 4){
        if(checkAnswerFour($userAnswer)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 5){
        if(checkAnswerFive($userAnswer)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 6){
        if(checkAnswerSix($userAnswer)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }
}

// Display the appropriate form based on the user's level
$level = isset($_SESSION["level"]) ? $_SESSION["level"] : 1;

if ($level <= count($questions)) {
    // Display the form for the current level
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Game Level <?php echo $level; ?></title>
            <link rel="stylesheet" href="../assets/css/game-form.css" />
            <link rel="stylesheet" href="../assets/css/style.css" />
        </head>
        <body>
            <div class="main">
                <?php include '../template/nav.php'; ?>    

                <div class="container_2">
                    <div class="promo-container">
                        <h2>Level <?php echo $level; ?></h2>
                    </div>
                    <form method="post" action="">
                        <p><?php echo $questions[$level - 1]; ?></p>
                        <?php if (isset($errorMessage)) echo "<p>$errorMessage</p>"; ?>
                        <input type="text" name="answer" required>
                        <input type="hidden" name="level" value="<?php echo $level; ?>">
                        <div class="button-container">
                            <button type="submit">Submit Answer</button>
                        </div>
                    </form>
                </div>
            </div>

        </body>
    </html>
    <?php
} else {
    // Display a completion message when the user completes all levels
    echo "Congratulations! You have completed all levels.";
    session_unset();
    session_destroy();
}
?>
