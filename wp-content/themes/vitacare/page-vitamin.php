<?php 
/*
 Template Name: Vitamin
 */
get_header(); 
?>

	
	<div class="container">
		
		<div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="form_tuvan">
				<h3>Chuyên đề tư vấn chọn Vitamin</h3>ket-qua-bieu-mau-chuyen-de-tu-van-chon-vitamin
				Xin hãy gửi thông tin sau cho chúng tôi về email. Tham khảo mẫu sau khi chọn Vitamin. Xem tại <span class="bieu_mau"><a href="/ket-qua-bieu-mau-chuyen-de-tu-van-chon-vitamin.html" target="_blank">Biểu mẫu kết quả</a></span>

				<form accept-charset="utf-8" action="/thanh-toan-vitamin" method="post">
				
				<ul class="info">
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="hoten" size="50" type="text" value="<?php echo $_POST['hoten'];?>" placeholder="Nhập họ tên" required/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="tuoi" size="50" type="text" value="<?php echo $_POST['tuoi'];?>" placeholder="Nhập tuổi" required/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="weight" size="50" type="text" value="<?php echo $_POST['weight'];?>" placeholder="Nhập cân nặng" required/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="height" size="50" type="text" value="<?php echo $_POST['height'];?>" placeholder="Nhập chiều cao" required/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="myemail" size="50" type="text" value="<?php echo $_POST['myemail'];?>" placeholder="Nhập email của bạn" required/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<span class="gioi_tinh col-xs-12 col-sm-6 col-md-3 col-lg-3">Giới tính</span>
						<ul class="sex col-xs-12 col-sm-6 col-md-9 col-lg-9">
							<li><input id="sex" class="disablebox" name="sex" type="radio" value="1" required/> Nam</li>
							<li><input id="sex" class="disablebox2" name="sex" type="radio" value="0" /> Nữ</li>
						</ul>
						
					</li>
					<li><strong>Hoạt động thể chất hàng ngày</strong>
						<ul class="run">
							<li class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input id="run" class="disablebox1" name="run" type="radio" value="1" required/> 1. Ít vận động (Không tập luyện)</li>
							<li class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input id="run" class="disablebox2" name="run" type="radio" value="2" /> 2. Vận động nhẹ (Hoạt động thể chất 1-3 lần/tuần)</li>
							<li class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input id="run" class="disablebox3" name="run" type="radio" value="3" /> 3. Vận động vừa (Hoạt động thể chất 3-5 lần/tuần)</li>
							<li class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input id="run" class="disablebox4" name="run" type="radio" value="4" /> 4. Vận động nhiều (Hoạt động thể chất 5-7 lần/tuần)</li>
							<li class="col-xs-12 col-sm-12 col-md-6 col-lg-6"><input id="run" class="disablebox5" name="run" type="radio" value="5" /> 5. Vận động thể thao (Hoạt động thể thao chuyên nghiệp)</li>
						</ul>
					</li>
		
				</ul>
				<ul class="chu_y cols-xs-12 col-sm-12 col-md-12 col-lg-12">
					Xin vui lòng thông tin thực đơn điển hình một tuần của bạn.
					Lưu ý: thông tin gồm loại thực phẩm và số lượng; thông tin càng chi tiết thì tính toán càng chính xác
				</ul>
				<div class="bang_bieu cols-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
						<ul>
							<li class="title_bua_an">Bưã sáng</li>
							<li><textarea class="form-control" name="bua_sang_t2" value="<?php echo $_POST['bua_sang_t2'];?>" placeholder="Bữa sáng thứ 2"><?php echo $_POST['bua_sang_t2'];?></textarea></li>
							<li><textarea class="form-control" name="bua_sang_t3" value="<?php echo $_POST['bua_sang_t3'];?>" placeholder="Bữa sáng thứ 3"><?php echo $_POST['bua_sang_t3'];?></textarea></li>
							<li><textarea class="form-control" name="bua_sang_t4" value="<?php echo $_POST['bua_sang_t4'];?>" placeholder="Bữa sáng thứ 4"><?php echo $_POST['bua_sang_t4'];?></textarea></li>
							<li><textarea class="form-control" name="bua_sang_t5" value="<?php echo $_POST['bua_sang_t5'];?>" placeholder="Bữa sáng thứ 5"><?php echo $_POST['bua_sang_t5'];?></textarea></li>
							<li><textarea class="form-control" name="bua_sang_t6" value="<?php echo $_POST['bua_sang_t6'];?>" placeholder="Bữa sáng thứ 6"><?php echo $_POST['bua_sang_t6'];?></textarea></li>
							<li><textarea class="form-control" name="bua_sang_t7" value="<?php echo $_POST['bua_sang_t7'];?>" placeholder="Bữa sáng thứ 7"><?php echo $_POST['bua_sang_t7'];?></textarea></li>
							<li><textarea class="form-control" name="bua_sang_cn" value="<?php echo $_POST['bua_sang_cn'];?>" placeholder="Bữa sáng chủ nhật"><?php echo $_POST['bua_sang_cn'];?></textarea></li>
						</ul>
					</div>
					<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
						<ul>
							<li class="title_bua_an">Bưã trưa</li>
							<li><textarea class="form-control" name="bua_trua_t2" value="<?php echo $_POST['bua_trua_t2'];?>" placeholder="Bữa trưa thứ 2"><?php echo $_POST['bua_trua_t2'];?></textarea></li>
							<li><textarea class="form-control" name="bua_trua_t3" value="<?php echo $_POST['bua_trua_t3'];?>" placeholder="Bữa trưa thứ 3"><?php echo $_POST['bua_trua_t3'];?></textarea></li>
							<li><textarea class="form-control" name="bua_trua_t4" value="<?php echo $_POST['bua_trua_t4'];?>" placeholder="Bữa trưa thứ 4"><?php echo $_POST['bua_trua_t4'];?></textarea></li>
							<li><textarea class="form-control" name="bua_trua_t5" value="<?php echo $_POST['bua_trua_t5'];?>" placeholder="Bữa trưa thứ 5"><?php echo $_POST['bua_trua_t5'];?></textarea></li>
							<li><textarea class="form-control" name="bua_trua_t6" value="<?php echo $_POST['bua_trua_t6'];?>" placeholder="Bữa trưa thứ 6"><?php echo $_POST['bua_trua_t6'];?></textarea></li>
							<li><textarea class="form-control" name="bua_trua_t7" value="<?php echo $_POST['bua_trua_t7'];?>" placeholder="Bữa trưa thứ 7"><?php echo $_POST['bua_trua_t7'];?></textarea></li>
							<li><textarea class="form-control" name="bua_trua_cn" value="<?php echo $_POST['bua_trua_cn'];?>" placeholder="Bữa trưa chủ nhật"><?php echo $_POST['bua_trua_cn'];?></textarea></li>
						</ul>
					</div>
					<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
						<ul class="cols-xs-12 col-sm-12 col-md-12 col-lg-12">
							<li class="title_bua_an">Bưã tối</li>
							<li><textarea class="form-control" name="bua_toi_t2" value="<?php echo $_POST['bua_toi_t2'];?>" placeholder="Bữa tối thứ 2"><?php echo $_POST['bua_toi_t2'];?></textarea></li>
							<li><textarea class="form-control" name="bua_toi_t3" value="<?php echo $_POST['bua_toi_t3'];?>" placeholder="Bữa tối thứ 3"><?php echo $_POST['bua_toi_t3'];?></textarea></li>
							<li><textarea class="form-control" name="bua_toi_t4" value="<?php echo $_POST['bua_toi_t4'];?>" placeholder="Bữa tối thứ 4"><?php echo $_POST['bua_toi_t4'];?></textarea></li>
							<li><textarea class="form-control" name="bua_toi_t5" value="<?php echo $_POST['bua_toi_t5'];?>" placeholder="Bữa tối thứ 5"><?php echo $_POST['bua_toi_t5'];?></textarea></li>
							<li><textarea class="form-control" name="bua_toi_t6" value="<?php echo $_POST['bua_toi_t6'];?>" placeholder="Bữa tối thứ 6"><?php echo $_POST['bua_toi_t6'];?></textarea></li>
							<li><textarea class="form-control" name="bua_toi_t7" value="<?php echo $_POST['bua_toi_t7'];?>" placeholder="Bữa tối thứ 7"><?php echo $_POST['bua_toi_t7'];?></textarea></li>
							<li><textarea class="form-control" name="bua_toi_cn" value="<?php echo $_POST['bua_toi_cn'];?>" placeholder="Bữa tối chủ nhật"><?php echo $_POST['bua_toi_cn'];?></textarea></li>
						</ul>
					</div>
					<div class="column_table cols-xs-12 col-sm-6 col-md-3 col-lg-3">
						<ul class="cols-xs-12 col-sm-12 col-md-12 col-lg-12">
							<li class="title_bua_an">Bưã ăn nhẹ</li>
							<li><textarea class="form-control" name="bua_an_nhe_t2" value="<?php echo $_POST['bua_an_nhe_t2'];?>" placeholder="Bữa ăn nhẹ thứ 2"><?php echo $_POST['bua_an_nhe_t2'];?></textarea></li>
							<li><textarea class="form-control" name="bua_an_nhe_t3" value="<?php echo $_POST['bua_an_nhe_t3'];?>" placeholder="Bữa ăn nhẹ thứ 3"><?php echo $_POST['bua_an_nhe_t3'];?></textarea></li>
							<li><textarea class="form-control" name="bua_an_nhe_t4" value="<?php echo $_POST['bua_an_nhe_t4'];?>" placeholder="Bữa ăn nhẹ thứ 4"><?php echo $_POST['bua_an_nhe_t4'];?></textarea></li>
							<li><textarea class="form-control" name="bua_an_nhe_t5" value="<?php echo $_POST['bua_an_nhe_t5'];?>" placeholder="Bữa ăn nhẹ thứ 5"><?php echo $_POST['bua_an_nhe_t5'];?></textarea></li>
							<li><textarea class="form-control" name="bua_an_nhe_t6" value="<?php echo $_POST['bua_an_nhe_t6'];?>" placeholder="Bữa ăn nhẹ thứ 6"><?php echo $_POST['bua_an_nhe_t6'];?></textarea></li>
							<li><textarea class="form-control" name="bua_an_nhe_t7" value="<?php echo $_POST['bua_an_nhe_t7'];?>" placeholder="Bữa ăn nhẹ thứ 7"><?php echo $_POST['bua_an_nhe_t7'];?></textarea></li>
							<li><textarea class="form-control" name="bua_an_nhe_cn" value="<?php echo $_POST['bua_an_nhe_cn'];?>" placeholder="Bữa ăn nhẹ chủ nhật"><?php echo $_POST['bua_an_nhe_cn'];?></textarea></li>
						</ul>
					</div>
					<div class="chamsoc cols-xs-12 col-sm-12 col-md-12 col-lg-12">
					Lựa chọn các lĩnh vực sức khoẻ cần chăm sóc:
						<ul>
							<li><input name="checklist[]" type="checkbox" value="1" /> Toàn bộ</li>
							<li><input name="checklist[]" type="checkbox" value="2" /> Chăm sóc xương khớp</li>
							<li><input name="checklist[]" type="checkbox" value="3" /> Chăm sóc hệ miễn dịch</li>
							<li><input name="checklist[]" type="checkbox" value="4" /> Chăm sóc da</li>
							<li><input name="checklist[]" type="checkbox" value="5" /> Tăng cường năng lượng</li>
							<li><input name="checklist[]" type="checkbox" value="6" /> Chăm sóc hệ tiêu hoá</li>
						</ul>
					</div>
					</div>
					<ul>
						
						<li class="cols-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;"><input id="guithongtinvitamin" name="guithongtinvitamin" type="submit" value="Gửi thông tin" /></li>
					</ul>
				</form></div>	
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	</div>
<?php get_footer(); ?>

