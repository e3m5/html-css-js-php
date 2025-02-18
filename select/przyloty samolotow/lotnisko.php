<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id="raz">
            <img src="zad5.png" alt="logo lotnisko">
        </section>
        <section id="dwa">
            <h1>Przyloty</h1>
        </section>
        <section id="trzy">
            <h3>przydatne linki</h3>
            <a href="kw.txt" target="_blank">Pobierz...</a>
        </section>
    </header>
    <main>
        <table>
            <th>
                <td>czas</td>
                <td>kierunek</td>
                <td>numer rejsu</td>
                <td>status</td>
            </th>
            <?php
            $connect = mysqli_connect('localhost','root','','egzamin');
            $query = "SELECT czas, kierunek,nr_rejsu,status_lotu FROM `przyloty` ORDER BY czas asc; ";
            $result = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td> 
                            <td>$row[2]</td> 
                            <td>$row[3]</td>  
                     </tr>";
            }
            mysqli_close($connect);
            ?>
        </table>
    </main>
    <footer>
        <section id="l">
            <?php
            if(isset($_COOKIE['ciasteczko'])) {
                echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
            } else {
                setcookie("ciasteczko", 1, time() + 7200);
                echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
            }
            ?>
        </section>
        <section id = "p">
            <p>Autor: 0000000</p>
        </section>
    </footer>
    
</body>
</html>