<?php
if (isset($_GET['id']))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "northwind";
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password); //setzt den Typ der Datenbank fest

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //setzt die Attribute des PDOs 
        echo "Connected successfully";
    }
    catch (PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $id = $_GET['id'];
    $sql = 'SELECT * FROM customers WHERE id = :id';
    $statement = $conn->prepare($sql);
    $statement->execute([
      ':id' => $id
    ]);
    while($row = $statement->fetch()){ ?>
    

<form action="insert.php" method="POST">
    <input type="text" name="firstName" placeholder="first Name" value="<?= $row['first_name'] ?>"> <br>
    <input type="text" name="lastName" placeholder="last Name" value="<?= $row['last_name'] ?>"><br>
    <input type="text" name="company" placeholder="company" value="<?= $row['company'] ?>"><br>
    <input type="email" name="email" placeholder="email" value="<?= $row['email_address']?>"><br>
    <input type="text" name="jobTitle" placeholder="job title" value="<?= $row['job_title']?>"><br>
    <input type="phone" name="businessPhone" placeholder="Business Phone" value="<?= $row['business_phone']?>"><br>
    <input type="phone" name="mobilePhone" placeholder="Mobile Phone" value="<?= $row['mobile_phone']?>"><br>
    <input type="phone" name="homePhone" placeholder="Home Phone" value="<?= $row['home_phone']?>"><br>
    <input type="phone" name="fax" placeholder="Fax Number" value="<?= $row['fax_number']?>"><br>
    <input type="text" name="address" placeholder="Address" value="<?= $row['address']?>"><br>
    <input type="text" name="city" placeholder="city" value="<?= $row['city']?>"><br>
    <input type="text" name="stateProvince" placeholder="State / Province" value="<?= $row['state_province']?>"><br>
    <input type="text" name="zipCode" placeholder="Zip code" value="<?= $row['zip_postal_code']?>"><br>
    <input type="text" name="country" placeholder="Country" value="<?= $row['country_region']?>"><br>
    <input type="text" name="webPage" placeholder="Web Page" value="<?= $row['web_page']?>"><br>
    <input type="text" name="notes" placeholder="notes" value="<?= $row['notes']?>"><br>
    <input type="hidden" name="id" value="<?= $row['id']?>">
    <button type="submit">Send</button>
</form>

<?php } } ?>