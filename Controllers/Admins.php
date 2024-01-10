<?php
require_once '../Models/Admin.php';
    
class CatégorieController {
    private $CatégorieModel;

    public function __construct() {
        $this->CatégorieModel = new CategorieModel();
    }

    public function showCategories() {
        $categories = $this->CatégorieModel->getCategories(); 
        require_once '../views/catégories.php';
    }
  
    public function addCategory() {
        $catégorieObj = new CategorieModel();

        if (isset($_POST['addCategory'])) {
            $categoryName = $_POST['categoryName'];
            $result = $catégorieObj->addCategory($categoryName);
            if ($result) {
                header('Location: ../views/catégories.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }
    }

    public function editCategory() {
        if (isset($_POST['editCategory'])) {
            $categoryId = $_POST['editCategoryId'];
            $newCategoryName = $_POST['editCategoryName'];
    
            $result = $this->CatégorieModel->editCategory($categoryId, $newCategoryName);
    
            if ($result) {
                header('Location: ../views/catégories.php');
                exit();
            } else {
                echo "Erreur lors de la mise à jour de la catégorie.";
            }
        }
    }

   


}
   
 



class TagsController{
    private $TagsModel;
   public function __construct(){
    $this->TagsModel = new TagsModel();
   }

   
    public function showTags() {
        $tags = $this->TagsModel->getAllTags(); 
        require_once '../views/tags.php';
    }
  
    public function addTag() {
        $tagObj = new TagsModel();

        if (isset($_POST['addTag'])) {
            $tagName = $_POST['tagName'];
            $result = $tagObj->addTag($tagName);
            if ($result) {
                header('Location: ../views/tags.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }
    }

    public function editTag() {
        if (isset($_POST['editTag'])) {
            $tagId = $_POST['editTagId'];
            $newTagName = $_POST['editTagName'];
    
            $result = $this->TagsModel->editTag($tagId, $newTagName);
    
            if ($result) {
                header('Location: tags.php');
                exit();
            } else {
                echo "Erreur lors de la mise à jour du tag.";
            }
        }
    }

        public function deleteTag() {
            if (isset($_POST['deleteTag'])) {
                $tagId = $_POST['tagId'];
                $result = $this->TagsModel->deleteTag($tagId);
    
                exit();
            }
        }
    
  
    }
    


   



