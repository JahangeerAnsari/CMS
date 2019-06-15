
<html>

    <head>
<!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
-->
    
    </head>
    <body>

<?php
require_once('inc/top.php');

?>
<?php
require_once('inc/header.php');
   
     $number_of_posts = 2;
if(isset($_GET['page'])){
    $page_id = $_GET['page'];
    
} else{
    $page_id = 1;
}  
 if(isset($_GET['cat'])){
     $cat_id = $_GET['cat'];
     $cat_query = "SELECT * FROM categories WHERE id = $cat_id";
     $cat_run = mysqli_query($con,$cat_query);
     $cat_row = mysqli_fetch_array($cat_run);
     $cat_name = $cat_row['category'];
 }
   if(isset($_POST['search'])){
       $search = $_POST['search-title'];
        $all_posts_query = "SELECT * FROM posts WHERE status = 'publish'";
        $all_posts_query .= "and  tags= '%$search%'";
      $all_post_run = mysqli_query($con, $all_posts_query );
    $all_posts = mysqli_num_rows($all_post_run);
     $total_pages = ceil($all_posts/$number_of_posts);
    $page_start_from = ($page_id -1) * $number_of_posts;
   }   
  else{
       $all_posts_query = "SELECT * FROM posts WHERE status = 'publish'";
       if(isset($cat_name)){
        $all_posts_query .= "and categories = '$cat_name'";
    } 
      $all_post_run = mysqli_query($con, $all_posts_query );
    $all_posts = mysqli_num_rows($all_post_run);
     $total_pages = ceil($all_posts/$number_of_posts);
    $page_start_from = ($page_id -1) * $number_of_posts;
  }
   
    

?>
</head>

<body>

    <div id="home">
        
            
            <!---Middle page statr here-->
            <div class="jumbotron">
                <div class="container">
                    <div id="details" class="animated fadeInLeft">
                        <h1>Ansari<span> Blogweb</span></h1>
                        <p>this is my online blopsite </p>

                    </div>
                </div>
                <img src="img/flex.pnh.jpg" height="500" width="1000" alt="Top Image">
            </div>
            <!---Middle page end here-->
            <!-----section start from here-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                         <!-- carousel starts here -->
                         <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                             
                              <ol class="carousel-indicators">
                                <?php
                                $p_query = "SELECT * FROM posts WHERE status= 'publish' ORDER BY views DESC LIMIT 5";
                                    
                                    $post_images = array();
                                    $i = 0;
                                  $cnt = 1;
                                    $p_run = mysqli_query($con, $p_query);
                                    if(mysqli_num_rows($p_run) > 0){
                                        while($p_row = mysqli_fetch_array($p_run)){
                                            
                                           $p_image = $p_row['image'];
                                            $post_images[$i] = $p_image;
                                            if($cnt ==1 ){
                                                ?>
                                                <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="active"></li>
                                                
                                                <?php
                                            } else{
                                                ?>
                                                <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" ></li>
                                                <?php
                                            }
                                           $i = $i + 1;

                                        }
                                    }
                             
                             ?>

                              </ol>

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner">
                              <?php
                                    
                                  $count = 1;
                                  foreach($post_images as $post_image){

                                      if($count ==1 ){ 
                                          $count  = $count +1;
                                          ?>
                                          <div class="item active">
                                          <img src="img/<?php echo $post_image; ?>" style="width: 100%; height:350px " alt="">
                                        </div>
                                        <?php 
                                      } else{
                                          ?>
                                          <div class="item">
                                          <img src="img/<?php echo $post_image; ?>" style="width: 100%; height:350px" alt="">
                                        </div>
                                          <?php
                                      }
                                  }
      
                            ?>
   
                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
               <!-- CAROUSEL ENDS HERE -->            
                            <!--post start from here-->
                               <?php
                            
                            if(isset($_POST['search'])){
                                $search = $_POST['search-title'];
                                
                                $query = "SELECT * FROM posts Where status = 'publish'";
                                $query .= "and tags LIKE '%$search'";
                                 
                            $query .= " ORDER BY id DESC LIMIT $page_start_from, $number_of_posts";
                            
                                
                            } 
                            else{
                                $query = "SELECT * FROM posts Where status = 'publish'";
                               if(isset($cat_name)){
                                   $query .= "and categories = '$cat_name'";
                                   
                               }
                            $query .= " ORDER BY id DESC LIMIT $page_start_from, $number_of_posts";
                            
                            }
                                
                            $run = mysqli_query($con,$query);
                            if(mysqli_num_rows($run) > 0){
                                while($row = mysqli_fetch_array($run)){
                                    $id = $row['id'];
                                    $date = getdate($row['date']);
                                    $day = $date['mday'];
                                    $month = $date['month'];
                                    $year = $date['year'];
                                    $title = $row['title'];
                                    $author = $row['author'];
                                    $author_image = $row['author_image'];
                                    $image = $row['image'];
                                    $categories = $row['categories'];
                                    $tags = $row['tags'];
                                    $post_data = $row['post_data'];
                                    $views = $row['views'];
                                    $status = $row['status'];
                            
                            
                                 ?>
                               
                                <div class="post">
                                  <div class="row">
                                      <div class="col-md-2 post-date">
                                          <div class="day"><?php echo $day;?></div>
                                          <div class="month"><?php echo $month;?></div>
                                          <div class="year"><?php echo $year;?></div>
                                      </div>
                                      <div class="col-md-8 post-title">
                                      <!--here we fetch title from db-->
                                  <a href="post.php?post_id=<?php echo $id;?>"><h2><?php echo $title ?> </h2></a>  
                                     <P>written by: <span><?php echo $author ?></span></P>
                                      </div>
                                      <div class="col-md-2 profile-picture">
                                         <img src="img/<?php echo $author_image; ?>"alt="Profile Picture" class="pic-circle-corner">
                                          
                                      </div>
                                  </div> 
                                    <a href="post.php?post_id=<?php echo $id;?>" style=" width: 90%;margin: 5px auto; background: red; display: block;" ><img src="img/<?php echo $image;?>" style=" height: 350px; margin: 0px auto" alt="Post Image"></a>
                                    <div class="desc">
                                        <?php echo substr($post_data,0,300)."..."; ?>
                                   </div>
                                    <a href="post.php?post_id=<?php echo $id;?>" class="btn btn-primary">Read more..</a>
                                    <div class="bottom">
                                        <span class="first"><i class="fa fa-folder"></i><a href=""> <?php echo ucfirst($categories);?> </a></span>|
                                        <span class="sec"><i class="fa fa-comment"></i><a href="">Comment</a></span>
                                        
                                    </div>
                                </div>
                                <?php
                                    }
                            } 
                            else{
                                echo "<center><h2>No Post Available</h2></center";
                            
                            }
                                ?>    
                                
                                <!--pagination start from here-->
                                <nav id="pagination" >
                                    <ul class="pagination">
                                       <?php
                                          for($i = 1; $i <= $total_pages; $i++){
                                              
                                              echo "<li class='".($page_id == $i ? 'active': '')."'><a href='index.php?page=".$i.(isset($cat_name)?"cat=$cat_id":"
                                              ")."'>$i</a></li>";
                                              
                                          }
                                        ?>
                                      
                                        
                                    </ul>
                                </nav>
                                <!--pagination end from here-->
                        </div>
                        <!--slider end here-->
                        <div class="col-md-4">
                          <?php require_once('inc/sidebar.php') ?> 
                        </div>
                    </div>
                </div>


            </section>
            <!-----footer start from here-->
           <?php require_once('inc/footer.php') ?>
           
           
          </body>

</html>