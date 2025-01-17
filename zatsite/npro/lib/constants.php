<?php
/*
 +---------------------------------------------------------------------+
 | NinjaFirewall (Pro edition)                                         |
 |                                                                     |
 | (c) NinTechNet - https://nintechnet.com/                            |
 |                                                                     |
 +---------------------------------------------------------------------+
 | This program is free software: you can redistribute it and/or       |
 | modify it under the terms of the GNU General Public License as      |
 | published by the Free Software Foundation, either version 3 of      |
 | the License, or (at your option) any later version.                 |
 |                                                                     |
 | This program is distributed in the hope that it will be useful,     |
 | but WITHOUT ANY WARRANTY; without even the implied warranty of      |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the       |
 | GNU General Public License for more details.                        |
 +---------------------------------------------------------------------+
*/
/* ------------------------------------------------------------------ */
define('NFW_ENGINE_VERSION', '3.2.9');
define('NFW_RULES_VERSION', '20170710.1');
define('NFW_EDN', 1);

// Set to 0 if you don't want NF to connect to the update server
// (obviously, you will not be able to update NF any longer!) :
if (! defined( 'NFW_UPDATE' ) ) {
	define( 'NFW_UPDATE', 'pro.ninjafirewall.com' );
}

/* ------------------------------------------------------------------ */

// Used by the admin script and the installer :
$err_fw = array(
	1	=>	'<i>unable to find NinjaFirewall options file (<code>conf/options.php</code>)</i>',
	2	=>	'<i>unable to read NinjaFirewall options file (<code>conf/options.php</code>)</i>',
	3	=>	'<i>unable to find NinjaFirewall rules file (<code>conf/rules.php</code>)</i>',
	4	=>	'<i>unable to read NinjaFirewall rules file (<code>conf/rules.php</code>)</i>',
	5	=>	'<i>firewall has been disabled from the <a style="text-decoration:underline" href="?mid=30&token='. @htmlspecialchars( $_REQUEST['token'] ) . '">administration console</a></i>',
	10	=>	'<i>unable to communicate with the firewall. Please check your PHP INI settings</i>',
);

define( 'NFW_NULL_BYTE', 2);
define( 'NFW_ASCII_CTRL', 500);
define( 'NFW_DOC_ROOT', 510);
define( 'NFW_WRAPPERS', 520);
define( 'NFW_OBJECTS', 525);
define( 'NFW_LOOPBACK', 540);
// Pro Edtion only :
define('NFW_SCAN_BOTS', 531);
// Pro+ Edtion only :
define('NFW_BOT_LIST', 'acunetix|AhrefsBot|backdoor|bandit|' .
	'blackwidow|BOT for JCE|core-project|dts agent|emailmagnet|' .
	'exploit|extract|flood|grabber|harvest|httrack|havij|hunter|indy library|' .
	'LoadTimeBot|Microsoft URL Control|Miami Style|morfeus|' .
	'nessus|pmafind|scanner|semrushbot|siphon|spbot|sqlmap|survey|teleport|updown_tester|xovibot'
);
define( 'NFW_DEFAULT_MSG', '<br /><br /><br /><br /><center>Sorry ' .
	'<b>%%REM_ADDRESS%%</b>, your request cannot be processed.<br />' .
	'For security reasons, it was blocked and logged.<br /><br />' .
	'If you believe this was an error please contact the<br />' .
	'webmaster and enclose the following incident ID:<br />' .
	'<br />[ <b>#%%NUM_INCIDENT%%</b> ]</center>'
);

/* ------------------------------------------------------------------ */
// EOF

