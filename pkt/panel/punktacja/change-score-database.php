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
        $month = $_GET['month'];
        $plus = $_GET['plus'];
        $minus = $_GET['minus'];
        

        $result = $conn->query("SELECT suma_dodatnie, suma_ujemne, ".$month."_dodatnie, ".$month."_ujemne FROM punkty WHERE ministrant_id = ".$id.";");
        while($row = $result->fetch_assoc()){
            $plus_score_year = intval($row['suma_dodatnie']);
            $minus_score_year = intval($row['suma_ujemne']);
            $plus_score_month_database = intval($row[$month.'_dodatnie']);
            $minus_score_month_database = intval($row[$month.'_ujemne']);
        }
        
        $plus_score_year-=$plus_score_month_database;
        $minus_score_year-=$minus_score_month_database;

        $plus=intval($plus);
        $minus=intval($minus);
        $sum = $plus + $minus;
        
        $plus_score_year+=$plus;
        $minus_score_year+=$minus;
        $sum_score_year = $plus_score_year + $minus_score_year;

        $conn->query("UPDATE punkty SET ".$month."_dodatnie=".$plus.", ".$month."_ujemne=".$minus.", ".$month."= ".$sum.
        ", suma_dodatnie=".$plus_score_year.", suma_ujemne=".$minus_score_year.", suma=".$sum_score_year." WHERE ministrant_id=".$id.";");
    }
    $conn->close();
?>