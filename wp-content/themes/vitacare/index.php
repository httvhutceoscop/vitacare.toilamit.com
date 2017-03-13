<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>


		<div class="slideshow hidden-xs">
			 <?php
echo do_shortcode('[smartslider3 slider=2]');
?>
		</div>

<div class="container">
	<div class="row">
		 <div id="columns_left" class="col-xs-12 col-sm-12 col-md-12 col-lg-9">

		 	<!-- Video giới thiệu -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3 class="title_home">Video giới thiệu Vitacare</h3>
				<div class="video col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<iframe width="100%" height="auto" src="https://www.youtube.com/embed/BqRH8z3FAas" frameborder="0" allowfullscreen></iframe>	
				</div>
			</div>
			<!-- End Video giới thiệu -->

		 	<!-- Các sản phẩm vitacare -->
			<div class="productbycategory col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3 class="title_home">Các sản phẩm VitaCare</h3>
				<div class="row sf_cols">

					<?php
						$args = array(
									'post_type' => 'product',
									'posts_per_page' => 12,
								);
						query_posts($args);
					?>
				<div class="owl-carousels">
					<?php 
						while(have_posts()) : the_post();
						?>
						<div class="product-cat item col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
							</div>
						<?php
							endwhile;
							wp_reset_query();
						?>
					</div>
				</div>
			</div>
			<!-- End: các sản phẩm vitacare -->
		 
			 <?php
				$args = array(
							'post_type' => 'bai-viet-trang-chu',
							'posts_per_page' => 6,
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'tax_query' => array(
											'taxonomy' => 'danh-muc-bai-viet-trang-chu',
										),

						);
				query_posts($args);
			?>	
			<!-- Quy trình chăm sóc -->
			<div class="bai_viet_home col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h3 class="title_home_care"><a href="/ve-chung-toi/ve-chung-toi-ve-chung-toi/quy-trinh-chat-luong"><?php echo get_option('option2');?><br/> <strong><?php echo get_option('option3');?></strong></a></h3>
				<?php 
				$i = 0;
				if(have_posts()) : while(have_posts()) : the_post();?>
					<div class="box col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="block-post clearfix">
							<ul>
								<a href="<?php the_permalink();?>">
									<li class="vne_thumbnail">
										<?php the_post_thumbnail();?>
									</li>
								</a>
								<li class="slide-up" id="slide-up-<?php echo $i;?>">
									<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
									<p><?php echo wp_trim_words(get_the_content(),10);?></p>
								</li>
							</ul>
							<!-- <a class="btn btn-success text-center" href="<?php echo get_category_link( $blog_category ); ?>">Read more</a> -->
						</div><!-- end .block-post -->
					</div>
				<?php $i++; endwhile;endif;wp_reset_query();?>
			</div>
			<!-- End: quy trình chăm sóc -->

