<html>
<head>
</head>
<body>
<FORM action="3.2.php" method="GET">
    <input type="text" placeholder="Podaj tekst" name="text">
    <input type="submit" value="Zapisz do pliku" name="submit">
</FORM>
<?php

$text = $_GET['text'];
if($text != null){
    $myfile = fopen("newfile.txt", "a") or die("Unable add to / open file!");
    fwrite($myfile, "\n".$text);
    fclose($myfile);
}



?>
</body>
</html>
