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
        <div class="vakLinks">
                <br/><br/>
        <?php
            
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
                echo "<p class='persoonsgegevens'>User: <span style=\"font-weight:500;\">$gUInfo->username</span></p>";
                echo "<p class='persoonsgegevens'>Name: <span style=\"font-weight:500;\">$gUInfo->firstname $gUInfo->lastname</span></p>";
                echo "<p class='persoonsgegevens'>Email: <span style=\"font-weight:500;\">$gUInfo->email</span></p>";
                echo "<p class='persoonsgegevens'> Total Points: <span style=\"font-weight:500;\">$gUInfo->total_points</span></p>";
                echo "<form method=\"POST\" enctype=\"multipart/form-data\">";
                echo "<input type=\"file\" name=\"file\" class=\"buttonChooseFile\">";
                echo "<input type=\"submit\" name=\"cPF\" value=\"Change profile picture\">";
                if($gUInfoPFP != "pictures/user_profile.png"){
                    echo "<input type=\"submit\" name=\"DPF\" value=\"Delete profile picture\">";

                }
                echo "</form>";
            }
        ?>
                </div>
        <div class="vakRechts">
            <button class="m-3" id="buttonChangeProfilePoints" onclick="handleButtonChangeProfile()">change profile</button>
            <form class="formProfile" id="formProfile">
                User:<br/>
                <input type="text" placeholder=<?php echo "$gUInfo->username"?>><br/><br/>
                name:<br/>
                <input type="text" placeholder=<?php echo "$gUInfo->firstname $gUInfo->lastname"?>><br/><br/>
                email:<br/>
                <input type="text" placeholder=<?php echo "$gUInfo->email"?>><br/><br/>
                <input type="button" value="change" class="btn btn-danger">
            </form>
            <table class="table table-striped m-3" id="tablePoints">
                <thead class="table-dark">
                    <th>d</th>
                    <th>d</th>
                    <th>d</th>
                    <th>d</th>
                </thead>
                <tbody>
                    <tr>
                    <td>f</td>
                    <td>f</td>
                    <td>f</td>
                    <td>f</td>
                    </tr>
                    <tr>
                    <td>f</td>
                    <td>f</td>
                    <td>f</td>
                    <td>f</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </main>
        <script>
            var page = 0;
            function handleButtonChangeProfile(){
                
                if(page == 0){
                    document.getElementById("formProfile").style.display = "table";
                    document.getElementById("tablePoints").style.display = "none";
                    document.getElementById("buttonChangeProfilePoints").innerHTML = "My Points";
                    page = 1;
            } else{
                    document.getElementById("formProfile").style.display = "none";
                    document.getElementById("tablePoints").style.display = "table";
                    document.getElementById("buttonChangeProfilePoints").innerHTML = "change profile";
                    page = 0;
            }
            }
       
        </script>
        <footer>
            <?php include "include/footer.php";?>
        </footer>
    </body>
</html>
