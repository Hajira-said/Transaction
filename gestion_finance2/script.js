
// activer le button modifie
function enableButton() {
    document.getElementById("upd").disabled = false;
}
// desactiver le button modifie
function disableButton() {
    document.getElementById("upd").disabled = true;
}
// activer le button envoyer
function enableButtonSubmit() {
    document.getElementById("submit").disabled = false;
}
// desactiver le button envoyer
function disableButtonSumit() {
    document.getElementById("submit").disabled = true;
}
// transaction page manipulation start

// afficher les comptes sur la balise select
let select = document.getElementById('selectCompte');
var Xhttps = new XMLHttpRequest();
            Xhttps.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                select.innerHTML=this.responseText;
              }
            };
            Xhttps.open("GET","CompteController.php?methode=all", true);
            Xhttps.send();



// fonction Delete transaction
//Aficher transaction
function Afficher(){

  let tbody = document.getElementById('tbody');
    var xhttps = new XMLHttpRequest();
                xhttps.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    tbody.innerHTML=this.responseText;
                  }
                };
                xhttps.open("GET","TransactionController.php?methode=all", true);
                xhttps.send();
                
}


 // Fonction pour trier par Date Asc
 function AfficherparDateA() {
  let tbody = document.getElementById('tbody');
  var xhttps = new XMLHttpRequest();
  xhttps.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          tbody.innerHTML = this.responseText;
          modifier();
      }
  };
  xhttps.open("GET", "TransactionController.php?methode=SortDateAscending", true);
  xhttps.send();
}

// Fonction pour trier par Date Desc
function AfficherparDateD() {
  let tbody = document.getElementById('tbody');
  var xhttps = new XMLHttpRequest();
  xhttps.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          tbody.innerHTML = this.responseText;
          modifier();
      }
  };
  xhttps.open("GET", "TransactionController.php?methode=SortDateDescending", true);
  xhttps.send();
}

// Fonction pour trier par Montant Asc
function AfficherparMontantASC() {
  let tbody = document.getElementById('tbody');
  var xhttps = new XMLHttpRequest();
  xhttps.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          tbody.innerHTML = this.responseText;
          modifier();
      }
  };
  xhttps.open("GET", "TransactionController.php?methode=SortMontantASC", true);
  xhttps.send();
}

// Fonction pour trier par Montant Desc
function AfficherparMontantDESC() {
  let tbody = document.getElementById('tbody');
  var xhttps = new XMLHttpRequest();
  xhttps.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          tbody.innerHTML = this.responseText;
          modifier();
      }
  };
  xhttps.open("GET", "TransactionController.php?methode=SortMontantDSC", true);
  xhttps.send();
}

// Fonction pour trier par Categorie Asc
function AfficherparCategorieASC() {
  let tbody = document.getElementById('tbody');
  var xhttps = new XMLHttpRequest();
  xhttps.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          tbody.innerHTML = this.responseText;
          modifier();
      }
  };
  xhttps.open("GET", "TransactionController.php?methode=SortOrderByAPlha", true);
  xhttps.send();
}

// Fonction pour trier par Categorie Desc
function AfficherparCategorieDes() {
  let tbody = document.getElementById('tbody');
  // Vous devez décommenter ces lignes lorsque le code de cette fonction sera prêt.
  var xhttps = new XMLHttpRequest();
  xhttps.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
          tbody.innerHTML = this.responseText;
          modifier();
      }
  };
  xhttps.open("GET", "TransactionController.php?methode=SortOrderByReverse", true);
  xhttps.send();
}

// Gestionnaire d'événements pour le bouton Trie
let boutonTrie = document.getElementById('btn');
boutonTrie.addEventListener("click", function () {
  const selectTrie = document.getElementById('trie');
  const triSelectionne = selectTrie.value;
  if (triSelectionne == '1') {
      AfficherparCategorieASC();
  } else if (triSelectionne == '2') {
      AfficherparCategorieDes();

  } else if (triSelectionne == '3') {
      AfficherparDateA();

  } else if (triSelectionne == '4') {
      AfficherparDateD();

  } else if (triSelectionne == '5') {
      AfficherparMontantASC();

  } else if (triSelectionne == '6') {
      AfficherparMontantDESC();
  }
});


// Autres fonctions et gestionnaires d'événements ici...

