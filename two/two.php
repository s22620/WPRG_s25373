<html>
<head>
<title>Kalkulator</title>
</head>
<body>
<form>
    <form action="" method="post">
        <label for="ppl">Select number of people in room</label>
        <select id="ppl" required>
            <option disabled selected value="">--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <input type="text" name="first_name" placeholder="Name" required><br>
        <input type="text" name="last_name" placeholder="Last Name" required><br>
        <input id="phone" type="tel" name="phone" placeholder="Your Phone Number" required>
        <input id="email" type="email" name="email" placeholder="Your Email" required>
        <input type="submit">
        <select id="room_pref" name="room_pref" required>
            <option disabled selected value="">--</option>
            <option value="Smoking">Suited for smokers</option>
            <option value="Kid">Suited for baby</option>
            <option value="Animal">Suited for animals</option>
        </select>
        Arrival:<input id="arrival" type="date" name="arrival" required>
        Departure: <input id="departure" type="date" name="departure" required>
        <input type="submit" value="Reserve">
        <?php
        if (isset($_POST['arrival'], $_POST['departure'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['ppl'],  $_POST['room_pref'])) {
            $arrival = htmlspecialchars($_POST['arrival']);
            $departure = htmlspecialchars($_POST['departure']);
            $first_name = htmlspecialchars($_POST['first_name']);
            $last_name = htmlspecialchars($_POST['last_name']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);
            $ppl = htmlspecialchars($_POST['ppl'], ENT_QUOTES);
            $room_pref = htmlspecialchars($_POST['room_pref']);

            echo "Check your anwsers: <br>
        Arrival: " . $arrival;

            echo "<br>
        Departure: " . $departure;

            echo "<br>
        First name: " . $first_name;

            echo " <br>
        Last name: " . $last_name;

            echo "<br>
        Email: " . $email;

            echo "<br>
        Phone " . $phone;

            echo "<br>
        Number of people " . $ppl;

            echo "<br>
        Prefered room " . $room_pref;
        }
?>
</form>
</body>
</html>
