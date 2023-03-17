<html>
<head>
</head>
<body>
<FORM action="8.php" method="GET">
    <input type="text" placeholder="one" name="one">
    <input type="text" placeholder="two" name="two">
    <input type="text" placeholder="three" name="three">
    <input type="submit" value="Sprawdź!" name="submit">
</FORM>
<?php

$one = $_GET['num1'];
$two = $_GET['two'];
$three = $_GET['three'];

if($num1 != null){
    if ($one <= $two && $one <= $three) {
        $min = $one;
        if ($two <= $three) {
            $mid = $two;
            $max = $three;
        } else {
            $mid = $three;
            $max = $two;
        }
    } elseif ($two <= $one && $two <= $three) {
        $min = $two;
        if ($one <= $three) {
            $mid = $one;
            $max = $three;
        } else {
            $mid = $num3;
            $max = $three;
        }
    } else {
        $min = $three;
        if ($one <= $num2) {
            $mid = $one;
            $max = $two;
        } else {
            $mid = $two;
            $max = $one;
        }
    }

    echo "od największej do najmniejszej: $max $mid $min";
  echo "od najmniejszej do największej: $min $mid $max";
}

?>
</body>
</html>
