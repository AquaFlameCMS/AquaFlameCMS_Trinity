<?php
include("configs.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title><?php echo $website['title']; ?> - Ticket History</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/support.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/support.css" /><!--[if lt IE 9]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/support-ie.css" />
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/support-ie6.css" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/support-ie7.css" /><![endif]-->
<link rel="stylesheet" type="text/css" media="print" href="wow/static/css/support-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account/tickets.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account/tickets-ie.css" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account/tickets-ie6.css" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account/tickets-ie7.css" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/support/static';
Core.sharedStaticUrl= 'wow/static/local-common';
Core.baseUrl = '/support/en';
Core.projectUrl = '/support';
Core.cdnUrl = 'http://eu.media.blizzard.com';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'support';
Core.locale = 'en-gb';
Core.language = 'en';
Core.buildRegion = 'eu';
Core.region = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/support/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/support/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/support/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb logged-in"><div id="layout-top">
<div class="wrapper">
<div id="header">
<div id="navigation">
<div id="page-menu" class="large">
<h2><a href="/support/en/ticket/status"> Support
</a></h2>
<ul>
<li class="active">
<a href="/support/en/ticket/status" class="border-3">Support Tickets</a>
<span></span>
</li>
<li>
<a href="http://eu.blizzard.com/support/" class="border-3" onclick="return Core.open(this);">Knowledge Center
<em class="icon-16 icon-external-menu"></em></a>
<span></span>
</li>
</ul>
<span class="clear"><!-- --></span>
</div>
<span class="clear"></span>
</div>
</div>
<div id="service">
<ul class="service-bar">
<li class="service-cell service-home"><a href="http://eu.battle.net/" tabindex="50" accesskey="1" title="Battle.net Home"> </a></li>
<li class="service-cell service-welcome">
Welcome, Alex
 |  <a href="?logout=fast" tabindex="50" accesskey="2">log out</a>
</li>
<li class="service-cell service-account"><a href="https://eu.battle.net/account/management/" class="service-link" tabindex="50" accesskey="3">Account</a></li>
<li class="service-cell service-support service-support-enhanced">
<a href="#support" class="service-link service-link-dropdown" tabindex="50" accesskey="4" id="support-link" onclick="return false" style="cursor: progress" rel="javascript">Support<span class="no-support-tickets" id="support-ticket-count"></span></a>
<div class="support-menu" id="support-menu" style="display:none;">
<div class="support-primary">
<ul class="support-nav">
<li>
<a href="http://eu.blizzard.com/support/" tabindex="55" class="support-category">
<strong class="support-caption">Knowledge Center</strong>
Browse our support articles
</a>
</li>
<li>
<a href="https://eu.battle.net/support/ticket/submit" tabindex="55" class="support-category">
<strong class="support-caption">Ask a Question</strong>
Create a new support ticket
</a>
</li>
<li>
<a href="https://eu.battle.net/support/ticket/status" tabindex="55" class="support-category">
<strong class="support-caption">Your Support Tickets</strong>
View your active support tickets.
</a>
<div class="ticket-summary" id="ticket-summary"></div>
</li>
</ul>
<span class="clear"><!-- --></span>
</div>
<div class="support-secondary"></div>
<!--[if IE 6]> <iframe id="support-shim" src="javascript:false;" frameborder="0" scrolling="no" style="display: block; position: absolute; top: 0; left: 9px; width: 297px; height: 400px; z-index: -1;"></iframe>
<script type="text/javascript">
//<![CDATA[
(function(){
var doc = document;
var shim = doc.getElementById('support-shim');
shim.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';
shim.style.display = 'block';
})();
//]]>
</script>
<![endif]-->
</div>
</li>
<li class="service-cell service-explore">
<a href="#explore" tabindex="50" accesskey="5" class="dropdown" id="explore-link" onclick="return false" style="cursor: progress" rel="javascript">Explore</a>
<div class="explore-menu" id="explore-menu" style="display:none;">
<div class="explore-primary">
<ul class="explore-nav">
<li>
<a href="http://eu.battle.net/" tabindex="55" data-label="Home">
<strong class="explore-caption">Battle.net Home</strong>
Connect. Play. Unite.
</a>
</li>
<li>
<a href="https://eu.battle.net/account/management/" tabindex="55" data-label="Account">
<strong class="explore-caption">Account</strong>
Manage your Account
</a>
</li>
<li>
<a href="http://eu.blizzard.com/support/" tabindex="55" data-label="Support">
<strong class="explore-caption">Support</strong>
Get Support and explore the knowledgebase.
</a>
</li>
<li>
<a href="https://eu.battle.net/account/management/get-a-game.html" tabindex="55" data-label="Buy Games">
<strong class="explore-caption">Buy Games</strong>
Digital Games for Download
</a>
</li>
</ul>
<div class="explore-links">
<h2 class="explore-caption">More</h2>
<ul>
<li><a href="http://eu.battle.net/what-is/" tabindex="55" data-label="More">What is Battle.net?</a></li>
<li><a href="http://eu.battle.net/realid/" tabindex="55" data-label="More">What is Real ID?</a></li>
<li><a href="https://eu.battle.net/account/parental-controls/index.html" tabindex="55" data-label="More">Parental Controls</a></li>
<li><a href="http://eu.battle.net/security/" tabindex="55" data-label="More">Account Security</a></li>
<li><a href="http://eu.battle.net/games/classic" tabindex="55" data-label="More">Classic Games</a></li>
<li><a href="https://eu.battle.net/account/support/index.html" tabindex="55" data-label="More">Account Support</a></li>
</ul>
</div>
<span class="clear"><!-- --></span>
<!--[if IE 6]> <iframe id="explore-shim" src="javascript:false;" frameborder="0" scrolling="no" style="display: block; position: absolute; top: 0; left: 9px; width: 409px; height: 400px; z-index: -1;"></iframe>
<script type="text/javascript">
//<![CDATA[
(function(){
var doc = document;
var shim = doc.getElementById('explore-shim');
shim.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';
shim.style.display = 'block';
})();
//]]>
</script>
<![endif]-->
</div>
<ul class="explore-secondary">
<li class="explore-game explore-game-sc2">
<a href="http://eu.battle.net/sc2/" tabindex="55" data-label="Game - sc2">
<span class="explore-game-inner">
<strong class="explore-caption">StarCraft II</strong>
<span>News &amp; Forums</span> <span>Beginner’s Guide</span> <span>Player Profiles</span>
</span>
</a>
</li>
<li class="explore-game explore-game-wow">
<a href="http://eu.battle.net/wow/" tabindex="55" data-label="Game - wow">
<span class="explore-game-inner">
<strong class="explore-caption">World of Warcraft</strong>
<span>Character Profiles</span> <span>News &amp; Forums</span> <span>Game Guide</span>
</span>
</a>
</li>
<li class="explore-game explore-game-d3">
<a href="http://eu.battle.net/d3/" tabindex="55" data-label="Game - d3">
<span class="explore-game-inner">
<strong class="explore-caption">Diablo III</strong>
<span>Game Guide</span> <span>Beta News</span> <span>Forums</span>
</span>
</a>
</li>
</ul>
</div>
</li>
</ul>
<div id="warnings-wrapper">
<script type="text/javascript">
//<![CDATA[
$(function() {
App.saveCookie('html5Warning');
App.resetCookie('browserWarning');
});
//]]>
</script>
<!--[if lt IE 8]> <div id="browser-warning" class="warning warning-red">
<div class="warning-inner2">
You are using an outdated web browser.<br />
<a href="http://eu.blizzard.com/support/article/browserupdate">Upgrade</a> or <a href="http://www.google.com/chromeframe/?hl=en-GB" id="chrome-frame-link">install Google Chrome Frame</a>.
<a href="#close" class="warning-close" onclick="App.closeWarning('#browser-warning', 'browserWarning'); return false;"></a>
</div>
</div>
<![endif]-->
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/CFInstall.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
var age = 365 * 24 * 60 * 60 * 1000;
var src = 'https://www.google.com/chromeframe/?hl=en-GB';
if ('http:' == document.location.protocol) {
src = 'http://www.google.com/chromeframe/?hl=en-GB';
}
document.cookie = "disableGCFCheck=0;path=/;max-age="+age;
$('#chrome-frame-link').bind({
'click': function() {
App.closeWarning('#browser-warning');
CFInstall.check({
mode: 'overlay',
url: src
});
return false;
}
});
});
//]]>
</script>
<![endif]-->
<noscript>
<div id="javascript-warning" class="warning warning-red">
<div class="warning-inner2">
JavaScript must be enabled to use this site.
</div>
</div>
</noscript>
</div>
</div>
</div>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div class="page-header" id="page-header">
<h2 class="subcategory">Support Tickets</h2>
<h3 class="headline">Your Ticket History</h3>
</div>
<div id="page-content">
<div class="ticket-filters">
<span class="create-ticket">
<a
class="ui-button button1 "
href="/support/en/ticket/submit"
id="create-ticket"
tabindex="1"
>
<span>
<span>Ask a Question</span>
</span>
</a>
</span>
<div class="ticket-region">
<form method="get" action="/support/en/ticket/status">
<span class="input-left">
<label for="region-select">
<span class="label-text">
Region:
</span>
<span class="input-required"></span>
</label>
</span>
<span class="input-right">
<span class="input-select input-select-extra-small">
<select name="region" id="region-select" class="extra-small border-5 glow-shadow-2" tabindex="1">
<option value="us">Americas</option>
<option value="eu" selected="selected">Europe</option>
<option value="kr">Korea</option>
<option value="sea">Southeast Asia</option>
<option value="tw">Taiwan</option>
</select>
<span class="inline-message" id="region-select-message"> </span>
</span>
</span>
<button
class="ui-button button1 "
type="submit"
id="region-submit"
tabindex="1"
>
<span>
<span>Go</span>
</span>
</button>
<script type="text/javascript">
//<![CDATA[
(function() {
var regionSubmit = document.getElementById('region-submit');
regionSubmit.style.display = 'none';
})();
//]]>
</script>
</form>
</div>
<div class="ticket-filter" id="ticket-filter" style="display: none;">
<form method="get" action="/support/en/ticket/status">
<span class="input-left">
<label for="filter-select">
<span class="label-text">
View:
</span>
<span class="input-required"></span>
</label>
</span>
<span class="input-right">
<span class="input-select input-select-extra-small">
<select name="show" id="filter-select" class="extra-small border-5 glow-shadow-2" tabindex="1">
<option value="active" selected="selected">Active Tickets</option>
<option value="all">All Tickets</option>
</select>
<span class="inline-message" id="filter-select-message"> </span>
</span>
</span>
<script type="text/javascript">
//<![CDATA[
(function() {
var ticketFilter = document.getElementById('ticket-filter');
ticketFilter.style.display = 'inline-block';
})();
//]]>
</script>
</form>
</div>
<span class="clear"><!-- --></span>
</div>
<table id="ticket-history">
<thead>
<tr>
<th scope="col" class="ticket-id"><a href="#" class="sort-link"><span class="arrow">Ticket</span></a></th>
<th scope="col" class="ticket-subject"><a href="#" class="sort-link"><span class="arrow">Subject</span></a></th>
<th scope="col" class="ticket-date"><a href="#" class="sort-link numeric"><span class="arrow down">Updated</span></a></th>
<th scope="col" class="ticket-status"><a href="#" class="sort-link"><span class="arrow">Status</span></a></th>
<th scope="col" class="ticket-type"><a href="#" class="sort-link"><span class="arrow">Type</span></a></th>
</tr>
</thead>
<tbody>
<tr class="ticket-read">
<td class="ticket-id" data-raw="17100131">
<a class="ticket-link" href="/support/en/ticket/thread/17100131">
<span class="ticket">EU17100131</span>
</a>
</td>
<td class="ticket-subject" data-raw="lol im 36k away from getting neutral reputation wi">
<div class="subject">
<div class="subject-line">lol im 36k away from getting Neutral reputation wi </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20111014153100000">
<span><time datetime="2011-10-14T15:31+00:00">14/10/11 15:31:00 GMT</time></span>
</td>
<td class="ticket-status" data-raw="active">
<div class="status status-active" data-tooltip="Your ticket has been archived. It cannot be reopened." data-tooltip-options='{"location": "mouse"}'>Archived</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="17083986">
<a class="ticket-link" href="/support/en/ticket/thread/17083986">
<span class="ticket">EU17083986</span>
</a>
</td>
<td class="ticket-subject" data-raw="can anyone tell me is there a way to come from ha">
<div class="subject">
<div class="subject-line">Can anyone tell me is there a way to come from  ha </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20111014102855000">
<span><time datetime="2011-10-14T10:28+00:00">14/10/11 10:28:55 GMT</time></span>
</td>
<td class="ticket-status" data-raw="archived">
<div class="status status-archived" data-tooltip="Your ticket has been archived. It cannot be reopened." data-tooltip-options='{"location": "mouse"}'>Archived</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="17221788">
<a class="ticket-link" href="/support/en/ticket/thread/17221788">
<span class="ticket">EU17221788</span>
</a>
</td>
<td class="ticket-subject" data-raw=":( i cant go to pirate thingy because im hated wit">
<div class="subject">
<div class="subject-line">:( i cant go to pirate thingy because im hated wit </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110919083550000">
<span><time datetime="2011-09-19T08:35+00:00">19/09/11 08:35:50 GMT</time></span>
</td>
<td class="ticket-status" data-raw="cancelled">
<div class="status status-canceled" data-tooltip="Your ticket has been cancelled." data-tooltip-options='{"location": "mouse"}'>Cancelled</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="16872996">
<a class="ticket-link" href="/support/en/ticket/thread/16872996">
<span class="ticket">EU16872996</span>
</a>
</td>
<td class="ticket-subject" data-raw="excuse me is there anyone that can help me its not">
<div class="subject">
<div class="subject-line">Excuse me is there anyone that can help me its not </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110906074622000">
<span><time datetime="2011-09-06T07:46+00:00">06/09/11 07:46:22 GMT</time></span>
</td>
<td class="ticket-status" data-raw="cancelled">
<div class="status status-canceled" data-tooltip="Your ticket has been cancelled." data-tooltip-options='{"location": "mouse"}'>Cancelled</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="15575982">
<a class="ticket-link" href="/support/en/ticket/thread/15575982">
<span class="ticket">EU15575982</span>
</a>
</td>
<td class="ticket-subject" data-raw="im having some problems...im getting disconnected">
<div class="subject">
<div class="subject-line">im having some problems…im getting Disconnected  </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110824120627000">
<span><time datetime="2011-08-24T12:06+00:00">24/08/11 12:06:27 GMT</time></span>
</td>
<td class="ticket-status" data-raw="archived">
<div class="status status-archived" data-tooltip="Your ticket has been archived. It cannot be reopened." data-tooltip-options='{"location": "mouse"}'>Archived</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="15471927">
<a class="ticket-link" href="/support/en/ticket/thread/15471927">
<span class="ticket">EU15471927</span>
</a>
</td>
<td class="ticket-subject" data-raw="im opening this ticket,because im having a little">
<div class="subject">
<div class="subject-line">im opening this ticket,because im having a little  </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110821144559000">
<span><time datetime="2011-08-21T14:45+00:00">21/08/11 14:45:59 GMT</time></span>
</td>
<td class="ticket-status" data-raw="archived">
<div class="status status-archived" data-tooltip="Your ticket has been archived. It cannot be reopened." data-tooltip-options='{"location": "mouse"}'>Archived</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="15435597">
<a class="ticket-link" href="/support/en/ticket/thread/15435597">
<span class="ticket">EU15435597</span>
</a>
</td>
<td class="ticket-subject" data-raw="excuse me im making this ticket because im getting">
<div class="subject">
<div class="subject-line">Excuse me im making this ticket because im getting </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110820084628000">
<span><time datetime="2011-08-20T08:46+00:00">20/08/11 08:46:28 GMT</time></span>
</td>
<td class="ticket-status" data-raw="archived">
<div class="status status-archived" data-tooltip="Your ticket has been archived. It cannot be reopened." data-tooltip-options='{"location": "mouse"}'>Archived</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="15497076">
<a class="ticket-link" href="/support/en/ticket/thread/15497076">
<span class="ticket">EU15497076</span>
</a>
</td>
<td class="ticket-subject" data-raw="im reporting heálern for using master loot for bad">
<div class="subject">
<div class="subject-line">Im reporting Heálern for using MASTER LOOT FOR bad </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110723053927000">
<span><time datetime="2011-07-23T05:39+00:00">23/07/11 05:39:27 GMT</time></span>
</td>
<td class="ticket-status" data-raw="cancelled">
<div class="status status-canceled" data-tooltip="Your ticket has been cancelled." data-tooltip-options='{"location": "mouse"}'>Cancelled</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="ticket-read">
<td class="ticket-id" data-raw="14937530">
<a class="ticket-link" href="/support/en/ticket/thread/14937530">
<span class="ticket">EU14937530</span>
</a>
</td>
<td class="ticket-subject" data-raw="i have one god damn question,why when i cast and w">
<div class="subject">
<div class="subject-line">i have one god damn question,why when i cast and w </div>
<div class="truncate-subject"></div>
</div>
</td>
<td class="ticket-date" data-raw="20110706150656000">
<span><time datetime="2011-07-06T15:06+00:00">06/07/11 15:06:56 GMT</time></span>
</td>
<td class="ticket-status" data-raw="cancelled">
<div class="status status-canceled" data-tooltip="Your ticket has been cancelled." data-tooltip-options='{"location": "mouse"}'>Cancelled</div>
</td>
<td class="ticket-type" data-raw="in-game">
<span class="icon-32 icon-ticket-wow" data-tooltip="In-game" data-tooltip-options='{"location": "mouse"}'></span>
</td>
</tr>
<tr class="no-results">
<td class="empty-table" colspan="5">
<div class="no-tickets">
<p>You currently have no active support tickets. <a href="" id="filter-link" rel="all">View all tickets</a> if you want to see details of your past tickets.</p>
</div>
</td>
</tr>
</tbody>
</table>
<div class="ticket-assistance columns-2">
<div class="column">
<div class="ticket-help">
<p><a href="http://eu.blizzard.com/support/article/mssticketlost" onclick="window.open(this.href);return false;">
<span class="icon-16 icon-help-plain"></span>
<span class="icon-16-label">Can’t find your ticket?</span>
</a></p>
</div>
</div>
<div class="column">
<div class="ticket-feedback">
<p><a href="#feedback" onclick="$('#feedback-dialog').dialog('open'); return false;">
<span class="icon-16-label">Submit feedback on the new ticket system</span>
<span class="icon-16 icon-feedback"></span>
</a></p>
</div>
<div class="feedback-dialog" id="feedback-dialog" style="display: none;" title="Feedback">
<div id="feedback-wrapper">
<div id="feedback-blank" style="display: none;"><p class="text-red"><strong>Please enter your feedback in the field.</strong></p></div>
<p>Your feedback is important to us. Please let us know how we can improve this website. Thank you!</p>
<form id="feedback-form" method="post" action="/support/en/feedback/submit">
<span class="input-textarea input-textarea-large">
<textarea name="feedback" id="feedback" class="large border-5 glow-shadow-2" cols="78" rows="5" tabindex="1" required="required"></textarea>
<span class="inline-message" id="feedback-message">2000 characters left.</span>
</span>
</form>
</div>
<div class="alert-dialog" id="feedback-success" style="display: none;"><p class="text-green"><strong>Thank you for your feedback.</strong></p></div>
<div class="alert-dialog" id="feedback-error" style="display: none;"><p class="text-red"><strong>There was an error submitting your feedback. Please try again later.</strong></p></div>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
$("#feedback-dialog").dialog('destroy');
$('#feedback-dialog').dialog({
autoOpen: false,
modal: true,
position: 'center',
resizeable: false,
width: 504,
closeText: 'Close',
buttons: {
'Submit': function() {
var form = document.getElementById('feedback-wrapper');
$.ajax({
type: 'POST',
contentType: 'application/x-www-form-urlencoded; charset=utf-8',
timeout: 60000,
url: '/support/en/feedback/submit',
data: { feedback: $('#feedback').val() },
beforeSend: function() {
$('#feedback').attr('disabled', 'disabled');
$('#feedback').parent().addClass('input-textarea-disabled');
$('.ui-dialog-buttonpane').find('button:first').addClass('processing').attr('disabled', 'disabled');
},
success: function(json) {
$('#feedback-error').hide();
if (json.Success) {
$('#feedback-success').show();
$('#feedback-error').hide();
$('#feedback-blank').hide();
$('#feedback-wrapper').hide();
$('.ui-dialog-buttonpane').hide();
$('#feedback').val('');
} else {
$('#feedback-blank').show();
$('#feedback').removeAttr('disabled');
$('#feedback').parent().removeClass('input-textarea-disabled');
$('.ui-dialog-buttonpane').find('button:first').removeClass('processing').removeAttr('disabled');
}
},
error: function() {
$('#feedback-success').hide();
$('#feedback-error').show();
$('#feedback-wrapper').hide();
$('.ui-dialog-buttonpane').hide();
}
});
return false;
},
'Cancel': function() {
$(this).dialog('close');
}
},
open: function() {
if ($('.ui-dialog-buttonpane').find('button:first span:first').hasClass('ui-button-text')) {
$('.ui-dialog-buttonpane').find('button:first span:first').wrap('span');
$('.ui-dialog-buttonpane').find('button:first').addClass('button1');
$('.ui-dialog-buttonpane').find('button:last').addClass('ui-cancel');
}
$('#feedback-success').hide();
$('#feedback-blank').hide();
$('#feedback-error').hide();
$('#feedback-wrapper').show();
$('.ui-dialog-buttonpane').show();
$('#feedback').removeAttr('disabled').val('');
$('#feedback').parent().removeClass('input-textarea-disabled');
$('.ui-dialog-buttonpane').find('button:first').removeClass('processing').addClass('disabled').attr('disabled', 'disabled');
$('#feedback').bind('focus blur input propertychange', function(e) {
var count = $(this).val().length,
max = 2000,
message;
$('.ui-dialog-buttonpane').find('button:first').addClass('disabled').attr('disabled', 'disabled');
if (count > max) {
$('#feedback-message').html('<span class="inline-error">Feedback must be 2000 characters or less.</span>');
return false;
} else {
if (count > 1) {
$('.ui-dialog-buttonpane').find('button:first').removeClass('disabled').removeAttr('disabled');
}
if (count === max - 1) {
$('#feedback-message').html('2000 character left.');
} else {
$('#feedback-message').html('2000 characters left.');
}
message = $('#feedback-message').html();
$('#feedback-message').html(message.replace(max, max - count));
return true;
}
});
}
});
});
//]]>
</script>
</div>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
var history = new TicketHistory({
results: 10
});
});
//]]>
</script>
<!--[if IE 6]> <script type="text/javascript" src="wow/static/local-common/js/third-party/DD_belatedPNG.js"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.icon-16');
DD_belatedPNG.fix('.icon-alert-success');
DD_belatedPNG.fix('.icon-64');
DD_belatedPNG.fix('.input-radio');
DD_belatedPNG.fix('.input-checkbox');
//]]>
</script>
<![endif]-->
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("functions/footer_man.php"); ?>
</div>
</div><script type="text/javascript">
//<![CDATA[
var xsToken = 'eabaa517-edf8-49e2-b7c7-9ba7ebc12fbe';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
other: 'Other'
}
};
//]]>
</script>
<script type="text/javascript" src="wow/static/js/support.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/menu.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
});
//]]>
</script>
<script type="text/javascript" src="wow/static/local-common/js/table.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.bgiframe-2.1.2.js"></script>
<script type="text/javascript" src="wow/static/js/account/tickets.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = 'https://eu.battle.net/login/login.frag';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>
</body>
</html>