<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //setzt den Typ der Datenbank fest

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //setzt die Attribute des PDOs 
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$id = $_GET['id'];
$sql = 'SELECT * FROM orders WHERE customer_id = :id';
$statement = $conn->prepare($sql);
$statement->execute([
  ':id' => $id
]);

?>

<table>
    <tr>
        <th>Name</th>
        <th>ID</th>
        <th>Bestelldatum</th>
        <th>Lieferdatum</th>
        <th>Preis</th>
    </tr>
    <?php
    while($row = $statement->fetch()){

        echo "<tr>";
            echo "<td>{$row['ship_name']}</td>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td>{$row['shipped_date']}</td>";
            echo "<td>{$row['shipping_fee']}</td>";
            echo "<td><a href='delete.php?id={$row['id']}'>Löschen</a></td>";
        echo "</tr>";
    }
    ?>
</table>