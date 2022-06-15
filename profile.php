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
                userManager::DeleteProfilePicture($gUInfo->idperson);
                header("location:profile?username=" . $_GET["username"]);
            }
        ?>
    </head>
    <body>
        <header>
            <?php include "include/header.php";?>
        </header>
        <main>
        <?php
            echo "<p>User: <span style=\"font-weight:700;\">$gUInfo->username</span></p>";
            echo "<div class=\"profielAfbeeldingKader\">";
            if(!file_exists("pfp/$gUInfo->profile_picture")){
                $gUInfoPFP = "pictures/user_profile_error.png";
            }else{
                $gUInfoPFP = $gUInfo->profile_picture;
            }
            echo "<img src=\"pfp/" . $gUInfoPFP . "\" class=\"profielAfbeelding\" >";
            echo "</div><br/>";
            if($_SESSION["is_admin"] == 0 && $_GET["username"] != $_SESSION["username"]){

            }else{
                if(isset($_POST["cPF"])){
                    $pfUpdate = userManager::updateProfilePicture(
                        $gUInfo->profile_picture,
                        $_FILES['file'],
                        $gUInfo->idperson,
                        htmlspecialchars($_GET["username"])
                    );
                }
                echo "<form method=\"POST\" enctype=\"multipart/form-data\">";
                echo "<input type=\"file\" name=\"file\" class=\"buttonChooseFile\"><br/>";
                echo "<input type=\"submit\" name=\"cPF\" value=\"Change profile picture\"><br>";

                if($gUInfoPFP != "pictures/user_profile.png"){
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
