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
                        echo "<div>";
                        echo "<div>";
                    }
                ?>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>