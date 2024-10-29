<?php 
include('include/db.php');

?>




<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop</title>
    <!----bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!----font awesome---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

  </head>
<body>
<!--navbar-->
<div class="container-fluid p=0">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(250, 236, 239);">

<div class="container-fluid">
  <img src="./images/logo.jpeg" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-6 mb-lg-2 ms-3">
      <li class="nav-item mx-3">
        <a class="nav-link active fs-4" aria-current="page" href="index.php">Home</a> 
      </li>
      <li class="nav-item mx-3">
        <a class="nav-link fs-4" href="display_all_pro.php">Products</a> 
      </li>
      <li class="nav-item mx-3">
        <a class="nav-link fs-4" href="user_area/reg.php">Register</a> 
      </li>
      <li class="nav-item mx-3">
        <a class="nav-link fs-4" href="#">Contact</a>
      </li>
    </ul>

    <form class="d-flex ms-3" action="search_pro.php" method="get">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
      <input type="submit" value="Search" class="btn btn-secondary" name="search_data_pro">
    </form>
  </div>
</div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <ul class="navbar-nav me-auto">
  <li class="nav-item ms-3">
          <a class="nav-link text-light fs-4" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link text-light fs-4" href="user_area/login.php">Login</a>
        </li>
  </ul>
</nav>

<div class="bg-light py-3">
  <h3 class="text-center">Welcome to E-Shop </h3>
 
</div>
<div class="row px-1">
  <div class="col-md-12">
      <div class="row">
        <?php
        if(!isset($_SESSION['name'])){
            include('user_area/login.php');
        }else{
            include('../payment.php');
        }
            
            ?>
    
        <!--row end-->      
    </div> 
    <!--col end-->       
  </div>
</div>


<div class="bg-secondary p-3 text-center navbar-light text-light footer">
        <p>All rights reserved & Designed by <b>MAYMUNA MARJAN</b></p>
    </div>
</div>









<!----javasript--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>