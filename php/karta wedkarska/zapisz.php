<?php
$login="root";
$pwd="";
$host="localhost";
$db="wedkowanie";
    $pol=mysqli_connect($host, $login, $pwd, $db);
    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['adres'])) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $adres = $_POST['adres'];
        $kw = "INSERT INTO karty_wedkarskie VALUES (NULL, '$imie', '$nazwisko', '$adres', 'NULL', NULL);";
        mysqli_query($pol, $kw);
    }
    mysqli_close($pol); 

?>