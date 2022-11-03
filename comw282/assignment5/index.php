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
    <div class="formContainer">
    <h3>Add a test score into the database:</h3>    
        <form action="index.php" method="POST">

            <div class="row">
                <div class="col-25">Group:</div>
                <div class="col-75">
                    <select id="groupID" name="groupID">
                        <option value="null">-----</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
                <br>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="math">Math:</label>
                </div>
                <div class="col-75">
                    <input type="number" id="math" name="math">
                </div>
                <br>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="reading">Reading:</label>
                </div>
                <div class="col-75">
                    <input type="number" id="reading" name="reading">
                </div>
                <br>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="writing">Writing:</label>
                </div>
                <div class="col-75">
                    <input type="number" id="writing" name="writing">
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-25">
                    <input type="submit" name="insert">
                </div>
            </div>
        </form>
        <a href="scores.php">Scores</a>
    </div>
</body>