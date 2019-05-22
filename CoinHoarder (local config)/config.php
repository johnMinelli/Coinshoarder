<?php
/**
 * Created by PhpStorm.
 * User: Gio
 * Date: 04/01/2018
 * Time: 01:02
 */


//tells browsers not to store cookie to permanent storage. Therefore, when browser is terminated, session ID cookie is deleted immediately
ini_set('session.cookie_lifetime', 0);
// use cookies to store session IDs
ini_set('session.use_cookies', 1);
// use cookies only (do not send session IDs in URLs)
ini_set('session.use_only_cookies', 1);
// do not send session IDs in URLs
ini_set('session.use_trans_sid', 0);
//mandatory
ini_set('session.use_strict_mode', 1);
//accept cookie only from https
ini_set('session.cookie_secure', 0);
session_name("CHSESSIONID");
session_start();
// remove exposure of PHP version (at least where possible)
header_remove('X-Powered-By');
// prevent clickjacking
header('X-Frame-Options: sameorigin');
// prevent content sniffing (MIME sniffing)
header('X-Content-Type-Options: nosniff');
// disable caching of potentially sensitive data
/*header('Expires: Thu, 19 Nov 1981 00:00:00 GMT', true);*/


require_once 'class/functions.php';

define('conString', 'mysql:host=localhost;dbname=hoarder');
define('dbUser', 'root');
define('dbPass', '');
define('content','CoinsHoarder v0.0');
define('bot', '777116079:AAEyFU3b3XW1Hmq9emmQblvzU2ZMUlNq8R0');
define('walletadminpw', 'allowc0mm4ndonly(22)ADMIN');

//template files
define('linkrel', 'include/linkrel.htm');
define('homeBar', 'include/homeBar.php');
define('hoardBar', 'include/hoardBar.php');
define('sideBar', 'include/sideBar.php');
define('slider', 'include/slider.htm');
define('footer', 'include/footer.htm');
define('overview', 'include/overview.php');
define('transactions', 'include/transactions.php');
define('block', 'include/block.php');
define('account', 'include/account.php');
define('cryptolist', 'include/cryptolist.php');
define('vote', 'include/vote.php');
define('notfound', 'include/notfound.htm');
define('contacts', 'include/contacts.php');
define('development', 'include/development.php');
define('membership', 'include/membership.php');
define('faq', 'include/faq.php');
define('terms', 'include/terms.htm');
define('privacy', 'include/privacy.htm');
define('example', 'include/example.htm');
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 0);
//error_reporting(E_ALL);




$functions = new Functions();
$functions->dbConnect(conString, dbUser, dbPass);









?>

