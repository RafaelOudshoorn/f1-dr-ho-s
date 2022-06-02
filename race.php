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
                    // na testen.... het werkt niet ;( het is 00.20 nu... ik ga slapen
                    $nextRace = RaceManager::AankomendeRace();
                    if(!isset($_SESSION["race_id"])){
                        $race = RaceManager::selectOnId($nextRace->IDrace);
                    }else{
                        $race = RaceManager::selectOnId($_SESSION["race_id"]);
                    }
                    $firstRaceId = RaceManager::eersteRace();
                    $lastRaceId = RaceManager::laatsteRace();

                    echo "<div class=\"race_info_header text-center\">";
                    echo "  <h1>" . $race->raceName . "</h1>";
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
                </div>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>