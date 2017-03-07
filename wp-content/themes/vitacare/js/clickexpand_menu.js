$(document).ready(function(){

		$('.arrow_right,.list-content > ul > li').click(function(){
			if($('.list-content > ul > li').hasClass('active')){
				$('.list-content > ul > li').removeClass('active');
			}else{
				$(this).addClass('active');
				$(this).click(function(){
					if($(this).hasClass('active')){
						$(this).removeClass('active');
					}else{
						$(this).addClass('active');
					}
				})
			}
		});
});