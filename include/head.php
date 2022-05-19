<?php
    include "autoloader.php";
    $loginCheck = loginManager::loginCheck();    
    $pf = userManager::getProfileInfoHeader($_SESSION["user_id"]);
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="icon" href="images/logo.png">