<html>
<head>
</head>
<body>
<FORM action="5.php" method="GET">
    <input type="text" placeholder="first" name="first">
    <input type="text" placeholder="second" name="second">
    <input type="submit" value="Połącz" name="submit">
</FORM>
<?php

$first = $_GET['first'];
$second = $_GET['second'];

if($first != null && $second != null){
    echo ("\"%" . $first . " " . $second . "%\$#\"");

}

?>
</body>
</html>
