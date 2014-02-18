<?php get_header(); ?>
			<div id="content">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <p>Posted <?php the_time('m.d.Y'); ?> in <?php the_category(', '); ?></p>
                    <?php the_excerpt(); ?>
                    <p><a href="<?php the_permalink(); ?>">Read the article</a></p>
					

				<?php endwhile; ?>
                <div>
                    <p><?php next_posts_link('Older posts'); ?></p>
                    <p><?php previous_posts_link('Newer posts'); ?></p>
                </div>

			<?php else : ?>
						<h1>Nothing Found</h1>
						<p>Apologies, but no results were found for the requested archive. </p>
			<?php endif; ?>	
            </div>				
<?php get_footer(); ?>