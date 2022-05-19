<html>
    <head>
        <?php include "include/head.php"; ?>
    </head>
    <body>
        <header>
            <?php include "include/header.php"; ?>
        </header>
        <main>

        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>
        <?php
            echo "<div style=\"width:150px;height:150px;border:solid 5px #28282B;border-radius:50%;overflow:hidden;background:#28282B;\">";
                echo "<img src=\"profile/" . $pf->profile_picture . "\" style=\"height:150px;display:block;margin-left:auto;margin-right:auto;\">";
            echo "</div>";
        ?>
        <br/>
        <?php
            if(isset($_POST["cPF"])){
                $pfUpdate = userManager::updateProfilePicture(
                    $pf->profile_picture,
                    $_FILES['file'],
                    $_SESSION["user_id"]
                );
            }
            echo "<form method=\"POST\" enctype=\"multipart/form-data\">";
                echo "<input type=\"file\" name=\"file\"><br/>";
                echo "<input type=\"submit\" name=\"cPF\" value=\"change profile picture\">";
            echo "</form>";
        ?>