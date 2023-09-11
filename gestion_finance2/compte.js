// activer le button modifie
function enableCompteBtn() {
    document.getElementById("updcompte").disabled = false;
  }
  // desactiver le button modifie
  function disableCompteBtn() {
    document.getElementById("updcompte").disabled = true;
  }
  // activer le button envoyer
  function enableSubmitCBtn() {
    document.getElementById("submitcompte").disabled = false;
  }
  // desactiver le button envoyer
  function disableSubmitCBtn() {
    document.getElementById("submitcompte").disabled = true;
  }
  
  
  // fonction afficher users
  function AfficherCompte(){
    let tbody = document.getElementById('tbodycompte');
    var xhttps = new XMLHttpRequest();
                xhttps.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    tbody.innerHTML=this.responseText;
                    // console.log(this.responseText);
                  }
                };
                xhttps.open("GET","CompteController.php?methode=All", true);
                xhttps.send();
  }
 
  
  // variable global pour enregistre et recupere le id qui se trouve dans la fonction modifier.
  let idcompte;
  // fonction modifier transaction
  function modifierCompte(){
    
  // fonction update 
  
  let delid;
    setTimeout(function() {
      let delCompter = document.querySelectorAll('.delCompter');
      let updcompte = document.querySelectorAll('.updcompte'); 
      // le bouton recupere les information  transactions
         updcompte.forEach((updateButton) => {
                updateButton.addEventListener('click', (event) => {
                  window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                    let id = event.target.getAttribute('data-id');
                    idcompte = parseInt(id);
                    
                    // console.log("ID pour la modification :" +id);
                    
                    var XHttps = new XMLHttpRequest();
                    XHttps.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        let tabupdate=this.responseText;
                        // console.log(tabupdate);
                        let tabupdateParse = JSON.parse(tabupdate);
                        let name = document.getElementById('name');
                        let Typecompte = document.getElementById('Typecompte');
                        let Solde = document.getElementById('Solde');
                        name.value = tabupdateParse.name;
                        Typecompte.value = tabupdateParse.types;
                        Solde.value = tabupdateParse.solde;
                        enableCompteBtn();
                        disableSubmitCBtn();
                        
                        // console.log(tabupdateParse.trans_type);
                      }
                      
                    };
                    XHttps.open("GET","CompteController.php?methode=GetCompte"+"&id="+id, true);
                    XHttps.send();
  
                });
            });
            // le bouton supprimer transaction
            delCompter.forEach((deleteButton) => {
                deleteButton.addEventListener('click', (event) => {
                    let id = event.target.getAttribute('data-id');
                    delid = parseInt(id);
                    // console.log("ID pour la suppression :", id);
                    DelUser(delid);
                });
            });
            return idcompte;
        }, 1000); // 1000 millisecondes (1 seconde)
        
  }
  
  
  // fonction updatecompteshow permert d'afficher user
  function updateCompteshow(){
    
    setTimeout(function(){
      AfficherCompte();
      modifierCompte();
     
     },500); 
  }
  updateCompteshow();
//    Attacher un écouteur d'événement au bouton updatecompte 
   let updateBtncompter = document.getElementById('updcompte');
   updateBtncompter.addEventListener("click", function() {
       updatecompte(idcompte);  // Appeler la fonction avec idss comme argument
       enableSubmitCBtn();
       disableCompteBtn();
      //fonction d'affichage
   });

// //    le bouton trier start
// let userbtn = document.getElementById('userbtn');
// userbtn.addEventListener('click',()=>{
    
// })
  
  
  // deleted user start
  function DelUser(delid){
    var xhttps = new XMLHttpRequest();
                  xhttps.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    //  console.log(this.responseText);
                     AfficherCompte();
                     modifierCompte();
                    }
                  };
                  xhttps.open("GET","CompteController.php?methode=Delete"+"&id="+delid, true);
                  xhttps.send();
                  
   }
  
  // fonction ajouter user
  function InsertCompte(){
    // recuperation les values
    let name = document.getElementById('name');
    let Typecompte = document.getElementById('Typecompte');
    let Solde = document.getElementById('Solde');
        if (name.value!='' && Typecompte.value!='' && Solde.value!='') {
            let dataa = {
                name:name.value,
                Typecompte:Typecompte.value,
                Solde:Solde.value,
            }
            let datajsons = JSON.stringify(dataa);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.responseText) {
                  AfficherCompte();
                  modifierCompte();
                }
              }
            };
            xhttp.open("GET","CompteController.php?methode=Add&dataa="+datajsons, true);
            xhttp.send();
           
  
        }else{
            alert('veuillez remplire le champs vide')
        }
        name.value='';
        Typecompte.value='';
        Solde.value='';
        
  }
  
  // fonction update user
  function updatecompte(idcompte){
      // recuperation les values
            let name = document.getElementById('name');
            let Typecompte = document.getElementById('Typecompte');
            let Solde = document.getElementById('Solde');
              let dataa = {
                name:name.value,
                Typecompte:Typecompte.value,
                Solde:Solde.value,
                
              }
              let datajsons = JSON.stringify(dataa);
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                //   if(this.responseText){
                    AfficherCompte();
                    modifierCompte();
                //   };
                  
  
                }
              };
              xhttp.open("GET","CompteController.php?methode=Update"+"&id="+idcompte+"&dataa="+datajsons, true);
              xhttp.send();
              
  
              // console.log(datajsons);
              name.value='';
              Typecompte.value='';
              Solde.value='';
              
              
          }