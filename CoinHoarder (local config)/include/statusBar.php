<header class="header4">
    <!-- BOTTOM BAR -->
    <nav class="navbar navbar-default" id="modeltheme-main-head">
        <div class="container">
            <div class="row header-row" >

                <!-- LOGO -->
                <div class="navbar-header col-md-3">
                    <!-- NAVIGATION BURGER MENU -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar, #log" aria-expanded="false" aria-controls="navbar">
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
                        <li id="menu-item-91"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-91">
                            <a href="/coinhoarder/">Home</a>
                        </li>
                        <?php
                        if($login){
                            ?>
                        <li id="menu-item-270"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-270">
                            <a href="/coinhoarder/myhoarding.php">My Hoarding</a>
                        </li>
                            <?php
                        }
                        ?>
                        <li id="menu-item-270"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-270">
                            <a href="#getstarted">Get started</a>
                        </li>
                        <li id="menu-item-92"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-92"><a
                                href="#developmet">Development</a>
                        </li>
                        <li id="menu-item-272"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272"><a
                                href="/coinhoarder/?contacts">Contact Us</a>
                        </li>
                    </ul>
                </div>


                <!-- RIGHT SIDE SOCIAL / ACTIONS BUTTONS -->
                <div class="col-md-2 right-side-social-actions visibile_group">
                    <?php
                    if($login && !$login){
                        ?>
                    <!-- ACTIONS BUTTONS GROUP -->
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
                        <?php
                    }
                    ?>

                    <!-- SOCIAL LINKS -->
                    <ul class="social-links">
                        <li><a href="https://www.facebook.com/CoinsHoarder-1097683557060364/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/coinshoarder"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.googlewatchblog.de/wp-content/uploads/rip-google-plus.jpg"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://t.me/joinchat/AAAAAFd6f4ICCVY05BSdCg"><i class="fa fa-telegram"></i></a></li>
                        <li><a href="https://discord.gg/XGWSsua"><i class="fab fa-discord"></i></a></li>
                    </ul>




                </div>
                <div  id="log" class="col-md-2 navbar-collapse collapse  visibile_group">
                    <!-- LOGIN PAGE LINKS -->
                    <ul class="log nav navbar-nav pull-left nav-effect nav-menu">
                        <input  onclick="location.href = '/coinhoarder/login.php';" type="submit" value="Log in">
                        <input  onclick="location.href = '/coinhoarder/register.php';" type="submit" value="Sign in">
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
