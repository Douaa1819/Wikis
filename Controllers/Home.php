<?php
require_once '../Models/Admin.php';
require_once '../Models/User.php';

class WikisController{
    private $WikiModel;
    private $wikiModel;
    public function __construct(){
     $this->WikiModel= new WikiModel();
     $this->wikiModel= new WikisModel();
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
