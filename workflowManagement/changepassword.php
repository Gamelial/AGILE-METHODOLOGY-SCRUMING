<?php include "conn.php";

?>

<!----------------Nav bar--------------------------->
<?php include "nav.php";

?>
<br><br><br><br><br>
<form class="mx-1 mx-md-4" method="POST">

                  <?php

if(isset($_POST["submit"])){
    
    $oldpass = md5($_POST["oldpass"]);
    $newpass = md5($_POST["newpass"]);
    $newpass1 = md5($_POST["newpass1"]);
    $email = $_SESSION['email'];
    
     

  $sql = "Select * from `users` where pass='$oldpass'";
  $result=mysqli_query($conn, $sql);
  if(isset($result)){
    if ($newpass == $newpass1){
        $sqli = "update users Set pass=\"$newpass\" where email='$email'";
        $query = mysqli_query($conn, $sqli);
        if($query){
            echo "Password Changed Successfully";
        }
    }else{
        echo "Password are not the same";
    }
  }else{
    echo "Old Password is not correct";
  }
}
?>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" name="oldpass" class="form-control" required/>
                      <label class="form-label" for="form3Example4c">Old Password</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" name="newpass" class="form-control" required/>
                      <label class="form-label" for="form3Example4c">New Password</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" name="newpass1" class="form-control" required/>
                      <label class="form-label" for="form3Example4c">Confirm Password</label>
                    </div>
                  </div>
                  

                  <div class="d-flex justify-content-center mx-4 mb-1 mb-lg-2">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Change Password</button>

                  </div>
                

                </form>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>               