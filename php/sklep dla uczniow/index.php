<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </header>
    <main>
        <section id="left">
            <h2>Taniej o 30%</h2>
            <ol>
                <?php
                $connect = mysqli_connect('localhost', 'root', '', 'sklepdwa');
                $query = "SELECT nazwa FROM towary WHERE promocja = 1;";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<li>$row[0]</li>";
                }
                ?>
            </ol>
        </section>
        <section id="mid">
            <h2>Sprawdź cenę</h2>
            <form action="index.php" method="post">
                <select id="towary" name="towary">
                    <option value="Gumka do mazania">Gumka do mazania</option>
                    <option value="Cienkopis">Cienkopis</option>
                    <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                    <option value="Markery 4 szt.">Markery 4 szt.</option>
                  </select>
                  <button type="submit">SPRAWDŹ</button>
            </form>
            <section class="result">
                <?php
                if (isset($_POST['submit'])) {
                    $produkt = $_POST['list'];
                    $query2 = "SELECT cena FROM towary WHERE nazwa = '$produkt';";
                    $result = mysqli_query($connect, $query2);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "cena regularna: $row[0]</br>";
                        $cena = ROUND($row[0] * 0.7, 2);
                        echo "cena w promocji 30%: $cena";
                    }
                }
                mysqli_close($connect);
                ?>
            </section>
        </section>
        <section id="right">
            <a href="mailto:bok@sklep.pl">e-mail: bok@sklep.pl</a><br>
            <img src="promocja.png" alt="promocja">
        </section>
    </main>
    <footer>
        <H4>autor strony: 00000000</H4>
    </footer>
</body>
</html>