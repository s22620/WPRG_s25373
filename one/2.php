<html>
<head>
</head>
<body>
<FORM action="1.2.php" method="GET">
    <input type="text" placeholder="one" name="one">
    <input type="text" placeholder="two" name="two">
    <input type="submit">
</FORM>
<?php
$one = $_GET['one'];
$two =$_GET['two'];
$wynik = $one * $two;

echo("Wynik to: ");
echo("$wynik");
?>
</body>
</html>
