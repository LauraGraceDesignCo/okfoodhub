<?php
class User extends Db {

    // function get_all(){
    //
    //     $sql = "SELECT * FROM `users`";
    //
    //     $users = $this->select($sql);
    //
    //     return $users;
    //
    // }

    function add(){
        $firstname = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);
        $email = trim($this->data['email']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $buySell = $this->data['buySell'];



        $sql = "INSERT INTO users (firstname, lastname, email, password, buySell) VALUES ('$firstname', '$lastname', '$email', '$password', '$buySell')";

        //empties out session - as i have the email already exists messages
        $_SESSION = array();

        $new_user_id = $this->execute_return_id($sql);

        return $new_user_id;




    }

    //check to see if user already exists
    function exists() {

        $email = $this->data['email'];

        $sql= "SELECT * FROM users WHERE email = '$email'";

        $user = $this->select($sql);

        return $user;


    }



    //check to see if user email already exists
    function edit_exists() {

        $id = (int)$_SESSION['user_logged_in'];
        $email = $this->data['email'];

        $sql= "SELECT * FROM users WHERE email = '$email' AND id != '$id'";

        $user = $this->select($sql);




        return $user;

    }


    function login(){
        $_SESSION = array(); //Empty session to start fresh

      //get the users details from the db and store it in a variable
      $email = $this->data['email'];

      $sql = "SELECT * FROM users WHERE email = '$email'";

      $user = $this->select($sql)[0]; //we know we are only going to get one back, so we will put the zero index there.

      //now we have all the credentials for the user

      //check if the password from the form matches the password from db
      if(password_verify($_POST['password'], $user['password']) ){ //this is the function that verifies it against the password hash function.

          $_SESSION['user_logged_in'] = $user['id']; //now the user with that id is logged in

          // //redirect back to marketplace
          header("Location: /marketplace.php");
          exit();

      }else{//login attempt failed.

          $_SESSION['login_attempt_msg'] = '<p class="text-danger">* Incorrect Username and/or password</p>';
          $_SESSION['remember_email'] = $_POST['email'];






          //// //redirect back to index
          header("Location: /?login_error=unauthorized");
          exit();
      }


    }


    function get_by_id($id){
        $id = (int)$id; //the int forces whatever gets put in there to be a number and if not there is an error - it is a type of sql prevention

        $sql = "SELECT * FROM users WHERE id = '$id'";

        $user = $this->select($sql)[0]; //because we are only bringing back one id back we put the zero index on it now

        return $user;

    }


    function edit(){

        $id = (int)$_SESSION['user_logged_in'];
        $firstname = trim($this->data['firstname']);
        $lastname = trim($this->data['lastname']);
        $email = trim($this->data['email']);
        $password = password_hash(trim($this->data['password']),PASSWORD_DEFAULT);
        $buySell = $this->data['buySell'];


        $filename_query = '';


        if( !empty($_FILES['fileToUpload']['name']) ){ // if new file was submitted

            //you have to create a new instance of the util object, then call the function
            $util = new Util;
            $filename_profile = $util->file_upload();

            $filename_query = ", filename_profile='$filename_profile' ";
        }



        //if they put a password in
        if ( !empty( trim($_POST['password'])) ){ //new password entered
            $sql = "UPDATE users SET password='$password', firstname='$firstname', lastname='$lastname', email='$email', buySell='$buySell' $filename_query WHERE id='$id' ";

        }else{//no new password entered
            $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname',email='$email', buySell='$buySell' $filename_query WHERE id='$id' ";
        }

        $this->execute($sql);

    }



}
