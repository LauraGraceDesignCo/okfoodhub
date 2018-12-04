<?php

class Product extends Db {

    function add(){
        //collect all user input
        $product_type = $this->data['product_type'];
        $product_name = $this->data['product_name'];
        $price = $this->data['price'];
        $measure = $this->data['measure'];
        $location = $this->data['location'];
        $description = $this->data['description'];
        $user_id = (int)$_SESSION['user_logged_in']; //we can just get the user id from the session because we have already recorded it from when they logged in
        //(int) will ensure that anything in there will be numbers. if there happens to be other characters, it'll remove them (its a lazy sql prevention)




        //you have to create a new instance of the util object, then call the function
        $util = new Util;
        $filename = $util->file_upload();


        //names here are COLUMN names from table database on cpanel
        $sql = "INSERT INTO projects (product_type, product_name, price, measure, location, description, user_id, filename) VALUES ('$product_type', '$product_name', '$price', '$measure', '$location', '$description', '$user_id', '$filename')";

        $this->execute($sql); //execute sends it to database


    }


    function get_all(){

        $sql = "SELECT projects.* , users.firstname, users.lastname, users.filename_profile FROM projects LEFT JOIN users ON projects.user_id = users.id ";

        $products = $this->select($sql);

        return $products;



    }


    function get_by_id($id){

    $id = (int)$id; //the int forces whatever gets put in there to be a number and if not there is an error - it is a type of sql prevention

    $sql = "SELECT * FROM projects WHERE id = '$id'";

    $product = $this->select($sql)[0]; //because we are only bringing back one id back we put the zero index on it now instead of later when you are calling them. since you only cal one user in this function.

    return $product;



}


function check_ownership($id){

    $id = (int)$id;

    $sql = "SELECT * FROM projects WHERE id = '$id'";

    $product = $this->select($sql)[0];

    if( $product['user_id'] == $_SESSION['user_logged_in'] ){
        return true;
    }else{
        header("Location: /");
        exit();
    }



}


function edit($id){
     $id = (int)$id;


     $this->check_ownership($id); // make sure user owns post thats being editted

     $product_type = $this->data['product_type'];
     $product_name = $this->data['product_name'];
     $price = $this->data['price'];
     $measure = $this->data['measure'];
     $location = $this->data['location'];
     $description = $this->data['description'];
     $current_user_id = (int)$_SESSION['user_logged_in'];

     //check to see if they uploaded a file
     if ( !empty($_FILES['fileToUpload']['name']) ){ // check if new file was submitted

         //delete old project image file off server
         $old_project_image = trim($this->get_by_id($id)['filename']);
         if( !empty($old_project_image) ){
             if(file_exists(APP_ROOT.'/views/assets/files/'.$old_project_image)){
             unlink(APP_ROOT.'/views/assets/files/'.$old_project_image); //native function to php - very dangerous! it will delete a file! APP_ROOT is a constant
             }
         }

         //add new to database

         $util = new Util;
         $filename = $util->file_upload();//this file uload function will detect whats in the $_FILES array and upload whats in it, and returns what the filename is . the vairable holds the name of the file in it

         $sql = "UPDATE projects SET product_type = '$product_type', product_name = '$product_name', price = '$price', measure = '$measure', location = '$location', description = '$description', filename = '$filename' WHERE id='$id' AND user_id='$current_user_id'";



         $this->execute($sql);

     }else{
         $sql = "UPDATE projects SET product_type = '$product_type', product_name = '$product_name', price = '$price', measure = '$measure', location = '$location', description = '$description' WHERE id='$id' AND user_id='$current_user_id'";

         $this->execute($sql);
     }

 }


 function delete(){
    $current_user_id = (int)$_SESSION['user_logged_in'];
    $id = (int)$_GET['id'];

    //ensure that people only delete posts they own
    $this->check_ownership($id);

    //delete old project image file off server
    $project_image = trim($this->get_by_id($id)['filename']);
    if( !empty($project_image) ){
        if(file_exists(APP_ROOT.'/views/assets/files/'.$project_image)){
        unlink(APP_ROOT.'/views/assets/files/'.$project_image); //native function to php - very dangerous! it will delete a file! APP_ROOT is a constant
        }
    }

    $sql = "DELETE FROM projects WHERE id='$id' AND user_id='$current_user_id' ";
    $this->execute($sql);


    //all you need is an id and it knows to delete the rest of the info



}





}
