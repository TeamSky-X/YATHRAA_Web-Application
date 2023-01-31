<?php if ($_SESSION['login']) {
    ?>
    <div class="top-header">
        <div class="container">
            <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">

            </ul>
            <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">

            </ul>
            <div class="clearfix"></div>
        </div>
    </div><?php } else { ?>
    <div class="top-header">
        <div class="container">
            <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">

            </ul>
            <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">


            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
<?php } ?>
<!--- /top-header ---->

<style>
    .logo {
        height: 50px;
        width: 105px;
    }
</style>
<!--- header ---->
<div class="header">
    <div class="container">
        <div class="nav-left flex-div">
            <img src="images/yathraa-logo.png" class="logo">
        </div>
        <div class="logo wow fadeInDown animated" data-wow-delay=".5s">

        </div>


        <div class="lock fadeInDown animated" data-wow-delay=".5s">
            <?php if ($_SESSION['login']) {
                ?>
                <li class="hm"><a href="index1.php"><i class="fa fa-home"></i></a></li>
                <li class="prnt"><a href="profile.php"><b>My Profile<b></a></li>
                <li class="prnt"><a href="mycart01.php"><b>My Cart<b></a></li>
                <li class="prnt"><a href="change-password.php"><b>Settings<b></a></li>
                <li class="sigi"><a href="logout.php"><b>Logout<b></a></li>
            <?php } else { ?>
                <li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4"><b><p></p>Sign In<b> | </a>
                </li>

                <li class="sig"><a href="#" data-toggle="modal" data-target="#myModal"><b>Register Here<b></a></li>
                <li><a href="enterprises/index.php">
                        <button class="eterprise-btn">For Enterprises</button>
                    </a></li>
                <div class="clearfix"></div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
    <div class="container">
        <div class="navigation">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="cl-effect-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index1.php"><b>Home<b></a></li>
                            <li><a href="pack01.php"><b>Market Place<b></a></li>
                            <li><a href="forum.php"><b>Forum<b> </a></li>
                            <li><a href="discover.php"><b>Discover<b></a></li>

                            <?php if ($_SESSION['login']) {
                                ?>
                                <li><a href="travelpackages.php"><b>Travel Planner<b></a></li>
                                <li><a href="tourist-guide.php"><b>Tourist Guide<b></a></li>
                            <?php } else { ?>
                                <li><a href="pricing.php"><b>Pricing<b> </a></li>


                            <?php } ?>
                            <div class="clearfix"></div>

                        </ul>
                    </nav>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<style>
    .eterprise-btn {
        margin-left: 10px;
        width: 150px;
        height: 40px;
        background-color: white;
        color: #4A8EFF;
        border: 2px solid #4A8EFF;
        border-radius: 5px;

    }

    .eterprise-btn:hover {
        color: white;
        background-color: #4A8EFF;
        border: 2px solid #4A8EFF;

    }
</style>