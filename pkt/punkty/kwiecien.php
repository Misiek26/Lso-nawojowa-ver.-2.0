<?php
session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <script src="script.js"></script>
</head>
<body>
    <h1>Punkty za Kwiecień</h1>
    <nav id="nav">
        Wybierz miesiąc:
        <ul>
            <li><a href="styczen.php">Styczeń</a></li>
            <li><a href="luty.php">Luty</a></li>
            <li><a href="marzec.php">Marzec</a></li>
            <li><a href="kwiecien.php">Kwiecień</a></li>
            <li><a href="maj.php">Maj</a></li>
            <li><a href="czerwiec.php">Czerwiec</a></li>
            <li><a href="lipiec.php">Lipiec</a></li>
            <li><a href="sierpien.php">Sierpień</a></li>
            <li><a href="wrzesien.php">Wrzesien</a></li>
            <li><a href="pazdziernik.php">Październik</a></li>
            <li><a href="listopad.php">Listopad</a></li>
            <li><a href="grudzien.php">Grudzień</a></li>
            <li><a href="strona.php">Podsumowanie</a></li>
        </ul>
    </nav>
    <article id="article">
        <table id="tabela">
            <tr>
                <th>Id</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Kwiecień_dod</th>
                <th>Kwiecień_ujem</th>
            </tr>
            <?php
                require_once "connect.php";

                $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                $conn->set_charset("utf8");

                if (mysqli_connect_errno())
                    echo "Wystąpił błąd połączenia z bazą";
                
                $wynik = mysqli_query($conn,"SELECT punkty.*, ministranci.* FROM punkty INNER JOIN ministranci ON ministranci.id = punkty.id_ministranta");
                
                echo "<form action='sprawdz4.php'>";
                while($row = mysqli_fetch_array($wynik))
                {
                    $Points_dod = "pt_dod".$row['id'];
                    $Points_ujemne = "pt_ujemne".$row['id'];
                    $Id = $row['id'];
                    echo "<tr><td>".$row['id']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td style='padding:0'><input type='hidden' name=".$Id." value=".$Id."><input style='width:90%' type='number' name=".$Points_dod."></td><td style='padding:0'><input style='width:90%' type='number' name=".$Points_ujemne."></td></tr>";
                }
                
                echo "<input type='submit' id='sub' value='Zatwierdź punkty'></form>";
                mysqli_close($conn);  
            ?>    
        </table>
    </article>
    <div id="buttons">
        <a id="logout" href="logout.php">Wyloguj się</a>
        <button type="button" id="hidden" onclick="hiddenPanel()">Powiększ</button>
    </div>
</body>
</html>