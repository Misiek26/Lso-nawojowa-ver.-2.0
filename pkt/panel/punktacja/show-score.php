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
        $result = $conn->query("SELECT ministranci.id, ministranci.imie, ministranci.nazwisko, punkty.suma_dodatnie, punkty.suma_ujemne, punkty.suma 
            FROM ministranci INNER JOIN punkty ON ministranci.id = punkty.ministrant_id WHERE id>2 ORDER BY id;");
        echo "<div class='container m-auto mt-5 p-5 text-center'>";
        echo "<h4 class='m-3 mb-5'>Podsumowanie punktów</h4>";
        echo "<table class='table table-hover border'>";
        echo "<tr class='text-white' style='background:#990000'><th>Id</th><th>Imię</th><th>Nazwisko</th><th>Dodatnie</th><th>Ujemne</th><th>Suma punktów</th></tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row['id']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['suma_dodatnie']."</td><td>".$row['suma_ujemne']."</td><td>".$row['suma']."</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    $conn->close();
?>