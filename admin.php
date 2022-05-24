<html>
    <head>
        <?php 
            error_reporting(0);
            include "include/head.php";

            if($_SESSION["is_admin"] === "0"){
                header('Location:index');
                exit;
            }
        ?>
        <link rel="stylesheet" href="css/admin.css">
        <script>
            function edit_user(id){
                var x = document.getElementById("form-" + id);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            };
            $(document).ready(function(){
                $("input#usernameUpdate").on({
                    keydown: function(e) {
                        if (e.which === 32)
                        return false;
                    },
                    change: function() {
                        this.value = this.value.replace(/\s/g, "");
                    }
                });
            });
        </script>
    </head>
    <body>
        <header>
            <?php include "include/header.php"; ?>
            <link rel="stylesheet" href="css/admin.css">
        </header>
        <main>
            <div class="user_container">
                <div class="inner_user">
                    <div class="searchFuncties_div">
                        <label for="searchFuncties" class="textDarkColor">Zoek op:&nbsp;</label>
                        <select class="browser-default custom-select mb-4 textDarkColor" name="searchFuncties" id="searchFuncties" onchange="val()">
                            <option value="" disabled>Kies een optie</option>
                            <?php
                                switch($_GET["search"]){
                                    default:
                                    case "searchAll":
                                        echo "<option value=\"searchAll\" selected>Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::select();
                                        break;
                                    case "searchUsers":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\" selected>Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::selectOnAdmin(0);
                                        break;
                                    case "searchMods":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\" selected>Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::selectOnAdmin(1);
                                        break;
                                    case "searchAdmins":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\" selected>Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\">Zoek op Moderators en Admins</option>";
                                        $select = userManager::selectOnAdmin(2);
                                        break;
                                    case "searchModsEnAdmins":
                                        echo "<option value=\"searchAll\">Zoek op alle gebruikers</option>";
                                        echo "<option value=\"searchUsers\">Zoek op Users</option>";
                                        echo "<option value=\"searchMods\">Zoek op Moderators</option>";
                                        echo "<option value=\"searchAdmins\">Zoek op Admins</option>";
                                        echo "<option value=\"searchModsEnAdmins\" selected>Zoek op Moderators en Admins</option>";
                                        $num = "1||2";
                                        $select = userManager::selectOnAdmin($num);
                                        break;
                                    case "":
                                        header("location:admin?search=searchAll");
                                }
                            ?>
                        </select>
                    </div>  
                    <script>
                        $('#searchFuncties').change(function(){
                            window.location.href = "admin?search=" + $(this).val();
                        });
                    </script>
                    <?php
                        echo "<form method=\"POST\">";
                        foreach($select as $allUsers){
                            switch($allUsers->is_admin){
                                case "0":
                                    echo "<div class=\"user_card user_id_" . $allUsers->idperson . "\" style=\"background: #b984f5;\">";
                                    break;
                                case "1":
                                    echo "<div class=\"user_card user_id_" . $allUsers->idperson . "\" style=\"background: #EEE8AA;\">";
                                    break;
                                case "2":
                                    echo "<div class=\"user_card user_id_" . $allUsers->idperson . "\" style=\"background: #de3c31;\">";
                                    break;
                            }
                                echo "<div class=\"ucPicture\">";
                                    echo "<img src=\"pfp/" . $allUsers->profile_picture . "\">";
                                echo "</div>";
                                echo "<div class=\"ucName\">";
                                    echo "<h2>Username = <input required type=\"text\" id=\"usernameUpdate\" name=\"usernameUpdate$allUsers->username\" value=\"$allUsers->username\" style=\"width:150px;\" maxlength=\"20\"></h2>";
                                    echo "<h2>Naam = " . $allUsers->firstname . " " . $allUsers->lastname . "</h2>";
                                    echo "<h2>Email = " . $allUsers->email . "</h2>";
                                echo "</div>";
                                echo "<div class=\"ucPoints\">";
                                    echo "<h2>Points<span>" . $allUsers->total_points . "</span></h2>";
                                echo "</div>";
                                echo "<div class=\"ucIsAdmin\">";
                                    echo "<h2>Status = ";
                                            if($_SESSION["is_admin"] != "2" || $_SESSION["user_id"] == $allUsers->idperson){
                                                switch($allUsers->is_admin){
                                                    case "0":
                                                        echo "User";
                                                        break;
                                                    case "1":
                                                        echo "Moderator";
                                                        break;
                                                    case "2":
                                                        echo "Admin";
                                                        break;
                                                }
                                            }else{
                                                echo "<select class=\"browser-default custom-select mb-4 textDarkColor\" name=\"is_adminChange$allUsers->idperson\" id=\"is_adminChange" . $allUsers->idperson . "\" onchange=\"changeStatus" . $allUsers->idperson . "()\">";
                                                    switch($allUsers->is_admin){
                                                        case "0":
                                                            echo "<option value=\"\" disabled>Kies een optie</option>";
                                                            echo "<option value=\"0\" selected>User</option>";
                                                            echo "<option value=\"1\">Moderator</option>";
                                                            echo "<option value=\"2\">Admin</option>";
                                                            break;
                                                        case "1":
                                                            echo "<option value=\"\" disabled>Kies een optie</option>";
                                                            echo "<option value=\"0\">User</option>";
                                                            echo "<option value=\"1\" selected>Moderator</option>";
                                                            echo "<option value=\"2\">Admin</option>";
                                                            break;
                                                        case "2":
                                                            echo "<option value=\"\" disabled>Kies een optie</option>";
                                                            echo "<option value=\"0\">User</option>";
                                                            echo "<option value=\"1\">Moderator</option>";
                                                            echo "<option value=\"2\" selected>Admin</option>";
                                                            break;
                                                    }
                                                echo "</select>";
                                            }
                                    echo "</h2>";
                                    echo "<input type=\"submit\" name=\"changeUser$allUsers->idperson\" value=\"Pas aan\">";
                                    echo "<a href=\"profile?username=$allUsers->username\">Ga naar profiel</a>";
                                echo "</div>";
                            echo "</div><br/>";
                            if(isset($_POST["changeUser$allUsers->idperson"])){
                                if($_POST["is_adminChange$allUsers->idperson"] != NULL){
                                    $id_admin_num = intval($_POST["is_adminChange$allUsers->idperson"]);
                                }else{

                                    $id_admin_num = intval($allUsers->is_admin);
                                }
                                $dupelicateUsername_check = loginManager::selectUsernameInsert(strtolower($_POST["usernameUpdate$allUsers->username"]));
                                if(strtolower($dupelicateUsername_check->username) == strtolower($_POST["usernameUpdate$allUsers->username"])){
                                    if($dupelicateUsername_check->idperson !== $allUsers->idperson){
                                    echo "<script> alert(\"" . htmlspecialchars($_POST["usernameUpdate$allUsers->username"]) . " wordt al gebruikt. Kies een andere username!\") </script>";
                                    }else{
                                        userManager::updateAsAdmin(
                                            htmlspecialchars($_POST["usernameUpdate$allUsers->username"]),
                                            intval($id_admin_num),
                                            $allUsers->idperson,
                                            htmlspecialchars($_GET["search"])
                                        );
                                        // header("location:admin?search=" . htmlspecialchars($_GET["search"]));
                                    }
                                }else{
                                    userManager::updateAsAdmin(
                                        htmlspecialchars($_POST["usernameUpdate$allUsers->username"]),
                                        intval($id_admin_num),
                                        $allUsers->idperson,
                                        htmlspecialchars($_GET["search"])
                                    );
                                    // header("location:admin?search=" . htmlspecialchars($_GET["search"]));
                                }
                            }
                        }
                        echo "</form>";
                    ?>
                </div>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>