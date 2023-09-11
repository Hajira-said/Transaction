<?php

class DatabaseConnection {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'gestion');
        if ($this->conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $this->conn->connect_error);
        }
    }

    public function execute($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Erreur d'exécution de la requête : " . $this->conn->error);
        }
        return $result;
    }
    public function real_escape_string($string) {
        return $this->conn->real_escape_string($string);
    }
    

    public function __destruct() {
        $this->conn->close();
    }
}

?>