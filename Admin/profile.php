<?php require_once('inc/top.php');
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

$session_username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$session_username'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);
 $image = $row['image'];
 $id = $row['id'];
 $date = getdate($row['date']);
 $day = $date['mday'];
 $month = substr($date['month'],0,3);
 $year = $date['year'];
 $first_name = $row['first_name'];
$last_name = $row['last_name'];
$username = $row['username'];
$email = $row['email'];
$role = $row['role'];
$details = $row['details'];

?>
<head>
<link rel="stylesheet" href="bootstrap/css/style1.css">
<link rel="stylesheet" href="bootstrap/css/style.css">
</head>

<body id="profile">
   <div class="wrapper">
       
      <?php require_once('inc/header.php');?> 
   
    <!--sidebar start from here-->
    <div class="container-fluid body-section">
        <div class="row">
            <div class="col-md-3">
               <?php require_once('inc/sidebar.php');?> 
            </div>
            <div class="col-md-9">
                <h1> <i class="fa fa-tachometer"></i>Profile <small>Persional Details</small></h1><hr>
                <ol class="breadcrumb">
                   <li><a href="index.php"><i class="fa fa-tachometer"></i></a>Dashboard</li>/.
                    <li class="active"><i class="fa fa-user"></i> Profile</li>
                 </ol>
                    <center><img src="img/<?php echo $image;?>" width="150px" class="pic-circle-corner" alt="" id="profile-image"></center><br>s
                 <a href="edit-profile.php?edit=<?php echo $id;?>" class="btn btn-primary pull-right">Edit Profile</a><br><br>
                 <center>
                    <h3>Profile Details</h3> 
                 </center>
                  <br>
                   <table  class="table table-bordered">
                       <tr>
                           <td width="20%"><b>User ID:</b></td>
                           <td width="30%"><b><?php echo $id;?></b></td>
                           <td width="20%"><b>SignUp Date:</b></td>
                           <td width="30%"><b><?php echo "$day $month $year";?></b></td>
                           
                       </tr>
                       <tr>
                           <td width="20%"><b>First Name</b></td>
                           <td width="30%"><b><?php echo $first_name;?></b></td>
                           <td width="20%"><b>Last Name:</b></td>
                           <td width="30%"><b><?php echo $last_name;?></b></td>
                           
                       </tr>
                       <tr>
                           <td width="20%"><b>Username:</b></td>
                           <td width="30%"><b><?php echo $username;?></b></td>
                           <td width="20%"><b>Email</b></td>
                           <td width="30%"><b><?php echo $email;?></b></td>
                           
                       </tr>
                       <tr>
                           <td width="20%"><b>Role:</b></td>
                           <td width="30%"><b><?php echo $role;?></b></td>
                           <td width="20%"><b></b></td>
                           <td width="30%"><b></b></td>
                           
                       </tr>
                   </table>
                   <div class="row">
                       <div class="col-lg-8 col-sm-12">
                          <b>Details:</b> 
                          <div><?php echo $details;?></div>
                       </div>
                   </div>
                    <br>
            </div>
        </div>
    </div>
    <!---sidebar end from here-->
   <?php require_once('inc/footer.php'); ?>
