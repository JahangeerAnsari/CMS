  <div class="widgets">
                                <form action="index.php" method="post">
                                    <div class="input-group">
                                        <input type="text" name="search-title" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                        <input type="submit" value="go" class="btn btn-default" name="search">    
                                        </span>
                                    </div><!-- /input-group -->
                                </form> 
                            </div>
                            <!--widgets- close-->
                             <div class="widgets">
                                <div class="popular">
                                    <h4>Popular Posts</h4>
                                    <!--sidebar php start from here-->
                                    <?php
                                    $p_query = "SELECT * FROM posts WHERE status= 'publish' ORDER BY views DESC LIMIT 5";
                                    $p_run = mysqli_query($con, $p_query);
                                    if(mysqli_num_rows($p_run) > 0){
                                        while($p_row = mysqli_fetch_array($p_run)){
                                            $p_id = $p_row['id'];
                                            $p_date = getdate($p_row['date']);
                                            $p_day = $p_date['mday'];
                                            $p_month = $p_date['month'];
                                            $p_year = $p_date['year'];
                                            $p_title = $p_row['title'];
                                            $p_image = $p_row['image'];
                                            
                                        
                                    
                                    ?>
                                     <!--sidebar php  from here-->
                                    <hr>
                                    
                                    <div class="row">
                                        <div class="col-xs-4">

                                            <a href="post.php?post_id=<?php echo $p_id;?>"><img src="img/<?php echo $p_image;?>" style="width: 50px; height: 40px;" alt="image 1"></a>
                                        </div>
                                        <div class="col-xs-8">
                                            <a href="post.php?post_id=<?php echo $p_id;?>"><h4><?php echo $p_title;?> </h4></a>
                                            <p><?php echo "$p_day $p_month$p_year"?></p>
                                        </div>

                                    </div>
                                    <?php
                                        }
                                    } 
                                    else{
                                        echo "<h3>No Post Available</h3>";
                                    }
                                    ?>
                                    
                                </div>

                            </div>

                            <!--Recent Post start--->

                            <div class="widgets">
                                <div class="popular">
                                    <h4>Recent Posts</h4>
                                    <!--sidebar php start from here-->
                                    <?php
                                    $p_query = "SELECT * FROM posts WHERE status= 'publish' ORDER BY id DESC LIMIT 5";
                                    $p_run = mysqli_query($con, $p_query);
                                    if(mysqli_num_rows($p_run) > 0){
                                        while($p_row = mysqli_fetch_array($p_run)){
                                            $p_id = $p_row['id'];
                                            $p_date = getdate($p_row['date']);
                                            $p_day = $p_date['mday'];
                                            $p_month = $p_date['month'];
                                            $p_year = $p_date['year'];
                                            $p_title = $p_row['title'];
                                            $p_image = $p_row['image'];
                                            
                                        
                                    
                                    ?>
                                     <!--sidebar php  from here-->
                                    <hr>
                                    
                                    <div class="row">
                                        <div class="col-xs-4">

                                            <a href="post.php?post_id=<?php echo $p_id;?>"><img src="img/<?php echo $p_image;?>" alt="image 1" style="width: 50px; height: 40px;"></a>
                                        </div>
                                        <div class="col-xs-8">
                                            <a href="post.php?post_id=<?php echo $p_id;?>"><h4><?php echo $p_title;?> </h4></a>
                                            <p><?php echo "$p_day $p_month$p_year"?></p>
                                        </div>

                                    </div>
                                    <?php
                                        }
                                    } 
                                    else{
                                        echo "<h3>No Post Available</h3>";
                                    }
                                    ?>
                                    
                                </div>

                            </div>
                            <!--Recent post end-->
                            <!--Categories Start from here-->
                            <div class="widgets">
                                <div class="popular">
                                    <h4>Categories</h4>
                                    <hr>
                                    <div class="widgets">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul>
                                                    <!--query for categories-->
                                                    <?php 
                                                      $c_query = "SELECT * FROM categories";
                                                       $c_run = mysqli_query($con,$c_query);
                                                       if(mysqli_num_rows($c_run) > 0 ){ 
                                                           $count = 2;
                                                           while($c_row = mysqli_fetch_array($c_run)){
                                                               $c_id = $c_row['id'];
                                                               $c_category = $c_row['category'];
                                                               $count = $count + 1;
                                                               if(($count % 2) == 1){
                                                                   
                                                                    echo " <li><a href='index.php?cat=".$c_id."' style='font-size: 15px;'>".(ucfirst($c_category))."</a></li>";
                                                           
                                                               }
                                                              
                                                           }
                                                           
                                                       } 
                                                       else{
                                                           echo "<p>No Ctegory Available</p>";
                                                       }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul>
                                                    <!--query for categories-->
                                                    <?php 
                                                      $c_query = "SELECT * FROM categories";
                                                       $c_run = mysqli_query($con,$c_query);
                                                       if(mysqli_num_rows($c_run) > 0 ){ 
                                                           $count = 2;
                                                           while($c_row = mysqli_fetch_array($c_run)){
                                                               $c_id = $c_row['id'];
                                                               $c_category = $c_row['category'];
                                                               $count = $count + 1;
                                                               if(($count % 2) == 0){
                                                                   
                                                                    echo " <li><a href='index.php?cat=".$c_id."' style='font-size: 15px;'>".(ucfirst($c_category))."</a></li>";
                                                           
                                                               }
                                                              
                                                           }
                                                           
                                                       } 
                                                       else{
                                                           echo "<p>No Ctegory Available</p>";
                                                       }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Categories End from here-->
                            <!---Socila icons TAB START HERE-->
                            <div class="widgets">
                                <div class="popular">
                                    <h4>Social Icons</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <a href="http://www.facebook.com"><img src="img/face2.png" alt="facebook"></a>
                                            
                                            <a href="https://www.google.com"><img src="img/google.png" alt="google"></a>
                                            
                                            <a href="http://www.instagram.com"><img src="img/in.png" alt="Instgram"></a>
                                            
                                            <a href="http://www.twitter.com"><img src="img/twi.png" alt="twiter"></a>
                                            
                                            
                                        </div>
                                        <div class="col-xs-4">
                                            
                                        </div>
                                        <div class="col-xs-4">
                                            
                                        </div>
                                    </div>
     
                                     

                                </div>
                            </div>
                            <!--social icons end here-->
 