<?php
    session_start();

    if(!isset($_SESSION['adminlogin']))
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

    <link rel="icon" href="icons\lso.jpg?1">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <!--Custom styles for this template-->
    <link href="styles/main.css?4" rel="stylesheet">
    <link href="styles/panel.css?13" rel="stylesheet">
    <link href="navigation/navigation.css?1" rel="stylesheet">
    
    <!--Import fonts-->
    <link href="styles/fonts.css" rel="stylesheet">

</head>
<body>
    <div class="container row">
        <!--Navigation-->
        <?php include("navigation/index.php")?>
        
        <h1 class="text-center border-bottom">LSO Nawojowa<br>Panel administracyjny</h1>
        <div class="site-title text-white row">
            <span class="col-8 m-auto" id="site-title">
                Edytowanie punktacji
            </span>
        </div>

        <aside class="col-3 mt-5 left-panel p-5 border-right">
            <ul class="list-group-flush" id="menuLeft">
                <h5 class="ml-4">Menu</h5>
                <li class="list-group-item list-group-item-action" id="show">Podsumowanie</li>
                <li class="list-group-item list-group-item-action" id="insert">Wprowadź punkty</li>
                <li class="list-group-item list-group-item-action" id="change">Zmień punktację</li>
                <li class="list-group-item list-group-item-action" id="move">Przenieś rok</li>
            </ul>
        </aside>
        
        <article class="col-8 m-auto">
            <div class='container' id='panel'>
                <?php 
                ?>
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

    <!--Scripts for this template-->
    <script src="punktacja/scripts/menu.js?9"></script>
    <script src="punktacja/scripts/change-score.js?4"></script>
    <script src='punktacja/scripts/move-year.js?8'></script>
    <script src='punktacja/scripts/insert-score.js?5'></script>

    <?php include("navigation/menu.php")?>
</body>
</html>