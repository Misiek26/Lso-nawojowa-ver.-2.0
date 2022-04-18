<div class="container m-auto mt-5 p-5 text-center">
    <?php
        if(isset($_GET['set'])){
            echo "<h4 class='mt-3 text-center'>Wprowadzasz punkty za ".$_GET['month']."</h4>";
            echo "<table class='table mt-5 table-hover border' id='insertScoreTable'>";
            echo "<tr class='text-white' style='background:#990000'><th>Id</th><th>Imię</th><th>Nazwisko</th><th>Dodatnie</th><th>Ujemne</th></tr>";
            
            require_once "../../connect.php";

            $conn = @new mysqli($host, $db_user, $db_password, $db_name);

            if($conn->connect_errno!=0)
            {
                echo "Error".$conn->connect_errno;
            }
            else
            {
                $conn->set_charset("utf8");
                $result = $conn->query("SELECT ministranci.id, ministranci.imie, ministranci.nazwisko FROM ministranci WHERE id>2;");
                
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['id']."</td><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td><input type='number' class='text-center'/></td><td><input type='number'/></td></tr>";
                }
            }
            $conn->close();
            
            echo "</table>";

            echo "<button class='btn btn-outline-danger col-3 mt-5' onclick='insertScore()' type='button'>Zatwierdź</button>";
        }
        else{
            echo "<div class='list-group-flush list-danger m-auto month-list'>";
            echo "<h4 class='mt-3 mb-5'>Wybierz miesiąc</h4>";
            echo "<a class='list-group-item list-group-item-action' id='styczen' onclick='monthClick(this)'>styczeń</a>";
            echo "<a class='list-group-item list-group-item-action' id='luty' onclick='monthClick(this)'>luty</a>";
            echo "<a class='list-group-item list-group-item-action' id='marzec' onclick='monthClick(this)'>marzec</a>";
            echo "<a class='list-group-item list-group-item-action' id='kwiecien' onclick='monthClick(this)'>kwiecień</a>";
            echo "<a class='list-group-item list-group-item-action' id='maj' onclick='monthClick(this)'>maj</a>";
            echo "<a class='list-group-item list-group-item-action' id='czerwiec' onclick='monthClick(this)'>czerwiec</a>";
            echo "<a class='list-group-item list-group-item-action' id='lipiec' onclick='monthClick(this)'>lipiec</a>";
            echo "<a class='list-group-item list-group-item-action' id='sierpien' onclick='monthClick(this)'>sierpień</a>";
            echo "<a class='list-group-item list-group-item-action' id='wrzesien' onclick='monthClick(this)'>wrzesień</a>";
            echo "<a class='list-group-item list-group-item-action' id='pazdziernik' onclick='monthClick(this)'>październik</a>";
            echo "<a class='list-group-item list-group-item-action' id='listopad' onclick='monthClick(this)'>listopad</a>";
            echo "<a class='list-group-item list-group-item-action' id='grudzien' onclick='monthClick(this)'>grudzień</a>";
            echo "</div>";
        }
    ?>
<div>

