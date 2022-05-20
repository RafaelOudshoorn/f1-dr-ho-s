<html>
    <head>
        <?php 
            include "include/head.php";

            if($_SESSION["is_admin"] === "0"){
                header('Location:index');
                exit;
            }
        ?>
        <script>
            function edit_user(id){
                var x = document.getElementById("form-" + id);
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            };
        </script>
    </head>
    <body>
        <header>
            <?php include "include/header.php"; ?>
            <link rel="stylesheet" href="css/admin.css">
        </header>
        <main>
            <div class="user container">
                <div class="inner_user">
                    <br>
                    <form method="POST">
                        <table class="table table-striped table-dark text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Points</th>
                                    <th>Site Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($au as $allUsers){
                                        if($_SESSION["is_admin"] === "2"){
                                            echo "<tr style=\"cursor:pointer;\" onclick=\"edit_user(". $allUsers->idperson . ")\">";
                                        }else{
                                            echo "<tr>";
                                        }
                                            echo "<th>" . $allUsers->idperson . "</th>";
                                            echo "<th>" . $allUsers->username . "</th>";
                                            echo "<th>" . $allUsers->firstname . " " . $allUsers->lastname . "</th>";
                                            echo "<th>" . $allUsers->email . "</th>";
                                            echo "<th>" . $allUsers->total_points . "</th>";
                                            switch($allUsers->is_admin){
                                                default:
                                                case 0:
                                                    echo "<th>User</th>";
                                                    break;
                                                case 1:
                                                    echo "<th>Moderator</th>";
                                                    break;
                                                case 2:
                                                    echo "<th>Admin</th>";
                                                    break;
                                            }
                                        echo "  <div id=\"form-$allUsers->idperson\" style=\"display:none;\">";
                                        echo "          <input type=\"text\" name=\"username\" value=\"$allUsers->username\">";
                                        echo "  </div>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </body>
</html>