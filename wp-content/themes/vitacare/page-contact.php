<?php
/*
 Template Name: Page Contact
 */

get_header(); ?>

	
	<div class="container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
			    <?php if(function_exists('bcn_display'))
			    {
			        bcn_display();
			    }?>
			</div>
			<div id="columns_left" class="col-sm-3 hidden-xs">
                    <div class="danh-muc-ve-chung-toi">
                        <ul>
                            <?php
                                $taxonomy  = 'danh-muc-ve-chung-toi';
                                $this_category = get_categories("&taxonomy=".$taxonomy."&parent=0&hide_empty=0&order=DESC");
                                foreach ($this_category as $key => $value) { ?>
                                    <li><span class="title-danh-muc"><?php echo $value->name;?></span>
                                        <ul>
                                        <?php
                                            $sub_category = get_categories("&taxonomy=".$taxonomy."&parent=".$value->term_id."&hide_empty=0&order=ASC");
                                            foreach ($sub_category as $key => $sub_value) {
                                        ?>
                                             <li 
                                                <?php
                                                    if($catid == $sub_value->cat_ID){
                                                        echo 'class="danh-muc-select"';
                                                    }
                                                ?>
                                            >
                                        <a href="/danh-muc-ve-chung-toi/<?php echo $sub_value->slug; ?>" ><?php echo $sub_value->name;?></a></li>
                                        
                                        <?php 
                                            }
                                            if($value->term_id == 205){ ?>
	                                        	<li><a href="/lien-he-voi-chung-toi" >Liên hệ với chúng tôi</a></li>
	                                    <?php }
                                        ?>

                                        </ul>
                                    </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                    <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'left-sidebar' ); ?>
                    <?php endif; ?>
                </div>
                <div class="box-cat col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<?php
						if(have_posts()) : while(have_posts()) : the_post();
					?>
						<?php the_content();?>
					<?php
						endwhile;
						endif;
					?>
					
                    <div class="form-lien-he">
                        <?php echo do_shortcode('[contact-form-7 id="64" title="Contact form 1"]');?>
                    </div>
					<?php
						$post = get_post(1014);
						echo $post->post_content;
					?>
                </div><!--End #news-wrap-->

		<div id="columns_right" class="col-sm-3 hidden-xs">
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
                <?php dynamic_sidebar( 'right-sidebar' ); ?>
			<?php endif; ?>
		</div>
		
	 </div>
<?php get_footer(); ?>