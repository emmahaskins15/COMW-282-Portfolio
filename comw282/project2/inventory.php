<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project 2</title>
    <meta charset="utf-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="subnav">
        <div class="subnav-col1">
            <?php
                echo $manufacturer.' Phones';
            ?>
        </div>
        <div class="subnav-col2">
            <form action="inventory.php" method="post">
                Manufacturer:
                    <select id="manufacturer" name="manufacturer">
                        <option value="All">All</option>
                        <option value="Apple">Apple</option>
                        <option value="Google">Google</option>
                        <option value="OnePlus">OnePlus</option>
                        <option value="Samsung">Samsung</option>
                    </select>
                <input type="submit" value="Filter">
            </form>
        </div>
    </div>
        <form action="phone.php" method="GET">
            <div class="product-table">
                <table>
                    <thead>
                        <tr>
                            <th>Manufacturer</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            printInventoryAsTableRows($filteredInventory);
                        ?>
                    </tbody>
                </table>
                <div class="product-submit">
                    <input type="submit">
                </div>
            </div>
        </form>
</div>
</body>
</html>

