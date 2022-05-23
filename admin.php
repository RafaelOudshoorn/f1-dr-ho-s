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
                    <?php
                        echo "<form method=\"POST\">";
                        foreach($au as $allUser){
                            
                            echo "<div class=\"user_card user_id_" . $allUser->idperson . "\">";
                                echo "<div class=\"ucPicture\">";
                                    echo "<img src=\"pfp/" . $allUser->profile_picture . "\">";
                                echo "</div>";
                                echo "<div class=\"ucName\">";
                                    echo "<h2>Username = <input required type=\"text\" id=\"usernameUpdate\" name=\"usernameUpdate$allUser->username\" value=\"$allUser->username\" style=\"width:150px;\" maxlength=\"20\"></h2>";
                                    echo "<h2>Naam = " . $allUser->firstname . " " . $allUser->lastname . "</h2>";
                                    echo "<h2>Email = " . $allUser->email . "</h2>";
                                echo "</div>";
                                echo "<div class=\"ucPoints\">";
                                    echo "<h2>Points<span>" . $allUser->total_points . "</span></h2>";
                                echo "</div>";
                                echo "<div class=\"ucIsAdmin\">";
                                    echo "<h2>Status = ";
                                            if($_SESSION["is_admin"] != "2" || $_SESSION["user_id"] == $allUser->idperson){
                                                switch($allUser->is_admin){
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
                                                echo "<select class=\"browser-default custom-select mb-4 textDarkColor\" name=\"is_adminChange$allUser->idperson\" id=\"is_adminChange" . $allUser->idperson . "\" onchange=\"changeStatus" . $allUser->idperson . "()\">";
                                                    switch($allUser->is_admin){
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
                                    echo "<input type=\"submit\" name=\"changeUser$allUser->idperson\" value=\"Pas aan\">";
                                    echo "<a href=\"profile.php?usersame=$allUser->username\">Ga naar profiel</a>";
                                echo "</div>";
                            echo "</div><br/><br/>";
                            if(isset($_POST["changeUser$allUser->idperson"])){
                                if($_POST["is_adminChange$allUser->idperson"] != NULL){
                                    $id_admin_num = intval($_POST["is_adminChange$allUser->idperson"]);
                                }else{

                                    $id_admin_num = intval($allUser->is_admin);
                                }
                                var_dump($id_admin_num);
                                var_dump($_POST["usernameUpdate$allUser->username"]);
                                userManager::updateAsAdmin(
                                    htmlspecialchars($_POST["usernameUpdate$allUser->username"]),
                                    intval($id_admin_num),
                                    $allUser->idperson
                                );
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