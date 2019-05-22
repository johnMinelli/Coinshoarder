-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 13, 2019 alle 09:39
-- Versione del server: 10.1.36-MariaDB
-- Versione PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoarder`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `idHoard` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(200) NOT NULL,
  `quantity` float NOT NULL,
  `service` varchar(5) NOT NULL DEFAULT 'hold'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `addresses`
--

INSERT INTO `addresses` (`id`, `idHoard`, `name`, `address`, `quantity`, `service`) VALUES
(4, 31, 'Address', 'ST3rXkgQoGXTEc72bEtYNW7rAD7WBaJ4PH', 0, 'hold'),
(12, 34, 'Address', 'Sj6v3F9bZYmyQwz2i9cXQ64UvJrB9jw1sy', 0, 'hold');

-- --------------------------------------------------------

--
-- Struttura della tabella `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ticker` varchar(50) NOT NULL,
  `coinmarketcap` varchar(50) NOT NULL,
  `cryptocompare` varchar(50) NOT NULL,
  `blockexplorer` int(11) NOT NULL,
  `pow` tinyint(1) NOT NULL,
  `pos` tinyint(1) NOT NULL,
  `mn` tinyint(1) NOT NULL,
  `stakeAmount` float DEFAULT NULL,
  `mnAmount` float DEFAULT NULL,
  `collateral` float DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `color2` varchar(50) NOT NULL,
  `color3` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 non listato, 1 listato, 2 nuovo listato',
  `image` varchar(50) DEFAULT NULL,
  `privateAddress` varchar(500) NOT NULL,
  `privateBTCAddress` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `coins`
--

INSERT INTO `coins` (`id`, `name`, `ticker`, `coinmarketcap`, `cryptocompare`, `blockexplorer`, `pow`, `pos`, `mn`, `stakeAmount`, `mnAmount`, `collateral`, `color`, `color2`, `color3`, `status`, `image`, `privateAddress`, `privateBTCAddress`) VALUES
(104, 'Bitcoin', 'BTC', '1', '1182', 1, 1, 0, 0, NULL, NULL, NULL, '#F7931A', '#F3CCA3', '#FEFAF6', 0, 'cryptocoins', '', ''),
(105, 'Ethereum', 'ETH', '1027', '7605', 4, 0, 0, 0, NULL, NULL, NULL, '#282828', '#282828', '#dbdbdb', 0, 'cryptocoins', '', '1A3XxcHfk7AdHLj777qxuXYFCtdoxu9oWf'),
(106, 'XRP', 'XRP', '52', '5031', 0, 0, 0, 0, NULL, NULL, NULL, '#346AA9', '#346AA9', '#f3f7fb', 0, 'cryptocoins', '', ''),
(107, 'Bitcoin Cash', 'BCH', '1831', '202330', 1, 0, 0, 0, NULL, NULL, NULL, '#F7931A', '', '', 0, 'cryptocoins', '', ''),
(108, 'EOS', 'EOS', '1765', '166503', 0, 0, 0, 0, NULL, NULL, NULL, '#19191A', '', '', 0, 'cryptocoins', '', ''),
(109, 'Litecoin', 'LTC', '2', '3808', 0, 0, 0, 0, NULL, NULL, NULL, '#838383', '#838383', '#dddddd', 0, 'cryptocoins', '', ''),
(110, 'Cardano', 'ADA', '2010', '321992', 0, 0, 0, 0, NULL, NULL, NULL, '#3CC8C8', '', '', 0, 'cryptocoins', '', ''),
(111, 'Stellar', 'XLM', '512', '4614', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(112, 'IOTA', 'MIOTA', '1720', '', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(113, 'NEO', 'NEO', '1376', '27368', 0, 1, 1, 0, NULL, NULL, NULL, '#58BF00', '#58BF00', '#f6ffef', 0, 'cryptocoins', '', ''),
(114, 'TRON', 'TRX', '1958', '310829', 0, 0, 0, 0, NULL, NULL, NULL, '#c62734;', '', '', 0, 'cryptocoins', '', ''),
(115, 'Monero', 'XMR', '328', '5038', 0, 0, 0, 0, NULL, NULL, NULL, '#FF6600', '', '', 0, 'cryptocoins', '', ''),
(116, 'Dash', 'DASH', '131', '3807', 0, 0, 0, 1, NULL, NULL, NULL, '#1c75bc', '#1c75bc', '#f6fafd', 2, 'cryptocoins', 'Xhus4Yv5kAyj2JwwL1EZmmSHfoRKR2yRCD', '1M6vZnjJqzRB6rMSW5dDYyCQ3yZXYnrHUK'),
(117, 'NEM', 'XEM', '873', '5285', 0, 0, 0, 0, NULL, NULL, NULL, '#41bf76', '', '', 0, 'cryptocoins', '', ''),
(118, 'Tether', 'USDT', '825', '171986', 0, 0, 0, 0, NULL, NULL, NULL, '#2CA07A', '', '', 0, 'cryptocoins', '', ''),
(119, 'Vechain [Token]', 'VEN', '1904', '', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(120, 'Ethereum Classic', 'ETC', '1321', '5324', 0, 0, 0, 0, NULL, NULL, NULL, '#669073', '', '', 0, 'cryptocoins', '', ''),
(121, 'Qtum', 'QTUM', '1684', '112392', 0, 0, 0, 0, NULL, NULL, NULL, '#359BCE', '', '', 0, 'cryptocoins', '', ''),
(122, 'OmiseGO', 'OMG', '1808', '187440', 0, 0, 0, 0, NULL, NULL, NULL, '#1A53F0', '', '', 0, 'cryptocoins', '', ''),
(123, 'Binance Coin', 'BNB', '1839', '204788', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(124, 'ICON', 'ICX', '2099', '324068', 0, 0, 0, 0, NULL, NULL, NULL, '#22C8CC', '', '', 0, 'cryptocoins', '', ''),
(125, 'Bitcoin Gold', 'BTG', '2083', '347235', 0, 0, 0, 0, NULL, NULL, NULL, '#eba809', '', '', 0, 'cryptocoins', '', ''),
(126, 'Lisk', 'LSK', '1214', '19745', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(127, 'Zcash', 'ZEC', '1437', '24854', 1, 0, 0, 0, NULL, NULL, NULL, '#e5a93d', '', '', 0, 'cryptocoins', '', ''),
(128, 'Bitcoin Private', 'BTCP', '2575', '770095', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(129, 'Nano', 'NANO', '1567', '172091', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(130, 'Bytom', 'BTM', '1866', '4403', 0, 0, 0, 0, NULL, NULL, NULL, '#9FA8B4', '', '', 0, 'cryptocoins', '', ''),
(131, 'Bytecoin', 'BCN', '372', '5280', 0, 0, 0, 0, NULL, NULL, NULL, '#964F51', '', '', 0, 'cryptocoins', '', ''),
(132, 'Steem', 'STEEM', '1230', '20333', 0, 0, 0, 0, NULL, NULL, NULL, '#1A5099', '', '', 0, 'cryptocoins', '', ''),
(133, 'Verge', 'XVG', '693', '4433', 0, 0, 0, 0, NULL, NULL, NULL, '#42AFB2', '', '', 0, 'cryptocoins', '', ''),
(134, 'Populous', 'PPT', '1789', '179896', 0, 0, 0, 0, NULL, NULL, NULL, '#5a9ef6', '', '', 0, 'cryptocoins', '', ''),
(135, 'Wanchain', 'WAN', '2606', '240142', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(136, 'Siacoin', 'SC', '1042', '13072', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(137, 'BitShares', 'BTS', '463', '5039', 0, 0, 0, 0, NULL, NULL, NULL, '#03A9E0', '', '', 0, 'cryptocoins', '', ''),
(138, 'Bitcoin Diamond', 'BCD', '2222', '409492', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(139, 'Zilliqa', 'ZIL', '2469', '716725', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(140, 'Dogecoin', 'DOGE', '74', '4432', 0, 0, 0, 0, NULL, NULL, NULL, '#BA9F33', '', '', 0, 'cryptocoins', '', ''),
(141, 'Stratis', 'STRAT', '1343', '24294', 0, 0, 0, 0, NULL, NULL, NULL, '#2398dd', '', '', 0, 'cryptocoins', 'SgPdtSSCCrpxRiDNLfZfpKN5RPCXozC9H8', '1M6vZnjJqzRB6rMSW5dDYyCQ3yZXYnrHUK'),
(142, 'Maker', 'MKR', '1518', '41192', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(143, 'Decred', 'DCR', '1168', '16713', 0, 0, 0, 0, NULL, NULL, NULL, '#3b7cfb', '', '', 0, 'cryptocoins', '', ''),
(144, 'DigixDAO', 'DGD', '1229', '18907', 0, 0, 0, 0, NULL, NULL, NULL, '#D8A24A', '', '', 0, 'cryptocoins', '', ''),
(145, '0x', 'ZRX', '1896', '186277', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(146, 'Aeternity', 'AE', '1700', '190978', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(147, 'Waves', 'WAVES', '1274', '20131', 0, 0, 0, 0, NULL, NULL, NULL, '#24aad6', '', '', 0, 'cryptocoins', '', ''),
(148, 'Ontology', 'ONT', '2566', '808414', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(149, 'Aion', 'AION', '2062', '431235', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(150, 'Status', 'SNT', '1759', '137013', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(151, 'RChain', 'RHOC', '2021', '434666', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(152, 'Golem', 'GNT', '1455', '33022', 0, 0, 0, 0, NULL, NULL, NULL, '#00d6e3', '', '', 0, 'cryptocoins', '', ''),
(153, 'Augur', 'REP', '1104', '17778', 0, 0, 0, 0, NULL, NULL, NULL, '#40a2cb', '', '', 0, 'cryptocoins', '', ''),
(154, 'Loopring', 'LRC', '1934', '318169', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(155, 'Mixin', 'XIN', '2349', '372654', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(156, 'Waltonchain', 'WTC', '1925', '299397', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(157, 'Basic Attention Token', 'BAT', '1697', '107672', 0, 0, 0, 0, NULL, NULL, NULL, '#9e1f63', '', '', 0, 'cryptocoins', '', ''),
(158, 'Ardor', 'ARDR', '1320', '30173', 0, 0, 0, 0, NULL, NULL, NULL, '#1162a1', '', '', 0, 'cryptocoins', '', ''),
(159, 'Hshare', 'HSR', '1903', '318199', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(160, 'IOST', 'IOST', '2405', '716522', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(161, 'Komodo', 'KMD', '1521', '26132', 0, 0, 0, 0, NULL, NULL, NULL, '#326464', '', '', 0, 'cryptocoins', '', ''),
(162, 'DigiByte', 'DGB', '109', '4430', 0, 0, 0, 0, NULL, NULL, NULL, '#0066cc', '', '', 0, 'cryptocoins', '', ''),
(163, 'KuCoin Shares', 'KCS', '2087', '348628', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(164, 'Ark', 'ARK', '1586', '32699', 0, 0, 0, 0, NULL, NULL, NULL, '#F70000', '', '', 0, 'cryptocoins', '', ''),
(165, 'Centrality', 'CENNZ', '2585', '', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(166, 'PIVX', 'PIVX', '1169', '42433', 0, 0, 1, 1, 2, NULL, 10000, '#3b2f4d', '', '', 1, 'cryptocoins', 'DNbeG6pJ1WHUmjdMztsax8tCSiRiyFzgWY', '1QLDrjpxEWbxjcYd3gaa8Nv3K92qEpepcQ'),
(167, 'Dragonchain', 'DRGN', '2243', '355702', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(168, 'Cryptonex', 'CNX', '2027', '289715', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(169, 'Dentacoin', 'DCN', '1876', '218906', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(170, 'Mithril', 'MITH', '2608', '847172', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(171, 'Syscoin', 'SYS', '541', '4618', 0, 0, 0, 0, NULL, NULL, NULL, '#0098DA', '', '', 0, 'cryptocoins', '', ''),
(172, 'Storm', 'STORM', '2297', '186875', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(173, 'QASH', 'QASH', '2213', '402714', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(174, 'Substratum', 'SUB', '1984', '221463', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(175, 'aelf', 'ELF', '2299', '571314', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(176, 'Gas', 'GAS', '1785', '213532', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(177, 'Ethos', 'ETHOS', '1817', '', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(178, 'Factom', 'FCT', '1087', '13280', 0, 0, 0, 0, NULL, NULL, NULL, '#2175BB', '', '', 0, 'cryptocoins', '', ''),
(179, 'Kyber Network', 'KNC', '1982', '310497', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(180, 'MonaCoin', 'MONA', '213', '5296', 0, 0, 0, 0, NULL, NULL, NULL, '#a99364', '', '', 0, 'cryptocoins', '', ''),
(181, 'Veritaseum', 'VERI', '1710', '136211', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(182, 'Cortex', 'CTXC', '2638', '856139', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(183, 'Pundi X', 'NPXS', '2603', '731516', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(184, 'Nebulas', 'NAS', '1908', '619555', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(185, 'Bancor', 'BNT', '1727', '22327', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(186, 'FunFair', 'FUN', '1757', '178978', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(187, 'ReddCoin', 'RDD', '118', '4592', 0, 0, 0, 0, NULL, NULL, NULL, '#ED1C24', '', '', 0, 'cryptocoins', '', ''),
(188, 'SALT', 'SALT', '1996', '314580', 0, 0, 0, 0, NULL, NULL, NULL, '#373C43', '', '', 0, 'cryptocoins', '', ''),
(189, 'GXChain', 'GXS', '1750', '659770', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(190, 'Elastos', 'ELA', '2492', '744987', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(191, 'Nxt', 'NXT', '66', '1183', 0, 0, 0, 0, NULL, NULL, NULL, '#008FBB', '', '', 0, 'cryptocoins', '', ''),
(192, 'Kin', 'KIN', '1993', '177918', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(193, 'ZCoin', 'XZC', '1414', '30022', 0, 0, 0, 0, NULL, NULL, NULL, '#23B852', '', '', 0, 'cryptocoins', '', ''),
(194, 'WAX', 'WAX', '2300', '338541', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(195, 'Power Ledger', 'POWR', '2132', '339617', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(196, 'MCO', 'MCO', '1776', '166548', 0, 0, 0, 0, NULL, NULL, NULL, '#0D3459', '', '', 0, 'cryptocoins', '', ''),
(197, 'Revain', 'R', '2135', '345420', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(198, 'Enigma', 'ENG', '2044', '338335', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(199, 'Byteball Bytes', 'GBYTE', '1492', '30736', 0, 0, 0, 0, NULL, NULL, NULL, '#2C3E50', '', '', 0, 'cryptocoins', '', ''),
(200, 'Electroneum', 'ETN', '2137', '361881', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(201, 'Nucleus Vision', 'NCASH', '2544', '792548', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(202, 'MaidSafeCoin', 'MAID', '291', '5293', 0, 0, 0, 0, NULL, NULL, NULL, '#5492D6', '', '', 0, 'cryptocoins', '', ''),
(203, 'Neblio', 'NEBL', '1955', '222085', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(208, 'ChainLink', 'LINK', '1975', '309621', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(225, 'SmartCash', 'SMART', '1828', '199901', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(228, 'Emercoin', 'EMC', '558', '15876', 0, 0, 0, 0, NULL, NULL, NULL, '#674c8c', '', '', 0, 'cryptocoins', '', ''),
(229, 'Skycoin', 'SKY', '1619', '136269', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(230, 'Particl', 'PART', '1826', '191116', 0, 0, 0, 0, NULL, NULL, NULL, '#05D5A3', '', '', 0, 'cryptocoins', '', ''),
(231, 'TokenPay', 'TPAY', '2627', '', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(232, 'Horizen', 'ZEN', '1698', '116180', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(233, 'Bitcore', 'BTX', '1654', '198983', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(234, 'Nexus', 'NXS', '789', '6103', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(235, 'Achain', 'ACT', '1918', '177157', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(236, 'POA Network', 'POA', '2548', '793845', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(237, 'GameCredits', 'GAME', '576', '20157', 0, 0, 0, 0, NULL, NULL, NULL, '#ed1b24', '', '', 0, 'cryptocoins', '', ''),
(238, 'Vertcoin', 'VTC', '99', '5018', 0, 0, 0, 0, NULL, NULL, NULL, '#1b5c2e', '', '', 0, 'cryptocoins', '', ''),
(239, 'Ubiq', 'UBQ', '588', '43044', 0, 0, 0, 0, NULL, NULL, NULL, '#00ec8d', '', '', 0, 'cryptocoins', '', ''),
(240, 'Groestlcoin', 'GRS', '258', '13070', 0, 0, 0, 0, NULL, NULL, NULL, '#648FA0', '', '', 0, 'cryptocoins', '', ''),
(241, 'DigitalNote', 'XDN', '405', '5282', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(242, 'Litecoin Cash', 'LCC', '2540', '783320', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(243, 'Blocknet', 'BLOCK', '707', '5305', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(244, 'BOScoin', 'BOS', '2095', '116384', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(245, 'NavCoin', 'NAV', '377', '4571', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(246, 'BitcoinDark', 'BTCD', '467', '4400', 0, 0, 0, 0, NULL, NULL, NULL, '#2A72DC', '', '', 0, 'cryptocoins', '', ''),
(247, 'Einsteinium', 'EMC2', '201', '4440', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(248, 'MinexCoin', 'MNX', '2139', '389849', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(249, 'CloakCoin', 'CLOAK', '362', '4417', 0, 0, 0, 0, NULL, NULL, NULL, '#DF3F1E', '', '', 0, 'cryptocoins', '', ''),
(250, 'BitBay', 'BAY', '723', '5300', 0, 0, 0, 0, NULL, NULL, NULL, '#584ba1', '', '', 0, 'cryptocoins', '', ''),
(251, 'SaluS', 'SLS', '1159', '20681', 0, 0, 0, 0, NULL, NULL, NULL, '#1EB549', '', '', 0, 'cryptocoins', '', ''),
(252, 'ION', 'ION', '1281', '20591', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(253, 'Peercoin', 'PPC', '5', '2349', 0, 0, 0, 0, NULL, NULL, NULL, '#3FA30C', '', '', 0, 'cryptocoins', '', ''),
(254, 'Viacoin', 'VIA', '470', '5015', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, 'cryptocoins', '', ''),
(305, 'Pura', 'PURA', '870', '374031', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(356, 'Counterparty', 'XCP', '132', '5292', 0, 0, 0, 0, NULL, NULL, NULL, '#EC1550', '', '', 0, 'cryptocoins', '', ''),
(407, 'Electra', 'ECA', '1711', '409249', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(458, 'Feathercoin', 'FTC', '8', '4524', 0, 0, 0, 0, NULL, NULL, NULL, '#679EF1', '', '', 0, 'cryptocoins', '', ''),
(509, 'Asch', 'XAS', '1609', '218107', 0, 0, 0, 0, NULL, NULL, NULL, '', '', '', 0, NULL, '', ''),
(510, 'Helium', 'HLM', '3467', '925805', 2, 0, 1, 1, 2.5, 2.5, 1000, '#13c0f2', '', '', 1, NULL, 'SfoUpjLhJhtxx2SMcZmFR6AEopfvgvNTJQ', '1HbaJQF7LTkLiiJppuNm81MUqwT9HjQumK'),
(511, 'SocialSend', 'SEND', '2255', '449573', 3, 0, 1, 1, 6.25, 18.75, 12500, '#008DCF', '', '', 0, 'coinmarketcap', 'Sf5AjK5SMQEwB4bE5K3jozELaeap3Fw5CK', '12pk2eZqyipQDx2J3p2mKWusxET9QQHPGy'),
(512, 'Verticalcoin', 'VTL', '', '928093', 4, 1, 0, 1, NULL, 8, 3750, '#173c5f', '#82C88B', '', 2, 'cryptocompare', 'VSD8oRcLajveZ8FhrtqMFCByv2Q4EZVNc7', '1A3XxcHfk7AdHLj777qxuXYFCtdoxu9oWf'),
(513, '8BIT', '8BIT', '890', '5327', 5, 0, 1, 1, 1.2, 1.2, 112, '#000000', '', '', 0, 'coinmarketcap', '', '1HxSWVqG47mGjJex8nKvVnxow3Qifys5WD');

-- --------------------------------------------------------

--
-- Struttura della tabella `coin_feeds`
--

CREATE TABLE `coin_feeds` (
  `idCoin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `value` float NOT NULL,
  `feed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `coin_feeds`
--

INSERT INTO `coin_feeds` (`idCoin`, `idUser`, `value`, `feed`) VALUES
(141, 47, 0, 0),
(166, 47, 0, 0),
(166, 47, 4, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `hoard`
--

CREATE TABLE `hoard` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCoin` int(11) NOT NULL,
  `pow` tinyint(1) NOT NULL,
  `pos` tinyint(1) NOT NULL,
  `mn` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `hoard`
