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
            <div class="drivers">
                <?php
                    foreach($drivers as $driver){
                        echo "<div class='driver'>";
                        echo "<div class='driverL'>";
                        echo "<img src='pfp\pictures\user_profile.png' alt='$driver->familyName'>";
                        echo "<div class='titleFont num'>$driver->permanentNumber</div>";
                        echo "</div>";
                        echo "<div class='driverR'>";
                        echo "<div class='titleFont name'>$driver->givenName <br> $driver->familyName</div> <hr class='line'>";
                        echo "<div class='info'>";
                        echo "$driver->dateOfBirth <br>";
                        echo "$driver->nationality";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>