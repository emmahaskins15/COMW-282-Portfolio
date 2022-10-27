<?php
include 'scoreFunctions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scores</title>
    <meta charset="utf-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <div class="subnav">
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
            <?php 
                echo $tableHeader; 
                echo '<br>';
                echo 'Total Records: '.$count;
            ?>
        </div>
        <div>
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
        </div>
    </div> 
</body>