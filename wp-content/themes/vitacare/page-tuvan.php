<?php 
/*
 Template Name: Tư Vấn
 */
get_header(); ?>

	
	<div class="container">
		
		 <div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
			
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	 </div>
<?php get_footer(); ?>