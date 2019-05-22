<header id="header-hoard" class="no_subheader transparent_header	sticky_header hide_subheader_on_scroll">
    <div class="container">
        <div class="row header-row">
            <div class="navbar-header col-md-2 col-sm-2" id="logo-hoard">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar, #log"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class='logo logo_flip transparent_logo_flip'>
                    <a href="/coinhoarder/" title="CoinHoarder" rel="home">
                        <img src="/coinhoarder/img/logo.png" alt="CoinHoarder"/>
                        <span id="transparent_logo">
                                <img src="/coinhoarder/img/logo_black.png" alt="CoinHoarder"/>
                            </span>
                    </a>
                </h1>
            </div>
            <!-- NAV MENU -->
            <div id="navbar" class="navbar-collapse collapse col-md-8 col-sm-8 col-xs-12">
                <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item current_page_item current-menu-ancestor current-menu-parent">
                        <?php
                        if(strtolower(basename($_SERVER['PHP_SELF'], ".php")) == "myhoard"){
                            echo "<a href=\"/coinhoarder/myhoard.php\">Dashboard</a>";
                            if (isset($_GET['overview'])) {
                                echo "<span class=\"fa fa-angle-double-right\"></span>";
                                echo "</li>";
                                echo "<li class=\"menu-item menu-item-type-post_type menu-item-object-page\">";
                                echo "<a href=\"/coinhoarder/myhoard.php?overview=".$_GET['overview']."\">".strtoupper($_GET['overview'])."</a>";
                                if (isset($_GET['page'])) {
                                    echo "<span class=\"fa fa-angle-double-right\"></span>";
                                    echo "</li>";
                                    echo "<li class=\"menu-item menu-item-type-post_type menu-item-object-page\">";
                                    if($_GET['page']=="transactions"&&isset($_GET['detail']))
                                        echo "<a href=\"/coinhoarder/myhoard.php?overview=".$_GET['overview']."&page=".$_GET['page']."\">TX</a>";
                                    else if($_GET['page']=="block"&&isset($_GET['detail']))
                                        echo "<a>H</a>";
                                    else
                                        echo "<a href=\"/coinhoarder/myhoard.php?overview=".$_GET['overview']."&page=".$_GET['page']."\">".ucfirst(strtolower($_GET['page']))."</a>";
                                    if (isset($_GET['detail'])) {
                                        echo "<span class=\"fa fa-angle-double-right\"></span>";
                                        echo "</li>";
                                        echo "<li class=\"menu-item menu-item-type-post_type menu-item-object-page\">";
                                        echo "<a href=\"/coinhoarder/myhoard.php?overview=".$_GET['overview']."&page=".$_GET['page']."&detail=".$_GET['detail']."\">";
                                        if(strpos($_GET['detail'],"|") == true)
                                            echo strtok($_GET['detail'],'|');
                                        else if(strlen($_GET['detail'])>10)
                                            echo substr(strtolower($_GET['detail']),0,10)."...";
                                        else
                                            echo $_GET['detail'];
                                        echo "</a></li>";
                                    }
                                }
                            }
                        }else if(strtolower(basename($_SERVER['PHP_SELF'], ".php")) == "account"){
                            echo "<a href=\"/coinhoarder/account.php\">My account</a>";
                        }
                        ?>
                        <span></span>
                    </li>
                </ul>
            </div>

            <div id="log" class="logged col-md-2 col-sm-2 col-xs-12 navbar-collapse collapse visibile_group">
                <div class="pull-right actions-group">
                    <div id="show-balance-xs" class="hidden-sm hidden-md hidden-lg toggle-profile">
                        <a class="profile privacy-toggle">
                            <i class="fa fa-eye-slash"></i>
                        </a>
                    </div>
                    <div id="night-mode-xs" class="hidden-sm hidden-md hidden-lg toggle-profile">
                        <a class="profile night-mode-toggle <?php if($prefNightMode) echo 'active'; ?>">
                            <i class="fa fa-moon-o"></i>
                        </a>
                    </div>
                    <div id="dropdown-currency" class="ddmenu open toggle-profile">
                        <a class="profile">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                        </a>
                        <ul>
                            <li><a class='currency' data-currency="USD"><i class="fa fa-dollar"></i></a></li>
                            <li><a class='currency' data-currency="EUR"><i class="fa fa-euro"></i></a></li>
                            <li><a class='currency' data-currency="BTC"><i class="fa fa-bitcoin"></i></a></li>
                        </ul>
                    </div>
                    <div id="dropdown-news" class="ddmenu open toggle-profile">
                        <a class="profile">
                            <?php
                            $news = true;
                            $notifications = $functions->executeQuery("SELECT * FROM notifications WHERE notifications.idUser = '".$_SESSION['user']['id']."'");
                            if($notifications){
                                foreach ($notifications as $row => $notify) {
                                if($news){
                                    $news = false;
                            ?>
                            <i class="fa fa-envelope active faa-horizontal" aria-hidden="true"></i>
                            <span id="badge-notify" class="badge faa-horizontal animated"><?= sizeof($notifications) ?></span>
                        </a>
                        <ul class="msg_list">
                            <?php
                                }

                            echo "<li class='";
                            if($notify['priority'] == 0){
                                echo 'normal';
                            } else if($notify['priority'] == 1){
                                echo 'success btn-success';
                            } else if($notify['priority'] == 2){
                                echo 'danger btn-danger';
                            }
                            echo "'><a class='notify' data-notify=".$notify['id']."><i class='icon-close icons'></i></a>".$notify['text']."</li>";
                            }}
                            if($news){
                                ?>
                                <i class="fa fa-envelope faa-horizontal" aria-hidden="true"></i>
                                </a>
                                <ul class="msg_list">
                                    <div class="dropdown-divider"></div>
                                    <li>
                                        <div class="text-center">
                                            <a id="more-notify">
                                                <strong>Anything new for you</strong>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <?php
                            }else{
                            ?>
                            <div class="dropdown-divider"></div>
                            <li>
                                <div class="text-center">
                                    <a id="more-notify">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="hidden-sm hidden-md hidden-lg toggle-profile" >
                        <a href="#" class="profile"><i class="fa fa-cogs"></i></a>
                    </div>
                    <div class="hidden-sm hidden-md hidden-lg toggle-profile">
                        <a href="/coinhoarder/account.php" class="profile"><i class="fa fa-user"></i></a>
                    </div>
                    <div class="hidden-sm hidden-md hidden-lg toggle-profile">
                        <a href="/coinhoarder/?logout" class="profile"><i class="fa fa-sign-out"></i></a>
                    </div>
                    <div id="dropdown-user-profile" class="hidden-xs ddmenu open toggle-profile">
                        <a class="profile"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <ul>
                            <li><a href="/coinhoarder/myhoard.php"><i class="icon-layers icons"></i> My Hoard</a></li>
                            <li><a href="#"><i class="icon-settings icons"></i> Crypto Tools</a></li>
                            <li><a href="/coinhoarder/account.php"><i class="icon-user icons"></i> Account Details</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="privacy-toggle"><i class="fa fa-eye-slash"></i> Privacy toggle</a></li>
                            <li><a class="night-mode-toggle <?php if($prefNightMode) echo 'active'; ?>"><i class="fa fa-moon-o"></i> Dark mode</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="/coinhoarder/?logout"><i class="icon-logout icons"></i> Log Out</a></li>
                        </ul>
                    </div>
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
            </div>
        </div>
    </div>
</header>
