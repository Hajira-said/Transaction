<?php
include 'connexion.php';
class Transaction{

  private $connexion;

        public function __construct(){
            $this->connexion=new DatabaseConnection();
           
        }
        public function Add($donnees){
            $tab= json_decode($donnees,true);
            $trans_description=$tab['description'];
            $quantite=$tab['quantite'];
            $trans_date=$tab['date'];
            $montant=$tab['Montant'];
            $trans_type=$tab['selectType'];
            $trans_destinateur=$tab['destinateur'];
            $type_categorie=$tab['selectcategorie'];
            $type_ccompte=$tab['selectCompte'];
            $query="INSERT INTO transaction (trans_description,quantite,trans_date,montant,trans_type,destinateur,categorie_id,compte_id) values('$trans_description','$quantite','$trans_date','$montant','$trans_type','$trans_destinateur','$type_categorie','$type_ccompte')";
            $res=$this->connexion->execute($query);
            if ($res) {
                 echo "Données  inserer avec succès.";
            }
            else {
                 echo "Erreur lors de l'insertion des données : " . $this->connexion->error;
            }
        } 
     
        public function Update($id,$donnees){
            $tab= json_decode($donnees,true);
            $trans_description=$tab['description'];
            $quantite=$tab['quantite'];
            $trans_date=$tab['date'];
            $montant=$tab['Montant'];
            $trans_type=$tab['selectType'];
            $destination=$tab['destinateur'];
            $type_categorie=$tab['selectcategorie'];
            $type_compte=$tab['selectCompte'];
            $query="UPDATE  transaction set trans_description='$trans_description'
            ,quantite='$quantite'
            ,montant='$montant'
            ,trans_date='$trans_date'
            ,trans_type='$trans_type',
            destinateur='$destination',
            categorie_id=$type_categorie,
            compte_id=$type_compte where id=$id";
            echo $query;
            $res=$this->connexion->execute($query);
            if ($res) {
                echo "Données mises à jour avec succès.";
            } 
            else {
                echo "Erreur lors de la mise à jour des données : " . $this->connexion->error;
            }
        } 
      
        public function Delete($id){
            $query="UPDATE  transaction set deleted='true' where id=$id";
            $res=$this->connexion->execute($query);
            if($res){
                echo 'le donnée est bien supprimer';
            }else{
                echo "Erreur lors de la suppression des données : " . $this->connexion->error;
            }
        } 
        public function All(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false'"; 
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                $montant=$row['quantite']*$row['montant'];
              echo ' 
                <tr>
                <td>'.$row['trans_date'].'</td>
                <td>'.$row['trans_description'].'</td>
                <td>'.$row['quantite'].'</td>
                <td>';
                if($row['trans_type']=='debit'){
                  echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                    echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                    echo'</td>
                     <td>'.$montant.'</td>
                <td>'.$row['destinateur'].'</td>
                <td>'.$row['nom'].'</td>
                <th scope="row">'.$row['trans_type'].'</th>
                <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
              </tr>
                ';
            }           
        }
        public function Debit(){
            $query="SELECT sum(montant) as debit from  transaction where trans_type='debit'";
            $res=$this->connexion->execute($query);
            if ($res) {
                $row = $res->fetch_assoc(); 
                $totaldebit = $row['debit']; 
                $res->close(); 
                
                return $totaldebit; 
            } else {
                return 0;
            }
        } 
        public function Credit() {
            $query = "SELECT SUM(montant) as total_credit FROM transaction WHERE trans_type='credit'";
            $res = $this->connexion->execute($query); 
            
            if ($res) {    
                $row = $res->fetch_assoc(); 
                $totalCredit = $row['total_credit']; 
                $res->close(); 
                
                return $totalCredit; 
            } else {
                return 0;
            }
        }
        
        
        public function SoldeActuel(){
            $query = "SELECT SUM(solde) as solde FROM compte";
            $res = $this->connexion->execute($query);
            if ($res) {
                $row = $res->fetch_assoc(); 
                $solde = $row['solde']; 
                $res->close(); 
                
                return $solde; 
            } else {
                return 0;
            }
        } 
        public function FindCredit($date1, $date2) {
            $date1 = $this->connexion->real_escape_string($date1);
            $date2 = $this->connexion->real_escape_string($date2);
            $query = "SELECT quantite,montant  FROM transaction WHERE trans_type='credit' and trans_date BETWEEN '$date1' and '$date2'";
            $res = $this->connexion->execute($query); 
            $totalCredit=0;
            if ($res) {    
                while($row = $res->fetch_assoc()){
                    $quantite = $row['quantite']; 
                    $montant=$row['montant'];
                    $totalCredit=$totalCredit+($quantite*$montant);
                   }
                $res->close(); 
        
                return $totalCredit; 
            } else {
                return 0;
            }
        }
        
