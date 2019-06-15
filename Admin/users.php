
<?php require_once('inc/top.php');?>
</head>
<?php
 if(!isset($_SESSION['username'])){
    header('Location: login.php');
} 
else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
     header('Location: index.php');
 } 

if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM users WHERE id = $del_id";
    $del_check_run = mysqli_query($con,$del_check_query);
    if(mysqli_num_rows($del_check_run) > 0){
        
      $del_query = "DELETE FROM `users` WHERE `users`.`id` = $del_id ";
    if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
        if(mysqli_query($con,$del_query)){
    $msg = " Users has been deleted..";
    }
    else
    {
        $error = "Users has not  been deleted try again..";
    }
    }        
        
    }
    else{
        header('Location: index.php');
    }
    
    
}  
?>

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
                <h1> <i class="fa fa-users"></i>Users <small> View All Users</small></h1><hr>
                <ol class="breadcrumb">
                    <li ><a href=""> <i class="fa fa-tachometer"></i> Dashboard</a></li>/.
                    <li class="active"> <i class="fa fa-users"></i> Users</li>
                 </ol>
                 <!---php stsrt for user here--->
                 <?php
                $query = "SELECT * FROM users ORDER BY id DESC";
                $run = mysqli_query($con,$query);
                if(mysqli_num_rows($run) > 0){
                
                ?>
                <form action="" method="post">
                 <div class="row">
                     <div class="col-sm-8">
                         
                             <div class="row">
                                 <div class="col-xs-4">
                                     <div class="form-group">
                                         <select name="" id="" class="form-control">
                                         <option value="delete">Delete</option>
                                        
                                         </select>
                                     </div>
                                 </div>
                                  <div class="col-xs-8">
                                      <input type="submit" class="btn btn-success" value="Apply">
                                      <a href="add-user.php" class="btn btn-primary">Add New</a>
                                  </div>
                             </div>
                        
                     </div>
                 </div> 
                 
                   <?php
                   if(isset($error)){
                       echo "<span style='color:red;' class='pull-right'>$error</span>";
                   }  
                    else if(isset($msg))
                    {
                                                
                       echo "<span style='color:green;' class='pull-right'>$msg</span>";  

                    }
                
                ?>
                 <!--table start from here-->
                 <table class="table table-bordered table-striped table-hover">
                     <thead>
                         <tr>
                            <td><input type="checkbox" id="selectallboxes"></td>
                             <th>Sr #</th>
                             <th>Date</th>
                             <th>Name</th>
                             <th>UserName</th>
                             <th>Email</th>
                             <th>Image</th>
                             <th>Password</th>
                             <th>Role</th>
                             
                             <th>Edit</th>
                             <th>Delete</th>
                         </tr>
                     </thead>
                     <tbody>
                         <!--phpn code for user table fetch here-->
                         <?php
                    
                       while($row = mysqli_fetch_array($run)){
                           $id = $row['id'];
                           $first_name = ucfirst($row['first_name']);
                           $last_name = ucfirst($row['last_name']);
                           $email = $row['email'];
                           $username = ucfirst($row['username']);
                           $role = $row['role'];
                           $image = $row['image'];
                           $date = getdate($row['date']);
                           $day = $date['mday'];
                           $month = substr($date['month'],0,3);
                           $year = $date['year'];
                      
                        ?>
                         
                         <tr>
                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                             <td><?php echo $id ?></td>
                             <td><?php echo "$day $month $year";?></td>
                             <td><?php echo "$first_name $last_name ";  ?></td>
                             <td><?php echo $username; ?></td>
                             <td><?php echo $email; ?></td>
                             <td><img src="img/<?php echo $image;?>" alt="Profile Image" width="30px"></td>
                             <td>*******</td>
                             <td><?php echo $role ?></td>
                             <td><a href="edit-user.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                             <td><a href="users.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
                         </tr>
                         <?php
                         }  
                         ?>
                     </tbody>
                 </table>
                 
                 
                 <?php
                }
                ?>
                </form> 
                 <!--table end from here-->
            </div>
        </div>
    </div>
    <!---sidebar end from here-->
    <?php require_once('inc/footer.php');?> 