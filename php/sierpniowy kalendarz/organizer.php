<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id="raz"><H1>Organizer: SIERPIEŃ</H1></section>
        <section id="dwa">
            <form action="organizer.php" method="post">
                <label for="wydarzenie">Zapisz wydarzenie:</label>
                <input type="text" name="event">
                <button type="submit">OK</button><br>
            </form>
            <?php
            $connect = mysqli_connect('localhost','root','','kalendarz');
        if (isset($_POST["submit"])){
            $event = $_POST["event"];
            $query = "UPDATE `zadania` SET `wpis`= '$event' WHERE dataZadania like '2020-08-09';";
            mysqli_query($connect,$query);
            }
            ?>
        </section>
        <section id="trzy">
            <img src="logo2.png" alt="sierpień">
        </section>
    </header>
    <main>
        <?php
        $query2 = "SELECT dataZadania,wpis FROM `zadania` WHERE miesiac like 'sierpien'";
        $result = mysqli_query($connect,$query2);
        while ($row = mysqli_fetch_array($result)){
            echo "<section class = 'kalendarz'>
                    <h5>$row[0]</h5>
                    <p>$row[1]</p>
                </section>"; 
        }
        mysqli_close($connect);
        ?>
    </main>
    <footer>
        <p>Strone wykonał: 0000000</p>
    </footer>
</body>
</html>