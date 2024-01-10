
<?php

require_once '../config/config.php';
class TraitementModel {
    private $connection;
    private $UserModel;
   public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function verifierConnexion($email, $password) {
        $query = "SELECT u.id, u.role
                  FROM utilisateurs u
                  WHERE u.email = :email AND u.password = :password ";
    
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    

    }