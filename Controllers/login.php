
<?php
require_once '../Models/User.php';
class TraitementController {
    private $traitementModel;

    public function __construct($traitementModel) {
        $this->traitementModel = $traitementModel;
    }

    public function traiterFormulaireConnexion() {
        if (isset($_POST['submit'])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $this->connexionUtilisateur($email, $password);
        }
    }

    private function connexionUtilisateur($email, $password) {
         $this->traitementModel->verifierConnexion($email, $password);

    }
}
?>