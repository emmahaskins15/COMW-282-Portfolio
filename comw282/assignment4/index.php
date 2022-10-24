<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment 4</title>
    <meta charset="utf-8">
    <!-- <link href="css/styles.css" rel="stylesheet" type="text/css"> -->
</head>
<body>
    <form action="index.php" method="post">
        Group:
            <select id="groupID" name="groupID">
                <option value="All">All</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            <input type="submit">
    </form>
    Displaying Records for Group: <?php echo $groupID ?>
    <br>
    Total Records: __recordCount__
    <table>
        <thead>
            <tr>
                <th>Record ID</th>
                <th>Math Score</th>
                <th>Reading Score</th>
                <th>Writing Score</th>
            </tr>
        </thead>
        <tbody>
            <?php
                printGradesAsTableRows($result);
            ?>
        </tbody>
    </table>
</body>