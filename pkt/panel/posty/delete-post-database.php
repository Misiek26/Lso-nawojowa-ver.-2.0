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

        $id = $_GET['id'];
        $conn->query("DELETE FROM posty WHERE id = ".$id.";");

        $conn->close();
    }

    header('Location:../panel.php?page=posty&delete=true');
?>
