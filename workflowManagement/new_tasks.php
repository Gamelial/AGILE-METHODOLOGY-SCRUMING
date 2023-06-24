


<!----------------Nav bar --------------------------->
<?php include "nav.php";
      include "conn.php";

?>

<!---------------side Bar---------------------------->


<?php include "sidebar.php";

?>

<?php
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    
    $query = "Select * from `users` where email='$email'";
    $data = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_assoc($data);
    $user1_id = $fetch['users_id'];
}

?>

<!------------------------------------------->
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <?php 
        
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $detail = $_POST['detail'];
            $deadline = $_POST['deadline'];
            $user2_id = $_POST['user2'];
            $date = date("m.d.y");
            $startdate = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
            $target = "images/".basename($_FILES['file']['name']);
            $file = $_FILES['file']['name'];
            if ($file == "*.jpg" or "*.png" or "*.gif"){
            if($title and $detail and $target and $file){
                
            $sql = "insert into `tasks`(title, detail, startdate, deadline, files, user1_id, user2_id)
            values('$title', '$detail','$startdate', '$deadline', '$file', '$user1_id','$user2_id')";
            $result = mysqli_query($conn, $sql);
            if($result){
                if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
                    $msg = "Image uploaded successfully";
                  }else{
                    $msg = "There was a problem uploading image";
                  }
                  echo '<meta http-equiv="refresh" content="1; url=index.php">';
                }else{
                echo "failed";
            }
        
        }
    }
}
    ?>

  <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Task Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Tasks Detail</label>
    <input type="text" class="form-control" name="detail" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Task Deadline</label>
    <input type="date" class="form-control" name="deadline" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">File (Optional)</label>
    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Select Team-mate</label>
  <select name="user2" class="form-select" aria-label="Default select example">
  <?php
    $q = "Select * from team where user1_id='$user1_id' or user2_id='$user1_id'";
    $res = mysqli_query($conn, $q);
    while($row = mysqli_fetch_assoc($res)){
        if ($row['user1_id'] != $user1_id){
            $teammates = $row['user1_id'];
            echo $teammates;
        }else{
            $teammates = $row['user2_id'];
            echo $teammates;
        }

        $team = "select * from users where users_id='$teammates'";
        $n = mysqli_query($conn, $team);
        $ds = mysqli_fetch_assoc($n);
        echo $teammates;
        echo $ds['name'];
    
  ?>
    
  <option  value="<?php echo $teammates; ?>"> <?php echo $ds['name']; ?> </option>

  
  <?php }?>
</select>

    </div>

    
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  
</form>

    </div>
</main>