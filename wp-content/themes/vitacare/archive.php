<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<a name="top"></a>
<?php
		$category = get_category( get_query_var( 'cat' ) );
		$id_cat = $category->cat_ID;
		/*$id_cat = get_query_var('cat');*/
		//echo $category->slug;
		$parent_cat = $category->parent;
		$cats_str = get_category_parents($id_cat, false, '%#%');
		$cats_array = explode('%#%', $cats_str);
		$cat_depth = sizeof($cats_array)-2;
		?>

	
<div class="container">
		<div class="row">

			<?php if($id_cat != 140){ ?> 
		 		<div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
					    <?php if(function_exists('bcn_display'))
					    {
					        bcn_display();
					    }?>
					</div>
					<div class="overview col-xs-12 col-sm-12 col-md-12 col-lg-12">
						 <?php
						 	if($id_cat != 118){
						 		$cat = get_category( $id_cat );
								$cat_parent = $cat->category_parent; // Print the ID
									$this_category1 = get_categories("&parent=".$cat_parent."&hide_empty=0");
							if($id_cat == 179 || $id_cat == 180 || $id_cat == 181 || $id_cat == 182){}else{
								
							?>
							<div class="shop-search">
								<div class="excerptcontent col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<?php if (category_description()) :?>
										<?php echo category_description(); ?>
									<?php endif; ?>
									
									<div class="form-inline">
										<div class="form-group">
											<label>Liên kết nhanh: </label>
											<select id="chon_danh_muc" class="form-control">
												
												<?php foreach($this_category1 as $term) { ?>
												<option value="<?php echo get_category_link($term->cat_ID);?>"><?php echo $term->name;?></option>
												<?php } ?>
											</select>
										</div>	
									</div>
									
									
								</div>
								<div class="imagethunb hidden-xs col-lg-6">
								<?php if (function_exists('z_taxonomy_image_url')) { ?>
										<img class="img-responsive" src="<?php echo z_taxonomy_image_url($id_cat); ?>"/>
									<?php }else{ } ?>
								</div>
							</div><!-- End.Search-->
						
							<?php } 
							}elseif ($id_cat == 118) { 
								
								$cat = get_category( $id_cat );
								$cat->category_parent; // Print the ID
								$this_category = get_categories("&parent=".$id_cat."&hide_empty=0");
								?>
							<div class="shop-search">
								<div class="excerptcontent col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<?php if (category_description()) :?>
										<?php echo category_description(); ?>
									<?php endif; ?>
									<?php if(count($this_category) > 0) { ?>

									<div class="form-inline">
										<div class="form-group">
											<label>Shop: </label>
											<select id="chon_danh_muc" class="form-control">
												<option value="selected"  selected="selected"><?php echo get_cat_name( $id_cat ) ?></option>
												<?php foreach($this_category as $term) { ?>
												<option value="<?php echo get_category_link($term->cat_ID);?>"><?php echo $term->name;?></option>
												<?php } ?>
											</select>
										</div>	
									</div>
									<?php } ?>
								</div>
								<div class="imagethunb hidden-xs col-lg-6">
								<?php if (function_exists('z_taxonomy_image_url')) { ?>
										<img class="img-responsive" src="<?php echo z_taxonomy_image_url($id_cat); ?>"/>
									<?php }else{ } ?>
								</div>
							</div><!-- End.Search-->
						<?php } ?>
					</div>
						
					<!-- Phan noi dung hien thi can ban cua danh muc -->
						
							<?php
							if($id_cat == 1 || $id_cat == 117 || $id_cat == 118){
								if($id_cat == 1){?>
									<div class="left_cat col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div id="cat-content">
									<?php
										$args = array(
										 	'post_type' => 'post',
										 	'post_status'      => 'publish',
										 	'posts_per_page' => 1,
										 	'offset' => 0,
										 	'orderby' => 'DESC',
										 	'meta_query' => array(
										 						array(
										 							'key' => 'style_product',
										 							'value' => 1,
										 							),
										 						array(
										 							'key' => 'bai_viet_danh_muc_trai',
										 							'value' => 1,
																	),
										 						array(
										 							'key' => 'hien_thi_danh_muc_goc',
										 							'value' => 1,
										 							),
										 					),
										 	'cat' => $id_cat,
										 	);
									query_posts($args);
									if (have_posts()) : while (have_posts()) : the_post();?>
									
									<h3 class="title-dm-left"><?php the_title();?></h3>
									
									<?php

										the_content();
										
										endwhile;
										endif;
										wp_reset_query();?>

										</div>
										<div class="view-more-cat cat-id-1-117-118">Xem đầy đủ nội dung</div>	
									</div>
									

								<?php
								}
								if($id_cat == 117){?>
								<div class="left_cat col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div id="cat-content">
								<?php
									$args = array(
										 	'post_type' => 'post',
										 	'cat' => $id_cat,
										 	'posts_per_page' => 1,
										 	'orderby' => 'DESC',
										 	'meta_query' => array(
										 						array(
										 							'key' => 'style_product',
										 							'value' => 1,
										 							),
										 						array(
										 							'key' => 'bai_viet_danh_muc_trai',
										 							'value' => 1,
																	),
										 					),
										 		);
									query_posts($args);
									if (have_posts()) : while (have_posts()) : the_post();?>
									<h3 class="title-dm-left"><?php the_title();?></h3>
									<?php the_content();
										endwhile;
										endif;
										wp_reset_query();?>

									</div>
									<div class="view-more-cat cat-id-117">Xem đầy đủ nội dung</div>
								</div>
								
								<?php
								}									
							}

							else {
								$args2 = array(
										 	'post_type' => 'post',
										 	'cat' => $id_cat,
										 	'posts_per_page' => 1,
										 	'orderby' => 'DESC',
										 	'meta_query' => array(
										 						array(
										 							'key' => 'style_product',
										 							'value' => 1,
										 							),
										 						
										 					),
										 		);
								$the_query = new WP_query($args2);
								$count_posts_0 = $the_query->found_posts;
								if($count_posts_0 == 1)
								{ 
									$args = array(
										 	'post_type' => 'post',
										 	'cat' => $id_cat,
										 	'posts_per_page' => 1,
										 	'orderby' => 'DESC',
										 	'meta_query' => array(
										 						array(
										 							'key' => 'style_product',
										 							'value' => 1,
										 							),
										 						array(
										 							'key' => 'bai_viet_danh_muc_phai',
										 							'value' => 1,
																	),
										 					),
										 		);
									query_posts($args);
									?>
									<div class="left_cat col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div id="cat-content">
										<?php
										if (have_posts()) : while (have_posts()) : the_post(); ?>
										<h3 class="title-dm-left"><?php the_title();?></h3>
										<?php
											the_content();
										endwhile;
										endif;
										wp_reset_query();?>

										</div>
										<div class="view-more-cat count_posts_0-1">Xem đầy đủ nội dung</div>
									</div>
									
									<?php
								} 

								else {
									$args = array(
										 	'post_type' => 'post',
										 	'cat' => $id_cat,
										 	'posts_per_page' => -1,
										 	'orderby' => 'DESC',
										 	'meta_query' => array(
										 						array(
										 							'key' => 'style_product',
										 							'value' => 1,
										 							),
										 						array(
										 							'key' => 'bai_viet_danh_muc_trai',
										 							'value' => 1,
																	),
										 					),
										 		);
									query_posts($args);
									
									?>
									<div class="left_cat col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<div id="cat-content">
										<?php
										if (have_posts()) : while (have_posts()) : the_post();
											$categories = get_the_category($post->ID);
											$cat_id = $categories[0]-> term_id; 
											if($cat_id == $id_cat)
											{
											?>
												<h3 class="title-dm-left"><?php the_title();?></h3>
											<?php
												the_content();
											}
										endwhile;
										endif;
										wp_reset_query();?>
										</div>
										<div class="view-more-cat count_posts_0">Xem đầy đủ nội dung</div>
									</div>
									
									<?php
								}
							}
							?>
						
						<div class="right_cat col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?php
								$args3 = array(
									'post_type' => 'post',
									'cat' => $id_cat,
									'posts_per_page' => 1,
									'orderby' => 'DESC',
									'meta_query' => array(
										array(
											'key' => 'style_product',
											'value' => 1,
											),
										array(
											'key' => 'bai_viet_danh_muc_phai',
											'value' => 1,
											),
										),
									);
								$the_query_3 = new WP_query($args3);
								$count_posts_3 = $the_query_3->found_posts;
								if($count_posts_3 == 0)
								{}else{
									if($id_cat == 1){
										$args = array(
											'post_type' => 'post',
											'cat' => $id_cat,
											'posts_per_page' => 1,
											'orderby' => 'DESC',
											'meta_query' => array(
												array(
													'key' => 'style_product',
													'value' => 1,
													),
												array(
													'key' => 'bai_viet_danh_muc_trai',
													'value' => 1,
													),
												array(
													'key' => 'hien_thi_danh_muc_goc',
													'value' => 1,
													),
												),
											);
										query_posts($args);			
									}else{
										$args = array(
										'post_type' => 'post',
										'cat' => $id_cat,
										'posts_per_page' => 1,
										'orderby' => 'DESC',
										'meta_query' => array(
											array(
												'key' => 'style_product',
												'value' => 1,
												),
											array(
												'key' => 'bai_viet_danh_muc_trai',
												'value' => 1,
												),
											),
										);
										query_posts($args);
									}
									if (have_posts()) : while (have_posts()) : the_post();?>
										<h3 class="title-dm-right">Giải thích: <?php the_title();?></h3>
									<?php
									endwhile;
									endif;
									wp_reset_query();
								}
							?>

							<?php
							if($id_cat == 1 || $id_cat == 117 || $id_cat == 118){
								if($id_cat == 1){
									$this_category = get_categories("&parent=".$id_cat."&hide_empty=0&orderby=id&order=ASC"); 
									foreach($this_category as $term) { ?>
									<div class="title_category">
										<?php
										$args = array(
											'post_type' => 'post',
											'cat' => $term->cat_ID,
											'orderby' => 'DESC',
											'posts_per_page' => 1,
											'meta_query' => array(
												array(
													'key' => 'style_product',
													'value' => 1,
													),
												array(
													'key' => 'bai_viet_danh_muc_trai',
													'value' => 1,
													),
												),
											);
										query_posts($args);
										$count_posts_1 = $wp_query->found_posts;
										if($count_posts_1 > 0){?>
											<a href="<?php echo get_category_link($term->cat_ID); ?>"><h3 title="title-<?php  echo $term->cat_ID;?>" class="step"><?php echo $term->name;?></h3></a>
											<?php
											if(have_posts()) : while(have_posts()) : the_post();
											?>
											<div id="title-<?php echo $term->cat_ID;?>" class="content-step">
												<p>
													<?php echo wp_trim_words(get_the_content(),100);?>
												</p>
												<a class="morelink" href="<?php echo get_category_link($term->cat_ID); ?>">Xem thêm ...</a>
											</div>
											<?php
											endwhile;
											endif;
											wp_reset_query();
										}
										?>
									</div>
									<?php }
								}
								if($id_cat == 117){
									$this_category = get_categories("&parent=".$id_cat."&hide_empty=0&orderby=id&order=DESC"); 
									foreach($this_category as $term) { ?>
									<div class="title_category">
										<a href="<?php echo get_category_link($term->cat_ID); ?>"><h3 class="step"><?php echo $term->name;?></h3></a>
									</div>
									<?php
									}
								}
							}else{//
								$this_category_2 = get_categories("&parent=".$id_cat."&hide_empty=0&orderby=id&order=ASC");
								$sub_cat = count($this_category_2);
								if($sub_cat == 0){
									$args5 = array(
										'post_type' => 'post',
										'cat' => $id_cat,
										'orderby' => 'DESC',
										'meta_query' => array(
											array(
												'key' => 'style_product',
												'value' => 1,
												),
											),
										);
									$the_query_5 = new WP_query($args5);
									$count_posts_5 = $the_query_5->found_posts;
									if($count_posts_5 >=2){
										$args6 = array(
											'post_type' => 'post',
											'cat' => $id_cat,
											'orderby' => 'DESC',
											'meta_query' => array(
												array(
													'key' => 'style_product',
													'value' => 1,
													),
												array(
													'key' => 'bai_viet_danh_muc_phai',
													'value' => 1,
													),
												),
											);
										query_posts($args6);
										if(have_posts()) : while(have_posts()) : the_post();
										?>
										<div class="title_category">
											<a href="<?php the_permalink();?>"><h3 title="title-<?php  the_ID();?>" class="step"><?php the_title();?></h3></a>

											<div id="title-<?php the_ID();?>" class="content-step">
												<p>
													<?php echo wp_trim_words(get_the_content(),100);?>
												</p>
												<a class="morelink" href="<?php the_permalink();?>">Xem thêm ...</a>
											</div>
										</div>
										<?php
										endwhile;
										endif;
										wp_reset_query();
									}
								}else{
									foreach($this_category_2 as $term) { ?>
									<div class="title_category">
										<?php
										$args = array(
											'post_type' => 'post',
											'cat' => $term->cat_ID,
											'orderby' => 'DESC',
											'posts_per_page' => 1,
											'meta_query' => array(
												array(
													'key' => 'style_product',
													'value' => 1,
													),
												array(
													'key' => 'bai_viet_danh_muc_phai',
													'value' => 1,
													),
												),
											);
										query_posts($args);
										$count_posts = $wp_query->found_posts;
										if($count_posts > 0){?>
											<a href="<?php echo get_category_link($term->cat_ID); ?>"><h3 title="title-<?php  echo $term->cat_ID;?>" class="step"><?php echo $term->name;?></h3></a>
										<?php
											if(have_posts()) : while(have_posts()) : the_post();
											?>
											<div id="title-<?php echo $term->cat_ID;?>" class="content-step">
												<p>
													<?php echo wp_trim_words(get_the_content(),100);?>
												</p>
												<a class="morelink" href="<?php echo get_category_link($term->cat_ID); ?>">Xem thêm ...</a>
											</div>
											<?php
											endwhile;
											endif;
											wp_reset_query();
										}
										?>
									</div>
									<?php }
								}
							}
									
							?>
							<?php
								if($id_cat == 144){
									$args = array(
										'post_type' => 'page',
										/*'showposts' => -1,*/
										'meta_query' => array(
											array(
												'key' => 'bai_viet_danh_muc_phai',
												'value' => 1,
												),
											),

										);
									query_posts($args);

									$countpost = $wp_query->found_posts;


									/*$countpost = $wp_query->found_posts;*/

									if (have_posts()) : while (have_posts()) : the_post();
									?>
									<div class="title_category">
										<h3 title="title-<?php  the_ID();?>" class="step"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

										<div id="title-<?php the_ID();?>" class="content-step">
											<p>
												<?php echo wp_trim_words(get_the_content(),100);?>
											</p>
											<a class="morelink" href="<?php the_permalink();?>">Xem thêm ...</a>
										</div>
									</div>
									<?php
									endwhile;
									endif;
									wp_reset_query();
								}
							?>
						</div>
					<!-- Ket thuc phan hien thi can ban cua danh muc -->				
					<div class="posts_by_cat">
						<div class="row box-product-expand">
						
						<?php
						$args = array(
								'post_type' => 'post',
								/*'showposts' => -1,*/
								'cat' => $id_cat,
								'meta_query' => array(
											array(
													'key' => 'style_product',
													'value' => 1,
												),
											
									),
								
							);
						
						query_posts($args);
						$countpost = $wp_query->found_posts;
						if($countpost > 0){
							?>
							<h3 class="title_related">Các bài viết liên quan</h3>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<div class="posts-cat col-xs-12 col-sm-6 col-md-4 col-lg-4">
									<ul>
										<a href="<?php the_permalink();?>"><li class="posts-cat-image col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php if(has_post_thumbnail()){ the_post_thumbnail(); }else{ ?> <img src="<?php bloginfo('template_directory'); ?>/images/default-image.jpg" alt="<?php the_title(); ?>" /> <?php } ?></li></a>
										<a href="<?php the_permalink();?>"><li class="posts-cat-title col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php the_title();?></li></a>
										<li class="posts-cat-excerpt col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php echo wp_trim_words(get_the_content(),15);?></li>
									</ul>
								</div>
							<?php endwhile; ?>
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; 
								wp_reset_query();
						}?>
						</div>
					</div>
					<div class="box-product">
						<?php 
							if($id_cat != 1){
						?>
						<div class="row box-product-expand">
							<?php
								$args = array(
										'post_type' => 'post',
										'cat' => $id_cat,
										'meta_query' => array(
													array(
															'key' => 'style_product',
															'value' => 2,
														),
													array(
															'key' => 'hien_thi',
															'value' => 1,
														),

											),
										
									);
								query_posts($args);
								$countpost = $wp_query->found_posts;
								if($countpost > 0){
							?>
								<h3 class="title_related">Các sản phẩm liên quan</h3>
								<?php if ( have_posts() ) : ?>
								<?php /* The loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content', 'category'); ?>
								<?php endwhile; ?>
								<?php else : ?>
									<?php get_template_part( 'content', 'none' ); ?>
								<?php endif; 
									wp_reset_query();
								?>
								<?php } ?>
						</div>
						<?php 
							}elseif ($id_cat == 1) { ?>
					
						<?php
							}
						?>
					</div>
					
				</div>
			<?php }else{ ?>
			<!-- Phan hien thi danh muc cau hoi -->
				<div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				 	<div class="left_wallpage">
						<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						    <?php if(function_exists('bcn_display'))
						    {
						        bcn_display();
						    }?>
						</div>
						<div class="overviews col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php 
								$args = array(
										'post_type' => 'post',
										'showposts' => -1,
										'cat' => $id_cat,
										'orderby' => 'post_date',
										'order' => ASC,
									);
								query_posts($args);
							?>
							<ul class="question">
								<li class="question_left col-xs-12 col-ms-12 col-md-12 col-lg-12"><h3>Dẫn nhập: </h3></li>
								<li class="question_right col-xs-12 col-ms-12 col-md-12 col-lg-12">
								<?php if( have_posts()) : while ( have_posts()) : the_post(); ?>
										<p class="col-xs-12 col-ms-12 col-md-6 col-lg-6"><a href="#<?php echo $post->post_name;?>"><?php the_title();?></a></p>
								<?php 
										endwhile;
									endif;?>
								</li>
							</ul>
							<div class="anser_question_content">
								<ul>
									<li class="anser_question col-xs-12 col-ms-12 col-md-12 col-lg-12">
									<?php if( have_posts()) : while ( have_posts()) : the_post(); ?>
											<h3><a name="<?php echo $post->post_name;?>"><?php the_title();?></a></h3>
											<span class="anser_content"><?php echo wp_trim_words(get_the_content(),300);?></span>
											<div class="back-to-top"><a href="#top">Back top top</a><a class="morelink" href="<?php the_permalink();?>">Xem thêm ...</a></div>
									<?php 
											endwhile;
										endif;
										wp_reset_query();
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<!-- Ket thuc phan hien thi danh muc cau hoi -->
				<?php } ?>
		
			<div id="columns_right" class="col-sm-3 hidden-xs">
				<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	                <?php dynamic_sidebar( 'right-sidebar' ); ?>
				<?php endif; ?>
			</div>
		</div>
</div>


<!-- VietNT - check height of left_cat, if it's larger than 500, we will show the text "view more cat" -->
<script type="text/javascript">
	$(document).ready(function(){
		var cat_content = $('#cat-content');
		var content = cat_content.html();
		var h = cat_content.height();
		var view_more_cat = $('.view-more-cat');
		if (h < 500) {
			view_more_cat.hide();
		} else {
			cat_content.height('500px');
			view_more_cat.click(function(e){
				cat_content.height('auto');
				view_more_cat.hide();
			});
		}


		// Fix position of overview
	    var overview = $('.overview');
		var offset = $(".overview").offset();

	    $(window).scroll(function() {
	        /*if ($(window).scrollTop() > offset.top) {

	            overview.css({
	            	'position':'fixed',
	            	'top': '72px',
	            });
	        } else {
				overview.css({
	            	'position':'relative',
	            	'top':0,
	            });            
	        };*/
	    });
	});
</script>

<style type="text/css">
	#cat-content {
		/*height: 500px;*/
		overflow: hidden;
		transition: all 0.5s;
	}
	.view-more-cat {
		/*display: none;*/
		margin: 10px 0;
	    text-align: right;
	    text-decoration: underline;
	    color: #b14b00;
	    cursor: pointer;
	}
</style>


<?php get_footer(); ?>
