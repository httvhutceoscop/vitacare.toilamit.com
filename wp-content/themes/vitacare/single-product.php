<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
$id_current = get_the_ID();
?>
<div class="main-archive">
	<div class="container">
		<div class="row">
			<div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
				<div class="box-conatainer">
					<?php while (have_posts()) : the_post(); ?>
						<?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
						<div class="product-view col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="product-essential">                            
								<div class="product-img-box col-xs-12 col-sm-12 col-md-5 col-lg-5">
									<div class="thumb_single">
										<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
											<a href="<?php echo $url;?>" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto[product-gallery]"><?php the_post_thumbnail('medium');?></a>
									</div>
									<div class="thumbnails columns-3">
										<?php
										if ($attachment_ids) {
											foreach ($attachment_ids as $attachment) { ?>
												<li class="images-sub col-lg-4 col-md-4 col-sm-4 col-xs-6"><a href="<?php echo wp_get_attachment_url($attachment);?>" class="zoom first" title="" data-rel="prettyPhoto[product-gallery]"><?php echo wp_get_attachment_image($attachment, 'thumb-images');?></a></li>
												<?php	}
											}
											?>
									</div>
								</div>
								<div class="product-shop col-xs-12 col-sm-12 col-md-7 col-lg-7">
										<h1 class="title"><?php the_title(); ?></h1>  
										<div class="star_rating_box col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<?php
												echo do_shortcode( '[star_rating themes="flat" id="'.get_the_ID().'"]' ); 
											?>
										</div>                          
										<div class="social">
											<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
											<g:plusone></g:plusone>
										</div>
										<div class="product-desc">
											<?php if(has_excerpt()){
												echo the_excerpt();
											}
											 ?>
										</div>
										<div class="block-price clearfix">
											<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
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
													<div>Tình trạng kho: <?php
													if(get_post_meta(get_the_ID(),'_stock_status',true) == 'instock'){
														echo "<strong>Còn hàng</strong>";
														}
													if(get_post_meta(get_the_ID(),'_stock_status',true) == 'outofstock'){
														echo "<strong>Hết hàng</strong>";
														}
													if(get_post_meta(get_the_ID(),'_stock_status',true) == 'onrequest'){
														echo "<strong>Hàng Order</strong>";
														}
														?></div>
												<?php
													if(get_post_meta(get_the_ID(),'_stock_status',true) == 'onrequest'){
												?>
													<div class="note_order">Lưu ý: <?php echo get_option('hang_order');?></div>
												<?php 
													}
												?>
												<div class="addcart">
													<div class="soluong">Số lượng: <a href="javascript:void(0);" onclick="giamgiatri();" class="giam-gia-tri">-</a><input type="text" name="txtSoluong" style="width: 50px; text-align: center;line-height:20px;" class="ip-r1 input-text qty text" readonly="readonly" value="1"><a href="javascript:void(0);" onclick="tanggiatri();" class="tang-gia-tri">+</a></div>
													<a id="addtocatbutton" data-link="<?php echo get_the_permalink($post->ID);?>?add-to-cart=<?php echo $post->ID;?>" href="javascript:void(0);" onclick="AddtoCart(<?php echo $post->ID;?>);" class="dathang">Mua ngay</a>
												</div>
											</div>
										<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
											<?php if ( is_active_sidebar( 'image-quatity' ) ) : ?>
								                <?php dynamic_sidebar( 'image-quatity' ); ?>
											<?php endif; ?>
										</div>
									</div>
								</div>                            
							</div>
						</div>
						<div class="product-col-left col-xs-12 cl-sm-12 col-md-12 col-lg-12">
									<div class="product_tab col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="introduction" class="actived tab">Giới thiệu</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="ingredients" class="tab">Thành phần</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="directions" class="tab">Hướng dẫn SD</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="faq" class="tab">Các câu hỏi</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="reviews" class="tab">Đánh giá</a></li>
										<li class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><a href="#tabs" title="moreinfo" class="tab">Các thông tin thêm</a></li>
									</div>
									<div id="introduction" class="content-sp"><?php the_content();?></div>
									<div id="ingredients" class="content-sp"><?php echo apply_filters('the_content',get_post_meta(get_the_ID(),"_thanhphan",true));?></div>
									<div id="directions" class="content-sp"><?php echo apply_filters('the_content',get_post_meta(get_the_ID(),"_huongdansudung",true));?></div>
									<div id="faq" class="content-sp"><?php echo apply_filters('the_content',get_post_meta(get_the_ID(),"_caccauhoi",true));?></div>
									<div id="reviews" class="content-sp"><?php comments_template(); ?></div>
									
									<div id="moreinfo" class="content-sp"><?php echo apply_filters('the_content',get_post_meta(get_the_ID(),"_thongtinthem",true));?></div>
						</div>
							<p class="ghi_chu_sp"><?php echo get_option('option6');?></p>
						<?php endwhile;// end of the loop.          ?>  
						<?php
							$terms = get_the_terms($post->ID, 'product_cat');
							$id_pro_cat = $terms[0]->term_id;
							$args = array(
								'post_type' => 'product',
								'posts_per_page' => 12,
								'post__not_in' => array($id_current),
								'orderby' => rand,
								'tax_query' => array(
									array(
										'taxonomy' => 'product_cat',
										'field' => 'term_id',
										'terms' => $id_pro_cat,
										)
									)
								);
							query_posts($args);
							$count_related = $wp_query->found_posts;
							if($count_related > 0){
							?>
										<div class="product-sidebar  col-xs-12 cl-sm-12 col-md-12 col-lg-12">
											<h2 class="sec-title">Sản phẩm liên quan</h2>
												<?php
													$i=1;
													if(have_posts()) : while(have_posts()) : the_post();
												?>
														<div class="product-cat item col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
														</div><!-- #post -->
												<?php if($i % 4 == 0){?>
													<div class="clear"></div>
												<?php }?>
												<?php $i++;endwhile;endif;wp_reset_query();?>
										</div>
						<?php } ?>
				</div>
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
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bxslider.js"></script>
    <script>
        
        function close(){
            jQuery('#popup').hide('slow');
        }
        jQuery(function(jQuery) {
            jQuery('.bxslider').bxSlider({
                pagerCustom: '#bx-pager'
            });
            $(".bxslider a").lightbox(); 
        });
    </script>
	<script type="text/javascript">
        function tanggiatri() {
            var giatri = $("input[name*='txtSoluong']");
            $(giatri).val((parseInt($(giatri).val()) + 1).toString());
        }

        function giamgiatri() {
            var giatri = $("input[name*='txtSoluong']");
            if (parseInt($(giatri).val()) > 1) {
                $(giatri).val((parseInt($(giatri).val()) - 1).toString());
            }
        }
        function AddtoCart(id) {
            var soluong = $("input[name='txtSoluong']").val();
            //Addcart(soluong);
            window.location.replace('?add-to-cart='+id+'&quantity='+soluong);
        }
    </script>
