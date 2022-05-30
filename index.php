<html>
    <head>
        <?php include "include/head.php"; 
            $races = RaceManager::select();
        ?>
    </head>
    <body>
        <header>
            <?php
                include "include/header.php";
            ?>
            <link rel="stylesheet" href="css/index.css">
        </header>
        <main>
            <div class="next">
                <div class="nextTitle titleFont">
                    <div>
                        Aankomende race:
                    </div>
                    <div>
                        Gegeven locatie idk
                    </div>
                </div>
                <div class="nextBlock">
                    <div class="nextTime">
                        Tijd 21203-1203-1023
                    </div>
                    <div class="nextButton">
                        Ga naar race
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <th>Race name</th>
                        <th>Country</th>
                        <th>Race Date</th>
                        <th>Race Time</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($races as $race){
                            echo "<tr>";
                            echo "<td>$race->raceName </td>";
                            echo "<td>$race->country </td>";
                            echo "<td>$race->race_date </td>";
                            $time = $race->race_time;
                            $timestring = substr($time ,0,2);
                            $time = substr($time ,2,3);
                            $timestring = $timestring + 2;
                            $time= $timestring . $time;
                            echo "<td>$time</td>";
                            echo "<td><span class='material-symbols-outlined tableBtn'>forward</span></td>";
                            echo "</tr>";
                        }
                        ?>
                </table>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>