<?php
/*
Plugin Name: Display JetPack Stats
Description: A WordPress plugin that displays a post's JetPack stats on the front end.
Author: Richard Miles
Version: 1.0
Author URI: http://richymiles.wordpress.com
*/

function display_stats($content) {
	global $post;
	$args = array(
    'days'=>-1,
    'limit'=>-1,
    'post_id'=>$post->ID
);
$results = stats_get_csv('postviews', $args);
ob_start();
?>
<span class="views">Views: 
<?php echo $results[0]['views']; ?>
</span>
<?php
$content .= ob_get_contents();
ob_end_clean();

return $content;
    }
	add_filter('the_content', 'display_stats');


	// array(1) { [0]=> array(1) { ["views"]=> string(2) "27" } }