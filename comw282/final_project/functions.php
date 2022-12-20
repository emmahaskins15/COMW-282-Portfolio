<?php
function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}

function databaseConnector() {
    require 'login.php';
    $dbh = new PDO($attr, $user, $pass, $opts);
    return $dbh;
}

function selectCourses() {
    $dbh = databaseConnector();
    $query = 'SELECT course_id, course_name, credit_hours, contact_hours, description, completed FROM courses ORDER BY completed DESC';

    try {
        $sth = $dbh->prepare($query);
        $sth->execute();
        $courses = $sth->fetchAll();
        return $courses;
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }   
}

function printCoursesAsTableRows($courses) {
    $completedBool = null;
    foreach ($courses as $row) {
        echo '<tr>';
        echo '<td>'.$row['course_id'].'</td>';
        echo '<td>'.$row['course_name'].'</td>';
        echo '<td>'.$row['credit_hours'].'</td>';
        echo '<td>'.$row['contact_hours'].'</td>';
        echo '<td>'.$row['description'].'</td>';
        $row['completed'] == 1 ? $completedBool = '✔' : $completedBool = '❌';
        echo '<td>'.$completedBool.'</td>';
        echo '</tr>';
    }
}

$courses = selectCourses();
?>