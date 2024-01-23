
<?php

require_once '../config/config.php';
class TraitementModel {
    private $connection;
    private $UserModel;
   public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function verifierConnexion($email) {
        $query = "SELECT u.*
                  FROM utilisateurs u
                  WHERE u.email = :email";
    
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    

    }