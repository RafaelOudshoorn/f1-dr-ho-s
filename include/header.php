<a href="index">
    <img src="images/logo.png" alt="logo" class="logo">
</a>
<nav>
    <?php
        if($_SESSION["is_admin"] == 0){

        }else{
            echo "<a href=\"admin\">Admin</a>";
        }
    ?>
    <a href="scoreboard">Scorebord</a>
    <a href="drivers">Coureurs</a>
    <a href="profile.php">
        <?php
            echo "<img src=\"profile/$pf->profile_picture\" alt=\"PFP\" class=\"pfp\">";
        ?>
        </a>
    <a href="logout">
        <span class="material-symbols-outlined">logout</span>
    </a>
</nav>