        public function FindDebit($date1, $date2){
            $date1 = $this->connexion->real_escape_string($date1);
            $date2 = $this->connexion->real_escape_string($date2);
            $query = "SELECT quantite,montant FROM transaction WHERE trans_type='debit' and trans_date BETWEEN '$date1' and '$date2'";
            $res = $this->connexion->execute($query);
            $totaldebit=0;
            if ($res) {
                while($row = $res->fetch_assoc()){
                    $quantite = $row['quantite']; 
                    $montant=$row['montant'];
                    $totaldebit=$totaldebit+($quantite*$montant);
                   }
                $res->close(); 
        
                return $totaldebit; 
            } else {
                return 0;
            }
        } 
        
        public function Somme($date1, $date2){
            $credit = $this->FindCredit($date1, $date2);
            $debit = $this->FindDebit($date1, $date2);
            $result = $debit - $credit;
            echo $result;
        }
        
        public function GetTransaction($id){
            $query="SELECT * FROM transaction where id=$id";
            $res=$this->connexion->execute($query);
             
            $transaction=array();
            while($row = $res->fetch_assoc()){
                $transaction = [
                    'id'=> $row['id'],
                    'trans_description'=> $row['trans_description'],
                    'quantite'=>$row['quantite'],
                    'trans_date'=> $row['trans_date'],
                    'montant'=> $row['montant'],
                    'trans_type'=> $row['trans_type'],
                    'trans_categorie'=> $row['categorie_id'],
                    'trans_compte'=> $row['compte_id'],
                    'destination'=> $row['destinateur']
                ];
            }
            if($transaction==null){
                echo " il ya pas une ligne pour le numero ".$id;
            }
            else{
                return json_encode($transaction);
            }
        }
        
        
        public function SortDateAscending(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false' ORDER BY  trans_date ASC";
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                // 
              echo ' 
                  <tr>
                  <th scope="row">'.$row['trans_type'].'</th>
                  <td>';
                  if($row['trans_type']=='debit'){
                    echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                      echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                      echo'</td>
                  <td>'.$row['trans_description'].'</td>
                  <td>'.$row['quantite'].'</td>
                  <td>'.$row['trans_date'].'</td>
                  <td>'.$row['destinateur'].'</td>
                  <td>'.$row['nom'].'</td>
                  <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                </tr>
                ';
            }      
        }
            
        public function SortDateDescending(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false' ORDER BY  trans_date DESC";
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                // 
              echo ' 
                  <tr>
                  <th scope="row">'.$row['trans_type'].'</th>
                  <td>';
                  if($row['trans_type']=='debit'){
                    echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                      echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                      echo'</td>
                  <td>'.$row['trans_description'].'</td>
                  <td>'.$row['quantite'].'</td>
                  <td>'.$row['trans_date'].'</td>
                  <td>'.$row['destinateur'].'</td>
                  <td>'.$row['nom'].'</td>
                  <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                </tr>
                ';
            }      
        }
        public function SortMontantASC(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false' ORDER BY montant ASC";
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                // 
              echo ' 
                  <tr>
                  <th scope="row">'.$row['trans_type'].'</th>
                  <td>';
                  if($row['trans_type']=='debit'){
                    echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                      echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                      echo'</td>
                  <td>'.$row['trans_description'].'</td>
                  <td>'.$row['quantite'].'</td>
                  <td>'.$row['trans_date'].'</td>
                  <td>'.$row['destinateur'].'</td>
                  <td>'.$row['nom'].'</td>
                  <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                </tr>
                ';
            }      
        }
            
