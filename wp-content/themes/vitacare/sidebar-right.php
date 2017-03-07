<?php 
if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	
	
	<?php if(is_user_logged_in()){ ?>
	

	<?php }else{
		if(is_page('checkout-not-register')){
	?>
		<div class="innersidebar" id="porder">
						
							<h3 class="widgettitle"> Giỏ hàng(<a href="<?php bloginfo('url'); ?>/gio-hang">Thay đổi</a>)</h3>
					<?php
					$ship = "6.5";
					if ( isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) > 0 ) {
						$total = 0;
						$qty = 0;

					 	foreach ( $_SESSION['cart'] as $pro_id => $quantity ){ //lặp qua mảng cart session lấy ra id và show thông tin sản phẩm theo id đó
						$product = get_post((int)$pro_id );
						$price = get_post_meta($pro_id,"price",true);
						 ?>
							<ul>
								<li class="imageorder"><?php if ( has_post_thumbnail( $pro_id ) ) echo get_the_post_thumbnail( $pro_id, array( 50, 50 ) ); else echo "<img src='".get_bloginfo('template_url')."/images/no_img.png' style='width:50px;height:50px;' />"; ?></li>
								<li class="titlesorder"><?php echo substr($product->post_title,0,10); ?> x <em><?php echo $quantity; ?></em><span><?php echo '$'.($quantity * $price); ?></span></li>
								<?php $total += $price * $quantity; ?>
								
								
							</ul>
							
						 <?php
						 }
					}?>
						<div class="shiporder">Tiền ship: <span>$<?php echo $ship;?></span></div>
						<?php $total += $ship; ?>
						<div class="totalorder">Tổng tiền: <span><?php echo '$'.$total; ?></span></div>	
					</div>
	<?php
		}
		} ?>
	<?php if(is_page('gio-hang') || is_page('order')){
    	dynamic_sidebar( 'right-sidebar-2' );
  	}else{
    	dynamic_sidebar( 'right-sidebar' );
    	} ?>
<?php endif; ?>