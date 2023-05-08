<?php
if($_GET["btnLogin"] != null){
    if($_GET["login"] == "admin" && $_GET["password"] == 'admin'){
        session_start();
        setcookie("login", $_GET["login"],time()+60*60*24*14);
    }
}

if($_GET["btnLogout"] != null){
    session_destroy();
    setcookie("login","",time()-3600);
}
?>

<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #form {
            display: <?php echo session_id() == null ? "none" : ""?>;
        }

        #login {
            display: <?php echo session_id() != null ? "none" : ""?>;
        }

        #logout {
            display: <?php echo session_id() == null ? "none" : ""?>;
        }
    </style>
</head>
<body>

<FORM action="4.1.php" method="GET" id="login" name="login">
    Login: <input type="text" required placeholder="Login" name="login">
    <br>
    Haslo: <input type="text" required placeholder="Haslo" name="password">
    <br>
    <input type="submit" value="Zaloguj" name="btnLogin">
    <br>
    Formularz hotelowy dostępny tylko dla zalodowanych użytkowników
</FORM>



<FORM action="4.1.php" method="GET" id="form" name="form">

    <h1>Formularz hotelu</h1>
    <h3>Witaj <?php echo $_COOKIE["login"] ?> !</h3>
    <br>
    Liczba osób:
    <select name="numOfPpl" onchange="document.getElementById('form').submit()">
        <option <?php echo $_GET['numOfPpl'] == 1 ? "selected" : ($_COOKIE['numOfPpl'] == 1 ? "selected" : "")?> >1</option>
        <option <?php echo $_GET['numOfPpl'] == 2 ? "selected" : ($_COOKIE['numOfPpl'] == 1 ? "selected" : "")?> >2</option>
        <option <?php echo $_GET['numOfPpl'] == 3 ? "selected" : ($_COOKIE['numOfPpl'] == 1 ? "selected" : "")?> >3</option>
        <option <?php echo $_GET['numOfPpl'] == 4 ? "selected" : ($_COOKIE['numOfPpl'] == 1 ? "selected" : "")?> >4</option>
    </select>
    <br>
    Dane osoby rezerwującej:
    <br>
    Imię*: <input type="text" required placeholder="Imię" name="name" value="<?php echo $_GET['name'] != null ? $_GET['name'] : $_COOKIE['name']?>">
    <br>
    Nazwisko*: <input type="text" required placeholder="Nazwisko" name="surname" value="<?php echo $_GET['surname']  != null ? $_GET['surname'] : $_COOKIE['surname']?>">
    <?php

    $numOfPpl = $_GET['numOfPpl'];
    $cookieNumOfPpl = $_COOKIE['numOfPpl'];
    $isFromCookie = $numOfPpl == null;
    if($numOfPpl > 1 || $cookieNumOfPpl > 1){

        foreach (range(2, $isFromCookie ? $cookieNumOfPpl : $numOfPpl) as $number) {
            $number_name = $isFromCookie ? $_COOKIE["name$number"]  : $_GET["name$number"];
            $number_surname = $isFromCookie ? $_COOKIE["surname$number"] :  $_GET["surname$number"];
            echo "<br>Imię osoby $number*: <input type=\"text\" required placeholder=\"Imię\" name=\"name$number\" value=\"$number_name\"><br>Nazwisko osoby $number*: <input type=\"text\" required placeholder=\"Nazwisko\" name=\"surname$number\" value=\"$number_surname\">";
        }

    }
    ?>
    <br>
    Numer karty kredytowej*: <input type="text" minlength="16" maxlength="16" required placeholder="Numer karty kredytowej" name="credit" value="<?php echo $_GET['credit'] != null ? $_GET['credit'] : $_COOKIE['credit']?>">
    <br>
    Email*: <input type="email" required placeholder="Email" name="email" value="<?php echo $_GET['email'] != null ? $_GET['email'] : $_COOKIE['email'] ?>">
    <br>
    Data przyjazdu*: <input type="date" required name="date" value="<?php echo $_GET['date'] != null ? $_GET['date']: $_COOKIE['date']?>">
    <br>
    Godzina Pzzyjazdu*:  <input type="time" required name="time" value="<?php echo $_GET['time'] != null ? $_GET['time'] : $_COOKIE['time']?>">
    <br>
    <input type="checkbox" name="baby" <?php echo ($_GET['baby'] ? "checked" : ($_COOKIE['baby'] ? "checked" : ""))?>> Czy dostawić łóżeczko dla dziecka?
    <br>
    Udogodnienia:
    <ul>
        <li><input type="checkbox" name="smoke" <?php echo ($_GET['smoke'] ? "checked" : ($_COOKIE['smoke'] ? "checked" : ""))?>> Popoelniczka</li>
        <li><input type="checkbox" name="ac" <?php echo ($_GET['ac'] ? "checked" : ($_COOKIE['ac'] ? "checked" : ""))?>> Klimatyzacja</li>
        <li><input type="checkbox" name="breakfast" <?php echo ($_GET['breakfast'] ? "checked" : ($_COOKIE['breakfast'] ? "checked" : ""))?>> Śniadanie</li>
    </ul>
    <input type="submit" value="Zarezerwuj" name="btnSubmit">
    <input type="submit" value="Wyczysc ciasteczka" name="btmCookies">
