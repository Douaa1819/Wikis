<?php
require_once '../Models/Admin.php';

class WikiController{
    private $WikiModel;
    public function __construct(){
     $this->WikiModel= new WikiModel();
    }

    public function LastWikis() {
        $lastWikis = $this->WikiModel->getlastwiki();
        return $lastWikis;
    }

    public function LastCategories() {
        $lastCategories = $this->WikiModel->getlastCategory();
        return $lastCategories;

    
}
}
?>
