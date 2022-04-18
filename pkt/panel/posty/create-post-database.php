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

        $title =  $_POST['title'];
        $date = date("d.m.Y");
        $content =  $_POST['content'];

        $conn->query("INSERT INTO posty VALUES(' ', '".$title."', '".$date."', '".$content."');");

        $conn->close();
    }

    header('Location:../panel.php?page=posty&create=true');
?>
