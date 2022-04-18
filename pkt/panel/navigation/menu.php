<?php
    if(isset($_GET['page'])){
        if($_GET['page']=='ministranci'){
            echo "<script src='navigation/scripts/ministranci.js'></script>";
            echo "<script src='ministranci/scripts/menu.js?1'></script>";
            echo "<script src='ministranci/scripts/create-ministrant.js'></script>";
            echo "<script src='ministranci/scripts/reset-password.js'></script>";
            echo "<script src='ministranci/scripts/delete-ministrant.js'></script>";
        }
        else if($_GET['page']=='posty'){
            echo "<script src='navigation/scripts/posty.js'></script>";
            echo "<script src='posty/scripts/menu.js?1'></script>";
            if(isset($_GET['create'])){
                echo "<script src='posty/scripts/create-post.js'></script>";            
            }

            echo "<script src='posty/scripts/edit-post.js?1'></script>";
            if(isset($_GET['edit'])){
                echo "<script src='posty/scripts/edit-post-alert.js'></script>";            
            }

            echo "<script src='posty/scripts/delete-post.js?2'></script>";
            if(isset($_GET['delete'])){
                echo "<script src='posty/scripts/delete-post-alert.js'></script>";            
            }
        }
    }
?>