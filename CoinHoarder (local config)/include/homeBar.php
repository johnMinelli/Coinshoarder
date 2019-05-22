<header  id="header-home">
    <!-- BOTTOM BAR -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="row header-row">

                <!-- LOGO -->
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']) {  ?>
                <div class="navbar-header col-md-2">
                    <?php   }else{  ?>
                <div class="navbar-header col-md-3">
                <?php   }   ?>
                    <!-- NAVIGATION BURGER MENU -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar, #log" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1 class="logo">
                        <a href="/coinhoarder/">
                            <img src="/coinhoarder/img/logo.png"
                                 alt="Cryptic"/>
                        </a>
                    </h1>
                </div>

                <!-- NAV MENU -->

                <!-- NAV MENU -->
                <div id="navbar" class="navbar-collapse collapse col-md-5">
                    <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item current_page_item current-menu-ancestor current-menu-parent">
                            <a href="/coinhoarder/">Home</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']) {
                            ?>
                            <li id="menu-item-270"
                                class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="/coinhoarder/myhoard.php">My Hoard</a>
                            </li>
                        <?php   }else{  ?>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                            <a href="/coinhoarder/#get-started">Get started</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                        href="/coinhoarder/#supported-coins">Supported Coins</a></li>
                            </ul>
                        </li>
                        <?php   }   ?>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a
                                href="/coinhoarder/?development">Development</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                        href="/coinhoarder/#milestones">Milestones</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                href="/coinhoarder/?contacts">Contact Us</a>
                        </li>
                    </ul>
                </div>


                <!-- RIGHT SIDE SOCIAL / ACTIONS BUTTONS -->
                <div class="col-md-2 right-side-social-actions navbar-collapse collapse visibile_group">

                    <!-- SOCIAL LINKS -->
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/CoinsHoarder-1097683557060364/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/coinshoarder"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.googlewatchblog.de/wp-content/uploads/rip-google-plus.jpg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://t.me/joinchat/AAAAAFd6f4ICCVY05BSdCg"><i class="fa fa-telegram"></i></a></li>
                        <li><a href="https://discord.gg/XGWSsua"><i class="fab fa-discord"></i></a></li>
                    </ul>

                </div>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']) {  ?>
                <div id="log" class="col-md-3 navbar-collapse collapse  visibile_group" >
                    <div class="logged" >
                        <p>Welcome</br>
                            <?php echo  $_SESSION['user']['name']." ".$_SESSION['user']['surname'];  ?>
                        </p>
                        <!-- ACTIONS BUTTONS GROUP -->
                            <?php
                            if (isset($burger)) { //never
                            ?>
                        <div class="pull-right actions-group">
                            <!-- MT BURGER -->
                            <div id="mt-nav-burger">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                            <?php }else{ ?>
                        <div class="pull-right actions-group">
                            <div id="mt-nav-sign-out" onclick="location.href='/coinhoarder/?logout'">
                                <span class="fa fa-sign-out"></span>
                            </div>
                        </div>
                            <?php } ?>
                    </div>
                <?php

                    }else{  ?>
                <div id="log" class="log col-md-2 navbar-collapse collapse  visibile_group">
                <!-- LOGIN PAGE LINKS -->
                    <ul class="nav navbar-nav pull-left nav-effect nav-menu">
                        <input onclick="location.href = '/coinhoarder/login.php';" type="submit" value="Log in">
                        <input onclick="location.href = '/coinhoarder/register.php';" type="submit" value="Sign in">
                    </ul>
                <?php   }   ?>
                </div>
            </div>
        </div>
    </nav>
</header>
