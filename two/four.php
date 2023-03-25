<html>
<head>
<meta charset="utf-8">

</head>

<body>
<form action="" method="post">
<input type="number" name="poczatek">
<br>
<input type="number" name="koniec">
  <br>
<input type="submit" name="przycisk" value="pierwsze">
<br>
  <?php
 if (isset($_POST['przycisk'])){
	 $poczatek=$_POST['poczatek'];
	 $koniec=$_POST['koniec'];
	 $przycisk=$_POST['przycisk'];
   	 if ($przycisk=='pierwsze'){ 
		for($liczba=$poczatek; $liczba <= $koniec; $liczba++){
	   if(pierwszaliczba($liczba)){
	 
	   echo'<br></br>' .$liczba ; 
	       }
		}
	 }
 }
  function pierwszaliczba($liczba) {
	if($liczba == 2) {
		return true;
	}
	

	
	for($dzielnik = 3; $dzielnik < $liczba; $dzielnik++) {

		
		if($liczba % $dzielnik == 0) {
			return false;
		}
	}
	
	return true; // Ta liczba jest liczbą pierwszą
}
 
?>

</form>

</body>


</html>
