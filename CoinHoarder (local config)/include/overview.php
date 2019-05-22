<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 12/03/2018
 * Time: 18:47
 */

//if it's not linked to your hoard
if(!isset($overview)){
    $notlinked = $functions->executeQuery("SELECT * FROM coins WHERE ticker = '".$_GET['overview']."'");
    $overview = $notlinked[0];
    echo "<script>var notlinked=".json_encode($overview)."</script>";
}
$feeds = $functions->executeQuery("SELECT AVG(value) AS rating FROM coin_feeds WHERE idCoin = '".$overview['id']."' AND feed = 1");
$rating = round((isset($feeds[0]["rating"])?$feeds[0]["rating"]:0)*2)/2;
$feeds = $functions->executeQuery("SELECT value AS follow FROM coin_feeds WHERE idCoin = '".$overview['id']."' AND idUser = '".$_SESSION['user']['id']."' and feed = 0");
$follow = isset($feeds[0]["follow"])?$feeds[0]["follow"]:0;
$coinsocial = $functions->curl("https://www.cryptocompare.com/api/data/socialstats/?id=".$overview['cryptocompare'], "", "");
$coininfo =  $functions->curl("https://www.cryptocompare.com/api/data/coinsnapshotfullbyid/?id=".$overview['cryptocompare'], "", "");
$coinnews = $functions->curl("https://min-api.cryptocompare.com/data/v2/news/?lang=EN&categories=".$overview['ticker'], "", "");
?>
<!-- PAGE CONTENT -->

<!---------------------------------------------------------------------------------------->
<div class="vc_row wpb_row vc_row-fluid" id="overview-banner">
    <div class="wpb_column vc_column_container vc_col-sm-2">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper logo-overview">
                <!--    LOGO   -->
                <?php if($overview['image']=="cryptocoins"){
                    echo "<i class='cc ".$overview['ticker']."' title='".$overview['ticker']."'></i>";
                }else if($overview['image']=="cryptocompare"){
                    echo "<img src='https://www.cryptocompare.com".$coininfo['Data']['General']['ImageUrl']."'>";
                }else {//default coinmarketcap
                    echo "<img src='https://s2.coinmarketcap.com/static/img/coins/200x200/".$overview['coinmarketcap'].".png'>";
                } ?>
            </div>
        </div>
    </div>
    <div class="wpb_column vc_column_container vc_col-sm-10">
        <div class="vc_column-inner ">
            <div class="overview wpb_wrapper panel-default">

                <div class="panel-heading no-padding">
                    <div class="vc_col-md-3">
                        <h1 id="overview-price_usd" class="title-price"></h1>
                        <p id="overview-price_btc" class="title-price"></p>
                    </div>
                    <div class="vc_col-xs-9 vc_col-md-9 icons">
                        <span class="large-icons <?php if($overview["pow"]&&$overview["status"]>0) echo "text-yellow\" title=\"Available"; else echo "\" title=\"Not available" ?>" data-toggle="tooltip"><i class="fa fa-gavel"></i></span>
                        <span class="large-icons <?php if($overview["mn"]&&$overview["status"]>0) echo "text-yellow\" title=\"Available"; else echo "\" title=\"Not available" ?>" data-toggle="tooltip"><i class="fa fa-cubes"></i></span>
                        <span class="large-icons <?php if($overview["pos"]&&$overview["status"]>0) echo "text-yellow\" title=\"Available"; else echo "\" title=\"Not available" ?>" data-toggle="tooltip"><i class="fa fa-bolt"></i></span>
                    </div>
                </div>
                <hr class="cryptic">
                <div class="all-changes">
                    <div class="hidden-xs vc_col-md-3">
                        <i id="follow" class="fa fa-users <?php if($follow){echo 'text-yellow';}else{echo 'text-black';} ?> follow"><label class="full" for="follow" title="Follow for news and updates"></label></i>
                        <fieldset class="rating">
                            <input type="radio" id="star53" name="rating3" value="5" <?php if($rating == 5) echo 'checked="checked"'; ?>><label class="full" for="star53" title="5 stars"></label>
                            <input type="radio" id="star43half" name="rating3" value="4.5" <?php if($rating == 4.5) echo 'checked="checked"'; ?>><label class="half" for="star43half" title="4.5 stars"></label>
                            <input type="radio" id="star43" name="rating3" value="4" <?php if($rating == 4) echo 'checked="checked"'; ?>><label class="full" for="star43" title="4 stars"></label>
                            <input type="radio" id="star33half" name="rating3" value="3.5" <?php if($rating == 3.5) echo 'checked="checked"'; ?>><label class="half" for="star33half" title="3.5 stars"></label>
                            <input type="radio" id="star33" name="rating3" value="3" <?php if($rating == 3) echo 'checked="checked"'; ?>><label class="full" for="star33" title="3 stars"></label>
                            <input type="radio" id="star23half" name="rating3" value="2.5" <?php if($rating == 2.5) echo 'checked="checked"'; ?>><label class="half" for="star23half" title="2.5 stars"></label>
                            <input type="radio" id="star23" name="rating3" value="2" <?php if($rating == 2) echo 'checked="checked"'; ?>><label class="full" for="star23" title="2 stars"></label>
                            <input type="radio" id="star13half" name="rating3" value="1.5" <?php if($rating == 1.5) echo 'checked="checked"'; ?>><label class="half" for="star13half" title="1.5 stars"></label>
                            <input type="radio" id="star13" name="rating3" value="1" <?php if($rating == 1) echo 'checked="checked"'; ?>><label class="full" for="star13" title="1 star"></label>
                            <input type="radio" id="starhal3f" name="rating3" value="half" <?php if($rating == 0.5) echo 'checked="checked"'; ?>><label class="half" for="starhal3f" title="0.5 stars"></label>
                        </fieldset>
                    </div>
                    <div id="overview-1h" class="vc_col-md-3 no-padding">

                    </div>
                    <div id="overview-24h" class="vc_col-md-3 no-padding">

                    </div>
                    <div id="overview-7d" class="vc_col-md-3 no-padding">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------->
