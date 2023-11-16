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
    $result = implode(',', $numbers);

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
        if (strpos(strtolower($result),strtolower($randomLetter)) === false) {
            $result .= $randomLetter . ',';
        }
    }

    // Remove the trailing comma
    $result = rtrim($result, ',');

    return $result;
}

function checkAnswer($input, $randomizedString) {
    if (strcmp($input,$randomizedString)!==0) {
        return false;
    }
    else{
        return true;
    }
}

function createAnswerAscending($randomizedString){
    $cleanString = str_replace(",","",$randomizedString);
    $splitInput = str_split($cleanString);
    natcasesort($splitInput);
    $anwserQuestion = implode(",",$splitInput);
    return $anwserQuestion;
}

function createAnswerDescending($randomizedString){
    $cleanString = str_replace(",","",$randomizedString);
    $splitInput = str_split($cleanString);
    natcasersort($splitInput);
    $anwserQuestion = implode(",",$splitInput);
    return $anwserQuestion;
}


?>