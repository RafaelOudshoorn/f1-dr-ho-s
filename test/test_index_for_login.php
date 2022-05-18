<?php
    include "../database/database.php";
    session_start();

    var_dump($_SESSION["user_id"]);

    if(! $_SESSION["user_id"]){
        header("location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            $stmt=$con->prepare("SELECT profile_picture FROM user WHERE idperson = ? ");
            $stmt->bindValue(1, $_SESSION["user_id"]);
            $stmt->execute();

            $pf=$stmt->fetchObject();

            echo "<div>";
                echo "<img src=\"../profile/" . $pf->profile_picture . "\" style=\"width:150px;height:150px;border:solid 5px black;border-radius:50%;\">";
            echo "</div>";
        ?>
        <br/>
        <?php
            if(isset($_POST["cPF"])){
                $cPF_file = $_FILES['file'];

                $cPF_fileName = $_FILES["file"]["name"];
                $cPF_fileTmpName = $_FILES["file"]["tmp_name"];
                $cPF_fileSize = $_FILES["file"]["size"];
                $cPF_fileError = $_FILES["file"]["error"];
                $cPF_fileType = $_FILES["file"]["type"];

                $cPF_fileExt = explode(".", $cPF_fileName);
                $cPF_fileLowerType = strtolower(end($cPF_fileExt));
                $cPF_allowedTypes = array(
                    "jpg",
                    "jpeg",
                    "png"
                );
                if (in_array($cPF_fileLowerType, $cPF_allowedTypes)) {
                    if($cPF_fileError === 0){
                        if($cPF_fileSize < 300000){
                            if($pf->profile_picture != "pictures/user_profile.png"){
                                unlink("../profile/" . $pf->profile_picture);
                            }
                            $cPF_fileNameUpload = uniqid("", true) . "." . $cPF_fileLowerType;
                            $cPF_fileDestination = "../profile/pictures/" . $cPF_fileNameUpload;
                            move_uploaded_file($cPF_fileTmpName, $cPF_fileDestination);

                            $query = "UPDATE user ";
                            $query .= "SET profile_picture = ? ";
                            $query .= "WHERE idperson = ? ";

                            $stmt=$con->prepare($query);
                            $stmt->bindValue(1, "pictures/" . $cPF_fileNameUpload);
                            $stmt->bindValue(2, $_SESSION["user_id"]);
                            $stmt->execute();

                            header("location:test_index_for_login");
                        }else{
                            echo "The image you uploaded was too big. Plz downscale the image or choose another one.";
                        }
                    }else{
                        echo "There was an error uploading your profile picture. Plz try again.";
                    }
                }else{
                    echo "Upload an picture you moron!!";
                }

            }
            echo "<form method=\"POST\" enctype=\"multipart/form-data\">";
                echo "<input type=\"file\" name=\"file\"><br/>";
                echo "<input type=\"submit\" name=\"cPF\" value=\"change profile picture\">";
            echo "</form>";
        ?>
        <a href="../login.php">go back to login</a>
    </body>
</html>