
<?php include "conn.php";

?>

<!----------------Nav bar--------------------------->
<?php include "nav.php";

?>

<style>
      #messageform {
    position: relative; /* Set parent position to relative */
    bottom:0;
    width:50%;
}

  
  </style>
<!---------------side Bar---------------------------->
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "Select * from users where users_id = '$id'";
    $query = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($query);
}


?>
<?php
if(isset($_POST["messages"])){
    $postid = $_POST["postid"];
    $senderid = $_SESSION['id'];
    $recieverid = $_GET['id'];
    $sms = $_POST["messages"];
    $date = date("m.d.y");
    $sentby = $_SESSION['email'];
    $startdate = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
    $message = "insert into messages (user1id, user2id, postid, message, date, sentby) VALUES ('$senderid', '$recieverid', '$postid','$sms', '$startdate', '$sentby')";
    $result = mysqli_query($conn, $message);
    if(isset($result)){
        // echo "<meta http-equiv='refresh' content='1'>";
    }

}
?>

<main class="mt-5 pt-3">
  <div class="container">		
    <h2 style="display:inline"><?php echo $fetch['name'];?></h2>	
    <span><small style="color:blue"><?php echo $fetch['email'] ?></small>	
      <div id="show">
		<?php
        $recieverid = $_GET['id'];
        
        $senderid = $_SESSION['id'];
        
        $queries = "Select * from messages where user1id='$senderid' and user2id='$recieverid' or user1id='$recieverid' and user2id='$senderid'";
        $select = mysqli_query($conn, $queries);
        while( $rows = mysqli_fetch_assoc($select) ){
          if ($rows['sentby'] == $_SESSION['email']){
        ?>
<div class="card">
    <div class="card-header bg-primary">
        <?php
    $email = $rows['sentby'];
    $sql1 = "Select * from users where email = '$email'";
    $query1 = mysqli_query($conn, $sql1);
    $fetch1 = mysqli_fetch_assoc($query1); 
    if (isset($fetch1)){
    echo $fetch1['name'];
    }
  }else{ ?>
    <div class="card">
    <div class="card-header bg-warning">
        <?php
    $email = $rows['sentby'];
    $sql1 = "Select * from users where email = '$email'";
    $query1 = mysqli_query($conn, $sql1);
    $fetch1 = mysqli_fetch_assoc($query1); 
    if (isset($fetch1)){
    echo $fetch1['name'];
    }
  }

    ?>


  </div>
  <div class="card-body bg-secondary text-white">
    <h5 class="card-title"><?php echo @$fetch1['email'] ?></h5>
    <p class="card-text"><?php echo $rows['message'] ?></p>
  </div>
</div>
<br>
<?php }?>
      </div>   


	<form method="POST" id="messageform">
		<div class="form-group">
			<input name="messages" id="messages" class="messageid form-control" placeholder="What are you saying..." rows="5" required>
		</div>
		<span id="message"></span>
		<div class="form-group">
			<input type="hidden" name="postid" id="postid" class="postid" value="<?php $postid = rand(100_000, 999_999); echo $postid;?>" />
			<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Post" />
		</div>
	</form>		
</div>	

<meta http-equiv="refresh" content="15">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
