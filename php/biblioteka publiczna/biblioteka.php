<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
    <main>
        <section id="left">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <?php
                $connect = mysqli_connect('localhost','root','','bibliotekadwa');
                $query = "SELECT imie,nazwisko FROM `autorzy` ORDER BY nazwisko ASC;";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($result)){
                    echo "<li>$row[0] $row[1]</li>";
                }
                ?>
            </ol>
        </section>
        <section id="mid">
            <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
            <a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a>
            <img src="biblioteka.png" alt="książki">
        </section>
        <section id="right">
            <section id="up">
                <h3>Dodaj czytelnika:</h3>
                <form action="biblioteka.php" method="post">
                    <label for="imie">Imię:</label>
                    <input type="text" name="imie" required><br>
                    <label for="nazwisko">Nazwisko:</label>
                    <input type="text" name="nazwisko"><br>
                    <label for="symbol">Symbol:</label>
                    <input type="number" name="symbol"><br>
                    <button type="submit">DODAJ</button>
                </form>
            </section>
            <section id="down">
                <?php
                if (isset($_POST["submit"])) {
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $symbol = $_POST['symbol'];
                    $query2 = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie',
                    '$nazwisko', '$symbol');";
                    mysqli_query($connect, $query2);
                    echo "Czytelnik: $imie $nazwisko został(a) dodany do bazy danych";
                }
                mysqli_close($connect);
                ?>
            </section>
        </section>
    </main>
    <footer>
        <p>Projekt strony: 000000</p>
    </footer>
</body>
</html>