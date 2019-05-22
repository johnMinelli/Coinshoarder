<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 24/08/2018
 * Time: 18:16
 */

    if (isset($_GET['detail'])) {
        ?>
        <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-md-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">

                        <div class="panel panel-default first-panel">
                            <div class="heading-cryptic panel-heading">
                                <ul class="breadcrumb-cryptic">
                                    <li>
                                        <a href="/coinhoarder/myhoard.php?overview=<?= $_GET['overview'] ?>&page=Transactions"><?= $_GET['detail'] ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body padding_30">
                                <div id="tx-address-in" class="vc_col-xs-10 vc_col-md-5">
                                    <div class="panel-content">
                                        <a></a>
                                    </div>
                                </div>
                                <div class="vc_col-xs-2 vc_col-md-1">
                                    <i class="fa fa-long-arrow-right" style="font-size: 28px;"></i></div>
                                <div id="tx-address-out" class="vc_col-xs-12 vc_col-md-6">
                                    <div class="panel-content">
                                        <a></a>
                                        <p class="text-bold"></p>
                                    </div>
                                    <div class="panel-content">
                                        <a></a>
                                        <p class="text-bold"></p>
                                    </div>
                                    <div id="tx-labels" class="panel-label">
                                        <span class="label label-info"></span>
                                        <span class="label label-success"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-md-6">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">

                        <div class="second-panel panel panel-default search-page">
                            <div class="panel-heading"><span class="icon-book-open" style="padding: 0 15px 0 5px;"></span>Summary</div>
                            <div class="panel-body">
                                <table class="table table-striped table-hover no-margin">
                                    <tbody>
                                    <tr>
                                        <td>Block</td>
                                        <td id="tx-block"></td>
                                    </tr>
                                    <tr>
                                        <td>Confirmations</td>
                                        <td id="tx-conf"></td>
                                    </tr>
                                    <tr>
                                        <td>Received Time</td>
                                        <td id="tx-time"></td>
                                    </tr>
                                    <tr>
                                        <td>Fees</td>
                                        <td id="tx-fee"></td>
                                    </tr>
                                    <tr>
                                        <td>Total input</td>
                                        <td id="tx-tot-in"></td>
                                    </tr>
                                    <tr>
                                        <td>Total output</td>
                                        <td id="tx-tot-out"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="wpb_column vc_column_container vc_col-md-6">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">

                        <div class="second-panel     panel panel-default search-page">
                            <div class="panel-heading"><span class="icon-link" style="
padding: 0 15px 0 5px;
"></span>Blockchain</div>
                            <div class="panel-body">
                                <table class="table table-striped table-hover no-margin">
                                    <tbody id="tx-blockchain">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
    }else {                 //all transactions
        ?>


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
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body padding_table">
                                <table class="table table-striped no-margin">
                                    <tbody id="data-tables-transaction">
                                        <tr id="latest-txs">
                                            <th>Transaction Hash</th>
                                            <th>Time</th>
                                            <?php if($overview['blockexplorer'] != 0) echo "<th>Address</th>"; ?>
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
<?php
    }
    ?>