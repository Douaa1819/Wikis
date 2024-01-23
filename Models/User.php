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

        try {
            $query = "SELECT wikis.*, categories.name_Categorie, utilisateurs.name, utilisateurs.role FROM wikis 
                      JOIN categories ON categories.id_Categorie = wikis.idCategorie
                      JOIN utilisateurs ON utilisateurs.id = wikis.id WHERE wikis.statut= 0 "; 
                      
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
       //add wiki

       public function AddWiki($data)
{
    try {

        $query = 'INSERT INTO wikis (name_Wiki, contenu,date,statut, idCategorie, id) VALUES (:titre, :contenu, NOW(),"0", :idCategorie, :id)';
        $stm = $this->connection->prepare($query);
        $stm->bindParam(':titre', $data['WikiTitre']);
        $stm->bindParam(':contenu', $data['WikiContenu']);
        $stm->bindParam(':idCategorie', $data['WikiCategorie']);
        $stm->bindParam(':id', $data['idUser']); 
        $stm->execute();

        $lastIdWiki = $this->connection->lastInsertId();

        // Insert tags for the wiki
        foreach ($data['WikiTags'] as $tag) {
            $tagQuery = 'INSERT INTO tags_wikis (idWiki, idTag) VALUES (:wikiId, :tagId)';
            $tagStmt = $this->connection->prepare($tagQuery);
            $tagStmt->bindParam(':wikiId', $lastIdWiki);
            $tagStmt->bindParam(':tagId', $tag);
            $tagStmt->execute();
        }
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

       public function editWiki($data)
{
    try {
            $query1 = "UPDATE wikis SET wikis.name_Wiki = :titre , wikis.contenu = :contenu, wikis.idCategorie = :idCategorie WHERE wikis.idWiki = :wikiID";
            $stm = $this->connection->prepare($query1);
            $stm->bindParam(':titre', $data['WikiTitre']);
            $stm->bindParam(':contenu', $data['WikiContenu']);
            $stm->bindParam(':idCategorie', $data['WikiCategorie']);
            $stm->bindParam(':wikiID', $data['wikiID']);
            $response1 = $stm->execute();
        
            foreach($data['WikiTags'] as $tag){
              $query2 = "DELETE FROM tags_wikis WHERE tags_wikis.idWiki = :wikiID";
              $stm2 = $this->connection->prepare($query2);
              $stm2->bindParam(':wikiID', $data['wikiID']);
              $response2 = $stm2->execute();
            }
        
            
            foreach($data['WikiTags'] as $tag){
              $query3 = "INSERT INTO tags_wikis(tags_wikis.idWiki, tags_wikis.idTag) VALUES(:wikiID, :tagID)";
              $stm3 = $this->connection->prepare($query3);
              $stm3->bindParam(':wikiID', $data['wikiID']);
              $stm3->bindParam(':tagID', $tag);
              $response3 = $stm3->execute();
            }
        
            if($response1 && $response2 && $response3){
              return true;
            }else{
              return false;
            }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

            //DELET WIKI
            public function Deletwiki($idWiki) {
                try {
                    $query = 'DELETE FROM wikis WHERE idWiki = :idWiki';
                    $stm = $this->connection->prepare($query);
                    $stm->bindParam(':idWiki', $idWiki);

                    if($stm->execute()){
                        return true;
                    }
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
               $query = "SELECT * FROM tags";
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
            $query = "SELECT * FROM categories";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
        }
    }

}


    


