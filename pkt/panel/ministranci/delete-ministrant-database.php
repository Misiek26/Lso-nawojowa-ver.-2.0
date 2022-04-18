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

        $id =  $_GET['id'];

        $result = $conn->query("SELECT `login`, `imie`, `nazwisko` FROM ministranci WHERE id=".$id.";");
        $row = mysqli_fetch_assoc($result);

        $conn->query("DELETE FROM punkty WHERE ministrant_id=".$id.";");
        $conn->query("DELETE FROM ministranci WHERE id=".$id.";");

        echo "<div class='container m-auto mt-5 p-5 text-center create-ministrant-success'>";
        echo "<h4 class='mt-5 pt-3 text-center'>Ministrant został usunięty!</h4>";
        echo "<div class='container mt-4'>";
        echo "<div><b>Id:</b> ".$id."</div>";
        echo "<div><b>Login:</b> ".$row['login']."</div>";
        echo "<div><b>Imię:</b> ".$row['imie']."</div>";
        echo "<div><b>Nazwisko:</b> ".$row['nazwisko']."</div>";
        echo "</div>";
        echo "</div>";  
    }
    $conn->close();
?>