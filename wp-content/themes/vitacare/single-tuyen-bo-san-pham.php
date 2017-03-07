<?php
    get_header();
	do_action( 'genesis_before_content_sidebar_wrap' );
    global $post;
	?>
	<div class="container">

		<?php do_action( 'genesis_before_content' ); ?>
			<div class="row">
				<div class="box-cat col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<?php
						do_action( 'genesis_before_loop' );
					?>
	               <?php
						do_action( 'genesis_before_entry' );
							?>
					<?php if(have_posts()) : the_post();  ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<div class="social">
                                            <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                                            <g:plusone></g:plusone>
                                        </div>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
		                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-542f4ae15887187d" async="async"></script>
		                    <div class="addthis_native_toolbox"></div>
					<?php endif; ?>

					<?php do_action( 'genesis_after_loop' ); ?>
						<div id="related-post">
			            	<?php
			                $taxonomy = 'danh-muc-tuyen-bo-san-pham';  // or whatever you want
			                $category = wp_get_object_terms( $post->ID, $taxonomy,array('orderby' => 'parent', 'order' => 'DESC'));
			                $args = array(
			                    'post_type' => 'tuyen-bo-san-pham',
			                    'tax_query' => array(
			                        array(
			                            'taxonomy'  => $taxonomy,
			                            'field'     => 'id',
			                            'terms'     => $category[0]->term_id
			                        )
			                    ),
			                    'post__not_in' => array($post->ID),
			                    'showposts' => 6 // Number of related posts that will be shown.
			                );

						    $query = new WP_Query($args);
						        if($query->have_posts()){
						        	echo '<h3>Tin Liên Quan</h3>
												<ul>';
						                while($query->have_posts()):
						                    $query->the_post();
						                    ?>
												<li>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</li>
						                <?php
						                        endwhile;
						                    }
						                ?>
							</ul>
	                    </div>

                 </div><!-- end #row -->
                 <div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
			</div><!-- end #container -->
			
		<?php do_action( 'genesis_after_content' ); ?>
	</div>
	<?php
	do_action( 'genesis_after_content_sidebar_wrap' );
	get_footer();
?>