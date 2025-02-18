<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <section id="l">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id="p">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li>
            </ol>
        </section>
    </header>
    <main>
        <?php
        $connect = mysqli_connect('localhost','root','','dane2');
        $query = "SELECT nazwa,ilosc,opis,cena,zdjecie FROM `produkty` WHERE Rodzaje_id = '1' or Rodzaje_id = '2'";
        $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($result)){
            echo "<section class = 'produkt'>
                    <img src='$row[4].png' alt='warzywniak'>
                    <p>opis: $row[2] </p>
                    <p>na stanie: $row[1] </p>
                    <h2>cena: $row[3] zł</h2>
                </section>";
        }
        ?>
    </main>
    <footer>
        <form action="index.php" method="post">
            <label for="nazwa">Nazwa:</label>
            <input type="text" name="nazwa">
            <label for = "cena">Cena:</label>
            <input type="text" name="cena">
            <button>Dodaj produkt</button><br>
        </form>
        <?php
        if  (!empty($_POST['nazwa']) && !empty($_POST['cena'])) {
            $nazwa = $_POST["nazwa"];
            $cena = $_POST["cena"];

            $query2 = "INSERT INTO `produkty`(`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL,'1','4','$nazwa','10','','$cena','owoce.jpg'):";
            mysqli_query($connect,$query2);
        }
        mysqli_close($connect);
        ?>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>