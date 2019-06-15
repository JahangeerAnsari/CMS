<?php require_once('inc/top.php');?>
    
<?php require_once('inc/header.php');?>    
</head>

<body>

    <div id="home">
        
            <!---Middle page statr here-->
            <div class="jumbotron">
                <div class="container">
                    <div id="details" class="animated fadeInLeft">
                        <h1>Contact<span> Us</span></h1>
                        <p>We are available 24*7 so feel free to contact us.. </p>

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
                       
                           <div class="row">
                              <!--map start from here-->
                               <div class="col-md-12">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7589.191577336616!2d79.53499389999999!3d17.997533300000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a334fa177bb9cb7%3A0x7ac2da79a55415ee!2sWaddepally%2C+Phase+1%2C+Teachers+Colony%2C+Hanamkonda%2C+Telangana!5e0!3m2!1sen!2sin!4v1559296011116!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                                <!--map end from here-->
                                <!--Contact form satrt from here-->
                               <div class="col-md-12 contact-form">
                                <?php
                                   if(isset($_POST['submit'])){
                                       $name = mysqli_real_escape_string($con, $_POST['name']);
                                       $email = mysqli_real_escape_string($con, $_POST['email']);
                                       $website = mysqli_real_escape_string($con,$_POST['website']);
                                       $comment = mysqli_real_escape_string($con,$_POST['comment']);
                                       $to = "jahangeeransari194@gmail.com";
                                       $header = " From: $name<$email>";
                                       $subject = "Message From $name";
                                       
                                     if(empty($name) or empty($email) or empty($comment)){
                                         $error = "all fields (*) are required";
                                     } 
                                       else{
                                           if(mail($to,$subject,$message,$header)){
                                               $msg = "Message has been sent";
                                           }
                                           else{
                                               $error = "Message has not been sent";
                                           }
                                       }
                                   }
                                   ?>
                                 <h2>CONTACT FORM</h2>
                                  <form action="" method="post">
                                      <div class="form-group">
                                        <label for="full-name">Full Name:</label>  
                                         <?php
                                          if(isset($error)){
                                              echo "<span class='pull-right' style='color:red'>$error</span>";
                                          }
                                          else if(isset($msg)){
                                              echo "<span class='pull-right' style='color:green'>$msg</span>";
                                          }
                                          ?>
                                          <input type="text" id="full-name" class="form-control" placeholder="full name" name="name">
                                      </div>
                                       <div class="form-group">
                                        <label for="email">Email:</label>  
                                          <input type="email" id="email" class="form-control" placeholder="email" name="email">
                                      </div>
                                       <div class="form-group">
                                        <label for="Website">Website:</label>  
                                          <input type="text" id="Website" class="form-control" placeholder="Website here" name="website">
                                      </div>
                                       <div class="form-group">
                                        <label for="message">Messsage:</label>  
                                           <textarea cols="30" rows="10" id="message" class="form-control" placeholder=" Leave your message here.." name="comment"></textarea>
                                      </div>
                                      <input type="submit" name="submit" value="submit" class="btn btn-primary"> 
                                  </form> 
                                   
                               </div>
                               <!---contact form end from here-->   
                           </div>                     
                                                 
                        </div>
                        
                        <div class="col-md-4">
                         <?php require_once('inc/sidebar.php');?>  

                        </div>
                    </div>
                </div>


            </section>
             <?php require_once('inc/footer.php');?>  