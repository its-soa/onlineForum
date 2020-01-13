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

if(isset($_GET['cat_id']) && isset($_GET['cat_name'])) {
$id = $_GET['cat_id'];
$name = $_GET['cat_name'];
    
}


?>



<html>
<head>
    <title> La Toya | Redirect </title>  
    <style>
    
        body{
         background-image: url(fashion/r.jpeg);
        color: maroon;
            text-align: center;
    }
    
    h1{
        text-align: center;
        font-size: 40px;
    }
 
    a{
          text-decoration: none;
            font-size: 20px;
        
    }
     .links a:hover{color: snow;
    background-color: rebeccapurple;
    text-decoration: none;
    padding: 7px;
    }

    
    .links{
        border: 1px solid #;
        padding-bottom: 15px;
        padding-top: 10px;
          padding-left: 100px;
          text-transform: uppercase;
        padding-right: 30px;
        letter-spacing: 1px;
    }

    .links a{
        font-size: 24px;
    }
    
    </style>
    
</head>

    <body>
    
                <br> <h1> La Toya Redirect Page </h1> <br>
    
        <div class="links">

        
          <a href="music.php"> Music Lovers |</a>
         <a href="movies.php"> Movie Lovers |</a>
         <a href="fashion.php"> Fashion Lovers |</a>
        <a href="sports.php"> Sport Fans</a> 
    
    </div> <br> <br>
        
        <?php

echo "<h2> Thank You For Your Post $fullname  </h2> </br>";

echo "<h3> YOU CAN ALSO COMMENT ON OTHER POSTS OF YOUR CHOICE.</h3> </br> ";

?> 
    
 
        
        

        
        <br>

        <h3> Do You Want To Go Home? Click <a href="home.php"> HERE </a> . </h3> <br><br>
        
         <h3> Or Logout? Click <a href="log_out.php"> HERE </a> . </h3>

    
    
    
    
    
    
    
    
    </body>

</html>