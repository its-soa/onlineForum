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

//echo "WELCOME $fullname ";

?>


<html>
<head>
<title> La Toya| View All Post</title>
<style>
    
    body{
        
         background-image: url(fashion/v.jpeg);
        
        color: maroon;
    }
    
    
    h1{
        font-size: 40px;
        text-align: center;
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
          padding-left: 300px;
          text-transform: uppercase;
        padding-right: 30px;
        letter-spacing: 1px;
    }

    .links a{
        font-size: 24px;
    }
    h3{
        font-size: 18px;
        letter-spacing: 2px;
        line-height: 23px;
    }
    
    .table{
        
        color: firebrick;
         border: 2px solid palevioletred;
         margin-left: 250px;
        width: 850px;
    }
    
    .footer{
        color: firebrick;
        text-align: center;
    }

    #opu{
        text-align: center;
        font-size: 20px;
    }
    
    
</style>

</head>
    
<body>
    
    <br>
    <h1> La Toya View All Post Page</h1> <br>
   
    <div class="links">

        
          <a href="music.php"> Music Lovers |</a>
         <a href="movies.php"> Movie Lovers |</a>
         <a href="fashion.php"> Fashion Lovers |</a>
        <a href="sports.php"> Sport Fans</a> 
    
    </div> <br> <br>
    
  <?php  echo "<h3> <marquee> WELCOME $fullname </marquee></h3>";  ?>
    
    <br>
    
 


<br> <br>
    
  <!--  <div>
    <ul>
        
        <li>    <a href="music.php"> Music Lovers</a> </li>
        <li> <a href="movies.php"> Movie Lovers</a> </li>
        <li>   <a href="fashion.php"> Fashion Lovers</a> </li>
        <li> <a href="sports.php"> Sport Fans</a> </li>
        
    </ul>
    
    </div> -->
    

    
    <?php
    
    $select = mysqli_query($db, "SELECT * FROM posts ") or die(mysqli_error($db));
    
    
    ?>
    
    <h3 id="opu">  BELOW ARE ALL POST ON EVERY CATEGORY IN OUR FORUM  </h3>
    
    <h3> 
    
        <ol>
        
        <li> MOVIES</li>
        <li> FASHION</li>
        <li> MUSIC</li>
         <li> SPORTS</li>
        
        </ol>
    </h3> <br> <br> 
    
       <div > 
    
    <table border="1" class="table">
    
    <tr>
          <th> <h3> Category ID </h3></th>
        <th> <h3> Posts </h3></th>
            
  <!--   <th> <h3> Posted By </h3> </th> -->
     <th> <h3>  Time Posted </h3></th>
    </tr>
        
    <tr> <?php while($result = mysqli_fetch_array($select)) { ?>
        
             
      <td> <?php echo $result['category_id'] ?>  </td>
        <td> <?php echo $result['post_content'] ?>  </td>
        
       <!--   <td> <?php // echo $result['user_id'] ?>  </td> -->
        <td> <?php echo $result['post_date'] ?>  </td>
        
    </tr>
        
        <?php } ?>
    
    </table>
           
    </div>
        <br>
            
<div class="footer">  <h2> Thank You For Your Time ! ! ! </h2> 

    
    <h3> <a href="home.php"> GO HOME ? </a> </h3>
    
         <h3> Do You Wish To Logout ? Click <a href="log_out.php"> Here </a> </h3>
    
    </div> 
    
</body>

</html>