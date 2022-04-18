<?php

if(!isset($_GET['move'])){
    echo "<div class='container m-auto mt-5 p-5 text-center'>";
    echo "<h4 class='mt-5 pt-3 text-center'>Czy na pewno chcesz przenieść punktację na kolejny rok?</h4>";
    echo "<button class='btn btn-outline-danger col-3 mt-5 move-year' type='button' onclick='moveYear()'>Zatwierdź</button>";
    echo "</div>";
}
else{
    require_once "../../connect.php";

    $conn = @new mysqli($host, $db_user, $db_password, $db_name);

    if($conn->connect_errno!=0)
    {
        echo "Error".$conn->connect_errno;
    }
    else
    {
        $conn->set_charset("utf8");
        $result = $conn->query("SELECT ministrant_id, suma FROM punkty;");
        $conn->query("DELETE FROM punkty;");

        while($row = $result->fetch_assoc()){
            $id = $row['ministrant_id'];
            $sum = $row['suma'];
            $conn->query("INSERT INTO punkty(ministrant_id, suma_poprzedni, suma_dodatnie, suma_ujemne, suma) VALUES (".$id.", ".$sum.", 0, 0, 0);");
        }
        
    }
    $conn->close();
}
?>