<?php
// global $wpdb;
// $hoten = $_POST['hoten'];
// $tuoi = $_POST['tuoi'];
// $sex = $_POST['sex'];
// $weight = $_POST['weight'];
// $height = $_POST['height'];
// $run = $_POST['run'];
// $bua_sang_t2 = $_POST['bua_sang_t2'];
// $bua_sang_t3 = $_POST['bua_sang_t3'];
// $bua_sang_t4 = $_POST['bua_sang_t4'];
// $bua_sang_t5 = $_POST['bua_sang_t5'];
// $bua_sang_t6 = $_POST['bua_sang_t6'];
// $bua_sang_t7 = $_POST['bua_sang_t7'];
// $bua_sang_cn = $_POST['bua_sang_cn'];
// $bua_trua_t2 = $_POST['bua_trua_t2'];
// $bua_trua_t3 = $_POST['bua_trua_t3'];
// $bua_trua_t4 = $_POST['bua_trua_t4'];
// $bua_trua_t5 = $_POST['bua_trua_t5'];
// $bua_trua_t6 = $_POST['bua_trua_t6'];
// $bua_trua_t7 = $_POST['bua_trua_t7'];
// $bua_trua_cn = $_POST['bua_trua_cn'];
// $bua_toi_t2 = $_POST['bua_toi_t2'];
// $bua_toi_t3 = $_POST['bua_toi_t3'];
// $bua_toi_t4 = $_POST['bua_toi_t4'];
// $bua_toi_t5 = $_POST['bua_toi_t5'];
// $bua_toi_t6 = $_POST['bua_toi_t6'];
// $bua_toi_t7 = $_POST['bua_toi_t7'];
// $bua_toi_cn = $_POST['bua_toi_cn'];
// $bua_an_nhe_t2 = $_POST['bua_an_nhe_t2'];
// $bua_an_nhe_t3 = $_POST['bua_an_nhe_t3'];
// $bua_an_nhe_t4 = $_POST['bua_an_nhe_t4'];
// $bua_an_nhe_t5 = $_POST['bua_an_nhe_t5'];
// $bua_an_nhe_t6 = $_POST['bua_an_nhe_t6'];
// $bua_an_nhe_t7 = $_POST['bua_an_nhe_t7'];
// $bua_an_nhe_cn = $_POST['bua_an_nhe_cn'];

