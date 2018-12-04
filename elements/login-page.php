<div class="row" id="mg-row-login">
    <div class="col-md-6">
        <div id="orange-login">
            <img class="logo-login" src="/assets/images/logo-white.png" alt="Ok Food Hub Logo">

                <?=!empty($_GET['restricted_area']) ? ($_SESSION['restricted_area_msg']) : "" ?>



<!-- LOGIN -->
            <?php // short hand if statement to hide login page when email already exists - so it shows create a user again with message  ?>
            <div id="form-login" class="mx-auto" style="<?=!empty($_GET["signup_error"]) ? 'display:none;' : '' ?>">

                <h2 class="h2-daft white"><span class="far fa-user white"></span> login</h2>
                <?=!empty($_GET['login_error']) ? ($_SESSION['login_attempt_msg']) : "" ?>



                <form action="/users/login.php" method="post">

                    <div class="form-group">
                        <input class="form-control input-index" type="email" name="email" placeholder="email"  value="<?=!empty($_GET['login_error']) ? ($_SESSION['remember_email']) : "" ?>" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control input-index" type="password" name="password" placeholder="password" required>
                    </div>

                    <input class="btn btn-custom-solid" type="submit" value="submit">

                </form>

                    <p class="add-space-b"><a class="click-switch-index">I'm new! Sign up here.</a></p>

            </div><!--form-login-->

<!--CREATE ACCOUNT  -->
            <div id="form-create" class="mx-auto" style="<?=!empty($_GET["signup_error"]) ? 'display:block;' : '' ?>">

                <h2 class="h2-daft white"><span class="far fa-user white"></span> create an account</h2>
                <?= !empty($_GET['signup_error']) ? $_SESSION['create_acc_msg'] : '' ?>

                <form id="createAccountForm" action="/users/add.php" method="post">

                    <div class="form-group">
                        <input class="form-control input-index" type="text" name="firstname" placeholder="first name" value="<?=!empty($_GET['signup_error']) ? ($_SESSION['remember_firstname']) : "" ?>" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control input-index" type="text" name="lastname" placeholder="last name" value="<?=!empty($_GET['signup_error']) ? ($_SESSION['remember_lastname']) : "" ?>" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control input-index" type="email" name="email" placeholder="email" value="<?=!empty($_GET['signup_error']) ? ($_SESSION['remember_email']) : "" ?>" required>
                    </div>


                    <div class="form-group">
                        <input id="password1" class="form-control input-index" type="password" name="password" placeholder="password" required>
                    </div>

                    <div class="form-group">
                        <input id="password2" class="form-control input-index" type="password" placeholder="confirm password" required>
                        <p id="passMessage"></p>

                    </div>
                    <label class="white question-index">Are you buying goods and/or selling goods?</label> <br>

                        <label class="radio-inline mr-3 radio-text"><input class="mr-1" type="radio" name="buySell" value="1" <?=$_SESSION['buySell'] == 1 ? "checked" : ""?>> buying</label>

                        <label class="radio-inline radio-text"><input class="mr-1" type="radio" name="buySell" value="0" <?=$_SESSION['buySell'] == 0 ? "checked" : ""?>> buying + selling</label>





                    <br>



                    <input class="btn btn-custom-solid" type="submit" value="submit">

                </form>

                    <p class="add-space-b"><a class="click-switch-index2">just kidding. go back to login!</a></p>

                    <p class="p-login-bottom">help create a more accessible okanagan!</p>


            </div><!--form-create-->

        </div><!--orange-login ** this is the orange background-->
<!--WHITE HELLO BAKER-->
        <div id="white-login-hello">

            <div id="words-in-white">


            <h2 class="h2-daft grey">hello baker!</h2>
            <p class="p-century-reg grey"><b>Welcome to the marketplace.</b><br>Bam. Just like that, you've been connected to the local community so you can buy + sell delicious goods. <br>
            Wait, you didn't have to leave your couch? <br>
            It's as easy as posting your goods, kicking your feet up and waiting for someone to buy. <br>
            And if you're the buyer - picking up the goods!</p>

            </div><!--words-in-white-->

        </div><!--#white-login-hello-->


    </div><!--col-md-6-->

<!--THE MARKETPLACE-->
    <div class="col-md-6">

        <div id="index-marketplace">

            <div class="width-fix-marketplace-index">

            <div class="text-marketplace">
                <h2 class="h2-daft white textcenter">shop local. eat local.</h2>
                <h3 class="h3-century-bold white textcenter smmargin">kelowna's online farmer's market</h3>
                <div class="text-center">
                    <a class="btn btn-custom" href="marketplace.php">see marketplace</a>
                </div><!--text-center-->
            </div><!--text-marketplace-->


            <div class="row add-pd-bt pos-rel">
                <div class="col-sm-6">

                    <div class="img-container img-produce">
                        <img class="img-fluid index-market-img" src="/assets/images/category-produce.jpg" alt="produce image click to see marketplace">
                    </div><!--img-container-->

                        <p class="img-description p-produce">produce</p>
                </div><!--col-sm-3-->

                <div class="col-sm-6">
                    <div class="img-container img-meat">
                        <img class="img-fluid index-market-img" src="/assets/images/category-meat.jpg" alt="meat image click to see marketplace">
                    </div><!--img-container-->

                        <p class="img-description p-meat">meat</p>
                </div><!--col-sm-3-->
            </div><!--row-->


            <div class="row add-pd-bt">
                <div class="col-sm-6 ">
                    <div class="img-container img-grain">
                        <img class="img-fluid index-market-img" src="/assets/images/category-grain.jpg" alt="grain image click to see marketplace">

                    </div><!--img-container-->

                    <p class="img-description p-grain">grain</p>

                </div><!--col-sm-3-->


                <div class="col-sm-6">
                    <div class="img-container img-dairy">
                        <img class="img-fluid index-market-img" src="/assets/images/category-dairy.jpg" alt="dairy image click to see marketplace">
                    </div><!--img-container-->

                        <p class="img-description p-dairy">dairy</p>
                </div><!--col-sm-3-->
            </div><!--row-->

            </div><!--width-fix-marketplace-index-->
        </div><!--index-marketplace-->



    </div><!--col-md-6-->

</div><!--row-->
