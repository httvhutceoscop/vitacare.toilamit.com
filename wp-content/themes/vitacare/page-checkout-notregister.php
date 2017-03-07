<?php 
ob_start();
session_start();
/*
Template Name: Checkout Not Regiter
*/
?>
<?php get_header(); ?>
	<div class="container">
		
		 	<div id="columns_left" class="box-single col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<div class="order">
				<form action="" method="post" accept-charset="utf-8">
					<h3>Thanh toán</h3>
					<div class="accountdetail">
						<h4 class="titleorder">1. Thông tin người mua hàng</h4>
						<li><span class="labelleft">Họ tên : </span><input type="text"  name="hoten" value="<?php echo $_POST['hoten'];?>" size="50" placeholder="Nhập họ tên"></li>
						<li><span class="labelleft">Email:  </span><input type="text"  name="email" value="<?php echo $_POST['email'];?>" size="50" placeholder="Nhập email"></li>
						<li><span class="labelleft">Số điện thoại:  </span><input type="text"  name="phone" value="<?php echo $_POST['phone'];?>" size="50" placeholder="Nhập số điện thoại"></li>
					</div>
					<div class="shipping">
						<h4 class="titleorder">2. Thông tin chuyển hàng</h4>
						<div class="contentshipping">
							<span class="labelleft">Địa chỉ nhận hàng: </span><input type="text" name="shipping" value="<?php echo $_POST['shipping'];?>" size="50" placeholder="Hãy nhập địa chỉ nhận hàng">
						</div>
					</div>
					<div class="payment">
						<h4 class="titleorder">3. Thanh toán</h4>
						<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="radio" name="group1" id="payments" class="disablebox" value="1"> Chuyển khoản</li>
						<li class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><input type="radio" name="group1" id="orderpayment" class="disablebox2" value="2"> Giao hàng thu tiền</li>
						<!-- <li>Thanh toán trực tuyến <input type="radio" name="group1" id="onlinepayment" class="disablebox3" value="3"></li> -->
					</div>
					<div class="list_product_cart">
						<h4 class="titleorder">4. Danh sách sản phẩm trong đơn hàng</h4>
						<?php
							 if ( isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) > 0 ) { //kiểm tra số lượng sản phẩm trước khi hiển thị
								 ?>
									<form action="" method="post">
										<div id="cart" class="shopcart col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<ul>
												 <li class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="text-align:left;">Tên sản phẩm</li>
												 <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;">Giá</li>
												 <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;">Số lượng</li>
												 <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align:right;">Tổng giá</li>
											</ul>
									 <?php
									 $total = 0;
									 foreach ( $_SESSION['cart'] as $pro_id => $quantity ){ //lặp qua mảng cart session lấy ra id và show thông tin sản phẩm theo id đó
										$product = get_post((int)$pro_id );
										$price = get_post_meta($pro_id,"price",true);
										$ship = "6.5";
										 ?>
											<ul>
												<li class="col-xs-5 col-sm-5 col-md-5 col-lg-5"><strong><?php echo $product->post_title; ?></strong></li>
												<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;"><?php echo '$'.$price; ?></li>
												<li class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="text-align:right;"><?php echo $quantity; ?></li>
												<li class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align:right;"><?php echo '$'.($quantity * $price); ?></li>
												<?php $total += $price * $quantity; ?>
											</ul>
											
										 <?php
										 }
										 ?>	
										 <?php if($total >= 50){ }else{ $total += $ship;}?>
								
											 <ul>
												 <li class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="text-align:right;"><strong>Tổng</strong></li>
												 
												 <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align:right;"><strong><?php echo '$'.$total; ?></strong></li>
												 
											 </ul>
											 
										</div>
									
							 <?php
							 } else {
								echo "<h5>Hiện chưa có sản phẩm nào trong giỏ hàng! <a href='" . get_bloginfo( 'url' ) . "'>Bấm vào đây</a> để xem và mua hàng.</h5>";
							 }
							 ?>
					</div>
					<div class="submits">
						<input type="submit" name="dathang" id="dathang" value="Đặt hàng" />

					</div>
				</form>
					
				</div>
			</div>
			<div id="columns_right" class="col-sm-3 hidden-xs">
				<?php get_sidebar('right'); ?>
			</div>
		
	</div><!-- .content -->


<?php get_footer(); ?>
<?php 
						global $wpdb;
						if(isset($_POST['dathang'])){ 
							if(isset($_POST['group1'])){
								$ship = "6.5";
								if ( isset( $_SESSION['cart'] ) && count( $_SESSION['cart'] ) > 0 ) {
									$total = 0;
									$qty = 0;
									/*$current_user = wp_get_current_user();*/
									$payment_post = $_POST['group1'];
									$shipping = $_POST['shipping'];
									$user_id = 0;
									$name = $_POST['hoten'];
									$email = $_POST['email'];
									$phone = $_POST['phone'];
									$create_date = time();
									$create_order = time();
									$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
									if(!preg_match($regex, $email)){ 
										?>
											<script type="text/javascript" language="javascript">
												alert("Email không hợp lệ!");							
											</script>
										<?php
									}else{
										if($name == "" || $phone == "" || $email == "" || $shipping == "" || $payment_post == ""){
										?>
											<script type="text/javascript" language="javascript">
												alert("Bạn hãy điên đầy đủ thông tin!");
											</script>
										<?php
										}else{
											$wpdb->query("INSERT INTO xtl_order values('','$user_id','$name','$phone','$shipping','$email','$payment_post','$ship','$create_date','0')");
											$results = $wpdb->get_row("SELECT * FROM xtl_order WHERE email = '$email' Order By id_order DESC LIMIT 1");
											$id_order = $results->id_order;
										 	foreach ( $_SESSION['cart'] as $pro_id => $quantity ){ //lặp qua mảng cart session lấy ra id và show thông tin sản phẩm theo id đó
												$product = get_post((int)$pro_id );
												$price = get_post_meta($pro_id,"price",true);
												$product_title = $product->post_title;
												$total = $price * $quantity;
												$wpdb->query("INSERT INTO xtl_order_detail values('','$id_order','$pro_id','$product_title','$quantity','$price','$total','$create_order','0')");
											} ?>
											<script type="text/javascript" language="javascript">
												alert("Quý khách đã đặt hàng thành công. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất. Xin cảm ơn!");
											</script>
											<?php
												if($payment_post == 1){ ?>
												<script type="text/javascript" language="javascript">
													window.location.replace("<?php echo get_bloginfo('url');?>/thanh-toan.html");
												</script>
											<?php
												session_destroy();
												}elseif($payment_post == 2){?>
													<script type="text/javascript" language="javascript">
														window.location.replace("<?php echo get_bloginfo('url');?>");
													</script>	
											<?php	session_destroy();}
										}
									}
									
								}
							}else{
								echo "Bạn chưa chọn phương thức thanh toán! Vui lòng trọn phương thức thanh toán!";
							}
							?>
									
					<?php	}


					?>