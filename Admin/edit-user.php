
<?php require_once('inc/top.php');
 
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
     header('Location: index.php');
 }
  
if(isset($_GET['edit'])){
   $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM users WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
        $e_first_name = $edit_row['first_name'];
        $e_last_name = $edit_row['last_name'];
        $e_role = $edit_row['role'];
        $e_image = $edit_row['image'];
         $e_details = $edit_row['details'];
        
 }
 else{
     header('Location:index.php');
 }    

  }
?>
</head>

<body>
   <div class="wrapper">
      <?php require_once('inc/header.php');?> 
       
   
    <!--sidebar start from here-->
    <div class="container-fluid body-section">
        <div class="row">
            <div class="col-md-3">
             <?php require_once('inc/sidebar.php');?>   
            </div>
            <div class="col-md-9">
                <h1> <i class="fa fa-users"></i>Edit User <small> Edit User Details </small></h1><hr>
                <ol class="breadcrumb">
                    <li ><a href=""> <i class="fa fa-tachometer"></i> Dashboard</a></li>/.
                    <li class="active"> <i class="fa fa-users"></i> Edit Users</li>
                 </ol>
                   <!--php for feaching user details-->
                   <?php
                   if(isset($_POST['submit'])){
                       $date = time();
                       $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
                       $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
                       
                       $password = $_POST['password'];
                       $role = $_POST['role'];
                       $image = $_FILES['image']['name'];
                       $image_tmp= $_FILES['image']['tmp_name'];
                        $details = mysqli_real_escape_string($con, $_POST['details']);
                       
                       if(empty($image)){
                           $image = $e_image;
                       }
                      $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                       $salt_run = mysqli_query($con,$salt_query);
                       $salt_row = mysqli_fetch_array($salt_run);
                        $salt = $salt_row['salt'];
                       
                         $insert_password = crypt($password,$salt);
                        
                       if(empty($first_name) or empty($last_name) or empty($image)){
                           $error = "all (*) field required";
                       } 
                       
                       else{
                          $update_query = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `image` = '$image', `role` = '$role', `details` = '$details'";
                          if(isset($password)){
                               $update_query .= ",`password` = '$insert_password'";
                          }
                           $update_query .= " WHERE `users`.`id` = $edit_id";
                           if(mysqli_query($con,$update_query)){
                               $msg = "user has been updated..";
                               header("refresh:1, url=edit-user.php?edit=$edit_id");
                               if(!empty($image)){
                                   move_uploaded_file($image_tmp, "img/$image");
                               }
                           }
                           else
                           {
                             $msg = "user has been not updated.." ; 
                           }
                       }
                       
                   }
                      ?>
                 
                 <!-- form for add user start from here--->
                 <div class="row">
                     <div class="col-md-8">
                             <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label for="first-name">First Name:</label>
                                    <?php 
                                    if(isset($error)){
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } 
                                    else if(isset($msg)){
                                       echo "<span class='pull-right' style='color:green;'>$msg</span>"; 
                                    }
                                        ?>
                                   <input type="text" name="first-name" id="first-name" class="form-control" value="<?php echo $e_first_name;?>" placeholder="First Name">   
                                    </div>
                                    <div class="form-group">
                                    <label for="last-name">Last Name:</label> 
                                   <input type="text" name="last-name" id="last-name" value="<?php echo $e_last_name; ?>" class="form-control" placeholder="Last Name">   
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="password">Password:</label> 
                                   <input type="password" name="password" id="password" class="form-control" placeholder="Password">   
                                    </div>
                                    <div class="form-group">
                                    <label for="role">Role:</label> 
                                   <select name="role" id="role" class="form-control">
                                      <option value="author" <?php if($e_role == 'author'){echo "selected";}?>>Author</option>
                                      <option value="admin" <?php if($e_role == 'admin'){echo "selected";}?>>Admin</option> 
                                   </select>   
                                    </div>
                                    <div class="form-group">
                                    <label for="image">Profile Picture:</label> 
                                   <input type="file" id="image" name="image">   
                                    </div>
                                    <div class="form-group">
                                    <label for="image">Details:</label> 
                                   <textarea name="details" id="details" cols="30" rows="10" class="form-control"><?php echo $e_details; ?> </textarea>   
                                    </div>
                                  <input type="submit" name="submit" value="Update Users" class="btn btn-primary">
                             </form>
                     </div>
                     <div class="col-md-4">
                         <?php
                         
                             echo "<img src='img/$e_image' width='100%'";
                         
                         ?>
                         
                     </div>
                 </div>
                 
                 <!-- form for add user end from here--->
            </div>
        </div>
    </div>
    <!---sidebar end from here-->
    <?php require_once('inc/footer.php');?> 