    <div class='container m-auto mt-5 p-5 text-center'>
    <h4 class='mt-5 pt-3 text-center'>Tworzenie nowego ministranta</h4>
    <div class="card-body p-5 pt-3 create-ministrant">
        <div class='input-group mt-3'>
            <div class='input-group-prepend'>
                <span class='input-group-text font-weight-bold' id='firstnameAd'>Imię</span>
            </div>
            <input type='text' class='form-control' id='firstname' placeholder='Wprowadź imię' aria-label='Wprowadź imię' aria-describedby='firstnameAd'>
        </div>

        <div class='input-group mb-3 mt-3'>
            <div class='input-group-prepend'>
                <span class='input-group-text font-weight-bold' id='lastnameAd'>Nazwisko</span>
            </div>
            <input type='text' class='form-control' id='lastname' placeholder='Wprowadź nazwisko' aria-label='Wprowadź nazwisko' aria-describedby='lastnameAd'>
        </div>
        <?php
            $loginArrString = "";
            require_once "../../connect.php";
            $conn = @new mysqli($host, $db_user, $db_password, $db_name);
        
            if($conn->connect_errno!=0)
            {
                echo "Error".$conn->connect_errno;
            }
            else
            {
                $conn->set_charset("utf8");
                $result = $conn->query("SELECT `login` FROM ministranci;");
                while($row = $result->fetch_assoc()){
                    $loginArrString .= $row['login']." ";
                }
            }
            $conn->close();
            
            echo "<div class='bg-danger text-white' id='loginError'></div>";
            echo "<div class='input-group mb-4'>";
            echo "<div class='input-group-prepend'>";
            echo "<span class='input-group-text font-weight-bold' id='loginAd'>Login</span>";
            echo "</div>";
            echo "<input type='text' class='form-control' id='login' placeholder='Wprowadź login' aria-label='Wprowadź login' aria-describedby='loginAd' onkeyup='loginChange(`".$loginArrString."`)'>";
            echo "</div>";
        ?>
        <button class='btn btn-outline-danger col-2 m-auto' type='button' onclick='createMinistrant()'>Zatwierdź</button>
    </div>
