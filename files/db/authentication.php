<?php

include("db_config.php");

function authentication(){
    
    if (!isset($_SESSION['full_name']) && !isset($_SESSION['user_id'])) {
        
    $err = "Please Login Before You Access This Page";
        header("location:login.php");
        
    
        
    }
}


?>

