<?php
function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}

function readInventory($inFile) {
    if (file_exists($inFile)) {
        $inventory = file($inFile);
        return $inventory;
    }
    else {
        echo 'File not found.';
    }
}
// Filters $inventory by $manufacturer, index starts at 1 to preserve keys
function filterInventory($inventory, $manufacturer) {
    $filteredInventory = array();
    for ($i = 1; $i < count($inventory); $i++) {
        $record = str_getcsv($inventory[$i]);
        if (($record[1] == $manufacturer) || ($manufacturer == "All")) {
            $filteredInventory[$i] = $record;
        }
    }
    return $filteredInventory;
}

function printInventoryAsTableRows($parsedArray) {
    foreach ($parsedArray as $k => $v) {
        echo '<tr>';
        echo '<td>'.$v[1].'</td>';
        echo '<td>'.$v[0].'</td>';
        echo '<td>$'.sprintf("%.2f", $v[2]).'</td>';
        echo '<td><input type="radio" required="required" name="productID" id="'.$k.'" value="'.$k.'"></td>';
        echo '</tr>';
    }
}

class Product {
    public $ID, $manufacturer, $modelName, $price;

    function __construct($productID, $productAsArray)
    {
        $this->ID = $productID;
        $this->manufacturer = $productAsArray[1];
        $this->modelName = $productAsArray[0];
        $this->price = $productAsArray[2];
    }
}

$manufacturer = $_POST['manufacturer'] ?? 'All';
$inventory = readInventory('phones.csv');
$filteredInventory = filterInventory($inventory, $manufacturer);
$productID = $_POST['productID'] ?? 1;
$productAsArray = $filteredInventory[$productID];
$productAsClass = new Product($productID, $productAsArray);
?>
