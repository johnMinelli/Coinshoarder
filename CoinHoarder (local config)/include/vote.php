<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 12/03/2018
 * Time: 18:47
 */

?>

<!-- PAGE CONTENT -->
<script src="/coinhoarder/plugins/flipclock/flipclock.js"></script>
<!---------------------------------------------------------------------------------------->
<?php
$round = $functions->executeQuery("SELECT * FROM vote_round ORDER BY id DESC LIMIT 1");
?>

<div class="vc_row wpb_row vc_row-fluid vc_custom_1509621455424 vc_row-has-fill"
     style="position: relative;
    float: right;
    right: -366.5px;
    box-sizing: border-box;
    width: 1903px;
    padding-left: 366.5px;
    padding-right: 366.5px;">
    <div class="pannel-landing-back"></div>
    <div class="pannel-landing-page">
        <div class="wpb_column vc_column_container vc_hidden-xs vc_hidden-sm vc_col-md-offset-2 vc_col-md-2 vc_col-lg-offset-0 vc_col-lg-5 text-left content-1 curtain">
            <div class="wpb_wrapper">
                <div class="title-subtile-holder">
                    <h1 class="section-title dark_title">How it works?</h1>
                    <div class="section-border dark_border"></div>
                    <div class="section-subtitle dark_subtitle"></div>
                </div>
            </div>
            <div class="curtain-wrapper">
                <input type="checkbox" checked="">
                <div class="vc_col-sm-4 vc_col-md-12 vc_col-lg-4 curtain-panel curtain-panel-left">
                    <div class="wpb_wrapper flex">
                        <img src="/coinhoarder/img/icon/vote_icon.png">
                        <div class="wpb_text_column wpb_content_element">
                            <h2 class="vc_custom_heading vc_custom_1510650626741 text-bold" style="font-size: 23px;text-align: right;color: #252525;">Vote</h2>
                            <div class="wpb_text_column wpb_content_element ">
                                <p style="text-align: right;">Vote now to support your preferred coin and benefit all the
                                    functionalities of the platform</p>
                            </div>
                        </div>
                    </div>
                    <div class="spacer_80"></div>
                    <div class="spacer_80 vc_hidden-lg"></div><div class="wpb_wrapper flex">
                        <img src="/coinhoarder/img/icon/share_icon.png">
                        <div class="wpb_text_column wpb_content_element">
                            <h2 style="font-size: 23px;text-align: right;color: #252525;" class="vc_custom_heading vc_custom_1510650626741 text-bold">Share</h2>
                            <div class="wpb_text_column wpb_content_element ">
                                <p style="text-align: right;">Share your referral number with your mates to gain weight
                                    in the votation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="curtain-prize vc_hidden-md">
                    <div class="vc_column-inner text-center">
                        <a><span class="fa fa-arrow-circle-left"></span></a>
                        <a><span class="fa fa-arrow-circle-right"></span></a>
                        <p>Test our referral program here. Your actual weight is <span id="test-weight">1.5</span></p>
                        <div class="spacer_20"></div>
                        <div class="wpb_wrapper">
                            <div class="test-ref-container">
                                <span class="cc test-ref BTC" style="left: 38.5%;top: 7.8%;"></span><span class="cc test-ref DASH" style="left: 16%;top: 46%;"></span><span class="cc test-ref DASH" style="left: 38.4%;top: 41.8%;"></span><span class="cc test-ref XRP" style="left: 61%;top: 45.8%;"></span><span class="cc test-ref XRP" style="left: -0.7%;top: 77.3%;"></span><span class="cc test-ref XRP" style="left: 9.3%;top: 84.3%;"></span><span class="cc test-ref BTC" style="left: 19.3%;top: 81.6%;"></span><span class="cc test-ref XRP" style="left: 29.6%;top: 78.1%;"></span><span class="cc test-ref BTC" style="left: 38.3%;top: 82.2%;"></span><span class="cc test-ref XRP" style="left: 46.9%;top: 77.6%;"></span><span class="cc test-ref XRP" style="left: 56.8%;top: 81.6%;"></span><span class="cc test-ref XRP" style="left: 67.1%;top: 84.3%;"></span><span class="cc test-ref XRP" style="left: 77.2%;top: 77.3%;"></span>
                            </div>
                            <img src="/coinhoarder/img/element/ref_struct.png">
                            <hr class="dark">
                            <img src="/coinhoarder/img/element/ref.png">
                        </div>
                    </div>
                    <a class="btn btn-cryptic-dark btn-bordered">Test now</a>
                </div>
                <div class="vc_col-sm-4 vc_col-md-12 vc_col-lg-4 curtain-panel curtain-panel-right">
                    <div class="wpb_wrapper flex">
                        <div class="wpb_text_column wpb_content_element">
                            <h2 style="font-size: 23px;color: #252525;text-align: left;" class="text-bold">Win</h2>
                            <p style="text-align: left;">The referer with the highest vote of the winning coin will get
                                the wallet prize! So fast and Share!</p>
                        </div>
                        <img src="/coinhoarder/img/icon/win_icon.png">
                    </div>
                    <div class="spacer_80"></div>
                    <div class="spacer_80 vc_hidden-lg"></div><div class="wpb_wrapper flex">
                        <div class="wpb_text_column wpb_content_element">
                            <h2 style="font-size: 23px;color: #252525;text-align: left;" class="text-bold">Support</h2>
                            <p style="text-align: left;">Also remember to make a donation to the coin's wallet: maybe
                                you will be the lucky winner!! </p>
                        </div>
                        <img src="/coinhoarder/img/icon/support_icon.png"></div>
                </div>
            </div>
        </div>
        <div class="vc_col-xs-10 vc_col-sm-9 vc_col-md-2 vc_col-lg-2 background-black content-2">
            <div class="vc_column-inner ">
