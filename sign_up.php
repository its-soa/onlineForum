<?php

session_start();

include("db/db_config.php");

?>


<html>
<head>
<title> La Toya | Sign_Up </title>
<link rel="stylesheet" type="text/css" href="styles/signup.css">

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
                <li> <a href="login.php"> Sign-In </a> </li>

           </ul>
      </div>  <!-- end of links -->

    <div id="empty"></div>  
    
  <div class="subhead">  
    <h1> Chat Hub Sign Up Page </h1>
  
  </div>  

    

    <?php
    
    if (array_key_exists('register', $_POST)) {
        
        $error = array();
        
    if (empty($_POST['full_name'])) {
        
        $error[] = "*Please Input Your Full Name";
    } else{
        $fullname = mysqli_real_escape_string($db, $_POST['full_name']);
    }
        
    if (empty($_POST['user_n'])) {
        
        $error[] = "*Please Input Your Desired Username";
    } else{
        
        $user_name = mysqli_real_escape_string($db, $_POST['user_n']);
    }
        
    if (empty($_POST['gender'])) {
        
        $error[] = "*Please Indicate Gender";
    } else{
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
    }
        
    if (empty($_POST['email'])) {
        
        $error[] = "*Please Input Your Email Address";
    }else {
        
        $email = mysqli_real_escape_string($db, $_POST['email']);
    }
        
    if (empty($_POST['p_word'])) {
        
        $error[] = "*Please Input Your Password";
    } else{
        
        $password = md5(mysqli_real_escape_string($db, $_POST['p_word']));
    }
        
    if (empty($error)) {
        
       $insert = mysqli_query($db, "INSERT INTO users 
                            
                            VALUES ( NULL,
                            '".$fullname."',
                            '".$user_name."',
                            '".$gender."',
                            '".$email."',
                            '".$password."'
                                        
                                        )
                                        ") or die(mysqli_error($db));
        
        header("location:login.php");
        
    } else{
        foreach($error as $error) {
            echo "<p style='color: palevioletred; padding: 2px; margin-top: 10px; text-align: center;'>".$error."</h4> <br/>";
        }
    }
             
   
}
        
?>
   <div class="content"> 

<div class="form"> 
<form method="post">

<p> <strong> 
<label for="full_name"> Full Name : </label> 
</strong> </p>    

<input type="text" name="full_name" id="full_name" placeholder="Full Name" />
    
<p> <strong> 
<label for="user_n"> Username : </label> 
</strong>  </p>

<input type="text" name="user_n" id="user_n" placeholder="Username" />
       
<p> <strong> 
<label for="email"> Email : </label>
</strong> </p>

<input type="email" name="email" id="email" placeholder="Email" />
    
<p> <strong> 
<label for="p_word"> Password : </label>   
</strong> </p>

<input type="password" name="p_word" id="p_word" placeholder="password" />

<p> <strong> 
<label for="gender"> Gender : </label>
</strong> </p>

Male <input type="radio" name="gender" id="gender" value="Male" class="gender" />
Female <input type="radio" name="gender" id="gender" value="Female" class="gender" />
              
<h2 id="submit"> <input type="submit" name="register" value="Register"/>  </h2>
    
</form>

</div>
</div>

    
</div>    
</header>
</body>

</html>