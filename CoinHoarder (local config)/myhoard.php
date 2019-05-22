<?PHP
require_once 'config.php';
if (!$functions->isLoggedIn()) {
    if (strcmp($functions->processRememberDirective(), 'ok') != 0) {
        header('Location: /Coinhoarder/login.php');
    }else{
        header('Location: #welcomeback');
    }
}
//cache functions
$functions->cacheControl();
//set preference cookies
$functions->setPreference($prefCurrency,$prefCurrencyS,$BTCtoPrefCurrency,$prefShowBalance,$prefNightMode);
//set coins(tutti gli hoard), avgmarket(media prezzo ultimi 12 giorni),
$SQLcoins = array();
$JSONcoins = array();
$markets = array();
$functions->setCoinsArray($SQLcoins,$JSONcoins,$markets,$overview,$overviewRow,$prefCurrency);




?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- JQUERY -->
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Skin -->
    <link href="/CoinHoarder/css/custom.css" rel="stylesheet">
    <link id="ui-current-skin" href="/CoinHoarder/css/skin-colors/skin-yellow.css" rel="stylesheet">
    <link href="/CoinHoarder/plugins/mt-skin-switcher/skin-switcher.css" rel="stylesheet">
    <link href="/CoinHoarder/css/night-mode.css" rel="stylesheet">
    <!-- Font -->
    <link href="/CoinHoarder/fonts/cryptocoins.css" rel="stylesheet">
    <!-- Charts -->
    <link href="/CoinHoarder/plugins/amcharts/plugins/export/export.css" rel="stylesheet">
    <link href="/CoinHoarder/plugins/amcharts/custom-chart.css" rel="stylesheet">
    <link href="/CoinHoarder/plugins/rickshaw/rickshaw.min.css" rel="stylesheet">
    <!-- Table -->
    <link href="/CoinHoarder/plugins/dataTables/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Player -->
    <link href="/CoinHoarder/plugins/player/css/player.css" rel="stylesheet" >
    <?PHP
    include(linkrel);
    ?>


    <script type='text/javascript' src='/CoinHoarder/js/nav_hoard.js'></script>
    <!-- Hoard -->
    <script src="/CoinHoarder/js/custom.min.js"></script>
    <script src="/CoinHoarder/plugins/sweetalert/sweetalert.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script> old version-->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="/CoinHoarder/plugins/modernizr/modernizr.custom.js"></script>
    <!-- Player -->
    <script src="/CoinHoarder/plugins/player/js/player.js"></script>
    <!-- Charts -->
    <script src="/CoinHoarder/plugins/amcharts/amcharts.js"></script>
    <script src="/CoinHoarder/plugins/amcharts/pie.js"></script>
    <script src="/CoinHoarder/plugins/amcharts/serial.js"></script>
    <script src="/CoinHoarder/plugins/amcharts/plugins/export/export.min.js"></script>
    <script src="/CoinHoarder/plugins/amcharts/themes/light.js"></script>
    <script src="/CoinHoarder/plugins/amcharts/custom-chart.js"></script>
    <script src="/CoinHoarder/plugins/amcharts/plugins/responsive/responsive.min.js"></script>
    <script src="/CoinHoarder/plugins/highcharts/highcharts.js"></script>
    <script src="/CoinHoarder/plugins/highcharts/exporting.js"></script>
        <!-- Custom Charts Scripts -->
    <script src="/CoinHoarder/js/charts.js"></script>
    <!-- Table -->
    <script src="/CoinHoarder/plugins/dataTables/jquery.dataTables.min.js"></script>
    <!-- Tradingview -->
    <script type="text/javascript" src="/CoinHoarder/plugins/tradingview/charting_library/charting_library.min.js"></script>
    <script type="text/javascript" src="/CoinHoarder/plugins/tradingview/datafeeds/udf/dist/polyfills.js"></script>
    <script type="text/javascript" src="/CoinHoarder/plugins/tradingview/datafeeds/udf/dist/bundle.js"></script>
    <script type="text/javascript" src="/CoinHoarder/plugins/trumbowyg/trumbowyg.min.js"></script>
    <title>MY Hoard</title>
</head>

<body class="home page-template-default page page-id-5 widgets_v2 navstyle-v8 header4   wpb-js-composer js-comp-ver-5.4.5 vc_responsive <?php if($prefNightMode) echo 'night-mood-background'; ?>">
    <?PHP
    include(sideBar);
    ?>
