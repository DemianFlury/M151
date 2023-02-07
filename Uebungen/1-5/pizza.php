<h1>Pizza Konfigurator</h1>
<p>Deine Pizza besteht aus folgenden Toppings:</p>

<ul>
<?php
$toppings = array();
if (isset($_SESSION['toppings'])) {
    $toppings = $_SESSION['toppings'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $toppings[] = $_POST['topping'];
}
var_dump($toppings);
foreach ($toppings as $topping){
    echo "<li> {$topping} </li>";
}

$_SESSION['toppings'] = $toppings;
?>

</ul>

<form action="?" method="post">
    <input type="text" name="topping" placeholder="Zutat" />
    <input type="submit" value="Hinzufügen" />
</form>