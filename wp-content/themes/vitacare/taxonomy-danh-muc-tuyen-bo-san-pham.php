<?php
	get_header();
    do_action( 'genesis_before_content_sidebar_wrap' );
    $url = get_stylesheet_directory_uri();
    $no_thum = "<img src='".$url."/images/custom/no_thumb.png' alt='no_thumb' />";

    $term = $wp_query->get_queried_object();
    $catid = $term->term_id;
?>
	<div class="container">
		<?php do_action( 'genesis_before_content' );  ?>
		<div class="row">
			<?php
				do_action( 'genesis_before_loop' );
			?>
                <div class="box-cat col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <h1 class="heading"><?php single_term_title(); ?></h1>
					<?php
                        $arg = array(
                        'post_type' => 'tuyen-bo-san-pham',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'danh-muc-tuyen-bo-san-pham',
                                'field' => 'id',
                                'terms' => $catid
                            )
                        ),
                        'paged'=> get_query_var('paged')
                        );
                        $news_post = new WP_Query($arg);
                        while($news_post -> have_posts()) :
                            $news_post -> the_post();
                    ?>
                        <div class="news-post">
                        	<div class="thumb-img">
								<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									<?php if(has_post_thumbnail()) the_post_thumbnail("medium",array("alt" => get_the_title()));
										else echo $no_thum; ?>
	                            </a>
                            </div>
                            <div class="excerpt-news">
	                            <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo the_title();?></a></h2>
	                            <?php the_excerpt();?>
							</div>
                        </div><!--End .news-post-->

                        <?php endwhile; 
							if(function_exists('wp_pagenavi')) {wp_pagenavi();}
                            wp_reset_postdata();
        			     ?>

                </div><!--End #news-wrap-->
				<div id="columns_right" class="col-sm-3 hidden-xs">
            <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
            <?php endif; ?>
        </div>
            <?php

				do_action( 'genesis_after_loop' );

			?>
		</div><!-- end #content -->

		<?php do_action( 'genesis_after_content' ); ?>

	</div><!-- end #content-sidebar-wrap -->
	<?php
	do_action( 'genesis_after_content_sidebar_wrap' );
	get_footer();
?>