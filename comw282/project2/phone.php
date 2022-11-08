<?php
include 'functions.php';

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
    $productAsArray = selectProductByID($productID);

}

if (isset($_POST['update'])) {
    $productID = $_POST['id'];
    updateInventoryRecords($productID);
    $productAsArray = selectProductByID($productID);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php
            echo $productAsArray['manufacturer'];
            echo ' ';
            echo $productAsArray['model']
        ?>
    </title>
    <meta charset="utf-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
        <a href="inventory.php">Return to Inventory</a>
        <img src="img/product-image-placeholder.jpg">
        <form action="phone.php" method="POST">

        <table>
            <tr>
                <?php
                    echo '<td><input type="text id="manufacturer" name="manufacturer" value="'.$productAsArray['manufacturer'].'">'.'</td>';
                    echo '<td><input type="text id="model" name="model" value="'.$productAsArray['model'].'">'.'</td>';
                    echo '<td>$<input type="text id="price" name="price" value="'.sprintf("%.2f", $productAsArray['price']).'">'.'</td>';
                    echo '<input type="hidden" id="id" name="id" value="'.$productAsArray['id'].'">';
                ?>
            </tr>
        </table>
        <input type="submit" name="update" value="Update">
        </form>
    </div>
</body>
</html>