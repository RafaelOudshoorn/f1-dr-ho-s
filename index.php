<html>
    <head>
        <?php include "include/head.php"; 
            $races = RaceManager::select();
            $nextRace = RaceManager::AankomendeRace();
        ?>
        <script>
            $(document).ready(function(){
                var offsetnow = document.getElementById("racenow").offsetTop;
                var a = offsetnow - 42;
                $("tbody").scrollTop(a);
            });
        </script>
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
                        <?php
                            echo "Datum " .  $nextRace->race_date;
                        ?>
                    </div>
                    <?php
                    echo "<div class=\"nextButton\" onclick=\"javascript:location.href='race?id=$nextRace->IDrace'\">";
                        echo "Ga naar race";
                    echo "</div>";
                    ?>
                </div>
            </div>
            <div>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <th>Race name</th>
                        <th>Country</th>
                        <th>Race Date</th>
                        <th>Race Time</th>
                        <th style="width:68px;"></th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($races as $race){
                            if($nextRace->IDrace !== $race->IDrace){
                                echo "<tr>";
                            }else{
                                echo "<tr style=\"background:#D2042D; color:#FFFFFF;\" id=\"racenow\">";
                            }
                                echo "<td>$race->raceName </td>";
                                echo "<td>$race->country </td>";
                                echo "<td>$race->race_date </td>";

                                $time = $race->race_time;
                                $timestring = substr($time ,0,2);
                                $time = substr($time ,2,3);
                                $timestring = $timestring + 2;
                                $time= $timestring . $time;
                                echo "<td>$time</td>";

                                if($nextRace->IDrace !== $race->IDrace){
                                    echo "<td class='tableBtnSize'><a href='race?id=$race->IDrace'><span class='material-symbols-outlined tableBtn'>forward</span></a></td>";
                                }else{
                                    echo "<td class='tableBtnSize'><a href='race?id=$race->IDrace' style='color:white;'><span class='material-symbols-outlined tableBtn tableR'>forward</span></a></td>";
                                }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>