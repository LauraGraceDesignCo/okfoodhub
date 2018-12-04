<?php
// For functionality like checking if a user is an admin before page is loaded

if (empty($_SESSION['user_logged_in']) ){ // user not logged in

    //redirect people if they aren't logged in

    //allowed logged out functionality
    $allowed_urls = array(
        '/',
        '/?restricted_area=not-logged-in',
        '/marketplace.php',
        '/users/login.php',
        '/users/add.php',
        '/?signup_error=email-exists',
        



    );

    $allowed = false;

    foreach($allowed_urls as $allowed_url){
        if( $_SERVER['REQUEST_URI'] == $allowed_url){
            $allowed = true;
            break;
        }
    }

    if($allowed === false){
        header('Location: /?restricted_area=not-logged-in'); //if logged out we are going to redirect them to homepage
        $_SESSION['restricted_area_msg'] = '<p class="must-log-in">* you must be logged in to perfom that function</p>';
    }



}else{//user logged in



}
