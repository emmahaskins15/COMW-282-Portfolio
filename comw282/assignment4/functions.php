<?php
require_once 'login.php';
$groupID = $_POST['groupID'] ?? 'All';

// Initialize PDO and query database
// https://www.php.net/manual/en/pdo.prepare.php
try {
    $pdo = new PDO($attr, $user, $pass, $opts);
    $query = 'SELECT * FROM test_scores WHERE group_id="'.$groupID.'"';
    $result = $pdo->query($query);
}
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}



printDebug($query);
printDebug($result);
printDebug($result->fetch(PDO::FETCH_ASSOC));

function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}


function printGradesAsTableRows($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['ID']);
        // echo 'Record ID: ' . htmlspecialchars($row['ID']) . "<br>";
        // echo 'Math Score: ' . htmlspecialchars($row['math']) . "<br>";
        // echo 'Reading Score: ' . htmlspecialchars($row['reading']) . "<br>";
        // echo 'Writing Score: ' . htmlspecialchars($row['writing']) . "<br><br>";
        echo '</tr>';
    }
}


?>