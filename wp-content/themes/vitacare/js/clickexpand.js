$(document).ready(function(){
		$('.payment li').click(function(){
				$('.payment li').removeClass('active');
				$(this).addClass('active');
				$('.payment li').css("display","block");
		});
});
$(document).ready(function(){
		$('.thanhtoan li').click(function(){
				$('.thanhtoan li').removeClass('active');
				$(this).addClass('active');
				$('.thanhtoan li').css("display","block");
		});
});
$(document).ready(function(){
	$('.title_category').mouseover(function(){
			$(this).addClass('active');
			var content_show = $(this).attr('title');
			$('#' + content_show).slideDown();
	}).mouseout(function() {$(this).removeClass("active");$('.content-step').css("display","none");});
});