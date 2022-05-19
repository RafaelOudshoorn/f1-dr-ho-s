<?php
    include "autoloader.php";
    $loginCheck = loginManager::loginCheck();    
    $pf = userManager::getProfileInfoHeader($_SESSION["user_id"]);

?>
<html>
    <head>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>F1</title>
        <link rel="icon" href="images/logo.png">

        <style>
            nav a{
                padding-left: 10px;
            }
            nav a:last-child{
                padding-left: 10px;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="index">
                <img src="images/logo.png" alt="logo" class="logo">
            </a>
            <nav>
                <a href="admin">Admin</a>
                <a href="scoreboard">Scorebord</a>
                <a href="drivers">Coureurs</a>
                <a href="">
                    <?php
                        echo "<img src=\"profile/$pf->profile_picture\" alt=\"PFP\" class=\"pfp\">";
                    ?>
                </a>
                <a href="logout">
                    <span class="material-symbols-outlined">logout</span>
                </a>
            </nav>
        </header>
        <main>
        
        </main>
        <footer>

        </footer>
    </body>
</html>