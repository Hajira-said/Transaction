<?php
session_start();
class LoginController
{
    private $db;
    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->db = new mysqli("localhost", "root", "", "gestion");
        $this->email = $email;
        $this->password = $password;

        if ($this->db->connect_error) {
            die("La connexion à la base de données a échoué : " . $this->db->connect_error);
        }
    }

    public function select()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse e-mail n'est pas valide.";
        }else{ 
        $query = "SELECT * FROM utilisateur WHERE email='" . $this->email . "' and passwd='" . $this->password . "'";
        $result = $this->db->query($query);

        if ($result==true) {
            $res = $result->fetch_assoc();
            if ($res && $res['email'] == $this->email && $res['passwd'] == $this->password) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['fullname'] = $res['nom'];
                $_SESSION['role'] = $res['role'];
                $_SESSION['id'] = $res['id'];

               header('location:dashbord.php');
                // header('Location: dashboard.php');
                exit();
            } else {
                echo "Désolé, vos identifiants ne sont pas corrects!";
            }
        } else {
            echo "Désolé, une erreur s'est produite lors de la connexion.";
        }
    }}
}





?>
