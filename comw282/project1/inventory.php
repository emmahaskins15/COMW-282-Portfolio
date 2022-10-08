<!-- Reading file, filtering array, printing array -- 
**Move filter logic to print function 
**Intermediary PHP file-->
<?php
function readAndFilterInventory($inFile, $manufacturer) {
    if (file_exists($inFile)) {
        $records = file($inFile);
        $inventory = array();
        for ($i = 1; $i < count($records); $i++) {
            $record = str_getcsv($records[$i]);
            if (($record[1] == $manufacturer) || ($manufacturer == "All")) {
                $inventory[$i - 1] = $record;
            }
        }
        return $inventory;
    }
    else {
        echo 'File not found.';
    }
}

function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}
function printInventoryAsTableRows($parsedArray) {
    foreach ($parsedArray as $k => $v) {
        echo '<tr>';
        echo '<td><input type="radio" name="item" id="'.$k.'" value="'.$k.'"></td>';
        echo '<td>'.$v[1].'</td>';
        echo '<td>'.$v[0].'</td>';
        echo '<td style="text-align:right">$'.sprintf("%.2f", $v[2]).'</td>';
        echo '</tr>';
    }
}

session_start();
$selection = $_POST['manufacturer'] ?? 'All';
$inventory = readAndFilterInventory('phones.csv', $selection);
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

