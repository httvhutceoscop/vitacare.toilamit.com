<header id="punica-masthead" class="punica-site-header">
	<div class="punica-header-style">
		<div id="punica-topbar" class="punica-topbar">
			<div class="container">
				<div class="row">
					<div id="punica-logo" class="col-lg-2 col-md-2 col-sm-3 col-xs-12 clearfix">
						<div class="punica-main-menu-wrapper pull-left">
							<span class="open-bar"><a href="#mmenu"><i class="fa fa-navicon"></i></a></span>
						</div>
						<div class="site-branding pull-left" itemtype="https://schema.org/logo" itemscope="">
							<div class="logo-wrapper">
								<a href="/" class="custom-logo-link" rel="home" itemprop="url">
									<!-- <img width="82" height="24" src="http://punicatheme.com/demo/avex/wp-content/uploads/sites/5/2016/04/logo-1.png" class="custom-logo" alt="" itemprop="logo"> -->
									<img width="82" height="24" src="<?php bloginfo('url');?>/wp-content/uploads/2015/vitacare.png" class="custom-logo" alt="" itemprop="logo">
								</a>					
							</div> <!-- .site-logo -->
						</div><!-- .site-branding -->
					</div><!-- #punica-logo -->




					<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 clearfix">
					    <nav class="punica-top-nav navbar pull-left hidden-sm hidden-xs">
					        <?php 
					        $args = array( 
					        	'theme_location' => 'primary', 
								'menu_class' => 'nav-menu nav navbar-nav list-inline sf-js-enabled sf-arrows', 
								// 'show_count' => true,
								'menu_id' => "primary-menu",
								'container' => 'nav',
								'container_class' => 'main-navigation',
								'container_id' => 'site-navigation',
								// 'before' => 'vvv',
								// 'after' => 'zzz',
								// 'link_before' => 'kkk',
								// 'link_after' => '::after',										
							);
							wp_nav_menu( $args ); 
							?>
					    </nav>
					    <!-- .punica-top-nav -->
					    <div class="pull-right">
					        <div class="social-sidebar clearfix">
					            <div class="widget punica-social-widget">
									<div class="social-icons text-center">

										<?php if(is_user_logged_in()){
											$current_user = wp_get_current_user(); ?>
		        							<a class="social-facebook radius-x" href="<?php bloginfo('url');?>/my-account/orders/" >
		        								<i class="fa fa-user">&nbsp;</i> <span class="user-logged-in"> <?php echo $current_user->user_login;?> </span>
		        							</a>
										<?php } else { ?>
											<a href="/my-account" class="social-facebook radius-x">
												<i class="fa fa-user">&nbsp;</i> Đăng nhập
											</a>
										<?php } ?>
										
										&nbsp;&nbsp;

										<?php if(is_user_logged_in()){ ?>
											<a href="<?php echo wp_logout_url($redirect); ?>" class="social-facebook radius-x">
												<i class="fa fa-power-off">&nbsp;</i> Thoát
											</a>
										<?php } else { ?>
											<a href="/my-account" class="social-facebook radius-x">
												<i class="fa fa-key">&nbsp;</i> Đăng ký
											</a>
										<?php } ?>

										
									</div>

								</div>
					            <div class="punica-cart">
					                <div class="punica-topcart">
					                    <div id="mini-cart" class="box-top">
					                        <a class="mini-cart box-wrap" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>" title="View your shopping cart">
					                            <span class="cart-icon box-icon">
										<i class="fa fa-shopping-basket"></i>
									</span>
					                            <span class="box-title">
										<span class="title-cart">
											Cart: 					</span>
					                            <span class="mini-cart-items cart-items-count-updated" data-nonce="9ecda97e40"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
					                            </span>
					                        </a>
					                    </div>
					                </div>
					            </div>
					        </div>					       
					    </div>
					</div>
					


				</div>
			</div>	
		</div>	
	</div>			
</header>