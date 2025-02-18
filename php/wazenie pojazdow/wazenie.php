<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section id="pierw">
        <h1>Ważenie samochód ciężarowych</h1>
    </section>
    <section id="drugi">
        <img src="obraz1.png" alt="waga">
    </section>
    <main>
        <section id="l">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                $pol = mysqli_connect("localhost", "root", "", "wazenietirow");
                $q =  "SELECT ulica FROM lokalizacje";;
                $w = mysqli_query($pol,$q);
                while($row = mysqli_fetch_array($w)){
                    echo "<li>ulica $row[0]</li>";
                }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id="s">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                $q2 = "SELECT rejestracja, ulica, waga, dzien, czas FROM wagi JOIN lokalizacje ON wagi.lokalizacje_id = lokalizacje.id WHERE waga > 5";
                $w = mysqli_query($pol,$q2);
                while($row = mysqli_fetch_array($w)){
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                    </tr>";

                }
                ?>
            </table>
            <?php
            $q3 = "INSERT INTO wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES ('5', FLOOR(RAND()*10+1), 'DW12345', CURRENT_DATE, CURRENT_TIME)";
            mysqli_query($pol,$q3);
            mysqli_close($pol);
            header("refresh: 10");
            ?>
        </section>
        <section id="p">
            <img src="obraz2.jpg" alt="tir" id="tir">
        </section>
    </main>
    <footer>
        <p>Strone wykonał: 0000000</p>
    </footer>
    
</body>
</html>