<!-- PAGE #page -->
<div id="page" class="hfeed site">
    <?PHP
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

    <?PHP
    if (isset($_GET['overview'])) {
        if ($_GET['overview']) {
            $page="overview";
            if (isset($_GET['page'])) {
                switch (strtolower($_GET['page'])) {
                    case 'transactions': include(transactions);$page="transactions";break;
                    case 'block': include(block);$page="block";break;
                    default:
                        unset($_GET['page']);include (overview);break;
                }
            } else {
               include (overview);
            }
        } else {
            echo "<div style=\"padding: 50px;\"></div>";
            include(notfound);
        }
    } else if(isset($_GET['cryptolist'])) {
        include(cryptolist);$page="cryptolist";
    }else if(isset($_GET['vote'])) {
        include(vote);$page="vote";
    }else {                 //dashboard
        $page="dashboard";


            ?>
            <div class="vc_row wpb_row vc_row-fluid" id="all-banner">
                    <div class="vc_column-inner ">
                        <div class="dashboard wpb_wrapper panel-default">

                                <div class="player">
                                    <div id="balance" <?php if(!$prefShowBalance) echo 'style="visibility: hidden;"'; ?>    class="player-cover">
                                        <h1 id="price_usd-balance" <?php if(!$prefShowBalance) echo 'style="visibility: hidden;"'; ?> class="title-price">0$</h1>
                                        <p id="price_btc-balance" <?php if(!$prefShowBalance) echo 'style="visibility: hidden;"'; ?> class="title-price">0.0 BTC</p>
                                    </div>
                                    <div class="link-menu">
                                        <h4><a href="/Coinhoarder/myhoard.php?vote" class="text-bold">VOTE <i class="fa fa-angle-double-right"></i></a></h4>
                                        <h4><a href="/Coinhoarder/myhoard.php?cryptolist" class="text-bold">CRYPTOLIST <i class="fa fa-angle-double-right"></i></a></h4>
                                        <h4><a href="/Coinhoarder/?membership" class="text-bold">SUBMIT NEW COIN <i class="fa fa-angle-double-right"></i></a></h4>
                                    </div>
                                    <div class="hidden-xs player-spectrum play-pause-button">
                                        <div class="player-spectrum-bars">
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                            <div class="player-spectrum-bar" data-scale="0.3" style="transform: matrix(1, 0, 0, 0.1, 0, 0);"></div>
                                        </div>
                                        <div class="hidden-xs player-spectrum-floor"></div>
                                    </div>
                                    <div class="hidden-xs hidden-md player-drops"></div>
                                    <img class="hidden-xxs" src="/Coinhoarder/img/element/lower_bubbler2.png">
                                    <img class="hidden-xs-c hidden-sm hidden-md hidden-lg" src="/Coinhoarder/img/element/lower_bubbler3.png">
                                    <div class="hidden-xs gradient-holder"></div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="vc_row wpb_row vc_row-fluid" id="all-hoard">
                <?php
                foreach ($SQLcoins as $row => $coin) {
                    ?>
                    <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4" data-ticker="<?= $coin['ticker'] ?>" data-sparkline="<?= $coin['coinmarketcap'] ?>" >
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="nav navbar-nav navbar-hoard">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle options" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon-options-vertical"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a class="hidden-xs remove-hoard" href="#">Remove</a>
                                                <a class="hidden-sm hidden-md hidden-lg remove-hoard" href="#"><span class="fa fa-trash"></span></a>
                                            </li>
                                        </ul>
                                    </li>
                                </div>
                                <div class="panel panel-default exchange" onclick="location.href='?overview=<?= $coin['ticker'] ?>'">
                                    <div class="panel-body">
                                        <h3>
                                            <?php
                                            if($coin['image']=="cryptocoins")
                                                echo '<i class="cc '.$coin['ticker'].'" ';
                                            else
                                                echo '<img height="25px" width="25px" src="https://s2.coinmarketcap.com/static/img/coins/64x64/'.$coin['coinmarketcap'].'.png" ';
                                            ?>
                                               title="<?= $coin['ticker'] ?>"></i> <?= $coin['name'] ?> - <?= $coin['ticker'] ?>
                                        </h3>
                                        <div class="row">
                                            <div class="col-md-7 col-sm-7 col-xs-7 no-padding" id="<?= $coin['ticker'] ?>-price_btc"> <span
                                                        class="color-gray"><?= $coin['ticker'] ?></span></div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 text-right text-info" id="<?= $coin['ticker'] ?>-price_usd"><?= $prefCurrencyS ?> </div>
                                        </div>
                                        <div class="highchart_currency" id="chart_<?= $coin['name'] ?>"></div>
                                        <hr>
                                    </div>
                                    <div class="all-changes">
                                        <div class="row">
                                            <p class="col-xs-4 change-percent">% 1h<br>
                                                <span class="text-bold" id="<?= $coin['ticker'] ?>-1h">
                                               <i class="fa fa-arrow-up"></i> --
                                            </span>
                                            </p>
                                            <p class="col-xs-4 change-percent">% 24h<br>
                                                <span class="text-bold" id="<?= $coin['ticker'] ?>-24h">
                                                <i class="fa fa-arrow-up"></i> --
                                            </span>
                                            </p>
                                            <p class="col-xs-4 change-percent">% 7d<br>
                                                <span class="text-bold" id="<?= $coin['ticker'] ?>-7d">
                                                <i class="fa fa-arrow-up"></i> --
                                            </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            cryptic_highcharts("<?= $coin['name'] ?>", <?php echo json_encode($markets[$row]) ?>, "<?= $coin['color2'] ?>", "<?= $coin['color3'] ?>");
                            //resize a fine posizionamento di tutti i coin
                        });
                    </script>
                    <?php
                }
                ?>
                <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="new-hoard" class="panel panel-default exchange sweetalert">
                                <div class="new-hoard-widget">
                                    <h1><i class="fa fa-plus"></i> ADD</h1>
                                </div>
                                <div class="panel-body no-padding" style="height: 220px">
                                    <div class="highchart_currency" id="chart_new" style="height: 220px"></div>
                                </div>
                                <div class="all-changes">
                                    <div class="row">
                                        <p class="col-xs-4 change-percent">% 1h<br>
                                            <span class="text-bold"><i
                                                        class="fa fa-arrow-up"></i>----</span>
                                        </p>
                                        <p class="col-xs-4 change-percent">% 24h<br>
                                            <span class="text-bold"><i
                                                        class="fa fa-arrow-up"></i>----</span>
                                        </p>
                                        <p class="col-xs-4 change-percent">% 7d<br>
                                            <span class="text-bold"><i
                                                        class="fa fa-arrow-up"></i>----</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function () {
                                    cryptic_highcharts("new", [60, 62, 70, 78, 62, 79, 81, 92, 92, 95, 95, 120],"#f7f7f7", "#f7f7f7");
                                });
                            </script>
                        </div>
                    </div>
                </div>

            </div>


            <div class="vc_row wpb_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-md-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">

                            <div id="piechart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="vc_row wpb_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-md-12">
                    <!--<div class="vc_column-inner "> -->
                        <div class="wpb_wrapper">
                            <div class="right_col" id="dashboard-v2" role="main">
                                <div class="panel panel-default element-box-shadow">
                                    <div class="panel-body dash-table-markets no-padding">
                                        <table id="data-tables-markets-1" class="table table-cryptic dataTable no-footer" role="grid">
                                            <thead>
                                            <tr role="row">
                                                <th><i class="fa fa-sort"></i></th>
                                                <th>Name <i class="fa fa-sort"></i></th>
                                                <th>Market <i class="fa fa-sort"></i></th>
                                                <th>Price <?= $prefCurrency ?><i class="fa fa-sort"></i></th>
                                                <th>Price BTC<i class="fa fa-sort"></i></th>
                                                <th>Volume <i class="fa fa-sort"></i></th>
                                                <th>Supply <i class="fa fa-sort"></i></th>
                                                <th>Change <i class="fa fa-sort"></i></th>
                                                <th style="white-space: pre;">Sparkline            </th>
                                            </tr>
                                            </thead>
                                            <tbody id="data-tables-markets-1-body">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <!-- </div> -->
                </div>
            </div>



            <div class="vc_row wpb_row vc_row-fluid">
                <div style="display: none">
                    <div class="panel panel-default">
                        <div class="panel-body no-padding">
                            <div id="swal-new-hoard" class="stepper x3">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a class="persistant-disabled" href="#stepper-step-1" data-toggle="tab" aria-controls="stepper-step-1" role="tab" title="" data-original-title="Step 1">
                                            <span class="round-tab">1</span>
                                        </a>
                                        <p class="text-bold">Cryptocurrency</p>
                                    </li>
                                    <li role="presentation" class="disabled">
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
                                            <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">
                                                <h4 class="text-bold padder">Select a coin to add</h4>
                                                <div class="col-md-12 wpcf7-form">
                                                    <select class="coins-exchange" name="coin" id="coin" >
                                                        <?php
                                                        $allcoins = $functions->executeQuery("SELECT * FROM coins");
                                                        foreach ($allcoins as $row => $coin) {
                                                            echo  '<option value="'.$coin['id'].'">'.$coin['name'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" role="tabpanel" id="stepper-step-2" name="addresses">
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
                </div>
                <?php
                }
                ?>
                <script>
                     $(document).ready(function () {
                         setPreference('<?= $prefCurrency ?>','<?=$prefCurrencyS ?>',<?=$BTCtoPrefCurrency ?>,<?php echo json_encode($JSONcoins) ?>,<?php echo $_SESSION['user']['id'] ?>,<?php if(isset($overviewRow)) echo $overviewRow; else echo '""'; ?>);
                         syncFillPage("<?= $page ?>","<?php if(isset($_GET['detail'])){echo $_GET['detail'];} ?>");
                         fillJSONwithXHR("<?= $page ?>")//and then call asyncFillPage
                    });
                </script>
            </div>

                    </div><!-- .entry-content -->
                </main>
            </div>
        </div>
    </div>
</div>
</body>
</html>