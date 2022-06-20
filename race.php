<html>
    <head>
        <?php include "include/head.php"; ?>
        <link rel="stylesheet" href="css/race.css">
    </head>
    <body>
        <header>
            <?php include "include/header.php"; ?>
        </header>
        <main>
            <div class="race_info_container">
                <?php
                    // Check of de sesson key is ingevuld. Als de session key niet goed is mee gegeven/verkeerd dan is ID de ID van de aankomende race.
                    // update 6/6/2022 als je niet bent aangemeld dan kan je deze pagina niet zien. 
                    // en in de index worde $_session["race_id"] al ingevuld met nextRace.
                    $nextRace = RaceManager::AankomendeRace();
                    if(!isset($_SESSION["race_id"])){
                        $race = RaceManager::selectOnId($nextRace->IDrace);
                    }else{
                        $race = RaceManager::selectOnId($_SESSION["race_id"]);
                    }
                    $firstRaceId = RaceManager::eersteRace();
                    $lastRaceId = RaceManager::laatsteRace();
                    $time = RaceManager::tijdConverter($race->race_time);

                    echo "<div class=\"race_info_header text-center\">";
                    echo "  <h1>" . $race->raceName . "</h1>";
                    echo "  <p>";
                    echo "      Land: $race->country,";
                    echo "      Datum: $race->race_date,";
                    echo "      Tijd: $time";
                    echo "  </p>";
                    echo "  <form method=\"POST\">";
                                if($_SESSION["race_id"] == $firstRaceId->IDrace){
                                }else{
                    echo "      <input type=\"submit\" name=\"toLastRace\" class=\"material-symbols-outlined arrow_backward\" value=\"arrow_back\">";
                                }
                    echo "      <img src=\"images/" . $race->circuitName . ".png\">";
                                if($_SESSION["race_id"] == $lastRaceId->IDrace){
                                }else{
                    echo "      <input type=\"submit\" name=\"toNextRace\" class=\"material-symbols-outlined arrow_forward\" value=\"arrow_forward\">";
                                }
                    echo "  </form>";
                    echo "</div>";
                    if(isset($_POST["toLastRace"])){
                        $_SESSION["race_id"] --;
                        echo "<script>location.href='race'</script>";
                    }
                    if(isset($_POST["toNextRace"])){
                        $_SESSION["race_id"] ++;
                        echo "<script>location.href='race'</script>";
                    }
                ?>
                <?php
                    $Drivers = DriverManager::select();
                    $placement = 1;
                    echo "";
                    echo "<form method='POST' class='raceBet'>";
                    echo '<div></div>';
                    echo '<div style="height:20px;"></div>';
                    foreach($Drivers as $Driver){
                    echo "<select name='$placement'>";
                    echo "<option value='0'>$placement</option>";
                    $placement ++;
                    foreach($Drivers as $Names){
                    echo "<option value='$Names->IDdrivers'>$Names->permanentNumber - $Names->givenName $Names->familyName</option>";
                    }
                    echo "</select>";
                    }
                    echo "<input type='submit' value='punten vast stellen' name='submitpunt'/>";
                    echo "</form>";
                    if(isset($_POST["submitpunt"])){
                        PuntenManager::before($_POST);
                    }
                ?>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>