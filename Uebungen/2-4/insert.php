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

$sql = "INSERT INTO customers (first_name, last_name, company, email_address, job_title, business_phone, home_phone, mobile_phone, fax_number, address, city, state_province, zip_postal_code, country_region, web_page, notes)
 VALUES (:firstName, :lastName, :company, :emailAddress, :jobTitle, :businessPhone, :homePhone, :mobilePhone, :faxNumber, :address, :city, :stateProvince, :zipCode, :country, :webPage, :notes)";
$statement = $conn->prepare($sql);
$statement->execute([
  ':firstName' => $_POST['firstName'],
  ':lastName' => $_POST['lastName'],
  ':company' => $_POST['company'],
  ':emailAddress' => $_POST['email'],
  ':jobTitle' => $_POST['jobTitle'],
  ':businessPhone' => $_POST['businessPhone'],
  ':homePhone' => $_POST['homePhone'],
  ':mobilePhone' => $_POST['mobilePhone'],
  ':faxNumber' => $_POST['fax'],
  ':address' => $_POST['address'],
  ':city' => $_POST['city'],
  ':stateProvince' => $_POST['stateProvince'],
  ':zipCode' => $_POST['zipCode'],
  ':country' => $_POST['country'],
  ':webPage' => $_POST['webPage'],
  ':notes' => $_POST['notes']
]);

header('Location: ' . $_SERVER['HTTP_REFERER']);