



<!-Navigation -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="Index.php">
                    <div class="col-xs-3"><img src="img/b.PNG" alt="Logo" width="30px"> Ansari</div>


                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li> <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a></li>
                        <ul>
                           
                        </ul>
                        <ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopun="true" aria-expanded="false"><i class="fa fa-list-alt"></i> Categories<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  
                                     <?php
                                     $query = "SELECT * FROM categories ORDER BY id DESC";
                                    $run = mysqli_query($con, $query);
                                    if(mysqli_num_rows($run) > 0){
                                        
                                    while($row = mysqli_fetch_array($run)){
                                        $category = ucfirst($row['category']);
                                        $id= $row['id'];
                                        echo "<li><a href='index.php?cat=".$id."'>$category</a></li>";
                                    }    
                                        } else{
                                        echo "<li><a href='#'>No Category Yet</a></li>";
                                        
                                    }
                                    
                                    ?>
                               
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link" href="Contact.php"><i class="fa fa-phone"></i> Contact Us</a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </nav>
            
            <!---Middle page statr here-->
         