</FORM>

<form  action="4.1.php" method="GET" id="logout" name="logout">
    <input type="submit" value="Wyloguj" name="btmLogout">
</form>


<?php

if($_GET["btmCookies"] != null){
    setcookie("name", "", time()-3600);
    setcookie("surname", "", time()-3600);
    setcookie("numOfPpl", "", time()-3600);
    setcookie("credit", "", time()-3600);
    setcookie("email", "", time()-3600);
    setcookie("date", "", time()-3600);
    setcookie("time", "", time()-3600);
    setcookie("baby", "", time()-3600);
    setcookie("smoke", "", time()-3600);
    setcookie("ac", "", time()-3600);
    setcookie("breakfast", "", time()-3600);

    header('Location: 3.3.php');

    return;
}



$name = $_GET['name'] != null ? $_GET['name'] : $_COOKIE["name"];
$surname = $_GET['surname'] != null ? $_GET['surname'] : $_COOKIE["surname"];
$numOfPpl = $_GET['numOfPpl'] != null ? $_GET['numOfPpl'] : $_COOKIE["numOfPpl"];
$credit = $_GET['credit'] != null ? $_GET['credit'] : $_COOKIE["credit"];
$email = $_GET['email'] != null ? $_GET['email'] : $_COOKIE["email"];
$date = $_GET['date'] != null ? $_GET['date'] : $_COOKIE["date"];
$time = $_GET['time'] != null ? $_GET['time'] : $_COOKIE["time"];
$baby = $_GET['baby'] != null ? $_GET['baby'] : $_COOKIE["baby"];
$smoke = $_GET['smoke'] != null ? $_GET['smoke'] : $_COOKIE["smoke"];
$ac = $_GET['ac'] != null ? $_GET['ac'] : $_COOKIE["ac"];
$breakfast = $_GET['breakfast'] != null ? $_GET['breakfast'] : $_COOKIE["breakfast"];

$isFromSubmit = $_GET["btnSubmit"] != null;

if($name != null && $surname != null && $numOfPpl != null && $credit != null && $email != null && $date != null && $time != null){
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

    // Zapisujemy ciasteczka
    if($isFromSubmit){
        setcookie("name",$name,time()+60*60*24*14);
        setcookie("surname",$surname,time()+60*60*24*14);
        setcookie("numOfPpl",$numOfPpl,time()+60*60*24*14);
        setcookie("credit",$credit,time()+60*60*24*14);
        setcookie("email",$email,time()+60*60*24*14);
        setcookie("date",$date,time()+60*60*24*14);
        setcookie("time",$time,time()+60*60*24*14);
        setcookie("baby",$baby,time()+60*60*24*14);
        setcookie("smoke",$smoke,time()+60*60*24*14);
        setcookie("ac",$ac,time()+60*60*24*14);
        setcookie("breakfast",$breakfast,time()+60*60*24*14);
    }

}



?>
</body>
</html>
