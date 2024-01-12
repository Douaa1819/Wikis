<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

require_once '../config/config.php';
class WiksModel{
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }
    public function getAuthorwikis($user_id){
        try {
            $query = "SELECT wikis.*, categories.name_Categorie
            FROM wikis
            JOIN utilisateurs ON utilisateurs.id = wikis.id
           JOIN categories ON categories.id_Categorie = wikis.idCategorie
            WHERE wikis.id = :id_user"; 
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