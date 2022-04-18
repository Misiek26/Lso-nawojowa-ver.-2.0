<?php
session_start();

if(isset($_SESSION['login']) && ($_SESSION['login']==true))
{
    header('Location: score.php');
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
    <meta name="description" content="Strona przeznaczona dla Liturgicznej Służby Oltarza z parafii Nawojowa">

    <link rel="icon" href="icons/lso.jpg">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css?1">
    <link href="styles/assets/dist/css/bootstrap.min.css?1" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/login.css?2" rel="stylesheet">
</head>

<body class="text-center">
    <header class="fixed-top col-md-10 p-3 mt-md-3 text-danger fw-large">
        <span class="paggination">LSO Nawojowa</span>
        <hr style="color:black;">
    </header>
    <main class="form-signin">
        <form action="sign-in.php" method="POST">
        <h3 class="h3 mb-3 fw-large paggination" style="font-size:2.2rem">Zaloguj się:</h3>

        <div class="form-floating">
            <input type="text" class="form-control" name="login" placeholder="name@example.com">
            <label for="floatingInput">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="haslo" placeholder="Password">
            <label for="floatingPassword">Hasło</label>
        </div>

            <?php 
                if(isset($_SESSION['error'])) echo "<h5>".$_SESSION['error']."</h5>";
            ?>
            <div class="mb-3 paggination" style="font-size: 1.2rem; font-weight: 450;">
                <a href="change-password.php">Zmień hasło</a>
                <span>/</span>
                <a href="contact.php">Kontakt</a>
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit">Zaloguj się</button>
        </form>
    </main>
</body>
</html>