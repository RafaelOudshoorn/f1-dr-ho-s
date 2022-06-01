<html>
    <head>
        <?php include "include/head.php"; 
            $races = RaceManager::select();
            $nextRace = RaceManager::AankomendeRace();

            $_SESSION["race_id"] = $nextRace->IDrace;
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
                    echo "<div class=\"nextButton\" onclick=\"javascript:location.href='race'\">";
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
                        <th>Circuit</th>
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
                                echo "<td>$race->circuitName </td>";
                                echo "<td>$race->race_date </td>";

                                $time = $race->race_time;
                                $timestring = substr($time ,0,2);
                                $time = substr($time ,2,3);
                                $timestring = $timestring + 2;
                                $time= $timestring . $time;
                                echo "<td>$time</td>";
                                echo "<form method=\"POST\">";
                                    echo "<td class='tableBtnSize'>";
                                        echo "<input type='submit' ";
                                        if($nextRace->IDrace !== $race->IDrace){
                                            echo "class='material-symbols-outlined tableBtn' ";
                                        }else{
                                            echo "class='material-symbols-outlined tableBtn tableR' ";
                                        }
                                        echo "value='forward' name='toRace$race->IDrace'>";
                                    echo "</td>";
                                echo "</form>";
                            echo "</tr>";
                            if(isset($_POST["toRace$race->IDrace"])){
                                $_SESSION["race_id"] = $race->IDrace;
                                echo "<script>location.href='race'</script>";
                            }
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