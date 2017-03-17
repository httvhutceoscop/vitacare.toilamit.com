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


	<?php wp_footer(); ?>
	<script>
        
        function Add_to_Cart(id) {
            window.location.replace('?add-to-cart='+id+'&quantity=1');
        }
    </script>
    <script>
        $(function() {
            var offset = $("#columns_right").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#columns_right").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#columns_right").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
    </script>
</body>
</html>