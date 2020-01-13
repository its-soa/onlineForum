 <?php 

// session_start();

include("db\db_config.php");

   /* if (!isset($_SESSION['fullname']) && !isset($_SESSION['user_id'])) {
        
    $err = "Please Login Before You Access This Page";
        header("location:login.php?Please Login First");
        
    echo $err;
        
    }

            
      $username = $_SESSION['user_id'];
      $fullname = $_SESSION['fullname'];

*/

?>



<html>
<head>
<title> Chat Hub | Index Page </title> 
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
                <li> <a href="login.php"> Sign-In </a> </li>
                <li> <a href="sign_up.php"> Sign-Up </a> </li>

            </ul>
        </div>  <!-- end of links -->

        <div id="empty"></div>
       
       <div class="subhead">
            <h1> Welcome To Chat Hub Online Forum</h1>
            <h2>  Hub Of Entertainment Lovers ! ! ! </h2>

        </div>
    </header>
    
</body>    
</html>