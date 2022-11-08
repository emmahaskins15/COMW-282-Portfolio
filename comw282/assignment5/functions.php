<?php
function validateInteger($int) {
    if (filter_var($int, FILTER_VALIDATE_INT, array('options' => array('min_range' => 0, 'max_range' => 100))) === false) {
        return false;
    }
    else if (!ctype_digit($int)) {
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

function isGroupIDValid($groupID) {
    $pattern = '/[ABCDE]/';
    if (preg_match($pattern, $groupID)) {
        return true;
    }
    else {
        return false;
    }
}

function createRecord($scoreArray) {
    require_once 'login.php';

    try {
        $dbh = new PDO($attr, $user, $pass, $opts);
        $query = 'INSERT INTO test_scores (group_id, math, reading, writing) VALUES (?, ?, ?, ?)';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->bindParam(1, $scoreArray[0], PDO::PARAM_STR, 1);
        $sth->bindParam(2, $scoreArray[1], PDO::PARAM_INT);
        $sth->bindParam(3, $scoreArray[2], PDO::PARAM_INT);
        $sth->bindParam(4, $scoreArray[3], PDO::PARAM_INT);
        $sth->execute([$scoreArray[0], $scoreArray[1], $scoreArray[2], $scoreArray[3]]);
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function arrayContainsNullValues($array) {
    foreach ($array as $value) {
        if (is_null($value)) {
            return true;
            break;
        }
    }
    return false;
}

function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}

function insert(){
    if (isset($_POST['math']) && isset($_POST['reading']) && isset($_POST['writing']) && isset($_POST['groupID']) && isGroupIDValid($_POST['groupID'])) { 
        $mathScore = sanitizeInteger($_POST['math']);
        $readingScore = sanitizeInteger($_POST['reading']);
        $writingScore = sanitizeInteger($_POST['writing']);
        $groupID = $_POST['groupID'];
        $scoreArray = [$groupID, $mathScore, $readingScore, $writingScore];

        if (!arrayContainsNullValues($scoreArray)) {
            createRecord($scoreArray);
            $e = 'Record created successfully.';
        }
        else {
            $e = 'Error: Record not created.';
        }
    }
    else {
        $e = 'Error: Record not created.';
    }
    echo '<script type="text/javascript">
       window.onload = function () { alert("'.$e.'"); } 
        </script>';
}

printDebug($_POST['insert']);


if (isset($_POST['insert'])) {
    insert();
}
?>