<html>
<head>
</head>
<body>
<FORM action="1.3.php" method="GET">
    <input type="text" placeholder="Liczba do policzenia pierwiastka" name="number">
    <input type="submit">
</FORM>
<?php
$number = $_GET['number'];

$wynik = number_format(sqrt($number), 2);

if($number != null){
    echo("Wynik to: ");
    echo("$wynik");
}
?>
</body>
</html>
