<?php
require_once 'database.php';

$dsn = DSN;
$user = DB_USER;
$pass = DB_PASS;
$db = "dbname=".DB_NAME;
//$dbdriver = "mysql";
try {
    $conn = new PDO("$dbdriver:host=$servername;$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>