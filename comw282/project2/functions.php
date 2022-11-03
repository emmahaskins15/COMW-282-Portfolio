<?php
// TO-DO
// -Convert filterInventory to use SQL commands
// -Implement update function
// -Implement delete function

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

function createInventoryTable() {
    require 'login.php';
    try {
        $dbh = new PDO($attr, $user, $pass, $opts);
        $sth = $dbh->prepare('DESCRIBE inventory');

        if (!$sth->execute()) {
            $query = 'CREATE TABLE inventory (
                id SMALLINT NOT NULL AUTO_INCREMENT,
                manufacturer VARCHAR(32) NOT NULL,
                model VARCHAR(32) NOT NULL,
                price FLOAT(2) NOT NULL,
                PRIMARY KEY (id)
            )';
            $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute();
        }
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function insertFromArray($array) {
    require 'login.php';
    $dbh = new PDO($attr, $user, $pass, $opts);

    try {
        $query = 'INSERT INTO inventory (manufacturer, model, price) VALUES (:manufacturer, :model, :price)';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);

        foreach ($array as $row) {
            $model = $row[0];
            if (!doesModelExistInDatabase($model)) {
                $sth->bindParam(':manufacturer', $row[1], PDO::PARAM_STR);
                $sth->bindParam(':model', $row[0], PDO::PARAM_STR);

                // Casting float to string because SQL doesn't support float/double
                $float = strval($row[2]);
                $sth->bindParam(':price', $float, PDO::PARAM_STR);
                $sth->execute();
            }
        }
        $result = $sth->fetch();
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function doesModelExistInDatabase($var) {
    $dbh = databaseConnector();
    $query = 'SELECT * FROM inventory WHERE model LIKE :model';
    $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sth->bindParam(':model', $var, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetchAll();

    if ($result[0]['model'] == $var) {
        return true;
    }
    else {
        return false;
    }
}

function databaseConnector() {
    require 'login.php';
    $dbh = new PDO($attr, $user, $pass, $opts);
    return $dbh;
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


// Create SQL table for $inventory
createInventoryTable();

// Read $inventory from file
$inventory = readInventory('phones.csv');

// Insert $inventory into SQL table
insertFromArray(filterInventory($inventory, 'All'));

// Get $manufacturer from $_POST; set to 'All' if unset
$manufacturer = $_POST['manufacturer'] ?? 'All';

// Filter $inventory based on on $manufacturer
$filteredInventory = filterInventory($inventory, $manufacturer);

// insertFromArray($allInventory);



$productID = $_POST['productID'] ?? 1;
$productAsArray = $filteredInventory[$productID];
$productAsClass = new Product($productID, $productAsArray);
?>