--

INSERT INTO `hoard` (`id`, `idUser`, `idCoin`, `pow`, `pos`, `mn`) VALUES
(21, 47, 141, 0, 0, 0),
(22, 47, 106, 0, 0, 0),
(29, 47, 105, 0, 0, 0),
(31, 47, 511, 0, 0, 0),
(34, 47, 510, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `priority` int(11) NOT NULL COMMENT '0=normal, 1=success, 2=danger'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

CREATE TABLE `roles` (
  `id` int(9) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`) VALUES
(1, 'amazonluglio@gmail.com'),
(3, 'lolasdxd.97@gmail.com');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telegram` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_fb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_tw` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_in` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_li` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wrong_logins` int(9) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` int(9) NOT NULL DEFAULT '1',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirm_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` date NOT NULL,
  `vote` float NOT NULL,
  `pref_show_balance` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=hidden, 1=visible',
  `pref_currency` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD' COMMENT 'USD, EUR, BTC',
  `pref_night_mode` tinyint(1) DEFAULT '0' COMMENT '0=light, 1=night'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `phone`, `street`, `city`, `state`, `zip`, `telegram`, `social_fb`, `social_tw`, `social_in`, `social_li`, `wrong_logins`, `password`, `user_role`, `confirmed`, `confirm_code`, `remember_code`, `last_login`, `vote`, `pref_show_balance`, `pref_currency`, `pref_night_mode`) VALUES
(1, 'ref', 'ref', 'ref@ref.it', NULL, NULL, NULL, NULL, NULL, 'a', NULL, NULL, NULL, NULL, 0, '', 1, 0, NULL, NULL, '0000-00-00', 0, 0, '0', 0),
(46, 'giovanni', 'rossi', 'rossi@g.it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'a', 1, 0, NULL, NULL, '0000-00-00', 0, 0, '0', 0),
(47, 'Giovanni Minelli', 'Minelli', 'giovanni.minelli3@gmail.com', NULL, 'via cale 4', 'Bologna', 'Bo', '40012', '379389847', NULL, 'a', '', '', 0, '$2y$10$GgC64UjFu32NR9bOC7Vqie0hclfUBNmXe1dVKSPsnqT80smZjwAEe', 1, 1, '0', '0', '2019-04-20', 0, 1, 'EUR', 0),
(48, 'Giovanni', 'Minelli', 'giovanni.mimelli@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$e25w7uwflbLuR4ckD3mBfO8cDXp301WIXKVj/cB1assZVmg7obukC', 1, 0, '4e05de3cba6dd5ca9c334b6be3f4aeec432a8d80', NULL, '0000-00-00', 0, 0, '0', 0),
(49, 'a', 'aa', 'a@a.it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$9BRRJgcRD0ZcFWXtCugYT.wPZNOCF9dDS9ZOui14.ntiCyD5BtsAO', 1, 0, 'd782594906ff50970e0b487ca125fb934cc94a1e', NULL, '0000-00-00', 0, 0, '0', 0),
(50, 'Giovanni anagrafica Minelli', 'Minelli', 'giovanni.minelli@yahoo.it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$.P3qaFRRr18xRjYgl6uOmOM5jT9yaq0I06eDL8YTYBBuieiJ0p8Yu', 1, 1, '0', '0', '2018-12-02', 0, 0, '0', 0),
(51, 'Giovanni anagrafica Minelli', 'Minelli', 'giovanni.minelli2@studio.unibo.it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$mZ0vSeKn36udggc6OpCQZu3Jr7QkpU2JFUS8GSEzyuX99pH.ogZkW', 1, 0, '29f0dbf1e216e6e3b41b3cde23c1cc6d80a6ba86', NULL, '0000-00-00', 0, 0, '0', 0),
(52, 'Giacomo', 'Asperti', 'Scantinatum3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$8/rsjQtvFFykkvw0Qmr7I.ryyrHdO6kBh7H7vJHh1oHMPIVSBX8oK', 1, 1, '0', '0', '2019-04-21', 0, 1, 'USD', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('9c1cfe46a8c8daa6f81a121bb1764b8a271f8fdb', 3.0125, 1555862162, 1555869362),
('84a01bb7f35871c8ebb3dd3ed8ab7dedb1502a5c', 4, 1525120492, 1525127692),
('f5e5c722b2ccadedfcfe40a46329c69de40052d4', 4, 1525603585, 1525610785),
('e225e9b2597e549cdf74a4f16fef8f2b8501dc83', 1.00007, 1543677809, 1544109809),
('f992321da8a66d235c827f0107eb803d7b499df7', 4, 1541263437, 1541695437),
('e3dd88070487178fd32306c569f57615ad847de6', 0.0145777, 1551698126, 1552130126),
('6cde7bbbe7a3c2c9588f7c6542bd6e8718424aff', 0.00004, 1551698163, 1552130163),
('a5dfa9c0423fa3a6dab9171de3bade48cd6a0d3b', 0.000129444, 1551698215, 1552130215),
('55a912a3b5b0b3d5c20054526cbbe4b2078087be', 4, 1551698403, 1552130403);

-- --------------------------------------------------------

--
-- Struttura della tabella `vote`
--

CREATE TABLE `vote` (
  `idUser` int(11) NOT NULL,
  `idRound` int(11) NOT NULL,
  `idCoin` int(11) NOT NULL,
  `root` varchar(50) NOT NULL,
  `leaf` varchar(50) NOT NULL,
  `weight` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `vote`
--

INSERT INTO `vote` (`idUser`, `idRound`, `idCoin`, `root`, `leaf`, `weight`) VALUES
(46, 1, 116, '31518148', '1234', 0.5),
(47, 1, 141, '', '41757773', 0.5),
(47, 2, 510, '02749234', '72911641', 0.5),
(48, 1, 141, '31518148', '11111', 0.5),
(49, 1, 116, 'aaaa', '31518148', 0.5),
(50, 1, 116, '41757773', '8170513', 0.5),
(52, 2, 511, '', '02749234', 0.5);

-- --------------------------------------------------------

--
-- Struttura della tabella `vote_round`
--

CREATE TABLE `vote_round` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `coin1` int(11) NOT NULL,
  `coin2` int(11) NOT NULL,
  `coin3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `vote_round`
--

INSERT INTO `vote_round` (`id`, `date`, `coin1`, `coin2`, `coin3`) VALUES
(1, '2019-04-13', 166, 141, 116),
(2, '2019-04-29', 166, 510, 511);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHoard` (`idHoard`);

--
-- Indici per le tabelle `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticker` (`ticker`);

--
-- Indici per le tabelle `coin_feeds`
--
ALTER TABLE `coin_feeds`
  ADD PRIMARY KEY (`idCoin`,`idUser`,`feed`) USING BTREE,
  ADD KEY `vk_followUser` (`idUser`);

--
-- Indici per le tabelle `hoard`
--
ALTER TABLE `hoard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCoin` (`idCoin`),
  ADD KEY `idUser` (`idUser`);

--
-- Indici per le tabelle `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indici per le tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indici per le tabelle `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- Indici per le tabelle `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`idUser`,`idRound`,`root`,`leaf`) USING BTREE,
  ADD KEY `idCoin` (`idCoin`),
  ADD KEY `vk_voteRound` (`idRound`);

--
-- Indici per le tabelle `vote_round`
--
ALTER TABLE `vote_round`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coin1` (`coin1`),
  ADD KEY `coin2` (`coin2`),
  ADD KEY `coin3` (`coin3`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT per la tabella `hoard`
--
ALTER TABLE `hoard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT per la tabella `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT per la tabella `vote_round`
--
ALTER TABLE `vote_round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `vk.address` FOREIGN KEY (`idHoard`) REFERENCES `hoard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `coin_feeds`
--
ALTER TABLE `coin_feeds`
  ADD CONSTRAINT `vk_followCoin` FOREIGN KEY (`idCoin`) REFERENCES `coins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vk_followUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `hoard`
--
ALTER TABLE `hoard`
  ADD CONSTRAINT `vk.coin` FOREIGN KEY (`idCoin`) REFERENCES `coins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vk.user` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vk_voteCoin` FOREIGN KEY (`idCoin`) REFERENCES `coins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vk_voteRound` FOREIGN KEY (`idRound`) REFERENCES `vote_round` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vk_voteUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `vote_round`
--
ALTER TABLE `vote_round`
  ADD CONSTRAINT `vk_roundCoin1` FOREIGN KEY (`coin1`) REFERENCES `coins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vk_roundCoin2` FOREIGN KEY (`coin2`) REFERENCES `coins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vk_roundCoin3` FOREIGN KEY (`coin3`) REFERENCES `coins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
