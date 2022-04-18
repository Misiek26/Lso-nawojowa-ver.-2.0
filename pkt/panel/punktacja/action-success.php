<?php
    if(isset($_GET['inserted'])){
        echo "<div class='container m-auto mt-5 p-5 text-center'>";
        echo "<h4 class='mt-5 pt-3 text-center'>Punktacja w danym miesiącu została uzupełniona!</h4>";
        echo "<button class='btn btn-outline-danger col-3 mt-5 move-year' onclick='back()' type='button'>Powrót</button>";
        echo "</div>";  
    }
    elseif(isset($_GET['moved'])){
        echo "<div class='container m-auto mt-5 p-5 text-center'>";
        echo "<h4 class='mt-5 pt-3 text-center'>Punktacja została przeniesiona na kolejny rok!</h4>";
        echo "<button class='btn btn-outline-danger col-3 mt-5 move-year' onclick='back()' type='button'>Powrót</button>";
        echo "</div>";
    }
    elseif(isset($_GET['changed'])){
        echo "<div class='container m-auto mt-5 p-5 text-center'>";
        echo "<h4 class='mt-5 pt-3 text-center'>Punktacja dla danego ministranta została zmieniona</h4>";
        echo "<button class='btn btn-outline-danger col-3 mt-5 move-year' onclick='back()' type='button'>Powrót</button>";
        echo "</div>";
    }
?>