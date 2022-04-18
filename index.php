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
            <h2 class="text-center ml-5">Aktualności</h2>

            <!--Posts-->
            
            <div class="container-fluid posts mt-5">

            <?php 
                require_once "pkt/connect.php";

                $conn = @new mysqli($host, $db_user, $db_password, $db_name);
            
                if($conn->connect_errno!=0)
                {
                    echo "Error".$conn->connect_errno;
                }
                else
                {
                    $conn->set_charset("utf8");
                    $result = $conn->query("SELECT * FROM posty ORDER BY id DESC LIMIT 10;");
                    while($row = $result->fetch_assoc()){
                        echo '<div class="post border-bottom mb-4">';
                        echo "<h3>".$row['title']."</h3>";
                        echo "<span class='publication-date'>".$row['public_date']."</span>";
                        echo $row['content'];
                        echo '</div>';
                    }
                }
                $conn->close();
                
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
</body>
</html>