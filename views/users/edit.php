<?php  require_once("../../core/includes.php");

$u = new User;

$edit_acc_message = '';

//saving logic - checking to see if it was submitted if it was - update database
if( !empty($_POST)){ // check if form was submitted



    $exists = $u->edit_exists();


    if( empty($exists)) { //user does not exist
        $u->edit();
        header('Location: /marketplace.php');
        exit();

    }else{
       $edit_acc_message = '<p class="text-danger">* email already exists</p>';

    }





}

$user = $u->get_by_id($_SESSION['user_logged_in']);


    // unique html head vars
    $title = 'Edit Profile - Ok Food Hub Marketplace';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");


?>



<section id="edit-post-page">



<div class="container">


    <div class="page-header-create-edit-post smmargin">
        <h1 class="h2-daft white"><i class="far fa-user page-header-icon"></i>edit profile</h1>
    </div>


    <div >


        <form method="post" enctype="multipart/form-data">

            <div class="row">


                <div class="col-md-4">
                    <div class="edit-prof-img-wrapper">
                        <img id="img-preview" class="img-fluid addmarg radius-img-preview" src="/assets/files/<?=(!empty($user['filename_profile']) ? $user['filename_profile'] : 'profile-photo-placement.png' ) ?>">
                    </div><!--edit-prof-img-wrapper-->

                    <div class="text-center margin-neg">
                        <input type="file" name="fileToUpload" onchange="previewFile()" id="file-profile" class="inputfile" >
                        <label for="file-profile"><i class="fas fa-upload upload-icon"></i> Choose a file</label>
                    </div><!--file-wrapper-->

                </div><!--col-sm-4-->




                <div class="col-sm-8">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control input-create-edit-post" type="text" name="firstname" placeholder="first name" value="<?=$user['firstname'] ?>" required>
                            </div>
                        </div><!--col-sm-6-->


                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control input-create-edit-post" type="text" name="lastname" placeholder="last name" value="<?=$user['lastname'] ?>" required>
                            </div>
                        </div><!--col-sm-6-->

                    </div><!--row-->




                    <div class="form-group">
                        <input class="form-control input-create-edit-post" type="email" name="email" placeholder="email" value="<?=$user['email'] ?>" required>
                        <?=$edit_acc_message?>
                    </div>



                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="password1" class="form-control input-create-edit-post" type="password" name="password" placeholder="Password, Leave empty to keep same">
                            </div>
                        </div><!--col-sm-6-->


                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="password2" class="form-control input-create-edit-post" type="password" placeholder="confirm password">
                                <p id="passMessage"></p>
                            </div>
                        </div><!--col-sm-6-->

                    </div><!--row-->


                    <label class="grey question-index">Are you buying goods and/or selling goods?</label> <br>

                        <label class="radio-inline mr-3 radio-text-edit"><input class="mr-1" type="radio" name="buySell" value="1" <?=$user['buySell'] == 1 ? "checked" : ""?>> buying</label>

                        <label class="radio-inline radio-text-edit"><input class="mr-1" type="radio" name="buySell" value="0" <?=$user['buySell'] == 0 ? "checked" : ""?>> buying + selling</label>

                        <br><br>

                        <input class="btn-custom-solid btn" type="submit" value="save changes">


                </div><!--col-sm-8-->
        </div><!--row-->

</form><!--END FORM-->



</div><!--container-->



</section><!--edit-post-page-->







<?php require_once("../../elements/footer.php");
