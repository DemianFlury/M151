<?php
include_once '../../dump.php';
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br />";

mysqli_select_db($conn, $database);

echo "Datenbank ausgewählt!<br />";

$title = $_GET['jobtitle'];
$sql = 'SELECT * FROM customers WHERE job_title = :title';
$result = $conn->prepare($sql);
$result->execute([
  ':title' => $title
]);

if ($result->num_rows > 0) {
  echo $result->num_rows . " Resultate";
} else {
  echo "Keine Resultate vorhanden";
}


mysqli_close($conn);

dump($result)
?>