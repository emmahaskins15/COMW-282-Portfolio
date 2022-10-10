<!-- TO DO -->
<!-- Dynamic title gets from radio ID -->
<!--  -->
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
</head>
<body bgcolor=e6e8fa>
    <img src="img/product-image-placeholder.jpg" height="64" width="64">
    <div id="phone-details">
        <table>
            <tr>
                <?php
                    echo '<td>'.$productAsClass->manufacturer.'</td>';
                    echo '<td>'.$productAsClass->modelName.'</td>';
                    echo '<td>$'.sprintf("%.2f", $productAsClass->price).'</td>';
                ?>
            </tr>
        </table>

    </div>
    <a href="inventory.php">Return to Inventory</a>
</body>
</html>