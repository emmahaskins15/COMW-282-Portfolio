<!-- TO DO -->
<!-- Dynamic title gets from radio ID -->
<!--  -->
<?php
session_start();

$selectedItem = $_POST['item'];
echo '<pre>';
print_r(var_dump($_POST));
print_r($selectedItem);
print_r(var_dump($_SESSION));

echo '</pre>';

//include('inventory.php');

// function printItemDetails($selectedItem) {

// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body bgcolor=e6e8fa>
<a href="inventory.php">Return to Inventory</a>
</body>
</html>