<?php
session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "connect.php";
        require_once "listopad.php";

        $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        $conn->set_charset("utf8");

        if (mysqli_connect_errno())
            echo "Wystąpił błąd połączenia z bazą";
    
        $wynik = mysqli_query($conn,"SELECT punkty.*, ministranci.* FROM punkty INNER JOIN ministranci ON ministranci.id = punkty.id_ministranta");

        while($row = mysqli_fetch_array($wynik))
        {
            $id = $row['id'];
            $St_dod = "pt_dod".$row['id']; 
            $St_ujemne = "pt_ujemne".$row['id'];

            $points_dod = $_GET[$St_dod];
            $points_ujemne = $_GET[$St_ujemne];
            $points_Suma = (int)$points_dod + (int)$points_ujemne;
            
            
            $Suma_dod = (int)$row['Suma_dod'] + (int)$points_dod;
            $Suma_ujemne = (int)$row['Suma_ujemne'] + (int)$points_ujemne;

            if((int)$row['Listopad_dod']!=0)
                $Suma_dod -= (int)$row['Listopad_dod'];
            if((int)$row['Listopad_ujemne']!=0)
                $Suma_ujemne += ((int)$row['Listopad_ujemne']) * (-1);
                
            $Suma = (int)$Suma_dod + (int)$Suma_ujemne;

            $ins = mysqli_query($conn,"UPDATE punkty SET Listopad_dod = $points_dod, Listopad_ujemne = $points_ujemne, Listopad = $points_Suma, Suma_dod = $Suma_dod, Suma_ujemne = $Suma_ujemne, Suma = $Suma WHERE id_ministranta = $id;");
        }
        
        mysqli_close($conn);  
    ?>
</body>
</html>