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

sendDeleteStatement('invoices', 'order_id', $conn);
sendDeleteStatement('order_details', 'order_id', $conn);
sendDeleteStatement('orders', 'id', $id, $conn);

function sendDeleteStatement($table, $row, $pdo){
$sql = "DELETE FROM $table WHERE $row = :id";
$statement = $pdo->prepare($sql);
$statement->execute([
  ':id' => $_GET['id']
]);
}

echo "deletion sucessful";
header('Location: ' . $_SERVER['HTTP_REFERER']);