<?php 
/*
 Template Name: Bill Number
 */
get_header(); 
$emailcalo = $_GET['emailcalo'];
$emaildinhduong = $_GET['emaildinhduong'];
$emailbuaan = $_GET['emailbuaan'];
$emailvitamin = $_GET['emailvitamin'];

?>
<script language="JavaScript">
	function goto_next_thanh_toan()
	{
	window.location="<?php echo get_bloginfo('url');?>/thanh-toan.html";
	}
</script>

	
	<div class="container">
		
		 <div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>

			    <div class="content_bill">
					<?php
						if($emailcalo != ""){
							global $wpdb;
							$query = $wpdb->get_results("SELECT * FROM xtl_calo WHERE email = '$emailcalo' ORDER BY id_calo DESC LIMIT 1");
							foreach ($query as $key => $value) {
						?>
								Thông tin cần thiết chúng tôi đã gửi về email quý khách vừa đăng ký.<br>
								Đây là số bill quý khách vừa đăng ký.
								<?php
									if(strlen($value->id_calo) == 1){
										echo "<p>000000000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 2){
										echo "<p>00000000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 3){
										echo "<p>0000000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 4){
										echo "<p>000000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 5){
										echo "<p>00000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 6){
										echo "<p>0000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 7){
										echo "<p>000".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 8){
										echo "<p>00".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 9){
										echo "<p>0".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 10){
										echo "<p>".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính calo "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính calo là : ".$value->id_calo;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
								?>
								(Hệ thống sẽ tự động chuyển trang sau 30s!)
								<script> my_timeout=setTimeout("goto_next_thanh_toan();",30000); </script>
								
						<?php
							}
						}
						if($emaildinhduong != ""){
							global $wpdb;
							$query = $wpdb->get_results("SELECT * FROM xtl_dinh_duong WHERE email = '$emaildinhduong' ORDER BY id_dinh_duong DESC LIMIT 1");
							foreach ($query as $key => $value) {
						?>
								Thông tin cần thiết chúng tôi đã gửi về email quý khách vừa đăng ký.<br>
								Đây là số bill quý khách vừa đăng ký.
								<?php
									if(strlen($value->id_dinh_duong) == 1){
										echo "<p>000000000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 2){
										echo "<p>00000000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 3){
										echo "<p>0000000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 4){
										echo "<p>000000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 5){
										echo "<p>00000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 6){
										echo "<p>0000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 7){
										echo "<p>000".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 8){
										echo "<p>00".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 9){
										echo "<p>0".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_dinh_duong) == 10){
										echo "<p>".$value->id_dinh_duong."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tính dinh dưỡng là : ".$value->id_dinh_duong;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
								?>
								(Hệ thống sẽ tự động chuyển trang sau 30s!)
								<script> my_timeout=setTimeout("goto_next_thanh_toan();",30000); </script>
								
						<?php
							}
						}
						if($emailbuaan!= ""){
							global $wpdb;
							$query = $wpdb->get_results("SELECT * FROM xtl_bua_an WHERE email = '$emailbuaan' ORDER BY id_bua_an DESC LIMIT 1");
							foreach ($query as $key => $value) {
						?>
								Thông tin cần thiết chúng tôi đã gửi về email quý khách vừa đăng ký.<br>
								Đây là số bill quý khách vừa đăng ký.
								<?php
									if(strlen($value->id_bua_an) == 1){
										echo "<p>000000000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 2){
										echo "<p>00000000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 3){
										echo "<p>0000000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 4){
										echo "<p>000000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 5){
										echo "<p>00000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 6){
										echo "<p>0000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 7){
										echo "<p>000".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 8){
										echo "<p>00".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý là : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_bua_an) == 9){
										echo "<p>0".$value->id_bua_an."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_calo) == 10){
										echo "<p>".$value->id_calo."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn bữa ăn hợp lý : ".$value->id_bua_an;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
								?>
								(Hệ thống sẽ tự động chuyển trang sau 30s!)
								<script> my_timeout=setTimeout("goto_next_thanh_toan();",30000); </script>
								
						<?php
							}
						}
						if($emailvitamin != ""){
							global $wpdb;
							$query = $wpdb->get_results("SELECT * FROM xtl_vitamin WHERE email = '$emailvitamin' ORDER BY id_vitamin DESC LIMIT 1");
							foreach ($query as $key => $value) {
						?>
								Thông tin cần thiết chúng tôi đã gửi về email quý khách vừa đăng ký.<br>
								Đây là số bill quý khách vừa đăng ký.
								<?php
									if(strlen($value->id_vitamin) == 1){
										echo "<p>000000000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 2){
										echo "<p>00000000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 3){
										echo "<p>0000000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 4){
										echo "<p>000000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 5){
										echo "<p>00000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 6){
										echo "<p>0000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 7){
										echo "<p>000".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 8){
										echo "<p>00".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 9){
										echo "<p>0".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
									if(strlen($value->id_vitamin) == 10){
										echo "<p>".$value->id_vitamin."</p>";
										$blogtime = current_time( 'mysql' ); 
										$to = $value->email;
										$subject = "Số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin "." - ".$blogtime;
										$message = "Kính gửi quý khách! \n Mã số Bill quý khách đã đăng ký ở chuyên đề tư vấn chọn Vitamin : ".$value->id_vitamin;
										$headers = "";
										$attachments = "";
										wp_mail( $to, $subject, $message, $headers, $attachments );
									}
								?>
								(Hệ thống sẽ tự động chuyển trang sau 30s!)
								<script> my_timeout=setTimeout("goto_next_thanh_toan();",30000); </script>
								
						<?php
							}
						}
					?>
			    </div>
			</div>
			
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	 </div>
<?php get_footer(); ?>