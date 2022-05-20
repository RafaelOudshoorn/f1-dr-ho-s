<?php
    include "autoloader.php";
    $loginCheck = loginManager::loginCheck();    
    $pf = userManager::getProfileInfoHeader($_SESSION["user_id"]);
    if($_SESSION["is_admin"] == 0){

    }else{
        echo "<a href=\"admin\">Admin</a>";
    }
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" href="images/logo.png">
<script src= "include/scripts.js"> </script>