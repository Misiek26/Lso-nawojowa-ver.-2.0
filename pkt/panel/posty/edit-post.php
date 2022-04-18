<?php
    session_start();

    if(!isset($_SESSION['adminlogin']))
    {
        header('Location: ../index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Lso Nawojowa, Parafia Nawojowa, Nawojowa, Lso, ministranci, ministranci Nawojowa">
    <meta name="description" content="Strona przeznaczona dla Liturgicznej Służby Oltarza z parafii Nawojowa">
    
    <title>LSO Nawojowa</title>

    <link rel="icon" href="../icons/lso.jpg?1">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <!--Custom styles for this template-->
    <link href="../styles/main.css?4" rel="stylesheet">
    <link href="../styles/panel.css?13" rel="stylesheet">
    <link href="styles/posts.css" rel="stylesheet">
    
    <!--Import fonts-->
    <link href="../styles/fonts.css" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/t4i1c0kqe7rgfjakzi8q5j8vcrreceq5l3j68jok8t77fbsr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>
<div class="container row">
        <h1 class="text-center border-bottom">LSO Nawojowa<br>Panel administracyjny</h1>
        <div class="site-title text-white row">
            <span class="col-8 m-auto" id="site-title">
                Zarządzanie postami
            </span>
        </div>

        <article class="col-12 m-auto  mt-5 mb-5">
            <div class='container'>
                <div class='container m-auto text-center'>
                    <form method="post" action="edit-post-database.php">
                        <h4 class='mt-5 pt-1 text-center'>Edycja postu</h4>
                        <div class="card-body">
                            <div class='input-group mb-4'>
                                <div class='input-group-prepend'>
                                    <span class='input-group-text font-weight-bold' id='titleAd'>Tytuł postu</span>
                                </div>
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
                                        $id = $_GET['id'];
                                        $result = $conn->query("SELECT * FROM posty WHERE id=".$id.";");
                                        $row= mysqli_fetch_assoc($result);

                                        echo "<input type='text' class='form-control' id='title' name='title' placeholder='Wprowadź tytuł postu' aria-label='Wprowadź tytuł postu' aria-describedby='titleAd' value='".$row['title']."'>";
                                        echo "</div>";
                                        echo "<textarea id='content' name='content' placeholder='Treść postu'>".$row['content']."</textarea>";
                                        echo "<input type='hidden' name='postId' value='".$id."'>";
                                    }
                                    $conn->close();
                                ?>
                        
                            
                            <script>
                                tinymce.init({
                                selector: 'textarea',
                                plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
                                toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
                                toolbar_mode: 'floating',
                                tinycomments_mode: 'embedded',
                                tinycomments_author: 'Author name',
                                });
                            </script>

                            <input class="btn btn-outline-danger col-1 m-auto mt-4 p-2" type="submit" value="Zatwierdź"/>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </div>

    <footer class="footer text-center mt-5">
        <div class="container">
            <h3>KONTAKT</h3>
            <p class="border-bottom pb-3">
                Parafia pod wezwaniem Nawiedzenia Najświętszej Maryi Panny
                <br>ul. Zamkowa 34, 33-335 Nawojowa
                <br>tel: 796 094 794
                <br>e-mail: nawojowa@diecezja.tarnow.pl
                <br>Numer konta: 45 8811 0006 0022 0200 1166 0200
            </p>
            <p>Wszystkie dane osobowe umieszczone są za zgodą osób zainteresowanych lub na mocy prawa.<br>
                ©2022 Parafia Nawiedzenia NMP w Nawojowej. All Rights Reserved.
            </p>
        </div>
    </footer>

    <!--Scripts for Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    
</div>
    
</body>
</html>
   