<?php  require_once("../../core/includes.php");


if( !empty($_GET) ){//check url has something in it

//we got the id in the url, by putting it there in marketplace.php dynamically when the user clicked edit post
$p = new Product;
$product = $p->get_by_id($_GET['id']);

    if( !empty($_POST) ){
        $p->edit($_GET['id']);
        header("Location: /marketplace.php");
        exit();
    }

}else{
    header("Location: /");
    exit();
}


// unique html head vars
$title = 'Edit a Post - Ok Food Hub Marketplace';
require_once("../../elements/html_head.php");
require_once("../../elements/nav.php");
?>
<section id="create-edit-post-page">



<div class="container">


    <div class="page-header-create-edit-post smmargin">
        <h1 class="h2-daft white"><i class="fas fa-pencil-alt page-header-icon"></i>edit post</h1>
    </div>

    <form method="post" enctype="multipart/form-data">


            <div class="row">
                <div class="col-md-4">
                    <div class="img-size-wrapper">
                        <img id="img-preview" class="img-fluid addmarg" src="/assets/files/<?= !empty($product['filename']) ? $product['filename'] : 'upload-photo-grey light.png'?>">
                    </div><!--img-size-wrapper-->

                    <div class="text-center margin-neg">
                        <input type="file" name="fileToUpload" onchange="previewFile()" id="file-profile" class="inputfile">
                        <label for="file-profile"><i class="fas fa-upload upload-icon"></i> Choose a file</label>
                    </div><!--file-wrapper-->

                </div><!--col-sm-4-->

                <div class="col-md-8">
                    <div class="form-group">
                      <select name="product_type" class="form-control form-text-create-edit" id="exampleFormControlSelect1">

                          <?php

                          $prodTypeOptions = array(
                              'produce',
                              'meat',
                              'dairy',
                              'grain',

                          );

                          $selected = '';

                          foreach ( $prodTypeOptions as $prodTypeOption ){
                              if ( $product['product_type'] == $prodTypeOption){
                                  $selected = 'selected';
                              }else{
                                  $selected = '';
                              }

                              echo '<option ' .$selected. '>' . $prodTypeOption . '</option>';
                          }

                          ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <input class="form-control input-create-edit-post" type="text" name="product_name" placeholder="product name" value="<?=$product['product_name'] ?>">
                </div>

                <div class="row">
                    <div class="col-md-4" id="price-field-col">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input type="text" name="price" class="form-control price-create-edit-post" placeholder="price" value="<?=$product['price'] ?>">
                        </div>
                    </div><!--col-sm-4-->

                    <div class="col-md-8">
                        <select name="measure" class="form-group form-control form-text-create-edit" id="exampleFormControlSelect1">
                            <?php

                            $measureOptions = array(
                                'per pound (lb)',
                                'per ounce (oz)',
                                'per piece (each)',
                                'per dozen (12 pieces)',

                            );

                            $selected = '';

                            foreach ( $measureOptions as $measureOption ){
                                if ( $product['measure'] == $measureOption){
                                    $selected = 'selected';
                                }else{
                                    $selected = '';
                                }

                                echo '<option ' .$selected. '>' . $measureOption . '</option>';
                            }

                            ?>
                        </select>


                    </div><!--col-sm-8-->
                </div><!--row-->

                <select name="location" class="form-group form-control form-text-create-edit" id="exampleFormControlSelect1">
                    <?php

                    $locationOptions = array(
                        'west kelowna',
                        'kelowna (main)',
                        'east kelowna',
                        'penticton',
                        'kamloops',
                        'vernon',

                    );

                    $selected = '';

                    foreach ( $locationOptions as $locationOption ){
                        if ( $product['measure'] == $locationOption){
                            $selected = 'selected';
                        }else{
                            $selected = '';
                        }

                        echo '<option ' .$selected. '>' . $locationOption . '</option>';
                    }

                    ?>
                </select>

                <textarea class="form-group form-control input-create-edit-post-des" name="description" placeholder="description"><?=$product['description'] ?></textarea>

                <input class="btn-custom-solid btn" type="submit" value="submit">

                <br>
                <br>



                </div><!--col-sm-8-->

            </div><!--row-->
</form><!--END FORM-->














</div><!--container-->



</section><!--create-edit-post-page-->



<?php require_once("../../elements/footer.php");
