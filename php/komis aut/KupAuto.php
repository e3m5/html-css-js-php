<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis Aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1><em>KupAuto!</em>Internetowy Komis Samochodowy</h1>
    </header>
    <main>
        <section id="jeden">
            <?php
                $con = mysqli_connect('localhost','root','','kupauto');
                $query1 = "SELECT model,rocznik,przebieg,paliwo,cena,zdjecie FROM samochody WHERE id LIKE 10;";
                $result1 = mysqli_query($con,$query1);
                while ($row = mysqli_fetch_array($result1)){
                    echo "<img src='$row[5]' alt = 'oferta dnia'>";
                    echo "<h4>Oferta dnia: Toyota $row[0]</h4>";
                    echo "<p>Rocznik: $row[1], przebieg: $row[2], rodzaj paliwa: $row[3]</p>";
                    echo "<h4>Cena: $row[4]</h4>";
                }
            ?>
        </section>
        <section id="dwa">
            <h2>Oferty Wyróżnione</h2>
            <?php
            $query2 = "SELECT marki.nazwa, samochody.model,samochody.rocznik,samochody.cena,samochody.zdjecie FROM marki RIGHT JOIN samochody on marki.id = samochody.marki_id LIMIT 4; ";
            $result2 = mysqli_query($con,$query2);
            while ($row = mysqli_fetch_array($result2)){
                echo "<div class='blok'>";
                echo "<img src='$row[5]' alt='$row[2]'>";
                echo "<h4>$row[0] $row[1]</h4>";
                echo "<p>Rocznik: $row[4]</p>";
                echo "<h4>Cena: $row[3]</h4>";
                echo "</div>";
            }
            ?>
        </section>
        <section id="trzy">
            <h2>Wybierz markę:</h2> 
            <form action="KupAuto.php" method="post">
                <select name="marka">
                    <?php
                    $query3 = "SELECT nazwa FROM `marki`;";
                    $result3 = mysqli_query($con,$query3);
                    while ($row = mysqli_fetch_array($result3)){
                       echo "<option value='$row[0]'>$row[0]</option>"; 
                    }
                    ?>
                </select>
                <button type="submit" name="wyszukaj">Wyszukaj</button>
            </form>
            <?php
             if (isset($_POST['wyszukaj'])) {
                $marka = $_POST['marka'];
                $query4 = "SELECT model,cena,zdjecie, marki.nazwa FROM samochody INNER JOIN marki on samochody.marki_id = marki.id where marki.nazwa like 'Audi'; ";
                $result4 = mysqli_query($con,$query4);
                while ($row = mysqli_fetch_array($result4)){
                    echo "<div class='blok'>";
                    echo "<img src='$row[2]' alt='$row[0]'>";
                    echo "<h4>$marka $row[0]</h4>";
                    echo "<h4>Cena: $row[1]</h4>";
                    echo "</div>";
                }
             }
             mysqli_close($con);
            ?>
        </section>
    </main>
    <footer>
        <p>Stronę wykonał: 0000000000</p>
        <a href="http://firmy.pl/komis">Znajdź nas także</a>
    </footer>
</body>
</html>