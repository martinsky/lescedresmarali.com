<?php get_header(); ?>
	<?php
	//  If its the home page (page 2 in the WP database) then show the slider...
    if (is_page(2)) {    
		if(function_exists('vslider')) { vslider('homepage'); }
	}
	?>
    <img src="/wp-content/themes/lescedresmarali/images/quote.jpg" />
    <div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
        
        <?php echo the_content(); ?>
        <?php previous_post('&laquo; &laquo; %', '', 'yes'); ?> | <?php next_post('% &raquo; &raquo; ', '', 'yes'); ?>

        <?php endwhile; // end of the loop. ?>
    </div>			
<?php get_footer(); ?>