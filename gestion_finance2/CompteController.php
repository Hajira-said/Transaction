<?php
  require'compte.php';
  class CompteController{
    // les attributes
    private $compte;
    //  le constructer
     public function __construct(){
        return $this->compte = new Compte();
     }
    //  public fonction add
    public function Add($data){
       return $this->compte->Add($data);
    }
    //  public fonction update
    public function Update($id,$data){
        return $this->compte->Update($id,$data);
    }
    //  public fonction delete
    public function Delete($id){
       return  $this->compte->Delete($id);
    }
    //  public fonction recherche par un id
    public function GetCompte($id){
        return $this->compte->GetCompte($id);
    }
    //  public fonction afficher tous
    public function  All(){
       return  $this->compte-> All();
    }
    public function  SortOrderByAPlha(){
      return $this->compte->SortOrderByAPlha();
  }
  public function  SortOrderByReverse(){
      return $this->compte->SortOrderByReverse();
  }


}


$control = new CompteController();
if($_GET['methode'] == 'All'){
    $control->All();
}
if ($_GET['methode'] == 'GetCompte') {
   echo $control->GetCompte($_GET['id']);
}
if($_GET['methode']== 'Update'){
    echo $control->Update($_GET['id'],$_GET['dataa']);
}
if ($_GET['methode']== 'Delete') {
    echo $control->Delete($_GET['id']);
}
if ($_GET['methode'] == 'Add'){
    
    echo $control->Add($_GET['dataa']);

}
elseif($_GET['methode'] == 'SortOrderByAPlha'){
    $control-> SortOrderByAPlha(); 
}
elseif($_GET['methode'] == 'SortOrderByReverse'){
   $control-> SortOrderByReverse(); 
}

    



?>