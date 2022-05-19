<html>
    <head>
        <?php include "include/head.php";?>
        <link rel="stylesheet" href="css/profile.css"/>
    </head>
    <body>
        <header>
            <?php include "include/header.php";?>
        </header>
        <main>
        <?php
            echo "<div class="profielAfbeeldingKader">";
            echo "<img src="profile/" . $pf->profile_picture . "" class="profielAfbeelding" >";
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
            echo "<form method="POST" enctype="multipart/form-data">";
            echo "<input type="file" name="file" class="buttonChooseFile"><br/>";
            echo "<input type="submit" name="cPF" value="change profile picture">";
            echo "</form>";
        ?>
        </main>
        <footer>
            <?php include "include/footer.php";?>
        </footer>
    </body>
</html>