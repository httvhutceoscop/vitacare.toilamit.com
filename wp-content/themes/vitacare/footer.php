<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
	</div><!-- #page -->
</div><!-- #main -->
<div class="footer">
	<footer id="colophon" class="site-footer" role="contentinfo">

			<!-- <div class="using-science">
				<p>Using science to get the best out of nature</p>
			</div>
			 -->
		<div class="footer-container">
			<div class="container">
				<div class="row">
					<div class="footer_top col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="logo_manufacture col-xs-12 col-sm-12 col-md-12">
							<h4><?php echo get_option('option5');?></h4>
							<?php echo do_shortcode("[WLS id='52']"); ?>
						</div>
						<div class="footer-block col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
							<?php endif; ?>
						</div>
						<div class="footer-block col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
							<?php endif; ?>
						</div>
						<div class="footer-block col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
							<?php endif; ?>
						</div>
						<div class="footer-block col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
							<?php endif; ?>
						</div>
						<div class="footer-block col-xs-12 col-sm-6 col-md-2 col-lg-2">
							<?php if ( is_active_sidebar( 'sidebar-footer-5' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-5' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_copy">
			<div class="container">
				<div class="row">
					<div class="footer_bottom col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
							<?php if ( is_active_sidebar( 'sidebar-footer-6' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-6' ); ?>
							<?php endif; ?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
							<?php if ( is_active_sidebar( 'sidebar-footer-7' ) ) : ?>
								<?php dynamic_sidebar( 'sidebar-footer-7' ); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- .site-footer -->
</div>

<style type="text/css">
	#take-care {
		position: fixed;
		left: 0;
		bottom: 0px;
		/*height: 200px;*/
		border: 1px solid #f1f1f1;
		width: 240px;
		background: #ffffff;
		transition: all 0.5s;
		border-top-right-radius: 10px;
	}
	#take-care .title {
		border-bottom: 1px solid #fafafa;
		background: #f99f36;
		color: #ffffff;
		padding: 4px 10px;
		cursor: pointer;
		border-top-right-radius: 10px;
	}
	#take-care h3 {
		margin-top: 4px;
	}
	#take-care .control {
		margin-top: 4px;
		font-size: 16px;
		cursor: pointer;
		color: #fff;
	}
	.control ._open {
		display: none;
	}
	#take-care .body {
		padding: 10px;
		font-weight: 700;
		font-size: 18px;
	}
	#take-care.tc-close {
		bottom: -76px;
	}

	/*Style for email subscriber*/
	.email-subscriber > div {
		border: 1px solid #f3eaea;
	    padding: 0 10px 5px;
	    background: #fafafa;
	}
	.email-subscriber .es_textbox_button {
		font-size: 16px;
	}
	.email-subscriber .es_textbox_class {
		width: 100%;
	}

	/*Khach hang than thiet*/
	.khach-hang-than-thiet {
		border-bottom: 1px solid #cdcdcd;
	    padding: 10px;
	    overflow: hidden;
	    background: #FF6E2C;
	}
	.khach-hang-than-thiet p {
	    text-transform: uppercase;
	    color: #fff;
	    text-align: left;
	    font-weight: 400;
	    font-size: 18px;
	    font-family: 'Arvo',serif;
	}
</style>

<!-- Hotline and Take care -->
<div id="take-care" class="xs-hidden sm-hidden">
	<div class="title row">
		<h3 class="pull-left">Liên hệ mua hàng</h3>
		<div class="control pull-right">
			<i class="fa fa-minus _close" aria-hidden="true"></i>
			<i class="fa fa-plus _open" aria-hidden="true"></i>
		</div>
	</div>
	<div class="body">
		<div class="email">
			<a href="mail:vitacare@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i> vitacare@gmail.com</a>
		</div>
		<div class="hotline">
			<a href="tel:0961329769"><i class="fa fa-phone" aria-hidden="true"></i> 0961 392 769</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#take-care .title').click(function(e) {
			$('#take-care').toggleClass("tc-close");
			if ($('#take-care').hasClass("tc-close")) {
				$('#take-care ._open').show();
				$('#take-care ._close').hide();
			} else {
				$('#take-care ._open').hide();
				$('#take-care ._close').show();
			}
		});

		// Change subscriber into Đăng ký
		$('.email-subscriber #es_txt_button').val('Đăng ký');

		// Change "read more" to "Xem thêm..."
		$('.khach-hang-than-thiet .read-more').html('Xem thêm...');
	});
</script>


	<?php wp_footer(); ?>
	<script>

        function Add_to_Cart(id) {
            window.location.replace('?add-to-cart='+id+'&quantity=1');
        }
    </script>
    <script>
        $(function() {
    var offset = $("#columns_right").offset();
    var columns_left = $('#columns_left');
    var header = $('#punica-masthead');
    var mainWrapper = $('#main-wrapper');

    $(window).scroll(function() {

    	var scrollTop = $(window).scrollTop();
    	if (scrollTop > 70) {
    		header.css({
    			'position': 'fixed',
			    'top': '0',
			    'z-index': 999,
			    'width': '100%',
			    // 'transition':'all 0.5s',
    		});
    		mainWrapper.css({
    			marginTop: '70px'
    		})
    	} else {
    		header.css({
    			'position': 'relative',
    		});
    		mainWrapper.css({
    			marginTop: 0
    		})
    	}

        if ($(window).scrollTop() > offset.top*1000) {

            $("#columns_right").css({
                'position': 'fixed',
                'margin-left': columns_left.width(),
                'top': 20,
				'width':columns_left.width()/3
            });

        } else {
            $("#columns_right").css({
                'position': 'relative',
                'margin-left': 0,
                'top': 0,
				'width':'25%'
            });
        };
    });

    //close or open menu sidebar
    var toggle_close = $('.toggle-close');
    var toggle_open = $('.toggle-open');
    var l_parent;

    toggle_close.click(function() {
    	$(this).hide();
		toggle_open.css({display: 'block'});
		l_parent = $(this).parent();
		l_parent.find('.sub-sub-category').css({display: 'none'});
    });

    toggle_open.click(function() {
    	$(this).hide();
		toggle_close.css({display: 'block'});
		l_parent = $(this).parent();
		l_parent.find('.sub-sub-category').css({display: 'block'});
    });
});

    </script>
</body>
</html>
