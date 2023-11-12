<?php
session_start();
require '../../src/features/game.php';

// These are all the randomly generated strings 
// that will be used in the questions
$random_letters_q1 = generateRandomLetters();
$random_letters_q2 = generateRandomLetters();
$random_numbers_q3 = generateRandomNumbers();
$random_numbers_q4 = generateRandomNumbers();
$random_letters_q5 = generateRandomLetters();
$random_numbers_q6 = generateRandomNumbers();

$number_of_mistakes = 0;

// Questions for each level
$questions = array(
    "Order 6 letters in ascending order: $random_letters_q1",
    "Order 6 letters in descending order: $random_letters_q2",
    "Order 6 numbers in ascending order: $random_numbers_q3",
    "Order 6 numbers in descending order: $random_numbers_q4",
    "Identify the first (smallest) and last letter (largest) in a set of 6 letters: $random_letters_q5",
    "Identify the smallest and the largest number in a set of 6 numbers: $random_numbers_q6",
);

// Check if the user submitted a response
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $level = $_POST["level"];
    $userAnswer = strtolower(trim($_POST["answer"]));

    if($level == 1){
        if(checkAnswerOne($userAnswer, $random_letters_q1)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Increment the mistake counter
            $_SESSION["mistake_count"] = isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] + 1 : 1;
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 2){
        if(checkAnswerTwo($userAnswer, $random_letters_q2)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Increment the mistake counter
            $_SESSION["mistake_count"] = isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] + 1 : 1;
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 3){
        if(checkAnswerThree($userAnswer, $random_numbers_q3)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Increment the mistake counter
            $_SESSION["mistake_count"] = isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] + 1 : 1;
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 4){
        if(checkAnswerFour($userAnswer, $random_numbers_q4)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Increment the mistake counter
            $_SESSION["mistake_count"] = isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] + 1 : 1;
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 5){
        if(checkAnswerFive($userAnswer, $random_letters_q5)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Increment the mistake counter
            $_SESSION["mistake_count"] = isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] + 1 : 1;
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    if($level == 6){
        if(checkAnswerSix($userAnswer, $random_numbers_q6)){
            // Move to the next level or display a success message
            $_SESSION["level"] = $level + 1;
        } else {
            // Increment the mistake counter
            $_SESSION["mistake_count"] = isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] + 1 : 1;
            // Display an error message for incorrect answers
            $errorMessage = "Incorrect answer. Please try again.";
        }
    }

    // Check if the mistake count is 6
    // this will automatically end the game and redirect the user to the game over page
    // in this if statement, you will have add the logic that will be responsible for storing the result in the DB
    if (isset($_SESSION["mistake_count"]) && $_SESSION["mistake_count"] == 6) {
        session_unset();
        session_destroy();
        header("Location: ../message/game-over.php");
        exit();
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
                        <h2>Number of Mistakes: <?php echo isset($_SESSION["mistake_count"]) ? $_SESSION["mistake_count"] : 0; ?></h2>
                    </div>
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
    // If a user is able to successfully complete the game in under 6 attempts, 
    // the session will be terminated and they will be re-directed to a game-won screen
    session_unset();
    session_destroy();
    header("Location: ../message/game-won.php");
    exit();
}
?>
