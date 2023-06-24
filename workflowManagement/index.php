
<?php include "conn.php";

?>

<!----------------Nav bar--------------------------->
<?php include "nav.php";

?>

<!---------------side Bar---------------------------->


<?php include "sidebar.php";
function myId(){
  include "conn.php";
 $email = $_SESSION['email'];
 $sql = "Select * from users where email='$email'";
 $result = mysqli_query($conn, $sql);
 $data = mysqli_fetch_assoc($result);
 return $data['users_id'];
 }

?>


<!------------------------------------------->
<main class="mt-5 pt-3">
  <div class="container-fluid">
    <?php $Did = myId();
$query_date = "select * from tasks where user1_id='$Did' or user2_id='$Did'";
$result_date = mysqli_query($conn, $query_date);

// if(isset($data_date)){
// $start_date = $data_date['startdate'];
// $end_date = $data_date['deadline'];
// $start_date =date('Y-m-d', strtotime($start_date));
// $end_date = date('Y-m-d', strtotime($end_date));
// $total = $end_date - $start_date;
// $date = date("m.d.y");
// $todays_date = date('Y-m-d', strtotime($date)); 
// echo $start_date;  
// echo $end_date;  
// echo $todays_date;  
// $part = $todays_date - $start_date;
// $percent = idate('Y-m-d', $part)/idate('Y-m-d', $total) * 100;
// echo $pecent;
// }
$email = $_SESSION['email'];
 
 ?>
    <div class="row">
      <div class="col-md-12 fw-bold fs-3">
        Dashbord 
      </div>
    </div>
    <div class="row">
      <?php while($datas = mysqli_fetch_assoc($result_date)){ 
        if($datas['user1_id'] != myId()){
            $rec = $datas['user1_id'];
          }else{
          $rec = $datas['user2_id'];

        }
        $sql = "Select * from profile where users_id='$rec'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        ?>
        <div class="col-md-3 mb-3">
          <a style="text-decoration:none;" href="viewtask.php?id=<?php echo $datas['id']; ?>">
        <div class="card text-white bg-primary h-100">
        <div class="card-header">Projects</div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $datas['title']; ?></h5>
          <p class="card-text"><?php echo mb_substr($datas['detail'], 0, 50)."...";?></p>
          <p class="card-text">to: <?php echo $data['name'];?></p>
        </div>
      </div>
    </a>
      </div>
      <?php }?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <div class="card-header">
          Find New Team Mates
        </div>
        <div class="card-body">
          <form class="d-flex" method="get" action="find_users.php">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Team Mates
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-light table-striped">              
   <?php 
   

   $userId = myId();
   $sql = "Select * from team where user1_id='$userId' or user2_id='$userId'";
   $result = mysqli_query($conn, $sql);
   




   ?>
   <h3 class="m-auto"> Team Mates </h3>
   <table class="table table-light table-striped">             
<thead> 
                <tr> 
                <th>Name</th>
                <th>Email</th>
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
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>