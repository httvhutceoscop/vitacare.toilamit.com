<?php
ob_start();
session_start();
 /*
 Template Name: In Page
 */
 $id_order = $_GET['order'];
 ?>
 <?php get_header();?>
 <div class="container">
 	<div class="row">
 		<h3 class="title-tom-tat">Tóm tắt thông tin đặt đơn hàng của bạn (<em>Quý khách đã đặt hàng thành công. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. Xin cảm ơn!</em>)</h3>
 		<div id="columns_left" class="order-box col-xs-12 col-sm-12 col-md-6 col-lg-6">	
 			<div class="box-thong-tin">
	 			<div class="nguoi-mua col-xs-12 col-sm-12 col-md-12 col-lg-12">
	 				<span>Thông tin người mua</span>
	 				<?php
	 					global $wpdb;
	 					$results = $wpdb->get_row("SELECT * FROM xtl_order WHERE id_order = '$id_order' LIMIT 1");
	 					$name = $results->name;
	 					$phone = $results->phone;
	 					$email = $results->email;
	 					$dia_chi = $results->dia_chi;
	 					?>
	 						<p><strong>Họ tên: </strong><?php echo $name;?></p>
	 						<p><strong>Điện thoại: </strong><?php echo $phone;?></p>
	 						<p><strong>Email: </strong><?php echo $email;?></p>
	 						<p><strong>Địa chỉ: </strong><?php echo $dia_chi;?></p>
	 			</div>
	 			<div class="nguoi-nhan col-xs-12 col-sm-12 col-md-12 col-lg-12">
	 				<span>Thông tin người nhận</span>
	 				<?php
	 					global $wpdb;
	 					$results = $wpdb->get_row("SELECT * FROM xtl_order_nn WHERE id_order = '$id_order' LIMIT 1");
	 					$name = $results->ten_nn;
	 					$phone = $results->phone_nn;
	 					$email = $results->email_nn;
	 					$dia_chi = $results->address_nn;
	 					?>
	 						<p><strong>Họ tên: </strong><?php echo $name;?></p>
	 						<p><strong>Điện thoại: </strong><?php echo $phone;?></p>
	 						<p><strong>Email: </strong><?php echo $email;?></p>
	 						<p><strong>Địa chỉ: </strong><?php echo $dia_chi;?></p>
	 			</div>
 			</div>
 		</div>
 		<div id="columns_right" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 			<div id="cart" class="shopcart col-xs-12 col-sm-12 col-md-12 col-lg-12">
 				<ul class="title-cart">
 					<li class="thong-tin-sp col-lg-10 col-md-10 col-sm-10 col-xs-10">Thông tin sản phẩm</li>
 					<li class="gia-sp col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:right;">Giá</li>
 				</ul>
 				<?php
 				global $wpdb;
 				$results_phi = $wpdb->get_row("SELECT * FROM xtl_order WHERE id_order = '$id_order' LIMIT 1");
	 			$results = $wpdb->get_results("SELECT * FROM xtl_order_detail WHERE id_order = '$id_order'");
 				$total = 0;
				 foreach ($results as $key => $value){?>
				 	<ul class="items-pro">
				 		<li class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				 			<strong><?php echo $value->ten_sp; ?></strong>
				 			<p>Giá: <?php echo $value->gia; ?></p>
				 			<p>Số lượng: <?php echo $value->so_luong; ?></p>
				 		</li>
				 		<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;">
				 			<?php echo '$'.($value->so_luong * $value->gia); ?>
				 			<?php $total += $value->so_luong * $value->gia; ?>
				 		</li>		 			
				 	</ul>


				 		<?php
				 	}
				 	?>	
				 	<ul class="tongcong">
				 		<li class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align:right;"><strong>Tổng đơn hàng</strong></li>
				 		<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;"><strong><?php echo '$'.$total; ?></strong></li>
				 		<li class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align:right;"><strong>Phí vận chuyển</strong></li>
				 		<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;"><strong><?php echo '$'.$results_phi->shipping; ?></strong></li>
				 		<li class="tongtt col-xs-10 col-sm-10 col-md-10 col-lg-10" style="text-align:right;"><strong>Tổng thanh toán</strong></li>
				 		<li class="tongtt col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;"><strong><?php
				 		$phi = $results_phi->shipping;
				 		$total_tt = $total + $phi;
				 		 echo '$'.$total_tt; ?></strong></li>
				 	</ul>
			</div>
			<p class="chuyen-tiep col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="/">Về trang chủ</a>
				<a href="<?php bloginfo('url');?>/san-pham-danh-muc">Trang sản phẩm</a>
			</p>
		</div>
		
	</div>
</div>
		<?php session_destroy();?>

		<?php get_footer();?>