<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia szkolnia</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Hurtownia z najlepszymi cenami</h1>
    </header>
    <main>
        <section id="l">
            <h2>Nasze ceny</h2>
            <table>
                <?php
                $connect = mysqli_connect('localhost','root','','sklep');
                $query1 ="SELECT nazwa,cena FROM `towary` LIMIT 4;";
                $result1 = mysqli_query($connect, $query1);
                while ($row = mysqli_fetch_array($result1)){ 
                    echo "<tr><td>$row[0]</td></tr>";
                } 
                ?>
            </table>
        </section>
        <section id="s">
            <h2>Koszt zakupów</h2>
            <form action="index.php" method="post">
                wybierz artykuł:
                <select name="list">
                    <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                    <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                    <option value="Cyrkiel">Cyrkiel</option>
                    <option value="Linijka 30 cm">Linijka 30 cm</option>
                </select><br>
                <label name="liczba">liczba sztuk:</label>
                <input type="number" name="ilosc"><br>
                <button type="submit" name="submit">OBLICZ</button>
                
            </form>
            <?php
             if (isset($_POST['submit'])) {
                $produkt = $_POST['list'];
                $ilosc = $_POST['ilosc'];
                $query2 = "SELECT cena FROM towary WHERE nazwa like '$produkt';";
                $result2 = mysqli_query($connect, $query2);
                while ($row = mysqli_fetch_array($result2)) {
                    $cena = $row[0] * $ilosc;
                    echo "wartość zakupów: $cena";
                }
            }
            mysqli_close($connect);
                ?>
        </section>
        <section id="r">
            <h2>Kontakt</h2>
            <img src="zakupy.png" alt="hurtownia">
            <a href="mailto:hurt@poczta2.pl">e-mail: hurt@poczta2.pl</a>
        </section>
    </main>
    <footer>
        <h4>Witrynę wykonał: 00000000</h4>
    </footer>
</body>
</html>