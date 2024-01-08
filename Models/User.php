<?php
require_once 'database.php';


class User {

    private $idUser;
    private $nameUser;
    private $emailUser;
    private $pwdUser;
    private $db;

    public function __construct() {
        $this->db = DATABASE::getconnection();
    }

    public function __get($parametre){
        return $this->$parametre;
    }

    public function __set($parametre, $value){
        $this->$parametre = $value;
    }



}