<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Login - OK Food Hub Marketplace';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");


?>

<div class="container">

    <section id="marketplace">




    <div class="page-header-marketplace">
        <h1 class="h2-daft white"><i class="fas fa-shopping-bag page-header-icon"></i>the marketplace</h1>
    </div>

    <hr class="market-hr">
    <p class="filter-menu-text">filter by</p>
    <hr class="market-hr-2">








<section id="posts">

    <div class="row">


        <?php


        $p = new Product;
        $products = $p->get_all();

        // echo '<pre>' . print_r($products, 1) . '</pre>';
        // die();




        foreach ($products as $product) {


        ?>

        <div class="col-md-3">
            <div class="post-style">
                <div class="row">



                    <?php
                     if($product['user_id'] == $_SESSION['user_logged_in']) { ?>

                    <li class="dropdown pos-abs-menu no-list-style">
                       <a class="dropdown-toggle no-arrow" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-ellipsis-h menu-button"></i>
                       </a>
                       <div class="dropdown-menu user-profile-dropdown-menu-post width-dec" aria-labelledby="navbarDropdown">



                         <a class="dropdown-item" href="/products/edit.php?id=<?=$product['id']?>">edit post</a>
                         <a class="dropdown-item delete-btn" href="/products/delete.php?id=<?=$product['id']?>">delete post</a>
                       </div>
                     </li>

                 <?php } ?>




                        <div class="col-3">
                            <div class="prof-img-wrapper">
                                <img class="post-profile-pic" src="/assets/files/<?= !empty($product['filename_profile']) ? $product['filename_profile'] : 'profile-photo-placement.png'  ?>" alt="profile pics">
                            </div><!--prof-img-wrapper-->
                        </div>

                        <div class="col-9">

                            <div class="profile-name-wrapper">
                                <p class="post-full-name"><?=$product['firstname'] . " " .  $product['lastname'] ?></p>
                                <img class="icon-post" src="/assets/images/icons/icon-produce-grey@2x.png" alt="product types">
                            </div><!--profile-name-wrapper-->
                        </div>


                </div><!--row-->

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-wrapper">
                            <div class="box-shadow">
                                <div class="prod-img-wrapper">
                                    <img class="img-fluid prod-img" src="/assets/files/<?=$product['filename'] ?>" alt="products sold">
                                </div><!--prod-img-wrapper-->
                                    <div class="text-product">
                                        <p class="title-product"><?=$product['product_name'] ?></p>
                                        <p class="price-product"><?='$' . $product['price'] . " " .$product['measure'] ?></p>
                                    </div><!--text-product-->


                            </div><!--box-shadow-->
                        </div><!--product-wrapper-->
                    </div><!--col-md-12-->
                </div><!--row-->



            <div class="row">
                <div class="col-6">
                    <div class="fav-sold-wrapper">
                        <p class="favourite-sold-style"><i class="far fa-heart"></i></i> favourite seller</p>
                    </div><!--fav-sold-wrapper-->
                </div><!--col-6-->

                <div class="col-6">
                    <div class="fav-sold-wrapper">
                        <p class="favourite-sold-style"><i class="far fa-check-circle"></i> mark as sold</p>
                    </div><!--fav-sold-wrapper-->
                </div><!--col-6-->

            </div><!--row-->

            <div class="comment-wrapper">
                <a href="#" class="btn btn-comment">comment to buy</a>
                <a href="#" class="view-comments">view comments</a>
            </div><!--comment-wrapper-->




            </div><!--post-style-->
        </div><!--col-sm-3-->


        <?php

        //end foreach loop
        }


        ?>

    </div><!--row-->

</section><!--posts-->




</section><!--marketplace-->

</div><!--container-->







<?php require_once("../elements/footer.php");
