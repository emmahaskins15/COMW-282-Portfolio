<!-- Reading file, filtering array, printing array -- 
**Move filter logic to print function 
**Intermediary PHP file-->
<?php
include 'functions.php';

session_start();
$_SESSION["inventory"] = $inventory;
// printDebug($inventory);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project 1</title>
    <meta charset="utf-8">
</head>
<body class="hideme" bgcolor=e6e8fa>

<form action="inventory.php" method="post">
    Package Type:
        <select id="manufacturer" name="manufacturer">
            <option value="All">All</option>
            <option value="Apple">Apple</option>
            <option value="Google">Google</option>
            <option value="OnePlus">OnePlus</option>
            <option value="Samsung">Samsung</option>
        </select>
    <input type="submit">
</form>
<form action="phone.php" method="post">
    <table border = "2">
        <thead style="font-weight:bolder">
            <tr>
                <th>Item</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo $selection.' Phones';
            printInventoryAsTableRows($inventory);
            ?>
        </tbody>
    </table>
    <input type="submit">
</form>
</body>
</html>

