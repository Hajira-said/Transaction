  // Fonction pour trier par Categorie Asc
  function AfficherparCategorieASC() {
    let tbody = document.getElementById('tbodyUser');
    var xhttps = new XMLHttpRequest();
    xhttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            tbody.innerHTML = this.responseText;
        }
    };
    xhttps.open("GET", "UserController.php?methode=SortOrderByAPlha", true);
    xhttps.send();
  }
  
  // Fonction pour trier par Categorie Desc
  function AfficherparCategorieDes() {
    let tbody = document.getElementById('tbodyUser');
    // Vous devez décommenter ces lignes lorsque le code de cette fonction sera prêt.
    var xhttps = new XMLHttpRequest();
    xhttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            tbody.innerHTML = this.responseText;
        }
    };
    xhttps.open("GET", "UserController.php?methode=SortOrderByReverse", true);
    xhttps.send();
  }
  
  // Gestionnaire d'événements pour le bouton Trie
  let boutonTrie = document.getElementById('userbtn');
  boutonTrie.addEventListener("click", function () {
    const selectTrie = document.getElementById('usertrie');
    const triSelectionne = selectTrie.value;
    if (triSelectionne == '1') {
        AfficherparCategorieASC();
    } else  {
        AfficherparCategorieDes();
    } 
  });