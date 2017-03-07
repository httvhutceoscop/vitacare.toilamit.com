<?php 
/*
 Template Name: Thanh toan calo
 */
get_header(); 
global $wpdb;
$emailcalo = $_POST['myemail'];;
$hoten = $_POST['hoten'];
$tuoi = $_POST['tuoi'];
$sex = $_POST['sex'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$run = $_POST['run'];
$myemail = $_POST['myemail'];
$create_date = time();
$modify_date = time();
$status = 0;
$regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
$to = get_option('email_email');
$blogtime = current_time( 'mysql' ); 
$subject = "[NEW - ] Chuyên đề tính calo ".$blogtime;
if($sex == 1){ 
	$sex_gt = "Nam";
}else{ 
	$sex_gt = "Nữ";
}
$message = "Thông tin khách chuyên đề tính calo \n Họ tên: ". $hoten ." \n Tuổi: ". $tuoi ."\n Giới tính: ".$sex_gt." \n Email: ".$myemail;
$headers = "";
$attachments = "";
?>

	
	<div class="container">
		
		 <div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			    <form accept-charset="utf-8" action="" method="post">
				    <div class="content_bill">
				    	<h1 class="page_title">Thông tin thanh toán chuyên đề tính Calo</h1>
				    	<div class="form_info hidden-xs col-md-1 col-lg-1"></div>
				    	<div class="form_info col-xs-12 col-sm-12 col-md-10 col-lg-10">
							<ul class="infos">
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Họ tên: <strong><?php echo $hoten;?></strong><input type="hidden" name="ho_ten" value="<?php echo $hoten;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Tuổi: <strong><?php echo $tuoi;?></strong></strong><input type="hidden" name="so_tuoi" value="<?php echo $tuoi;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Cân nặng: <strong><?php echo $weight;?> kg</strong></strong><input type="hidden" name="can_nang" value="<?php echo $weight;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Chiều cao: <strong><?php echo $height;?> cm</strong></strong><input type="hidden" name="chieu_cao" value="<?php echo $height;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Email: <strong><?php echo $emailcalo;?></strong></strong><input type="hidden" name="email_calo" value="<?php echo $emailcalo;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">
									Giới tính: 
											<?php
												if($sex == 1){ 
													echo $sex_gt = "<strong>Nam</strong>";
												}else{ 
													echo $sex_gt = "<strong>Nữ</strong>";
												}
												?>
									
									<input type="hidden" name="gioi_tinh" value="<?php echo $sex;?>">
								</li>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">Hoạt động thể chất hàng ngày: 
										
											<?php
												if($run == 1){
													echo "<strong>Ít vận động (Không tập luyện)</strong>";
												}
												if($run == 2){
													echo "<strong>Vận động nhẹ (Hoạt động thể chất 1-3 lần/tuần)</strong>";
												}
												if($run == 3){
													echo "<strong>Vận động vừa (Hoạt động thể chất 3-5 lần/tuần)</strong>";
												}
												if($run == 4){
													echo "<strong>Vận động nhiều (Hoạt động thể chất 5-7 lần/tuần)</strong>";
												}
												if($run == 5){
													echo "<strong>Vận động thể thao (Hoạt động thể thao chuyên nghiệp)</strong>";
												}
											?>
											<input type="hidden" name="hoat_dong" value="<?php echo $run;?>">
								</li>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">Bạn cần phải thanh toán trước để chuyên gia dinh dưỡng của chúng tôi phục vụ bạn sớm nhất.</li>
								<?php
									$calo = explode(",",get_option('calo'));
								?>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">Giá trị của gói tư vấn này là <strong><?php echo number_format($calo[0]);?>đ</strong>. <?php if($calo[1] > 0){ ?> Gói tư vấn được khuyến mãi giảm giá còn <strong><?php echo number_format($calo[1]);?>đ</strong>.<?php } ?></li>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<strong>Chọn phương thức thanh toán</strong>
									<span><input type="radio" name="pt_thanh_toan" value="1" required> <strong>Thanh toán Online</strong></span>
									<span><input type="radio" name="pt_thanh_toan" value="2"> <strong>Thanh toán qua ngân hàng, bưu điện </strong></span>
									<em>(Lưu ý: Nội dung thanh toán vui lòng ghi rõ thanh toán số bill sẽ được gửi vào email đăng ký.)</em>
								</li>
							</ul>
							
							<input type="submit" value="Xác nhận thanh toán" name="xac_nhan_calo" id="xac_nhan_calo">
						</div>
						<div class="form_info hidden-xs col-md-1 col-lg-1"></div>
				    </div>
			    </form>
			    <?php
			    	if(isset($_POST['xac_nhan_calo'])){
			    		$pt_thanh_toan = $_POST['pt_thanh_toan'];
			    		$ho_ten = $_POST['ho_ten'];
			    		$so_tuoi = $_POST['so_tuoi'];
			    		$gioi_tinh = $_POST['gioi_tinh'];
			    		$can_nang = $_POST['can_nang'];
			    		$chieu_cao = $_POST['chieu_cao'];
			    		$hoat_dong = $_POST['hoat_dong'];
			    		$email_calo = $_POST['email_calo'];
			    		$query_calo = $wpdb->query("INSERT INTO xtl_calo values('','$ho_ten','$so_tuoi','$gioi_tinh','$can_nang','$chieu_cao','$hoat_dong','$email_calo','$pt_thanh_toan','$create_date','$modify_date','$status')");
			    		if($query_calo){
							wp_mail( $to, $subject, $message, $headers, $attachments );
							wp_mail( $email_calo, $subject, $message, $headers, $attachments );
							?>
								<script type="text/javascript" language="javascript">
									alert("Gửi thông tin thành công. Cảm ơn quý khách đã tin tưởng. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất!.");
									window.location.replace("<?php echo get_bloginfo('url');?>/thong-bao-so-bill?emailcalo=<?php echo $email_calo;?>");
								</script>
							<?php
							
						}else{
							?>
								<script type="text/javascript" language="javascript">
									alert("Gửi thông tin không thành công. Vui lòng kiểm tra lại thông tin. Xin cảm ơn!");
								</script>
							<?php
							
						}
			    	}
			    ?>
			</div>
			
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	 </div>
<?php get_footer(); ?>