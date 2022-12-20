<?php 
// Local login
// $host = 'localhost';
// $data = 'sys';
// $user = 'root';
// $pass = 'mysql';
// $chrs = 'utf8mb4';
// $attr = "mysql:host=$host;dbname=$data;charset=$chrs";
// $opts =
// [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false,
// ];

// MCC login
$host = 'mottwebdev.com';
$data = 'mottwdev_ehaskins';
$user = 'mottwdev_ehaskin';
$pass = 'ehaskins_0614754';
$attr = "mysql:host=$host;port=3306;dbname=$data;";
$opts =
[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
?>
