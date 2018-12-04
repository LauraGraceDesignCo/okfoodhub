<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Login - OK Food Hub Marketplace';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");

$u = new User;
$user = $u->get_by_id($_SESSION['user_logged_in'])


?>

<div class="container">



<section id="body-new-user">

    <div class="mobile-fix-welcome">
        <h1 class="h2-daft welcome-h-spacing grey">welcome to the marketplace, <?= $user['firstname'] ?>!</h1>
        <h2 class="h3-century-bold smmargin grey">start your journey by:</h2>
    </div>

    <div class="row sp-after">

        <div class="col-md-4 smmargin">



            <a href="/users/edit.php">
                <div class="welcome-body-style welcome-links-b">
                <i class="far fa-user welcome-icon"></i>
                <p class="welcome-p">finishing your<br>profile</p>
                </div>
            </a>



        </div><!--col-md-4-->

        <div class="col-md-4 smmargin">

            <a href="/marketplace.php">

                <div class="welcome-body-style welcome-links-o">
                <i class="fas fa-shopping-bag welcome-icon"></i>
                <p class="welcome-p">checking out the<br>marketplace</p>
                </div>

            </a>

        </div><!--col-md-4-->

        <div class="col-md-4 smmargin">

            <a href="/create-edit-post.php">

            <div class="welcome-body-style welcome-links-g">
            <i class="fas fa-pencil-alt welcome-icon"></i>
            <p class="welcome-p">posting an item<br>for sale</p>
            </div>

            </a>

        </div><!--col-md-4-->

    </div><!--row-->

</section>

</div><!--container-->




<?php require_once("../elements/footer.php");
