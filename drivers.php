<html>
    <head>
        <?php include "include/head.php"; 
        $drivers = DriverManager::select();
        ?>
    </head>
    <body>
        <header>
            <link rel="stylesheet" href="css/drivers.css">
            <?php include "include/header.php"; ?>
        </header>
        <main>
            <div class="driver">
                <table class="table table-striped">
                <thead class="table-dark">
                    <th>Race name</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>nationality</th>
                    <th>permanentNumber</th>
                </thead>
                <tbody>
                    <?php
                        foreach($drivers as $driver){
                            echo "<tr>";
                            echo "<td>$driver->drivername</td>";
                            echo "<td>$driver->givenName</td>";
                            echo "<td>$driver->familyName</td>";
                            echo "<td>$driver->nationality</td>";
                            echo "<td>$driver->permanentNumber</td>";
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