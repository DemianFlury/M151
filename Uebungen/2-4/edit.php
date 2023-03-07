<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //set database type

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //set pdo attributes
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "UPDATE customers 
SET first_name=:firstName, last_name=:lastName, company=:company, email_address=:emailAddress, job_title=:jobTitle, business_phone=:businessPhone, home_phone=:homePhone, mobile_phone=:mobilePhone, fax_number=:faxNumber, address=:address, city=:city, state_province=:stateProvince, zip_postal_code=:zipCode, country_region=:country, web_page=:webPage, notes=:notes
WHERE id = :id";
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
  ':notes' => $_POST['notes'],
  ':id' => $_GET['id']
]);

header('Location: ' . $_SERVER['HTTP_REFERER']);