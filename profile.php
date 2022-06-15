<html>
    <head>
        <?php include "include/head.php";?>
        <link rel="stylesheet" href="css/profile.css"/>
        <?php
            // check of de get goed is ingevuld.
            // zo NIET dan ga je naar je eigen profiel.
            if(!isset($_GET["username"])){
                header("location:profile?username=" . $_SESSION["username"]);
            }else{
                if(! $_GET["username"]){
                    header("location:profile?username=" . $_SESSION["username"]);
                }else{
                    $gUInfo = userManager::selectOnUsernameGet($_GET["username"]);
                    if($gUInfo->username != $_GET["username"]){
                        header("location:profile?username=" . $_SESSION["username"]);
                    }
                }
            }
            if(isset($_POST["DPF"])){
                userManager::DeleteProfilePicture($_SESSION["user_id"]);
                header("location:profile?username=" . $_SESSION["username"]);
            }
        ?>
    </head>
    <body>
        <header>
            <?php include "include/header.php";?>
        </header>
        <main>
        <?php
            echo "<div class=\"profielAfbeeldingKader\">";
            echo "<img src=\"pfp/" . $gUInfo->profile_picture . "\" class=\"profielAfbeelding\" >";
            echo "</div><br/>";
            if($_SESSION["is_admin"] == 0 && $_GET["username"] != $_SESSION["username"]){

            }else{
                if(isset($_POST["cPF"])){
                    $pfUpdate = userManager::updateProfilePicture(
                        $pf->profile_picture,
                        $_FILES['file'],
                        $_SESSION["user_id"]
                    );
                }
                echo "<form method=\"POST\" enctype=\"multipart/form-data\">";
                echo "<input type=\"file\" name=\"file\" class=\"buttonChooseFile\"><br/>";
                echo "<input type=\"submit\" name=\"cPF\" value=\"Change profile picture\"><br>";
                if($gUInfo->profile_picture != "pictures/user_profile.png"){
                    echo "<input type=\"submit\" name=\"DPF\" value=\"Delete profile picture\">";
                }
                echo "</form>";
            }
        ?>
        </main>
        <footer>
            <?php include "include/footer.php";?>
        </footer>
    </body>
</html>
