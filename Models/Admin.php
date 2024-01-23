
<?php
// if (session_status() !== PHP_SESSION_ACTIVE) {
//     session_start();
//   }

require_once '../config/config.php';



// -----------------------------------------------------------//Categories/-----------------------------------------------------------------------------------------
            class CategorieModel {
                private $connection;

                public function __construct() {
                    $this->connection = Database::getInstance()->getConnection();
                }

                // -----------//ajouterCategories//----------//
                public function addCategory($categoryName)
                {
                    try {
                        $query = "INSERT INTO categories (name_Categorie,date) VALUES (:name_Categorie,NOW())";
                        $stmt = $this->connection->prepare($query);
                        $stmt->bindParam(':name_Categorie', $categoryName);
                        return $stmt->execute();
                    } catch (PDOException $e) {
                        echo "Erreur lors de l'ajout de la catégorie: " . $e->getMessage();
                        return false;
                    }
                }

            // -----------//getCategories//----------//
            public function getCategories() {
                try {
                    $query = "SELECT id_Categorie, name_Categorie FROM categories";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute();
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false; 
                }
            }
             // -----------//getCategoriesB by Name//----------//
            public function getCategoriesName() {
                try {
                    $query = "SELECT name_Categorie FROM categories";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute();
                    return $stmt->fetchAll(PDO::FETCH_COLUMN); 
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }


             // -----------//getCategories by ID//----------//
            public function getCategoriesId() {
                try {
                    $query = "SELECT id_Categorie FROM categories";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute();
                    return $stmt->fetchAll(PDO::FETCH_COLUMN); 
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }}
            

             // -----------//get Categories Count//----------//
            public function getCategoriesCount(){
                try {
                    $query = "SELECT COUNT(*) as count FROM categories";
                    $stmt = $this->connection->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    return $result['count'];
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }

               // -----------//delet Categories//----------//
            public function deletCategorie($categoryId){
            try {
                $query = "DELETE FROM categories WHERE id_Categorie = :categoryId";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':categoryId', $categoryId);
                return $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getCategoryDetails($categoryId) {
            try {
                $query = "SELECT * FROM categories WHERE id = :categoryId";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':categoryId', $categoryId);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

         // -----------//editer Categories//----------//

        public function editCategory($categoryId, $newCategoryName) {
            try {
                $query = "UPDATE categories SET name_Categorie = :newCategoryName , date = CURRENT_TIMESTAMP  WHERE id_Categorie = :categoryId";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':newCategoryName', $newCategoryName);
                $stmt->bindParam(':categoryId', $categoryId);
                return $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        }

// -----------------------------------------------------------//tags//-----------------------------------------------------------------------------------------
        class TagsModel{
            private $connection;

            public function __construct() {
                $this->connection = Database::getInstance()->getConnection();
            }


           // -----------//get  tous les tags //----------//

        public function getAllTags() {
            try {
                $query = "SELECT nameTag,idTag FROM tags";
                $stmt = $this->connection->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false; 
            }
        }



            // -----------//ajouter tags //----------//
        public function addTag($nameTag){

            try {
                $query = "INSERT INTO tags (nameTag) VALUES (:nameTag)";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':nameTag', $nameTag);
                return $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }



        // -----------//suprimer tags //----------//
        public function editTag($tagId, $newTagName){
            try {
                $query = "UPDATE tags SET nameTag = :newTagName WHERE idTag = :tagId";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':newTagName', $newTagName);
                $stmt->bindParam(':tagId', $tagId);
                return $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

 
          // -----------// tags name //----------//
        public function getTagsname(){
            try{
            $query ="SELECT nameTag FROM tags";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
            
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false ;
            
            }
        }

    // -----------// tags ID //----------//
        public function getTagsId(){
            try{
            $query ="SELECT idTag FROM tags";
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
            
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false ;
            
            }
        
        
            }

    // -----------//Count tags //----------//
        public function getTagsCount()
        {
            try {
                $query = "SELECT COUNT(*) as count FROM tags";
                $stm = $this->connection->prepare($query);
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
        
                return $result['count'];
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    

        // -----------//suprimer tags //----------//
            public function deleteTag($tagId) {
                try {
                    $query = "DELETE FROM tags WHERE idTag = :tagId";
                    $stmt = $this->connection->prepare($query);
                    $stmt->bindParam(':tagId', $tagId);
                    return $stmt->execute();
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        
    

    }   
// -----------------------------------------------------------//wiki//-----------------------------------------------------------------------------------------
            class WikiModel{
            private $connection;

            public function __construct() {
                $this->connection = Database::getInstance()->getConnection();
            }

            //wikis Count 
                public function getwikiCount()
                {
                    try {
                        $query = "SELECT COUNT(*) as count FROM wikis";
                        $stm = $this->connection->prepare($query);
                        $stm->execute();
                        $result = $stm->fetch(PDO::FETCH_ASSOC);
                
                        return $result['count'];
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }

                //function de get tous les wikis 
                public function getAllwiki(){

                try{
            $query = "SELECT wikis.* , utilisateurs.email FROM wikis join utilisateurs ON utilisateurs.id = wikis.id Where wikis.statut = 0";
            $stm = $this->connection->prepare($query);
            $stm->execute();
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result;
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }


            //Fonction the lastes wikis
                public function getlastwiki() {
                    try {
                        $query = "SELECT wikis.*, utilisateurs.name, utilisateurs.role, categories.name_Categorie
                        FROM wikis
                        JOIN utilisateurs ON utilisateurs.id = wikis.id
                        JOIN categories ON categories.id_Categorie = wikis.idCategorie
                        ORDER BY wikis.date DESC
                        LIMIT 3";
                        $stm = $this->connection->prepare($query);
                        $stm->execute(); 
                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result ?: [];
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return [];
                    }}
            
                    //function last catégories
                public function getlastCategory() {
                    try {
                        $query = "SELECT * FROM categories ORDER BY date DESC LIMIT 3";
                        $stm = $this->connection->prepare($query);
                        $stm->execute();

                        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
                        return $result ?: [];
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return [];
                    }
                }
            
                
        // Archiver une wiki
                public function ArchiveWiki($wikiId){
                    try{
                
                    $query = "UPDATE wikis SET statut = 1 WHERE idWiki = :WikiId";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':WikiId', $wikiId);
                        $stmt->execute();
                                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                return $result;
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                                return false;
                            }




                }
                // -----------------------------------------------------------//Lougout//-----------------------------------------------------------------------------------------
        //fonction de lougout
                public function logout() {
                    session_destroy();
                    header('location: index.php');
                    exit;
                }
                
            }