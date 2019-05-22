<?PHP
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 23/04/2018
 * Time: 23:51
 */
require_once 'config.php';
if (!$functions->isLoggedIn()) {
    if (strcmp($functions->processRememberDirective(), 'ok') != 0) {
        header('Location: /Coinhoarder/login.php');
    }
}
//cache functions
$functions->cachecontrol();
//set preference cookies
$functions->setPreference($prefCurrency,$prefCurrencyS,$BTCtoPrefCurrency,$prefShowBalance,$prefNightMode);

$user = $functions->executeQuery("SELECT * FROM users WHERE id ='".$_SESSION['user']['id']."'");
$user=$user[0];
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- JQUERY -->
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom Style -->
    <link href="/CoinHoarder/css/custom.css" rel="stylesheet">
    <link id="ui-current-skin" href="/CoinHoarder/css/skin-colors/skin-yellow.css" rel="stylesheet">
    <!-- Custom Font-->
    <link href="/CoinHoarder/plugins/mt-skin-switcher/skin-switcher.css" rel="stylesheet">
    <link href="/CoinHoarder/css/night-mode.css" rel="stylesheet">


    <?PHP

    include(linkrel);
    ?>
    <script type='text/javascript' src='/CoinHoarder/js/nav_hoard.js'></script>
    <script type='text/javascript' src='/CoinHoarder/js/custom.min.js?ver=1.0.0'></script>
    <script type='text/javascript' src='/CoinHoarder/js/filereader.js?ver=1.0.0'></script>
    <script type='text/javascript' src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script type='text/javascript' src="/CoinHoarder/plugins/modernizr/modernizr.custom.js"></script>
    <script type='text/javascript' src='/CoinHoarder/plugins/sweetalert/sweetalert.min.js?ver=1.0.0'></script>



</head>

<body class="home page-template-default page page-id-5 widgets_v2   navstyle-v8 header4   wpb-js-composer js-comp-ver-5.4.5 vc_responsive <?php if(isset($_COOKIE["pref_night_mode"]) && $_COOKIE["pref_night_mode"]) echo 'night-mood-background'; ?>">

