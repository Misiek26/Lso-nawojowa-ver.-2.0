<div class='container m-auto mt-5 p-5 text-center change-container'>
    <h4 class='m-3 mb-5'>Zresetuj hasło dla ministranta</h4>

    <hr>

    <!--Select ministrant-->
    
    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#ministrantPasswordSelectList" id='ministrantPasswordSelectListButton'>
        Wybierz ministranta -->
    </button>
    <div class="collapse mt-1" id="ministrantPasswordSelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4">Wybierz ministranta, dla którego chcesz zresetować hasło</h5>
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
                        $list_item = "<li class='list-group-item list-group-item-action' id='id".$row['id']."imie".$row['imie']."nazwisko".$row['nazwisko']."' onclick=ministrantPasswordSelect(this.id)>";
                        $list_item.= $row['imie']." ".$row['nazwisko'];

                        if($row['miejscowosc']){
                            $list_item.=" (".$row['miejscowosc'].")";
                        }
                        
                        $list_item.="</li>";
                        echo $list_item;
                    }

                    echo "</ul>";
                    echo "<button class='btn btn-outline-danger col-3 m-auto' type='button' onclick='ministrantPasswordConfirmClick()'>Zatwierdź</button>";
                }
                $conn->close();
            ?>
        </div>
    </div>

    <hr>

    <!--Summary-->

    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#summaryPasswordSelectList" id='summaryPasswordSelectListButton' onclick='summaryPasswordAction()'>
        Podsumowanie -->
    </button>
    <div class="collapse mt-1" id="summaryPasswordSelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4">Czy na pewno chcesz zresetować hasło?</h5>
            <ul class='list-group-flush' id="summaryPasswordListContent"></ul>
            <button class='btn btn-outline-danger col-3 m-auto' type='button' onclick='summaryPasswordConfirmClick()'>Zatwierdź</button>
        </div>
    </div>
    <hr>
</div>