<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center">

<!-- End Logo -->
 

 <div class="d-flex align-items-center justify-content-between">
  
    <?php 
  if($_SESSION['role'] == 'administrateur'){?> <a href="dashbord.php" class="logo d-flex align-items-center">
<span class="d-none d-lg-block">Administrateur</span><?php }else{?><a href="dashbord.php" class="logo d-flex align-items-center"><span class="d-none d-lg-block">Transaction</span><?php  }?>
   </a>

 </div>

  
 
 <nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center" style="margin: 0; padding: 0; list-style: none;">
  <?php
 if($_SESSION['role'] == 'administrateur'){?>
     <li style="margin-right: 10px;"><a href="dashbord.php" class="logo align-items-center">
        <span class="d-none d-lg-block" style="font-size: 20px !important;">Transaction</span></a></li>
     <li style="margin-right: 10px;"><a href="adduser.php" class="logo align-items-center">
        <span class="d-none d-lg-block" style="font-size: 20px !important;">User</span></a></li>
     <li><a href="addcompte.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block" style="font-size: 20px !important;">Compte</span></a></li><?php }?>
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
