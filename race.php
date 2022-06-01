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
                    // Check of de get is ingevuld. Als de get niet goed is mee gegeven/verkeerd dan is ID de ID van de aankomende race.
                    // na testen.... het werkt niet ;( het is 00.20 nu... ik ga slapen
                    $nextRace = RaceManager::AankomendeRace();
                    if(!isset($_GET["id"])){
                        $race = RaceManager::selectOnId($nextRace->IDrace);
                    }else{
                        $race = RaceManager::selectOnId(htmlspecialchars($_GET["id"]));
                    }

                    echo "<div class=\"race_info_header text-center\">";
                    echo "  <h1>" . $race->raceName . "</h1>";
                    // echo "<img src=\"images/" . $race->raceName . " Circuit.png\">";
                ?>
                
                    </div>
                </div>
            </div>
        </main>
        <!-- <footer>
            <?php include "include/footer.php"; ?>
        </footer> -->
    </body>
</html>