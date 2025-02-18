<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
        <section id="raz">
            <img src="logo1.png" alt="lipiec">
        </section>
        <section id="dwa">
            <h1>TERMINARZ</h1>
            <p>najbliższe zadania:
            <?php
                $connect = mysqli_connect('localhost','root','','terminarz');
                $query = "SELECT DISTINCT wpis FROM `zadania` WHERE wpis !='' AND dataZadania BETWEEN '2020-07-01' AND '2020-07-07';";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)){
                    echo "$row[0], ";
                }
            ?>
            </p>
        </section>
    </header>
    <main>
        <?php
        $query2 = "SELECT dataZadania,wpis FROM `zadania` WHERE miesiac = 'lipiec';";
        $result2 = mysqli_query($connect, $query2);
        while ($row = mysqli_fetch_array($result2)){
            echo "<section class='kalendarz'>
                <h6>$row[0]</h6>
                <p>$row[1]</p>
                </section>";
        }
        mysqli_close($connect);
        ?>
    </main>
    <footer>
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>