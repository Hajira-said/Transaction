<?php 
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
    <title>Transaction</title>
</head>

<body class="bg">
     
 <?php include 'nav.php';?>
    <div class="container p-4 padd" style="margin-top:100px;">
        <div class="card ">
            <div class="row p-3">
                <h2 class="text-primary sizetext">Ajoute Transaction :</h2>
                <div class="col-sm-12">
                    <div action="" class="">
                        <div class="row">
                            <div class="col-sm-3 mt-2">
                                <input type="text" class="form-control " id="description" placeholder="Description">
                            </div>
                            <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control " id="quantite" placeholder="quantite">
                            </div>
                            <div class="col-sm-2 mt-2">
                                <input type="number" class="form-control " id="montant" placeholder="Montant">
                            </div>
                            <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control " id="destinateur" placeholder="Destinateur">
                            </div>
                            <div class="col-sm-2 text-right mt-2">
                              <button  class="btn bg-success text-white" id="submit" onclick="InsertTransaction()">Envoyer</button>
                          </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-2 mt-2">
                                <select  id="selectType" class="form-select data">
                                    <option value="debit">Debit</option>
                                    <option value="credit">Credit</option>
                                </select>
                            </div>
                            <div class="col-sm-2 mt-2">
                                <input type="date" class="form-control data" id="date" placeholder="Date">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <select  id="selectCompte" class="form-select data">
                                   
                                </select>
                            </div>
                            <div class="col-sm-2 mt-2">
                                <select  id="selectcategorie" class="form-select data">
                                    <option value="1">Achat</option>
                                    <option value="2">Vente</option>
                                    <option value="3">Salaire</option>
                                    <option value="4">Depense</option>
                                </select>
                            </div>
                            <div class="col-sm-2 text-right mt-2">
                                <button class="btn bg-primary text-white" disabled id="upd">Modifier</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-4">
                <h2 class="text-primary sizetext">Recherche info sur la  Transaction :</h2>
                <div class="row mt-4">
                            
                            <div class="col-sm-2 mt-2">
                              <label for="date1">date debut:</label>
                                <input type="date" name="date_debut" class="form-control data" id="date1" placeholder="Date">
                            </div>
                           
                            <div class="col-sm-2 mt-2">
                              <label for="date2">date fin:</label>
                            <input type="date" name="date_fin" class="form-control data" id="date2" placeholder="Date">
                            </div>
                            <div class="col-sm-2 text-right mt-4">
                                <a href="#" class="btn bg-primary text-white" id="filtre-link">filtre</a>
                            </div>
                            <div class="col-sm-2 mt-4">
                                <select  id="trie" class="form-select data">
                                    <option value="1">CategorieAsc</option>
                                    <option value="2">CategorieDsc</option>
                                    <option value="3">DateAsc</option>
                                    <option value="4">DateDSC</option>
                                    <option value="5">MontantAsc</option>
                                    <option value="6">MontantDsc</option>
                                </select>
                            </div>
                            <div class="col-sm-2 text-right mt-4">
                                <button class="btn bg-primary text-white" id="btn" >Trie</button>
                            </div>
                   </div>
                       
                <hr class="mt-4">

                <div class="col-sm-12 mt-3">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <h2 class="text-primary sizetext">Transaction :</h2>
                          <div class="table-responsive">
                          <!-- Table with hoverable rows -->
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Description</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Prix Unitaire</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Destinateur</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody id="tbody">
                             
                             
                            </tbody>
                          </table>
                          <!-- End Table with hoverable rows -->
                        </div> 
                        <!-- End responsive div -->
                </div>
            </div>
        </div>
    </div>


     <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="script.js">
  </script>
  <script>
    // Récupérer les éléments date_debut et date_fin

const dateFinInput = document.getElementById('date2');
const dateDebutInput = document.getElementById('date1');
  
// Récupérer le lien de filtrage
const filtreLink = document.getElementById('filtre-link');

// Ajouter un gestionnaire d'événements au clic sur le lien
filtreLink.addEventListener('click', function () {
  // Récupérer les valeurs des champs date_debut et date_fin
  const dateDebut = dateDebutInput.value;
  const dateFin = dateFinInput.value;

  // Construire l'URL avec les valeurs des champs
  const url = `Filtrager.php?date_debut=${dateDebut}&date_fin=${dateFin}`;

  // Rediriger vers l'URL construite
  window.location.href = url;
});

  </script>
</body>
</html>