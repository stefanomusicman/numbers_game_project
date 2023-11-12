<?php

// Function that will generate a string of 6 random numbers
function generateRandomNumbers() {
    $numbers = [];

    // Generate 6 unique random numbers
    while (count($numbers) < 6) {
        $randomNumber = rand(0, 100);

        // Check if the number is not already in the array
        if (!in_array($randomNumber, $numbers)) {
            $numbers[] = $randomNumber;
        }
    }

    // Convert the array to a comma-separated string
    $result = implode(', ', $numbers);

    return $result;
}

// Function that will generate a string of 6 random letters
function generateRandomLetters() {
    // Combine both lowercase and uppercase letters
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $result = '';

    // Generate 6 unique random letters
    while (strlen($result) < 12) {
        $randomLetter = $letters[rand(0, strlen($letters) - 1)];

        // Check if the letter is not already in the result string
        if (strpos($result, $randomLetter) === false) {
            $result .= $randomLetter . ',';
        }
    }

    // Remove the trailing comma
    $result = rtrim($result, ',');

    return $result;
}

function checkAnswerOne($input, $randomizedString) {
    return true;
}

function checkAnswerTwo($input, $randomizedString) {
    return true;
}

function checkAnswerThree($input, $randomizedString) {
    return true;
}

function checkAnswerFour($input, $randomizedString) {
    return true;
}

function checkAnswerFive($input, $randomizedString) {
    return true;
}

function checkAnswerSix($input, $randomizedString) {
    return true;
}

?>