<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <section id="l">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </section>
        <section id="p">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </section>
    </header>
    <section id="polecamy">
        <h3>Polecamy</h3>
        <?php
        $connect = mysqli_connect('localhost','root','','dane3');
        $query = "SELECT id,nazwa,opis,zdjecie FROM `produkty` WHERE id in (18,22,23,25); ";
        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_array($result)){
            echo "<section class = 'film'>
            <h4>$row[0]. $row[1]</h4>
			<img src='$row[3]' alt='film'>
			<p>$row[2]</p>
            </section>
            ";
        }
        ?>
    </section>
    <section id="fantasy">
        <h3>Filmy fantastyczne</h3>
        <?php
        $query2 = "SELECT id,nazwa,opis,zdjecie FROM `produkty` WHERE Rodzaje_id = 12; ";
        $result2 = mysqli_query($connect, $query2);
        while ($row = mysqli_fetch_array($result2)){
            echo "<section class = 'film'>
            <h4>$row[0]. $row[1]</h4>
			<img src='$row[3]' alt='film'>
			<p>$row[2]</p>
            </section>
            ";
        }
        ?>
    </section>
    <footer>
        <form action="video.php" method="post">
            <label for="del">Usuń film nr.:</label>
            <input type="number" name="nr">
            <button>Usuń film</button>
        </form>
        <?php
        if(!empty($_POST['nr'])) {
			$nr = $_POST['nr'];
			$query3 = "DELETE FROM produkty WHERE id = $nr;";
			mysqli_query($connect, $query3);
		}
		mysqli_close($connect);
        ?>
        <p>strone wykonał:<a href="mailto:ja@poczta.com">000000</a></p>
    </footer>
</body>
</html>