<?php

require_once '../../core/includes.php';


//check to make sure user filled out all fields required
if( !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])  ){

    $u = new User;
    //
    // $u->add();

    //check if user already exists


      $exists = $u->exists();


      if( empty($exists)) { //user does not exist
         $new_user_id = $u->add();
         $_SESSION['user_logged_in'] = $new_user_id;

         // //redirect back to welcome user
         header("Location: /new-user-welcome.php");
         exit();

      }else{
         $_SESSION['create_acc_msg'] = '<p class="text-danger">* email already exists</p>';
         $_SESSION['remember_firstname'] = $_POST['firstname'];
         $_SESSION['remember_lastname'] = $_POST['lastname'];
         $_SESSION['remember_email'] = $_POST['email'];
         $_SESSION['buySell'] = $_POST['buySell'];







         //putting a query string in there
         header("Location: /?signup_error=email-exists");
         exit();
      }


}


//redirect from white screen of death after $_POST to homepage
header("Location: /");
