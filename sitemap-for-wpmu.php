<?php
/*
Plugin Name: Sitemap Generator For WordPress MU
Plugin URI: http://followta.com/blog/blog/category/plugin
Description: Automatically generate standard XML sitemap for WordPress MU, which supports the protocol including Google, Yahoo, Bing, MSN, Ask.com, and others. No file will be stored in disk, generating when needed like feed.Thanks Patrick Chia for his work and other people.
Version: 1.1.2
Author: Jiang Jilin
Author URI: http://followta.com/
Donate link: http://followta.com/blog/blog/category/plugin
*/

/*  Copyright 2009  Jiang Jilin  (http://followta.com/ email : freephp@gmail.com)
 *  Copyright 2008  Patrick Chia  (http://patrick.bloggles.info/ email : mypatricks@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

    Thank you for keep the credit link.
*/

function sitemap_flush_rules() {
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

add_action('init', 'sitemap_flush_rules');

function xml_feed_rewrite($wp_rewrite) {
	$feed_rules = array(
		'.*sitemap.xml$' => 'index.php?feed=sitemap'
	);

	$wp_rewrite->rules = $feed_rules + $wp_rewrite->rules;
}

add_filter('generate_rewrite_rules', 'xml_feed_rewrite');

function do_feed_sitemap() {
	load_template( ABSPATH . WPINC . '/feed-sitemap-for-wpmu.php' );
}

add_action('do_feed_sitemap', 'do_feed_sitemap', 10, 1);

function sitemap_robots() {
	echo "Sitemap: ".get_option('siteurl')."/sitemap.xml\n\n";
}

add_action('do_robotstxt', 'sitemap_robots');
?>
