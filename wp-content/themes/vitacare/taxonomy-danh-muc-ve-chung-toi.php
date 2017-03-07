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
                <div id="columns_left" class="col-sm-3 hidden-xs">
                    <div class="danh-muc-ve-chung-toi">
                        <ul>
                            <?php
                                $taxonomy  = 'danh-muc-ve-chung-toi';
                                $this_category = get_categories("&taxonomy=".$taxonomy."&parent=0&hide_empty=0&order=DESC");
                                foreach ($this_category as $key => $value) { ?>
                                    <li><span class="title-danh-muc"><a href="<?php echo get_category_link($value->term_id);?>"><?php echo $value->name;?></a></span>
                                        <ul>
                                        <?php
                                            $sub_category = get_categories("&taxonomy=".$taxonomy."&parent=".$value->term_id."&hide_empty=0&order=ASC");
                                            foreach ($sub_category as $key => $sub_value) {
                                        ?>
                                             <li 
                                                <?php
                                                    if($catid == $sub_value->cat_ID){
                                                        echo 'class="danh-muc-select"';
                                                    }
                                                ?>
                                            >
                                        <a href="<?php echo $sub_value->slug; ?>" ><?php echo $sub_value->name;?> (<?php echo count_port_by_cat($sub_value->cat_ID,'danh-muc-ve-chung-toi');?>)</a></li>
                                        
                                        <?php 
                                            }
                                            if($value->term_id == 205){ ?>
	                                        	<li><a href="/lien-he-voi-chung-toi" >Liên hệ với chúng tôi</a></li>
	                                    <?php }
                                        ?>

                                        </ul>
                                    </li>
                            <?php
                                }
                            ?>
                        </ul>
                        <?php page_nav(); ?>
                    </div>
                    <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'left-sidebar' ); ?>
                    <?php endif; ?>
                </div>
                <div class="box-cat col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    
					<?php
                        $arg = array(
                        'post_type' => 've_chung_toi',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'danh-muc-ve-chung-toi',
                                'field' => 'id',
                                'terms' => $catid
                            )
                        ),
                        'paged'=> get_query_var('paged')
                        );
                        $news_post = new WP_Query($arg);
                        $countpost = $news_post->found_posts;
                        while($news_post -> have_posts()) :
                            $news_post -> the_post();
                        
                        if($countpost == 1){ ?>
                    		<div class="news-post">
                                <h3><?php echo the_title();?></h3>
                                <li class="info_news_post"><span>Đăng bởi: <?php the_author();?></span><span>Ngày đăng: <?php the_date(); ?></span></li>
                                <div class="news-post-content">
                                    <?php the_content();?>
                                </div>
                            </div>
                    	<?php
                    		}else{ ?>
                    		<h1 class="heading"><?php single_term_title(); ?></h1>
	                        <div class="news-post col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                        	<div class="thumb-img col-xs-12 col-sm-4 col-md-4 col-lg-4">
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
										<?php if(has_post_thumbnail()) the_post_thumbnail("thumb-images",array("alt" => get_the_title()));
											else echo $no_thum; ?>
		                            </a>
	                            </div>
	                            <div class="excerpt-news col-xs-12 col-sm-8 col-md-8 col-lg-8">
		                            <h3><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo the_title();?></a></h3>
		                             <span class="hidden-xs"><?php the_excerpt();?></span>
								</div>
	                        </div><!--End .news-post-->
						<?php } ?>
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