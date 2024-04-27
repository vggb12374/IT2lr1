<?php
$dsn = "mysql:host=localhost;dbname=lb_pdo_rent";
$username = "root";
$password = "";

try {
    $dbh = new PDO($dsn, $username, $password);
}
catch (PDOException $ex) {
    echo $ex->GetMessage();
}
?>