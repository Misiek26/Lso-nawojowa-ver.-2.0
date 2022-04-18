<?php
    session_start();
    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])) || (!isset($_POST['nowehaslo'])) || (!isset($_POST['powtorzhaslo'])))
    {
        $_SESSION['error'] = "<span style='color:red'>Wprowadzone dane są niepoprawne!</span>";
        header('Location: change-password.php');
        exit();
    }
    if($_POST['nowehaslo']!=$_POST['powtorzhaslo'])
    {
        
        header('Location: change.php');
        exit();
    }

    require_once "../connect.php";

    $conn = @new mysqli($host, $db_user, $db_password, $db_name);

    if($conn->connect_errno!=0)
    {
        echo "Error".$conn->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $nowehaslo = $_POST['nowehaslo'];
        $powtorzhaslo = $_POST['powtorzhaslo'];

        $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
        $nowe_haslo = password_hash($nowehaslo, PASSWORD_DEFAULT);

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if($result = @$conn->query(sprintf("SELECT * FROM `admin` WHERE login='%s'",
        mysqli_real_escape_string($conn, $login))))
        {
            $users = $result->num_rows;
            if($users>0)
            {
                $row = $result->fetch_assoc();
                if(password_verify($haslo, $row['haslo']))
                {
                $sql = "UPDATE `admin` SET haslo = '$nowe_haslo' WHERE login ='$login'";

                $change = $conn->query($sql);
                unset($_SESSION['error']);
                $result->close();
                header('Location: well.php');
                }else
                {
                    $_SESSION['error'] = "<span style='color:red'>Wprowadzone dane są niepoprawne!</span>";
                    header('Location: change-password.php');
                }
            }
            else
            {
                $_SESSION['error'] = "<span style='color:red'>Wprowadzone dane są niepoprawne!</span>";
                header('Location: change-password.php');
            }
        }
        $conn->close();
    }
?>