


<?php 
require_once '../Models/User.php';

class InscriptionController {
    private $utilisateurModel;
    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }
    public function inscriptionUtilisateur() {
        if (isset($_POST['nameInsc']) && isset($_POST['emailInsc']) && isset($_POST['passwordInsc'])) {
            $name= $_POST["nameInsc"];
            $email = $_POST["emailInsc"];
            $password = $_POST["passwordInsc"];
            
            $result = $this->utilisateurModel->inscription($name,$email,$password);
    
 
    }
    
    }

}
?>






