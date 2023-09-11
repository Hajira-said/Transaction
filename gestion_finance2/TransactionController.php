<?php
include 'Transaction.php';
 
class TransactionController{
    private $trans;



    public  function __construct(){
      $this->trans=new Transaction();
    }
    public function Add($donnees){
        $this->trans->Add($donnees);
    }

    public function update($id,$donnees){
        $this->trans->Update($id,$donnees);
    }

    public function delete($id){
        $this->trans->delete($id);
    }
  

    public function all(){
      return $this->trans->all();
    }

    public function gettransaction($id){
        return $this->trans->gettransaction($id);
    }

    public function SortDateAscending(){
        return $this->trans->SortDateAscending();
    }

    public function SortDateDescending(){
        return $this->trans->SortDateDescending();
    }

    public function  SortMontantASC(){
        return $this->trans->SortMontantASC();
    }
    public function  SortMontantDSC(){
        return $this->trans->SortMontantDSC();
    }
    public function  SortOrderByAPlha(){
        return $this->trans->SortOrderByAPlha();
    }
    public function  SortOrderByReverse(){
        return $this->trans->SortOrderByReverse();
    }
    public function AllCategorie(){
        return $this->trans->GetAllCategory();
    }
    public function SoldeActuel(){
        return $this->trans->SoldeActuel();
    }
    public function Debit(){
        return $this->trans->Debit();
    }
    public function Credit(){
        return $this->trans->Credit();
    }
      public function Somme($date1,$date2){
        $this->trans->Somme($date1,$date2);
    }



}

$form = new TransactionController();
if($_GET['methode'] == 'add'){
    $form->add($_GET['dataa']);
}
if($_GET['methode'] == 'all'){
    $form->all();
}
if($_GET['methode'] == 'gettransaction'){
    echo $form->gettransaction($_GET['id']); 
}
if($_GET['methode'] == 'update'){
    $form->update($_GET['id'],$_GET['dataa']); 
}
if($_GET['methode'] == 'delete'){
    $form->delete($_GET['id']); 
}
if($_GET['methode'] == 'SortDateAscending'){
    $form-> SortDateAscending(); 
}
if($_GET['methode'] == 'SortDateDescending'){
    $form-> SortDateDescending(); 
}
if($_GET['methode'] == 'SortMontantASC'){
    $form-> SortMontantASC(); 
}
if($_GET['methode'] == 'SortMontantDSC'){
    $form-> SortMontantDSC(); 
}
if($_GET['methode'] == 'SortOrderByAPlha'){
    $form-> SortOrderByAPlha(); 
}
if($_GET['methode'] == 'SortOrderByReverse'){
    $form-> SortOrderByReverse(); 
}
if($_GET['methode'] == 'somme'){
    $form-> Somme($_GET['datedebut'],$_GET['datefin']); 
}if($_GET['methode'] == 'AllCategorie'){
    $form-> AllCategorie(); 
}
if($_GET['methode'] == 'Solde'){
   echo  $form-> SoldeActuel(); 
}
if($_GET['methode'] == 'Debit'){
   echo  $form-> Debit(); 
}
if($_GET['methode'] == 'Credit'){
    echo $form-> Credit(); 
}
?>