<div class="spacer_40"></div>
<div class="clearfix"></div>
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-<?php echo 4+(intval($overview['mn'])*2) ?> vc_col-md-<?php echo 4-intval($overview['mn']) ?>">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <!--    COIN INFO    -->
                <div class="panel panel-cryptic element-box-shadow">
                    <div class="panel-heading">
                        <h3 class="text-bold no-margin">
                            <span class="icon-info"></span> Coin Info
                        </h3>
                    </div>
                    <div class="panel-body height" style="padding-bottom: 10px;">
                        <p class="flex-hide"><span class="text-bold">Name:</span> <?= $coininfo['Data']['General']['Name'] ?></p>
                        <p><span class="text-bold">Ticker:</span> <?= $coininfo['Data']['General']['Symbol'] ?></p>
                        <p><span class="text-bold">Date:</span> <?= $coininfo['Data']['General']['StartDate'] ?></p>
                        <p class="text-center">
                            <a target='_blank' href=" <?= $coininfo['Data']['General']['WebsiteUrl'] ?>"><button class="social-media-circle website-social"><i class="fa fa-globe" aria-hidden="true"></i></button></a>
                            <?php
                            if(isset($coinsocial['Data']['Facebook']) && isset($coinsocial['Data']['Facebook']['link']))
                                echo "<a target='_blank' href='".$coinsocial['Data']['Facebook']['link']."'><button class='social-media-circle facebook-social'><i class='fa fa-facebook' aria-hidden='true'></i></button></a>";
                            if(isset($coinsocial['Data']['Youtube']))
                                echo "<a target='_blank' href='".$coinsocial['Data']['Youtube']['link']."'><button class='social-media-circle youtube-social'><i class='fa fa-youtube' aria-hidden='true'></i></button></a>";
                            if(isset($coinsocial['Data']['Twitter']))
                                echo "<a target='_blank' href='".$coinsocial['Data']['Twitter']['link']."'><button class='social-media-circle twitter-social'><i class='fa fa-twitter' aria-hidden='true'></i></button></a>";
                            if(isset($coinsocial['Data']['Dropbox']))
                                echo "<a target='_blank' href='".$coinsocial['Data']['Dropbox']['link']."'><button class='social-media-circle dropbox-social'><i class='fa fa-dropbox' aria-hidden='true'></i></button></a>";
                            if(isset($coinsocial['Data']['Flickr']))
                                echo "<a target='_blank' href='".$coinsocial['Data']['Flickr']['link']."'><button class='social-media-circle flickr-social'><i class='fa fa-flickr' aria-hidden='true'></i></button></a>";
                            if(isset($coinsocial['Data']['Tumblr']))
                                echo "<a target='_blank' href='".$coinsocial['Data']['Tumblr']['link']."'><button class='social-media-circle tumblr-social'><i class='fa fa-tumblr' aria-hidden='true'></i></button></a>";
                            if(isset($coinsocial['Data']['CodeRepository']['List'][0]))
                                echo "<a target='_blank' href='".$coinsocial['Data']['CodeRepository']['List'][0]['url']."'><button class='social-media-circle github-social'><i class='fa fa-github' aria-hidden='true'></i></button></a>";
                            ?>
                        </p>
                    </div>
                    <?php // print_r($functions->stream("http://www.convert-unix-time.com/api?timestamp=now", "", "")) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="wpb_column vc_column_container vc_col-sm-<?php echo 4+(intval($overview['mn'])*2) ?> vc_col-md-<?php echo 4-intval($overview['mn']) ?>">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    TECH INFO    -->
                <div class="panel panel-cryptic element-box-shadow">
                    <div class="panel-heading">
                        <h3 class="text-bold no-margin">
                            <span class="icon-wrench"></span> Tech Info
                        </h3>
                    </div>
                    <div class="panel-body height">
                        <p><span class="text-bold">Algorithm:</span> <?= $coininfo['Data']['General']['Algorithm'] ?></p>
                        <p><span class="text-bold">Block Number:</span> <?= $coininfo['Data']['General']['BlockNumber'] ?></p>
                        <p><span class="text-bold">Block Reward:</span> <?= $coininfo['Data']['General']['BlockReward'] ?></p>
                        <p><span class="text-bold">Block Time:</span> <?= $coininfo['Data']['General']['BlockTime'] ?></p>
                    </div>
                    <?php // print_r($functions->stream("http://www.convert-unix-time.com/api?timestamp=now", "", "")) ?>
                </div>

            </div>
        </div>
    </div>
    <div class="wpb_column vc_column_container vc_col-sm-<?php echo 4+(intval($overview['mn'])*2) ?> vc_col-md-<?php echo 4-intval($overview['mn']) ?>">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    MINING(POS, POW, MN) INFO    -->
                <div class="panel panel-cryptic element-box-shadow">
                    <div class="panel-heading">
                        <h3 class="text-bold no-margin">
                            <span class="icon-speedometer"></span> Proof Info
                        </h3>
                    </div>
                    <div class="panel-body height">
                        <p><span class="text-bold">Type:</span> <?= $coininfo['Data']['General']['ProofType'] ?></p>
                        <p><span class="text-bold">Net<?php if(!$overview['mn']) echo ' Hashes/s'; ?>:</span> <?= $coininfo['Data']['General']['NetHashesPerSecond'] ?></p>
                        <p><span class="text-bold">Total <?php if(!$overview['mn']) echo 'Coin'; ?> Supply:</span> <?= $coininfo['Data']['General']['TotalCoinSupply'] ?></p>
                        <p><span class="text-bold">Total <?php if(!$overview['mn']) echo 'Coin'; ?> Mined:</span> <?= $coininfo['Data']['General']['TotalCoinsMined'] ?></p>
                    </div>
                    <?php // print_r($functions->stream("http://www.convert-unix-time.com/api?timestamp=now", "", "")) ?>
                </div>
            </div>
        </div>
    </div>
    <?php if($overview['mn']){  ?>
        <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-md-3">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <!--    MN INFO    -->
                    <div class="panel panel-cryptic element-box-shadow">
                        <div class="panel-heading">
                            <h3 class="text-bold no-margin">
                                <span class="icon-organization"></span> Masternode
                            </h3>
                        </div>
                        <div class="panel-body height">
                            <p><span class="text-bold">Collateral:</span> <?= $overview['collateral'] ?></p>
                            <p id="mn-count"><span class="text-bold">Active:</span> </p>
                            <p><span class="text-bold">Reward:</span> <?= $overview['mnAmount'] ?></p>
                            <p>&nbsp;</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!---------------------------------------------------------------------------------------->
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-md-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    TRADING VIEW    -->
                <div id="tv_chart_container" class="tradingview-widget-container">
                    <script type="text/javascript">
                        var widget;
                        function getParameterByName(name) {
                            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                                results = regex.exec(location.search);
                            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
                        }

                        TradingView.onready(function()
                        {
                            widget = window.tvWidget = new TradingView.widget({
                                // debug: true, // uncomment this line to see Library errors and warnings in the console
                                fullscreen: true,
                                symbol: '<?= $overview['ticker'] ?>',
                                interval: 'D',
                                container_id: "tv_chart_container",
                                datafeed: new Datafeeds.UDFCompatibleDatafeed("https://min-api.cryptocompare.com","da01b98323a4d76cbc8173ab89ab6ff53f7f8cd23fc641fb794be7cb2d2a9af8"),
                                library_path: "/coinhoarder/plugins/tradingview/charting_library/",
                                height: 600,
                                locale: getParameterByName('lang') || "en",

                                disabled_features: ["use_localstorage_for_settings","save_chart_properties_to_local_storage","timezone_menu","header_saveload","compare_symbol","border_around_the_chart","header_compare"],
                                enabled_features: ["move_logo_to_main_pane", "study_templates"],
                                charts_storage_url: 'https://saveload.tradingview.com',
                                charts_storage_api_version: "1.1",
                                client_id: 'tradingview.com',
                                user_id: 'public_user_id',
                                theme: 'Light',
                            });

                            widget.onChartReady(function() {
                                widget.chart().onIntervalChanged().subscribe(null, function(interval, obj) {
                                    widget.chart().executeActionById("chartReset");
                                    widget.chart().executeActionById("timeScaleReset");
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!isset($notlinked)){ ?>
<!---------------------------------------------------------------------------------------->
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-md-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <div id="barchart"></div>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------->
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-md-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    ADDRESS    -->
                <div class="panel-heading no-padding">
                    <ul class="breadcrumb-cryptic">
                        <li>
                            <a href="/coinhoarder/">My Address</a>
                            <span class="fa fa-angle-double-right"></span>
                            <a id="new-hoard" class="clickable"><span class="fa fa-plus-circle"></span> NEW</a>
                        </li>
                    </ul>
                    <hr class="cryptic">
                </div>
                <div class="panel-body padding_table panel-empty">
                    <?php if(sizeof($overview['addresses'])){ ?>
                    <div class="table-responsive">
                        <table class="input-table table">
                            <tbody id="data-tables-address">
                            <?php
                            foreach($overview['addresses'] as $row => $address) {
                            ?>
                                <tr data-address="<?= $address['address'] ?>">
                                    <td class="save"><i class="fa fa-save" style="display: none;"></i></td>
                                    <td class="no-padding"><input class="input-masked address-name" type="text" data-default="<?= $address['name'] ?>" value="<?= $address['name'] ?>"></td>
                                    <td ><?= $address['address'] ?></td>
                                    <td class="no-padding text-right"><input class="input-masked address-quantity text-right"" type="number" id="address<?= $row+1 ?>-quantity" data-default="<?= $address['quantity'] ?>" data-quantity="<?= $address['quantity'] ?>" data-balance="0" value="<?= $address['quantity'] ?>"></td>
                                    <!-- default: per controllare se è cambiato il valore -->
                                    <!-- quantity: per impostare quando si attiva onfocus -->
                                    <!-- balance: per ripristinare quando si (disattiva onfocus)/(attiva offfocus) -->
                                    <td class="text-right"><?= $prefCurrencyS ?><span id="address<?= $row+1 ?>-quantity_usd"><?= $address['quantity'] ?></span></td>
                                    <td class="text-center">
                                         <?php if($overview["status"]>0) {
                                                if($address['service'] == "mn")$i="fa-cubes";else if($address['service'] == "pos")$i="fa-bolt";else if($address['service'] == "pow")$i="fa-gavel";else $i="fa-lock";
                                                echo "<i class=\"fa " . $i . " address-service\"></i>
                                                   <i class=\"fa fa-bell address-settings\"></i>";
                                                }
                                         ?>
                                         <i class="fa fa-close address-remove"></i>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td style="border: 0px;"></td>
                                <td class="highrow"></td>
                                <td class="highrow text-center"><strong>Total</strong></td>
                                <td class="highrow text-right"><span id="total-quantity"></span></td>
                                <td class="highrow text-right"><?= $prefCurrencyS ?><span id="total-quantity_usd"></span></td>
                                <td class="highrow"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        <?php
                    }else{
                        echo "<p>You have no address linked to this coin</p>";
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------->
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-md-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    TRANSACTIONS    -->
                <div class="panel panel-default table-transactions">
                    <div class="panel-heading">
                        <ul class="breadcrumb-cryptic">
                            <li>
                                <a href="/coinhoarder/myhoard.php?overview=<?= $_GET['overview'] ?>&page=Transactions">Transactions list</a>
                                <span class="fa fa-angle-double-right"></span>
                            </li>
                            <li>
                                <a>Latest 10</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding_table">
                        <table class="table table-striped no-margin">
                            <tbody id="data-tables-transaction">
                                <tr id="latest-txs">
                                    <th>Transaction Hash</th>
                                    <th>Time</th>
                                    <th>Address</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>

<!---------------------------------------------------------------------------------------->
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    NEWS    -->
                <div class="spacer_20"></div>
                <div class="panel-heading no-padding">
                    <ul class="breadcrumb-cryptic"></ul>
                    <hr class="cryptic">
                </div>
                <div class="blog-posts-grid">
                    <div class="row">
                        <?php
                        foreach($coinnews['Data'] as $idx => $news) {
                            ?>
                            <div id="<?= $news['id'] ?>" class="col-xs-6 col-md-3">
                                <div class="panel panel-default">
                                    <div onclick="location.href='<?= $news['url'] ?>'" class="panel-body no-padding blog-post">
                                        <div class="blog-post-image">
                                            <img src="<?= $news['imageurl'] ?>" alt="img-blog">
                                        </div>
                                        <p class="vc_hidden-xs blog-date text-bold"><?= date("m/d/Y", $news['published_on']) ?></p>
                                        <h4 class="vc_hidden-sm vc_hidden-xs text-bold no-margin padding_30"><?= $news['title'] ?></h4>
                                        <!--<p class="post-body"><?php //echo $news['body'] ?></p>-->
                                        <div class="vc_hidden-sm vc_hidden-xs post-details">
                                            <!--<p class="post-details-name text-bold"><span>Posted by</span> <?php //echo $news['source'] ?></p>-->
                                            <p class="post-details-comments text-bold"><span class="label label-info"><?= $news['categories'] ?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($idx >= 3) break;
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------->



<div style="display: none">
    <div class="panel panel-default">
        <div class="panel-body no-padding">
            <div id="swal-new-hoard" class="stepper x2">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a class="persistant-disabled" href="#stepper-step-2" data-toggle="tab" aria-controls="stepper-step-2" role="tab" title="" data-original-title="Step 2">
                            <span class="round-tab">2</span>
                        </a>
                        <p class="text-bold">Address</p>
                    </li>
                    <li role="presentation" class="disabled">
                        <a class="persistant-disabled" href="#stepper-step-3" data-toggle="tab" aria-controls="stepper-step-3" role="tab" title="" data-original-title="Complete">
                            <span class="round-tab">3</span>
                        </a>
                        <p class="text-bold">Balance</p>
                    </li>
                </ul>
                <form  id="new-hoard-form" name="new-hoard-form" class="form-horizontal">
                    <fieldset>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-2" name="addresses">
                                <h4 class="text-bold padder">Add an address to monitor your balance<i class="clickable add-row"><span class="fa fa-plus"></span> 1</i></h4>
                                <div class="vc_col-md-12 wpcf7-form">
                                    <input type="text" name="newaddress1" id="newaddress1" placeholder="address" value="">
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                                <h4 class="text-bold padder">Do you want to add an external amount to your balance?</h4>
                                <div class="vc_col-md-12 wpcf7-form">
                                    <input type="number" name="newquantity1" id="newquantity1" class="wpcf7-form-control" placeholder="$$$" value="0">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body no-padding">
            <div id="swal-remove-address" >
                <h4 class="text-bold padder">Do you want to remove this address?</h4>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body no-padding">
            <div id="swal-settings-address" >




                <h4 class="text-bold padder">Notification settings</h4>


                <form id="settings-address-form" name="settings-address-form" class="form-horizontal">

                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="wpb_accordion wpb_content_element  not-column-inherit" data-collapsible="" data-vc-disable-keydown="false" data-active-tab="0">
                                    <div class="wpb_wrapper wpb_accordion_wrapper ui-accordion ui-widget ui-helper-reset" role="tablist">

                                        <?php if($overview["mn"]&&$overview["status"]>0){?>
                                        <div class="wpb_accordion_section group">
                                            <button name="status-enable-alert" id="status-enable-alert" type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="true" autocomplete="off" style="
                                                        position: absolute;
                                                        z-index: 1;
                                                        right: 27px;
                                                        margin: 13px 0;
                                                    ">
                                                <div class="handle"></div>
                                            </button>
                                            <h3 class="wpb_accordion_header ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="h-acc-0" aria-controls="c-acc-0" aria-selected="false" aria-expanded="false" tabindex="-1">

                                                <a>Status change<span> (only for MN)</span> </a>
                                            </h3>
                                            <div class="wpb_accordion_content ui-accordion-content vc_clearfix ui-helper-reset ui-widget-content ui-corner-bottom" id="c-acc-0" aria-labelledby="h-acc-0" role="tabpanel" style="display: none;" aria-hidden="true">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <fieldset>
                                                            <div class="wpcf7-form small">
                                                                <span>Platform: </span>
                                                                <select class="" name="status-platform-alert" id="status-platform-alert">
                                                                    <option <?php if(!$_SESSION['user']['telegram']) echo "disabled>Telegram (enable it first in the account settings)";
                                                                                    else echo "value=\"".$_SESSION['user']['telegram']."\" >telegram";?></option>
                                                                    <option value="<?= $_SESSION['user']['email'] ?>">mail</option>
                                                                    <option disabled>Discord (developing<p class="developing"><span>.</span><span>.</span><span>.</span></p>)</option>
                                                                </select>
                                                            </div>
                                                            <div class="row padding_10">
                                                                <div class="wpcf7-form small col-md-offset-2 col-md-4 ">
                                                                    <span>Limit: </span>
                                                                    <input type="number" name="status-limit-alert" id="status-limit-alert" size="40" class="wpcf7-form-control" placeholder="n°" value="">
                                                                </div>
                                                                <div class="wpcf7-form small col-md-4 offse">
                                                                    <span> each: </span>
                                                                    <select class="" name="status-each-alert" id="status-each-alert">
                                                                        <option value="60">hour</option>
                                                                        <option value="1440">day</option>
                                                                        <option value="10080">week</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="wpcf7-form col-md-offset-1 col-md-6 padding_10">
                                                                    <span>
                                                                        <input type="checkbox" name="status-disable-alert" id="status-disable-alert" class="wpcf7-form-control" style="width: 10%;">
                                                                        Autodisable after:
                                                                    </span>
                                                                </div>
                                                                <div class="wpcf7-form flex small row">
                                                                    <input type="number" name="status-disable-limit-alert" id="status-disable-limit-alert" size="40" class="wpcf7-form-control no-margin" style="width: 29%;" placeholder="n°" value="">
                                                                    <span class="padding_10"> alerts</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php } ?>

                                        <div class="wpb_accordion_section group">
                                            <button name="io-enable-alert" id="io-enable-alert" type="button" class="btn btn-sm btn-toggle" data-toggle="button" aria-pressed="true" autocomplete="off" style="
                                                        position: absolute;
                                                        z-index: 1;
                                                        right: 27px;
                                                        margin: 13px 0;
                                                    ">
                                                <div class="handle"></div>
                                            </button>
                                            <h3 class="wpb_accordion_header ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="h-acc-1" aria-controls="c-acc-1" aria-selected="false" aria-expanded="false" tabindex="-1">
                                                <a>Transaction I/O</a>
                                            </h3>
                                            <div class="wpb_accordion_content ui-accordion-content vc_clearfix ui-helper-reset ui-widget-content ui-corner-bottom" id="c-acc-1" aria-labelledby="h-acc-1" role="tabpanel" aria-hidden="true" style="display: none;">
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <fieldset>
                                                        <div class="wpcf7-form small">
                                                            <span>Platform: </span>
                                                            <select class="" name="io-platform-alert" id="io-platform-alert">
                                                                <option <?php if(!$_SESSION['user']['telegram']) echo "disabled>Telegram (enable it first in the account settings)";
                                                                else echo "value=\"".$_SESSION['user']['telegram']."\" >telegram";?></option>
                                                                <option value="<?= $_SESSION['user']['email'] ?>">mail</option>
                                                                <option disabled>Discord (Developing...)</option>
                                                            </select>
                                                        </div>
                                                        <div class="wpcf7-form col-md-offset-1 col-md-6 padding_10">
                                                                <span>
                                                                    <input type="checkbox" name="io-mined-alert" id="io-mined-alert" class="wpcf7-form-control" style="width: 10%;">
                                                                    Alert me only for pow/pos payment
                                                                </span>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>