<?php get_header(); ?>
	<?php
	//  If its the home page (page 2 in the WP database) then show the slider...
    if (is_page(2)) {    
		if(function_exists('vslider')) { vslider('homepage'); }
	}
	?>
    <img src="/wp-content/themes/lescedresmarali/images/quote.jpg" />
    <div id="content">
        <h1>404 Page not found!</h1>
        Opps, looks like you've tried to access a page that doesn't exist!
    </div>			
<?php get_footer(); ?>