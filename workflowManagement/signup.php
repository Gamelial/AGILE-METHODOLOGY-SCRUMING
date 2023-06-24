<?php

include "conn.php";


if (isset($data)){
if($data['users_id'] != $random_number){
  $random_number = rand(100000, 999999);
}
}else{
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $random_number = rand(100000, 999999);
    $email = $_POST["email"];
    $pass = md5($_POST["pass"]);
    $rpass = md5($_POST["rpass"]);

    $select = "Select * from `users` where email = '$email'";
    $r = mysqli_query($conn, $select);
    $data = mysqli_fetch_assoc($r);

    if(isset($data)){
      echo "User already exists";
    }else{ 
   
    if(isset($_POST["checked"])){
        $checked = $_POST["checked"];
    }else{ 
        $checked = 'none';
    }
    if(empty($pass)){
        echo "<div class='alert alert-danger' role='alert'><b>Warning!</b> Password cannot be empty.</div>";
    }else if($pass == $rpass and !empty($name)){
        
        $sql = "insert into `users`(users_id, name, email, pass, agreed, date)
      values('$random_number','$name','$email', '$pass', '$checked', CURDATE())";
      $result = mysqli_query($conn, $sql);
      if($result){
    // echo " Registered Successfully";
    $success = 1;
    header("location:login.php");
  }else{
    die(mysqli_error($conn));
  }
    }else{
        echo '<div class="alert alert-danger" role="alert"> <b>Warning!</b> Ensure Passwords are the same.</div>';

    }
  }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Workflow MAnagement</title>
    <style>
        html, body{
            background:#aea;
        }
    </style>
</head>
<body>



    
    <section class="vh-100" style="background-color: #aea;">
  <div class="container h-80">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-11 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <h5>Workflow Management </h5>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" name="name" class="form-control" required />
                      <label class="form-label" for="form3Example1c">Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" name="email" class="form-control" required />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" name="pass" class="form-control" required />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" name="rpass" class="form-control" required/>
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-3">
                      <label class="form-check-label" for="form2Example3">
                          I agree all statements in <a href="#!">Terms of service</a>
                          <input class="form-check-input" value="checked" style="margin: 8px;" type="checkbox" name="checked" value="" id="form2Example3c" />
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-1 mb-lg-2">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>
                  <div class="form-check d-flex justify-content-center mb-1">
                      <label class="form-check-label" for="form2Example3">
                           Have an account? <a href="login.php">Log In</a>
                    </label>
                  </div>
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                
                <img src="img/bg.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>