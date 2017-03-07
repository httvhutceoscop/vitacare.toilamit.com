<?php 
/*
 Template Name: Calo Page
 */
get_header(); 
?>

	
	<div class="container">
		
		 <div id="columns_left" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<div class="form_tuvan">
				<h3>Chuyên đề tính Calo</h3>

				Xin hãy gửi thông tin sau cho chúng tôi về email. Tham khảo mẫu sau khi tính toán lượng Calo. Xem tại <span class="bieu_mau"><a href="/bieu-mau-ket-qua-chuyen-de-tinh-calo.html" target="_blank">Biểu mẫu kết quả</a></span>

			<form accept-charset="utf-8" action="/thanh-toan-calo" method="post">
				<ul class="info">
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="hoten" size="50" type="text" value="<?php echo $_POST['hoten'];?>" placeholder="Nhập họ tên" required="true"/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="tuoi" size="50" type="text" value="<?php echo $_POST['tuoi'];?>" placeholder="Nhập tuổi" required="true"/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="weight" size="50" type="text" value="<?php echo $_POST['weight'];?>" placeholder="Nhập cân nặng" required="true"/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="height" size="50" type="text" value="<?php echo $_POST['height'];?>" placeholder="Nhập chiều cao" required="true"/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><input name="myemail" size="50" type="text" value="<?php echo $_POST['myemail'];?>" placeholder="Nhập email của bạn" required="true"/></li>
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<span class="gioi_tinh col-xs-12 col-sm-6 col-md-3 col-lg-3">Giới tính</span>
						<ul class="sex col-xs-12 col-sm-6 col-md-9 col-lg-9">
							<li><input id="sex" class="disablebox" name="sex" type="radio" value="1"  required="true"/> Nam</li>
							<li><input id="sex" class="disablebox2" name="sex" type="radio" value="0"  required/> Nữ</li>
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
				<ul>
					<li class="cols-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;"><input id="guithongtincalo" name="guithongtincalo" type="submit" value="Gửi thông tin" /></li>
				</ul>
			</form>		
			</div>
		</div>
		
		
		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	</div>

<?php get_footer(); ?>