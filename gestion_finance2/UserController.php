<?php

// Include the User model class
include "User.php";

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User(); 
    }

    public function ajouter($data) {
        
        $this->userModel->Add($data);
    }

    public function modifier($id, $data) {
        
        $this->userModel->Update($id, $data);
    }

    public function supprimer($id) {
        
        $this->userModel->Delete($id);
    }

    public function recherche($id) {
        
        return $this->userModel->GetUser($id);
    }

    public function afficherTout() {
        
        return $this->userModel->All();
    }
    public function  SortOrderByAPlha(){
        return $this->userModel->SortOrderByAPlha();
    }
    public function  SortOrderByReverse(){
        return $this->userModel->SortOrderByReverse();
    }
}

$control = new UserController();

if ($_GET['methode'] == 'afficherTout'){
    
    $control->afficherTout();
}
elseif($_GET['methode']== 'modifier'){
    $control->modifier($_GET['id'],$_GET['dataa']);
}
elseif ($_GET['methode']== 'supprimer') {
    $control->supprimer($_GET['id']);
}
elseif ($_GET['methode']=='recherche') {
    echo $control->recherche($_GET['id']);
}
else if($_GET['methode']== 'ajouter'){
    echo $control->ajouter($_GET['dataa']);
} elseif($_GET['methode'] == 'SortOrderByAPlha'){
    $control-> SortOrderByAPlha(); 
}
elseif($_GET['methode'] == 'SortOrderByReverse'){
    $control-> SortOrderByReverse(); 
}


?>