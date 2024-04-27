<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>
    <form action="get1.php" method="get">
        <label for="Date_start">Оберіть дату для отримання даних про дохід:</label>
        <input type="date" name="Date_start" id="Date_start" value="2014-09-01" required>
        <input type="submit" value="Отримати">
    </form>
    <br>
    <form action="get2.php" method="get">
        <label for="vendorsName">Оберіть виробника для отримання переліку автомобілів:</label>
        <select name="vendorsName" id="vendorsName">
            <?php
            include("connectToDB.php");
            try {
                $sqlSelect = "SELECT `Name` FROM `vendors`";
                foreach ($dbh->query($sqlSelect) as $row) {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
            }
            catch (PDOException $ex) {
                echo $ex->GetMessage();
            }
            $dbh = null;
            ?>
        </select>
        <input type="submit" value="Отримати">
    </form>
    <br>
    <form action="get3.php" method="get">
        <label for="date">Оберіть дату для отримання переліку вільних автомобілів:</label>
        <input type="date" name="date" id="date" value="2014-09-01" required>
        <input type="submit" value="Отримати">
    </form>
</body>
</html>