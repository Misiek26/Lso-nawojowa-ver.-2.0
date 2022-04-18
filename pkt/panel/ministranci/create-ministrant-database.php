<?php
    require_once "../../connect.php";

    $conn = @new mysqli($host, $db_user, $db_password, $db_name);

    if($conn->connect_errno!=0)
    {
        echo "Error".$conn->connect_errno;
    }
    else
    {
        $conn->set_charset("utf8");

        $firstname =  $_GET['firstname'];
        $lastname =  $_GET['lastname'];
        $login =  $_GET['login'];


        $conn->query("INSERT INTO ministranci VALUES(' ', '".$firstname."', '".$lastname."', '', '".$login."',  '$2y$10$89mJhVIs3iITzpzIEfwulOXICDYrFcGpGF1krObqTHwLNBdb00E2e');");
        $conn->query("INSERT INTO punkty (ministrant_id, suma_poprzedni, suma_dodatnie, suma_ujemne, suma) VALUES('',0,0,0,0);");


        echo "<div class='container m-auto mt-5 p-5 text-center create-ministrant-success'>";
        echo "<h4 class='mt-5 pt-3 text-center'>Ministrant został dodany!</h4>";
        echo "<div class='container mt-4'>";
        echo "<div><b>Login:</b> ".$login."</div>";
        echo "<div><b>Hasło:</b> 123</div>";
        echo "</div>";
        echo "</div>";  
    }
    $conn->close();
?>