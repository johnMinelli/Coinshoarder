<?PHP
require_once 'config.php';

if (!$functions->isLoggedIn()) {
    if (strcmp($functions->processRememberDirective(), 'ok') == 0) {
        //nothing
    }
} else if (isset($_GET['logout'])) {
    $functions->logout();
}
$functions->cacheControl();

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- JQUERY -->
    <script type='text/javascript' src="/CoinHoarder/plugins/jquery/jquery.js"></script>
    <!-- THEME -->
    <link rel='stylesheet' id='essential-grid-plugin-settings-css'
          href='/CoinHoarder/plugins/essential-grid/public/assets/css/settings.css?ver=2.1.6.1' type='text/css'
          media='all'/>
    <link rel='stylesheet' id='rs-plugin-settings-css'
          href='/CoinHoarder/plugins/revslider/public/assets/css/settings.css?ver=5.4.6.2' type='text/css' media='all'/>
    <link rel='stylesheet' id='owl-carousel-css' href='/CoinHoarder/css/theme/owl.carousel.css?ver=4.9.1'
          type='text/css' media='all'/>
    <link rel='stylesheet' id='cryptic-blogloops-style-css'
          href='/CoinHoarder/css/theme/styles-module-blogloops.css?ver=4.9.1' type='text/css' media='all'/>
    <link rel='stylesheet' id='cryptic-mt-style-css' href='/CoinHoarder/style.css?ver=4.9.1' type='text/css'
          media='all'/>
    <?PHP
    include(linkrel);
    ?>
    <!-- SLIDER -->
    <script type='text/javascript'
            src='/CoinHoarder/plugins/essential-grid/public/assets/js/lightbox.js?ver=2.1.6.1'></script>
    <script type='text/javascript'
            src='/CoinHoarder/plugins/essential-grid/public/assets/js/jquery.themepunch.tools.min.js?ver=2.1.6.1'></script>
    <script type='text/javascript'
            src='/CoinHoarder/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.4.6.2'></script>
    <script type='text/javascript' src='/CoinHoarder/plugins/revslider/public/assets/js/slider.js'></script>

    <title>Coinshoarder</title>
</head>

<body class="home page-template-default page page-id-5 widgets_v2   navstyle-v1        header4   wpb-js-composer js-comp-ver-5.4.5 vc_responsive">

<?PHP
include(sideBar);
?>

