<?php
include("connectToDB.php");
$date = $_GET["date"];

try {
    $sqlSelect = "SELECT `Name`, `Release_date`, `Race`, `State(new,old)`, `Price` FROM `cars` WHERE `ID_Cars` NOT IN (SELECT `FID_Car` FROM `rent` WHERE :date BETWEEN `Date_start` AND `Date_end`)";
    $stmt = $dbh->prepare($sqlSelect);
    $stmt->bindValue(":date", $date);
    $stmt->execute();
    $res = $stmt->fetchAll();
    echo "<table border='1'>";
    echo "<thead><tr><th>Назва</th><th>Рік випуску</th><th>Пробіг</th><th>Стан</th><th>Ціна</th></tr></thead>";
    echo "<tbody>";
    foreach ($res as $row) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
catch (PDOException $ex) {
    echo $ex->GetMessage();
}
$dbh = null;
?>