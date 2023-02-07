<?php
$y = intval($_GET['y']);
$x = intval($_GET['x']);
$operation = $_GET['operation'];

switch ($operation){
    case 'plus':
        echo $x + $y;
        break;
    case 'minus':
        echo $x - $y;
        break;
    case 'mal':
        echo $x * $y;
        break;
    case 'div':
        echo $x / $y;
        break;
    default:
        echo 'ungültige operation';
        break;
}
?>