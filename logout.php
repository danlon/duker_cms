<?php require_once("includes/functions.php"); ?>
<?php
//4 steps to closing a session

    //1. Find the $_SESSION
    session_start();

    //2. Unset all the session variables
    $_SESSION = array ();

    //3. Destroy the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-20, '/');  // Let our cookie know when to expire
    }
    //4. Destroy the session
    session_destroy();
    
    redirect_to("login.php?logout=1");
    



?>