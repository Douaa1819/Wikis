<?php

require_once '../config/config.php';

class UtilisateurModel {
    private $connection;
    public function __construct() {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function inscription($name, $email, $password) {
        $query = "INSERT INTO utilisateurs (name, email, password, role ) VALUES (:name,:email,:password ,'auteur')";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

       return $stmt->execute();

    }}
























    // class TraitementModel {
    // private $connection;
    // private $UserModel;
    // public function __construct($connection) {
    //     $this->connection = $connection;
    // }

    // public function verifierConnexion($email, $password) {
    //     $query = "SELECT u.id
    //               FROM utilisateurs u
    //               WHERE u.email = :email AND u.password = :password ";

    //     $stmt = $this->connection->prepare($query);
    //     $stmt->bindParam(':email', $email);
    //     $stmt->bindParam(':password', $password);
    //     $stmt->execute();
    //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //     if ( $_SESSION['id'] = $row['id']) {
    //         header('location: auteur.php');
    //         exit;
    //     } else {
    //        echo 'invalide';
    //         exit;
    //     }
        
    // }




    // public function signup(){
      
    //     if (isset($_POST["submitInsc"])) {
    //         $fullName = $_POST["nameInsc"];
    //         $email = $_POST["emailInsc"];
    //         $password = $_POST["passwordInsc"];
    //         $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    //         $patternName = '/^[a-zA-Z\s\'.-]+$/';
    //         $patternPassword = '/^.{4,}$/';

    //         if (!preg_match($patternName, $fullName)) {
    //             array_push($errors, "Name is not valid.");
    //         }

    //         if (!preg_match($patternEmail, $email)) {
    //             array_push($errors, "Email is not valid.");
    //         }

    //         if (!preg_match($patternPassword, $password)) {
    //             array_push($errors, "Please use at least 4 characters");
    //         }

    //         // if ($password !== $repeat_password) {
    //         //     array_push($errors, "The password does not match");
    //         // }

    //         if (count($errors) > 0) {

    //             foreach ($errors as $error) {
    //                 echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
               
    //             }
                
         
    //         } else {

    //             $result = $this->UserModel->signup($fullName, $email);

    //             // Handle the result


    //             if ($result) {
    //                 // Registration successful, you can redirect or display a success message
    //                 echo '<div class="bg-green-500 rounded-xl text-white p-2 my-2">Registration successful!</div>';
    //             } else {
    //                 // Registration failed, handle accordingly
    //                 echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">Registration failed. Please try again.</div>';
    //             }
    //         }
    //     }

  
    // }}