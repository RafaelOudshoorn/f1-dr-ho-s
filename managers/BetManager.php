<?php
    class BetManager{
        public static function selectID($id){
            global $con;
            $stmt = $con->prepare("SELECT * FROM bet where id = ?");
            $stmt->bindValue(1,$id);
            $stmt->execute();
            return $stmt->fetchObject();
        }
    }
?>