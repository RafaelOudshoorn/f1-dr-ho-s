<html>
    <head>
        <?php 
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
                        foreach($au as $allUser){
                            echo "<div class=\"user_card user_id_" . $allUser->idperson . "\">";
                                echo "<div class=\"ucPicture\">";
                                    echo "<img src=\"profile/" . $allUser->profile_picture . "\">";
                                echo "</div>";
                                echo "<div class=\"ucName\">";
                                    echo "<h2>Username = " . $allUser->username . "</h2>";
                                    echo "<h2>Naam = " . $allUser->firstname . " " . $allUser->lastname . "</h2>";
                                    echo "<h2>Email = " . $allUser->email . "</h2>";
                                echo "</div>";
                                echo "<div class=\"ucPoints\">";
                                    echo "<h2>Points<span>" . $allUser->total_points . "</span></h2>";
                                echo "</div>";
                                echo "<div class=\"ucIsAdmin\">";
                                    echo "<h2>Status = ";
                                            if($_SESSION["is_admin"] != "2"){
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
                                                echo "<select class=\"browser-default custom-select mb-4 textDarkColor\" name=\"is_adminChange" . $allUser->idperson . "\" id=\"is_adminChange" . $allUser->idperson . "\" onchange=\"val()\">";
                                                    switch($allUser->is_admin){
                                                        case "0":
                                                            echo "<option value=\"\" disabled>Kies een optie</option>";
                                                            echo "<option value=\"0\" selected>User</option>";
                                                            echo "<option value=\"1\">Moderator</option>";
                                                            echo "<option value=\"1\">Admin</option>";
                                                            break;
                                                        case "1":
                                                            echo "<option value=\"\" disabled>Kies een optie</option>";
                                                            echo "<option value=\"0\">User</option>";
                                                            echo "<option value=\"1\" selected>Moderator</option>";
                                                            echo "<option value=\"1\">Admin</option>";
                                                            break;
                                                        case "2":
                                                            echo "<option value=\"\" disabled>Kies een optie</option>";
                                                            echo "<option value=\"0\">User</option>";
                                                            echo "<option value=\"1\">Moderator</option>";
                                                            echo "<option value=\"1\" selected>Admin</option>";
                                                            break;
                                                    }
                                                echo "</select>";
                                                echo "<script>";
                                                echo "$('#is_adminChange" . $allUser->idperson . "').change(function(){";
                                                echo "    switch($(this).val()){";
                                                echo "        case \"0\":";
                                                echo "            ";
                                                echo "            break;";
                                                echo "        case \"1\":";
                                                echo "            ";
                                                echo "            break;";
                                                echo "        case \"2\":";
                                                echo "            ";
                                                echo "            break;";
                                                echo "    };";
                                                echo "})";
                                                echo "</script>";
                                            }
                                    echo "</h2>";
                                echo "</div>";
                            echo "</div><br/><br/>";
                        }
                    ?>
                </div>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>