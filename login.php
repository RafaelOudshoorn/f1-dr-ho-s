<?php
    error_reporting(0);
    include "include/autoloader.php";
    // $insertTest = loginManager::inserttest();
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/loginstyle.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $("input#username").on({
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
        <main>
            <div class="loginLeft">
                <img src="images/logo.png" alt="logo">
            </div>
            <div class="loginRight">
            <?php
                            switch($_GET["form"]){
                                case "login":
                                case "":
                                    echo "<div class=\"login_form\">";
                                        echo "<h2 class=\"title\">Welkom</h2>";
                                        if(isset($_POST["login"])){
                                            $userInlog = loginManager::selectUserLogin(strtolower($_POST["email"]));

                                            if($userInlog->email != false){
                                                echo "<form method=\"POST\">";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"email\" name=\"email\" value=" . htmlspecialchars($_POST["email"]) . " maxlength=\"40\">";
                                                        echo "<span></span>";
                                                        echo "<label>Email</label>";
                                                    echo "</div>";
                                                    if(password_verify( $_POST["password"] , $userInlog->password)){
                                                        echo "<div class=\"field\">";
                                                            echo "<input required type=\"password\" name=\"password\" minlength=\"5\" maxlength=\"20\">";
                                                            echo "<span></span>";
                                                            echo "<label style=\"color:green;\">Wachtwoord correct</label>";
                                                        echo "</div>";

                                                        $_SESSION["user_id"] = $userInlog->idperson;
                                                        $_SESSION["username"] = $userInlog->username;
                                                        $_SESSION["is_admin"] = $userInlog->is_admin;
                                                        
                                                        header("location:index");
                                                    }
                                                    else{
                                                        echo "<div class=\"field\">";
                                                            echo "<input required type=\"password\" name=\"password\" minlength=\"5\" maxlength=\"20\">";
                                                            echo "<span></span>";
                                                            echo "<label style=\"color:red;\">Wachtwoord niet correct</label>";
                                                        echo "</div>";
                                                        
                                                    }
                                                    echo "<input type=\"submit\" name=\"login\" value=\"Login\">";
                                                    echo "<div class=\"signup_link\">";
                                                        echo "Nog geen account? <a href=\"?form=signup\" class=\"login-to-signup\">Aanmelden</a>";
                                                    echo "</div>";
                                                echo "</form>";
                                            }
                                            else{
                                                echo "<form method=\"POST\">";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"email\" name=\"email\" value=" . htmlspecialchars($_POST["email"]) . " maxlength=\"40\">";
                                                    echo "<span></span>";
                                                    echo "<label style=\"color: red;\">Ongeldig Email Addres</label>";
                                                echo "</div>";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"password\" name=\"password\" minlength=\"5\" maxlength=\"20\">";
                                                    echo "<span></span>";
                                                    echo "<label>Wachtwoord</label>";
                                                echo "</div>";
                                                echo "<input type=\"submit\" name=\"login\" value=\"Login\">";
                                                echo "<div class=\"signup_link\">";
                                                    echo "Nog geen account? <a href=\"?form=signup\" class=\"login-to-signup\">Aanmelden</a>";
                                                echo "</div>";
                                            echo "</form>";
                                            }
                                        }
                                        else{
                                            echo "<form method=\"POST\">";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"email\" name=\"email\" maxlength=\"40\">";
                                                    echo "<span></span>";
                                                    echo "<label>Email</label>";
                                                echo "</div>";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"password\" name=\"password\" minlength=\"5\" maxlength=\"20\">";
                                                    echo "<span></span>";
                                                    echo "<label>Wachtwoord</label>";
                                                echo "</div>";
                                                echo "<input type=\"submit\" name=\"login\" value=\"Login\">";
                                                echo "<div class=\"signup_link\">";
                                                    echo "Nog geen account? <a href=\"?form=signup\" class=\"login-to-signup\">Aanmelden</a>";
                                                echo "</div>";
                                            echo "</form>";
                                        }
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
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"text\" id=\"username\" value=" . htmlspecialchars($_POST["username"]) . " name=\"username\" maxlength=\"20\">";
                                                        echo "<span></span>";
                                                        echo "<label style=\"color: red;\">Username bestaat al *</label>";
                                                    echo "</div>";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["voornaam"]) . " name=\"voornaam\" maxlength=\"20\">";
                                                        echo "<span></span>";
                                                        echo "<label>Voornaam *</label>";
                                                    echo "</div>";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["achternaam"]) . " name=\"achternaam\" maxlength=\"20\">";
                                                        echo "<span></span>";
                                                        echo "<label>Achternaam *</label>";
                                                    echo "</div>";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"email\" value=" . htmlspecialchars($_POST["email"]) . " name=\"email\" maxlength=\"40\">";
                                                        echo "<span></span>";
                                                        if(strtolower($dupelicateEmail_check->email) == strtolower($_POST["email"])){
                                                            echo "<label style=\"color: red;\">Probeer een ander Email Addres*</label>";
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
                                                    echo "<div class=\"field\">";
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
                                            else{
                                                echo "<form method=\"POST\">";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"text\" id=\"username\" value=" . htmlspecialchars($_POST["username"]) . " name=\"username\" maxlength=\"20\">";
                                                        echo "<span></span>";
                                                        echo "<label>Username *</label>";
                                                    echo "</div>";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["voornaam"]) . " name=\"voornaam\" maxlength=\"20\">";
                                                        echo "<span></span>";
                                                        echo "<label>Voornaam *</label>";
                                                    echo "</div>";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"text\" value=" . htmlspecialchars($_POST["achternaam"]) . " name=\"achternaam\" maxlength=\"20\">";
                                                        echo "<span></span>";
                                                        echo "<label>Achternaam *</label>";
                                                    echo "</div>";
                                                    echo "<div class=\"field\">";
                                                        echo "<input required type=\"email\" value=" . htmlspecialchars($_POST["email"]) . " name=\"email\" maxlength=\"40\">";
                                                        echo "<span></span>";
                                                        if(strtolower($dupelicateEmail_check->email) == strtolower($_POST["email"])){
                                                            echo "<label style=\"color: red;\">Probeer een ander Email Addres*</label>";
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
                                                    echo "<div class=\"field\">";
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
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"text\" id=\"username\" name=\"username\" maxlength=\"20\">";
                                                    echo "<span></span>";
                                                    echo "<label>Username *</label>";
                                                echo "</div>";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"text\" name=\"voornaam\" maxlength=\"20\">";
                                                    echo "<span></span>";
                                                    echo "<label>Voornaam *</label>";
                                                echo "</div>";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"text\" name=\"achternaam\" maxlength=\"20\">";
                                                    echo "<span></span>";
                                                    echo "<label>Achternaam *</label>";
                                                echo "</div>";
                                                echo "<div class=\"field\">";
                                                    echo "<input required type=\"email\" name=\"email\" maxlength=\"40\">";
                                                    echo "<span></span>";
                                                    echo "<label>Email *</label>";
                                                echo "</div>";
                                                echo "<div class=\"field\">";
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
                        
        </main>
    </body>
</html>