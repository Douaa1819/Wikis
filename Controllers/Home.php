<?php
 session_start();
require_once '../Models/Admin.php';
require_once '../Models/User.php';
require_once '../Models/Auteur.php';


class WikisController{
    private $WikiModel;
    private $wikiModel;
    private $wikModel;
    public function __construct(){
     $this->WikiModel= new WikiModel();
     $this->wikiModel= new WikisModel();
     $this->wikModel = new WiksModel();

    }

    public function LastWikis() {
        $lastWikis = $this->WikiModel->getlastwiki();
        return $lastWikis;
    }

    public function LastCategories() {
        $lastCategories = $this->WikiModel->getlastCategory();
        return $lastCategories;   
}
public function getAllWikis() {
        $wikis = $this->wikiModel->getAllwikis();
        return $wikis;
    }


    public function getAuthorwikis() {
       
    
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    
        if ($user_id) {
            $wikis = $this->wikModel->getAuthorwikis($user_id);
    
            if ($wikis !== false) {
                return $wikis;
            } else {
                echo "Failed to retrieve wikis.";
                return [];
            }
        } else {
            header("Location: Register.php");
            exit();
        }
    }
    
}


class CatégoriesController {
    private $CatégoriesModel;

    public function __construct() {
        $this->CatégoriesModel = new CategoriesModel();
    }

    public function Categories() {
        $categories = $this->CatégoriesModel->getAllCategories(); 
        return $categories;
    }}


?>
