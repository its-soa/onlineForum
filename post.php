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

//echo "WELCOME $fullname with User Id $username ";

if(isset($_GET['cat_id']) && isset($_GET['cat_name'])) {
$id = $_GET['cat_id'];
$name = $_GET['cat_name'];
    
}

?>


<html>
<head>
<title> La Toya| Add A Post</title>
<style>
    
     body{
         background-image: url(fashion/z.jpeg);
        color: maroon;
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
          padding-left: 300px;
          text-transform: uppercase;
        padding-right: 30px;
        letter-spacing: 1px;
    }

    .links a{
        font-size: 24px;
    }    
    .content{
        text-align: center;
    }
    
    .footer{
        text-align: center;
    }
    .loop{
        color: rebeccapurple;
        background-color: white;
    }
        
    
</style>

</head>
    
<body>
    
        <br> <h1> La Toya Add A Post Page </h1> <br>
    
        <div class="links">

        
          <a href="music.php"> Music Lovers |</a>
         <a href="movies.php"> Movie Lovers |</a>
         <a href="fashion.php"> Fashion Lovers |</a>
        <a href="sports.php"> Sport Fans</a> 
    
    </div> <br> <br>
    
    <h3> Please Ensure You Click On One Of The Categories below</h3>
    

    <div class="content"> 

   <?php
    
        //echo "Category Id: ".$id.'<br/>';
        //echo "Category Name: ".$name."<br/>";
    
    ?>
    
  
    
    
    <?php
    
    if (array_key_exists('post', $_POST)){
        
        $error = array();
        
        
        if (empty($_POST['post_content'])) {
            $error[] = "Please Write a post First";
        } else{
            $post_content = mysqli_real_escape_string($db, $_POST['post_content']);
        }
        
      if (empty($error))  {
          
          $query = mysqli_query($db, "INSERT INTO posts VALUES
                                    (NULL,
                                    NOW(),
                                    '".$post_content."',
                                    '".$username."',
                                    '".$id."'
                                    
                                    )
          ") or die(mysqli_error($db));
          
          header("location:redirect.php?cat_id=$id &cat_name=$name");
          

          
         // header("location:post.php?id=$id&name=$name");
      
      } else{
        foreach($error as $error) {
            echo "<h4 style = 'color: red' > ".$error."</h4> <br/>";
        }
    }
             
         
    }
    
    ?>
    
    <form action="" method="post">
    
    <!--<form action="post.php?id= <?php //echo $id ?>&name=<?php //echo $name ?>" method="post"> -->
    
<br>
    <p>
    <textarea rows="20px" cols="50px" placeholder="Write Your Post Here" name="post_content"> </textarea>
    </p>
    <br> <br>
    <input type="submit" name="post" value="post" />
    
    
</form>  
    
    
  </div>  
    
    <div class="footer">
    
  <h2> Thank You For Your Time ! ! ! </h2> 
    
       <h3> To Go Home, Click <a href="home.php"> Here </a> </h3>
    
    <br> <h3> Do You Wish To Logout ? Click <a href="log_out.php"> Here </a> </h3>
    
  </div>
    
    
</body>

</html>