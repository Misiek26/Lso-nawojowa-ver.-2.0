<?php
    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: index.php');
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
        $conn->set_charset("utf8");
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $haslo_hash = password_hash($haslo,PASSWORD_DEFAULT);
        
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if($result = @$conn->query(sprintf("SELECT * FROM admin WHERE login='%s'",
        mysqli_real_escape_string($conn, $login))))
        {
            $users = $result->num_rows;
            if($users>0)
            {
                $row = $result->fetch_assoc();
                 if(password_verify($haslo, $row['haslo']))
                {
                $_SESSION = $row;
                $_SESSION['adminlogin'] = true;

                unset($_SESSION['login']);
                unset($_SESSION['error']);
                
                $result->close();
                header('Location: panel.php');
                }else{
                    $_SESSION['error'] =  "<span style='color:red'>Nieprawidłowy login lub hasło!</span>";
                    header('Location: index.php');
                }
            }
            else
            {
                $_SESSION['error'] = "<span style='color:red'>Nieprawidłowy login lub hasło!</span>";
                header('Location: index.php');
            }
        }
        $conn->close();
    }

    

?>