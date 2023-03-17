<html>
<head>
</head>
<body>
<FORM action="10.php" method="GET">
    <input type="text" placeholder="Podaj liczbę bym mógł działać" name="num">
    <input type="submit" value="Lets make art!" name="submit">
</FORM>
<?php

$num = $_GET['num'];
if($num != null ){
    for ($i = 1; $i <= $num; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }

    for ($i = $num; $i >= 1; $i--) {
        echo str_repeat("*", $i) . "<br>";
    }

    for ($i = 1; $i <= $num; $i++) {
        echo str_repeat("_", $i - 1) . str_repeat("*", $num - $i + 1) . "<br>";
    }

    for ($i = $num; $i >= 1; $i--) {
        echo str_repeat("_", $i - 1) . str_repeat("*", $num - $i + 1) . "<br>";
    }
}
?>
</body>
</html>
