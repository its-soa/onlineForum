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


//echo "WELCOME $fullname ";

?>

<html>
<head>
<title> La Toya| Sport Lovers </title>
<style>
    
    body{
         background-image: url(fashion/f.jpeg);
        color: snow;
        text-align: center;
    }
    
    h1{
        text-align: center;
        font-size: 40px
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
    
    .table{
        color: firebrick;
         border: 2px solid palevioletred;
        width: 900px;
        margin-left: 200px;
        background: #e3e3e3;
    }
    
    .footer{
        color: snow;
    }
    
    
</style>

</head>
    
<body>
    
    <br> <h1> La Toya Sports Page </h1> <br>
    
        <div class="links">

        
          <a href="music.php"> Music Lovers |</a>
         <a href="movies.php"> Movie Lovers |</a>
         <a href="fashion.php"> Fashion Lovers |</a>
        <a href="sports.php"> Sport Fans</a> 
    
    </div> <br> <br>
    
    <?php  echo "<h3> <marquee> WELCOME $fullname </marquee></h3>";  ?>
    
   <h2> Welcome To Our Sports Hub</h2>
    
    <h3> An Avenue Where Sport Lovers Get To Interact </h3>
    

<div >     
    <?php
    
    $select = mysqli_query($db, "SELECT * FROM posts WHERE category_id = 4
    
                                ") or die(mysqli_error($db));
    
    
    ?>
    
    
    
    
    
    <table border="1" class="table">
    
    <tr>
   <!-- <th> <h3> Category ID </h3></th>  -->  
    <th> <h3> Posts </h3></th>
   <!--  <th> <h3> Posts ID </h3></th>  
    <th> <h3> Posted By </h3> </th> -->
     <th> <h3>  Time Posted </h3></th>
    <th> <h3>  Add a comment </h3></th> 
        
    </tr>
        
    <tr> <?php while($result = mysqli_fetch_array($select)) { ?>
        
     <!--   <td> <?php //echo $result['category_id'] ?>  </td> -->
        <td> <?php echo $result['post_content'] ?>  </td>
      <!--   <td> <?php //echo $result['post_id'] ?>  </td> -->
      <!--  <td> <?php// echo $result['user_id'] ?>  </td> -->
        <td> <?php echo $result['post_date'] ?>  </td>
    <td> <?php echo '<a href=comments.php?post_id='.$result['post_id'].'&&cat_id='.$result['category_id'].'> Add Comment </a>'; ?> </td>  
        
    </tr>
        
        <?php } ?>
    
    </table>
    
     </div>
    
   <div class="footer"> 
     <h2> Thank You For Your Time ! ! ! </h2> 
    
    <h3> Would You Like To Add A Post ?</h3>
        
           <?php
    
    $select_cat = mysqli_query($db, "SELECT * FROM categories WHERE category_id = 4
    
                                ") or die(mysqli_error($db));
        
        if(mysqli_num_rows($select_cat) == 1) {
            
            $cat_cat = mysqli_fetch_array($select_cat);
        }
    
       //  while($fetch_cat = mysqli_fetch)
        
    ?>
        
        
    
    <h4> Click <?php echo '<a href=post.php?cat_id='.$cat_cat['category_id'].'&cat_name='.$cat_cat['category_name'].'> Here </a>'; ?> </h4>
    
        
 
    <br> <h3> Do You Wish To Go To The Home Page ? Click <a href="home.php"> Here </a> </h3>
       
       <br>  <h3> Do You Wish To Logout ? Click <a href="log_out.php"> Here </a> </h3> <br>
    
    </div>
    
    
    
    

    
</body>

</html>