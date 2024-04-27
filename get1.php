<?php
include("connectToDB.php");
$Date_start = $_GET["Date_start"];

try {
    $sqlSelect = "SELECT SUM(`Cost`) FROM `rent` WHERE `Date_start` = :Date_start";
    $stmt = $dbh->prepare($sqlSelect);
    $stmt->bindValue(":Date_start", $Date_start);
    $stmt->execute();
    $res = $stmt->fetchAll();
    echo "<table border='1'>";
    echo "<thead><tr><th>Дохід</th></tr></thead>";
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