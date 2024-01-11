<?php

require_once '../config/config.php';
class WiksModel{
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }
    public function getAuthorwikis($user_id){
        try {
            $query = "SELECT * FROM wikis WHERE id_user = :id_user"; 
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id_user', $user_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}