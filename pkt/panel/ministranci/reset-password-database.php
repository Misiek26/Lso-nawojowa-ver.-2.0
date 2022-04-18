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

        $conn->query("UPDATE ministranci SET haslo='$2y$10$89mJhVIs3iITzpzIEfwulOXICDYrFcGpGF1krObqTHwLNBdb00E2e' WHERE id=".$id.";");
        $result = $conn->query("SELECT `login` FROM ministranci WHERE id=".$id.";");

        $row = mysqli_fetch_assoc($result);
        
        echo "<div class='container m-auto mt-5 p-5 text-center create-ministrant-success'>";
        echo "<h4 class='mt-5 pt-3 text-center'>Hasło zostało zresetowane!</h4>";
        echo "<div class='container mt-4'>";
        echo "<div><b>Login:</b> ".$row['login']."</div>";
        echo "<div><b>Hasło:</b> 123</div>";
        echo "</div>";
        echo "</div>";  
    }
    $conn->close();
?>