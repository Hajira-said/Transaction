<?php

// Include the database connection class
include "connexion.php";

class User {
    private $db;
    
    public function __construct(){
        $this->db = new DatabaseConnection();
    }

    public function Add($data) {
        $data = json_decode($data, true);
        $nom = $data['NomUser'];
        $adresse = $data['Adresse'];
        $email = $data['Email'];
        $telephone = $data['Telephone'];
        $cryptPassword = md5($data['Password']);
        $role = $data['Role'];
        $query = "INSERT INTO utilisateur(nom,Roles, adresse, telephone, email, passwd) VALUES ('$nom','$role', '$adresse', $telephone, '$email', '$cryptPassword')";
        $res=$this->db->execute($query);
        if ($res) {
            echo "Données mises à jour avec succès.";
        } 
        else {
            echo "Erreur lors de la mise à jour des données : " . $this->connexion->error;
        }
    }

    public function Update($id, $data) {
        $data = json_decode($data, true);
        $nom = $data['NomUser'];
        $adresse = $data['Adresse'];
        $email = $data['Email'];
        $telephone = $data['Telephone'];
        $cryptPassword = md5($data['Password']);
        $role = $data['role'];
        $query = "UPDATE utilisateur SET nom = '$nom', adresse = '$adresse', email = '$email', telephone = '$telephone', passwd = '$cryptPassword',Roles='$role' WHERE id =$id ";
        $res=$this->db->execute($query);
        if ($res) {
            echo "Données mises à jour avec succès.";
        } 
        else {
            echo "Erreur lors de la mise à jour des données : " . $this->connexion->error;
        }
    }

    public function Delete($id) {
        $query = "UPDATE utilisateur SET del=1 WHERE id =$id ";
        $res=$this->db->execute($query);
        if ($res) {
            echo "Données mises à jour avec succès.";
        } 
        else {
            echo "Erreur lors de la mise à jour des données : " . $this->connexion->error;
        }
    }

    public function GetUser($id){
        $query = "SELECT * FROM utilisateur WHERE id=$id";
        $result = $this->db->execute($query);

        while ($row=$result->fetch_assoc()) {
            $User= [
                'id'=>$row['id'],
                'username'=>$row['nom'],
                'Roles'=>$row['Roles'],
                'Adresse'=>$row['adresse'],
                'telephone'=>$row['telephone'],
                'email'=>$row['email'],
                'passwd'=>$row['passwd']
            ];
        } 
        if($User==null){
            echo " il pas information ".$id;
        }
        else{
            return json_encode($User);
        }
        
    }
    public function All() {
        $query = "SELECT * FROM utilisateur WHERE del = 'false'";
        $result = $this->db->execute($query);

        while($row = $result->fetch_assoc()){
            // 
          echo ' 
            <tr>
                <td>'.$row['nom'].'</td>
                <td>'.$row['Roles'].'</td>
                <td>'.$row['adresse'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['passwd'].'</td>
                <td>'.$row['telephone'].'</td>
            <td class="d-flex justify-content-between"><span class=" updUser bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><span class=" delUser bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
          </tr>
            ';
        }  
}
public function SortOrderByAPlha(){
    $query="SELECT * FROM utilisateur WHERE del='false' ORDER BY nom ";
    $res=$this->db->execute($query);
    while($row = $res->fetch_assoc()){
        // 
      echo ' 
            <tr>
            <td scope="row">'.$row['nom'].'</td>
            <td>'.$row['Roles'].'</td>
            <td>'.$row['adresse'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['passwd'].'</td>
            <td>'.$row['telephone'].'</td>
            <td class="d-flex justify-content-between"><span class=" updUser bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><span class=" delUser bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
          </tr>
        ';
    }      
}
    
public function SortOrderByReverse(){
    $query="SELECT * FROM utilisateur WHERE del = 'false' ORDER BY nom DESC";
    $res=$this->db->execute($query);
    
    while($row = $res->fetch_assoc()){
        // 
      echo ' 
          <tr>
          <td scope="row">'.$row['nom'].'</td>
          <td>'.$row['Roles'].'</td>
          <td>'.$row['adresse'].'</td>
          <td>'.$row['email'].'</td>
          <td>'.$row['passwd'].'</td>
          <td>'.$row['telephone'].'</td>
          <td class="d-flex justify-content-between"><span class=" updUser bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><span class=" delUser bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
          </tr>
        ';
    }      
}

}





?>