<?php
  require'connexion.php';
  class Compte{
    // les attributes
  
     private $db;
    //  le constructer
     public function __construct(){
        $this->db = new DatabaseConnection ();
     }
    /**
     * interaction avec le base donne
     */

    //  la fonction add
    public function Add($statement) {
        $data = json_decode($statement,true);
        $nom = $data['name'];
        $type = $data['Typecompte'];
        $solde = $data['Solde'];
        // $columns = implode(", ", array_keys($statement)); // Utilisation de implode avec les clés du tableau
        // $values = "'" . implode("', '", array_values($statement)) . "'"; // Utilisation de implode avec les valeurs du tableau
    
        $req = "INSERT INTO compte (nom,type,solde) VALUES ('$nom','$type',$solde)"; // Correction de la requête SQL
        $result = $this->db-> execute($req);
    
        if ($result) { // Utilisation de === pour la comparaison
            return 'Bien enregistré';
        } else {
            return 'Erreur : ' . $this->db->error;
        }
    }
    
    // la fonction modifier
    public function Update($id, $statement) {
        // $updates = array();
        // foreach ($statement as $column => $value) {
        //     $updates[] = "$column = '$value'";
        // }
        // $updates = implode(", ", $updates);
        $data = json_decode($statement,true);
        $nom = $data['name'];
        $type = $data['Typecompte'];
        $solde = $data['Solde'];
    
        $req = "UPDATE compte SET nom = '$nom', type='$type',solde=$solde  WHERE id = $id"; 
        $result = $this->db-> execute($req);
    
        if ($result === true) {
            return 'Mise à jour réussie';
        } else {
            return 'Erreur : ' . $this->db->error;
        }
    }


    // la fonction delete
    public function Delete($id) {
        $req = "UPDATE compte SET delcompte='true' WHERE id =$id"; 
        $result = $this->db-> execute($req);
    
        if ($result === true) {
            return 'Suppression réussie';
        } else {
            return 'Erreur : ' . $this->db->error;
        }
    }

    // la fonction afficher par id
    public function GetCompte($id) {
        $req = "SELECT * FROM compte WHERE id = $id"; 
        $result = $this->db->execute($req);
        while ($row=$result->fetch_assoc()) {
            $compter= [
                'id'=>$row['id'],
                'name'=>$row['nom'],
                'types'=>$row['type'],
                'solde'=>$row['solde']
            ];
        } 
        if($compter==null){
            echo " il pas information ".$id;
        }
        else{
            return json_encode($compter);
        }
    }
    // la fonction afficher all
    public function All() {
        $req = "SELECT * FROM compte WHERE delcompte = 'false'";
        $result =$this->db->execute($req);
        while ($row = $result->fetch_assoc()) {
                echo '
                <tr>
                <td>'.$row['nom'].'</td>
                <td>'.$row['type'].'</td>
                <td>'.$row['solde'].'</td>
                <td class="d-flex justify-content-between"><span class=" updcompte bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><span class=" delCompter bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
          </tr>
                ';
            }

    }
    public function SortOrderByAPlha(){
        $query="SELECT * FROM compte WHERE delcompte='false' ORDER BY nom ";
        $res=$this->db->execute($query);
        while($row = $res->fetch_assoc()){
            // 
          echo ' 
                <tr>
                <td scope="row">'.$row['nom'].'</td>
                <td>'.$row['type'].'</td>
                <td>'.$row['solde'].'</td>
                <td class="d-flex justify-content-between"><span class=" updcompte bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><span class=" delCompter bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                </tr>
            ';
        }      
    }
        
    public function SortOrderByReverse(){
        $query="SELECT * FROM compte WHERE delcompte = 'false' ORDER BY nom DESC";
        $res=$this->db->execute($query);
        
        while($row = $res->fetch_assoc()){
            // 
          echo ' 
              <tr>
              <td scope="row">'.$row['nom'].'</td>
              <td>'.$row['type'].'</td>
              <td>'.$row['solde'].'</td>
              <td class="d-flex justify-content-between"><span class=" updcompte bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><span class=" delCompter bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
              </tr>
            ';
        }      
    }
    

/**
 * interaction fini
 */

        // getter dbname
    public function GetDbName(){
        return $this->id;
    }
    // setter dbname
    public function SetDbName($a){
        $this->id = $a;
    }
    // getter dbuser
    public function GetDbUser(){
        return $this->nom;
    }
    // setter dbuser
    public function SetDbUser($a){
        $this->nom = $a;
    }
    // getter dbpass
    public function GetDbPass(){
        return $this->type;
    }
    // setter dbpass
    public function SetDbPass($a){
        $this->type = $a;
    }
    // getter dbhost
    public function GetDbHost(){
        return $this->sold;
    }
    // setter dbhost
    public function SetDbHost($a){
        $this->sold = $a;
    }

  }


// utilise les fonction comme api



?>