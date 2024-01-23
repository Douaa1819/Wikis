<?php
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        require_once '../config/config.php';






// -----------------------------------------------------------//wiki Model //-----------------------------------------------------------------------------------------
        class WiksModel{
        private $connection;

        public function __construct() {
            $this->connection = Database::getInstance()->getConnection();
        }

            // -----------//  methode de  wiki de L'auteur //----------//
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


            // -----------//  methode pour get catégorie by son Id //----------//
            public function getCategoriesId() {
                try {
                    $query = "SELECT id_Categorie FROM categories";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute();
                    return $stmt->fetchAll(PDO::FETCH_COLUMN); 
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

            
            // -----------//  methode pour get Wiki by son Id //----------//

            public function getWiki($wikiID){
                $query = "SELECT w.idWiki, w.name_Wiki, w.contenu, w.id, u.name, GROUP_CONCAT(t.nameTag) as tagName, c.name_Categorie
                        FROM wikis as w 
                        JOIN tags_wikis as wt 
                        ON w.idWiki = wt.idWiki
                        JOIN utilisateurs as u 
                        ON u.id = w.id 
                        JOIN tags as t 
                        ON t.idTag = wt.idTag
                        JOIN categories as c
                        ON c.id_Categorie = w.idCategorie
                        GROUP BY w.idWiki, w.name_Wiki, w.contenu, u.name, c.name_Categorie
                        HAVING w.idWiki = :wikiID";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':wikiID', $wikiID);
                if($stmt->execute()){
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }else{
                    return false;
                }
            }


                // -----------//  methode pour gSearch a wiki //----------//
                public function SearchWiki($search){
                    $searchTerm = '%' . $search . '%';
                    $query = "SELECT DISTINCT w.idWiki, w.name_Wiki,w.date, w.contenu, u.name, c.name_Categorie
                    FROM wikis AS w
                    JOIN utilisateurs As u ON u.id = w.id
                    JOIN categories AS c ON c.id_Categorie = w.idCategorie
                    JOIN tags_wikis AS wt ON wt.idWiki = w.idWiki
                    JOIN tags AS t ON t.idTag = wt.idTag
                    WHERE  w.name_Wiki LIKE :input OR c.name_Categorie LIKE :input OR t.nameTag LIKE :input
                    AND w.statut = 0";
                    $stmt = $this->connection->prepare($query);
                    
                    $stmt->bindParam(':input', $searchTerm);
                    if($stmt->execute()){
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
                    }else{
                        return false;
                    }
                }


        }