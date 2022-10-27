<?php

function validateInteger($int) {
    if (filter_var($int, FILTER_VALIDATE_INT, array('options' => array('min_range' => 0, 'max_range' => 100))) === false) {
        $e = 'Invalid input';
        return false;
    }
    else if (!ctype_digit($int)) {
        $e = 'Invalid input';
        return false;
    }
    else {
        return true;
    }
}

function sanitizeInteger($int) {
    validateInteger($int) ? $int = filter_var($int, FILTER_SANITIZE_NUMBER_INT) : $int = null;
    return $int;
}

function validateGroupID($groupID) {
    $pattern = '/[ABCDE]/';
    if (preg_match($pattern, $groupID)) {
        return true;
    }
    else {
        return false;
    }
}

function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}

require_once 'login.php';
$e = '';


if (isset($_POST['math']) && isset($_POST['reading']) && isset($_POST['writing']) && isset($_POST['groupID']) && validateGroupID($_POST['groupID'])) { 
    $mathScore = sanitizeInteger($_POST['math']);
    $readingScore = sanitizeInteger($_POST['reading']);
    $writingScore = sanitizeInteger($_POST['writing']);
    $groupID = $_POST['groupID'];
    $scoreArray = [$groupID, $mathScore, $readingScore, $writingScore];
}
else {
    $e = 'Invalid entry';
}

echo '$_POST';
printDebug($_POST);

echo '$scoreArray';
printDebug($scoreArray);



?>