// variable global pour enregistre et recupere le id qui se trouve dans la fonction modifier.
let idss;
// fonction modifier transaction
function modifier(){
  
// fonction update 

let delid;
  setTimeout(function() {
    let deleteButtons = document.querySelectorAll('.delete');
    let updateButtons = document.querySelectorAll('.update'); 
    // le bouton recupere les information  transactions
          updateButtons.forEach((updateButton) => {
              updateButton.addEventListener('click', (event) => {
                window.scrollTo({
                  top: 0,
                  behavior: 'smooth'
              });
                  let id = event.target.getAttribute('data-id');
                  idss = parseInt(id);
                  
                  // console.log("ID pour la modification :" +id);
                  
                  var XHttps = new XMLHttpRequest();
                  XHttps.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      let tabupdate=this.responseText;
                      let tabupdateParse =JSON.parse(tabupdate);
                      let descrip = document.getElementById('description');
                      let quantite = document.getElementById('quantite');
                      let Montant = document.getElementById('montant');
                      let destinateur = document.getElementById('destinateur');
                      let selectType = document.getElementById('selectType');
                      let selectcategorie = document.getElementById('selectcategorie');
                      let selectCompte = document.getElementById('selectCompte');
                      let date = document.getElementById('date');
                      descrip.value = tabupdateParse.trans_description;
                      quantite.value = tabupdateParse.quantite;
                      console.log(tabupdateParse.quantite)
                      Montant.value = tabupdateParse.montant;
                      destinateur.value = tabupdateParse.destination;
                      selectType.value = tabupdateParse.trans_type;
                      date.value = tabupdateParse.trans_date;
                      selectcategorie.value = tabupdateParse.trans_categorie;
                      selectCompte.value = tabupdateParse.trans_compte;
                      enableButton();
                      disableButtonSumit();
                      
                      // console.log(tabupdateParse.trans_type);
                    }
                    
                  };
                  XHttps.open("GET","TransactionController.php?methode=gettransaction"+"&id="+id, true);
                  XHttps.send();

              });
          });
          // le bouton supprimer transaction
          deleteButtons.forEach((deleteButton) => {
              deleteButton.addEventListener('click', (event) => {
                  let id = event.target.getAttribute('data-id');
                  delid = parseInt(id);
                  // console.log("ID pour la suppression :", id);
                  DelTrans(delid);
              });
          });
          return idss;
      }, 1000); // 1000 millisecondes (1 seconde)
      
}

function updateshow(){
  
  setTimeout(function(){
    Afficher();
    modifier();
   
   },500); 
}
updateshow();

    // Attacher un écouteur d'événement au bouton updatebnt
    let updatebnt = document.getElementById('upd');
    updatebnt.addEventListener("click", function() {
        updateTransaction(idss);  // Appeler la fonction avec idss comme argument
        enableButtonSubmit();
        disableButton();
       //fonction d'affichage
    });
      

// x

// deleted transaction start
 function DelTrans(delid){
  var xhttps = new XMLHttpRequest();
                xhttps.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                   console.log(this.responseText);
                   Afficher();
                   modifier();
                  }
                };
                xhttps.open("GET","TransactionController.php?methode=delete"+"&id="+delid, true);
                xhttps.send();
                
 }



// fonction ajouter transaction
function InsertTransaction(){
    // recuperation les values
        let descrip = document.getElementById('description');
        let quantite = document.getElementById('quantite');
        let Montant = document.getElementById('montant');
        let destinateur = document.getElementById('destinateur');
        let selectType = document.getElementById('selectType');
        let selectcategorie = document.getElementById('selectcategorie');
        let selectCompte = document.getElementById('selectCompte');
        let date = document.getElementById('date');
        if (descrip.value!='' && Montant.value!='' && date.value!='' && destinateur.value!='') {
            let dataa = {
                description:descrip.value,
                quantite:quantite.value,
                Montant:Montant.value,
                date:date.value,
                selectType:selectType.value,
                selectcategorie:selectcategorie.value,
                selectCompte:selectCompte.value,
                destinateur:destinateur.value
            
            }
            let datajsons = JSON.stringify(dataa);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.responseText) {
                  Afficher();
                  modifier();
                }
              }
            };
            xhttp.open("GET","TransactionController.php?methode=add&dataa="+datajsons, true);
            xhttp.send();
           

        }else{
            alert('veuillez remplire le champs vide')
        }
        descrip.value='';
         quantite.value='';
        Montant.value='';
        date.value='' ;
        destinateur.value='';
        
}
// fonction update transaction
function updateTransaction(idss){
  console.log(idss);
    // recuperation les values
        let descrip = document.getElementById('description');
        let quantite = document.getElementById('quantite');
        let Montant = document.getElementById('montant');
        let destinateur = document.getElementById('destinateur');
        let selectType = document.getElementById('selectType');
        let selectcategorie = document.getElementById('selectcategorie');
        let selectCompte = document.getElementById('selectCompte');
        let date = document.getElementById('date');
            let dataa = {
                description:descrip.value,
                quantite:quantite.value,
                Montant:Montant.value,
                date:date.value,
                selectType:selectType.value,
                selectcategorie:selectcategorie.value,
                selectCompte:selectCompte.value,
                destinateur:destinateur.value
            
            }
            let datajsons = JSON.stringify(dataa);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                Afficher();
                modifier();

              }
            };
            xhttp.open("GET","TransactionController.php?methode=update"+"&id="+idss+"&dataa="+datajsons, true);
            xhttp.send();
            

            // console.log(datajsons);
            descrip.value='';
            quantite.value='';
            Montant.value='';
            date.value='' ;
            destinateur.value='';
            
            
        }
// // table mise a jour
      
      
       



// transaction page manipulation end