<html>
    <head>
        <?php include "include/head.php"; 
        $drivers = Driverstandings_overall::join();
        $last = LastraceManager::join();
        $qualifying = QualifyingManager::join();
        ?>
        <link rel="stylesheet" href="css/scoreboard.css">
    </head>
    <body>
        <header>
            <?php include "include/header.php"; ?>
        </header>
        <main>
            <div class="select">
                <div id="s1" onclick="scoreSelect('l')">
                    Users
                </div>
                <div id="s2"></div>
                <div id="s3" onclick="scoreSelect('r')">
                    Standings
                </div>
            </div>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>Username</th>
                    <th>Points</th>
                </thead>
                    <tbody>
                       <tr>
                           <td>xd</td>
                           <td>xd</td>
                       </tr>
                    </tbody>
            </table>
            <div>
            </div>
            <table class="table table-striped">
                <!-- race overall -->
                <thead class="table-dark">
                    <th>Points</th>
                    <th>Wins</th>
                    <th>Position</th>
                    <th>Family name</th>
                </thead>
                    <tbody>
                        <?php
                            foreach($drivers as $driver){
                                echo "<tr>";
                                echo "<td>$driver->points</td>";
                                echo "<td>$driver->wins</td>";
                                echo "<td>$driver->position</td>";
                                echo "<td>$driver->familyName</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
            <table class="table table-striped">
                <!-- lastrace -->
                <thead class="table-dark">
                    <th>Position</th>
                    <th>Points</th>
                    <th>Grid</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Family name</th>
                </thead>
                    <tbody>
                        <?php
                            foreach($last as $L){
                                echo "<tr>";
                                echo "<td>$L->position</td>";
                                echo "<td>$L->points</td>";
                                echo "<td>$L->grid</td>";
                                echo "<td>$L->status</td>";
                                echo "<td>$L->time</td>";
                                echo "<td>$L->familyName</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
            <table class="table table-striped">
                <!-- qualifying -->
                <thead class="table-dark">
                    <th>Date</th>
                    <th>Time</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Q3</th>
                    <th>Family name</th>
                </thead>
                    <tbody>
                        <?php
                            foreach($qualifying as $quali){
                                echo "<tr>";
                                echo "<td>$quali->date</td>";
                                echo "<td>$quali->time</td>";
                                echo "<td>$quali->Q1</td>";
                                echo "<td>$quali->Q2</td>";
                                echo "<td>$quali->Q3</td>";
                                echo "<td>$quali->familyName</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
            </table>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>