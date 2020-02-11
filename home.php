<?php 

session_start();

include("db\db_config.php");

    if (!isset($_SESSION['user_id']) && !isset($_SESSION['fullname'])) {
        
    $err = "Please Login Before You Access This Page";
        header("location:login.php?Please Login First");
        
    echo $err;
        
    }
            
      $username = $_SESSION['user_id'];
      $fullname = $_SESSION['fullname'];

?>


<html>
<head>
<title> La Toya| Home Page</title>
<link rel="stylesheet" type="text/css" href="styles/home.css">

</head>
    
<body>
    <header>
    
      <div id="logodiv">
        <img id="logo" src="fashion/6.jpeg">
      </div>

      <div id="name">
        <h1>Chat Hub</h1>
      </div>

      <div id="links">
          <ul>
                <li> <a href="music.php"> Music Lovers </a> </li>
                <li> <a href="movies.php"> Movie Lovers </a> </li>
                <li> <a href="fashion.php"> Fashion Lovers </a> </li>
                <li> <a href="sports.php"> Sport Fans</a> </li>

           </ul>
      </div>  <!-- end of links -->

    <div id="empty"></div>  
    
  <div class="subhead">  
    <h1> Chat Hub Home Page </h1>
    
  </div>      
  <?php  
  echo "<h3 style='color: lightcoral; font-family: comic sans ms; padding: 10px; text-align: center;'> WELCOME $fullname </marquee></h3>"; ?>
    
  
    
    <div class="content"> 
        
    <div id="first">
    <h3> 
        Chat Hub remains one of the best sites for dissussing the latest gist about the Nigerian Enertainment Industry. We offer a large number of Hot Gists and topics on the entertainment industry, both home and abroad. All of which our esteemed users can freely comment on and even create their very own posts, which can also be commented on by any of our users.
        
    </h3>
    </div> <!-- end of first -->

    <div id="second">
    <h3>
            
        At Chat Hub, We offfer our Registered Users the opportunity to discuss on relevant topics and issues relating to the Entertainment Industry in Nigeria, and the world at large. In the process of this, Our users get the chance of meeting new friends online. Similarly, on the not only get to interact with new people of uniques distinguishing backgrounds, but they also acquire more knowledge in the process.
    
    </h3>
    </div> <!--  end of second -->
       
    <div id="third">   
    <h3> 
        This website is easy to navigate through and use. The Posts uploaded here are also constantly updated. So always ensure you do not stay out of touch for too long.
    
    </h3>    
    </div> <!-- end of third -->
      
</div> <!-- end of content -->

    <h3 class="side"> Do You Wish To View All Posts ? <a href="all_posts.php"> Click Here </a> </h3>

<div class="foot">
 
    <h3> Thank You For Your Time ! ! ! </h3> 
    
    <h4 class="ref">  Do You Wish To <a href="logout.php"> Logout ? </a> </h4>

    <h4 class="ref"> Copyright &copy 2019. </h4>
            
</div>  <!-- end of foot -->
        
</header>
</body>

</html>