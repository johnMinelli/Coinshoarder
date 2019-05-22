<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 24/08/2018
 * Time: 18:16
 */
?>

<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">
                <!--    COIN INFO    -->
                <div class="panel panel-cryptic element-box-shadow">
                    <div class="panel-heading">
                        <h3 class="text-bold no-margin">
                            <span class="icon-info"></span> Details for Block #<span id="block-height"></span></h3>
                    </div>
                    <div class="panel-body height" style="padding-bottom: 10px;">
                        <p id="block-hash" class="overflow"><span class="text-bold">Hash: </span></p>
                        <p id="block-ntx"><span class="text-bold">Transactions: </span></p>
                        <p id="block-val"><span class="text-bold">Value: </span></p>
                        <p id="block-gen"><span class="text-bold">Created: </span></p>
                        <p id="block-conf"><span class="text-bold">Confirmations: </span></p>
                        <p id="block-diff"><span class="text-bold">Difficulty: </span></p>
                        <p id="block-bits"><span class="text-bold">Bits: </span></p>
                        <p id="block-other"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="vc_row wpb_row vc_row-fluid">
    <div class="wpb_column vc_column_container vc_col-md-12">
        <div class="vc_column-inner ">
            <div class="wpb_wrapper">

                <!--    TRANSACTIONS    -->
                <div class="panel panel-default table-block-transactions">
                    <div class="panel-heading">
                        <ul class="breadcrumb-cryptic">
                            <li>
                                <a href="/coinhoarder/myhoard.php?overview=<?= $_GET['overview'] ?>&page=Transactions">Transactions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding_table">
                        <table class="table table-striped no-margin">
                            <tbody id="block-list-transaction">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>