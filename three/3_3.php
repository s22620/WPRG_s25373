
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<FORM action="3.3.php" method="GET" id="form" name="form">

    <h1>Formularz hotelu</h1>
    Liczba osób:
    <select name="numOfPpl" onchange="document.getElementById('form').submit()">
        <option <?php echo $_GET['numOfPpl'] == 1 ? "selected" : ""?> >1</option>
        <option <?php echo $_GET['numOfPpl'] == 2 ? "selected" : ""?> >2</option>
        <option <?php echo $_GET['numOfPpl'] == 3 ? "selected" : ""?> >3</option>
        <option <?php echo $_GET['numOfPpl'] == 4 ? "selected" : ""?> >4</option>
    </select>
    <br>
    Dane osoby rezerwującej:
    <br>
    Imię*: <input type="text" required placeholder="Imię" name="name" value="<?php echo $_GET['name']?>">
    <br>
    Nazwisko*: <input type="text" required placeholder="Nazwisko" name="surname" value="<?php echo $_GET['surname']?>">
    <?php

    $numOfPpl = $_GET['numOfPpl'];
    if($numOfPpl > 1){

        foreach (range(2, $numOfPpl) as $number) {
            $number_name = $_GET["name$number"];
            $number_surname = $_GET["surname$number"];
            echo "<br>Imię osoby $number*: <input type=\"text\" required placeholder=\"Imię\" name=\"name$number\" value=\"$number_name\"><br>Nazwisko osoby $number*: <input type=\"text\" required placeholder=\"Nazwisko\" name=\"surname$number\" value=\"$number_surname\">";
        }

    }
    ?>
    <br>
    Numer karty kredytowej*: <input type="text" minlength="16" maxlength="16" required placeholder="Numer karty kredytowej" name="credit" value="<?php echo $_GET['credit']?>">
    <br>
    Email*: <input type="email" required placeholder="Email" name="email" value="<?php echo $_GET['email']?>">
    <br>
    Data przyjazdu*: <input type="date" required name="date" value="<?php echo $_GET['date']?>">
    <br>
    Godzina Pzzyjazdu*:  <input type="time" required name="time" value="<?php echo $_GET['time']?>">
    <br>
    <input type="checkbox" name="baby" <?php echo ($_GET['baby'] == 'on' ? "checked" : "")?>> Czy dostawić łóżeczko dla dziecka?
    <br>
    Udogodnienia:
    <ul>
        <li><input type="checkbox" name="smoke" <?php echo ($_GET['smoke'] == 'on' ? "checked" : "")?>> Popoelniczka</li>
        <li><input type="checkbox" name="ac" <?php echo ($_GET['ac'] == 'on' ? "checked" : "")?>> Klimatyzacja</li>
        <li><input type="checkbox" name="breakfast" <?php echo ($_GET['breakfast'] == 'on' ? "checked" : "")?>> Śniadanie</li>
    </ul>
    <input type="submit" value="Zarezerwuj" name="btnSubmit">

</FORM>
<form action="3.3.php" method="GET" id="formRead" name="formRead">
    <input type="submit" value="Wczytaj" name="btnRead">
</form>


<?php

$shouldSave = $_GET['btnSubmit'];
$shouldRead = $_GET['btnRead'];
$name = $_GET['name'];
$surname = $_GET['surname'];
$numOfPpl = $_GET['numOfPpl'];
$credit = $_GET['credit'];
$email = $_GET['email'];
$date = $_GET['date'];
$time = $_GET['time'];
$baby = $_GET['baby'];
$smoke = $_GET['smoke'];
$ac = $_GET['ac'];
$breakfast = $_GET['breakfast'];

if($shouldSave != null && $name != null && $surname != null && $numOfPpl != null && $credit != null && $email != null && $date != null && $time != null){
    $html_content = file_get_contents('2.2_template.html');
    $html_content = str_replace('{NAME}', $name, $html_content);
    $html_content = str_replace('{SURNAME}', $surname, $html_content);
    $html_content = str_replace('{NR_OF_PPL}', $numOfPpl, $html_content);
    $html_content = str_replace('{CARD_NUM}', $credit, $html_content);
    $html_content = str_replace('{EMAIL}', $email, $html_content);
    $html_content = str_replace('{DATE}', $date, $html_content);
    $html_content = str_replace('{TIME}', $time, $html_content);
    $html_content = str_replace('{BABY}', $baby ? "TAK" : "NIE", $html_content);
    $html_content = str_replace('{SMOKE}', $smoke ? "TAK" : "NIE", $html_content);
    $html_content = str_replace('{AC}', $ac ? "TAK" : "NIE", $html_content);
    $html_content = str_replace('{BREAKFAST}', $breakfast ? "TAK" : "NIE", $html_content);

    $morePeopleString = "";
    if($numOfPpl > 1){
        foreach (range(2, $numOfPpl) as $number) {
            $number_name = $_GET["name$number"];
            $number_surname = $_GET["surname$number"];
            if($number_name != null && $number_surname != null){
                $morePeopleString .= "<tr><td><b>Imię: </b>$number_name</td><td><b>Nazwisko: </b>$number_surname</td></tr>";
            }else{
                return;
            }
        }
    }
    $html_content = str_replace('{ADDITIONAL_PEOPLE}', $morePeopleString, $html_content);

    echo $html_content;

    // zapisanie do pliku
    $myfile = fopen("form.csv", "w") or die("Unable to add to / open file!");
    $formToSave = "";

    if($numOfPpl > 1){
        foreach (range(2, $numOfPpl) as $number) {
            $formToSave .= "name$number;"."surname$number;";
        }
    }

    $formToSave .= "name;surname;numOfPpl;credit;email;date;time;baby;smoke;ac;breakfast\n";

    if($numOfPpl > 1){
        foreach (range(2, $numOfPpl) as $number) {
            $formToSave .= $_GET["name$number"].";".$_GET["surname$number"].";";
        }
    }
    $formToSave .= $name.";".
    $surname.";".
    $numOfPpl.";".
    $credit.";".
    (str_replace("@", "%40" ,$email)).";".
    $date.";".
    $time.";".
    ($baby ? "on" : "off").";".
    ($smoke  ? "on" : "off").";".
    ($ac ? "on" : "off").";".
    ($breakfast  ? "on" : "off");
    fwrite($myfile, $formToSave);
    fclose($myfile);
}else if($shouldRead != null){
    $myfile = fopen("form.csv", "r") or die("Unable to open file!");
    $line = fgets($myfile);
    if($line){
        $secondLine = fgets($myfile);
        $names = explode(";", $line);
        $values = explode(";", $secondLine);
        $i = 0;

        $result = "?";
        foreach($names as $name){
            if($i!=0){
                $result .= "&";
            }
            $result .= trim($name)."=".trim($values[$i]);
            $i++;
        }

        header('Location: 3.3.php'.$result);
        exit;
    }
    fclose($myfile);
}


?>
</body>
</html>
