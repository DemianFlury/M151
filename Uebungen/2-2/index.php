<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //setzt den Typ der Datenbank fest.

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //setzt die Attribute des PDOs fürs Verhalten bei Fehlern
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM customers";
?>

<table>
    <?php
    foreach($conn->query($sql) as $row){

        echo "<tr>";
            echo "<td>{$row['last_name']}</td>";
            echo "<td>{$row['first_name']}</td>";
            echo "<td>{$row['job_title']}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['city']}</td>";
        echo "</tr>";
    }
    ?>
</table>