<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment 5</title>
    <meta charset="utf-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <h3>Add a test score into the database:</h3>
    <div class="formContainer">
        <form action="index.php" method="POST">
            Group:
            <select id="groupID" name="groupID">
                <option value="null">-----</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            <br>
            <label for="math">Math:</label>
            <input type="text" id="math" name="math">
            <br>
            <label for="reading">Reading:</label>
            <input type="text" id="reading" name="reading">
            <br>
            <label for="writing">Writing:</label>
            <input type="text" id="writing" name="writing">
            <br>
            <input type="submit" name="insert">
        </form>
        <a href="scores.php">Scores</a>
    </div>
</body>