        public function SortMontantDSC(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false' ORDER BY montant DESC";
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                // 
              echo ' 
                  <tr>
                  <th scope="row">'.$row['trans_type'].'</th>
                  <td>';
                  if($row['trans_type']=='debit'){
                    echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                      echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                      echo'</td>
                  <td>'.$row['trans_description'].'</td>
                  <td>'.$row['quantite'].'</td>
                  <td>'.$row['trans_date'].'</td>
                  <td>'.$row['destinateur'].'</td>
                  <td>'.$row['nom'].'</td>
                  <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                </tr>
                ';
            }      
        }
        public function SortOrderByAPlha(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false' ORDER BY c.nom;
            ";
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                // 
              echo ' 
                    <tr>
                    <th scope="row">'.$row['trans_type'].'</th>
                    <td>';
                    if($row['trans_type']=='debit'){
                      echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                        echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                        echo'</td>
                    <td>'.$row['trans_description'].'</td>
                    <td>'.$row['quantite'].'</td>
                    <td>'.$row['trans_date'].'</td>
                    <td>'.$row['destinateur'].'</td>
                    <td>'.$row['nom'].'</td>
                    <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                  </tr>
                ';
            }      
        }
            
        public function SortOrderByReverse(){
            $query="SELECT t.*,c.nom as nom FROM transaction t,categorie c WHERE c.id=t.categorie_id and deleted = 'false' ORDER BY c.nom DESC;
            ";
            $res=$this->connexion->execute($query);
            
            while($row = $res->fetch_assoc()){
                // 
              echo ' 
                  <tr>
                  <th scope="row">'.$row['trans_type'].'</th>
                  <td>';
                  if($row['trans_type']=='debit'){
                    echo'<span class="badge bg-success text-white">'.$row['montant'].'</span>';}else{
                      echo'<span class="badge bg-danger text-white">'.$row['montant'].'</span>';}
                      echo'</td>
                  <td>'.$row['trans_description'].'</td>
                  <td>'.$row['quantite'].'</td>
                  <td>'.$row['trans_date'].'</td>
                  <td>'.$row['destinateur'].'</td>
                  <td>'.$row['nom'].'</td>
                  <td class="d-flex justify-content-between"><span class=" update bi bi-pencil-square text-primary" data-id="'.$row['id'].'"> </span><input type="hidden"  value="'.$row['id'].'"> <span class=" delete bi bi-trash-fill text-danger" data-id="'.$row['id'].'"></span></td>
                </tr>
                ';
            }      
        }
        
        public function GetAllCategory(){
            $query = "SELECT id, nom FROM categorie ";
  
            $res = $this->connexion->execute($query);
            $cat= array();
          
            while($row = $res->fetch_assoc()){
              echo'   
               <div class="col-sm-5 " style="height: 500px;  overflow-y: auto; overflow-x:hidden">
                <div class="card">
                 <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="card-title mb-0">'.$row['nom'].':</h5>
                  <i class="bi bi-list"></i>
                </div>
            
                 
                <!-- Ventes Table -->
                <table class="table table-hover" >
                  <thead>
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Description</th>
                      <th scope="col">Montant</th>
                      <th scope="col">Date</th>
                      <th scope="col">Destinateur</th>
                    </tr>
                  </thead>
                  </table>
                  <div style="height: 300px;  overflow-y: auto; overflow-x:hidden">
                  <table class="table table-hover" > 
                  <tbody >
  ';
                $query2 = "SELECT trans_type, montant, trans_description, trans_date, destinateur FROM transaction t WHERE deleted='false' AND t.categorie_id =".$row['id']." ";
  
                $res2 = $this->connexion->execute($query2);
                
                while($l = $res2->fetch_assoc()){
                  echo'
                  <tr>
                  <td><strong>'.$l['trans_type'].'</strong></td>
                  <td>'. $l['trans_description'].'</td>
                  <td>';if($l['trans_type']=='debit'){ echo'<span class="badge text-bg-success">'. $l['montant'].'FDJ</span>';
                  } else { echo '<span class="badge text-bg-danger">-'.$l['montant'].' FDJ</span>'; }echo '</td>
                  <td>'. $l['trans_date'].'</td>
                  <td>'. $l['destinateur'].'</td>
                </tr> ';
                }
  
            echo' 
             </tbody>
             </table>
             </div>
          
            <!-- End Ventes Tables -->
            <div class="d-flex justify-content-end">
              <a href="addtransaction.php" class="">Voir plus</a>
            </div>
          </div>
         </div></div>';
            }
            
          
          
  }
            
        
}
?>