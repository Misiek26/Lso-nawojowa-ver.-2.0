<div class='container m-auto mt-5 p-5 text-center change-container'>
    <h4 class='m-3 mb-5'>Edycja postu</h4>

    <hr>

    <!--Select post-->
    
    <button class="btn btn-block" type="button" data-toggle="collapse" data-target="#postEditSelectList" id='postEditSelectListButton'>
        Wybierz post -->
    </button>
    <div class="collapse mt-1" id="postEditSelectList">
        <div class="card card-body p-4">
            <h5 class="ml-5 m-4 pb-2">Wybierz post, który chcesz edytować</h5>
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
                    $result = $conn->query("SELECT * FROM posty ORDER BY id DESC");
                    echo "<ul class='list-group-flush'>";
                    while($row = $result->fetch_assoc()){
                        $list_item = "<li class='list-group-item list-group-item-action p-4' id='id".$row['id']."' onclick=editPostConfirmClick(this.id)>";
                        $list_item .= "<table><tr><th>".$row['title']."</th></tr><tr><td class='text-left'>".$row['content']."</td></tr></table>";
                        
                        $list_item.="</li>";
                        echo $list_item;
                    }

                    echo "</ul>";
                }
                $conn->close();
            ?>
        </div>
    </div>

    <hr>
</div>