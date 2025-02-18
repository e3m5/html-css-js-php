<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Biblioteka w Książkowicach Małych</h1></header>
    <main>
        <section id="l">
            <h4>Dodaj czytelnika</h4>
            <form action="biblioteka.php" method="post">
                <label for="imie">imię:</label>
                <input type="text" name="imie"><br>
                <label for="nazwisko">nazwisko:</label>
                <input type="text"  name="nazwisko"><br>
                <label for="symbol">symbol:</label>
                <input type="number" name="symbol"><br>
                <button type="submit">AKCEPTUJ</button><br>
            </form>
            <?php
            $connect = mysqli_connect('localhost','root','','biblioteka');
            if (isset($_POST["submit"])) {
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $symbol = $_POST['symbol'];
                $query = "INSERT INTO czytelnicy(imie, nazwisko, kod) VALUES ('$imie','$nazwisko', '$symbol');";
                mysqli_query($connect, $query);
                echo "Dodano czytelnika $imie $nazwisko";
            }
            ?>
        </section>
        <section id="s">
            <img src="biblioteka.png" alt="biblioteka">
            <h6>ul. Czytelników&nbsp;15, Książkowice Małe</h6>
            <a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a>
        </section>
        <section id="p">
            <h4>Nasi czytelnicy:</h4>
            <ol>
                <?php
                $query2 = "SELECT imie,nazwisko FROM `czytelnicy` ORDER BY nazwisko asc;";
                $result = mysqli_query($connect, $query2);
                while ($row = mysqli_fetch_array($result)){
                    echo "<li>$row[0] $row[1]</li>";
                }
                mysqli_close($connect);
                ?>
            </ol>
        </section>
    </main>
    <footer><p>Projekt witryny:00000000</p></footer>
</body>
</html>