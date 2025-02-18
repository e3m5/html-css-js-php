<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id="raz">
            <h2>Nasze osiedle</h2>
        </section>
        <section id="dwa">
            <?php
            $connect = mysqli_connect('localhost','root','','portal');
            $query1 = "SELECT count(*) FROM `dane`;";
            $result = mysqli_query($connect, $query1);
            while ($row = mysqli_fetch_array($result)){
                echo "<h5>Liczba użytkowników portalu: $row[0]</h5>";
            }
            ?>
        </section>
    </header>
    <main>
        <section id="l">
            <h3>Logowanie</h3>
            <form action="uzytkownicy.php" method="post">
                <label for="login">login<br>
                    <input type="text" name="login"><br>
                </label>
                <label for="haslo"><br>
                <input type="password" name="haslo" >hasło<br>
                </label>
                <button type="submit" name="zaloguj">Zaloguj</button><br>
            </form>
        </section>
        <section id="p">
            <h3>Wizytówka</h3>
            <?php
            if(!empty($_POST['login']) && !empty($_POST['haslo'])) {
                $login = $_POST['login'];
                $haslo = $_POST['haslo'];
                $query2 = "SELECT login FROM uzytkownicy WHERE login = '$login';";
			    $result2 = mysqli_query($connect, $query2);
			    if(mysqli_num_rows($result2) == 1) {
                    $query3 = "SELECT haslo FROM uzytkownicy WHERE login = '$login';";
				    $result3 = mysqli_query($connect, $query3);
				    while($row = mysqli_fetch_row($result3)) {
                        $szyfr = sha1($haslo);
					if($szyfr == $tab[0]) {
                        $query4 = "SELECT u.login, d.rok_urodz, d.przyjaciol, d.hobby, d.zdjecie FROM uzytkownicy u INNER JOIN dane d ON u.id = d.id WHERE u.login = '$login';";
                        $result4 = mysqli_query($connect, $query4);
						while($row = mysqli_fetch_row($result4)) {
							echo "<div class='wizytowka'>";
							echo "<img src='$tab[4]' alt='osoba' />";
							$wiek = DATE("Y") - $tab[1];
							echo "<h4>$tab[0] ($wiek)</h4>";
							echo "<p>hobby: $tab[3]</p>";
							echo "<h1><img src='icon-on.png' /> $tab[2]</h1>";
							echo "<a href='dane.html'><button type='button'>Więcej informacji</button></a>";
							echo "</div>";
						}
					} else echo "hasło nieprawidłowe";
				}
				
			} else echo "login nie istnieje";
		}
		mysqli_close($connect);
		?>
	</div>
                        
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał:000000000</p>
    </footer>
</body>
</html>