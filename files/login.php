<?php 

session_start();

include ("db/db_config.php");
?>

<html>
<head>
<title> La Toya | Login</title>
<link rel="stylesheet" type="text/css" href="styles/main.css">
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
                <li> <a href="sign_up.php"> Sign-Up </a> </li>

           </ul>
      </div>  <!-- end of links -->

    <div id="empty"></div>  
    
  <div class="subhead-login">  
    <h1> Chat Hub Login Page </h1>
  
   <!--  <h2> Are You a New User? Do <a href="sign_up.php"> Sign_Up </a>  To Access Our Main Website. </h2>
    
    <h2> If Not, Kindly Input Your Details Below.</h2> -->
    
  </div>    
    
    
    <?php
    
  if (array_key_exists('login', $_POST)) {
      $error = array();
      
      if (empty($_POST['user_n'])){
          
          $error[] = "*Please Input Your Username";
      } else {
          $user_name = mysqli_real_escape_string($db, $_POST['user_n']);
      }
      
      if (empty($_POST['p_word'])) {
          
          $error[] = "*Please Input Your Password"; 
      }else{
          $password = md5(mysqli_real_escape_string($db, $_POST['p_word']));
      }
      
    if (empty($error)) {
        
        $query = mysqli_query($db, "SELECT * FROM users WHERE user_name = '".$user_name."' AND password = '".$password."'
        
        ") or die(mysqli_error($db));
        
        //echo mysqli_num_rows($query);
        
       if (mysqli_num_rows($query) == 1) {
            
            $fetch = mysqli_fetch_array($query);
            
            $_SESSION['user_id'] = $fetch['user_id'];
            $_SESSION['fullname'] = $fetch['fullname'];
            
            header("location:home.php");      
        
        } else {
            $err = "Invalid Registration";
            
            header("location:login.php?Please Login Again");
            
            echo $err;
        }   
        
    } else {
        
        foreach ($error as $error) {
            echo "<p style='color: palevioletred; padding: 2px; margin-top: 10px; text-align: center;'>".$error."</p>";
        }
    }  
          
      
  }

    ?>
  
 
<div class="content"> 
<div class="form"> 

<form method="post">

<p>
<label for="user_n"> Username : </label>   
</p>    
<input type="text" name="user_n" id="user_n" placeholder="username" />

    
<p>
<label for="p_word"> Password : </label>    
</p>  
<input type="password" name="p_word" id="p_word" placeholder="password" />
       
<h2 id="submit"> <input type="submit" name="login" value="Login" placeholder="password"/> </h2>
    
</form> 

 </div>
</div>

<!-- <div class="foot">
    <h4 id="ref"> 
        Are You a New User? Do <a href="sign_up"> Sign_Up </a> To Access Our Main Website 
    </h4>
    
    <h4 class="ref">
        Copyright &copy 2019.
    </h4>
    
</div> -->
</header>
</body>

</html>