<html>
    <head>
        <?php include "include/head.php"; 
        $drivers = DriverManager::select();
        ?>
    </head>
    <body>
        <header>
            <?php include "include/header.php"; ?>
        </header>
        <main>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th class="hide1000">Race name</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>nationality</th>
                    <th class="hide700">permanentNumber</th>
                    <th class="unhide"></th>
                </thead>
                <tbody>
                    <?php
                        foreach($drivers as $driver){
                            echo "<tr>";
                            echo "<td class='hide1000'>$driver->drivername</td>";
                            echo "<td>$driver->givenName</td>";
                            echo "<td>$driver->familyName</td>";
                            echo "<td>$driver->nationality</td>";
                            echo "<td>$driver->permanentNumber</td>";
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