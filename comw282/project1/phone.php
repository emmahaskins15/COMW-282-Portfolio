<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php
            echo $productAsClass->manufacturer;
            echo ' ';
            echo $productAsClass->modelName
        ?>
    </title>
    <meta charset="utf-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <a href="inventory.php">Return to Inventory</a>
        <img src="img/product-image-placeholder.jpg">
        <table>
            <tr>
                <?php
                    echo '<td>'.$productAsClass->manufacturer.'</td>';
                    echo '<td>'.$productAsClass->modelName.'</td>';
                    echo '<td>$'.sprintf("%.2f", $productAsClass->price).'</td>';
                ?>
            </tr>
        </table>
        <button>Add to Cart</button>
    </div>
</body>
</html>