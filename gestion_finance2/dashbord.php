<?php 
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<script src="categorie.js"></script>
<body class="bg">
   <?php include 'nav.php';?>
  <main id="main" class="main" style="margin-left:0px; margin-top:110px;">
    <section class="section dashboard section d-flex justify-content-center flex-column">
      
        <div class="row gap-4 d-flex justify-content-center ">
          <div class="col-sm-2 rounded p-4 dashbord">            
                 <strong><i class="ri-exchange-dollar-fill" style="font-size:30px;"></i></strong>
                 <span class="textbg1"><strong>Solde</strong></span> <div>
                 <span class="text-black pl-5 ft" id="SoldeActuel"></span> <span class="badge text-black">fdj</span></div>
          </div>
          <div class="col-sm-2 rounded p-4 dashbord">
          <strong><i class="ri-arrow-right-up-line" style="font-size:30px;"></i></strong>
            <span class="textbg3"><strong>Debit</strong></span> <div>
            <span class="text-black pl-5 ft" id="Debit"></span><span class="badge text-black">fdj</span></div>
          </div>
          <div class="col-sm-2 rounded p-4 dashbord">
          <strong><i class="ri-arrow-left-down-line" style="font-size:30px;"></i></strong>
            <span class="textbg2" ><strong>Credit</strong></span><div>
            <span class="text-black text-center pl-5 ft" id="Credit"></span><span class="badge text-black">fdj</span> </div>
          </div>
          
        
        
            

          <div class="row w-100 d-flex justify-content-center mt-4 p-5" id="tbodys">
           
          
          
               
           
              
                  
            </div>

            
          </div>
          
        </div>



    </section>
    
</main>
  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

</body>

</html>


