<div class="cryptic_preloader_holder v2_ball_pulse">
    <div class="cryptic_preloader v2_ball_pulse">
        <div class="loaders">
            <div class="loader">
                <div class="loader-inner ball-pulse">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Fixed Sidebar Menu -->
<div class="relative fixed-sidebar-menu-holder right-sidebar">
    <div class="fixed-sidebar-menu">
        <!-- Close Sidebar Menu + Close Overlay -->
        <i class="icon-close icons"></i>
        <!-- Sidebar Menu Holder -->
        <div class="header7 sidebar-content">
            <div class="left-side">
                <aside class="widget"><a> My Hoard </a>
                    <div class="widget-row">
                        <h1 id="price_usd-side" class="widget-title"></h1>
                        <p id="price_btc-side" class="title-price"></p>
                    </div>
                </aside>
                <div class="spacer_30"></div>
                <?php
                foreach ($SQLcoins as $row => $coin) {
                    ?>
                    <div class="clearfix"></div>
                    <div class="live-coin live-coin-v3 text-center <?= $coin['ticker'] ?>">
                        <a href="/coinhoarder/myhoard.php?overview=<?= $coin['ticker'] ?>" class="show-code show-code-left">
                            <?php if($coin['image']=="cryptocoins") {
                                echo "<i class='cc " . $coin['ticker'] . "' title='" . $coin['ticker'] . "'></i>";
                            }else {//default coinmarketcap
                                echo "<img src='https://s2.coinmarketcap.com/static/img/coins/64x64/".$coin['coinmarketcap'].".png'>";
                            } ?>
                        </a>
                        <p id="<?= $coin['ticker'] ?>-price_usd-side" class="text-bold no-margin">Price: <?= $prefCurrencyS ?></p>
                        <p id="<?= $coin['ticker'] ?>-side" class="text-bold no-margin">Symbol:  <?= $coin['ticker'] ?> <br></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>



<!--
<div class="left-side">
    <h1 class="logo">
        <a href="https://modeltheme.com/mt_bitcurrency">
            <img src="/coinhoarder/img/logo_black.png"
                 alt="Cryptic"/>
        </a>
    </h1>
    <aside id="search-2" class="widget widget_search">
        <form role="search" method="get" class="search-form"
              action="https://modeltheme.com/mt_bitcurrency/">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s"/>
            </label>
            <input type="submit" class="search-submit" value="Search"/>
        </form>
    </aside>
    <aside id="recent-posts-2" class="widget widget_recent_entries"><h1 class="widget-title">Recent
        Posts</h1>
        <ul>
            <li>
                <a href="https://modeltheme.com/mt_bitcurrency/2017/12/18/bitcoin-price-primed-to-test/">Bitcoin
                    Price Primed to Test</a>
            </li>
            <li>
                <a href="https://modeltheme.com/mt_bitcurrency/2017/10/25/launch-coin-ultimate-card/">Launch
                    Coin Ultimate Card</a>
            </li>
            <li>
                <a href="https://modeltheme.com/mt_bitcurrency/2017/05/09/payouts-to-visamastercard/">Payouts
                    to Visa/MasterCard</a>
            </li>
            <li>
                <a href="https://modeltheme.com/mt_bitcurrency/2017/04/04/affiliate-program/">Affiliate
                    program</a>
            </li>
        </ul>
    </aside>
    <aside id="recent-comments-2" class="widget widget_recent_comments"><h1 class="widget-title">Recent
        Comments</h1>
        <ul id="recentcomments">
            <li class="recentcomments"><span class="comment-author-link">Robert Downey</span> on <a
                    href="https://modeltheme.com/mt_bitcurrency/2017/10/25/launch-coin-ultimate-card/#comment-2">Launch
                Coin Ultimate Card</a></li>
            <li class="recentcomments"><span class="comment-author-link"><a href='https://wordpress.org/'
                                                                            rel='external nofollow'
                                                                            class='url'>A WordPress Commenter</a></span>
                on
                <a href="https://modeltheme.com/mt_bitcurrency/2017/10/25/launch-coin-ultimate-card/#comment-1">Launch
                    Coin Ultimate Card</a></li>
        </ul>
    </aside>
    <aside id="archives-2" class="widget widget_archive"><h1 class="widget-title">Archives</h1>
        <ul>
            <li><a href='https://modeltheme.com/mt_bitcurrency/2017/12/'>December 2017</a></li>
            <li><a href='https://modeltheme.com/mt_bitcurrency/2017/10/'>October 2017</a></li>
            <li><a href='https://modeltheme.com/mt_bitcurrency/2017/05/'>May 2017</a></li>
            <li><a href='https://modeltheme.com/mt_bitcurrency/2017/04/'>April 2017</a></li>
        </ul>
    </aside>
    <aside id="categories-2" class="widget widget_categories"><h1 class="widget-title">Categories</h1>
        <ul>
            <li class="cat-item cat-item-1"><a
                    href="https://modeltheme.com/mt_bitcurrency/category/uncategorized/">Uncategorized</a>
            </li>
        </ul>
    </aside>
    <aside id="meta-2" class="widget widget_meta"><h1 class="widget-title">Meta</h1>
        <ul>
            <li><a href="https://modeltheme.com/mt_bitcurrency/wp-login.php">Log in</a></li>
            <li><a href="https://modeltheme.com/mt_bitcurrency/feed/">Entries <abbr
                    title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="https://modeltheme.com/mt_bitcurrency/comments/feed/">Comments <abbr
                    title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="https://wordpress.org/"
                   title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a>
            </li>
        </ul>
    </aside>
    <aside id="nav_menu-2" class="widget widget_nav_menu"><h1 class="widget-title">RESOURCES</h1>
        <div class="menu-footer1-container">
            <ul id="menu-footer1" class="menu">
                <li id="menu-item-341"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-341"><a
                        href="#">How to Buy Coin</a></li>
                <li id="menu-item-342"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-342"><a
                        href="#">Coin Overview</a></li>
                <li id="menu-item-343"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-343"><a
                        href="#">Blog News</a></li>
                <li id="menu-item-344"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-344"><a
                        href="#">How to Sell Coin</a></li>
            </ul>
        </div>
    </aside>
</div>-->