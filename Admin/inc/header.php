<?php
  $session_role2 = $_SESSION['role'];
   $session_username2 = $_SESSION['username'];
?>
   

   <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-brand" href="index.php">ANSARI</a>
            </li>
            
        </ul>
    </div>
    
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
         <ul>
             <li class="nav-item">
           <a href=""> Welcome: <i class="fa fa-user"></i> <?php echo ucfirst($session_username2); ?></a>
           
           </li> 
         </ul>
          <ul>
             
           <li class="nav-item">
           <a href="add-post.php"><i class="fa fa-plus-square"></i>Add Post</a>
           
           </li>
            </ul>
            <?php
            if($session_role2 == 'admin'){
                
            
                ?>
           <ul>
            <li class="nav-item">
            <a href="add-user.php"><i class="fa fa-user-plus"></i>Add User</a> 
            </li>
            </ul>
            <?php
            }
            ?>
            <ul>
            <li class="nav-item">
              <a href="profile.php"><i class="fa fa-user"></i>Profile</a>
               </li>  
            </ul>
                <ul>
                 <li class="nav-item">
                 <a href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                 </li>
            </ul>
            
        </ul>
    </div>
</nav>