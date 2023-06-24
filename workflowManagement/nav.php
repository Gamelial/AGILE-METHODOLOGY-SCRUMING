<?php if($_SERVER["SCRIPT_NAME"] == "/workflowmanagement/nav.php"){
 header("location: index.php");
}
?>
<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<style>
        html, body{
            background:white;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

  <button class=" navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span></button>

  <a class="navbar-brand fw-bold text-uppercase p-1" href="index.php">Workflow Management</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       
    <form class="d-flex ms-auto">
        
    <div class="input-group my-3 my-lg-0 ">
  
    </form>
    <ul class="navbar-nav mb-2 mb-lg-0">      
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-fill"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php"> <?php 
            if ($_SESSION['email']){
              echo $_SESSION['email'];
              }else{ 
                header("location:login.php");
                } ?>
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <?php if ($_SESSION['email']){
              echo '<li><a class="dropdown-item bg-danger text-white" href="logout.php">Log out</a></li>';
              echo '<li><a class="dropdown-item" href="changepassword.php">change Password</a></li>';
              }else{ 
                echo '<li><a class="dropdown-item bg-primary text-white" href="#">Log In</a></li>';
              } ?>
          </ul>
        </li>
      
    </ul>
  </div>
</nav>