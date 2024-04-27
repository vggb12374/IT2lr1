<?php
include("connectToDB.php");
$vendorsName = $_GET["vendorsName"];

try {
    $sqlSelect = "SELECT `cars`.`Name` FROM `cars` INNER JOIN `vendors` ON `FID_Vendors` = `ID_Vendors` WHERE `vendors`.`Name` = :vendorsName";
    $stmt = $dbh->prepare($sqlSelect);
    $stmt->bindValue(":vendorsName", $vendorsName);
    $stmt->execute();
    $res = $stmt->fetchAll();
    echo "<table border='1'>";
    echo "<thead><tr><th>Автомобіль</th></tr></thead>";
    echo "<tbody>";
    foreach ($res as $row) {
        echo "<tr><td>$row[0]</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
catch (PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>