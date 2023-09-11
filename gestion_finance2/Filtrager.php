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
     
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<!-- End Logo -->
 
 <div class="d-flex align-items-center justify-content-between">
   <a href="dashbord.php" class="logo d-flex align-items-center">
       <i class="bi bi-list toggle-sidebar-btn"></i>
     <span class="d-none d-lg-block">Transaction</span>
   </a>

 </div>
 <div class="search-bar" style="margin:100px;">
   <form class="search-form d-flex align-items-center" method="POST" action="#">
     <input type="text" name="query" placeholder="Search" title="Enter search keyword">
     <button type="submit" title="Search"><i class="bi bi-search"></i></button>
   </form>
 </div>
 <button class="btn bg-primary text-white" onclick="imprimerPage()">Imprimer</button>
 <nav class="header-nav ms-auto">
     
   <ul class="d-flex align-items-center">

     <li class="nav-item dropdown">

       <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bx bx-bell"></i>
         <span class="badge bg-success badge-number">3</span>
       </a><!-- End Messages Icon -->

       <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
         <li class="dropdown-header">
           You have 3 new messages
           <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
         </li>
         <li>
           <hr class="dropdown-divider">
         </li>

         <li class="message-item">
           <a href="#">
             <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
             <div>
               <h4>Maria Hudson</h4>
               <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
               <p>4 hrs. ago</p>
             </div>
           </a>
         </li>
         <li>
           <hr class="dropdown-divider">
         </li>

         <li class="message-item">
           <a href="#">
             <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
             <div>
               <h4>Anna Nelson</h4>
               <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
               <p>6 hrs. ago</p>
             </div>
           </a>
         </li>
         <li>
           <hr class="dropdown-divider">
         </li>

         <li class="message-item">
           <a href="#">
             <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
             <div>
               <h4>David Muldon</h4>
               <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
               <p>8 hrs. ago</p>
             </div>
           </a>
         </li>
         <li>
           <hr class="dropdown-divider">
         </li>

         <li class="dropdown-footer">
           <a href="#">Show all messages</a>
         </li>

       </ul><!-- End Messages Dropdown Items -->

     </li><!-- End Messages Nav -->

     <li class="nav-item dropdown pe-3">

       <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">
       <i class="bi bi-person-circle" style="font-size:25px"></i>
       </a>
     </li>
    
   </ul>
 </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
    <div class="container p-4 padd" id="contenu" style="margin-top:100px;">
        <div class="card ">
            <div class="row p-3">
              <div class="d-flex justify-content-between">
            <div style="font-size: 25px; color:#012970;"><strong>
              Liste Des transactions:</strong></div>
              <div style="font-size:25px; color:#012970;">
                <strong>Revenue: <span id="somme"> </span><span> FDJ</span></strong>
                <input type="hidden" id="datedebut" value="<?php $dateDebut = $_GET['date_debut']; echo $dateDebut;?>">
                <input type="hidden" id="datefin" value="<?php $dateFin = $_GET['date_fin']; echo $dateFin;?>">
            </div>
             </div>
    <script>
        function imprimerPage() {
            let contenuDiv = document.getElementById("contenu");

            // Copiez le contenu de l'élément div dans une fenêtre de dialogue d'impression
            let fenetreImpression = window.open('', '', 'width=600,height=600');
            fenetreImpression.document.write('<html><head><title>Transaction</title></head><body>');
            fenetreImpression.document.write(contenuDiv.innerHTML);
            fenetreImpression.document.write('</body></html>');

            // Imprimez la fenêtre de dialogue d'impression
            fenetreImpression.print();

            // Fermez la fenêtre de dialogue d'impression après l'impression
            fenetreImpression.close();
            }
        
    </script>
        
    
            <?php
// Récupérer les dates à partir de la méthode POST
$dateDebut = $_GET['date_debut'];
$dateFin = $_GET['date_fin'];

// Vérifier si les dates ont été fournies
if (isset($dateDebut) && isset($dateFin)) {
    // Connexion à la base de données (à personnaliser avec vos informations de connexion)
    $host = 'localhost';
    $db = 'gestion';
    $user = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    // Préparer la requête SQL pour récupérer les éléments entre les deux dates
    $sql = "SELECT * FROM transaction WHERE  deleted='false' and  trans_date BETWEEN :date_debut AND :date_fin";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':date_debut', $dateDebut);
    $stmt->bindParam(':date_fin', $dateFin);

    // Exécuter la requête SQL
    $stmt->execute();

    // Récupérer les résultats
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats
    
    // ... Votre code PHP pour récupérer les données ...
       
    echo'<hr class="mt-4">';
    // Afficher les résultats sous forme de tableau HTML
    echo '<table class="table table-hover">';
    echo '<thead>';
    echo '<tr>';

    echo '<th scope="col">Description</th>';
    echo '<th scope="col">Date</th>';
    echo '<th scope="col">Montant</th>';
    echo '<th scope="col">Type</th>';
    echo '<th scope="col">Destinateur</th>';
   
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    foreach ($resultats as $row) {
      $montant= $row['montant']* $row['quantite'];
        echo '<tr>';
        echo '<td>' . $row['trans_description'] . '</td>';
        echo '<td>' . $row['trans_date'] . '</td>';
        echo '<td>' . $montant . '</td>';
        echo '<td>' . $row['trans_type'] . '</td>';
        echo '<td>' . $row['destinateur'] . '</td>';
       
        

        
       
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
    
    

    // Fermer la connexion à la base de données
    $pdo = null;
} else {
    echo "Veuillez fournir les deux dates.";
}
?>

    </div>

    <script>

          let somme=document.getElementById('somme');
          let DateDebut=document.getElementById('datedebut').value;
          let DateFin=document.getElementById('datefin').value;
          var xhttps = new XMLHttpRequest();
          xhttps.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  // Mettez à jour le contenu de la table avec les nouvelles données reçues
               somme.innerHTML=this.responseText;
              }
          };
          xhttps.open("GET", "TransactionController.php?methode=somme"+"&datedebut="+DateDebut+"&datefin="+DateFin, true);
          xhttps.send();
    

    </script>
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
  
  
  </script>
</body>
</html>