<!-- PAGE #page -->
<div id="page" class="hfeed site">

    <?PHP
    include(homeBar);

    if (isset($_GET['404'])) {
        include(notfound);
    } else if (isset($_GET['contacts'])) {
        include(contacts);
    } else if (isset($_GET['development'])) {
        include(development);
    } else if (isset($_GET['membership'])) {
        include(membership);
    } else if (isset($_GET['faq'])) {
        include(faq);
    } else if (isset($_GET['terms'])) {
        include(terms);
    } else if (isset($_GET['privacy'])) {
        include(privacy);
    } else if (isset($_GET['example'])) {
        include(example);
    } else {
        include(slider);

        ?>

        <!-- Page content -->
        <div id="primary" class="no-padding content-area no-sidebar">
            <!-- <div class=""> -->
            <div class="container">
                <div class="row">
                    <main id="main" class="col-md-12 site-main main-content">


                        <article id="post-5" class="post-5 page type-page status-publish hentry">

                            <div class="entry-content">

                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div data-vc-full-width="true" data-vc-full-width-init="false" id="get-started"
                                     class="vc_row wpb_row vc_row-fluid vc_custom_1509621455423 vc_row-has-fill">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner vc_custom_1509621838573">
                                            <div class="wpb_wrapper">
                                                <div class="title-subtile-holder"><h1 class="section-title dark_title">
                                                        GET STARTED</h1>
                                                    <div class="section-border dark_border"></div>
                                                    <div class="section-subtitle dark_subtitle">
                                                        <!--//subtitle-->
                                                    </div>
                                                </div>
                                                <div class="vc_empty_space" style="height: 50px"><span
                                                            class="vc_empty_space_inner"></span></div>
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                    <div class="wpb_column vc_column_container vc_col-sm-4">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper">
                                                                <div
                                                                        class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510670706843">

                                                                    <figure class="wpb_wrapper vc_figure">
                                                                        <div
                                                                                class="vc_single_image-wrapper   vc_box_border_grey">
                                                                            <img width="485" height="162"
                                                                                 src="/CoinHoarder/img/element/picture17.png"
                                                                                 class="vc_single_image-img attachment-full"
                                                                                 alt=""
                                                                                 srcset="/CoinHoarder/img/element/picture17.png 485w, /CoinHoarder/img/element/picture17.png 300w"
                                                                                 sizes="(max-width: 485px) 100vw, 485px"/>
                                                                        </div>
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column vc_column_container vc_col-sm-8">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper"><h3
                                                                        style="color: #252525;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal"
                                                                        class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510147428598">
                                                                    Register now</h3>
                                                                <div
                                                                        class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                                                    <div class="wpb_wrapper">
                                                                        <p style="text-align: left; color: #666666;">
                                                                            Welcome! Become now part of the community
                                                                            and start to use our services.
                                                                            You can register your account <a
                                                                                    href="/CoinHoarder/register.php">HERE</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper">
                                                                <div
                                                                        class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510670714563">

                                                                    <figure class="wpb_wrapper vc_figure">
                                                                        <div
                                                                                class="vc_single_image-wrapper   vc_box_border_grey">
                                                                            <img class="vc_single_image-img "
                                                                                 src="/CoinHoarder/img/element/picture13.png"
                                                                                 width="360" height="120"
                                                                                 alt="picture13"
                                                                                 title="picture13"/></div>
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper"><h3
                                                                        style="color: #252525;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal"
                                                                        class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510147403534">
                                                                    Add your wallets</h3>
                                                                <div
                                                                        class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                                                    <div class="wpb_wrapper">
                                                                        <p style="text-align: left; color: #666666;">Go
                                                                            in the 'My Hoard' section, choose your
                                                                            beloved crypto and add your address for each
                                                                            one.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vc_row wpb_row vc_inner">
                                                    <div class="wpb_column vc_column_container vc_col-sm-4">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper">
                                                                <div
                                                                        class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510670725003">

                                                                    <figure class="wpb_wrapper vc_figure">
                                                                        <div
                                                                                class="vc_single_image-wrapper   vc_box_border_grey">
                                                                            <img width="485" height="162"
                                                                                 src="/CoinHoarder/img/element/picture15.png"
                                                                                 class="vc_single_image-img attachment-full"
                                                                                 alt=""
                                                                                 srcset="/CoinHoarder/img/element/picture15.png 485w, /CoinHoarder/img/element/picture15.png 300w"
                                                                                 sizes="(max-width: 485px) 100vw, 485px"/>
                                                                        </div>
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column vc_column_container vc_col-sm-8">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper"><h3
                                                                        style="color: #252525;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal"
                                                                        class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510147414492">
                                                                    Start to use</h3>
                                                                <div
                                                                        class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                                                    <div class="wpb_wrapper">
                                                                        <p style="text-align: left; color: #666666;">You
                                                                            have done! Now visiting 'My Hoard' section
                                                                            you will have access to:
                                                                        <div style="display: inline-flex;">
                                                                            <ul>
                                                                                <li>Live statistics of your wallets and
                                                                                    earnings
                                                                                </li>
                                                                                <li>Masternode's status control (both
                                                                                    cold and hot)
                                                                                </li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li>Market data feed for your coins</li>
                                                                                <li>Automated mail services</li>
                                                                            </ul>
                                                                        </div>
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vc_row wpb_row vc_inner vc_row-fluid vc_row-fluid vc_custom_1509621896054">
                                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper">
                                                                <div
                                                                        class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510670714563">

                                                                    <figure class="wpb_wrapper vc_figure">
                                                                        <div
                                                                                class="vc_single_image-wrapper   vc_box_border_grey">
                                                                            <img class="vc_single_image-img "
                                                                                 src="/CoinHoarder/img/element/picture14.png"
                                                                                 width="360" height="120"
                                                                                 alt="picture14"
                                                                                 title="picture14"/></div>
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                                        <div class="vc_column-inner ">
                                                            <div class="wpb_wrapper"><h3
                                                                        style="color: #252525;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal"
                                                                        class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510147403534">
                                                                    Future implementation</h3>
                                                                <div
                                                                        class="wpb_text_column wpb_content_element  wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                                                    <div class="wpb_wrapper">
                                                                        <p style="text-align: left; color: #666666;">
                                                                            This is not the end. We are working to
                                                                            implement miners statistic
                                                                            of the community-desired pools and to
                                                                            develop a standalone application to allow
                                                                            you to
                                                                            make transaction directly through our
                                                                            platform. Whatch our roadmap or read more <a
                                                                                    href="/CoinHoarder/?development">HERE</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div data-vc-full-width="true" data-vc-full-width-init="false"
                                     class="vc_row wpb_row vc_row-fluid vc_custom_1510218413928 vc_row-has-fill">
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner vc_custom_1510149372559">
                                            <div class="wpb_wrapper">
                                                <div class="stats-block statistics wow fadeIn">
                                                    <div class="stats-head"><p class="stat-number skill"></p></div>
                                                    <div class="stats-content percentage" data-perc="7"><span
                                                                class="skill-count" style="color: #ffffff">7</span>
                                                        <p style="color: #ffffff">Active users in last 24h</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner vc_custom_1510149379207">
                                            <div class="wpb_wrapper">
                                                <div class="stats-block statistics wow fadeIn">
                                                    <div class="stats-head"><p class="stat-number skill"></p></div>
                                                    <div class="stats-content percentage" data-perc="21"><span
                                                                class="skill-count" style="color: #ffffff">21</span>
                                                        <p style="color: #ffffff">Total users</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner vc_custom_1510149385785">
                                            <div class="wpb_wrapper">
                                                <div class="stats-block statistics wow fadeIn">
                                                    <div class="stats-head"><p class="stat-number skill"></p></div>
                                                    <div class="stats-content percentage" data-perc="14"><span
                                                                class="skill-count" style="color: #ffffff">14</span>
                                                        <p style="color: #ffffff">Total wallets managed</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-3">
                                        <div class="vc_column-inner vc_custom_1510149391738">
                                            <div class="wpb_wrapper">
                                                <div class="stats-block statistics wow fadeIn">
                                                    <div class="stats-head"><p class="stat-number skill"></p></div>
                                                    <div class="stats-content percentage" data-perc="3"><span
                                                                class="skill-count" style="color: #ffffff">3</span>
                                                        <p style="color: #ffffff">Coins supported</p></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div data-vc-full-width="true" data-vc-full-width-init="false" id="supported-coins"
                                     class="vc_row wpb_row vc_row-fluid vc_custom_1509630501820 vc_row-has-fill">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner vc_custom_1509623292032">
                                            <div class="wpb_wrapper">
                                                <div class="title-subtile-holder"><h1 class="section-title dark_title">
                                                        SUPPORTED COINS</h1>
                                                    <div class="section-border dark_border"></div>
                                                    <div class="section-subtitle dark_subtitle">Your favorite coin in
                                                        not yet supported? Ask <a
                                                                href="/CoinHoarder/?contacts#contact-us">HERE</a> and we
                                                        will list it! Or get more info about our <a
                                                                href="/CoinHoarder/?membership">MEMBERSHIP
                                                            PROGRAM</a><br/>
                                                    </div>
                                                </div>
                                                <!--div class="vc_empty_space" style="height: 50px"><span class="vc_empty_space_inner"></span></div-->
                                                <div class="vc_row">

                                                    <div class="wpb_column vc_column_container vc_col-sm-2">
                                                        <div class="vc_column-inner"
                                                             style="padding-left: 25px; padding-right: 25px;">
                                                            <div class="testimonial01_item">
                                                                <div class="testimonial01-img-holder pull-left">
                                                                    <div class="testimonial01-img">
                                                                        <img
                                                                                src="/CoinHoarder/img/coin/send.png"
                                                                                alt="send">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h2 class="name-test" style="padding-top: 65px;">
                                                                        <strong>SEND</strong>
                                                                    </h2>
                                                                    <p class="position-test">POS / MN</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column vc_column_container vc_col-sm-2">
                                                        <div class="vc_column-inner "
                                                             style="padding-left: 25px; padding-right: 25px;">
                                                            <div class="testimonial01_item">
                                                                <div class="testimonial01-img-holder pull-left">
                                                                    <div class="testimonial01-img">
                                                                        <img
                                                                                src="/CoinHoarder/img/coin/hlm.png"
                                                                                alt="hlm">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h2 class="name-test" style="padding-top: 65px;">
                                                                        <strong>HELIUM</strong>
                                                                    </h2>
                                                                    <p class="position-test">POS / MN</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="wpb_column vc_column_container vc_col-sm-2">
                                                        <div class="vc_column-inner "
                                                             style="padding-left: 25px; padding-right: 25px;">
                                                            <div class="testimonial01_item">
                                                                <div class="testimonial01-img-holder pull-left">
                                                                    <div class="testimonial01-img">
                                                                        <img
                                                                                src="/CoinHoarder/img/coin/pivx.png"
                                                                                alt="pivx">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h2 class="name-test" style="padding-top: 65px;">
                                                                        <strong>PIVX</strong>
                                                                    </h2>
                                                                    <p class="position-test">POS / MN</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div data-vc-full-width="true" data-vc-full-width-init="false" id="milestones"
                                     class="vc_row wpb_row vc_row-fluid vc_custom_1509627633817 vc_row-has-fill">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner vc_custom_1509627496151">
                                            <div class="wpb_wrapper">
                                                <div class="title-subtile-holder"><h1 class="section-title light_title">
                                                        MILESTONES</h1>
                                                    <div class="section-border dark_border"></div>
                                                    <div class="section-subtitle dark_subtitle">Our projection about the
                                                        future of the platform.<br/> One more step to the cryptoglory
                                                    </div>
                                                </div>
                                                <div class="vc_empty_space" style="height: 15px"><span
                                                            class="vc_empty_space_inner"></span></div>
                                                <section id="cd-timeline" class="cd-container">
                                                    <div class="mt_shortcode_timeline_items cd-timeline-block">
                                                        <div class="cd-timeline-img cd-picture">
                                                            <i class="fa fa-play"></i>
                                                        </div>
                                                        <div class="cd-timeline-content"><h3
                                                                    class="timeline_item_title">
                                                                BEGIN</h3>
                                                            <p class="timeline_item_content">Development of the landing
                                                                website and of the platform.</p>
                                                            <p class="cd-date">2018 March 15th</p></div>
                                                    </div>
                                                    <div class="mt_shortcode_timeline_items cd-timeline-block">
                                                        <div class="cd-timeline-img cd-picture">
                                                            <i class="fa fa-bug"></i>
                                                        </div>
                                                        <div class="cd-timeline-content"><h3
                                                                    class="timeline_item_title">
                                                                BETA TESTING</h3>
                                                            <p class="timeline_item_content">A period of testing of the
                                                                platform. The First 20 crypto currencies will be listed
                                                                FREE to spread the word and create a strong
                                                                community.</p>
                                                            <a href="#listed-coins" class="cd-read-more">Our coins</a>
                                                            <p class="cd-date">2019 April 1st</p></div>
                                                    </div>
                                                    <div class="mt_shortcode_timeline_items cd-timeline-block">
                                                        <div class="cd-timeline-img cd-picture">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </div>
                                                        <div class="cd-timeline-content"><h3
                                                                    class="timeline_item_title">MORE AND MORE
                                                                AND...</h3>
                                                            <p class="timeline_item_content">Improvements in statistics
                                                                view and pie chart for a better service. More coins.
                                                                Integration of Telegram and Discord notification.
                                                                Integration with miners work.</p>
                                                            <p class="cd-date">2019 May 30th</p></div>
                                                    </div>
                                                    <div class="mt_shortcode_timeline_items cd-timeline-block">
                                                        <div class="cd-timeline-img cd-picture">
                                                            <i class="fa fa-sitemap"></i>
                                                        </div>
                                                        <div class="cd-timeline-content"><h3
                                                                    class="timeline_item_title">
                                                                WALLETs & MINERs</h3>
                                                            <p class="timeline_item_content">Testing period for miners
                                                                and pool on the website platform with mediation with big
                                                                pools.</p><a href="/CoinHoarder/?development"
                                                                             class="cd-read-more">Read
                                                                More</a>
                                                            <p class="cd-date">2019 June 30th</p></div>
                                                    </div>
                                                    <div class="mt_shortcode_timeline_items cd-timeline-block">
                                                        <div class="cd-timeline-img cd-picture">
                                                            <i class="fa fa-desktop"></i>
                                                        </div>
                                                        <div class="cd-timeline-content"><h3
                                                                    class="timeline_item_title">
                                                                LOCAL HOARD</h3>
                                                            <p class="timeline_item_content">Standalone application to
                                                                extend possibilities of interaction with all wallets.
                                                                Get access to your self hosted wallets with the security
                                                                of keeping the private keys in you hand.</p><a
                                                                    href="/CoinHoarder/?development"
                                                                    class="cd-read-more">Read
                                                                More</a>
                                                            <p class="cd-date">Anyway sooner possible</p></div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div data-vc-full-width="true" data-vc-full-width-init="false"
                                     class="vc_row wpb_row vc_row-fluid vc_custom_1509630337729 vc_row-has-fill">
                                    <div id="news-form-fields"
                                         class="wpb_animate_when_almost_visible wpb_fadeIn fadeIn">
                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="vc_column-inner vc_custom_1509630229674">
                                                <div class="wpb_wrapper">
                                                    <h2 style="font-size: 30px;color: #252525;line-height: 35px;text-align: left;font-family:Montserrat;font-weight:700;font-style:normal"
                                                        class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510670755553">
                                                        Subscribe to our Newsletter
                                                    </h2>
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <p style="text-align: left;"><span
                                                                        style="color: #666666; font-size: 16px; line-height: 25px; font-weight: 400;">
                                                                Sign up if you want to get the IMPORTANT news about our service.<br/>We promise you, we won't fill your email with spam.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wpb_column vc_column_container vc_col-sm-6">
                                            <div class="vc_column-inner vc_custom_1510307086908">
                                                <div class="wpb_wrapper">
                                                    <div class="wpb_text_column wpb_content_element">
                                                        <div class="wpb_wrapper">
                                                            <form id="news-form" name="news-form" class="news-form">
                                                                <div class="newsletter">
                                                                    <input type="email" name="email"
                                                                           placeholder="Insert your email" required/>
                                                                    <input type="submit" value="Submit"/>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="news-form-response" class="wpb_column vc_column_container vc_col-md-12"
                                         style="display: none;">
                                        <h2 style="font-size: 30px;color: #252525;line-height: 35px;text-align: center;font-family:Montserrat;font-weight:700;font-style:normal"
                                            class="vc_custom_heading wpb_animate_when_almost_visible wpb_fadeIn fadeIn vc_custom_1510670755553">
                                            Succesfully subscribed
                                        </h2>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main>
                </div>
            </div>
        </div>

        <?PHP
        include(footer);
    }
    ?>

</div>
<?php if(!isset($_COOKIE['policy'])) echo '
<div id="cookie-banner" class="cookie-banner">
    <div id="message-banner" class="message-banner">
        We use cookies to personalize and enhance your experience on our site. By clicking AGREE, you agree to our use
        of cookies and other technologies for this purpose and the purposes listed in our <a href="/CoinHoarder/?privacy" target="_blank">Cookie Policy</a>. Visit our <a href="/CoinHoarder/?privacy" style="color: white;" target="_blank">Privacy
            Policy</a>, updated March 15, 2019, for more information on our data collection practices.
    </div>
    <button id="button-banner" class="button-banner">Agree</button>
</div>'; ?>

</body>
</html>