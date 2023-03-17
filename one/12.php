<html>
<head>
</head>
<body>
<?php

$array = array(
    array(6, 2),
    array(95, 89),
    array(100, 10),
    array(77, 19),
    array(94, 59),
    array(2, 91),
    array(11, 90)
);

$new_array = array();

for ($i = 0; $i < count($array[0]); $i++) {
    for ($j = 0; $j < count($array); $j++) {
        $new_array[$i][$j] = $array[$j][$i];
        echo $new_array[$i][$j] . " ";
    }
    echo "<br>";
}

?>
</body>
</html>
