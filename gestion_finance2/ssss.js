 // Fonction pour trier par Date Asc
 function AfficherparDateA() {
    let tbody = document.getElementById('tbody');
    var xhttps = new XMLHttpRequest();
    xhttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            tbody.innerHTML = this.responseText;
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
        setTimeout(function () {
            AfficherparMontantDESC();
        }, 5000);
    }
  });

























  // Fonction update
let idss;
let delid;

function attachfunction() {
  let updateButtons = document.querySelectorAll('.update');

  updateButtons.forEach((updateButton) => {
    updateButton.addEventListener('click', (event) => {
      let id = event.target.getAttribute('data-id');
      idss = parseInt(id);

      var XHttps = new XMLHttpRequest();
      XHttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          let tabupdate = this.responseText;
          let tabupdateParse = JSON.parse(tabupdate);
          let descrip = document.getElementById('description');
          let Montant = document.getElementById('montant');
          let destinateur = document.getElementById('destinateur');
          let selectType = document.getElementById('selectType');
          let selectcategorie = document.getElementById('selectcategorie');
          let selectCompte = document.getElementById('selectCompte');
          let date = document.getElementById('date');
          descrip.value = tabupdateParse.trans_description;
          Montant.value = tabupdateParse.montant;
          destinateur.value = tabupdateParse.destination;
          selectType.value = tabupdateParse.trans_type;
          date.value = tabupdateParse.trans_date;
          selectcategorie.value = tabupdateParse.trans_categorie;
          selectCompte.value = tabupdateParse.trans_compte;
          enableButton();
          disableButtonSubmit();
        }
      };
      XHttps.open("GET", "TransactionController.php?methode=gettransaction" + "&id=" + id, true);
      XHttps.send();
    });
  });
}

// Attacher un écouteur d'événement au bouton updatebnt
let updateBtn = document.getElementById('upd');
updateBtn.addEventListener("click", function () {
  updateTransaction(idss);  // Appeler la fonction avec idss comme argument
  attachfunction();
  updateshow();
});

// ...

function updateTransaction(idss) {
  console.log(idss);

  // Récupération des valeurs
  let descrip = document.getElementById('description');
  let Montant = document.getElementById('montant');
  let destinateur = document.getElementById('destinateur');
  let selectType = document.getElementById('selectType');
  let selectcategorie = document.getElementById('selectcategorie');
  let selectCompte = document.getElementById('selectCompte');
  let date = document.getElementById('date');

  let dataa = {
    description: descrip.value,
    Montant: Montant.value,
    date: date.value,
    selectType: selectType.value,
    selectcategorie: selectcategorie.value,
    selectCompte: selectCompte.value,
    destinateur: destinateur.value
  };

  let datajsons = JSON.stringify(dataa);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhttp.open("GET", "TransactionController.php?methode=update" + "&id=" + idss + "&dataa=" + datajsons, true);
  xhttp.send();

  // Réinitialiser les champs
  descrip.value = '';
  Montant.value = '';
  date.value = '';
  destinateur.value = '';
}
