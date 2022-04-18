<?php
    session_start();
?>
<!doctype html>
<html>

<head>
    <title>LSO Nawojowa, ministranci Nawojowa, strona LSO </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Lso Nawojowa, Parafia Nawojowa, Nawojowa, Lso, ministranci, ministranci Nawojowa">
    <meta name="description" content="Strona przeznaczona dla Liturgicznej Służby Oltarza z parafii Nawojowa">

    <link rel="icon" href="icons/lso.jpg?1">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link href="styles/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/login.css" rel="stylesheet">
</head>

<body class="text-center">
    <header class="fixed-top col-md-10 p-3 mt-md-3 text-danger fw-large">
        <span class="paggination">LSO Nawojowa - panel administracyjny</span>
        <hr style="color:black;">
    </header>
    <main class="form-signin">
        <form action="change.php" method="POST">
            <h3 class="h3 mb-3 fw-large paggination" style="font-size:2.2rem">Zmień hasło:</h3>
            
            <div class="form-floating">
                <input type="text" class="form-control" name="login" placeholder="name@example.com">
                <label for="floatingInput">Login</label>
            </div>
            <div class="pass">
                <div class="form-floating">
                    <input type="password" class="form-control" name="haslo" placeholder="Password">
                    <label for="floatingPassword">Stare hasło</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="nowehaslo" placeholder="Password">
                    <label for="floatingPassword">Nowe hasło</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="powtorzhaslo" placeholder="Password">
                    <label for="floatingPassword">Powtórz hasło</label>
                </div>
            </div>

            <?php 
                if(isset($_SESSION['error'])) echo "<h5>".$_SESSION['error']."</h5>";
            ?>

            <div class="mb-3 paggination" style="font-size: 1.2rem; font-weight: 450;">
                <a href="index.php">Zaloguj się</a>
                <span>/</span>
                <a href="contact.php">Kontakt</a>
            </div>
            <button class="w-100 btn btn-lg btn-danger" type="submit">Zmień hasło</button>
        </form>
    </main>
</body>
</html>