// $myemail = $_POST['myemail'];
// $payments = $_POST['payments'];
// $create_date = time();
// $modify_date = time();
// $status = 0;
// $to = 'pandavn.contact@gmail.com';
// $blogtime = current_time( 'mysql' ); 
// $subject = "[NEW - ] Chuyên đề tư vấn chọn Vitamin".$blogtime;
// if($sex == 1){ 
// 	echo $sex_gt = "Nam";
// }else{ 
// 	echo $sex_gt = "Nữ";
// }
// $message = "Thông tin khách chuyên đề tư vấn chọn Vitamin \n Họ tên: ". $hoten ." \n Tuổi: ". $tuoi ."\n Giới tính: ".$sex_gt." \n Email: ".$myemail;
// $headers = "";
// $attachments = "";
// $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 

// if(isset($_POST['guithongtinvitamin'])){
// 		if(!empty($_POST['checklist'])) {
// 			foreach($_POST['checklist'] as $key=>$check) {
// 				$checklist .= $check.","; 
// 			}
// 		}else{
// 			$checklist = 'null';
// 		}
// 		if(!preg_match($regex, $myemail)){ 
// 			?>
// 				<script type="text/javascript" language="javascript">
// 					alert("Email không hợp lệ!");							
// 				</script>
// 			<?php
// 		}else{
// 			if($hoten == "" || $tuoi == "" || $sex == "" || $weight == "" || $height == "" || 
// 				$run == "" || $myemail == "" || $payments == ""){
// 			?>
// 				<script type="text/javascript" language="javascript">
// 					alert("Bạn hãy điên đầy đủ thông tin!");
// 				</script>
// 			<?php
// 			}else{
// 				$query_dinhduong = $wpdb->query("INSERT INTO xtl_vitamin values(
// 					'','$hoten','$tuoi','$sex','$weight','$height','$run','$bua_sang_t2','$bua_sang_t3','$bua_sang_t4','$bua_sang_t5',
// 					'$bua_sang_t6','$bua_sang_t7','$bua_sang_cn','$bua_trua_t2','$bua_trua_t3','$bua_trua_t4','$bua_trua_t5','$bua_trua_t6',
// 					'$bua_trua_t7','$bua_trua_cn','$bua_toi_t2','$bua_toi_t3','$bua_toi_t4','$bua_toi_t5','$bua_toi_t6','$bua_toi_t7','$bua_toi_cn',
// 					'$bua_an_nhe_t2','$bua_an_nhe_t3','$bua_an_nhe_t4','$bua_an_nhe_t5','$bua_an_nhe_t6','$bua_an_nhe_t7','$bua_an_nhe_cn',
// 					'$checklist','$myemail','$payments','$create_date','$modify_date','$status')");
// 				if($query_dinhduong){
// 					wp_mail( $to, $subject, $message, $headers, $attachments );
// 					?>
// 						<script type="text/javascript" language="javascript">
// 							alert("Gửi thông tin thành công. Cảm ơn quý khách đã tin tưởng. Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất!.");
// 							window.location.replace("<?php echo get_bloginfo('url');?>/thong-bao-so-bill?emailvitamin=<?php echo $myemail;?>");
// 						</script>
// 					<?php
					
// 				}else{
// 					?>
// 						<script type="text/javascript" language="javascript">
// 							alert("Gửi thông tin không thành công. Vui lòng kiểm tra lại thông tin. Xin cảm ơn!");
// 						</script>
// 					<?php
					
// 				}
// 			}
// 		}
// }

?>

<!-- <script language="javascript">
		jQuery(document).ready(function(){ 
			jQuery(".ckhoan").click(function(){  
			 	$("#payments").attr("checked","checked");
			 	
		   });  
		}); 
        </script> -->