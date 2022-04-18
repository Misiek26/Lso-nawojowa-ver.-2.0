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
        $conn->query("UPDATE panel SET ranking_miesiac='".$_GET['month']."';");
        
        if(isset($_GET['id']) && isset($_GET['plus']) && isset($_GET['minus']))
        {
            $month = $_GET['month'];
            $id = $_GET['id'];
            $plus = $_GET['plus'];
            $minus = $_GET['minus'];
            $sum = intval($plus) + intval($minus);
            
            if($plus!="" && $minus!=""){
                $conn->set_charset("utf8");
                $result=$conn->query("SELECT ".$month."_dodatnie, ".$month."_ujemne, suma_dodatnie, suma_ujemne FROM punkty WHERE ministrant_id = ".$id.";");
    
                $row=$result->fetch_assoc();
    
                $plus_year = intval($row['suma_dodatnie']) - intval($row[$month.'_dodatnie']);
                $plus_year += intval($plus);
                
                $minus_year = intval($row['suma_ujemne']) - intval($row[$month.'_ujemne']);
                $minus_year += intval($minus);
    
                $sum_year = $plus_year + $minus_year;
    
                $conn->query("UPDATE punkty SET ".$month."_dodatnie=".$plus.", ".$month."_ujemne=".$minus.", ".$month."=".$sum.", suma_dodatnie=".$plus_year.", suma_ujemne=".$minus_year.", suma=".$sum_year." WHERE ministrant_id =".$id.";");
            }
        }
    }
    $conn->close();
?>