<?php
if($round[0]["date"] <= date("Y-m-d")) {
?>
                    <div class="wpb_wrapper smallscreen">
                        <h5 class="text-white text-center">Round Ended</h5>
                        <div class="countdownv2_holder">
                            <div class="countdownv2 clock flip-clock-wrapper" data-count-down="0000-00-00">
                            </div>
                        </div>
                        <div id="podium" class="vc_col-xs-offset-5 vc_col-xs-2 vc_col-sm-offset-4 vc_col-sm-4 vc_col-md-offset-0 vc_col-md-12">
                        </div>
                        <div id="roundPrizeWon" class="vc_col-xs-offset-5 vc_col-xs-2 vc_col-sm-offset-4 vc_col-sm-4 vc_col-md-offset-0 vc_col-md-12">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<div id="contest" data-round="<?= $round[0]["id"] ?>" class="vc_row wpb_row vc_row-fluid "></div>
<?php
}else{
?>
                    <div class="wpb_wrapper smallscreen">
                        <h5 class="text-white text-center">Round Ends In:</h5>
                        <div class="countdownv2_holder">
                            <div class="countdownv2 clock flip-clock-wrapper"
                                 data-count-down="<?= $round[0]["date"] ?>">
                            </div>
                        </div>
                        <div id="podium"
                             class="vc_col-xs-offset-5 vc_col-xs-2 vc_col-sm-offset-4 vc_col-sm-4 vc_col-md-offset-0 vc_col-md-12">
                        </div>
                        <div id="roundPrize"
                             class="vc_col-xs-offset-5 vc_col-xs-2 vc_col-sm-offset-4 vc_col-sm-4 vc_col-md-offset-0 vc_col-md-12">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="spacer_40"></div>
<div class="clearfix"></div>
<div class="wpb_column vc_column_container vc_col-md-12">
    <div class="vc_column-inner ">
        <div class="wpb_wrapper">
            <div class="title-subtile-holder">
                <h1 class="section-title dark_title">MAKE YOUR CHOICE</h1>
                <div class="section-border dark_border"></div>
                <div class="section-subtitle dark_subtitle"></div>
            </div>
        </div>
    </div>
</div>
<div id="contest" data-round="<?= $round[0]["id"] ?>" class="vc_row wpb_row vc_row-fluid ">
    <div class="row animateIn wow fadeIn animated members-page-v2">
        <?php

        for ($i = 1; isset($round[0]["coin" . $i]); $i++) {
            $coin = $functions->executeQuery("SELECT * FROM coins WHERE coins.id=" . $round[0]["coin" . $i]);
            $coin = $coin[0];
            $feeds = $functions->executeQuery("SELECT AVG(value) AS rating FROM coin_feeds WHERE idCoin = '" . $coin['id'] . "' AND feed = 1");
            $rating = round($feeds[0]["rating"] * 2) / 2;
            $feeds = $functions->executeQuery("SELECT COUNT(value) AS follow FROM coin_feeds WHERE idCoin = '" . $coin['id'] . "' AND feed = 0");
            $follow = $feeds[0]["follow"];
            ?>
            <div class="wpb_column vc_column_container vc_col-lg-4 vc_col-md-4 <?php if(($i%2)==1 && !isset($round[0]["coin" . ($i+1)])) echo "vc_col-md-offset-0 vc_col-sm-offset-3"; ?> vc_col-sm-6 vc_col-xs-12">
                <div class="member members_img_holder" data-coin="<?= $coin['id'] ?>">
                    <div class="memeber01-img-holder"><?php if($coin['image']=="cryptocoins") {
                            echo '<i class="cc '.$coin['ticker'].'" title="'.$coin['ticker'].'"></i>';
                        }else {//default coinmarketcap
                            echo '<img src="https://s2.coinmarketcap.com/static/img/coins/64x64/'.$coin['coinmarketcap'].'.png" alt="'.$coin['name'].'">';
                        } ?></div>
                    <div class="member01-content">
                        <div class="member01-content-inside">
                            <h3 class="member01_name text-center"><?= $coin['name'] . "(" . $coin['ticker'] . ")" ?></h3>

                            <div class="panel members-activity">
                                <div class="panel-heading"
                                     style="background-color:<?= $coin['color'] ? $coin['color'] : "#333" ?>">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="icon-user"></i>
                                        </div>
                                        <div class="col-xs-4">
                                            <i class="icon-star"></i>
                                        </div>
                                        <div class="col-xs-4">
                                            <i class="icon-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <p><?= $follow ?></p>
                                        </div>
                                        <div class="col-xs-4">
                                            <p><?= $rating ?></p>
                                        </div>
                                        <div class="col-xs-4">
                                            <p><?= ($follow + ($rating % 1.5)) * $rating ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="member01_position rank-section">

                            </h3>
                            <div class="vote-section">

                            </div>
                            <div class="bs-component">
                                <div id="bar-<?= $coin['id'] ?>" class="progress">
                                    <div class="progress-bar"
                                         style="background-color:<?= $coin['color'] ? $coin['color'] : "#333" ?>; width: 90%;"></div>
                                    <span class="progress-text text-white"></span>
                                    <input class="progress-address" type="text" value="" readonly style="opacity: 0">
                                    <span class="progress-copy" data-toggle="tooltip" title="Copy address"><i class="fa fa-copy"></i></span>
                                </div>
                            </div>
                            <div class="bs-component">
                                <div id="barBTC-<?= $coin['id'] ?>" class="progress">
                                    <div class="progress-bar" style="background-color:#ffd500; width: 90%;"></div>
                                    <span class="progress-text text-white"></span>
                                    <input class="progress-address" type="text" value="" readonly style="opacity: 0">
                                    <span class="progress-copy" data-toggle="tooltip" title="Copy address"><i class="fa fa-copy"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php
}
?>