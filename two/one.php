<html>
<head>
<title>Kalkulator</title>
</head>
<body>
<form>
    <form action="one.php" method="post">
        <input type="numer" name="poczatek">
        <br>
        <input type="number" name="koniec">
        <br>
        <input type="submit" name="przycisk" value="dodawanie">
        <br>
        <input type="submit" name="przycisk" value="odejmowanie">
        <br>
        <input type="submit" name="przycisk" value="mnozenie">
        <br>
        <input type="submit" name="przycisk" value="dzielenie">
        <?php
        if (isset($_POST['przycisk'])) {
            $poczatek = $_POST['poczatek'];
            $koniec = $_POST['koniec'];
            $przycisk = $_POST['przycisk'];

            if ($przycisk == 'dodawanie') {
                $wynik = $poczatek + $koniec;
                echo '<br></br>' . $wynik;

            }
            if ($przycisk == 'dejmowanie') {
                $wynik = $poczatek - $koniec;
                echo '<br></br>' . $wynik;

            }
            if ($przycisk == 'mnozenie') {
                $wynik = $poczatek * $koniec;
                echo '<br></br>' . $wynik;

            }
            if ($przycisk == 'dzielenie') {
                $wynik = $poczatek / $koniec;
                echo '<br></br>' . $wynik;

            }
        }
        ?>

</form>
</body>
</html>
