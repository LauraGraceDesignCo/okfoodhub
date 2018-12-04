<?php
require_once '../../core/includes.php';


if( !empty($_POST['product_type']) && !empty($_POST['product_name']) && !empty($_POST['price']) && !empty($_POST['measure']) && !empty($_POST['location']) && !empty($_POST['description']) ){ //Form was submitted


    // Add new project to db
    $p = new Product;
    $p->add();


}

header("Location: /marketplace.php"); //they will have been redirected here and then they will snap back to the homepage
