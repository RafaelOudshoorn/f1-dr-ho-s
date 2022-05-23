<?php
    class userManager{
        public static function select(){
            global $con;

            $stmt=$con->prepare("SELECT * FROM user");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public static function selectOnId($id){
            global $con;

            $stmt=$con->prepare("SELECT * FROM user WHERE idperson = ? ");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function getProfileInfoHeader($id){
            global $con;

            $stmt=$con->prepare("SELECT * FROM user WHERE idperson = ? ");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function updateProfilePicture($oldfileName, $file, $id){
            global $con;

            $cPF_file = $file;

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
                "gif",
                "png"
            );
            if (in_array($cPF_fileLowerType, $cPF_allowedTypes)) {
                if($cPF_fileError === 0){
                    if($cPF_fileSize < 3000000){
                        if($oldfileName != "pfp/user_profile.png"){
                            unlink("pfp/" . $oldfileName);
                        }
                        $cPF_fileNameUpload = uniqid("", true) . "." . $cPF_fileLowerType;
                        $cPF_fileDestination = "pfp/pictures/" . $cPF_fileNameUpload;
                        move_uploaded_file($cPF_fileTmpName, $cPF_fileDestination);

                        $query = "UPDATE user ";
                        $query .= "SET profile_picture = ? ";
                        $query .= "WHERE idperson = ? ";
            
                        $stmt=$con->prepare($query);
                        $stmt->bindValue(1, "pictures/" . $cPF_fileNameUpload);
                        $stmt->bindValue(2, $id);
                        $stmt->execute();

                        header("location:profile.php");
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
        public static function insert(){
            
        }
        public static function checkIsAdmin($id){
            global $con;

            $stmt=$con->prepare("SELECT is_admin FROM user WHERE idperson = ? ");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject();

            // 0 = is User. Geen Admin.
            // 1 = is Moderator. Admin zonder rechten om andere admin te geven of te ontemen
            // 2 = is Admin met de rechten om andere admin te geven of te ontemen

        }
        public static function updateAsAdmin($iUsername, $iIs_admin, $iId){
            global $con;

            $query = "UPDATE user ";
            $query .= "SET username = ? , is_admin = ? ";
            $query .= "WHERE idperson = ? ";

            $stmt=$con->prepare($query);    
            $stmt->bindValue(1,$iUsername);
            $stmt->bindValue(2,$iIs_admin);
            $stmt->bindValue(3,$iId);
            $stmt->execute();

            return header("location:admin");
        }
    }

?>