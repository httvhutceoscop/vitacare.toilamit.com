<?php

get_header(); 

?>

	
<div class="container">
	<div class="row">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			<?php if(function_exists('bcn_display'))
				{
					bcn_display();
			}?>
		</div>
		<div class="box-x">
			 <div id="columns_left" class="box-single col-xs-12 col-sm-12 col-md-9 col-lg-9">
			 
				<?php 
				$hien_thi = get_field('style_product');
				if($hien_thi == 2){
					?>
				  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="products">
							<div class="img-thumb col-xs-12 col-sm-12 col-md-5 col-lg-5">
								<a class="img" href="<?php echo $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));?>" rel="prettyPhoto">
											<?php if(has_post_thumbnail()) the_post_thumbnail(array(350,250),array("id" => "sang"));?>
								</a>
							</div>
							<div class="info-pro col-xs-12 col-sm-12 col-md-7 col-lg-7">
								<h1 class="title col-xs-10 col-sm-10 col-md-10 col-lg-10"><?php the_title(); ?></h1>

								<span class="instock col-xs-2 col-sm-2 col-md-2 col-lg-2">
								<?php
									if(get_field('trang_thai_kho') == 1){
										echo "Còn hàng";
									}elseif(get_field('trang_thai_kho') == 0){
										echo "Hết hàng";
									}else{
										echo "Đặt hàng";
									}
								?>
								</span>
								<div class="star_rating_box col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<?php
									echo do_shortcode( '[star_rating themes="flat" id="'.get_the_ID().'"]' ); 
								?>
								</div>
								<?php echo wpfai_social(); ?> 
								<div class="description">
									<?php the_excerpt();?>
								</div>
								<div class="price-box">
									<div class="prod-price col-xs-12 col-sm-12 col-md-9 col-lg-9">
										<li><span>Size:</span><p><?php echo get_field('size');?></p></li>
										<li><span>Price(USD):</span><p class="price"><strong>$<?php echo get_field('price');?></strong></p>
										<a href="<?php bloginfo('url'); ?>/gio-hang/them/<?php echo get_the_ID(); ?>" class="add_to_cart btn btn-warning">Buy Now</a>
										</li>
										<li><span>Member Price(USD):</span><p><strong>$<?php echo get_field('member_price');?></strong></p></li>
									</div>
									<div class="money-back col-xs-12 col-sm-12 col-md-3 col-lg-3">
										<img src="http://www.xtend-life.com/Content/Public/images/satisfaction-guarantee.png"/>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="product_tab col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="introduction" class="actived tab">Giới thiệu</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="ingredients" class="tab">Thành phần</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="faq" class="tab">Các câu hỏi</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="reviews" class="tab">Đánh giá</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="directions" class="tab">Hướng dẫn sử dụng</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="moreinfo" class="tab">Các thông tin thêm</a></li>
									</div>
									<div id="introduction" class="content-sp"><?php the_content();?></div>
									<div id="ingredients" class="content-sp"><?php echo get_field('ingredients');?></div>
									<div id="faq" class="content-sp"><?php echo get_field('faq');?></div>
									<div id="reviews" class="content-sp"><?php comments_template(); ?></div>
									<div id="directions" class="content-sp"><?php echo get_field('directions');?></div>
									<div id="moreinfo" class="content-sp"><?php echo get_field('more_info');?></div>
							</div>
							<p class="ghi_chu_sp">Sản phẩm không phải là thuốc và không có tác dụng chữa bệnh.</p>
						</div>
					<?php endwhile; endif;wp_reset_query();?>
					<div class="chung_thuc col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h3>Chứng thực của khách hàng</h3>
					</div>
					<?php
						$args = array(
									'post_type' => 'tuyen-bo-san-pham',
									'orderby' => 'id',
									'order' => 'ASC',
									'tax_query' => array(
													'taxonomy' => 'danh-muc-tuyen-bo-san-pham',
												),
								);
						query_posts($args);
					?>	
					<div class="tuyen_bo_sp col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h3>Tuyên bố sản phẩm</h3>
						<?php if(have_posts()) : while(have_posts()) : the_post();?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
								<span class="tbsp_excerpt"><?php echo wp_trim_words(get_the_content(),100);?></span>
							</div>
						<?php endwhile;endif;wp_reset_query();?>
					</div>
					<div class="product-related col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h3>Sản phẩm liên quan</h3>
					<?php 
						$categories = get_the_category( $post->ID );
						$id = $categories[0]->cat_ID;
						$args = array(
									'post_type' => 'post',
									'meta_query' => array(
															array(
																	'key' => 'style_product',
																	'value' => '2',
																),
													),
									'cat' => $id,
								);
						query_posts($args);
						if(have_posts()) : while(have_posts()) : the_post();
					?>
						<div class="product-cat item col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<li class="title_products col-xs-12 col-sm-12 col-md-12 col-lg-12"><a class="link" href="<?php echo the_permalink();?>"><?php echo the_title();?></a></li>
							<ul class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
								<li class="image_thumb"><a class="link" href="<?php echo the_permalink();?>"><?php echo the_post_thumbnail(array(350,250));?></a></li>
							</ul>
							<ul class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
								<li class="desc"><?php echo get_field('description');?></li>
								<li class="price">$<?php echo get_field('price');?></li>
								<li class="addtocart"><a href="<?php bloginfo('url'); ?>/gio-hang/them/<?php echo get_the_ID(); ?>" class="add_to_cart btn btn-warning">Buy Now</a></li>
							</ul>
						</div><!-- #post -->
						<?php endwhile;endif;wp_reset_query();?>
					</div>
					
				<?php }else{ ?>
					<?php  if (have_posts()) : while (have_posts()) : the_post();?>
						<li><h1><?php the_title();?></h1></li>
						<div class="social">
                                            <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                                            <g:plusone></g:plusone>
                                        </div>
						<li class="info_news_post"><span>Đăng bởi: <?php the_author();?></span><span>Ngày đăng: <?php the_date(); ?></span></li>
						<li class="content-news-post"><?php the_content();?></li>
					<?php
					endwhile;endif;wp_reset_query();
					?>
					<?php echo comments_template(); ?>
				<?php } ?>

			</div>
			
			
			<div id="columns_right" class="col-sm-3 hidden-xs">
				<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	                <?php dynamic_sidebar( 'right-sidebar' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php 
	/*global $wpdb;
	$id = $post->ID;
	$results = $wpdb->get_results("SELECT * FROM xtl_product_viewed where posts_id = $id");
	if(count($results) >= 1){
		exit();
	}else{
		$post = get_post_meta($post->ID,'style_product');
		foreach ($post as $key => $value) {
			if($value == 2){
				$wpdb->query("INSERT INTO xtl_product_viewed value('','$id')");
			}else{	
				exit();
			}
		}
	}
	*/
?>
<?php get_footer(); ?>