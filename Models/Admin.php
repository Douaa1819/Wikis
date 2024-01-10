
<?php

require_once '../config/config.php';

class CategorieModel {
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function Categorie($name_Categorie) {
        try {
            $query = "INSERT INTO categories (name_Categorie) VALUES (:name_Categorie)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':name_Categorie', $name_Categorie);
            $result = $stmt->execute();
            if ($result) {
                header('Location: ../views/catégories.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function addCategory($categoryName)
    {
        try {
            $query = "INSERT INTO categories (name_Categorie) VALUES (:name_Categorie)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':name_Categorie', $categoryName);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout de la catégorie: " . $e->getMessage();
            return false;
        }
    }
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


    public function deletCategorie($name_Categorie){
        try {
            $query = "DELETE FROM categories WHERE name_Categorie=:name_Categorie";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':name_Categorie', $name_Categorie);
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

// CategorieModel.php

public function editCategory($categoryId, $newCategoryName) {
    try {
        $query = "UPDATE categories SET name_Categorie = :newCategoryName WHERE id_Categorie = :categoryId";
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
class TagsModel{
    private $connection;

    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }
    // public function 

public function Tags($nameTag){


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



public function UpdateTags($nameTag){
    try{
    
    $query="UPDATE tags SET nameTag= tags WHERE nameTag=:nameTag";
    $stmt= $this->connection->prepare($query);
    $stmt->bindParam(':nameTag' , $nameTag);
    return $stmt->execute();
    }catch (PDOException $e){
        echo $e->getMessage();
        return false ;
    }
    
    
    }


    public function getTagsname(){
        try{
        $query ="SELECT nameTag FROM tags";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
        
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false ;
        
        }
        
        
            }
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
    }                  