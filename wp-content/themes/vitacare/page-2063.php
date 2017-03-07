<?php 
/*
 Template Name: Thanh toan dinh duong
 */
get_header(); 
global $wpdb;
$email_dinh_duong = $_POST['myemail'];
$hoten = $_POST['hoten'];
$tuoi = $_POST['tuoi'];
$sex = $_POST['sex'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$run = $_POST['run'];
$bua_sang_t2 = $_POST['bua_sang_t2'];
$bua_sang_t3 = $_POST['bua_sang_t3'];
$bua_sang_t4 = $_POST['bua_sang_t4'];
$bua_sang_t5 = $_POST['bua_sang_t5'];
$bua_sang_t6 = $_POST['bua_sang_t6'];
$bua_sang_t7 = $_POST['bua_sang_t7'];
$bua_sang_cn = $_POST['bua_sang_cn'];
$bua_trua_t2 = $_POST['bua_trua_t2'];
$bua_trua_t3 = $_POST['bua_trua_t3'];
$bua_trua_t4 = $_POST['bua_trua_t4'];
$bua_trua_t5 = $_POST['bua_trua_t5'];
$bua_trua_t6 = $_POST['bua_trua_t6'];
$bua_trua_t7 = $_POST['bua_trua_t7'];
$bua_trua_cn = $_POST['bua_trua_cn'];
$bua_toi_t2 = $_POST['bua_toi_t2'];
$bua_toi_t3 = $_POST['bua_toi_t3'];
$bua_toi_t4 = $_POST['bua_toi_t4'];
$bua_toi_t5 = $_POST['bua_toi_t5'];
$bua_toi_t6 = $_POST['bua_toi_t6'];
$bua_toi_t7 = $_POST['bua_toi_t7'];
$bua_toi_cn = $_POST['bua_toi_cn'];
$bua_an_nhe_t2 = $_POST['bua_an_nhe_t2'];
$bua_an_nhe_t3 = $_POST['bua_an_nhe_t3'];
$bua_an_nhe_t4 = $_POST['bua_an_nhe_t4'];
$bua_an_nhe_t5 = $_POST['bua_an_nhe_t5'];
$bua_an_nhe_t6 = $_POST['bua_an_nhe_t6'];
$bua_an_nhe_t7 = $_POST['bua_an_nhe_t7'];
$bua_an_nhe_cn = $_POST['bua_an_nhe_cn'];
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
$message = "Thông tin khách chuyên đề tính dinh dưỡng \n Họ tên: ". $hoten ." \n Tuổi: ". $tuoi ."\n Giới tính: ".$sex_gt." \n Email: ".$myemail;
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
				    	<h1 class="page_title">Thông tin thanh toán chuyên đề tính dinh dưỡng</h1>
				    	<div class="form_info col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="infos">
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Họ tên: <strong><?php echo $hoten;?></strong><input type="hidden" name="ho_ten" value="<?php echo $hoten;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Tuổi: <strong><?php echo $tuoi;?></strong></strong><input type="hidden" name="so_tuoi" value="<?php echo $tuoi;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Cân nặng: <strong><?php echo $weight;?> kg</strong></strong><input type="hidden" name="can_nang" value="<?php echo $weight;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Chiều cao: <strong><?php echo $height;?> cm</strong></strong><input type="hidden" name="chieu_cao" value="<?php echo $height;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-6 col-md-6 col-lg-6">Email: <strong><?php echo $email_dinh_duong;?></strong></strong><input type="hidden" name="email_dinh_duong" value="<?php echo $email_dinh_duong;?>"></li>
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
								<li class="bang_bieu colum_infos cols-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
										<ul>
											<li class="title_bua_an">Bưã sáng</li>
											<li><strong>Thứ 2: </strong><?php echo $bua_sang_t2;?><input type="hidden" name="bua_sang_t2" value="<?php echo $bua_sang_t2;?>"></li>
											<li><strong>Thứ 3: </strong><?php echo $bua_sang_t3;?><input type="hidden" name="bua_sang_t3" value="<?php echo $bua_sang_t3;?>"></li>
											<li><strong>Thứ 4: </strong><?php echo $bua_sang_t4;?><input type="hidden" name="bua_sang_t4" value="<?php echo $bua_sang_t4;?>"></li>
											<li><strong>Thứ 5: </strong><?php echo $bua_sang_t5;?><input type="hidden" name="bua_sang_t5" value="<?php echo $bua_sang_t5;?>"></li>
											<li><strong>Thứ 6: </strong><?php echo $bua_sang_t6;?><input type="hidden" name="bua_sang_t6" value="<?php echo $bua_sang_t6;?>"></li>
											<li><strong>Thứ 7: </strong><?php echo $bua_sang_t7;?><input type="hidden" name="bua_sang_t7" value="<?php echo $bua_sang_t7;?>"></li>
											<li><strong>Chủ nhật: </strong><?php echo $bua_sang_cn;?><input type="hidden" name="bua_sang_cn" value="<?php echo $bua_sang_cn;?>"></li>
										</ul>
									</div>
									<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
										<ul>
											<li class="title_bua_an">Bưã trưa</li>
											<li><strong>Thứ 2: </strong><?php echo $bua_trua_t2;?><input type="hidden" name="bua_trua_t2" value="<?php echo $bua_trua_t2;?>"></li>
											<li><strong>Thứ 3: </strong><?php echo $bua_trua_t3;?><input type="hidden" name="bua_trua_t3" value="<?php echo $bua_trua_t3;?>"></li>
											<li><strong>Thứ 4: </strong><?php echo $bua_trua_t4;?><input type="hidden" name="bua_trua_t4" value="<?php echo $bua_trua_t4;?>"></li>
											<li><strong>Thứ 5: </strong><?php echo $bua_trua_t5;?><input type="hidden" name="bua_trua_t5" value="<?php echo $bua_trua_t5;?>"></li>
											<li><strong>Thứ 6: </strong><?php echo $bua_trua_t6;?><input type="hidden" name="bua_trua_t6" value="<?php echo $bua_trua_t6;?>"></li>
											<li><strong>Thứ 7: </strong><?php echo $bua_trua_t7;?><input type="hidden" name="bua_trua_t7" value="<?php echo $bua_trua_t7;?>"></li>
											<li><strong>Chủ nhật: </strong><?php echo $bua_trua_cn;?><input type="hidden" name="bua_trua_cn" value="<?php echo $bua_trua_cn;?>"></li>
										</ul>
									</div>
									<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
										<ul class="cols-xs-12 col-sm-12 col-md-12 col-lg-12">
											<li class="title_bua_an">Bưã tối</li>
											<li><strong>Thứ 2: </strong><?php echo $bua_toi_t2;?><input type="hidden" name="bua_toi_t2" value="<?php echo $bua_toi_t2;?>"></li>
											<li><strong>Thứ 3: </strong><?php echo $bua_toi_t3;?><input type="hidden" name="bua_toi_t3" value="<?php echo $bua_toi_t3;?>"></li>
											<li><strong>Thứ 4: </strong><?php echo $bua_toi_t4;?><input type="hidden" name="bua_toi_t4" value="<?php echo $bua_toi_t4;?>"></li>
											<li><strong>Thứ 5: </strong><?php echo $bua_toi_t5;?><input type="hidden" name="bua_toi_t5" value="<?php echo $bua_toi_t5;?>"></li>
											<li><strong>Thứ 6: </strong><?php echo $bua_toi_t6;?><input type="hidden" name="bua_toi_t6" value="<?php echo $bua_toi_t6;?>"></li>
											<li><strong>Thứ 7: </strong><?php echo $bua_toi_t7;?><input type="hidden" name="bua_toi_t7" value="<?php echo $bua_toi_t7;?>"></li>
											<li><strong>Chủ nhật: </strong><?php echo $bua_toi_cn;?><input type="hidden" name="bua_toi_cn" value="<?php echo $bua_toi_cn;?>"></li>
										</ul>
									</div>
									<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
										<ul class="cols-xs-12 col-sm-12 col-md-12 col-lg-12">
											<li class="title_bua_an">Bưã ăn nhẹ</li>
											<li><strong>Thứ 2: </strong><?php echo $bua_an_nhe_t2;?><input type="hidden" name="bua_an_nhe_t2" value="<?php echo $bua_an_nhe_t2;?>"></li>
											<li><strong>Thứ 3: </strong><?php echo $bua_an_nhe_t3;?><input type="hidden" name="bua_an_nhe_t3" value="<?php echo $bua_an_nhe_t3;?>"></li>
											<li><strong>Thứ 4: </strong><?php echo $bua_an_nhe_t4;?><input type="hidden" name="bua_an_nhe_t4" value="<?php echo $bua_an_nhe_t4;?>"></li>
											<li><strong>Thứ 5: </strong><?php echo $bua_an_nhe_t5;?><input type="hidden" name="bua_an_nhe_t5" value="<?php echo $bua_an_nhe_t5;?>"></li>
											<li><strong>Thứ 6: </strong><?php echo $bua_an_nhe_t6;?><input type="hidden" name="bua_an_nhe_t6" value="<?php echo $bua_an_nhe_t6;?>"></li>
											<li><strong>Thứ 7: </strong><?php echo $bua_an_nhe_t7;?><input type="hidden" name="bua_an_nhe_t7" value="<?php echo $bua_an_nhe_t7;?>"></li>
											<li><strong>Chủ nhật: </strong><?php echo $bua_an_nhe_cn;?><input type="hidden" name="bua_an_nhe_cn" value="<?php echo $bua_an_nhe_cn;?>"></li>
										</ul>
									</div>
								</li>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">Bạn cần phải thanh toán trước để chuyên gia dinh dưỡng của chúng tôi phục vụ bạn sớm nhất.</li>
								<?php
									$dinhduong = explode(",",get_option('dinhduong'));
								?>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">Giá trị của gói tư vấn này là <strong><?php echo number_format($dinhduong[0]);?>đ</strong>. <?php if($dinhduong[1] > 0){ ?> Gói tư vấn được khuyến mãi giảm giá còn <strong><?php echo number_format($dinhduong[1]);?>đ</strong>.<?php } ?>
								<?php
									if($dinhduong[1] > 0){
										$gia_tt = $dinhduong[1];
									}else{
										$gia_tt = $dinhduong[0];
									}
								?>
								<input type="hidden" name="gia_tt" value="<?php echo $gia_tt;?>"></li>
								<li class="colum_infos col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<strong>Chọn phương thức thanh toán</strong>
									<span><input type="radio" name="pt_thanh_toan" value="1" required> <strong>Thanh toán Online</strong></span>
									<span><input type="radio" name="pt_thanh_toan" value="2"> <strong>Thanh toán qua ngân hàng, bưu điện </strong></span>
									<em>(Lưu ý: Nội dung thanh toán vui lòng ghi rõ thanh toán số bill sẽ được gửi vào email đăng ký.)</em>
								</li>
							</ul>
							
							<input type="submit" value="Xác nhận thanh toán" name="xac_nhan_dinhduong" id="xac_nhan_dinhduong">
						</div>
				    </div>
			    </form>
			    <?php
			    	if(isset($_POST['xac_nhan_dinhduong'])){
			    		$ho_ten = $_POST['ho_ten'];
						$so_tuoi = $_POST['so_tuoi'];
						$gioi_tinh = $_POST['gioi_tinh'];
						$can_nang = $_POST['can_nang'];
						$chieu_cao = $_POST['chieu_cao'];
						$hoat_dong = $_POST['hoat_dong'];
						$gia_tt = $_POST['gia_tt'];
						$email_dinhduong = $_POST['email_dinh_duong'];
						$bua_sang_t2 = $_POST['bua_sang_t2'];
						$bua_sang_t3 = $_POST['bua_sang_t3'];
						$bua_sang_t4 = $_POST['bua_sang_t4'];
						$bua_sang_t5 = $_POST['bua_sang_t5'];
						$bua_sang_t6 = $_POST['bua_sang_t6'];
						$bua_sang_t7 = $_POST['bua_sang_t7'];
						$bua_sang_cn = $_POST['bua_sang_cn'];
						$bua_trua_t2 = $_POST['bua_trua_t2'];
						$bua_trua_t3 = $_POST['bua_trua_t3'];
						$bua_trua_t4 = $_POST['bua_trua_t4'];
						$bua_trua_t5 = $_POST['bua_trua_t5'];
						$bua_trua_t6 = $_POST['bua_trua_t6'];
						$bua_trua_t7 = $_POST['bua_trua_t7'];
						$bua_trua_cn = $_POST['bua_trua_cn'];
						$bua_toi_t2 = $_POST['bua_toi_t2'];
						$bua_toi_t3 = $_POST['bua_toi_t3'];
						$bua_toi_t4 = $_POST['bua_toi_t4'];
						$bua_toi_t5 = $_POST['bua_toi_t5'];
						$bua_toi_t6 = $_POST['bua_toi_t6'];
						$bua_toi_t7 = $_POST['bua_toi_t7'];
						$bua_toi_cn = $_POST['bua_toi_cn'];
						$bua_an_nhe_t2 = $_POST['bua_an_nhe_t2'];
						$bua_an_nhe_t3 = $_POST['bua_an_nhe_t3'];
						$bua_an_nhe_t4 = $_POST['bua_an_nhe_t4'];
						$bua_an_nhe_t5 = $_POST['bua_an_nhe_t5'];
						$bua_an_nhe_t6 = $_POST['bua_an_nhe_t6'];
						$bua_an_nhe_t7 = $_POST['bua_an_nhe_t7'];
						$bua_an_nhe_cn = $_POST['bua_an_nhe_cn'];
			    		$query_dinhduong = $wpdb->query("INSERT INTO xtl_dinh_duong values('','$ho_ten','$so_tuoi','$gioi_tinh','$can_nang','$chieu_cao','$hoat_dong','$bua_sang_t2','$bua_sang_t3','$bua_sang_t4','$bua_sang_t5','$bua_sang_t6','$bua_sang_t7','$bua_sang_cn','$bua_trua_t2','$bua_trua_t3','$bua_trua_t4','$bua_trua_t5','$bua_trua_t6','$bua_trua_t7','$bua_trua_cn','$bua_toi_t2','$bua_toi_t3','$bua_toi_t4','$bua_toi_t5','$bua_toi_t6','$bua_toi_t7','$bua_toi_cn','$bua_an_nhe_t2','$bua_an_nhe_t3','$bua_an_nhe_t4','$bua_an_nhe_t5','$bua_an_nhe_t6','$bua_an_nhe_t7','$bua_an_nhe_cn','$email_dinhduong','$gia_tt','$create_date','$modify_date','$status')");
			    		if($query_dinhduong){
							wp_mail( $to, $subject, $message, $headers, $attachments );
							wp_mail( $email_calo, $subject, $message, $headers, $attachments );
							?>
								<script type="text/javascript" language="javascript">
									alert("Gửi thông tin thành công. Cảm ơn quý khách đã tin tưởng. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất!.");
									window.location.replace("<?php echo get_bloginfo('url');?>/thong-bao-so-bill?emaildinhduong=<?php echo $email_dinhduong;?>");
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