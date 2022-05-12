<?php
    error_reporting(0);
    include "managers/loginManager.php";

    if(isset($_POST["login"])){
        echo "<script> alert('login')</script>";
    }
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main_container">
            <div class="inner_container">
                <div class="login_main">
                    <div class="login_left">
                        <?php
                            switch($_GET["form"]){
                                case "login":
                                case "":
                                    echo "<div class=\"login_form\">";
                                        echo "<h2 class=\"title\">Welkom</h2>";
                                        echo "<form method=\"POST\">";
                                            echo "<div class=\"txt_field\">";
                                                echo "<input required type=\"email\" maxlength=\"40\">";
                                                echo "<span></span>";
                                                echo "<label>Email</label>";
                                            echo "</div>";
                                            echo "<div class=\"txt_field\">";
                                                echo "<input required type=\"password\" maxlength=\"20\">";
                                                echo "<span></span>";
                                                echo "<label>Wachtwoord</label>";
                                            echo "</div>";
                                            echo "<input type=\"submit\" name=\"login\" value=\"Login\">";
                                            echo "<div class=\"signup_link\">";
                                                echo "Nog geen account? <a href=\"?form=signup\" class=\"login-to-signup\">Aanmelden</a>";
                                            echo "</div>";
                                        echo "</form>";
                                    echo "</div>";
                                    break;
                                case "signup":
                                    echo "<div class=\"signup_form\">";
                                        echo "<h2 class=\"title\">Welkom</h2>";
                                                    if(isset($_POST["aanmelden"])){
                                                        $dupelicateUsername_check = loginManager::selectUsernameInsert(strtolower($_POST["username"]));
                                                        $dupelicateEmail_check = loginManager::selectMailInsert(strtolower($_POST["email"]));
                                                        if(strtolower($dupelicateUsername_check->username) == strtolower($_POST["username"])){
                                                            echo "<form method=\"POST\">";
                                                                echo "<div class=\"txt_field\">";
                                                                    echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["username"]) . " name=\"username\" maxlength=\"20\">";
                                                                    echo "<span></span>";
                                                                    echo "<label style=\"color: red;\">Username bestaat al *</label>";
                                                                echo "</div>";
                                                                echo "<div class=\"txt_field\">";
                                                                    echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["voornaam"]) . " name=\"voornaam\" maxlength=\"20\">";
                                                                    echo "<span></span>";
                                                                    echo "<label>Voornaam *</label>";
                                                                echo "</div>";
                                                                echo "<div class=\"txt_field\">";
                                                                    echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["achternaam"]) . " name=\"achternaam\" maxlength=\"20\">";
                                                                    echo "<span></span>";
                                                                    echo "<label>Achternaam *</label>";
                                                                echo "</div>";
                                                                echo "<div class=\"txt_field\">";
                                                                    echo "<input required type=\"email\" value=" . htmlspecialchars($_POST["email"]) . " name=\"email\" maxlength=\"40\">";
                                                                    echo "<span></span>";
                                                                    if(strtolower($dupelicateEmail_check->email) == strtolower($_POST["mail"])){
                                                                        echo "<label style=\"color: red;\">Probeer een ander Email Addres *</label>";
                                                                    }
                                                                    else{
                                                                        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                                                                            echo "<label style=\"color: red;\">Ongeldig Email Addres *</label>";
                                                                        }else{
                                                                            echo "<label>Email *</label>";
                                                                            if(strtolower($dupelicateUsername_check->username) !== strtolower($_POST["username"])){
                                                                                loginManager::insert($_POST["username"], $_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["password"]);
                                                                                header("location:?form=login");
                                                                            }
                                                                        }
                                                                    }
                                                                echo "</div>";
                                                                echo "<div class=\"txt_field\">";
                                                                    echo "<input required type=\"password\" name=\"password\" minlength=\"5\" maxlength=\"20\">";
                                                                    echo "<span></span>";
                                                                    echo "<label>Wachtwoord *</label>";
                                                                echo "</div>";
                                                                echo "<input type=\"submit\" name=\"aanmelden\" value=\"Aanmelden\">";
                                                                echo "<div class=\"login_link\">";
                                                                    echo "Heb je al een account? <a href=\"?form=login\" class=\"signup-to-login\">Login</a>";
                                                                echo "</div>";
                                                            echo "</form>";
                                                        }
                                                    }
                                                    else{
                                                        echo "<form method=\"POST\">";
                                                        echo "<div class=\"txt_field\">";
                                                            echo "<input required type=\"text\" name=\"username\" maxlength=\"20\">";
                                                            echo "<span></span>";
                                                            echo "<label>Username *</label>";
                                                        echo "</div>";
                                                        echo "<div class=\"txt_field\">";
                                                            echo "<input required type=\"text\" name=\"voornaam\" maxlength=\"20\">";
                                                            echo "<span></span>";
                                                            echo "<label>Voornaam *</label>";
                                                        echo "</div>";
                                                        echo "<div class=\"txt_field\">";
                                                            echo "<input required type=\"text\" name=\"achternaam\" maxlength=\"20\">";
                                                            echo "<span></span>";
                                                            echo "<label>Achternaam *</label>";
                                                        echo "</div>";
                                                        echo "<div class=\"txt_field\">";
                                                            echo "<input required type=\"email\" name=\"email\" maxlength=\"40\">";
                                                            echo "<span></span>";
                                                            echo "<label>Email *</label>";
                                                        echo "</div>";
                                                        echo "<div class=\"txt_field\">";
                                                            echo "<input required type=\"password\" name=\"password\" maxlength=\"20\">";
                                                            echo "<span></span>";
                                                            echo "<label>Wachtwoord *</label>";
                                                        echo "</div>";
                                                        echo "<input type=\"submit\" name=\"aanmelden\" value=\"Aanmelden\">";
                                                        echo "<div class=\"login_link\">";
                                                            echo "Heb je al een account? <a href=\"?form=login\" class=\"signup-to-login\">Login</a>";
                                                        echo "</div>";
                                                    echo "</form>";
                                                    }

                                    echo "</div>";
                                    break;
                            }
                        ?>
                    </div>
                    <div class="login_right">
                        <img src="DSC00321-300x282.jpg">
                    </div>
                </div>
            </div>
            <span style="position: absolute;bottom: 0;right: 0;color: black;font-size: 50px;">18+</span>
        </div>
    </body>
</html>