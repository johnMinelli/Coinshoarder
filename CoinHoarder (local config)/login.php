<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 09/01/2018
 * Time: 21:45
 */

require_once 'config.php';
if($functions->isLoggedIn()){
    header('Location: /CoinHoarder');
}else if(!(isset($_GET['reset']) || isset($_GET['recover']))){
    if(strcmp($functions->processRememberDirective(),'ok')==0){
        header('Location: /CoinHoarder');
    }
}
$functions->cacheControl();

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- JQUERY -->
    <script type='text/javascript' src="/CoinHoarder/plugins/jquery/jquery.js"></script>
    <!-- THEME -->
    <link rel='stylesheet' id='cryptic-mt-style-css' href='/CoinHoarder/style.css?ver=4.9.1' type='text/css' media='all'/>
    <?PHP
    include(linkrel);
    ?>

    <title>Coinshoarder</title>
</head>

<body class="home page-template-default page page-id-5 widgets_v2   navstyle-v1        header4   wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
<!-- PAGE #page -->
<!-- Fixed alert Form -->


<div id="page" class="hfeed site">

    <?PHP
    include(homeBar);

    ?>
    <div class="fixed-alert-overlay">
        <div class="container smallscreen">
            <div class="row">
                <main id="main" class="col-md-12 site-main main-content">
                        <div class="entry-content">
                                <div class="wpb_column vc_column_container vc_col-sm-12" id="alert-overlay">

                                </div>
                        </div>
                </main>
            </div>
        </div>
    </div>
    <div id="primary" class="low-padding content-area no-sidebar">
        <!-- <div class=""> -->
        <div class="container smallscreen">
            <div class="row">
                <main id="main" class="col-md-12 site-main main-content">


                    <article id="post-1813" class="post-1813 page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="jumbotron animateIn animated fadeInLeft flex" data-animate="fadeInLeft">
                                            <?php if(isset($_GET['recover'])) { ?>
                                                <h2>Don't worry!</h2>
                                                <div class="wpb_wrapper row col-md-12">
                                                    <div class="row col-sm-12 col-md-10"><p>We will help you with that</p></div>
                                            <?php }else if(isset($_GET['reset'])) { ?>
                                                <h2>Almost done!</h2>
                                                <div class="wpb_wrapper row col-md-12">
                                                    <div class="row col-sm-12 col-md-10"><p>Set your new password and back to login!</p></div>
                                            <?php }else{ ?>
                                                <h1>Hi!</h1>
                                                <div class="wpb_wrapper row col-md-12">
                                                    <div class="row col-sm-12 col-md-10"><p>We are happy to see you are here. Log and start using our services</p></div>
                                            <?php } ?>
                                                    <div class="col-sm-12 col-md-2 text-center"><a role="button" href="/CoinHoarder/?faq" class="btn btn-primary btn-lg">Need help?</a></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bitcurrency-contact" style="padding-bottom: 20px;">
                                            <div class="section-top">
                                                <form id="login-form" method="post" role="form" style="display: block;">
                                                    <?php if(isset($_GET['recover'])) { ?>
                                                        <div class="wpcf7-form">
                                                            <input type="text" name="username" id="username" size="40" class="wpcf7-form-control" placeholder="Email" value="">
                                                        </div>
                                                        </br>
                                                        <div class="wpcf7-form">
                                                            <input  type="button" name="recover-submit" id="recover-submit" value="Send email" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span>
                                                        </div>
                                                    <?php } else if(isset($_GET['reset'])) { ?>
                                                        <div class="wpcf7-form">
                                                            <input type="password" name="password1" id="password1" size="40" class="wpcf7-form-control" placeholder="Password">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <input type="password" name="password2" id="password2" size="40" class="wpcf7-form-control" placeholder="Retype password">
                                                        </div>
                                                        </br>
                                                        <div class="wpcf7-form">
                                                            <input  type="button" name="reset-submit" id="reset-submit" value="Reset password" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span>
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="wpcf7-form">
                                                            <input type="text" name="username" id="username" size="40" class="wpcf7-form-control" placeholder="Email" value="">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <input type="password" name="password1" id="password1" size="40" class="wpcf7-form-control" placeholder="Password">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <span><input type="checkbox" name="remember" id="remember" class="wpcf7-form-control" style="width: 4%;">Remember me</span>
                                                        </div>
                                                        </br>
                                                        <div class="wpcf7-form">
                                                            <input  type="button" name="login-submit" id="login-submit" value="Log in" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span>
                                                            <p style=" text-align: center">
                                                                or
                                                                <a href="?recover" class="post-name row">Reset your password here</a>
                                                            </p>
                                                        </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .entry-content -->

                    </article><!-- #post-## -->

                </main>
            </div>
        </div>
    </div>

    <div class="wpcf7-response-output wpcf7-display-none"></div>

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
