<?php
function printDebug($arg) {
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}

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

$selection = $_POST['manufacturer'] ?? 'All';
$inventory = readAndFilterInventory('phones.csv', $selection);
?>