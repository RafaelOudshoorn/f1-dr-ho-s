<?php
    require_once "../../database/database.php";

    class loginManager{
        public static function selectUserLogin($email){
            global $con;

            $query = "SELECT * ";
            $query .= "FROM user ";
            $query .= "WHERE LOWER(email) = ? ";

            $stmt=$con->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function selectUsernameInsert($username){
            global $con;

            $query = "SELECT * ";
            $query .= "FROM user ";
            $query .= "WHERE LOWER(username) = ? ";

            $stmt=$con->prepare($query);
            $stmt->bindValue(1, $username);
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function selectMailInsert($email){
            global $con;

            $query = "SELECT * ";
            $query .= "FROM user ";
            $query .= "WHERE LOWER(email) = ? ";

            $stmt=$con->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function insert($username, $firstname, $lastname, $email, $nHashedPassword){
            global $con;

            $password = password_hash($nHashedPassword, PASSWORD_DEFAULT);

            $query = "INSERT INTO ";
            $query .= "user (username, firstname, lastname, email, password) ";
            $query .= "VALUES (?, ?, ?, ?, ?) ";

            $stmt=$con->prepare($query);
            $stmt->bindValue(1, htmlspecialchars($username));
            $stmt->bindValue(2, htmlspecialchars($firstname));
            $stmt->bindValue(3, htmlspecialchars($lastname));
            $stmt->bindValue(4, htmlspecialchars($email));
            $stmt->bindValue(5, $password);
            $stmt->execute();
        }
    }
?>