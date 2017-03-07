<?php
ob_start();
session_start();
 /*
 Template Name: Cart
 */
?>
<?php global $theme; get_header(); ?>

   <div class="container">
        <div id="columns_left" class="box-cart col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <h2>ĐƠN HÀNG CỦA BẠN</h2>
<?php
 global $product_prefix;
 $action = get_query_var('action'); //thêm|xóa
 $pro_id = get_query_var('pro_id'); //id sản phẩm
 if($action){ //nếu có thao tác (thêm hoặc xóa)
  switch($action){
   case 'them':
    if (isset( $_SESSION['cart'][$pro_id])) //nếu đã có thì cập nhật số lượng thêm 1
     $quantity = $_SESSION['cart'][$pro_id] + 1;
    else
     $quantity = 1; //ngược lại tạo 1 item mới với số lượng là 1
    $_SESSION['cart'][$pro_id] = $quantity; //cập nhật lại
    wp_redirect(get_bloginfo('url').'/gio-hang'); exit(); //trả về trang hiển thị giỏ hàng
    break;
   case 'xoa':
    if(isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) > 0 ){ //kiểm tra và xóa sản phẩm dựa vào id
     unset($_SESSION['cart'][$pro_id]);
     wp_redirect(get_bloginfo('url').'/gio-hang'); exit();
    }
    else{
     unset($_SESSION['cart']);
     echo "<h3>Hiện chưa có sản phẩm nào trong giỏ hàng! <a href='".get_bloginfo('url')."'>Bấm vào đây</a> để xem và mua hàng.</h3>";
    }
   break;
 }
 }else{ //không có thao tác thêm hoặc xóa thì sẽ hiển thị sản phẩm trong giỏ hàng
 ?>
 <?php
 if ( isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) > 0 ) { //kiểm tra số lượng sản phẩm trước khi hiển thị
	 ?>
		<form action="" method="post">
			<div id="cart" class="shopcart col-xs-12 col-sm-12 col-md-7 col-lg-7">
				<ul class="title-cart">
					<li class="thong-tin-sp col-lg-10 col-md-10 col-sm-10 col-xs-10">Thông tin sản phẩm</li>
					<li class="gia-sp col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:right;">Giá</li>
				</ul>
				<?php
				$total = 0;
				 foreach ( $_SESSION['cart'] as $pro_id => $quantity ){ //lặp qua mảng cart session lấy ra id và show thông tin sản phẩm theo id đó
				 	$product = get_post((int)$pro_id );
				 	$price = get_post_meta($pro_id,"gia",true);
			 	?>
			 	<ul class="items-pro">
			 		<li class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			 			<?php if ( has_post_thumbnail( $pro_id ) ) echo get_the_post_thumbnail( $pro_id, array( 80, 100 ) ); else echo "<img src='".get_bloginfo('template_url')."/images/no_img.png' style='width:50px;height:50px;' />"; ?>
			 			<strong><?php echo $product->post_title; ?></strong>
			 			<p>Giá: <?php echo '$'.$price; ?></p>
			 			<p>Số lượng: <input type="text" value="<?php echo $quantity; ?>" name="quantity[<?php echo $pro_id; ?>]" size="2"/></p>
			 			<p><a href="<?php echo get_bloginfo( 'url' ) . '/gio-hang/xoa/' . $pro_id; //link xóa sản phẩm trong giỏ ?>">Xóa</a></p>
			 		</li>
			 			<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;">
			 				<?php echo '$'.($quantity * $price); ?>
				 			<?php $total += $price * $quantity; ?>
						</li>		 			
				</ul>
			 	

		 		<?php
			 	}
			 	?>	
			 	<ul>
			 		<li class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align:right;"><strong>Tổng đơn hàng</strong></li>
			 		<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;"><strong><?php echo '$'.$total; ?></strong></li>
			 	</ul>
			 	<ul class="cat-nut">
			 		<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="submit" name="cart_update" value="Cập nhật giỏ hàng" style="border: 1px solid olive; cursor: pointer;"
			 			title="Cập nhật"/>
			 			<a title="Đặt hàng" class="btn checkout" href="<?php echo get_bloginfo( 'url' );?>/order/">Thanh toán</a>
			 			<a title="Mua tiếp" class="btn checkout" href="<?php echo get_bloginfo( 'url' ); ?>">Tiếp tục mua sản phẩm</a>
			 		</li>

			 	</ul>
		 	</div>
		 	<div class="cart-right col-lg-5 col-md-5 col-sm-12 col-xs-12">
		 		<ul>
		 			<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><p>Vận chuyển: Đơn hàng trên 50 USD sẽ được miễn phí vận chuyển.<?php if($total < 50){;?> Hiện tại đơn hàng của bạn còn thiếu <strong>$<?php echo $conlai =( 50 - $total);?></strong> nữa thì đơn hàng của bạn sẽ được miễn phí vẫn chuyển.<?php }else{ ?> Đơn hàng của bạn được miễn phí vẫn chuyển.<?php } ?></p></li>
		 			<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Giảm giá <br><span class="discount">Vitacare Club: Nếu bạn là thành viên, bạn sẽ được giảm giá đơn hàng khi thanh toán. Nếu bạn chưa phải là thành viên, bạn có thể <strong><a href="/register">đăng ký thành viên</a></strong> ở cuối phần đặt đơn hàng.</span></li>
		 		</ul>
		 		<div class="tong-don col-xs-12 col-sm-12 col-md-12 col-lg-12">
		 			<ul>
		 				<li class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="text-align:left;">
		 					TỔNG ĐƠN HÀNG
		 				</li>
		 				<li class="col-lg-4 col-md-4 col-xs-4 col-sm-4"style="text-align:right;">
		 					$<?php echo $total; ?>
		 				</li>
		 				<p>Miễn phí vận chuyển trong nội thành Hà Nội</p>
		 			</ul>
		 		</div>
		 		
		 	</div>
		</form>

 <?php
 } else {
	echo "<h5>Hiện chưa có sản phẩm nào trong giỏ hàng! <a href='" . get_bloginfo( 'url' ) . "'>Bấm vào đây</a> để xem và mua hàng.</h5>";
 }
 ?>
 <?php
 if(isset($_POST['cart_update'])){ //xử lý cập nhật giỏ hàng
	  if(isset($_POST['quantity'])){
		   if(count($_SESSION['cart']) == 0) unset($_SESSION['cart']); //nếu không còn sản phẩm trong giỏ thì xóa giỏ hàng
			   foreach($_POST['quantity'] as $pro_id => $quantity){ //lặp mảng số lượng mới và cập nhật mới cho giỏ hàng
				 if($quantity == 0) unset($_SESSION['cart'][$pro_id]);
				 else $_SESSION['cart'][$pro_id] = $quantity;
			   }
		   wp_redirect(get_bloginfo( 'url' ).'/gio-hang'); //cập nhật xong trả về trang hiển thị sản phẩm trong giỏ
	  }
 }
 }
 ?>
 <div class="box-category">
	<div id="box-category-left" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<?php if ( is_active_sidebar( 'sidebar-category-1' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-category-1' ); ?>
		<?php endif; ?>
	</div>
	<div id="box-category-right" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<?php if ( is_active_sidebar( 'sidebar-category-2' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-category-2' ); ?>
		<?php endif; ?>
	</div>
 </div>
 	</div>
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php get_sidebar('right'); ?>
		</div>
 </div><!-- #content -->

        

<?php get_footer(); ?>