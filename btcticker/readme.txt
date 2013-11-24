=== Plugin Name ===
A
Contributors: suicidalfish
Donate link: http://richardmacarthy.com/
Tags: bitcoin, excahnge ticker, mtgox, btcchina, bitstamp, btce
Requires at least: 3.0.1
Tested up to: 3.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: trunk

== Description ==

A side bar widget plugin which displays the prices of bitcoin for four of the most popular exchange rates.

BTC China
MT Gox
BTC-e
Bitstamp

It is installed exactly like a normal plugin through the admin area. 

Prices are received using CURL functions for each individual exchange website, therefore if the website is down for any reason no results will update or show for the specific exchange.

The plugin also uses Wordpress cron jobs to update the database periodically.

The plugin creates two option values in the wordpress database, which are removed when the plugin is uninstalled.

== Installation ==

1. Upload contents of btcticker to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the widgets menu on your wordpress theme to add the widget to the sidebar.
4. You can also add "tickerWidget();" to your code if you want to display it anywhere else.


A menu under settings called "Bitcion Ticker Settings" can be used to turn on and off tickers.

== Screenshots ==



== A brief Markdown Example ==

Ordered list:

1. Live Bitcoin Price Ticker
2. BTC China
3. MT Gox
4. BTC-e
5. Bitstamp

== Frequently Asked Questions == 

NA

== Changelog == 

NA

== Upgrade Notice == 

NA
