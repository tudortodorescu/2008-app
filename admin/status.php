<?php

    session_start();
    include 'functions.php';
    $user = new User();
    if (!$user->get_session()) header("Location: login.php");
   
    if (isset($_GET['id']) && !empty($_GET['id'])
            && isset($_GET['table']) && !empty($_GET['table'])) {
       
        $className = ucfirst($_GET['table']);
        $classObj = new $className; 
        $classObj->changeStatusById($_GET['id']);
        header("Location: ".$_GET['redirect']);
        
    } else {
        header("Location: index.php");
    }
    
