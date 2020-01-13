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

    if(isset($_GET['post_id']) && isset($_GET['cat_id'])) {
        
$post_id = $_GET['post_id'];
        
$cat_id = $_GET['cat_id'];
        
    }

/*echo "WELCOME $fullname ";  

echo "<p> Your post ID is ".$post_id."</p>";

echo "<p> Your Category ID is ".$cat_id."</p>"; */

?>

<html>
<head>
<title> La Toya| Comments </title>
<style>
    
        
     body{
         background-image: url(fashion/r.jpeg);
        color: maroon;
         
    }
    
    h1{
        text-align: center;
        font-size: 40px;
    }
    
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
    
        .table{
        color: maroon;

        padding-left: 300px;
    }
    #tab{
          width: 600px; 
        border: 1px solid palevioletred;
    }
    
    #footer{
        text-align: center;
    }
    
    .comment{
        padding-left: 20px;
    }
 
</style>     

</head>
    
<body>
            
        <br> <h1> La Toya Comments Page </h1> <br>
    
        <div class="links">

        
          <a href="music.php"> Music Lovers |</a>
         <a href="movies.php"> Movie Lovers |</a>
         <a href="fashion.php"> Fashion Lovers |</a>
        <a href="sports.php"> Sport Fans</a> 
    
    </div> <br> <br>
 
    
    <?php
    
    
    if (array_key_exists('upload', $_POST)) {
        
        $error = array();
        
        if (empty($_POST['comments'])) {
            
            $error[] = "Please Write a Comment";
        } else{
            $comments = mysqli_real_escape_string($db, $_POST['comments']);
        }
        
        if (empty($error)) {
            
            $insert = mysqli_query($db, "INSERT INTO comments VALUES (
                                            NULL,
                                            NOW(),
                                            '".$comments."',
                                            '".$username."',
                                            '".$cat_id."',
                                            '".$post_id."'
                                            
                                        )
                                            ") or die (mysqli_error($db));
            
                        header("location:#");
    
            
   /*       <?php echo header("location:comments.php?post_id=$result['post_id']&cat_id=$result['category_id']");  ?>  */
        
        }
        
    }
    
    
    
    ?> 
    
    <div class="table"> 
    
    <table border="1" id="tab">
        <tr> 
        <th> Previous Comments </th>
        <th> Time Posted </th>
      <!--  <th> Commented By</th> -->
    
        </tr>
        <?php 
    
    $select = mysqli_query($db, "SELECT * FROM comments WHERE post_id = '".$post_id."' AND category_id = '".$cat_id."' ") or die(mysqli_error($db)); 
        
        ?>         
        <tr> <?php while($result = mysqli_fetch_array($select)) { ?>
        
        <td> <?php echo $result['comments'] ?> </td>
        <td> <?php echo $result['comment_date'] ?> </td>
   <!--     <td> <?php // echo $result['user_id'] ?> </td> -->
        
        </tr>
    
    <?php } ?>
      
    
    </table> </div>
    
    <br> <br>   <br> <br> <br> <br>
     <br> <br>   <br> <br> <br> <br>
    
    <div class="comment"> 
    
    <form action="" 
          
          method="post"> 
    
    <textarea rows="10" cols="40" name="comments"> </textarea> <br> <br>
        
    <input type="submit" name="upload" value="Upload" />
    
    
    
    </form> </div>
    
    <div id="footer"> <br> <br>
    
  <h2> Thank You For Your Time ! ! ! </h2> 
        

        
    <br> <h3> Do You Wish To Go To The Home Page ? Click <a href="home.php"> Here </a> </h3>
    
    <h3>Log out ? Click <a href="log_out.php"> Here </a> </h3>
    

   </div> 
    
    
    
 
</body>
</html>