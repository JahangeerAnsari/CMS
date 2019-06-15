<?php require_once('inc/top.php');
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
     header('Location: index.php');
 }
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
}

 if(isset($_GET['del'])){
     $del_id = $_GET['del'];
     if(isset($_SESSION['username']) and $_SESSION['role'] == 'admin'){
         $del_query = "DELETE FROM categories WHERE id = '$del_id'";
     if(mysqli_query($con,$del_query )){
         $del_msg = "Category has been deleted";
     }
     else{
       $del_error = "Category has not been deleted";  
     }
     }
 }
if(isset($_POST['submit'])){
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));
    if(empty($cat_name)){
        $error = "must fill this field";
    }
    else
    {
        $check_query = "SELECT * FROM categories WHERE category= '$cat_name'";
    $check_run = mysqli_query($con,$check_query);
    if(mysqli_fetch_array($check_run) > 0){
        $error = "Categories already exits";
    } 
    else{
        $insert_query = "INSERT INTO categories (category) VALUES ('$cat_name')";
        if(mysqli_query($con, $insert_query)){
            $msg = "Category has been Added...";
       
        
        } 
        else {
            $error = "Category has been not added...";  
        }
        
    }
    }
}

if(isset($_POST['update'])){
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));
    if(empty($cat_name)){
        $up_error = "must fill this field";
    }
    else
    {
        $check_query = "SELECT * FROM categories WHERE category= '$cat_name'";
    $check_run = mysqli_query($con,$check_query);
    if(mysqli_fetch_array($check_run) > 0){
        $up_error = "Categories already exits";
    } 
    else{
        $update_query = "UPDATE `categories` SET `category` = '$cat_name' WHERE `categories`.`id` = $edit_id";
        if(mysqli_query($con, $update_query)){
            $up_msg = "Category has been Updated...";
       
        
        } 
        else {
            $up_error = "Category has been not Updated...";  
        }
        
    }
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
                    <h1> <i class="fa fa-folder-open"></i>Categories <small>Different Categories</small></h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li> <a href="index.html"> <i class="fa fa-tachometer"></i> Dashboard</a></li>/

                        <li class="active"> <i class="fa fa-folder-open"></i> Categories</li>
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <!--form start from here-->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name:</label>
                                    <?php 
                                if(isset($msg)){
                                    echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                }
                               else if(isset($error)){
                                  echo "<span class='pull-right' style='color:red;'>$error</span>";  
                               }
                               ?>
                                    <input type="text" placeholder="Category name" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
                            </form>
                            
                            <?php
                             if(isset($_GET['edit'])){
                                 $edit_check_query = "SELECT * FROM categories WHERE id = $edit_id";
                                 $edit_check_run = mysqli_query($con, $edit_check_query);
                                 if(mysqli_num_rows($edit_check_run) > 0){
                                 $edit_row = mysqli_fetch_array($edit_check_run) ;
                                     $up_category = $edit_row['category'];
                               
                            ?>
                            <!--form end from here-->
                            <hr>
                            <!--form update start from here-->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Update Category Name:</label>
                                    <?php 
                                if(isset($up_msg)){
                                    echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                }
                               else if(isset($up_error)){
                                  echo "<span class='pull-right' style='color:red;'>$up_error</span>";  
                               }
                               ?>
                                    <input type="text" value="<?php echo $up_category;?>" placeholder="Category name" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Update Category" name="update" class="btn btn-primary">
                            </form>
                            
                            <?php
                                   
                                 }
                             }
                            ?>
                            <!--form update from here-->
                        </div>
                        <div class="col-md-6"><br>
                            <!----php code start from here--->
                            <?php 
                          $get_query = "SELECT * FROM categories ORDER BY id DESC";
                         $get_run = mysqli_query($con, $get_query);
                         if(mysqli_num_rows($get_run) > 0){
                             
                                if(isset($del_msg)){
                                    echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                }
                               else if(isset($del_error)){
                                  echo "<span class='pull-right' style='color:red;'>$del_error</span>";  
                               }
                         
                         ?>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr #</th>
                                        <th>Category</th>
                                        <th>Posts</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                              while($get_row = mysqli_fetch_array($get_run)){
                                  
                                  $category_id = $get_row['id'];
                                  $category_name = $get_row['category'];
                              
                                 ?>
                                    <tr>
                                        <td><?php echo $category_id;?></td>
                                        <td><?php echo ucfirst($category_name);?></td>
                                        <td>12</td>
                                        <td><a href="categories.php?edit=<?php echo $category_id;?>"><i class="fa fa-pencil"></i></a></td>
                                        <td><a href="categories.php?del=<?php echo $category_id;?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                         
                             } 
                         else{
                             echo "<center><h3>No Categories Availlable..</h3></center>";
                         }
                         ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!---sidebar end from here-->
        <?php require_once('inc/footer.php');?>