<?php 
include "conn.php";
include "nav.php";
session_start();
?>

<!---------------side Bar---------------------------->


<?php include "sidebar.php";




?>
<main class="mt-5 pt-3">
  <div class="container-fluid">
<table class="table table-light table-striped">              
   <?php 
   function myId(){
    include "conn.php";
   $email = $_SESSION['email'];
   $sql = "Select * from users where email='$email'";
   $result = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($result);
   return $data['users_id'];
   }

   $userId = myId();
   $sql = "Select * from team where user1_id='$userId' or user2_id='$userId'";
   $result = mysqli_query($conn, $sql);
   




   ?>
   <h3 class="m-auto"> Team Mates </h3>
   <table class="table table-light table-striped">             
<thead> 
                <tr> 
                <th>Name</th>
                <th>Username</th>
                <th>Company</th>
                <th>Position</th>
                <th>Job Description</th>
                
                </tr>
            </thead>
            <tbody>
<?php
while( $row = mysqli_fetch_assoc($result) )
{
 $num1 = $row['user1_id'];
 $num2 = $row['user2_id'];
 $uname = $_SESSION['uname'];
 $sqli = "Select * from `profile` where not uname='$uname' and users_id in ('$num1', '$num2')";
 $results = mysqli_query($conn, $sqli);
 while($data = mysqli_fetch_assoc($results)){
  $name = $data['name'];
  $n_email = $data['uname'];
  $company = $data['company'];
  $position = $data['position'];
  $jd = $data['jd'];
  $id = $data['users_id'];

  echo "<tr><td><a style='text-decoration:none;' href='message.php?id=$id'>$name <i class='bi bi-chat-left-text-fill'></i></a></td><td>$n_email</td><td>$company</td><td>$position</td><td>$jd</td></tr>";
 }
}
?>

              
              
            </tbody>
            </table>
              
            

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>