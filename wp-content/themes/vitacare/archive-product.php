<?php
get_header();

// $term = $wp_query->get_queried_object();
// $catid = $term->term_id;
$catid = 0;

?>
<div class="main-archive">
	<div class="container">
		<div class="row">
			<div id="sidebar-columns_left" class="col-sm-3 hidden-xs">
				<div class="danh-muc-bai-viet-moi danh-muc-san-pham">
					<ul>
						<?php
							$taxonomy  = 'product_cat';
                            $this_category = get_categories("&taxonomy=".$taxonomy."&parent=0&hide_empty=0&order=DESC");
                            foreach ($this_category as $key => $value) {
						?>
						<li>
							<span class="title-danh-muc"><a href="<?php echo get_category_link($value->term_id);?>"><?php echo $value->name;?></a></span>
                            <ul class="sub-category">
                            <?php
                                $sub_category = get_categories("&taxonomy=".$taxonomy."&parent=".$value->term_id."&hide_empty=0&order=ASC");
                                foreach ($sub_category as $key => $sub_value) {
                                    $sub_sub_category = get_categories("&taxonomy=".$taxonomy."&parent=".$sub_value->term_id."&hide_empty=0&order=ASC");
                            ?>
                                <li class="
                                    <?php
                                        if($catid == $sub_value->cat_ID){
                                            echo 'danh-muc-select ';
                                        }
                                        if (count($sub_sub_category) > 0) {
                                            echo 'has-sub-category';
                                        }
                                    ?>
                                    "
                                >
                                    <a href="<?php echo $sub_value->slug; ?>" >
                                        <?php echo $sub_value->name;?> (<?php echo count_port_by_cat($sub_value->cat_ID,'danh-muc-bai-viet-moi');?>)
                                    </a>

                                    <?php
                                        if (count($sub_sub_category) > 0) {
                                    ?>
                                    <i class="fa fa-minus toggle-close" aria-hidden="true"></i>
                                    <i class="fa fa-plus toggle-open" aria-hidden="true"></i>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if (count($sub_sub_category) > 0) {
                                    ?>
                                        <ul class="sub-sub-category">
                                        <?php
                                            foreach ($sub_sub_category as $key => $sub_sub_value) {
                                        ?>
                                            <li class="
                                                <?php
                                                    if($catid == $sub_sub_value->cat_ID){
                                                        echo 'danh-muc-select has-parent-category';
                                                    }
                                                ?>
                                            ">
                                                <a href="<?php echo get_term_link($sub_sub_value->cat_ID); ?>" >
                                                    <?php echo $sub_sub_value->name;?> (<?php echo count_port_by_cat($sub_sub_value->cat_ID,'danh-muc-bai-viet-moi');?>)
                                                </a>
                                            </li>
                                        <?php
                                            }
                                        ?>
                                        </ul>
                                    <?php
                                        }
                                    ?>
                                </li>

                            <?php
                                }
                            ?>
                            </ul>
                        </li>
						<?php } ?>
					</ul>
                </div>
			</div>

			<div id="columns_left" class="col-xs-12 col-sm-12 col-md-6 col-lg-6 vietnt-san-pham">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h1 class="sec-title"><?php woocommerce_page_title(); ?></h1>

			<?php endif; ?>
			<?php
			$i=1;
			if ( have_posts() ) : ?>
			<div class="list-title-cat">
				<?php
				do_action( 'woocommerce_before_shop_loop' );
				?>
			</div>
			<?php woocommerce_product_loop_start(); ?>
			<?php
				while(have_posts()) : the_post();
			?>
			<div class="product-cat item col-xs-6 col-sm-4 col-md-3 col-lg-3">
				<li class="image_thumb"><a class="link" href="<?php echo the_permalink();?>"><?php echo the_post_thumbnail('full');?></a></li>
				<li class="price_product">
					<?php
						if(get_post_meta(get_the_ID(), "_regular_price", true)){ ?>
							<?php
							if(get_post_meta(get_the_ID(), "_sale_price", true)){ ?>
								<span class="promo_price_single">
									Giá KM: <?php echo number_format(get_post_meta(get_the_ID(), "_sale_price", true));?> VNĐ
								</span>
								<span class="regular_price_single_">
									Giá: <?php echo number_format(get_post_meta(get_the_ID(), "_regular_price", true));?> VNĐ
								</span>
								<?php
							}else{?>
								<span class="regular_price_single">
									Giá: <?php echo number_format(get_post_meta(get_the_ID(), "_regular_price", true));?> VNĐ
								</span>
								<?php 
							}
							?>
							<?php
						}else{ ?>
							<span class="regular_old_price_single">
								<?php echo "Giá: liên hệ";?>
							</span>
						<?php } ?>
				</li>
				<li class="title_products h_proudct"><a href="<?php echo the_permalink();?>"><?php echo the_title();?></a></li>
				<div class="star_rating_box col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php
							echo do_shortcode( '[star_rating themes="flat" id="'.get_the_ID().'"]' ); 
						?>
					</div>
			</div><!-- #post -->
				<?php if($i % 4 == 0){?>
					<div class="clear"></div>
				<?php }?>
				<?php $i++;endwhile;?>
			<?php
				do_action( 'woocommerce_after_shop_loop' );
				endif;wp_reset_query();?>
			</div>
			<div id="columns_right" class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	                <?php dynamic_sidebar( 'right-sidebar' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>