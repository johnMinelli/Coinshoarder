<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 13/01/2018
 * Time: 16:11
 */

require_once 'config.php';
if($functions->isLoggedIn()){
    header('Location: www.Coinshoarder.com');
}else if(strcmp($functions->processRememberDirective(),'ok')==0){
    header('Location: www.Coinshoarder.com');
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
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
        <script type='text/javascript' src="/CoinHoarder/plugins/modernizr/modernizr.custom.js"></script>
        <script type='text/javascript' src='/CoinHoarder/plugins/sweetalert/sweetalert.min.js?ver=1.0.0'></script>
        <?PHP
        include(linkrel);
        ?>

        <title>Coinshoarder</title>
    </head>

    <body class="home page-template-default page page-id-5 widgets_v2   navstyle-v1        header4   wpb-js-composer js-comp-ver-5.4.5 vc_responsive">
    <!-- PAGE #page -->
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
                                                    <h2>You are new? Welcome!!</h2>
                                                    <div class="wpb_wrapper row col-md-12">
                                                        <div class="row col-sm-12 col-md-10"><p>Never too late to make order in your wallets. Let's begin!</p></div>
                                                        <div class="col-sm-12 col-md-2 text-center"><a role="button" href="/CoinHoarder/?faq" class="btn btn-primary btn-lg">Need help?</a></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="bitcurrency-contact" style="padding-bottom: 20px;">
                                                <div class="section-top">
                                                    <form id="register-form" method="post" role="form" style="display: block;">
                                                        <div class="wpcf7-form">
                                                            <input type="text" name="username" id="username" class="wpcf7-form-control" placeholder="Email" value="">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <input type="text" name="name" id="name" class="wpcf7-form-control" placeholder="Firt Name" value="">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <input type="text" name="surname" id="surname" class="wpcf7-form-control" placeholder="Last Name" value="">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <input type="password" name="password1" id="password1" class="wpcf7-form-control" placeholder="Password">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <input type="password" name="password2" id="password2" class="wpcf7-form-control" placeholder="Retype password">
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <span><input type="checkbox" name="terms" id="terms" class="wpcf7-form-control" style="width: calc(2% + 20px);height: 18px;" required>Accept <a>Terms & Conditions</a></span>
                                                        </div>
                                                        <div class="wpcf7-form">
                                                            <span><input type="checkbox" name="newsletter" id="newsletter" class="wpcf7-form-control" style="width: calc(2% + 20px);height: 18px;">Subscribe to our newsletter? Assurance anti-spam</span>
                                                        </div>
                                                        </br>
                                                        <div class="wpcf7-form">
                                                            <input  type="button" name="register-submit" id="register-submit" value="Register" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span>
                                                        </div>
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
        <div style="display: none">
            <div id="swal-email-confirm" class="block-page text-center">
                <a href="index.html"><img src="/CoinHoarder/img/element/mail.png" alt="mail"></a>
                <h3 class="text-white text-bold">Confirm your email address!</h3>
                <p class="text-white second-p">A confirmation e-mail has been sent
                    to your address</p>
                <p class="text-white second-p">Check your inbox and<br>
                    click on the email link to activate<br>
                    <span>your account.</span></p>
                <p><a href="/CoinHoarder/login.php">Back to Login</a></p>
            </div>
        </div>
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
