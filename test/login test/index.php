<?php
    session_start();

    var_dump($_SESSION["user_id"]);

    if(! $_SESSION["user_id"]){
        header("location:login.php");
    }

?>