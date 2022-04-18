<?php
session_start();

if(isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true))
{
    header('Location: strona.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LSO Nawojowa, ministranci Nawojowa, strona LSO </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="Lso Nawojowa, Parafia Nawojowa, Nawojowa, Lso, ministranci, ministranci Nawojowa">
        <meta name="description" content="Strona przeznaczona dla Liturgicznej Sluzby Oltarza z prafii Nawojowa">
        <link rel="stylesheet" href="style.css">
        <script src='https://kit.fontawesome.com/e5a12dc02e.js'></script>
        <link rel="icon" href="lso.jpg">
    </head>
    <body>
    <header>
    <span>LSO Nawojowa - punkty</span>
    </header>
        <br><br>
    <article>
        <div class="login">Logowanie <div>
            <form action="zaloguj.php" method="POST">
                <span >Login:</span> <input type="text" name="login" placeholder="Wpisz swój login..."><br>
                <span >Hasło:</span> <input type="password" name="haslo" placeholder="Wprowadź swoje haslo..."><br>
            <?php 
                if(isset($_SESSION['blad'])) echo $_SESSION['blad']."<br>";
            ?>
            <input class="wyslij" type="submit" value="Zaloguj->">
            </form>
    </article>
    </body>
</html>