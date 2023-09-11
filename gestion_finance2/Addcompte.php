<?php 
include 'session.php';?>
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
    <title>User</title>
</head>

<body class="bg">
     
 <?php include 'nav.php';?>
    <div class="container p-4 padd" style="margin-top:100px;">
        <div class="card auto">
            <div class="row p-3">
                <h2 class="text-primary">Ajoute Compte :</h2>
                <div class="col-sm-12">
                    <div action="" class="">
                        <div class="row">
                            <div class="col-sm-3 mt-2">
                                <input type="text" class="form-control " id="name" placeholder="Nom">
                            </div>
                            <div class="col-sm-3 mt-2">
                                <input type="text" class="form-control " id="Typecompte" placeholder="Type">
                            </div>
                            <div class="col-sm-2 mt-2">
                                <input type="text" class="form-control " id="Solde" placeholder="Solde">
                            </div>
                            <div class="col-sm-2 text-right mt-2">
                              <button  class="btn bg-success text-white" id="submitcompte" onclick="InsertCompte()">Envoyer</button>
                          </div>
                          <div class="col-sm-1 text-right mt-2">
                                <button class="btn bg-primary text-white" disabled id="updcompte">Modifier</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <hr class="mt-4">
              
                            <div class="col-sm-2 mt-4">
                                <select  id="trie" class="form-select data">
                                    <option value="1">CategorieAsc</option>
                                    <option value="2">CategorieDsc</option>
                                </select>
                            </div>
                            <div class="col-sm-2 text-right mt-4">
                                <button class="btn bg-primary text-white" id="btncompte" >Trie</button>
                            </div>
                   </div>
                       
                <hr class="mt-4">

                <div class="col-sm-12 mt-3">
                    <div class="card shadow-none">
                        <div class="card-body">
                            <h2 class="text-primary">Compte :</h2>
                          <div class="table-responsive">
                          <!-- Table with hoverable rows -->
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Type</th>
                                <th scope="col">Solde</th>
                                <th scope="col">action</th>
                              
                              </tr>
                            </thead>
                            <tbody id="tbodycompte">
                             
                             
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
  <script src="compte.js"></script>
  <script src="comptetrie.js"></script>
  
  </script>
</body>
</html>