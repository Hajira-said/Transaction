   // Fonction pour trier par Affiche de Categorie 
    function AllCategorie() {
        let tbody = document.getElementById('tbodys');
        // Vous devez décommenter ces lignes lorsque le code de cette fonction sera prêt.
        var xhttps = new XMLHttpRequest();
        xhttps.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                tbody.innerHTML=this.responseText;
            } 
        };
        xhttps.open("GET", "TransactionController.php?methode=AllCategorie", true);
        xhttps.send();
      }


      // Fonction pour trier par Affiche de Solde 
    function Solde() {
        let Solde = document.getElementById('SoldeActuel');
        // Vous devez décommenter ces lignes lorsque le code de cette fonction sera prêt.
        var xhttps = new XMLHttpRequest();
        xhttps.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                Solde.innerHTML = this.responseText;
                console.log(this.responseText);
            }
        };
        xhttps.open("GET", "TransactionController.php?methode=Solde", true);
        xhttps.send();
      }
      // Fonction pour trier par Affiche de Debit 
    function Debit() {
        let Debit = document.getElementById('Debit');
        // Vous devez décommenter ces lignes lorsque le code de cette fonction sera prêt.
        var xhttps = new XMLHttpRequest();
        xhttps.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                Debit.innerHTML = this.responseText;
                console.log();
            }
        };
        xhttps.open("GET", "TransactionController.php?methode=Debit", true);
        xhttps.send();
      }
  // Fonction pour trier par Affiche de Credit
function Credit() {
    let creditElement = document.getElementById('Credit'); // Renommez la variable ici
    // Vous devez décommenter ces lignes lorsque le code de cette fonction sera prêt.
    var xhttps = new XMLHttpRequest();
    xhttps.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            creditElement.innerHTML = this.responseText; // Utilisez la nouvelle variable ici
        }
    };
    xhttps.open("GET", "TransactionController.php?methode=Credit", true);
    xhttps.send();
}



      setTimeout(function(){
        AllCategorie()
        Solde()
        Debit()
        Credit()
      },500);