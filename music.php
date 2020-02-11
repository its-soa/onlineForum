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
<title> La Toya| Music Page </title>
<style>
    
    body{
         background-image: url(fashion/i.jpeg);
        color: maroon;
    }
    
    h1{
        text-align: center;
        font-size: 40px;
        
    }
    
        img{
        padding-left: 600px;
        height: 300px;
        width: 400px;
        
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
        border: 2px solid palevioletred;
        width: 900px;
        margin: 15px 200px;
    }
    
    .footer{
        text-align: center;
        text-align: center;
    }
    h2{
        text-align: center;
    }

        #tab{
          background: #e3e3e3;
          width: 900px;

    }
    
    .table, .img{
        float: left;
    }
    
    .footer{
        clear: both;
        
    }
    
    
</style>

</head>
    
<body>
    <br> <h1> La Toya Music Page </h1> <br>
    
        <div class="links">

        
          <a href="music.php"> Music Lovers |</a>
         <a href="movies.php"> Movie Lovers |</a>
         <a href="fashion.php"> Fashion Lovers |</a>
        <a href="sports.php"> Sport Fans</a> 
    
    </div> <br>
    
    <?php  echo "<h3> <marquee> WELCOME $fullname </marquee></h3>";  ?>
    
   <h2> Welcome To Our Music Hub</h2>
    <br>
    <h3> An Avenue Where Music Lovers Get To Interact </h3>
    
        
   <!--  
    <br> <h3> Do You Wish To Go To The Home Page ? Click <a href="home.php"> Here </a> </h3> -->
 
    <?php
    
    $select = mysqli_query($db, "SELECT * FROM posts WHERE category_id = 3
    
                                ") or die(mysqli_error($db));
    
    
    ?>
    
    
    
    <div class="table">
    
    <table border="1" id="tab">
    
    <tr>
        
        
   <!--  <th> <h3> Posts Id </h3></th> 
    <th> <h3> Posted By </h3> </th> -->
     <th> <h3>  Time Posted </h3></th>
       <th> <h3> Posts </h3></th>
    <th> <h3>  Add a comment </h3></th>
    </tr>
        
    <tr> <?php while($result = mysqli_fetch_array($select)) { ?>
        
           
        
    <!--    <td> <?php //echo $result['post_id'] ?>  </td> 
        <td> <?php// echo $result['user_name'] ?>  </td> -->
        <td> <?php echo $result['post_date'] ?>  </td>
          <td> <?php echo $result['post_content'] ?>  </td>
         <td> <?php echo '<a href=comments.php?post_id='.$result['post_id'].'&&cat_id='.$result['category_id'].'> Add Comment </a>'; ?> </td> 
        
    </tr>
        
        <?php } ?>
    
    </table>
    
    </div>
    
   <!--      <div class="img"> <img src="fashion/s.jpeg"> </div> <br> <br> <br>
    
    <br> <br>  -->
        
    <div class="footer"> 
        
        <br> <br>
     <h2> Thank You For Your Time ! ! ! </h2> 
    
    <h3> Would You Like To Add A Post ?</h3>
        
           <?php
    
    $select_cat = mysqli_query($db, "SELECT * FROM categories WHERE category_id = 3
    
                                ") or die(mysqli_error($db));
        
        if(mysqli_num_rows($select_cat) == 1) {
            
            $cat_cat = mysqli_fetch_array($select_cat);
        }
    
    
        
    ?>
        <!-- i AM MAKING A CHANGE HERE.-->
    
    <h4> Click <?php echo '<a href=post.php?cat_id='.$cat_cat['category_id'].'&cat_name='.$cat_cat['category_name'].'> Here </a>'; ?> </h4>
    
        
 
 <h3> Do You Wish To Go To The Home Page ? Click <a href="home.php"> Here </a> </h3>
        
         <br>  <h3> Do You Wish To Logout ? Click <a href="log_out.php"> Here </a> </h3><br>
        
    
    
    </div>
    
    
    
    
    
    

    
</body>

</html>