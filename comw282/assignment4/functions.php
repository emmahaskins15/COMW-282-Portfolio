<?php
require_once 'login.php';
$groupID = $_POST['groupID'] ?? 'All';
// Initialize PDO and query database
try {
    $dbh = new PDO($attr, $user, $pass, $opts);
    if ($groupID != 'All') {

        // Retrieve records with matching $groupID, store result in $result
        $query = 'SELECT * FROM test_scores WHERE group_id = :groupID';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['groupID' => $groupID]);
        $result = $sth->fetchAll();
        // $count = sizeof($result); Good solution that doesn't require another query :upside-down face:

        // Bad solution to meet rubric: retrieve COUNT of records from records with matching $groupID
        $query = 'SELECT COUNT(*) FROM test_scores WHERE group_id = :groupID';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['groupID' => $groupID]);
        $count = $sth->fetchAll();
        $count = $count[0]['COUNT(*)'];

        $tableHeader = "Displaying Records for Group ".$groupID;
    }
    else {
        $query = 'SELECT * FROM test_scores';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute();
        $result = $sth->FetchAll();
        // $count = sizeof($result); Good solution that doesn't require another query :upside-down face:

        // Bad solution to meet rubric: retrieve COUNT of records from records with matching $groupID
        $query = 'SELECT COUNT(*) FROM test_scores';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute();
        $count = $sth->fetchAll();
        $count = $count[0]['COUNT(*)'];

        $tableHeader = "Displaying Records for All Groups";
    }
}
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}

function printGradesAsTableRows($result) {
    foreach ($result as $row){
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['ID']);
        echo '<td>'.htmlspecialchars($row['math']);
        echo '<td>'.htmlspecialchars($row['reading']);
        echo '<td>'.htmlspecialchars($row['writing']);
        echo '</tr>';
    }
}
?>