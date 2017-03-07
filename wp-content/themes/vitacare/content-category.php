<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
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
