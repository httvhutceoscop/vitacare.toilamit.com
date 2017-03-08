<?php session_start();
    global $post;
    $productId = $post->ID;
        if(!isset($_SESSION['viewed_product'])){
            $_SESSION['viewed_product'] = array();
        }
        if(!isset($_SESSION['viewed_product'][$productId])){
            $_SESSION['viewed_product'][$productId] = time();
        } 

?>
<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<link rel='stylesheet'  href='<?php echo esc_url( get_template_directory_uri() );?>/bootstrap/css/bootstrap.min.css' type='text/css' media='all' />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,100italic,300italic,400italic,500,500italic,700,900,900italic,700italic&subset=vietnamese,latin' rel='stylesheet' type='text/css'>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
	<!-- Basic stylesheet -->
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() );?>/css/owl-carousel/owl.carousel.css">
	<!-- Default Theme -->
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() );?>/css/owl-carousel/owl.theme.css">
	<script src="<?php echo esc_url( get_template_directory_uri() );?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() );?>/js/scrolltop.js"></script>
	<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/prettyPhoto/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/clickexpand.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/carousel-slide.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/clickexpand_menu.js" async></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/menu-hover.js" async></script>
	<?php wp_head(); ?>
<script type="text/javascript">
	$(document).ready(function(){
			$('img').addClass('img-responsive');
		});
	$(document).ready(function(){
		$('a.tab').click(function(){
			$('.actived').removeClass('actived');
			$(this).addClass('actived');
			$('.content-sp').slideUp("fast");
			var content_show = $(this).attr('title');
			$('#' + content_show).slideDown("fast");
		});
	});

	$(document).ready(function(){
		$("#chon_danh_muc").change(function() {
			 location.replace($(this).val());
	  });
	});
	
	/*function displayVals() {
	  var singleValues = $( "#tinh_thanhpho" ).val();
	  $( "#van_chuyen_tinh_tp" ).html( "<b>Single:</b> " + singleValues);
	  alert(singleValues);
	}
	 
	$( "select" ).change( displayVals );
	displayVals();*/
/*	$(document).ready(function(){
		$("#tinh_thanhpho").change(function(){
			var singleValues = $( "#tinh_thanhpho" ).val();
			var data_tinh = $("#tinh_thanhpho").data('tinh').val();
			$( "#van_chuyen_tinh_tp" ).html("$" + singleValues );
		});
	});
*/
	
	function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}
</script>
	
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>

</head>

<body>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=455413341275496";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
	

	<div id="sitecontainer">
		<!-- <a href="#mmenu"><div class="header"></div></a> -->

		<?php //include 'template-parts/vnt-header.php'; ?>
		<?php get_template_part( 'template-parts/vnt-header', 'top' ); ?>

		<header id="masthead" class="site-header" role="banner" style="display:none;">
			<div class="bluetop col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
				<div class="container">
					<div class="row">
					<div class="bluetopimg">
						<!-- <img src="<?php echo esc_url( get_template_directory_uri() );?>/images/online-payment-options-cc.png"  alt="Online Payment Options" /> -->
						<p><?php echo get_option('option1');?></p>
					</div>
					<div class="bluetopcart">
						<li>
							<?php if(is_user_logged_in()){
									$current_user = wp_get_current_user(); ?>
        							Xin chào, <a href="<?php bloginfo('url');?>/my-account/orders/" ><?php echo $current_user->user_login;?></a>
							<?php	}else{ ?>
									<a href="/my-account" >Đăng Nhập</a>
							<?php	}
							?>
						</li> 
						<li>|</li> 
						<?php if(is_user_logged_in()){ ?>
							<li><a href="<?php echo wp_logout_url($redirect); ?>" >Thoát</a></li>
						<?php }else{ ?>
							<li><a href="/my-account" >Đăng Ký</a></li>
						<?php } ?>
					<li>
						
						<ul class="bluecart_">
						<h3 class="cart_"><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">Giỏ hàng(<?php echo sprintf (_n( '%d sp', '%d sp', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>)</a></h3>
						</ul>

						</li>
					</div>
					</div>
				</div>
			</div>
			<div id="navbar" class="navbar">

					<?php if ( has_nav_menu( 'top' ) ) : ?>
						<div class="navigation-top">
							<div class="wrap">
								<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
							</div><!-- .wrap -->
						</div><!-- .navigation-top -->
					<?php endif; ?>

				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
				<a href="/" style="display:none;">
					<div class="logohome col-xs-12 col-sm-12">
						<img src="<?php bloginfo('url');?>/wp-content/uploads/2015/vitacare.png"/>
						<!-- <span> -->
							<?php //echo get_bloginfo ( 'description' );?>
						<!-- </span> -->
					</div>
				</a>
					<?php $walker = new Menu_With_Description; ?>
					<?php 
						wp_nav_menu( 
							array( 'theme_location' => 'primary', 
									'menu_class' => 'nav-menu nav navbar-nav list-inline sf-js-enabled sf-arrows', 
									'show_count' => true,
									'menu_id' => "primary-menu"
									//'walker' => $walker 
									) ); 
					?>
					<ul class="bluecart">
						<h3 class="cart">
							<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">Giỏ hàng(<?php echo sprintf (_n( '%d sp', '%d sp', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>)</a>
						</h3>
					</ul>
					<!-- <?php get_search_form(); ?> -->
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" accept-charset="utf-8"  class="search-form">
						<input type="search" name="s" value="" placeholder="Nhập từ khóa tìm kiếm" size="20">
						<input type="submit" value=" " class="search-submit">
					</form>
				</nav><!-- #site-navigation -->
				
			</div><!-- #navbar -->

		</header><!-- #masthead -->
	<?php 
		/*echo clean_custom_menu('primary');*/
		/*$menu = wp_get_nav_menu_items('Menu_Top');
		echo "<pre>";
		var_dump($menu);
		echo "</pre>";
*/
 	
	?>

		<div id="main-wrapper" class="row">

