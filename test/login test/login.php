<?php
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">

        <script>
            function setCookie(form,cvalue,exdays) {
                const d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                let expires = "expires=" + d.toUTCString();
                document.cookie = form + "=" + cvalue + ";" + expires + ";path=/";
            }
            function getCookie(form) {
                let name = form + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for(let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
            function checkCookie() {
                const login_form = document.getElementsByClassName("login_form");
                const signup_form = document.getElementsByClassName("signup_form");

                let form = getCookie("form");
                if(login_form.style.display == "none"){
                    setCookie("form", signup_form, 30);
                }else{
                    setCookie("form", signup_form, 30);
                }




                // if (form != "") {
                //     setCookie("form", "login_form", 30);
                // } else {
                //     form = prompt("Please enter your name:","");
                //     if (form != "" && form != null) {
                //     setCookie("form", form, 30);
                //     }
                // }
            }
                $(".login-to-signup").click(function(){
                    document.cookie = "form" + "=" + "signup_form");
                    $(".login_form").css("display", "none");
                    $(".signup_form").css("display", "block");
                });
                $(".signup-to-login").click(function(){
                    $(".login_form").css("display", "block");
                    $(".signup_form").css("display", "none");
                });
        </script>
    </head>
    <body onload="checkCookie()">
        <div class="main_container">
            <div class="inner_container">
                <div class="login_main">
                    <div class="login_left">
                        <div class="login_form">
                            <h2 class="title">Welkom</h2>
                            <form method="POST">
                                <div class="txt_field">
                                    <input required type="text" maxlength="40">
                                    <span></span>
                                    <label for="">Email</label>
                                </div>
                                <div class="txt_field">
                                    <input required type="password" maxlength="20">
                                    <span></span>
                                    <label for="">Wachtwoord</label>
                                </div>
                                <input type="submit" name="login" value="Login">
                                <div class="signup_link">
                                    Nog geen account? <a class="login-to-signup">Aanmelden</a>
                                </div>
                            </form>
                        </div>
                        <div class="signup_form">
                            <h2 class="title">Welkom</h2>
                            <form method="POST">
                                <div class="txt_field">
                                    <input required type="text" name="username" maxlength="20">
                                    <span></span>
                                    <?php
                                        if(isset($_POST["aanmelden"])){
                                            $user_name = loginManager::select(strtolower($_POST["username"]));
                                            if(strtolower($_POST["username"]) === strtolower($_POST["username"])){
                                                echo "<label style=\"color: red;\">Username bestaat al *</label>";
                                            }else{
                                                loginManager::insert($_POST["username"], $_POST["voornaam"], $_POST["achternaam"], $_POST["email"], $_POST["password"]);
                                            }
                                        }
                                        else{
                                            echo "<label>Username *</label>";
                                        }
                                    ?>
                                </div>
                                <div class="txt_field">
                                    <input required type="text" name="voornaam" maxlength="20">
                                    <span></span>
                                    <label for="">Voornaam *</label>
                                </div>
                                <div class="txt_field">
                                    <input required type="text" name="achternaam" maxlength="20">
                                    <span></span>
                                    <label for="">Achternaam *</label>
                                </div>
                                <div class="txt_field">
                                    <input required type="text" name="email" maxlength="40">
                                    <span></span>
                                    <label for="">Email *</label>
                                </div>
                                <div class="txt_field">
                                    <input required type="password" name="password" maxlength="20">
                                    <span></span>
                                    <label for="">Wachtwoord *</label>
                                </div>
                                <input type="submit" name="aanmelden" value="Aanmelden">
                                <div class="login_link">
                                    Heb je al een account? <a class="signup-to-login">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="login_right">
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>