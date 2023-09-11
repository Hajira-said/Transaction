// activer le button modifie
function enableUserBtn() {
    document.getElementById("upduser").disabled = false;
  }
  // desactiver le button modifie
  function disableUserBtn() {
    document.getElementById("upduser").disabled = true;
  }
  // activer le button envoyer
  function enableSubmitBtn() {
    document.getElementById("submituser").disabled = false;
  }
  // desactiver le button envoyer
  function disableSubmitBtn() {
    document.getElementById("submituser").disabled = true;
  }
  
  
  // fonction afficher users
  function AfficherUser(){
    let tbody = document.getElementById('tbodyUser');
    var xhttps = new XMLHttpRequest();
                xhttps.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    tbody.innerHTML=this.responseText;
                  }
                };
                xhttps.open("GET","UserController.php?methode=afficherTout", true);
                xhttps.send();
  }
  
  // variable global pour enregistre et recupere le id qui se trouve dans la fonction modifier.
  let idUser;
  // fonction modifier transaction
  function modifierUser(){
    
  // fonction update 
  
  let delid;
    setTimeout(function() {
      let DelUsers = document.querySelectorAll('.delUser');
      let UpdUser = document.querySelectorAll('.updUser'); 
      // le bouton recupere les information  transactions
         UpdUser.forEach((updateButton) => {
                updateButton.addEventListener('click', (event) => {
                  window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                    let id = event.target.getAttribute('data-id');
                    idUser = parseInt(id);
                    
                    // console.log("ID pour la modification :" +id);
                    
                    var XHttps = new XMLHttpRequest();
                    XHttps.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                        let tabupdate=this.responseText;
                        // console.log(tabupdate);
                        let tabupdateParse = JSON.parse(tabupdate);
                        let NomUser = document.getElementById('NomUser');
                        let Adresse = document.getElementById('Adresse');
                        let Email = document.getElementById('Email');
                        let Password = document.getElementById('Password');
                        let role = document.getElementById('Grade');
                        let Telephone = document.getElementById('Telephone');
                        Adresse.value = tabupdateParse.Adresse;
                        NomUser.value = tabupdateParse.username;
                        Email.value = tabupdateParse.email;
                        Password.value = tabupdateParse.passwd;
                        role.value = tabupdateParse.Roles;
                        Telephone.value = tabupdateParse.telephone;
                        enableUserBtn();
                        disableSubmitBtn();
                        
                        // console.log(tabupdateParse.trans_type);
                      }
                      
                    };
                    XHttps.open("GET","UserController.php?methode=recherche"+"&id="+id, true);
                    XHttps.send();
  
                });
            });
            // le bouton supprimer transaction
            DelUsers.forEach((deleteButton) => {
                deleteButton.addEventListener('click', (event) => {
                    let id = event.target.getAttribute('data-id');
                    delid = parseInt(id);
                    // console.log("ID pour la suppression :", id);
                    DelUser(delid);
                });
            });
            return idUser;
        }, 1000); // 1000 millisecondes (1 seconde)
        
  }
  
  
  // fonction updateusershow permert d'afficher user
  function updateUsershow(){
    
    setTimeout(function(){
      AfficherUser();
      modifierUser();
     
     },500); 
  }
  updateUsershow();
//    Attacher un écouteur d'événement au bouton updateuser 
   let updateBtnuser = document.getElementById('upduser');
   updateBtnuser.addEventListener("click", function() {
       updateUser(idUser);  // Appeler la fonction avec idss comme argument
       enableSubmitBtn();
       disableUserBtn();
      //fonction d'affichage
   });

//    le bouton trier start
let userbtn = document.getElementById('userbtn');
userbtn.addEventListener('click',()=>{
    
})
  
  
  // deleted user start
  function DelUser(delid){
    var xhttps = new XMLHttpRequest();
                  xhttps.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                     console.log(this.responseText);
                     AfficherUser();
                     modifierUser();
                    }
                  };
                  xhttps.open("GET","UserController.php?methode=supprimer"+"&id="+delid, true);
                  xhttps.send();
                  
   }
  
  // fonction ajouter user
  function InsertUser(){
    // recuperation les values
        let NomUser = document.getElementById('NomUser');
        let Adresse = document.getElementById('Adresse');
        let Email = document.getElementById('Email');
        let Password = document.getElementById('Password');
        let Role = document.getElementById('Grade');
        let Telephone = document.getElementById('Telephone');
        if (NomUser.value!='' && Adresse.value!='' && Email.value!='' && Password.value!='' && Telephone.value!='') {
            let dataa = {
                NomUser:NomUser.value,
                Adresse:Adresse.value,
                Email:Email.value,
                Password:Password.value,
                Role:Role.value,
                Telephone:Telephone.value,
            }
            let datajsons = JSON.stringify(dataa);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.responseText) {
                  AfficherUser();
                  modifierUser();
                }
              }
            };
            xhttp.open("GET","UserController.php?methode=ajouter&dataa="+datajsons, true);
            xhttp.send();
           
  
        }else{
            alert('veuillez remplire le champs vide')
        }
        NomUser.value='';
        Adresse.value='';
        Email.value='';
        Password.value='' ;
        Telephone.value='';
        
  }
  
  // fonction update user
  function updateUser(idUser){
      // recuperation les values
            let NomUser = document.getElementById('NomUser');
            let Adresse = document.getElementById('Adresse');
            let Email = document.getElementById('Email');
            let Password = document.getElementById('Password');
            let role = document.getElementById('Grade');
            let Telephone = document.getElementById('Telephone');
              let dataa = {
                NomUser:NomUser.value,
                Adresse:Adresse.value,
                Email:Email.value,
                Password:Password.value,
                role:role.value,
                Telephone:Telephone.value,
                
              }
              let datajsons = JSON.stringify(dataa);
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                //   if(this.responseText){
                    AfficherUser();
                    modifierUser();
                //   };
                  
  
                }
              };
              xhttp.open("GET","UserController.php?methode=modifier"+"&id="+idUser+"&dataa="+datajsons, true);
              xhttp.send();
              
  
              // console.log(datajsons);
              NomUser.value='';
              Adresse.value='';
              Email.value='';
              Password.value='' ;
              Telephone.value='';
              
              
          }