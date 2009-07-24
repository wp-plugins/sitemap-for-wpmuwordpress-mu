=== Plugin Name ===
Contributors: Jiang Jilin
Donate link: http://followta.com/blog/blog/category/plugin
Tags: sitemap, wordpress mu, wpmu, google sitemap, yahoo sitemap 
Requires at least: 2.8.1
Tested up to: 2.8.1
Stable tag: 1.1


== Description ==

Automatically generate standard XML sitemap for wordpress MU blogs (works for both sub-domain and sub-directory WPMU blogs) and add sitemap into current robots.txt. 


== Installation ==

= Wordpress MU **Only** =
1. download the plugin and unpack 
2. Upload `sitemap-for-wpmu.php` to the `/wp-content/mu-plugins/` directory
3. Upload `sitemap4wpmu.xsl` to the `/wp-content/mu-plugins/` directory
4. Upload `feed-sitemap-for-wpmu.php` to the `/wp-includes/` directory 		
5. check your sitemap url like http://example.com/sitemap.xml

== Frequently Asked Questions ==

= Can I change the sitemap name/URL? =

No. The sitemap was defined as sitemap.xml. Your sitemap url should be http://example.com/sitemap.xml

= I found no sitemap file in my blog? =

The sitemap is generated when needed. No file created in fact.

= Where can I custom the xml output? =

You may custom the XML output with feed-sitemap-for-wpmu.php.

= Do I need change my robots.txt? =

Indeed, it should add your sitemap url into your robots.txt automatically, but check your robots.txt by yourself, and add "Sitemap: http://example.com/sitemap.xml" to robots.txt if possible. 

== Screenshots ==

See live blog [XML Sitemap Example](http://followta.com/blog/sitemap.xml)

== Changelog ==

= 1.1 =
* You MUST update to this stable version

= 1.0 =
* I'm very sorry, it has a BIG bug, and it does NOT work
* works only for WPMU 2.8.1, not tested for the older version

== contact me ==

= email =

`freephp AT Gmail DOT com`

= reply on plugin page =
[Reply to](http://followta.com/blog/blog/category/plugin)

= follow me on FollowTa.com =

[Follow Me](http://followta.com/jiang)

