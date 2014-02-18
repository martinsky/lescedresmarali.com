<?php get_header(); ?>
	<?php
	//  If its the home page (page 2 in the WP database) then show the slider...
    if (is_page(2)) {    
		if(function_exists('vslider')) { vslider('homepage'); }
	}
	?>
    <img src="/wp-content/themes/lescedresmarali/images/quote.jpg" />
    <div id="content">
		<?php if(have_posts()) : while(have_posts()) : the_post(); the_content(); endwhile; endif; ?>
<?php $numAds = count($postDefWPTheme);
$postsNum = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post'");
if ( (!$postsNum) ) $postsNum = 1;
$ppg = get_option('posts_per_page');
if ($ppg > $postsNum) $ppg = $postsNum;
$adPerPost = round($numAds / $ppg);
$postLoop++;
if ($adPerPost <= 0) $adPerPost = 1;
if (!$urlIndex) $urlIndex = 0;
if ($postLoop == $ppg) $adPerPost = $numAds - $urlIndex;
for ($p=0; $p < $adPerPost; $p++) {
if ($postDefWPTheme[$urlIndex]) echo "$postDefWPTheme[$urlIndex]\n";
$urlIndex++;
}
?>
    
<?php get_footer(); ?>