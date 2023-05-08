<html>
<head>
</head>
<body>
<FORM action="3.1.php" method="GET">
    <input type="text" placeholder="Liczba pierwsza" name="a">
    <input type="text" placeholder="Liczba druga" name="b">
    <input type="submit" value="Dodawanie" name="add">
    <input type="submit" value="Odejmowanie" name="sub">
    <input type="submit" value="Mnożenie" name="mul">
    <input type="submit" value="Dzielenie" name="div">
    <input type="submit" value="Modulo" name="mod">
</FORM>
<?php
include "3_1_functions.php";

$number_a = $_GET['a'];
$number_b = $_GET['b'];

$type = $_GET['add'].$_GET['sub'].$_GET['mul'].$_GET['div'].$_GET['mod'];

switch($type){
    case "Dodawanie":
        echo (add($number_a, $number_b));
        break;
    case "Odejmowanie":
        echo (sub($number_a, $number_b));
        break;
    case "Mnożenie":
        echo (mul($number_a, $number_b));
        break;
    case "Dzielenie":
        echo (div($number_a, $number_b));
        break;
    case "Modulo":
        echo (mod($number_a, $number_b));
        break;
}

?>
</body>
</html>
