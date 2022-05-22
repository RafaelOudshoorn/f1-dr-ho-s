<?php
    include "include/autoloader.php";
    $loginCheck = loginManager::loginCheck();
    $au = userManager::select();    
    $ac = userManager::selectOnId($_SESSION["user_id"]);
    $_SESSION["is_admin"] = $ac->is_admin;
    $pf = userManager::getProfileInfoHeader($_SESSION["user_id"]);
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" href="images/logo.png">
<script src= "include/scripts.js"> </script>