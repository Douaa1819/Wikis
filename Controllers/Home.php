<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

require_once '../Models/Admin.php';
require_once '../Models/User.php';
require_once '../Models/Auteur.php';

// --------------------------------------------//Wiki Controller //-----------------------------------------------------//
        class WikisController{
            private $WikiModel;
            private $wikiModel;
            private $wikModel;
            public function __construct(){
            $this->WikiModel= new WikiModel();
            $this->wikiModel= new WikisModel();
            $this->wikModel = new WiksModel();

            }


             // -----------//Last 3 wiki //----------//
            public function LastWikis() {
                $lastWikis = $this->WikiModel->getlastwiki();
                return $lastWikis;
            }
            

            // -----------//Last 3 Categorie  //----------//
            public function LastCategories() {
                $lastCategories = $this->WikiModel->getlastCategory();
                return $lastCategories;   
            }


            // -----------//tous les wiki  //----------//
            public function getAllWikis() {
                $wikis = $this->wikiModel->getAllwikis();
                return $wikis;
            }



            // -----------//wiki de l'auteur  //----------//
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


            // -----------//wiki  By ID //----------//
            public function getWikiByID($wikiID){
                $wiki = $this->wikModel->getwiki($wikiID);
                if($wiki){
                    return $wiki;
                }else{
                    return false;
                }
                
            }

         
            // -----------//ajouter wiki //----------//
            public function addWiki() {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $data = [
                        'WikiTitre' => $_POST['WikiTitre'],
                        'WikiContenu' => $_POST['WikiContenu'],
                        'WikiTags' => isset($_POST['WikiTags']) ? $_POST['WikiTags'] : [],
                        'WikiCategorie' => isset($_POST['categorie']) ? (int)$_POST['categorie'] : null,
                        'idUser' => isset($_POST['id']) ? $_POST['id'] : null,
                    ];
                    if ($this->wikiModel->AddWiki($data)) {
                        echo ' <script>alert("Wiki article successfully added");</script>';
                        header("Location: ../views/auteur.php");
                        exit();
                    }else {
                        echo '<script>alert("Something went wrong");</script>';
                    }
                }
            }


            // -----------//Update wiki //----------//
            public function editWikiByID() {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $data = [
                        'WikiTitre' => $_POST['WikiTitre'],
                        'WikiContenu' => $_POST['WikiContenu'],
                        'WikiTags' => isset($_POST['WikiTags']) ? $_POST['WikiTags'] : [],
                        'WikiCategorie' => isset($_POST['categorie']) ? (int)$_POST['categorie'] : null,
                        'wikiID' => isset($_POST['wikiID']) ? $_POST['wikiID'] : null,
                    ];
                    if ($this->wikiModel->editWiki($data)) {
                    
                        echo ' <script>alert("Wiki article successfully edited.");</script>';
                        header("Location: ../views/auteur.php");
                        exit();
                    } else {
                        echo '<script>alert("Something went wrong");</script>';
                    }
                }
            }
        //Search wiki 

        public function searchAction() {
            header('Content-Type: application/json');
      
            $searchInput = file_get_contents('php://input');
            $decoded = json_decode($searchInput);
            $searchValue = $decoded->input;
            $searchResults = $this->wikModel->SearchWiki($searchValue);
            echo json_encode($searchResults);

      
      
        }

            // -----------//tags de  wiki //----------//
            public function getWikiTags() {
                return $this->wikiModel->getwikitags();
            }
        


            // -----------// suprimer wiki //----------//
            public function deletWiki($idWiki) {
                return $this->wikiModel->Deletwiki($idWiki);
            }

        }

    



    
// --------------------------------------------//Categorie Controller //-----------------------------------------------------//


        class CatégoriesController {
            private $CatégoriesModel;

            public function __construct() {
                $this->CatégoriesModel = new CategoriesModel();
            }

            
//-----------//get toous les categories //----------//
            public function Categories() {
                $categories = $this->CatégoriesModel->getAllCategories(); 
                return $categories;
            }

        
        }



?>
