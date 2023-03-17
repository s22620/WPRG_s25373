<html>
<head>
</head>
<body>
<FORM action="4.php" method="GET">
    <input type="text" placeholder="Liczba pierwsza" name="a">
    <input type="text" placeholder="Liczba druga" name="b">
    <input type="submit" value="Dodawanie" name="add">
    <input type="submit" value="Odejmowanie" name="sub">
    <input type="submit" value="Mnożenie" name="mul">
    <input type="submit" value="Dzielenie" name="div">
    <input type="submit" value="Modulo" name="mod">
</FORM>
<?php

$numbera = $_GET['a'];
$numberb = $_GET['b'];

if($_GET['add'] != null){
    echo ($numbera + $numberb);
} elseif($_GET['sub'] != null){
    echo ($numbera - $numberb);
} elseif($_GET['mul'] != null){
    echo ($numbera * $numberb);
} elseif($_GET['div'] != null){
    echo ($numbera / $numberb);
} elseif($_GET['mod'] != null){
    echo ($numbera % $numberb);
}


?>
</body>
</html>
