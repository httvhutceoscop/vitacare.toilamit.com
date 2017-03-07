<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	
	<div class="container">
		
		 <div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<?php
					while(have_posts()) : the_post();
					the_content();
					endwhile;

				?>
		
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	 </div>
<?php get_footer(); ?>