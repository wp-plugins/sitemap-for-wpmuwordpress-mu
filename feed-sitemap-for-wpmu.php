<?php
/**
 * XML Sitemap Feed Template for WPMU to display XML Sitemap Posts feed.
 * Official website: http://followta.com
 * WPMU version: 2.8.1
 * @package followta.com/Wordpress
 */

header('Content-Type: text/xml; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; 

$sitemapstyle = ABSPATH. "wp-content/mu-plugins/sitemap4wpmu.xsl";
if(file_exists($sitemapstyle)) {
	$url = get_option('siteurl'). "/wp-content/mu-plugins/sitemap4wpmu.xsl";
	echo '<?xml-stylesheet type="text/xsl" href="'. $url. '"?>';
}

?>

<!-- generator="http://followta.com" -->
<urlset	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
	xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
>

<?php 

$blogs = $wpdb->get_results("SELECT blog_id, domain, path, last_updated FROM $wpdb->blogs WHERE
	public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' ORDER BY last_updated DESC");

if ($blogs) {
	foreach ($blogs as $blog) {
		$blogPostsTable = "wp_".$blog->blog_id."_posts";
		echo "\n\t<url>\n\t\t<loc>http://". $blog->domain. $blog->path. "</loc>";
		echo "\n\t\t<lastmod>". mysql2date('Y-m-d\TH:i:s+00:00', $blog->last_updated, false). "</lastmod>";
		echo "\n\t\t<changefreq>weekly</changefreq>";
		echo "\n\t\t<priority>0.5</priority>";
		echo "\n\t</url>\n"; 

		$post_ids = $wpdb->get_col("SELECT ID FROM $blogPostsTable WHERE post_status = 'publish' ORDER BY post_date_gmt DESC LIMIT 1000");

		if ($post_ids) {
			global $wp_query;
			$wp_query->in_the_loop = true;

			$query_jiang = "SELECT * FROM $blogPostsTable WHERE post_status = 'publish' AND (post_type = 'post' or post_type = 'page') ORDER BY post_date_gmt DESC";
			$posts = $wpdb->get_results($query_jiang);
			foreach ($posts as $post) {
				setup_postdata($post); 
?>
	<url>
		<loc><?php echo get_blog_permalink($blog->blog_id, $post->ID); ?></loc> 
		<lastmod><?php echo mysql2date('Y-m-d\TH:i:s+00:00', get_post_time('Y-m-d H:i:s', true), false); ?></lastmod> 
		<changefreq>weekly</changefreq> 
		<priority>0.6</priority>
	</url>

<?php } } } }  ?> 

</urlset>
