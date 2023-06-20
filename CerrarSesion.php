<?php

    session_start();
    // setcookie(session_name(), '', time() - 2, '/');
    session_destroy();    
    header("location: Login/Index.php");    

?>