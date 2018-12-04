<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Create a Post - Ok Food Hub Marketplace';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");



?>
<section id="create-edit-post-page">



<div class="container">


    <div class="page-header-create-edit-post smmargin">
        <h1 class="h2-daft white"><i class="fas fa-pencil-alt page-header-icon"></i>create/edit post</h1>
    </div>

    <form action="/products/add.php" method="post" enctype="multipart/form-data">


            <div class="row">
                <div class="col-md-4">
                    <div class="img-size-wrapper">
                        <img id="img-preview" class="img-fluid addmarg" src="/assets/images/upload-photo-grey light.png">
                    </div><!--img-size-wrapper-->

                    <div class="text-center margin-neg">
                        <input type="file" name="fileToUpload" onchange="previewFile()" id="file-profile" class="inputfile" required>
                        <label for="file-profile"><i class="fas fa-upload upload-icon"></i> Choose a file</label>
                    </div><!--file-wrapper-->

                </div><!--col-sm-4-->

                <div class="col-md-8">
                    <div class="form-group">
                      <select name="product_type" class="form-control form-text-create-edit" id="exampleFormControlSelect1">
                        <option  value="" disabled selected>what type of goods are you selling? (select one)</option>
                        <option >produce</option>
                        <option >meat</option>
                        <option >dairy</option>
                        <option >grain</option>
                      </select>
                  </div>

                  <div class="form-group">
                    <input class="form-control input-create-edit-post" type="text" name="product_name" placeholder="product name">
                </div>

                <div class="row">
                    <div class="col-md-4" id="price-field-col">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" name="price" class="form-control price-create-edit-post" placeholder="price">
                        </div>
                    </div><!--col-sm-4-->

                    <div class="col-md-8">
                        <select name="measure" class="form-group form-control form-text-create-edit" id="exampleFormControlSelect1">
                          <option value="" disabled selected>unit measure (select one)</option>
                          <option>per pound (lb)</option>
                          <option>per ounce (oz)</option>
                          <option>per piece (each)</option>
                          <option>per dozen (12 pieces)</option>
                        </select>


                    </div><!--col-sm-8-->
                </div><!--row-->

                <select name="location" class="form-group form-control form-text-create-edit" id="exampleFormControlSelect1">
                  <option value="" disabled selected>pickup location</option>
                  <option>west kelowna</option>
                  <option>kelowna (main)</option>
                  <option>east kelowna</option>
                  <option>penticton</option>
                  <option>kamloops</option>
                  <option>vernon</option>
                </select>

                <textarea class="form-group form-control input-create-edit-post-des" name="description" placeholder="description"></textarea>

                <input class="btn-custom-solid btn" type="submit" value="submit">

                <br>
                <br>



                </div><!--col-sm-8-->

            </div><!--row-->
</form><!--END FORM-->














</div><!--container-->



</section><!--create-edit-post-page-->



<?php require_once("../elements/footer.php");
