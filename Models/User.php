<?php

require_once '../config/config.php';

class UtilisateurModel {
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function inscription($name, $email, $password) {
        try {
            $query = "INSERT INTO utilisateurs (name, email, password, role) VALUES (:name, :email, :password, 'auteur')";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }






    public function getUsersCount() {
        try {
            $query = "SELECT COUNT(*) as count FROM utilisateurs";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['count'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}

class WikisModel{
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }
    public function getAllwikis(){

        try{
       $query = "SELECT wikis.*, categories.name_Categorie FROM wikis JOIN categories ON categories.id_Categorie = wikis.idCategorie ";;
       $stm = $this->connection->prepare($query);
       $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function setwikicontent($contenu){
            try {
                $query = "INSERT INTO wikis (contenu) VALUES (:contenu)";
                $stm = $this->connection->prepare($query);
                $stm->bindParam(':contenu', $contenu);
                $stm->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


        public function setwikiTitle($name_Wiki){
            try {
                $query = "INSERT INTO wikis (name_Wiki) VALUES (:name_Wiki)";
                $stm = $this->connection->prepare($query);
                $stm->bindParam(':name_Wiki', $name_Wiki);
                $stm->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
            public function getwikitags(){
              try{
               $query = "SELECT nameTag FROM tags";
               $stm = $this->connection->prepare($query);
               $stm->execute();
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }
    }


class CategoriesModel {
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function getAllCategories() {
        try {
            $query = "SELECT  name_Categorie FROM categories";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

}


    


