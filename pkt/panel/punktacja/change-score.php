<div class='container m-auto mt-5 p-5 text-center change-container'>
    <h4 class='m-3 mb-5'>Zmiana punktacji</h4>

    <hr>

    <!--Select ministrant-->
    
    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#ministrantSelectList" id='ministrantSelectListButton'>
        Wybierz ministranta -->
    </button>
    <div class="collapse mt-1" id="ministrantSelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4">Wybierz ministranta, dla którego chcesz zmienić punktację</h5>
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
                    $result = $conn->query("SELECT ministranci.id, ministranci.imie, ministranci.nazwisko, ministranci.miejscowosc FROM ministranci WHERE id>2;");
                    echo "<ul class='list-group-flush'>";
                    while($row = $result->fetch_assoc()){
                        $list_item = "<li class='list-group-item list-group-item-action' id=".$row['id']." onclick=ministrantSelect(this)>";
                        $list_item.= $row['imie']." ".$row['nazwisko'];

                        if($row['miejscowosc']){
                            $list_item.=" (".$row['miejscowosc'].")";
                        }
                        
                        $list_item.="</li>";
                        echo $list_item;
                    }

                    echo "</ul>";
                    echo "<button class='btn btn-outline-danger col-3 m-auto' type='button' onclick='ministrantConfirmClick()'>Zatwierdź</button>";
                }
                $conn->close();
            ?>
        </div>
    </div>

    <hr>

    <!--Select month-->

    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#monthSelectList" id='monthSelectListButton'>
        Wybierz miesiąc -->
    </button>
    <div class="collapse mt-1" id="monthSelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4">Wybierz miesiąc, w którym chcesz zmienić punktację</h5>
            <?php
                echo "<ul class='list-group-flush'>";
                $month_arr = ["styczeń", "luty", "marzec", "kwiecień", "maj", "czerwiec", "lipiec", "sierpień", "wrzesień", "październik", "listopad", "grudzień"];
                
                $month_counter=0;

                foreach($month_arr as $month){
                    echo "<li class='list-group-item list-group-item-action' id=month".$month_counter++." onclick=monthSelect(this)>".$month."</li>";
                }

                echo "</ul>";
                echo "<button class='btn btn-outline-danger col-3 m-auto' type='button' onclick='monthConfirmClick()'>Zatwierdź</button>";
            ?>
        </div>
    </div>

    <hr>

    <!--Insert score-->

    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#scoreSelectList" id='scoreSelectListButton'>
        Wprowadź punkty -->
    </button>
    <div class="collapse mt-1" id="scoreSelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4">Wprowadź nową punktację ministranta w danym miesiącu</h5>

            <div class='input-group mt-3'>
                <div class='input-group-prepend'>
                    <span class='input-group-text font-weight-bold' id='plusScoreAd'>Punkty dodatnie</span>
                </div>
                <input type='number' class='form-control' id='plusScore' placeholder='Wprowadź punkty dodatnie' aria-label='Wprowadź punkty dodatnie' aria-describedby='plusScoreAd'>
            </div>

            <div class='input-group mb-4 mt-3'>
                <div class='input-group-prepend'>
                    <span class='input-group-text font-weight-bold' id='minusScoreAd'>Punkty ujemne</span>
                </div>
                <input type='number' class='form-control' id='minusScore' placeholder='Wprowadź punkty ujemne' aria-label='Wprowadź punkty ujemne' aria-describedby='minusScoreAd'>
            </div>

            <button class='btn btn-outline-danger col-3 m-auto' type='button' onclick='scoreConfirmClick()'>Zatwierdź</button>
        </div>
    </div>

    <hr>

    <!--Summary-->

    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#summarySelectList" id='summarySelectListButton' onclick='summaryAction()'>
        Podsumowanie -->
    </button>
    <div class="collapse mt-1" id="summarySelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4">Sprawdź czy wszystkie dane są poprawne</h5>
            <ul class='list-group-flush' id="summaryListContent"></ul>
            <button class='btn btn-outline-danger col-3 m-auto' type='button' onclick='summaryConfirmClick()'>Zatwierdź</button>
        </div>
    </div>
    <hr>
</div>