<?php
    session_start();

    if(!isset($_SESSION['login']))
    {
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Lso Nawojowa, Parafia Nawojowa, Nawojowa, Lso, ministranci, ministranci Nawojowa">
    <meta name="description" content="Strona przeznaczona dla Liturgicznej Służby Oltarza z parafii Nawojowa">
    
    <title>LSO Nawojowa</title>

    <link rel="icon" href="icons/lso.jpg">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <!--Custom styles for this template-->
    <link href="styles/main.css" rel="stylesheet">
    <link href="styles/score.css" rel="stylesheet">
    <link href="navigation/navigation.css" rel="stylesheet">
    
    <!--Import fonts-->
    <link href="styles/fonts.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <!--Navigation-->
        <?php include("navigation/index.php")?>
        
        <h1 class="text-center border-bottom">Liturgiczna Służba Ołtarza<br> Parafia Nawojowa</h1>
        
        <article class="pt-5">
            <div class="container row">
                <span class="text-right logout"><a href="logout.php">Wyloguj się</a></span>
            </div>
            <h2 class="text-center ml-5">Punkty</h2>
            <div class="score-title mt-5 mb-3 row">
                <?php
                    echo "<h4 class='person col-md-6'><b>Ministrant:</b> ".$_SESSION['imie']." ".$_SESSION['nazwisko']."</h4>";
                    echo "<h4 class='score-for-year col-md-6'><b>Poprzedni rok:</b> ".$_SESSION['suma_poprzedni']."</h4>";
                ?>
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <tr>
                        <th>Miesiąc</th>
                        <th>I</th>
                        <th>II</th>
                        <th>III</th>
                        <th>IV</th>
                        <th>V</th>
                        <th>VI</th>
                        <th>VII</th>
                        <th>VIII</th>
                        <th>IX</th>
                        <th>X</th>
                        <th>XI</th>
                        <th>XII</th>
                        <th>Razem</th>
                    </tr>
                    <tr>
                        <td>Punkty</td>
                        <?php
                            echo "<td>".$_SESSION['styczen_dodatnie']."</td>";
                            echo "<td>".$_SESSION['luty_dodatnie']."</td>";
                            echo "<td>".$_SESSION['marzec_dodatnie']."</td>";
                            echo "<td>".$_SESSION['kwiecien_dodatnie']."</td>";
                            echo "<td>".$_SESSION['maj_dodatnie']."</td>";
                            echo "<td>".$_SESSION['czerwiec_dodatnie']."</td>";
                            echo "<td>".$_SESSION['lipiec_dodatnie']."</td>";
                            echo "<td>".$_SESSION['sierpien_dodatnie']."</td>";
                            echo "<td>".$_SESSION['wrzesien_dodatnie']."</td>";
                            echo "<td>".$_SESSION['pazdziernik_dodatnie']."</td>";
                            echo "<td>".$_SESSION['listopad_dodatnie']."</td>";
                            echo "<td>".$_SESSION['grudzien_dodatnie']."</td>";
                            echo "<td>".$_SESSION['suma_dodatnie']."</td>";
                        ?>
                    </tr>
                    <tr>
                        <td>Ujemne</td>
                        <?php
                        echo "<td>".$_SESSION['styczen_ujemne']."</td>";
                        echo "<td>".$_SESSION['luty_ujemne']."</td>";
                        echo "<td>".$_SESSION['marzec_ujemne']."</td>";
                        echo "<td>".$_SESSION['kwiecien_ujemne']."</td>";
                        echo "<td>".$_SESSION['maj_ujemne']."</td>";
                        echo "<td>".$_SESSION['czerwiec_ujemne']."</td>";
                        echo "<td>".$_SESSION['lipiec_ujemne']."</td>";
                        echo "<td>".$_SESSION['sierpien_ujemne']."</td>";
                        echo "<td>".$_SESSION['wrzesien_ujemne']."</td>";
                        echo "<td>".$_SESSION['pazdziernik_ujemne']."</td>";
                        echo "<td>".$_SESSION['listopad_ujemne']."</td>";
                        echo "<td>".$_SESSION['grudzien_ujemne']."</td>";
                        echo "<td>".$_SESSION['suma_ujemne']."</td>";
                        ?>
                    </tr>
                    <tr>
                        <td>Suma</td>
                        <?php
                        echo "<td>".$_SESSION['styczen']."</td>";
                        echo "<td>".$_SESSION['luty']."</td>";
                        echo "<td>".$_SESSION['marzec']."</td>";
                        echo "<td>".$_SESSION['kwiecien']."</td>";
                        echo "<td>".$_SESSION['maj']."</td>";
                        echo "<td>".$_SESSION['czerwiec']."</td>";
                        echo "<td>".$_SESSION['lipiec']."</td>";
                        echo "<td>".$_SESSION['sierpien']."</td>";
                        echo "<td>".$_SESSION['wrzesien']."</td>";
                        echo "<td>".$_SESSION['pazdziernik']."</td>";
                        echo "<td>".$_SESSION['listopad']."</td>";
                        echo "<td>".$_SESSION['grudzien']."</td>";
                        echo "<td>".$_SESSION['suma']."</td>";
                        ?>
                    </tr>
                </table>
            </div>

            <div class="leaderboard container mt-5 border-top">
                <h2 class="mt-3 text-center">Ranking ministrantów</h2>
                <?php
                            require_once "connect.php";
                            
                            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
                            
                            if($conn->connect_errno!=0)
                            {
                                echo "Error".$conn->connect_errno;
                            }
                            else
                            {
                                $conn->set_charset("utf8");
                                $month = $conn->query("SELECT * FROM panel");
                                $month = $month->fetch_assoc();
                                $month = $month['ranking_miesiac'];

                                echo "<h4 class='text-center'>".ucfirst($month)."</h2>";
                                echo "<div class='table-responsive'>";
                                echo "<table class='table table-striped text-center'>";
                                echo "<tr>
                                        <th>Miejsce</th>
                                        <th>Imię</th>
                                        <th>Nazwisko</th>
                                        <th>Punkty</th>
                                    </tr>";

                                $result = $conn->query("SELECT ministranci.imie, ministranci.nazwisko, punkty.".$month." AS punkty
                                FROM ministranci INNER JOIN punkty ON ministranci.id = punkty.ministrant_id WHERE ministrant_id>2 ORDER BY ".$month." DESC;");
                                $place = 0;
                                while($row = $result->fetch_assoc()){
                                    echo "<tr><td>".++$place."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['punkty']."</td></tr>";
                                }
                                
                            }    
                            $conn->close();
                        ?>
                    </table>
                </div>
            </div>
        </article>
    </div>

    <footer class="footer text-center mt-5">
        <div class="container">
            <h3>KONTAKT</h3>
            <p class="border-bottom pb-3">Parafia pod wezwaniem Nawiedzenia Najświętszej Maryi Panny
                <br>ul. Zamkowa 34, 33-335 Nawojowa
                <br>tel: 796 094 794
                <br>e-mail: nawojowa@diecezja.tarnow.pl
                <br>Numer konta: 45 8811 0006 0022 0200 1166 0200
            </p>
            <p>Wszystkie dane osobowe umieszczone są za zgodą osób zainteresowanych lub na mocy prawa.<br>
                ©2022 Parafia Nawiedzenia NMP w Nawojowej. All Rights Reserved.
            </p>
        </div>
    </footer>

    <!--Scripts for Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>