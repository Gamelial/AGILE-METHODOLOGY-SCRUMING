<?php 
include "nav.php";
include "sidebar.php";
include "conn.php";

function checkUsernameUnique($name, $company, $position, $jd, $gender, $dob, $userId){
  include "conn.php";
  $uname = $_POST['uname'];
  $sql = "Select * from profile where uname='$uname'";
  $results = mysqli_query($conn, $sql);
  $fetch = mysqli_fetch_assoc($results);
  if (isset($fetch)){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> Username already exists, try something else.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  else{
    $sqli = "update profile Set name=\"$name\", uname=\"$uname\", company=\"$company\", position=\"$position\", jd=\"$jd\", gender=\"$gender\", dob=\"$dob\" where users_id=$userId";
    $result=mysqli_query($conn, $sqli);
    if ($result){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You have Sucessfully Updated Your Profile.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    echo "<meta http-equiv='refresh' content='1'>"; }
  }
}

$userId = '';
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "Select * from `users` where email='$email'";
    $result=mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    
    $GLOBALS['userId'] = $data['users_id'];
  


    $prof = "Select * from `profile` where users_id = $userId";
    $re=mysqli_query($conn, $prof);
    $dat = mysqli_fetch_assoc($re);
    $_SESSION['users_id'] = $dat['users_id'];
    $_SESSION['uname'] = $dat['uname'];
  }

  
?>


<main class="mt-5 pt-3">
  <div class="container-fluid">
<?php 
  if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $jd = $_POST['jd'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    
    $userId = $GLOBALS['userId'];

    $prof = "Select * from `profile` where users_id = $userId";
    $re=mysqli_query($conn, $prof);
    $dat = mysqli_fetch_assoc($re);
    $_SESSION['users_id'] = $dat['users_id'];
    $_SESSION['uname'] = $dat['uname'];
    if (isset($userId)){
    if ($dat['users_id'] != $userId ){
    $sqli = "insert into `profile`(name, uname, company, position, jd, gender, dob, users_id)
    values('$name', '$uname', '$company', '$position', '$jd', '$gender', '$dob', '$userId')";
    $result=mysqli_query($conn, $sqli);
    // echo $name, $company, $position, $jd, $gender, $dob, $userId;
    if($result){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> You have Sucessfully Updated Your Profile.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else{
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Warning!</strong> SOmething went WrOnG.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }else{
    checkUsernameUnique($name, $company, $position, $jd, $gender, $dob, $userId);
   
    
  }
}
}
?>
  <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email; ?>" disabled>
    
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">FullName</label>
    <input type="text" class="form-control" name="name" id="exampleInputPassword1" value="<?php if(isset($data['name']) and isset($dat['name'])){echo $dat['name'];}else{echo $data['name'];} ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">UserName</label>
    <input type="text" class="form-control" name="uname" id="exampleInputPassword1" value="<?php if(isset($dat['uname']) and isset($dat['uname'])){echo $dat['uname'];}?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Company</label>
    <input type="text" class="form-control" name="company" id="exampleInputPassword1" value="<?php if(isset($dat['company'])){echo $dat['company'];}?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Position</label>
    <input type="text" class="form-control" name="position" id="exampleInputPassword1" value="<?php if(isset($dat['position'])){echo $dat['position'];} ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Job Description</label>
    <input type="text" class="form-control" name="jd" id="exampleInputPassword1" value="<?php if(isset($dat['jd'])){echo $dat['jd'];} ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Gender</label>
    <input type="text" class="form-control" name="gender" id="exampleInputPassword1" value="<?php if(isset($dat['gender'])){echo $dat['gender'];} ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">DOB</label>
    <input type="date" class="form-control" name="dob" id="exampleInputPassword1" value="<?php if(isset($dat['dob'])){echo $dat['dob'];} ?>">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
