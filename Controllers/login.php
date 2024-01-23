<?php


if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }
require_once '../Models/Signin.php';

class TraitementController {
    private $traitementModel;

    public function __construct() {
        $this->traitementModel = new TraitementModel();
    }

    public function connexionUtilisateur($email, $password) {
        // Check if the session is not already started
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['login_error'] = "Invalid email format.";
            header('location: register.php');
            exit;
        }
        if (strlen($password) < 4) {
            $_SESSION['login_error'] = "Password should be at least 4 characters.";
            header('location: register.php');
            exit;
        }
        $row = $this->traitementModel->verifierConnexion($email);

        if ($row) {
            if(password_verify($password ,$row['password'])){
                if ($row['role'] == 'auteur') {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION ['role'] = $row['role'];
                    header('location: auteur.php');
                    exit;
                } elseif ($row['role'] == 'admin') {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION ['role'] = $row['role'];
                    header('location: admin.php');
                    exit;
                } else {
                    
                    $_SESSION['login_error'] = "Invalid role.";
                        echo '<script>alert("Something went wrong");</script>';
                    header('location: register.php');
                    exit;
                }    
            }else{
                $_SESSION['login_error'] = "Invalid email or password.";
                echo '<script>alert("Something went wrong");</script>';
                header('location: register.php');
                exit;    
            }
        } else {
        }
        
    }
    


 



}
?>
