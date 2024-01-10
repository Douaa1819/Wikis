<?php
require_once '../Models/Admin.php';
    
class CatégorieController {
    private $CatégorieModel;

    public function __construct() {
        $this->CatégorieModel = new CategorieModel();
    }

    public function showCategories() {
        $categories = $this->CatégorieModel->getCategories(); 
        require_once '../views/catégorir.php';
    }
  
    public function addCategory() {
        $catégorieObj = new CategorieModel();

        if (isset($_POST['addCategory'])) {
            $categoryName = $_POST['categoryName'];
            $result = $catégorieObj->Categorie($categoryName);
            if ($result) {
                header('Location: ../views/catégorir.php');
                exit();
            } else {
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }
    }

   


}
   
 



class TagsController{
    private $TagsModel;
   public function __construct(){
    $this->TagsModel = new TagsModel();
   }

    public function TagsAdmin(){
    if (isset($_POST['tags'])){
     $tags= $_POST["tags"];
     $result = $this->TagsModel->Tags($tags);


    }


    }

   }



