<?php 
include "nav.php";
include "sidebar.php";
include "conn.php";

function checkAndAddFriend(){
  include "conn.php";
  $myEmail = $_SESSION['email'];
  $sqli = "Select * from users where email='$myEmail'";
  $results=mysqli_query($conn, $sqli);
  $datas = mysqli_fetch_assoc($results);
  $me = $datas['users_id'];
  $him = $_GET['add'];
  
  $teamsql = "select * from team where user1_id = $me and user2_id = $him or user1_id = $him and user2_id = $me";
  $check = mysqli_query($conn, $teamsql);
  $avail = mysqli_fetch_assoc($check);
  if(isset($avail['id'])){
    echo "Already Friends";
  }else{
  $add = "Insert into team(user1_id, user2_id)Values($me, $him)";
  $makeFriends = mysqli_query($conn, $add);
  }
} 
?>

<main class="mt-5 pt-3">
  <div class="container-fluid">
    
     <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
             Find New Team Mates
            </div>
            <div class="card-body">
            <form class="d-flex" method="get" action="find_users.php">
            <input class="form-control me-2" name="search" type="search" placeholder="Search Username..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
            </div>
        </div>
      </div>
      <div class="col-md-12">
      <ul class="list-group">
      <?php
      
      if (isset($_GET['search'])){
        $sfn = $_GET['search'];

        $myEmail = $_SESSION['email'];
        $sqli = "Select * from users where email='$myEmail'";
        $results=mysqli_query($conn, $sqli);
        $datas = mysqli_fetch_assoc($results);
        
        
        $sql = "Select * from `profile` where uname Like '%$sfn%'";
        $result=mysqli_query($conn, $sql);
        
        $data = mysqli_fetch_assoc($result);
        foreach($data as $da){
          if($da == $data['uname']){
              $me = $datas['users_id'];
              $id = $data['users_id'];
              if ($me == $id){

              }else{

              
              $teamsql = "select * from team where user1_id = $me and user2_id = $id or user1_id = $id and user2_id = $me";
              $check = mysqli_query($conn, $teamsql);
              $avail = mysqli_fetch_assoc($check);
              if ($avail){?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
   <h3></h3> <?php echo $da; ?>
    <a href="remove_users.php?user1=<?php echo $id; ?>&user2=<?php echo $me ?>" class="btn btn-warning">Remove Teammates</a>
  </li> <?php }else{ ?>

  <li class="list-group-item d-flex justify-content-between align-items-center">
   <h3></h3> <?php echo $da; ?>
    <a href="find_users.php?add=<?php echo $id; ?>" class="btn btn-primary">Add Teammates</a>
  </li>
  <?php }}}}}?>
  <?php
    
    if (isset($_GET['add'])){
      
      checkAndAddFriend();
        
  }
  ?>
</ul>
    </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
