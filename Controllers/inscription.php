<?php
session_start();
require_once '../Models/User.php';

class InscriptionController {
    private $utilisateurModel;

    public function __construct() {
        $this->utilisateurModel = new UtilisateurModel();
    }

    public function inscriptionUtilisateur() {
        // Check if the session is not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['nameInsc']) && isset($_POST['emailInsc']) && isset($_POST['passwordInsc']) && isset($_POST['repeat-password'])) {
            $name = $_POST["nameInsc"];
            $email = $_POST["emailInsc"];
            $password = $_POST["passwordInsc"];
            $repeat_password = $_POST["repeat-password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (isset($_POST['submitInsc'])) {
                $patternName = '/^[a-zA-Z\s\'.-]+$/';
                $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
                $patternPassword = '/^.{4,}$/';

                if (!preg_match($patternName, $name)) {
                    array_push($errors, "Name is not valid.");
                }

                if (!preg_match($patternEmail, $email)) {
                    array_push($errors, "Email is not valid.");
                }

                if (!preg_match($patternPassword, $password)) {
                    array_push($errors, "Please use at least 4 characters");
                }

                if ($password !== $repeat_password) {
                    array_push($errors, "The password does not match");
                }
            }

            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
            } else {
                $result = $this->utilisateurModel->inscription($name, $email, $password_hash);
            }
        }
    }
}
?>