<!-- PAGE #page -->
<div id="page" class="hfeed site">
    <?php
    include(hoardBar);
    ?>
    <div class="spacer_50 hidden-xs hidden-sm-c"></div>
    <div class="spacer_50 hidden-xs hidden-sm-c"></div>
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
    <div class="spacer_20 hidden-xs"></div>
    <div id="primary" class="no-padding content-area no-sidebar">
        <div class="container smallscreen">
            <div class="row">
                <main id="main" class="col-md-12 site-main main-content">
                    <div class="entry-content">

                        <div class="vc_row wpb_row vc_row-fluid">
                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <!-- PAGE CONTENT -->
                                        <div class="right_col" role="main">
                                            <div class="spacer_30"></div>
                                            <div class="clearfix"></div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 col-lg-4">
                                                        <div class="panel element-box-shadow">
                                                            <div class="section1 text-center">
                                                                <?php
                                                                $base = $_SERVER['DOCUMENT_ROOT']."/CoinHoarder/uploads/users/".$_SESSION['user']['id'];
                                                                if(file_exists($base.".png") || file_exists($base.".jpg") || file_exists($base.".jpeg") ){
                                                                    ?>
                                                                <div id="user-image-v1">
                                                                    <div id="container" class="file">
                                                                        <div class="box">
                                                                            <div class="progress"></div>
                                                                        </div>
                                                                        <div class="v-align">
                                                                            <?php
                                                                            if(file_exists($base.".png"))
                                                                                echo '<img src="/CoinHoarder/uploads/users/'.$_SESSION['user']['id'].'.png" alt="user-image">';
                                                                            if(file_exists($base.".jpg"))
                                                                                echo '<img src="/CoinHoarder/uploads/users/'.$_SESSION['user']['id'].'.jpg" alt="user-image">';
                                                                            if(file_exists($base.".jpeg"))
                                                                                echo '<img src="/CoinHoarder/uploads/users/'.$_SESSION['user']['id'].'.jpeg" alt="user-image">';
                                                                            ?>
                                                                            <div class="arrow"></div>
                                                                        </div>
                                                                        <img id="image-holder">
                                                                    </div>
                                                                    <span><i class="fa fa-camera" aria-hidden="true"></i> Change on drop</span>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="spacer_50"></div>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                <div class="top animated bounceIn">
                                                                    <div id="popup">
                                                                      <span class="message">Profile Image Uploader<br />
                                                                        <small>Drop your image into the space below</small>
                                                                      </span>
                                                                    </div>
                                                                </div>
                                                                <div id="user-image-v1">
                                                                    <div id="container" >
                                                                        <div class="box">
                                                                            <div class="progress"></div>
                                                                        </div>
                                                                        <div class="v-align">
                                                                            <img src="/CoinHoarder/img/element/profile-pic.jpg" alt="user-image">
                                                                            <div class="arrow"></div>
                                                                        </div>
                                                                        <img id="image-holder">
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="spacer_80"></div>
                                                                <?php
                                                                }
                                                                ?>

                                                                <div class="spacer_80"></div>
                                                                <div class="clearfix"></div>
                                                                <h3 class="text-bold"><?= $user['name']." ".$user['surname'] ?></h3>
                                                                <p class="text-bold"><i class="fa fa-envelope-o"></i> <?= $user['email'] ?></p>
                                                                <?php if($user['phone'])   echo '<h4 class="text-bold"><i class="fa fa-phone"></i> '.$user['phone'].'</h4>'; ?>
                                                            </div>
                                                            <div class="section2">
                                                                <ul>
                                                                    <a><li><span class="icon-arrow-right-circle"></span> My profile </li></a>
                                                                    <a href="/CoinHoarder/myhoard.php"><li><span class="icon-arrow-right-circle"></span> Wallets</li></a>
                                                                    <a href="/CoinHoarder/myhoard.php?vote"><li><span class="icon-arrow-right-circle"></span> Opportunity </li></a>
                                                                    <a href="/CoinHoarder/index.php?faq"><li><span class="icon-arrow-right-circle"></span> Support </li></a>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-8">
                                                        <!--Personal details-->
                                                        <div class="panel panel-cryptic element-box-shadow">
                                                            <div class="panel-heading padding_30">
                                                                <h3 class="no-margin">Personal details</h3>
                                                            </div>
                                                            <div class="panel-body padding_30">
                                                                <form id="infouser-form" name="infouser-form-form" class="form-horizontal">
                                                                    <fieldset>
                                                                        <div class="wpcf7-form">
                                                                            <input type="text" name="name" id="name" size="40" class="wpcf7-form-control" placeholder="First Name" value="<?= $user['name'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input type="text" name="surname" id="surname" size="40" class="wpcf7-form-control" placeholder="Last Name" value="<?= $user['surname'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input type="email" name="email" id="email" size="40" class="wpcf7-form-control" placeholder="Email" value="<?= $user['email'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input type="number" name="phone" id="phone" size="40" class="wpcf7-form-control" placeholder="Phone Number" value="<?= $user['phone'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input  type="button" name="infouser-submit" id="infouser-submit" value="Save" class="btn wpcf7-form-control wpcf7-submit sweetalert31"><span class="ajax-loader"></span>
                                                                        </div>
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--Personal adderss-->
                                                        <div class="panel panel-cryptic element-box-shadow">
                                                            <div class="panel-heading padding_30">
                                                                <h3 class="no-margin">Address information</h3>
                                                            </div>
                                                            <div class="panel-body padding_30">
                                                                <form id="infouser2-form" name="infouser2-form" class="form-horizontal">
                                                                    <fieldset>
                                                                        <div class="wpcf7-form">
                                                                            <input type="text" name="street" id="street" size="40" class="wpcf7-form-control" placeholder="Street" value="<?= $user['street'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input type="text" name="city" id="city" size="40" class="wpcf7-form-control" placeholder="City" value="<?= $user['city'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input type="text" name="state" id="state" size="40" class="wpcf7-form-control" placeholder="State" value="<?= $user['state'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input type="number" name="zip" id="zip" size="40" class="wpcf7-form-control" placeholder="Postal Code" value="<?= $user['zip'] ?>">
                                                                        </div>
                                                                        <div class="wpcf7-form">
                                                                            <input  type="button" name="infouser2-submit" id="infouser2-submit" value="Save" class="btn wpcf7-form-control wpcf7-submit sweetalert31"><span class="ajax-loader"></span>
                                                                        </div>
                                                                    </fieldset>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--Social media-->
                                                        <div class="wpb_column vc_column_container vc_col-sm-3">
                                                            <div class="vc_column-inner ">
                                                                <div class="wpb_wrapper">
                                                                    <div class="social-icon-box vc_row wow fadeInUp animated animated">
                                                                        <div class="social-icon-box-holder social-log facebook-social">
                                                                            <a target="_blank" href="https://www.facebook.com/"><i class="list_icon fa fa-facebook icon-big"></i></a>
                                                                            <h3 class="list_title_text">Facebook</h3>
                                                                            <input id="social_fb" type="text" class="list_button_text" placeholder="/john.doe" value="<?= $user['social_fb'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wpb_column vc_column_container vc_col-sm-3">
                                                            <div class="vc_column-inner ">
                                                                <div class="wpb_wrapper">
                                                                    <div class="social-icon-box vc_row wow fadeInUp animated animated">
                                                                        <div class="social-icon-box-holder social-log twitter-social">
                                                                            <a target="_blank" href="https://www.twitter.com/"><i class="list_icon fa fa-twitter icon-big"></i></a>
                                                                            <h3 class="list_title_text">Twitter</h3>
                                                                            <input id="social_tw" type="text" class="list_button_text" placeholder="@johndoe" value="<?= $user['social_tw'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wpb_column vc_column_container vc_col-sm-3">
                                                            <div class="vc_column-inner ">
                                                                <div class="wpb_wrapper">
                                                                    <div class="social-icon-box vc_row wow fadeInUp animated animated">
                                                                        <div class="social-icon-box-holder social-log instagram-social">
                                                                            <a target="_blank" href="https://www.instagram.com/"><i class="list_icon fa fa-instagram icon-big"></i></a>
                                                                            <h3 class="list_title_text">Instagram</h3>
                                                                            <input id="social_in" type="text" class="list_button_text" placeholder="/johndoe" value="<?= $user['social_in'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wpb_column vc_column_container vc_col-sm-3">
                                                            <div class="vc_column-inner ">
                                                                <div class="wpb_wrapper">
                                                                    <div class="social-icon-box vc_row wow fadeInUp animated animated">
                                                                        <div class="social-icon-box-holder social-log linkedin-social">
                                                                            <a target="_blank" href="https://www.linkedin.com/"><i class="list_icon fa fa-linkedin icon-big"></i></a>
                                                                            <h3 class="list_title_text">Linkedin</h3>
                                                                            <input id="social_li" type="text" class="list_button_text" placeholder="/in/johndoe" value="<?= $user['social_li'] ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget_container" id="widget_container">
                                                            <script async
                                                                    src="https://telegram.org/js/telegram-widget.js?5"
                                                                    data-telegram-login="CoinshoarderBot"
                                                                    data-size="medium" data-userpic="false"
                                                                    data-radius="5" data-onauth="onTelegramAuth(user)"
                                                                    data-request-access="write"></script>
                                                            <p class="container text-danger">* Enable third party cookies</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="scrollToTop"><i class="fa fa-chevron-up text-white" aria-hidden="true"></i></a>
                                        </div>
                                        <!-- PAGE FOOTER -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .entry-content -->
                </main>
            </div>
        </div>
    </div>
</div>
</body>
</html>