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

function filterInventoryByQuery($manufacturer) {
    $dbh = databaseConnector();
    $manufacturer == 'All' ? $query = 'SELECT * FROM inventory' : $query = 'SELECT * FROM inventory WHERE manufacturer LIKE :manufacturer';
    try {
        // $query = 'SELECT * from inventory WHERE manufacturer LIKE :manufacturer';
        $sth = $dbh->prepare($query);
        $sth->bindParam(':manufacturer', $manufacturer, PDO::PARAM_STR);
        $sth->execute();
        $filteredInventory = $sth->fetchAll();
        return $filteredInventory;
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }   

}

function printInventoryAsTableRows($filteredInventory) {
    foreach ($filteredInventory as $row) {
        echo '<tr>';
        echo '<td>'.$row['manufacturer'].'</td>';
        echo '<td>'.$row['model'].'</td>';
        echo '<td>$'.sprintf("%.2f", $row['price']).'</td>';
        echo '<td><input type="radio" required="required" name="id" id="'.$row['id'].'" value="'.$row['id'].'"></td>';
        echo '</tr>';
    }
}

function createInventoryTable() {
    // require 'login.php';
    $dbh = databaseConnector();
    try {
        // $dbh = new PDO($attr, $user, $pass, $opts);
            $query = 'CREATE TABLE IF NOT EXISTS inventory (
                id SMALLINT NOT NULL AUTO_INCREMENT,
                manufacturer VARCHAR(32) NOT NULL,
                model VARCHAR(32) NOT NULL,
                price FLOAT(2) NOT NULL,
                PRIMARY KEY (id)
            )';
            $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute();
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function insertFromArray($array) {
    // require 'login.php';
    // $dbh = new PDO($attr, $user, $pass, $opts);
    $dbh = databaseConnector();

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
    public $productID, $manufacturer, $model, $price;

    function __construct($productAsArray)
    {
        $this->id = $productAsArray['id'];
        $this->manufacturer = $productAsArray['manufacturer'];
        $this->model = $productAsArray['model'];
        $this->price = $productAsArray['price'];
    }
}

function selectProductByID ($productID) {
    $dbh = databaseConnector();
    try {
        $query = 'SELECT * FROM inventory WHERE id = :id';
        $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->bindParam('id', $productID, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }
    catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function updateInventoryRecords($productID) {

        $price = sanitizeFloat($_POST['price']);

        // $price = validateFloat($_POST['price']);
        $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
        $model = htmlspecialchars($_POST['model']);
        $manufacturer = htmlspecialchars($_POST['manufacturer']);
        $e = 'Record updated successfully.';
        $dbh = databaseConnector();
        try {
            $query = 'UPDATE inventory SET manufacturer = :manufacturer, model = :model, price = :price WHERE id = :id';
            $sth = $dbh->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->bindParam('id', $productID, PDO::PARAM_INT);
            $sth->bindParam('manufacturer', $manufacturer, PDO::PARAM_STR);
            $sth->bindParam('model', $model, PDO::PARAM_STR);
            $sth->bindParam('price', $price, PDO::PARAM_INT);
            $sth->execute();
        }
        catch (PDOException $e) {
            $e = new PDOException($e->getMessage(), (int)$e->getCode());
        }
    

    echo '<script type="text/javascript">
       window.onload = function () { alert("'.$e.'"); } 
        </script>';
}

// Validate inputs
function validateFloat($float) {
    if (filter_var($float, FILTER_VALIDATE_FLOAT, array('options' => array('decimal' => 2, 'min_range' => 0))) === false) {
        return false;
    }
    else {
        return true;
    }
}

// Sanitize inputs
function sanitizeFloat($float) {
    validateFloat($float) ? $float = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ) : $float = null;
    return $float;
}

// Create SQL table for $inventory
createInventoryTable();

// Read $inventory from file
$inventory = readInventory('phones.csv');

// Insert $inventory into SQL table, no logic for INSERT EXCEPT, so commented out unless needs to populate database
// insertFromArray(filterInventory($inventory, 'All'));

// Get $manufacturer from $_POST; set to 'All' if unset
$manufacturer = $_POST['manufacturer'] ?? 'All';

// Deprecated: filter $inventory based on on $manufacturer with PHP
// $filteredInventory = filterInventory($inventory, $manufacturer);


// SQL query $inventory from inventory table matching $manufacturer (manufacturer column)
$filteredInventory = filterInventoryByQuery($manufacturer);

if (isset($_GET['id'])) {
    $productID = $_GET['id'];
    $productAsArray = selectProductByID($productID);

}
?>
