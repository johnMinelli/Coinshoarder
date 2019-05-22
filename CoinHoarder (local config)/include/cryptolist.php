<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 12/03/2018
 * Time: 18:47
 */

?>

<!-- PAGE CONTENT -->
<script src="/coinhoarder/plugins/jquery/jquery.mixitup.min.js"></script>
<script src="/coinhoarder/plugins/isotope/main.js"></script>
<!---------------------------------------------------------------------------------------->
<div class="spacer_50 hidden-xs hidden-sm-c"></div>
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-md-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <main class="cd-main-content cd-main-content-4-colums">
                    <div class="cd-tab-filter-wrapper element-box-shadow">
                        <div class="row">
                            <div class="vc_col-md-3">
                                <div class="cd-filter-4-colums">
                                    <form>
                                        <div class="cd-filter-block">
                                            <div class="cd-filter-content">
                                                <input class="text-bold" type="search" placeholder="Search...">
                                                <span class="fa fa-times" aria-hidden="true"></span>
                                            </div> <!-- cd-filter-content -->
                                        </div> <!-- cd-filter-block -->
                                    </form>
                                </div>
                            </div>
                            <div class="vc_col-md-9">
                                <div class="cd-tab-filter">
                                        <ul class="cd-filters">
                                        <li class="filter"><a class="selected" href="#0" data-type="all">Show all</a></li>
                                        <li class="filter" data-filter=".pow"><a href="#0" data-type="pow">POW</a></li>
                                        <li class="filter" data-filter=".pos"><a href="#0" data-type="pos">POS</a></li>
                                        <li class="filter" data-filter=".mn"><a href="#0" data-type="mn">Masternode</a></li>
                                    </ul> <!-- cd-filters -->
                                </div> <!-- cd-tab-filter -->
                            </div>
                        </div>
                    </div><!-- cd-tab-filter-wrapper -->
                    <section class="cd-gallery cd-gallery-4-colums">
                        <ul>
                            <?php
                            $coins = $functions->executeQuery("SELECT coins.* ,count(hoard.id) as hoard FROM coins LEFT JOIN hoard ON coins.id = hoard.idCoin group by coins.id");
                            foreach ($coins as $row => $coin) {
                            ?>
                            <li class="mix <?= $coin['name'] ?> <?= $coin['ticker'] ?> <?php
                            if($coin['pow']){ echo "pow "; }
                            if($coin['pos']){ echo "pos "; }
                            if($coin['mn']){ echo "mn "; }
                            if($coin['status'] == 2){ echo "new"; }
                            ?>"> <!--data-category=""-->
                                <div class="panel panel-default ico-listing-box padding_30">
                                    <div class="panel-heading ico-listing-title no-padding">
                                        <div class="text-center ico-listing-img">
                                            <a class="show-code" href="?overview=<?= $coin['ticker'] ?>"><i class="cc <?= $coin['ticker'] ?> no-margin" title="<?= $coin['ticker'] ?>"></i></a>
                                        </div>
                                        <div class="ico-listing-name">
                                            <h3 class="no-margin"><a class="text-bold" href="?overview=<?= $coin['ticker'] ?>"><?= $coin['name'] ?></a></h3>
                                            <span class="ico-listing-second-name"><?= $coin['ticker'] ?></span>
                                        </div>
                                    </div>
                                    <div class="panel-body ico-listing-details no-padding">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-4 col-sx-4 no-padding">
                                                <span class="text-bold <?php if($coin['pow']){ echo "text-green"; } ?>">POW</span>
                                            </div>
                                            <div class="col-md-4 col-xs-4 col-sx-4 no-padding">
                                                <span class="text-bold <?php if($coin['pos']){ echo "text-green"; } ?>">POS</span>
                                            </div>
                                            <div class="col-md-4 col-xs-4 col-sx-4 no-padding">
                                                <span class="text-bold <?php if($coin['mn']){ echo "text-green"; } ?>">MN</span>
                                            </div>
                                        </div>
                                        <div class="row ico-listing-second-details">
                                            <p class="ico-listing-second-name"><?= $coin['hoard'] ?> hoard active now</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="cd-fail-message">No results found</div>
                    </section><!-- grid -->
                </main>


            </div>
        </div>
    </div>
</div>