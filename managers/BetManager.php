<?php
    class BetManager{
        public static function selectID($id){
            global $con;
            $stmt = $con->prepare("SELECT * FROM bet where user_idperson = ?");
            $stmt->bindValue(1,$id);
            $stmt->execute();
            return $stmt->fetchObject();
        }
        public static function select(){
            global $con;
            $stmt = $con->prepare("SELECT * FROM bet");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>