<!-- 			<div class="cham_ngon" style="background:#5BBA65;text-align:center;float:left;width:100%;margin:10px 0px;padding:7px 0px;color:#fff;">
				<h3> -->
					<?php //echo get_option('option4');?>
				<!-- </h3>
			</div> -->

			<!-- Kiến thức Vitacare -->

			<div class="new-post-by-cat col-xs-12 col-sm-12 col-md-12 col-lg-12 hide">
				<h3 class="title_home">Kiến thức Vitacare</h3>
				<div class="column-new-post-by-cat col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<?php
						$args = array(
									'post_type' => 'bai-viet-moi',
									'posts_per_page' => 1,
			                        'tax_query' => array(
			                            array(
			                                'taxonomy' => 'danh-muc-bai-viet-moi',
			                                'field' => 'id',
			                                'terms' => 216
			                            )
			                        ),
									'orderby' => "DESC",
								);
						query_posts($args);
						if(have_posts()) : while(have_posts()) : the_post();
					?>
						<ul>
							<li class="image-new-post-by-cat"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium');?></a></li>
							<li class="title-new-post-by-cat"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="description-new-post-by-cat"><?php echo wp_trim_words(get_the_content(),25);?></li>
						</ul>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
				<div class="column-new-post-by-cat col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<?php
						$args = array(
									'post_type' => 'bai-viet-moi',
									'posts_per_page' => 1,
			                        'tax_query' => array(
			                            array(
			                                'taxonomy' => 'danh-muc-bai-viet-moi',
			                                'field' => 'id',
			                                'terms' => 217
			                            )
			                        ),
									'orderby' => "DESC",
								);
						query_posts($args);
						if(have_posts()) : while(have_posts()) : the_post();
					?>
						<ul>
							<li class="image-new-post-by-cat"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium');?></a></li>
							<li class="title-new-post-by-cat"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="description-new-post-by-cat"><?php echo wp_trim_words(get_the_content(),25);?></li>
						</ul>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
				<div class="column-new-post-by-cat col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<?php
						$args = array(
									'post_type' => 'bai-viet-moi',
									'posts_per_page' => 1,
			                        'tax_query' => array(
			                            array(
			                                'taxonomy' => 'danh-muc-bai-viet-moi',
			                                'field' => 'id',
			                                'terms' => 218
			                            )
			                        ),
									'orderby' => "DESC",
								);
						query_posts($args);
						if(have_posts()) : while(have_posts()) : the_post();
					?>
						<ul>
							<li class="image-new-post-by-cat"><a href="<?php the_permalink();?>"><?php the_post_thumbnail('medium');?></a></li>
							<li class="title-new-post-by-cat"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
							<li class="description-new-post-by-cat"><?php echo wp_trim_words(get_the_content(),25);?></li>
						</ul>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
			</div>
			<!-- End: Kiến thức vitacare -->			

			<!-- Khách hàng nói về Vitacare -->
			<div class="comment_guest">
				<h3 class="title_home">Khách hàng nói về Vitacare</h3>
				<?php
					$args = array(
							'post_type' => 'y-kien-khach-hang',
							'showposts' => 3,
							'orderby' => 'id',
							'order' => 'ASC',							
						);
					$aKhachHangReview = [];

					$query_kh = new WP_Query($args);
					$aYKienKhachHang = $query_kh->posts;

					$video_ykkh = $aYKienKhachHang[0];
					$image_ykkh = $aYKienKhachHang[1];
					$text_ykkh = $aYKienKhachHang[2];
			
					$imgUrl = "https://img.youtube.com/vi/<insert-youtube-video-id-here>/default.jpg";
					$youtubeId = get_post_meta($video_ykkh->ID, "youtube-id", $single = false);
				?>

				<?php
					if (!empty($youtubeId)) {
				?>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="video">
							<iframe width="100%" height="auto" src="https://www.youtube.com/embed/<?php echo $youtubeId[0];?>" frameborder="0" allowfullscreen></iframe>	
						</div>
					</div>
				<?php		
					} else {
				?>

				<?php } ?>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<a class="hide"> href="<?php echo get_permalink($image_ykkh->ID);?>">
							<div class="img-ykkh">
								<img src="https://placeholdit.imgix.net/~text?txtsize=19&txt=200%C3%97200&w=200&h=200"/>	
							</div>
						</a>
						<?php echo wp_trim_words($image_ykkh->post_content,50);?>
						<a class="more-link" href="<?php echo get_permalink($image_ykkh->ID);?>">Đọc thêm...</a>				
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php echo wp_trim_words($text_ykkh->post_content,50);?>
						<a class="more-link" href="<?php echo get_permalink($text_ykkh->ID);?>">Đọc thêm...</a>
					</div>
				</div>
			</div>
			<!-- End: Khách hàng nói về Vitacare -->

			<!-- Lời tâm sự -->
			<div class="sayme">
				<h3 class="title_home">Lời tâm sự</h3>
				<?php
					$args = array(
							'post_type' => 'loi-tam-su',
							'showposts' => 3,
							'orderby' => 'id',
							'order' => 'ASC',
							/*'tax_query' => array(
											'taxonomy' => 'danh-muc-y-kien-khach-hang',
										),*/
							
						);
					query_posts($args);
					if(have_posts()) : while(have_posts()) : the_post(); 
				?>
					<ul class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<li class="sayme_thumbnail col-xs-12 col-sm-12 col-md-2 col-lg-2"><?php the_post_thumbnail();?></li>
						<li class="col-xs-12 col-sm-12 col-md-10 col-lg-10"><?php echo wp_trim_words(get_the_content(),150);?></li>
						<a class="more-link" href="<?php the_permalink();?>">Đọc thêm...</a>
					</ul>
				<?php
						endwhile;
					endif;
				?>
			</div>
			<!-- End: lời tâm sự -->
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
	 <!-- End Main-->


<?php get_footer(); ?>
